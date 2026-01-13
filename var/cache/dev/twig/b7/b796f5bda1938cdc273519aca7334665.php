<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* partials/sidebar.html.twig */
class __TwigTemplate_b545ecfac49e0319a159167209d12f1c extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "partials/sidebar.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "partials/sidebar.html.twig"));

        // line 2
        yield "
<nav class=\"sidebar\" aria-label=\"Navigation\">
  <div class=\"sidebar__top\">
    <div class=\"sidebar__brand\">
      <div class=\"sidebar__avatar\">👤</div>
      <div>
        <div class=\"sidebar__title\">Brasil Burger</div>
        <div class=\"sidebar__role\">Admin</div>
      </div>
    </div>

    <ul class=\"sidebar__menu\">
      <li class=\"sidebar__item\">
        <a class=\"sidebar__link ";
        // line 15
        if ((is_string($_v0 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 15, $this->source); })()), "request", [], "any", false, false, false, 15), "attributes", [], "any", false, false, false, 15), "get", ["_route"], "method", false, false, false, 15)) && is_string($_v1 = "dashboard") && str_starts_with($_v0, $_v1))) {
            yield "is-active";
        }
        yield "\"
           href=\"";
        // line 16
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("dashboard_index");
        yield "\">
          <span class=\"sidebar__icon\">
          <svg viewBox=\"0 0 24 24\">
            <path d=\"M3 13h8V3H3zM13 21h8V11h-8zM13 3h8v6h-8zM3 21h8v-6H3z\"/>
          </svg>
        </span>
          <span>Dashboard</span>
        </a>
      </li>
";
        // line 62
        yield "
      <li class=\"sidebar__item\">
        <a class=\"sidebar__link ";
        // line 64
        if ((is_string($_v2 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 64, $this->source); })()), "request", [], "any", false, false, false, 64), "attributes", [], "any", false, false, false, 64), "get", ["_route"], "method", false, false, false, 64)) && is_string($_v3 = "commande") && str_starts_with($_v2, $_v3))) {
            yield "is-active";
        }
        yield "\"
           href=\"";
        // line 65
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("commande_index");
        yield "\">
      <span class=\"sidebar__icon\">
        <svg viewBox=\"0 0 24 24\">
          <path d=\"M3 6h18l-2 13H5z\"/>
          <path d=\"M16 10a4 4 0 0 1-8 0\"/>
        </svg>
      </span>
        <span>Commandes</span>
        </a>
      </li>

      <li class=\"sidebar__item\">
        <a class=\"sidebar__link ";
        // line 77
        if ((is_string($_v4 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 77, $this->source); })()), "request", [], "any", false, false, false, 77), "attributes", [], "any", false, false, false, 77), "get", ["_route"], "method", false, false, false, 77)) && is_string($_v5 = "livraison") && str_starts_with($_v4, $_v5))) {
            yield "is-active";
        }
        yield "\"
           href=\"";
        // line 78
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("livraison_board");
        yield "\">
      <span class=\"sidebar__icon\">
        <svg viewBox=\"0 0 24 24\">
          <path d=\"M3 7h13v10H3z\"/>
          <path d=\"M16 10h4l1 2v5h-5z\"/>
          <circle cx=\"7\" cy=\"19\" r=\"1.5\"/>
          <circle cx=\"18\" cy=\"19\" r=\"1.5\"/>
        </svg>
      </span>
        <span>Livraisons</span>
        </a>
      </li>

      <li class=\"sidebar__item\">
        <a class=\"sidebar__link ";
        // line 92
        if ((is_string($_v6 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 92, $this->source); })()), "request", [], "any", false, false, false, 92), "attributes", [], "any", false, false, false, 92), "get", ["_route"], "method", false, false, false, 92)) && is_string($_v7 = "client") && str_starts_with($_v6, $_v7))) {
            yield "is-active";
        }
        yield "\"
           href=\"";
        // line 93
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("client_index");
        yield "\">
          <span class=\"sidebar__icon\">
            <svg viewBox=\"0 0 24 24\">
              <circle cx=\"12\" cy=\"8\" r=\"4\"/>
              <path d=\"M4 20c0-4 16-4 16 0\"/>
            </svg>
          </span>
          <span>Clients</span>
        </a>
      </li>
    </ul>
  </div>

  <div class=\"sidebar__bottom\">
    <a class=\"sidebar__logout\" href=\"";
        // line 107
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
        yield "\">
    <span class=\"sidebar__icon\">
      <svg viewBox=\"0 0 24 24\">
        <path d=\"M10 17l5-5-5-5\"/>
        <path d=\"M15 12H3\"/>
        <path d=\"M19 4h2v16h-2\"/>
      </svg>
    </span>
    <span>Deconnexion</span>
    </a>
  </div>
</nav>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "partials/sidebar.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  152 => 107,  135 => 93,  129 => 92,  112 => 78,  106 => 77,  91 => 65,  85 => 64,  81 => 62,  69 => 16,  63 => 15,  48 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# templates/partials/sidebar.html.twig #}

<nav class=\"sidebar\" aria-label=\"Navigation\">
  <div class=\"sidebar__top\">
    <div class=\"sidebar__brand\">
      <div class=\"sidebar__avatar\">👤</div>
      <div>
        <div class=\"sidebar__title\">Brasil Burger</div>
        <div class=\"sidebar__role\">Admin</div>
      </div>
    </div>

    <ul class=\"sidebar__menu\">
      <li class=\"sidebar__item\">
        <a class=\"sidebar__link {% if app.request.attributes.get('_route') starts with 'dashboard' %}is-active{% endif %}\"
           href=\"{{ path('dashboard_index') }}\">
          <span class=\"sidebar__icon\">
          <svg viewBox=\"0 0 24 24\">
            <path d=\"M3 13h8V3H3zM13 21h8V11h-8zM13 3h8v6h-8zM3 21h8v-6H3z\"/>
          </svg>
        </span>
          <span>Dashboard</span>
        </a>
      </li>
{#
      <li class=\"sidebar__item\">
        <a class=\"sidebar__link {% if app.request.attributes.get('_route') starts with 'burger' %}is-active{% endif %}\"
           href=\"{{ path('burger_index') }}\">
          <span class=\"sidebar__icon\"> 
           <svg viewBox=\"0 0 24 24\">
            <path d=\"M3 10h18M4 14h16M5 18h14\"/>
            <path d=\"M4 10a8 4 0 0 1 16 0\"/>
            </svg>
          </span>
          <span>Burgers</span>
        </a>
      </li>

      <li class=\"sidebar__item\">
        <a class=\"sidebar__link {% if app.request.attributes.get('_route') starts with 'menu' %}is-active{% endif %}\"
           href=\"{{ path('menu_index') }}\">
        <span class=\"sidebar__icon\">
          <svg viewBox=\"0 0 24 24\">
            <path d=\"M4 6h16M4 12h16M4 18h16\"/>
          </svg>
        </span>
        <span>Menus</span>
        </a>
      </li>

      <li class=\"sidebar__item\">
        <a class=\"sidebar__link {% if app.request.attributes.get('_route') starts with 'complement' %}is-active{% endif %}\"
           href=\"{{ path('complement_index') }}\">
        <span class=\"sidebar__icon\">
          <svg viewBox=\"0 0 24 24\">
            <path d=\"M12 5v14M5 12h14\"/>
          </svg>
        </span>
        <span>Complement</span>
        </a>
      </li>#}

      <li class=\"sidebar__item\">
        <a class=\"sidebar__link {% if app.request.attributes.get('_route') starts with 'commande' %}is-active{% endif %}\"
           href=\"{{ path('commande_index') }}\">
      <span class=\"sidebar__icon\">
        <svg viewBox=\"0 0 24 24\">
          <path d=\"M3 6h18l-2 13H5z\"/>
          <path d=\"M16 10a4 4 0 0 1-8 0\"/>
        </svg>
      </span>
        <span>Commandes</span>
        </a>
      </li>

      <li class=\"sidebar__item\">
        <a class=\"sidebar__link {% if app.request.attributes.get('_route') starts with 'livraison' %}is-active{% endif %}\"
           href=\"{{ path('livraison_board') }}\">
      <span class=\"sidebar__icon\">
        <svg viewBox=\"0 0 24 24\">
          <path d=\"M3 7h13v10H3z\"/>
          <path d=\"M16 10h4l1 2v5h-5z\"/>
          <circle cx=\"7\" cy=\"19\" r=\"1.5\"/>
          <circle cx=\"18\" cy=\"19\" r=\"1.5\"/>
        </svg>
      </span>
        <span>Livraisons</span>
        </a>
      </li>

      <li class=\"sidebar__item\">
        <a class=\"sidebar__link {% if app.request.attributes.get('_route') starts with 'client' %}is-active{% endif %}\"
           href=\"{{ path('client_index') }}\">
          <span class=\"sidebar__icon\">
            <svg viewBox=\"0 0 24 24\">
              <circle cx=\"12\" cy=\"8\" r=\"4\"/>
              <path d=\"M4 20c0-4 16-4 16 0\"/>
            </svg>
          </span>
          <span>Clients</span>
        </a>
      </li>
    </ul>
  </div>

  <div class=\"sidebar__bottom\">
    <a class=\"sidebar__logout\" href=\"{{ path('app_logout') }}\">
    <span class=\"sidebar__icon\">
      <svg viewBox=\"0 0 24 24\">
        <path d=\"M10 17l5-5-5-5\"/>
        <path d=\"M15 12H3\"/>
        <path d=\"M19 4h2v16h-2\"/>
      </svg>
    </span>
    <span>Deconnexion</span>
    </a>
  </div>
</nav>
", "partials/sidebar.html.twig", "C:\\Users\\oper\\Desktop\\L3_GLRS_COURS\\SEM1\\BrasilBurgerExam\\BrasilBurgerExam\\templates\\partials\\sidebar.html.twig");
    }
}
