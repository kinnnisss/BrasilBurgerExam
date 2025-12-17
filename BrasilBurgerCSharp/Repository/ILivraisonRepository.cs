using BrasilBurgerCSharp.Models;

namespace BrasilBurgerCSharp.Repository;

public interface ILivraisonRepository
{
    Task<List<Zone>> GetZonesAsync(CancellationToken ct = default);
    Task<List<Quartier>> GetQuartiersByZoneAsync(int zoneId, CancellationToken ct = default);
}
