using BrasilBurgerCSharp.DTOs;
using BrasilBurgerCSharp.Models;
using BrasilBurgerCSharp.Repository;
using BrasilBurgerCSharp.Service.Common;
using Microsoft.AspNetCore.Identity;

namespace BrasilBurgerCSharp.Service.Impl;

public sealed class AuthService : IAuthService
{
    private readonly IClientRepository _clientRepo;
    private readonly PasswordHasher<Client> _hasher = new();

    public AuthService(IClientRepository clientRepo) => _clientRepo = clientRepo;

    public async Task<ServiceResult<ClientDto>> GetClientAsync(int clientId, CancellationToken ct = default)
    {
        var client = await _clientRepo.GetByIdAsync(clientId, ct);
        if (client is null) return ServiceResult<ClientDto>.Fail(ServiceError.NotFound, "Client introuvable.");

        return ServiceResult<ClientDto>.Ok(new ClientDto(client.IdClient, client.Nom, client.Prenom, client.Telephone, client.Login));
    }

    public Task<ServiceResult<ClientDto>> LoginAsync(LoginDto dto, CancellationToken ct = default)
    {
        throw new NotImplementedException();
    }

    public Task<ServiceResult<ClientDto>> RegisterAsync(RegisterDto dto, CancellationToken ct = default)
    {
        throw new NotImplementedException();
    }
}
