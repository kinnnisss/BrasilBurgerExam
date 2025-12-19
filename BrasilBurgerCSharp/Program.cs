using BrasilBurgerCSharp.Core;
using BrasilBurgerCSharp.Data;
using BrasilBurgerCSharp.Models;
using BrasilBurgerCSharp.Repository;
using BrasilBurgerCSharp.Repository.Impl;
using BrasilBurgerCSharp.Service;
using BrasilBurgerCSharp.Service.Impl;
using BrasilBurgerCSharp.Service.Payments;
using Microsoft.EntityFrameworkCore;
using Npgsql;

var builder = WebApplication.CreateBuilder(args);

// ----------------------------
// MVC
// ----------------------------
builder.Services.AddControllersWithViews();

// ----------------------------
// Session + HttpContext
// ----------------------------
builder.Services.AddHttpContextAccessor();
builder.Services.AddDistributedMemoryCache();

builder.Services.AddSession(options =>
{
    options.IdleTimeout = TimeSpan.FromHours(2);
    options.Cookie.HttpOnly = true;
    options.Cookie.IsEssential = true;
});


builder.Services.AddDbContext<BrasilBurgerDbContext>(options =>
{
    var baseConnection = builder.Configuration.GetConnectionString("Neon");
    if (string.IsNullOrWhiteSpace(baseConnection))
        throw new InvalidOperationException("ConnectionStrings:Neon manquant dans appsettings.json.");

    var user = Environment.GetEnvironmentVariable("BB_DB_USER");
    var password = Environment.GetEnvironmentVariable("BB_DB_PASSWORD");

    if (string.IsNullOrWhiteSpace(user) || string.IsNullOrWhiteSpace(password))
        throw new InvalidOperationException("Variables d'environnement manquantes : BB_DB_USER et/ou BB_DB_PASSWORD.");

    var csb = new NpgsqlConnectionStringBuilder(baseConnection)
    {
        Username = user,
        Password = password,
        SslMode = SslMode.Require,
        TrustServerCertificate = true,
        Pooling = true
    };

    var dataSourceBuilder = new NpgsqlDataSourceBuilder(csb.ConnectionString);

    dataSourceBuilder.MapEnum<TypeComplement>("type_complement_enum");
    dataSourceBuilder.MapEnum<EtatCommande>("etat_commande_enum");
    dataSourceBuilder.MapEnum<TypeConsommation>("type_consommation_enum");
    dataSourceBuilder.MapEnum<TypeArticle>("type_article_enum");
    dataSourceBuilder.MapEnum<ModePaiement>("mode_paiement_enum");

    var dataSource = dataSourceBuilder.Build();

    options.UseNpgsql(dataSource, npgsql =>
    {
        npgsql.EnableRetryOnFailure(3);
    });
});

builder.Services.AddScoped<ClientHeaderFilter>();

builder.Services.AddControllersWithViews(options =>
{
    options.Filters.Add<ClientHeaderFilter>();
});



builder.Services.AddScoped<ICatalogRepository, CatalogRepository>();
builder.Services.AddScoped<IClientRepository, ClientRepository>();
builder.Services.AddScoped<ICommandeRepository, CommandeRepository>();
builder.Services.AddScoped<ILivraisonRepository, LivraisonRepository>();
builder.Services.AddScoped<IPaiementRepository, PaiementRepository>();


builder.Services.AddScoped<IAuthService, AuthService>();
builder.Services.AddScoped<ICatalogService, CatalogService>();
builder.Services.AddScoped<ICommandeService, CommandeService>();
builder.Services.AddScoped<IPaiementService, PaiementService>();


builder.Services.AddTransient<IPaymentProvider, WavePaymentProvider>();
builder.Services.AddTransient<IPaymentProvider, OmPaymentProvider>();

var app = builder.Build();


if (!app.Environment.IsDevelopment())
{
    app.UseExceptionHandler("/Home/Error");
    app.UseHsts();
}

app.UseHttpsRedirection();
app.UseStaticFiles();

app.UseRouting();

app.UseSession();

app.UseAuthorization();


app.MapControllerRoute(
    name: "default",
    pattern: "{controller=Catalogue}/{action=Index}/{id?}");

app.Run();
