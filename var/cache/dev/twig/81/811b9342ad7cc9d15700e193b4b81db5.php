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

/* security/login.html.twig */
class __TwigTemplate_0a60cb6306d353f88b8eb30d70d721e1 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/login.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/login.html.twig"));

        // line 2
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
  <meta charset=\"UTF-8\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
  <title>Connexion - Brasil Burger</title>

  <link rel=\"stylesheet\" href=\"";
        // line 9
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("styles/app.css"), "html", null, true);
        yield "\">
</head>

<body class=\"bb-auth\">
  <main class=\"bb-auth__wrap\">
    <section class=\"bb-auth-card\" aria-label=\"Connexion gestionnaire\">

      <div class=\"bb-auth-card__top\">
        <div class=\"bb-auth-logo\" aria-hidden=\"true\">
          <span class=\"bb-auth-logo__emoji\">🍔</span>
        </div>

        <h1 class=\"bb-auth-title\">Brasil Burger</h1>
        <p class=\"bb-auth-subtitle\">Espace Gestionnaire</p>
      </div>

      ";
        // line 25
        if ((($tmp = (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 25, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 26
            yield "        <div class=\"bb-auth-alert\" role=\"alert\">
          Identifiant ou mot de passe incorrect.
        </div>
      ";
        }
        // line 30
        yield "
      <form class=\"bb-auth-form\" method=\"post\" action=\"";
        // line 31
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
        yield "\">
        <div class=\"bb-field\">
          <label class=\"bb-label\" for=\"login\">Login <span class=\"bb-required\">*</span></label>
          <input
            class=\"bb-input\"
            type=\"text\"
            id=\"login\"
            name=\"login\"
            value=\"";
        // line 39
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["last_username"]) || array_key_exists("last_username", $context) ? $context["last_username"] : (function () { throw new RuntimeError('Variable "last_username" does not exist.', 39, $this->source); })()), "html", null, true);
        yield "\"
            placeholder=\"Votre identifiant\"
            autocomplete=\"username\"
            required
          >
        </div>

        <div class=\"bb-field\">
          <label class=\"bb-label\" for=\"password\">Mot de passe <span class=\"bb-required\">*</span></label>
          <input
            class=\"bb-input\"
            type=\"password\"
            id=\"password\"
            name=\"password\"
            placeholder=\"••••••••\"
            autocomplete=\"current-password\"
            required
          >
        </div>

        <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 59
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("authenticate"), "html", null, true);
        yield "\">

        <div class=\"bb-remember\">
          <label class=\"bb-remember__label\">
            <input type=\"checkbox\" name=\"_remember_me\">
            <span>Rester connecté</span>
          </label>
        </div>

        <button class=\"bb-auth-btn\" type=\"submit\">Se connecter</button>
      </form>

      <div class=\"bb-auth-divider\"></div>

      <div class=\"bb-auth-footer\">
        <div class=\"bb-auth-footer__text\">Vous êtes client ?</div>

        <a class=\"bb-auth-link\"
          href=\"";
        // line 77
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["client_app_url"]) || array_key_exists("client_app_url", $context) ? $context["client_app_url"] : (function () { throw new RuntimeError('Variable "client_app_url" does not exist.', 77, $this->source); })()), "html", null, true);
        yield "\"
          target=\"_blank\"
          rel=\"noopener\">
          Accéder à l'interface client
        </a>
      </div>

  
    </section>
  </main>
</body>
</html>
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
        return "security/login.html.twig";
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
        return array (  142 => 77,  121 => 59,  98 => 39,  87 => 31,  84 => 30,  78 => 26,  76 => 25,  57 => 9,  48 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# templates/security/login.html.twig #}
<!DOCTYPE html>
<html lang=\"fr\">
<head>
  <meta charset=\"UTF-8\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
  <title>Connexion - Brasil Burger</title>

  <link rel=\"stylesheet\" href=\"{{ asset('styles/app.css') }}\">
</head>

<body class=\"bb-auth\">
  <main class=\"bb-auth__wrap\">
    <section class=\"bb-auth-card\" aria-label=\"Connexion gestionnaire\">

      <div class=\"bb-auth-card__top\">
        <div class=\"bb-auth-logo\" aria-hidden=\"true\">
          <span class=\"bb-auth-logo__emoji\">🍔</span>
        </div>

        <h1 class=\"bb-auth-title\">Brasil Burger</h1>
        <p class=\"bb-auth-subtitle\">Espace Gestionnaire</p>
      </div>

      {% if error %}
        <div class=\"bb-auth-alert\" role=\"alert\">
          Identifiant ou mot de passe incorrect.
        </div>
      {% endif %}

      <form class=\"bb-auth-form\" method=\"post\" action=\"{{ path('app_login') }}\">
        <div class=\"bb-field\">
          <label class=\"bb-label\" for=\"login\">Login <span class=\"bb-required\">*</span></label>
          <input
            class=\"bb-input\"
            type=\"text\"
            id=\"login\"
            name=\"login\"
            value=\"{{ last_username }}\"
            placeholder=\"Votre identifiant\"
            autocomplete=\"username\"
            required
          >
        </div>

        <div class=\"bb-field\">
          <label class=\"bb-label\" for=\"password\">Mot de passe <span class=\"bb-required\">*</span></label>
          <input
            class=\"bb-input\"
            type=\"password\"
            id=\"password\"
            name=\"password\"
            placeholder=\"••••••••\"
            autocomplete=\"current-password\"
            required
          >
        </div>

        <input type=\"hidden\" name=\"_csrf_token\" value=\"{{ csrf_token('authenticate') }}\">

        <div class=\"bb-remember\">
          <label class=\"bb-remember__label\">
            <input type=\"checkbox\" name=\"_remember_me\">
            <span>Rester connecté</span>
          </label>
        </div>

        <button class=\"bb-auth-btn\" type=\"submit\">Se connecter</button>
      </form>

      <div class=\"bb-auth-divider\"></div>

      <div class=\"bb-auth-footer\">
        <div class=\"bb-auth-footer__text\">Vous êtes client ?</div>

        <a class=\"bb-auth-link\"
          href=\"{{ client_app_url }}\"
          target=\"_blank\"
          rel=\"noopener\">
          Accéder à l'interface client
        </a>
      </div>

  
    </section>
  </main>
</body>
</html>
", "security/login.html.twig", "C:\\Users\\oper\\Desktop\\L3_GLRS_COURS\\SEM1\\BrasilBurgerExam\\BrasilBurgerExam\\templates\\security\\login.html.twig");
    }
}
