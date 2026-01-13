namespace BrasilBurgerCSharp.DTOs;

public record CommandeDto(int Id,string Reference,DateTime DateCommande,string Etat,string TypeConsommation,decimal MontantTotal,bool EstPayee,DateTime? DateValidation=null,DateTime? DateTerminaison=null,DateTime? DateAnnulation=null,DateTime? DateMajEtat=null);


