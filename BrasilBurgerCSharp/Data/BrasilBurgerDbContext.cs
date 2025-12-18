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
        e.ToTable("client");
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
        e.ToTable("burger");
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
        e.ToTable("complement");
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

private static void ConfigureMenu(ModelBuilder modelBuilder)
{
    modelBuilder.Entity<Menu>(e =>
    {
        e.ToTable("menu");
        e.HasKey(m => m.IdMenu);

        e.Property(m => m.IdMenu).HasColumnName("id_menu");
        e.Property(m => m.Nom).HasColumnName("nom").HasMaxLength(150).IsRequired();
        e.Property(m => m.Image).HasColumnName("image");
        e.Property(m => m.Prix).HasColumnName("prix").HasColumnType("numeric(10,2)");
        e.Property(m => m.IsArchived).HasColumnName("is_archived");
    });
}
private static void ConfigureCommande(ModelBuilder modelBuilder)
{
    modelBuilder.Entity<Commande>(e =>
    {
        e.ToTable("commande");
        e.HasKey(c => c.IdCommande);

        e.Property(c => c.IdCommande).HasColumnName("id_commande");
        e.Property(c => c.Reference).HasColumnName("reference").HasMaxLength(50);
        e.Property(c => c.DateCommande).HasColumnName("date_commande");
        e.Property(c => c.Etat).HasColumnName("etat").HasColumnType("etat_commande_enum");
        e.Property(c => c.TypeConsommation)
            .HasColumnName("type_consommation")
            .HasColumnType("type_consommation_enum");
        e.Property(c => c.MontantTotal).HasColumnName("montant_total").HasColumnType("numeric(10,2)");

        e.Property(c => c.IdClient).HasColumnName("id_client");
        e.Property(c => c.IdZone).HasColumnName("id_zone");
        e.Property(c => c.IdQuartier).HasColumnName("id_quartier");
        e.Property(c => c.IdLivreur).HasColumnName("id_livreur");

        e.HasOne(c => c.Client)
            .WithMany(c => c.Commandes)
            .HasForeignKey(c => c.IdClient);

        e.HasOne(c => c.Zone)
            .WithMany(z => z.Commandes)
            .HasForeignKey(c => c.IdZone);

        e.HasOne(c => c.Quartier)
            .WithMany(q => q.Commandes)
            .HasForeignKey(c => c.IdQuartier);

        e.HasOne(c => c.Livreur)
            .WithMany(l => l.Commandes)
            .HasForeignKey(c => c.IdLivreur);
    });
}

private static void ConfigureLigneCommande(ModelBuilder modelBuilder)
{
    modelBuilder.Entity<LigneCommande>(e =>
    {
        e.ToTable("ligne_commande");
        e.HasKey(l => l.IdLigneCommande);

        e.Property(l => l.IdLigneCommande).HasColumnName("id_ligne_commande");
        e.Property(l => l.IdCommande).HasColumnName("id_commande");
        e.Property(l => l.TypeArticle)
            .HasColumnName("type_article")
            .HasColumnType("type_article_enum");
        e.Property(l => l.IdBurger).HasColumnName("id_burger");
        e.Property(l => l.IdMenu).HasColumnName("id_menu");
        e.Property(l => l.IdComplement).HasColumnName("id_complement");
        e.Property(l => l.Quantite).HasColumnName("quantite");
        e.Property(l => l.PrixUnitaire).HasColumnName("prix_unitaire").HasColumnType("numeric(10,2)");
        e.Property(l => l.PrixTotal).HasColumnName("prix_total").HasColumnType("numeric(10,2)");

        e.HasOne(l => l.Commande)
            .WithMany(c => c.Lignes)
            .HasForeignKey(l => l.IdCommande);
        e.HasOne(l => l.Burger)
            .WithMany()
            .HasForeignKey(l => l.IdBurger);
            
        e.HasOne(l => l.Menu)
            .WithMany()
            .HasForeignKey(l => l.IdMenu);
            
        e.HasOne(l => l.Complement)
            .WithMany()
            .HasForeignKey(l => l.IdComplement);
    });
}

private static void ConfigurePaiement(ModelBuilder modelBuilder)
{
    modelBuilder.Entity<Paiement>(e =>
    {
        e.ToTable("paiement");
        e.HasKey(p => p.IdPaiement);

        e.Property(p => p.IdPaiement).HasColumnName("id_paiement");
        e.Property(p => p.DatePaiement).HasColumnName("date_paiement");
        e.Property(p => p.Montant).HasColumnName("montant").HasColumnType("numeric(10,2)");
        e.Property(p => p.ModePaiement)
            .HasColumnName("mode_paiement")
            .HasColumnType("mode_paiement_enum");
        e.Property(p => p.IdCommande).HasColumnName("id_commande");

        e.HasIndex(p => p.IdCommande).IsUnique();

        e.HasOne(p => p.Commande)
            .WithOne(c => c.Paiement)
            .HasForeignKey<Paiement>(p => p.IdCommande);
    });
}

private static void ConfigureZone(ModelBuilder modelBuilder)
{
    modelBuilder.Entity<Zone>(e =>
    {
        e.ToTable("zone");
        e.HasKey(z => z.IdZone);

        e.Property(z => z.IdZone).HasColumnName("id_zone");
        e.Property(z => z.Libelle).HasColumnName("libelle").HasMaxLength(150);
        e.Property(z => z.PrixLivraison).HasColumnName("prix_livraison").HasColumnType("numeric(10,2)");
    });
}

private static void ConfigureQuartier(ModelBuilder modelBuilder)
{
    modelBuilder.Entity<Quartier>(e =>
    {
        e.ToTable("quartier");
        e.HasKey(q => q.IdQuartier);

        e.Property(q => q.IdQuartier).HasColumnName("id_quartier");
        e.Property(q => q.Libelle).HasColumnName("libelle").HasMaxLength(150);
        e.Property(q => q.IdZone).HasColumnName("id_zone");

        e.HasOne(q => q.Zone)
            .WithMany(z => z.Quartiers)
            .HasForeignKey(q => q.IdZone);
    });}

private static void ConfigureMenuBurger(ModelBuilder modelBuilder)
{
    modelBuilder.Entity<MenuBurger>(e =>
    {
        e.ToTable("menu_burger");
        e.HasKey(x => new { x.IdMenu, x.IdBurger });

        e.Property(x => x.IdMenu).HasColumnName("id_menu");
        e.Property(x => x.IdBurger).HasColumnName("id_burger");
        e.HasOne(x => x.Menu)
            .WithMany(m => m.MenuBurgers)
            .HasForeignKey(x => x.IdMenu);
            
        e.HasOne(x => x.Burger)
            .WithMany()
            .HasForeignKey(x => x.IdBurger);
    });
}

private static void ConfigureMenuComplement(ModelBuilder modelBuilder)
{
    modelBuilder.Entity<MenuComplement>(e =>
    {
        e.ToTable("menu_complement");
        e.HasKey(x => new { x.IdMenu, x.IdComplement });

        e.Property(x => x.IdMenu).HasColumnName("id_menu");
        e.Property(x => x.IdComplement).HasColumnName("id_complement");
        e.HasOne(x => x.Menu)
            .WithMany(m => m.MenuComplements)
            .HasForeignKey(x => x.IdMenu);
            
        e.HasOne(x => x.Complement)
            .WithMany()
            .HasForeignKey(x => x.IdComplement);
    });
}
    private static void ConfigureLivreur(ModelBuilder modelBuilder)
    {
        modelBuilder.Entity<Livreur>(e =>
        {
            e.ToTable("livreur");
            e.HasKey(l => l.IdLivreur);

            e.Property(l => l.IdLivreur).HasColumnName("id_livreur");
            e.Property(l => l.Nom).HasColumnName("nom").HasMaxLength(100).IsRequired();
            e.Property(l => l.Prenom).HasColumnName("prenom").HasMaxLength(100).IsRequired();
            e.Property(l => l.Telephone).HasColumnName("telephone").HasMaxLength(20).IsRequired();

            e.HasIndex(l => l.Telephone).IsUnique();
        });
    }
}

