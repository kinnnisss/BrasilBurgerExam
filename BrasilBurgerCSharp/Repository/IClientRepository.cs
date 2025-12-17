using BrasilBurgerCSharp.Models;

namespace BrasilBurgerCSharp.Repository;

public interface IClientRepository
{
    Task<Client?> GetByLoginAsync(string login, CancellationToken ct = default);
    Task<Client?> GetByIdAsync(int idClient, CancellationToken ct = default);
    Task<bool> ExistsLoginAsync(string login, CancellationToken ct = default);
    Task<bool> ExistsTelephoneAsync(string telephone, CancellationToken ct = default);
    Task<Client> CreateAsync(Client client, CancellationToken ct = default);
}
