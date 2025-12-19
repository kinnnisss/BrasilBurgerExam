using BrasilBurgerCSharp.Core;
using BrasilBurgerCSharp.Repository;
using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.Filters;

namespace BrasilBurgerCSharp.Core;

public sealed class ClientHeaderFilter : IAsyncActionFilter
{
    private readonly IClientRepository _clientRepo;

    public ClientHeaderFilter(IClientRepository clientRepo)
    {
        _clientRepo = clientRepo;
    }

    public async Task OnActionExecutionAsync(ActionExecutingContext context, ActionExecutionDelegate next)
    {
        if (context.Controller is Controller controller)
        {
            var clientId = ClientSession.GetClientId(controller.HttpContext);
            if (clientId is not null)
            {
                var client = await _clientRepo.GetByIdAsync(clientId.Value, context.HttpContext.RequestAborted);

                if (client is not null)
                {
                    var fullName = $"{client.Prenom} {client.Nom}".Trim();
                    controller.ViewBag.ClientName = string.IsNullOrWhiteSpace(fullName) ? client.Login : fullName;
                }
            }
        }

        await next();
    }
}
