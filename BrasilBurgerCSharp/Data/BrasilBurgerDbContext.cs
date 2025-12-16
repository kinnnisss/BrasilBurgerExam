using Microsoft.EntityFrameworkCore;
using BrasilBurgerCSharp.Models;

namespace BrasilBurgerCSharp.Data;

public class BrasilBurgerDbContext : DbContext
{
    public BrasilBurgerDbContext(DbContextOptions<BrasilBurgerDbContext> options)
        : base(options) { }

    public DbSet<Client> Clients => Set<Client>();
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

private static void ConfigureClient(ModelBuilder modelBuilder)
{
    modelBuilder.Entity<Client>(e =>
    {
        e.ToTable("CLIENT");
        e.HasKey(c => c.IdClient);

        e.Property(c => c.IdClient).HasColumnName("id_client");
        e.Property(c => c.Nom).HasColumnName("nom").HasMaxLength(100).IsRequired();
        e.Property(c => c.Prenom).HasColumnName("prenom").HasMaxLength(100).IsRequired();
        e.Property(c => c.Telephone).HasColumnName("telephone").HasMaxLength(20).IsRequired();
        e.Property(c => c.Login).HasColumnName("login").HasMaxLength(100).IsRequired();
        e.Property(c => c.Password).HasColumnName("password").HasMaxLength(255).IsRequired();

        e.HasIndex(c => c.Telephone).IsUnique();
        e.HasIndex(c => c.Login).IsUnique();
    });
}

private static void ConfigureBurger(ModelBuilder modelBuilder)
{
    modelBuilder.Entity<Burger>(e =>
    {
        e.ToTable("BURGER");
        e.HasKey(b => b.IdBurger);

        e.Property(b => b.IdBurger).HasColumnName("id_burger");
        e.Property(b => b.Nom).HasColumnName("nom").HasMaxLength(150).IsRequired();
        e.Property(b => b.Prix).HasColumnName("prix").HasColumnType("numeric(10,2)");
        e.Property(b => b.Image).HasColumnName("image");
        e.Property(b => b.IsArchived).HasColumnName("is_archived");
    });
}

private static void ConfigureComplement(ModelBuilder modelBuilder)
{
    modelBuilder.Entity<Complement>(e =>
    {
        e.ToTable("COMPLEMENT");
        e.HasKey(c => c.IdComplement);

        e.Property(c => c.IdComplement).HasColumnName("id_complement");
        e.Property(c => c.Nom).HasColumnName("nom").HasMaxLength(150).IsRequired();
        e.Property(c => c.TypeComplement)
            .HasColumnName("type_complement")
            .HasColumnType("type_complement_enum");
        e.Property(c => c.Prix).HasColumnName("prix").HasColumnType("numeric(10,2)");
        e.Property(c => c.Image).HasColumnName("image");
        e.Property(c => c.IsArchived).HasColumnName("is_archived");
    });
}


}
