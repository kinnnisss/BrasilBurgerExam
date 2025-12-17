using BrasilBurgerCSharp.DTOs;
using BrasilBurgerCSharp.Models;
using BrasilBurgerCSharp.Repository;
using BrasilBurgerCSharp.Service.Common;
using BrasilBurgerCSharp.Data;
using Microsoft.EntityFrameworkCore;

namespace BrasilBurgerCSharp.Service.Impl;

public sealed class CommandeService : ICommandeService
{
    private readonly BrasilBurgerDbContext _db;
    private readonly ICommandeRepository _commandeRepo;
    private readonly ICatalogRepository _catalogRepo;
    private readonly ILivraisonRepository _livraisonRepo;

    public CommandeService(
        BrasilBurgerDbContext db,
        ICommandeRepository commandeRepo,
        ICatalogRepository catalogRepo,
        ILivraisonRepository livraisonRepo)
    {
        _db = db;
        _commandeRepo = commandeRepo;
        _catalogRepo = catalogRepo;
        _livraisonRepo = livraisonRepo;
    }

    public async Task<ServiceResult<CommandeDto>> CreerCommandeAsync(CommandeCreateDto dto, CancellationToken ct = default)
    {
        if (dto.Lignes is null || dto.Lignes.Count == 0)
            return ServiceResult<CommandeDto>.Fail(ServiceError.Validation, "La commande doit contenir au moins un article.");

        if (!Enum.TryParse<TypeConsommation>(dto.TypeConsommation, true, out var typeCons))
            return ServiceResult<CommandeDto>.Fail(ServiceError.Validation, "Type de consommation invalide.");

        if (typeCons == TypeConsommation.LIVRAISON)
        {
            if (dto.ZoneId is null || dto.QuartierId is null)
                return ServiceResult<CommandeDto>.Fail(ServiceError.Validation, "Zone et quartier obligatoires pour une livraison.");
        }
        else
        {
            dto = dto with { ZoneId = null, QuartierId = null };
        }

        var lignesEntities = new List<LigneCommande>();
        decimal sousTotal = 0m;

        foreach (var l in dto.Lignes)
        {
            if (l.Quantite <= 0)
                return ServiceResult<CommandeDto>.Fail(ServiceError.Validation, "Quantité invalide.");

            if (!Enum.TryParse<TypeArticle>(l.TypeArticle, true, out var typeArticle))
                return ServiceResult<CommandeDto>.Fail(ServiceError.Validation, "TypeArticle invalide.");

            decimal prixUnitaire;
            var entity = new LigneCommande
            {
                TypeArticle = typeArticle,
                Quantite = l.Quantite
            };

            switch (typeArticle)
            {
                case TypeArticle.BURGER:
                {
                    var burger = await _catalogRepo.GetBurgerByIdAsync(l.ArticleId, true, ct);
                    if (burger is null) return ServiceResult<CommandeDto>.Fail(ServiceError.NotFound, $"Burger {l.ArticleId} introuvable.");
                    entity.IdBurger = burger.IdBurger;
                    entity.IdMenu = null;
                    entity.IdComplement = null;
                    prixUnitaire = burger.Prix;
                    break;
                }
                case TypeArticle.MENU:
                {
                    var menu = await _catalogRepo.GetMenuDetailsByIdAsync(l.ArticleId, true, ct);
                    if (menu is null) return ServiceResult<CommandeDto>.Fail(ServiceError.NotFound, $"Menu {l.ArticleId} introuvable.");
                    entity.IdMenu = menu.IdMenu;
                    entity.IdBurger = null;
                    entity.IdComplement = null;
                    prixUnitaire = menu.Prix;
                    break;
                }
                case TypeArticle.COMPLEMENT:
                {
                    var complements = await _catalogRepo.GetComplementsAsync(true, ct);
                    var comp = complements.FirstOrDefault(c => c.IdComplement == l.ArticleId);
                    if (comp is null) return ServiceResult<CommandeDto>.Fail(ServiceError.NotFound, $"Complément {l.ArticleId} introuvable.");
                    entity.IdComplement = comp.IdComplement;
                    entity.IdBurger = null;
                    entity.IdMenu = null;
                    prixUnitaire = comp.Prix;
                    break;
                }
                default:
                    return ServiceResult<CommandeDto>.Fail(ServiceError.Validation, "TypeArticle invalide.");
            }

            entity.PrixUnitaire = prixUnitaire;
            entity.PrixTotal = prixUnitaire * l.Quantite;
            sousTotal += entity.PrixTotal;

            lignesEntities.Add(entity);
        }

        decimal fraisLivraison = 0m;
        if (typeCons == TypeConsommation.LIVRAISON && dto.ZoneId is not null)
        {
            var zones = await _livraisonRepo.GetZonesAsync(ct);
            var zone = zones.FirstOrDefault(z => z.IdZone == dto.ZoneId.Value);
            if (zone is null) return ServiceResult<CommandeDto>.Fail(ServiceError.NotFound, "Zone introuvable.");

            var quartiers = await _livraisonRepo.GetQuartiersByZoneAsync(zone.IdZone, ct);
            if (dto.QuartierId is null || !quartiers.Any(q => q.IdQuartier == dto.QuartierId.Value))
                return ServiceResult<CommandeDto>.Fail(ServiceError.Validation, "Quartier invalide pour cette zone.");

            fraisLivraison = zone.PrixLivraison;
        }

        var montantTotal = sousTotal + fraisLivraison;

        var commande = new Commande
        {
            Reference = $"BB-{DateTime.UtcNow:yyyyMMddHHmmss}-{Guid.NewGuid().ToString("N")[..6].ToUpper()}",
            DateCommande = DateTime.UtcNow,
            Etat = EtatCommande.ENCOURS,
            TypeConsommation = typeCons,
            MontantTotal = montantTotal,
            IdClient = dto.ClientId,
            IdZone = dto.ZoneId,
            IdQuartier = dto.QuartierId
        };

        await using var trx = await _db.Database.BeginTransactionAsync(ct);
        try
        {
            var created = await _commandeRepo.CreateCommandeAsync(commande, ct);
            await _commandeRepo.AddLignesAsync(created.IdCommande, lignesEntities, ct);

            await trx.CommitAsync(ct);

            var dtoResult = new CommandeDto(
                created.IdCommande,
                created.Reference,
                created.DateCommande,
                created.Etat.ToString(),
                created.TypeConsommation.ToString(),
                created.MontantTotal,
                EstPayee: false
            );

            return ServiceResult<CommandeDto>.Ok(dtoResult);
        }
        catch
        {
            await trx.RollbackAsync(ct);
            return ServiceResult<CommandeDto>.Fail(ServiceError.Unexpected, "Erreur lors de la création de la commande.");
        }
    }

    private static (string libelle, string? image) GetLibelleImage(LigneCommande l)
    {
        return l.TypeArticle switch
        {
            TypeArticle.BURGER => (l.Burger?.Nom ?? "Burger", l.Burger?.Image),
            TypeArticle.MENU => (l.Menu?.Nom ?? "Menu", l.Menu?.Image),
            TypeArticle.COMPLEMENT => (l.Complement?.Nom ?? "Complément", l.Complement?.Image),
            _ => ("Article", null)
        };
    }
    public Task<ServiceResult<CommandeDetailsDto>> GetCommandeDetailsAsync(int commandeId, int clientId, CancellationToken ct = default)
    {
        throw new NotImplementedException();
    }

    public Task<ServiceResult<List<CommandeDto>>> GetCommandesEnCoursAsync(int clientId, CancellationToken ct = default)
    {
        throw new NotImplementedException();
    }

    public Task<ServiceResult<List<CommandeDto>>> GetHistoriqueAsync(int clientId, CancellationToken ct = default)
    {
        throw new NotImplementedException();
    }
}
