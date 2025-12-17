using BrasilBurgerCSharp.DTOs;
using BrasilBurgerCSharp.Models;
using BrasilBurgerCSharp.Repository;
using BrasilBurgerCSharp.Service.Common;
using BrasilBurgerCSharp.Service.Payments;
using BrasilBurgerCSharp.Data;
using Microsoft.EntityFrameworkCore;

namespace BrasilBurgerCSharp.Service.Impl;

public sealed class PaiementService : IPaiementService
{
    private readonly BrasilBurgerDbContext _db;
    private readonly ICommandeRepository _commandeRepo;
    private readonly IPaiementRepository _paiementRepo;
    private readonly IReadOnlyDictionary<ModePaiement, IPaymentProvider> _providers;

    public PaiementService(
        BrasilBurgerDbContext db,
        ICommandeRepository commandeRepo,
        IPaiementRepository paiementRepo,
        IEnumerable<IPaymentProvider> providers)
    {
        _db = db;
        _commandeRepo = commandeRepo;
        _paiementRepo = paiementRepo;
        _providers = providers.ToDictionary(p => p.Mode, p => p);
    }

    public async Task<ServiceResult<PaiementDto>> PayerAsync(int clientId, PaiementCreateDto dto, CancellationToken ct = default)
    {
        if (!Enum.TryParse<ModePaiement>(dto.ModePaiement, true, out var mode))
            return ServiceResult<PaiementDto>.Fail(ServiceError.Validation, "Mode de paiement invalide.");

        var cmd = await _commandeRepo.GetCommandeDetailsAsync(dto.CommandeId, clientId, ct);
        if (cmd is null) return ServiceResult<PaiementDto>.Fail(ServiceError.NotFound, "Commande introuvable.");

        if (cmd.Paiement is not null || await _paiementRepo.HasPaiementAsync(cmd.IdCommande, ct))
            return ServiceResult<PaiementDto>.Fail(ServiceError.Conflict, "Cette commande est déjà payée.");

        if (!_providers.TryGetValue(mode, out var provider))
            return ServiceResult<PaiementDto>.Fail(ServiceError.Validation, "Provider de paiement non configuré.");

        await using var trx = await _db.Database.BeginTransactionAsync(ct);
        try
        {
            var paiement = await provider.PayAsync(cmd, ct);
            var saved = await _paiementRepo.CreateAsync(paiement, ct);

            var commandeToUpdate = await _db.Commandes.FirstOrDefaultAsync(c => c.IdCommande == cmd.IdCommande, ct);
            if (commandeToUpdate is not null)
            {
                commandeToUpdate.Etat = EtatCommande.VALIDEE;
                await _db.SaveChangesAsync(ct);
            }

            await trx.CommitAsync(ct);

            var dtoRes = new PaiementDto(saved.IdPaiement, saved.DatePaiement, saved.Montant, saved.ModePaiement.ToString());
            return ServiceResult<PaiementDto>.Ok(dtoRes);
        }
        catch
        {
            await trx.RollbackAsync(ct);
            return ServiceResult<PaiementDto>.Fail(ServiceError.Unexpected, "Erreur lors du paiement.");
        }
    }
}
