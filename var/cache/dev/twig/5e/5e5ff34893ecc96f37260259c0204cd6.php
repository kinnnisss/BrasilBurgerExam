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

/* client/index.html.twig */
class __TwigTemplate_64d71a90745b09f97433fc1e16f32c58 extends Template
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

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "client/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "client/index.html.twig"));

        $this->parent = $this->load("base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Clients";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        yield "  <div class=\"bb-pagehead\">
    <h1 class=\"bb-pagehead__title\">Clients</h1>
    <div class=\"bb-pagehead__sub\">Rechercher un client et accéder à ses commandes</div>
  </div>

  <div class=\"bb-content cl-page\">

    <section class=\"cl-toolbar\">
      <div class=\"cl-card\">
        ";
        // line 15
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 15, $this->source); })()), 'form_start', ["method" => "get", "attr" => ["class" => "cl-search"]]);
        yield "
          <div class=\"cl-search__field\">
            ";
        // line 17
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 17, $this->source); })()), "q", [], "any", false, false, false, 17), 'widget', ["attr" => ["class" => "cl-input"]]);
        yield "
          </div>
          <button class=\"cl-btn cl-btn--primary\" type=\"submit\">Rechercher</button>
          <a class=\"cl-btn cl-btn--ghost\" href=\"";
        // line 20
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("client_index");
        yield "\">Réinitialiser</a>
        ";
        // line 21
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 21, $this->source); })()), 'form_end');
        yield "
      </div>
    </section>

    <section class=\"cl-list\">
      <div class=\"cl-grid\">
        ";
        // line 27
        $context["items"] = ((CoreExtension::getAttribute($this->env, $this->source, ($context["paged"] ?? null), "items", [], "any", true, true, false, 27)) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["paged"]) || array_key_exists("paged", $context) ? $context["paged"] : (function () { throw new RuntimeError('Variable "paged" does not exist.', 27, $this->source); })()), "items", [], "any", false, false, false, 27)) : (((CoreExtension::getAttribute($this->env, $this->source, ($context["paged"] ?? null), "data", [], "any", true, true, false, 27)) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["paged"]) || array_key_exists("paged", $context) ? $context["paged"] : (function () { throw new RuntimeError('Variable "paged" does not exist.', 27, $this->source); })()), "data", [], "any", false, false, false, 27)) : ([]))));
        // line 28
        yield "
        ";
        // line 29
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["items"]) || array_key_exists("items", $context) ? $context["items"] : (function () { throw new RuntimeError('Variable "items" does not exist.', 29, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
            // line 30
            yield "          ";
            $context["id"] = ((CoreExtension::getAttribute($this->env, $this->source, $context["c"], "idClient", [], "any", true, true, false, 30)) ? (CoreExtension::getAttribute($this->env, $this->source, $context["c"], "idClient", [], "any", false, false, false, 30)) : (((CoreExtension::getAttribute($this->env, $this->source, $context["c"], "id", [], "any", true, true, false, 30)) ? (CoreExtension::getAttribute($this->env, $this->source, $context["c"], "id", [], "any", false, false, false, 30)) : (0))));
            // line 31
            yield "          ";
            $context["nom"] = ((CoreExtension::getAttribute($this->env, $this->source, $context["c"], "nomComplet", [], "any", true, true, false, 31)) ? (CoreExtension::getAttribute($this->env, $this->source, $context["c"], "nomComplet", [], "any", false, false, false, 31)) : ((((CoreExtension::getAttribute($this->env, $this->source,             // line 32
$context["c"], "nom", [], "any", true, true, false, 32) || CoreExtension::getAttribute($this->env, $this->source, $context["c"], "prenom", [], "any", true, true, false, 32))) ? (Twig\Extension\CoreExtension::trim(((((CoreExtension::getAttribute($this->env, $this->source, $context["c"], "nom", [], "any", true, true, false, 32)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "nom", [], "any", false, false, false, 32), "")) : ("")) . " ") . ((CoreExtension::getAttribute($this->env, $this->source, $context["c"], "prenom", [], "any", true, true, false, 32)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "prenom", [], "any", false, false, false, 32), "")) : (""))))) : ("Client"))));
            // line 34
            yield "          ";
            $context["tel"] = ((CoreExtension::getAttribute($this->env, $this->source, $context["c"], "telephone", [], "any", true, true, false, 34)) ? (CoreExtension::getAttribute($this->env, $this->source, $context["c"], "telephone", [], "any", false, false, false, 34)) : (((CoreExtension::getAttribute($this->env, $this->source, $context["c"], "tel", [], "any", true, true, false, 34)) ? (CoreExtension::getAttribute($this->env, $this->source, $context["c"], "tel", [], "any", false, false, false, 34)) : (""))));
            // line 35
            yield "          ";
            $context["login"] = ((CoreExtension::getAttribute($this->env, $this->source, $context["c"], "login", [], "any", true, true, false, 35)) ? (CoreExtension::getAttribute($this->env, $this->source, $context["c"], "login", [], "any", false, false, false, 35)) : (""));
            // line 36
            yield "
          <a class=\"cl-item\" href=\"";
            // line 37
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("client_details", ["id" => (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new RuntimeError('Variable "id" does not exist.', 37, $this->source); })())]), "html", null, true);
            yield "\">
            <div class=\"cl-item__top\">
              <div class=\"cl-avatar\">👤</div>
              <div class=\"cl-meta\">
                <div class=\"cl-name\">";
            // line 41
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["nom"]) || array_key_exists("nom", $context) ? $context["nom"] : (function () { throw new RuntimeError('Variable "nom" does not exist.', 41, $this->source); })()), "html", null, true);
            yield "</div>
                <div class=\"cl-sub\">
                  ";
            // line 43
            if ((($tmp = (isset($context["tel"]) || array_key_exists("tel", $context) ? $context["tel"] : (function () { throw new RuntimeError('Variable "tel" does not exist.', 43, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["tel"]) || array_key_exists("tel", $context) ? $context["tel"] : (function () { throw new RuntimeError('Variable "tel" does not exist.', 43, $this->source); })()), "html", null, true);
            } else {
                yield "Téléphone: —";
            }
            // line 44
            yield "                  ";
            if ((($tmp = (isset($context["login"]) || array_key_exists("login", $context) ? $context["login"] : (function () { throw new RuntimeError('Variable "login" does not exist.', 44, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "<span class=\"cl-dot\">•</span>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["login"]) || array_key_exists("login", $context) ? $context["login"] : (function () { throw new RuntimeError('Variable "login" does not exist.', 44, $this->source); })()), "html", null, true);
            }
            // line 45
            yield "                </div>
              </div>
            </div>

            <div class=\"cl-item__cta\">
              <span class=\"cl-pill\">Voir détails</span>
            </div>
          </a>
        ";
            $context['_iterated'] = true;
        }
        // line 53
        if (!$context['_iterated']) {
            // line 54
            yield "          <div class=\"cl-empty\">
            <div class=\"cl-empty__ico\">🧾</div>
            <div class=\"cl-empty__title\">Aucun client trouvé</div>
            <div class=\"cl-empty__sub\">Essaie un autre mot-clé.</div>
          </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['c'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 60
        yield "      </div>

      <div class=\"cl-pagination\">
        ";
        // line 63
        yield from $this->load("partials/pagination.html.twig", 63)->unwrap()->yield(CoreExtension::merge($context, ["paged" => (isset($context["paged"]) || array_key_exists("paged", $context) ? $context["paged"] : (function () { throw new RuntimeError('Variable "paged" does not exist.', 63, $this->source); })()), "route" => "client_index"]));
        // line 64
        yield "      </div>
    </section>

  </div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "client/index.html.twig";
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
        return array (  217 => 64,  215 => 63,  210 => 60,  199 => 54,  197 => 53,  185 => 45,  179 => 44,  173 => 43,  168 => 41,  161 => 37,  158 => 36,  155 => 35,  152 => 34,  150 => 32,  148 => 31,  145 => 30,  140 => 29,  137 => 28,  135 => 27,  126 => 21,  122 => 20,  116 => 17,  111 => 15,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Clients{% endblock %}

{% block body %}
  <div class=\"bb-pagehead\">
    <h1 class=\"bb-pagehead__title\">Clients</h1>
    <div class=\"bb-pagehead__sub\">Rechercher un client et accéder à ses commandes</div>
  </div>

  <div class=\"bb-content cl-page\">

    <section class=\"cl-toolbar\">
      <div class=\"cl-card\">
        {{ form_start(form, { method: 'get', attr: { class: 'cl-search' } }) }}
          <div class=\"cl-search__field\">
            {{ form_widget(form.q, { attr: { class: 'cl-input' } }) }}
          </div>
          <button class=\"cl-btn cl-btn--primary\" type=\"submit\">Rechercher</button>
          <a class=\"cl-btn cl-btn--ghost\" href=\"{{ path('client_index') }}\">Réinitialiser</a>
        {{ form_end(form) }}
      </div>
    </section>

    <section class=\"cl-list\">
      <div class=\"cl-grid\">
        {% set items = paged.items is defined ? paged.items : (paged.data is defined ? paged.data : []) %}

        {% for c in items %}
          {% set id = c.idClient is defined ? c.idClient : (c.id is defined ? c.id : 0) %}
          {% set nom = c.nomComplet is defined ? c.nomComplet : (
            (c.nom is defined or c.prenom is defined) ? ((c.nom|default('') ~ ' ' ~ c.prenom|default(''))|trim) : 'Client'
          ) %}
          {% set tel = c.telephone is defined ? c.telephone : (c.tel is defined ? c.tel : '') %}
          {% set login = c.login is defined ? c.login : '' %}

          <a class=\"cl-item\" href=\"{{ path('client_details', { id: id }) }}\">
            <div class=\"cl-item__top\">
              <div class=\"cl-avatar\">👤</div>
              <div class=\"cl-meta\">
                <div class=\"cl-name\">{{ nom }}</div>
                <div class=\"cl-sub\">
                  {% if tel %}{{ tel }}{% else %}Téléphone: —{% endif %}
                  {% if login %}<span class=\"cl-dot\">•</span>{{ login }}{% endif %}
                </div>
              </div>
            </div>

            <div class=\"cl-item__cta\">
              <span class=\"cl-pill\">Voir détails</span>
            </div>
          </a>
        {% else %}
          <div class=\"cl-empty\">
            <div class=\"cl-empty__ico\">🧾</div>
            <div class=\"cl-empty__title\">Aucun client trouvé</div>
            <div class=\"cl-empty__sub\">Essaie un autre mot-clé.</div>
          </div>
        {% endfor %}
      </div>

      <div class=\"cl-pagination\">
        {% include 'partials/pagination.html.twig' with { paged: paged, route: 'client_index' } %}
      </div>
    </section>

  </div>
{% endblock %}


", "client/index.html.twig", "C:\\Users\\oper\\Desktop\\L3_GLRS_COURS\\SEM1\\BrasilBurgerExam\\BrasilBurgerExam\\templates\\client\\index.html.twig");
    }
}
