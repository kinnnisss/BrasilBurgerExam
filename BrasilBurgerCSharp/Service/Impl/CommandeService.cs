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
    private readonly IClientRepository _clientRepo;


    public CommandeService(
        BrasilBurgerDbContext db,
        ICommandeRepository commandeRepo,
        ICatalogRepository catalogRepo,
        ILivraisonRepository livraisonRepo,
        IClientRepository clientRepo)
    {
        _db = db;
        _commandeRepo = commandeRepo;
        _catalogRepo = catalogRepo;
        _livraisonRepo = livraisonRepo;
        _clientRepo = clientRepo;
    }

public async Task<ServiceResult<CommandeDto>> CreerCommandeAsync(
    CommandeCreateDto dto,
    CancellationToken ct = default)
{
    if (dto.Lignes is null || dto.Lignes.Count == 0)
        return ServiceResult<CommandeDto>.Fail(ServiceError.Validation, "La commande doit contenir au moins un article.");

    if (!Enum.TryParse<TypeConsommation>(dto.TypeConsommation, true, out var typeCons))
        return ServiceResult<CommandeDto>.Fail(ServiceError.Validation, "Type de consommation invalide.");

    int? zoneId = dto.ZoneId;
    int? quartierId = dto.QuartierId;

    if (typeCons == TypeConsommation.LIVRAISON)
    {
        if (zoneId is null || quartierId is null)
            return ServiceResult<CommandeDto>.Fail(ServiceError.Validation, "Zone et quartier obligatoires pour une livraison.");
    }
    else
    {
        zoneId = null;
        quartierId = null;
    }

    var client = await _clientRepo.GetByIdAsync(dto.ClientId, ct);
    if (client is null)
        return ServiceResult<CommandeDto>.Fail(ServiceError.NotFound, "Client introuvable.");

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
                if (burger is null)
                    return ServiceResult<CommandeDto>.Fail(ServiceError.NotFound, $"Burger {l.ArticleId} introuvable.");

                entity.IdBurger = burger.IdBurger;
                entity.IdMenu = null;
                entity.IdComplement = null;

                prixUnitaire = burger.Prix;
                break;
            }

            case TypeArticle.MENU:
            {
                var menu = await _catalogRepo.GetMenuDetailsByIdAsync(l.ArticleId, true, ct);
                if (menu is null)
                    return ServiceResult<CommandeDto>.Fail(ServiceError.NotFound, $"Menu {l.ArticleId} introuvable.");

                entity.IdMenu = menu.IdMenu;
                entity.IdBurger = null;
                entity.IdComplement = null;

                prixUnitaire = menu.Prix;
                break;
            }

            case TypeArticle.COMPLEMENT:
            {
                var comp = await _catalogRepo.GetComplementByIdAsync(l.ArticleId, true, ct);
                if (comp is null)
                    return ServiceResult<CommandeDto>.Fail(ServiceError.NotFound, $"Complément {l.ArticleId} introuvable.");

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
    if (typeCons == TypeConsommation.LIVRAISON && zoneId is not null)
    {
        var zones = await _livraisonRepo.GetZonesAsync(ct);
        var zone = zones.FirstOrDefault(z => z.IdZone == zoneId.Value);
        if (zone is null)
            return ServiceResult<CommandeDto>.Fail(ServiceError.NotFound, "Zone introuvable.");

        var quartiers = await _livraisonRepo.GetQuartiersByZoneAsync(zone.IdZone, ct);
        if (quartierId is null || !quartiers.Any(q => q.IdQuartier == quartierId.Value))
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

        IdZone = zoneId,
        IdQuartier = quartierId
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
    catch (Exception)
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
    public async Task<ServiceResult<CommandeDetailsDto>> GetCommandeDetailsAsync(int commandeId, int clientId, CancellationToken ct = default)
    {
        var cmd = await _commandeRepo.GetCommandeDetailsAsync(commandeId, clientId, ct);
        if (cmd is null) return ServiceResult<CommandeDetailsDto>.Fail(ServiceError.NotFound, "Commande introuvable.");

        var commandeDto = new CommandeDto(
            cmd.IdCommande,
            cmd.Reference,
            cmd.DateCommande,
            cmd.Etat.ToString(),
            cmd.TypeConsommation.ToString(),
            cmd.MontantTotal,
            EstPayee: cmd.Paiement is not null
        );

        var lignes = cmd.Lignes.Select(l =>
        {
            var (lib, img) = GetLibelleImage(l);
            return new LigneCommandeDto(
                l.TypeArticle.ToString(),
                l.Quantite,
                l.PrixUnitaire,
                l.PrixTotal,
                lib,
                img
            );
        }).ToList();

        var zone = cmd.Zone?.Libelle;
        var quartier = cmd.Quartier?.Libelle;
        var livreur = cmd.Livreur is null ? null : $"{cmd.Livreur.Prenom} {cmd.Livreur.Nom} ({cmd.Livreur.Telephone})";

        return ServiceResult<CommandeDetailsDto>.Ok(new CommandeDetailsDto(commandeDto, lignes, zone, quartier, livreur));
    }


    public async Task<ServiceResult<List<CommandeDto>>> GetCommandesEnCoursAsync(int clientId, CancellationToken ct = default)
    {
        var list = await _commandeRepo.GetEnCoursByClientAsync(clientId, ct);
        var dto = list.Select(c => new CommandeDto(
            c.IdCommande, c.Reference, c.DateCommande,
            c.Etat.ToString(), c.TypeConsommation.ToString(),
            c.MontantTotal, c.Paiement is not null
        )).ToList();

        return ServiceResult<List<CommandeDto>>.Ok(dto);
    }

    public async Task<ServiceResult<List<CommandeDto>>> GetHistoriqueAsync(int clientId, CancellationToken ct = default)
    {
        var list = await _commandeRepo.GetHistoriqueByClientAsync(clientId, ct);
        var dto = list.Select(c => new CommandeDto(
            c.IdCommande, c.Reference, c.DateCommande,
            c.Etat.ToString(), c.TypeConsommation.ToString(),
            c.MontantTotal, c.Paiement is not null
        )).ToList();

        return ServiceResult<List<CommandeDto>>.Ok(dto);
    }
}
