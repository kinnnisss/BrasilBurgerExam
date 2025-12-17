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

    public async Task<ServiceResult<ClientDto>> LoginAsync(LoginDto dto, CancellationToken ct = default)
    {
        var login = dto.Login.Trim();
        var client = await _clientRepo.GetByLoginAsync(login, ct);

        if (client is null)
            return ServiceResult<ClientDto>.Fail(ServiceError.Unauthorized, "Login ou mot de passe incorrect.");

        var res = _hasher.VerifyHashedPassword(client, client.Password, dto.Password);
        if (res == PasswordVerificationResult.Failed)
            return ServiceResult<ClientDto>.Fail(ServiceError.Unauthorized, "Login ou mot de passe incorrect.");

        return ServiceResult<ClientDto>.Ok(new ClientDto(client.IdClient, client.Nom, client.Prenom, client.Telephone, client.Login));
    }
    public async Task<ServiceResult<ClientDto>> RegisterAsync(RegisterDto dto, CancellationToken ct = default)
    {
        var login = dto.Login.Trim();
        var tel = dto.Telephone.Trim();

        if (string.IsNullOrWhiteSpace(login) || string.IsNullOrWhiteSpace(dto.Password))
            return ServiceResult<ClientDto>.Fail(ServiceError.Validation, "Login et mot de passe sont obligatoires.");

        if (await _clientRepo.ExistsLoginAsync(login, ct))
            return ServiceResult<ClientDto>.Fail(ServiceError.Conflict, "Ce login est déjà utilisé.");

        if (await _clientRepo.ExistsTelephoneAsync(tel, ct))
            return ServiceResult<ClientDto>.Fail(ServiceError.Conflict, "Ce téléphone est déjà utilisé.");

        var client = new Client
        {
            Nom = dto.Nom.Trim(),
            Prenom = dto.Prenom.Trim(),
            Telephone = tel,
            Login = login
        };

        client.Password = _hasher.HashPassword(client, dto.Password);

        var saved = await _clientRepo.CreateAsync(client, ct);

        return ServiceResult<ClientDto>.Ok(new ClientDto(saved.IdClient, saved.Nom, saved.Prenom, saved.Telephone, saved.Login));
    }
}
