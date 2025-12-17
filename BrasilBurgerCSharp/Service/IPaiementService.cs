using BrasilBurgerCSharp.DTOs;
using BrasilBurgerCSharp.Service.Common;

namespace BrasilBurgerCSharp.Service;

public interface IPaiementService
{
    Task<ServiceResult<PaiementDto>> PayerAsync(int clientId, PaiementCreateDto dto, CancellationToken ct = default);
}
