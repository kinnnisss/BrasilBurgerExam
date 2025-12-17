using BrasilBurgerCSharp.DTOs;
using BrasilBurgerCSharp.Service.Common;

namespace BrasilBurgerCSharp.Service;

public interface ICommandeService
{
    Task<ServiceResult<CommandeDto>> CreerCommandeAsync(CommandeCreateDto dto, CancellationToken ct = default);
    Task<ServiceResult<CommandeDetailsDto>> GetCommandeDetailsAsync(int commandeId, int clientId, CancellationToken ct = default);
    Task<ServiceResult<List<CommandeDto>>> GetCommandesEnCoursAsync(int clientId, CancellationToken ct = default);
    Task<ServiceResult<List<CommandeDto>>> GetHistoriqueAsync(int clientId, CancellationToken ct = default);
}
