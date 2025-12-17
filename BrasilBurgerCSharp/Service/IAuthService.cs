using BrasilBurgerCSharp.DTOs;
using BrasilBurgerCSharp.Service.Common;

namespace BrasilBurgerCSharp.Service;

public interface IAuthService
{
    Task<ServiceResult<ClientDto>> RegisterAsync(RegisterDto dto, CancellationToken ct = default);
    Task<ServiceResult<ClientDto>> LoginAsync(LoginDto dto, CancellationToken ct = default);
    Task<ServiceResult<ClientDto>> GetClientAsync(int clientId, CancellationToken ct = default);
}
