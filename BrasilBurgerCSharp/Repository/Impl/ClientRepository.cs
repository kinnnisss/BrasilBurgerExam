using Microsoft.EntityFrameworkCore;
using BrasilBurgerCSharp.Data;
using BrasilBurgerCSharp.Models;

namespace BrasilBurgerCSharp.Repository.Impl;

public sealed class ClientRepository : IClientRepository
{
    private readonly BrasilBurgerDbContext _db;
    public ClientRepository(BrasilBurgerDbContext db) => _db = db;

    public Task<Client> CreateAsync(Client client, CancellationToken ct = default)
    {
        throw new NotImplementedException();
    }

    public Task<bool> ExistsLoginAsync(string login, CancellationToken ct = default)
    {
        throw new NotImplementedException();
    }

    public Task<bool> ExistsTelephoneAsync(string telephone, CancellationToken ct = default)
    {
        throw new NotImplementedException();
    }

    public Task<Client?> GetByIdAsync(int idClient, CancellationToken ct = default)
        => _db.Clients.AsNoTracking()
            .SingleOrDefaultAsync(c => c.IdClient == idClient, ct);

    public Task<Client?> GetByLoginAsync(string login, CancellationToken ct = default)
        => _db.Clients.AsNoTracking()
            .SingleOrDefaultAsync(c => c.Login == login, ct);
}
