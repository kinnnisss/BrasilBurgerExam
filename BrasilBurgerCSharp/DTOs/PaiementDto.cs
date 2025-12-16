namespace BrasilBurgerCSharp.DTOs;
public record PaiementDto(int Id, DateTime DatePaiement, decimal Montant, string ModePaiement);
