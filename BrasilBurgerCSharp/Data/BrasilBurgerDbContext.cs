using Microsoft.EntityFrameworkCore;
using BrasilBurgerCSharp.Models;

namespace BrasilBurgerCSharp.Data;

public class BrasilBurgerDbContext : DbContext
{
    public BrasilBurgerDbContext(DbContextOptions<BrasilBurgerDbContext> options)
        : base(options) { }

    public DbSet<Client> Clients => Set<Client>();
    public DbSet<Gestionnaire> Gestionnaires => Set<Gestionnaire>();
    public DbSet<Burger> Burgers => Set<Burger>();
    public DbSet<Menu> Menus => Set<Menu>();
    public DbSet<Complement> Complements => Set<Complement>();
    public DbSet<Commande> Commandes => Set<Commande>();
    public DbSet<LigneCommande> LigneCommandes => Set<LigneCommande>();
    public DbSet<Paiement> Paiements => Set<Paiement>();
    public DbSet<Zone> Zones => Set<Zone>();
    public DbSet<Quartier> Quartiers => Set<Quartier>();
    public DbSet<Livreur> Livreurs => Set<Livreur>();

    public DbSet<MenuBurger> MenuBurgers => Set<MenuBurger>();
    public DbSet<MenuComplement> MenuComplements => Set<MenuComplement>();

    protected override void OnModelCreating(ModelBuilder modelBuilder)
    {
        ConfigureEnums(modelBuilder);

        ConfigureClient(modelBuilder);
        ConfigureGestionnaire(modelBuilder);
        ConfigureBurger(modelBuilder);
        ConfigureComplement(modelBuilder);
        ConfigureMenu(modelBuilder);
        ConfigureZone(modelBuilder);
        ConfigureQuartier(modelBuilder);
        ConfigureLivreur(modelBuilder);
        ConfigureCommande(modelBuilder);
        ConfigureLigneCommande(modelBuilder);
        ConfigurePaiement(modelBuilder);
        ConfigureMenuBurger(modelBuilder);
        ConfigureMenuComplement(modelBuilder);
    }

private static void ConfigureEnums(ModelBuilder modelBuilder)
{
    modelBuilder.HasPostgresEnum<TypeComplement>("type_complement_enum");
    modelBuilder.HasPostgresEnum<EtatCommande>("etat_commande_enum");
    modelBuilder.HasPostgresEnum<TypeConsommation>("type_consommation_enum");
    modelBuilder.HasPostgresEnum<TypeArticle>("type_article_enum");
    modelBuilder.HasPostgresEnum<ModePaiement>("mode_paiement_enum");
}

}
