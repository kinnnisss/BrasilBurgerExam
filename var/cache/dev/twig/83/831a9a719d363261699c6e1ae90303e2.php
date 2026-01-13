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

/* dashboard/index.html.twig */
class __TwigTemplate_94d6aefe6c8b05d06a73993d3f806f29 extends Template
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
            'page_title' => [$this, 'block_page_title'],
            'page_subtitle' => [$this, 'block_page_subtitle'],
            'body' => [$this, 'block_body'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 2
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard/index.html.twig"));

        $this->parent = $this->load("base.html.twig", 2);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 4
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

        yield "Dashboard";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_page_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "page_title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "page_title"));

        yield "Tableau de bord";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 6
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_page_subtitle(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "page_subtitle"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "page_subtitle"));

        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "l d F Y"), "html", null, true);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 8
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

        // line 9
        yield "
  ";
        // line 13
        yield "  <section class=\"db-cards\">

    <article class=\"db-card\">
      <div class=\"db-card__icon is-orange\">🛒</div>
      <div class=\"db-card__meta\">
        <div class=\"db-card__label\">Commandes en cours</div>
        <div class=\"db-card__value\">";
        // line 19
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["dto"]) || array_key_exists("dto", $context) ? $context["dto"] : (function () { throw new RuntimeError('Variable "dto" does not exist.', 19, $this->source); })()), "enCours", [], "any", false, false, false, 19), "html", null, true);
        yield "</div>
      </div>
    </article>

    <article class=\"db-card\">
      <div class=\"db-card__icon is-blue\">✅</div>
      <div class=\"db-card__meta\">
        <div class=\"db-card__label\">Commandes validées</div>
        <div class=\"db-card__value\">";
        // line 27
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["dto"]) || array_key_exists("dto", $context) ? $context["dto"] : (function () { throw new RuntimeError('Variable "dto" does not exist.', 27, $this->source); })()), "validees", [], "any", false, false, false, 27), "html", null, true);
        yield "</div>
      </div>
    </article>

    <article class=\"db-card\">
      <div class=\"db-card__icon is-green\">✅</div>
      <div class=\"db-card__meta\">
        <div class=\"db-card__label\">Commandes terminées</div>
        <div class=\"db-card__value\">";
        // line 35
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["dto"]) || array_key_exists("dto", $context) ? $context["dto"] : (function () { throw new RuntimeError('Variable "dto" does not exist.', 35, $this->source); })()), "terminees", [], "any", false, false, false, 35), "html", null, true);
        yield "</div>
      </div>
    </article>

    <article class=\"db-card\">
      <div class=\"db-card__icon is-red\">✖</div>
      <div class=\"db-card__meta\">
        <div class=\"db-card__label\">Commandes annulées</div>
        <div class=\"db-card__value\">";
        // line 43
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["dto"]) || array_key_exists("dto", $context) ? $context["dto"] : (function () { throw new RuntimeError('Variable "dto" does not exist.', 43, $this->source); })()), "annulees", [], "any", false, false, false, 43), "html", null, true);
        yield "</div>
      </div>
    </article>

    <article class=\"db-card\">
      <div class=\"db-card__icon is-green\">\$</div>
      <div class=\"db-card__meta\">
        <div class=\"db-card__label\">Recettes du jour</div>
        <div class=\"db-card__value\">
          ";
        // line 52
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["dto"]) || array_key_exists("dto", $context) ? $context["dto"] : (function () { throw new RuntimeError('Variable "dto" does not exist.', 52, $this->source); })()), "recettes", [], "any", false, false, false, 52), "html", null, true);
        yield " <span class=\"db-card__unit\">FCFA</span>
        </div>
      </div>
    </article>

  </section>

  ";
        // line 62
        yield "  <section class=\"db-panel\">
    <div class=\"db-panel__head\">
      <h3 class=\"db-panel__title\">Ventes de la semaine</h3>
      <span class=\"db-panel__trend\">📈</span>
    </div>

    <div class=\"db-chart\">
      <canvas id=\"salesWeekChart\" height=\"120\"></canvas>
    </div>
  </section>

  ";
        // line 76
        yield "  <section class=\"db-panel\">
    <div class=\"db-panel__head\">
      <h3 class=\"db-panel__title\">Produits les plus vendus</h3>
    </div>

    <div class=\"db-top\">
      ";
        // line 82
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["dto"]) || array_key_exists("dto", $context) ? $context["dto"] : (function () { throw new RuntimeError('Variable "dto" does not exist.', 82, $this->source); })()), "topBurgers", [], "any", false, false, false, 82));
        $context['_iterated'] = false;
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 83
            yield "        <div class=\"db-top__row\">
          <div class=\"db-top__left\">
            <div class=\"db-top__rank\">";
            // line 85
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 85), "html", null, true);
            yield "</div>
            <div class=\"db-top__info\">
              <div class=\"db-top__name\">";
            // line 87
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "nom", [], "any", false, false, false, 87), "html", null, true);
            yield "</div>
              <div class=\"db-top__sub\">";
            // line 88
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "totalQuantite", [], "any", false, false, false, 88), "html", null, true);
            yield " vendus</div>
            </div>
          </div>

          ";
            // line 93
            yield "          <div class=\"db-top__amount\">— FCFA</div>
        </div>
      ";
            $context['_iterated'] = true;
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        // line 95
        if (!$context['_iterated']) {
            // line 96
            yield "        <div class=\"db-empty\">Aucune vente aujourd’hui.</div>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['item'], $context['_parent'], $context['_iterated'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 98
        yield "    </div>
  </section>

  ";
        // line 104
        yield "  <section class=\"db-panel\">
    <div class=\"db-panel__head\">
      <h3 class=\"db-panel__title\">Dernières commandes</h3>
    </div>

    <div class=\"db-panel__hint\">
      Aujourd’hui — ";
        // line 110
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "d/m/Y"), "html", null, true);
        yield "
    </div>

    <div class=\"db-table\">
      <table class=\"db-table__table\">
        <thead>
        <tr>
          <th>Référence</th>
          <th>Client</th>
          <th>Date</th>
          <th>Montant</th>
          <th>État</th>
        </tr>
        </thead>

        <tbody>
        ";
        // line 126
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["lastOrders"]) || array_key_exists("lastOrders", $context) ? $context["lastOrders"] : (function () { throw new RuntimeError('Variable "lastOrders" does not exist.', 126, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
            // line 127
            yield "          <tr>
            <td class=\"db-strong\">";
            // line 128
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "reference", [], "any", false, false, false, 128), "html", null, true);
            yield "</td>
            <td>
              <div class=\"db-client\">
                <div class=\"db-client__name\">";
            // line 131
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "clientNomComplet", [], "any", false, false, false, 131), "html", null, true);
            yield "</div>
                <div class=\"db-client__tel\">";
            // line 132
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "clientTelephone", [], "any", false, false, false, 132), "html", null, true);
            yield "</div>
              </div>
            </td>
            <td>";
            // line 135
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "dateCommande", [], "any", false, false, false, 135), "d/m/Y"), "html", null, true);
            yield "</td>
            <td class=\"db-amount\">";
            // line 136
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "montantTotal", [], "any", false, false, false, 136), "html", null, true);
            yield " FCFA</td>
            <td>
              <span class=\"db-badge
                ";
            // line 139
            if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "etat", [], "any", false, false, false, 139), "value", [], "any", false, false, false, 139) == "ENCOURS")) {
                yield " is-warn";
            }
            // line 140
            yield "                ";
            if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "etat", [], "any", false, false, false, 140), "value", [], "any", false, false, false, 140) == "VALIDEE")) {
                yield " is-blue";
            }
            // line 141
            yield "                ";
            if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "etat", [], "any", false, false, false, 141), "value", [], "any", false, false, false, 141) == "TERMINER")) {
                yield " is-green";
            }
            // line 142
            yield "                ";
            if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "etat", [], "any", false, false, false, 142), "value", [], "any", false, false, false, 142) == "ANNULEE")) {
                yield " is-red";
            }
            // line 143
            yield "              \">
                ";
            // line 144
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "etat", [], "any", false, false, false, 144), "value", [], "any", false, false, false, 144), "html", null, true);
            yield "
              </span>
            </td>
          </tr>
        ";
            $context['_iterated'] = true;
        }
        // line 148
        if (!$context['_iterated']) {
            // line 149
            yield "          <tr>
            <td colspan=\"5\" class=\"db-empty-row\">Aucune commande aujourd’hui.</td>
          </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['c'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 153
        yield "        </tbody>
      </table>
    </div>
  </section>

";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 160
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 161
        yield "  <script src=\"https://cdn.jsdelivr.net/npm/chart.js\"></script>

  <script>
    const labels = ";
        // line 164
        yield json_encode((isset($context["weekLabels"]) || array_key_exists("weekLabels", $context) ? $context["weekLabels"] : (function () { throw new RuntimeError('Variable "weekLabels" does not exist.', 164, $this->source); })()));
        yield ";
    const values = ";
        // line 165
        yield json_encode((isset($context["weekValues"]) || array_key_exists("weekValues", $context) ? $context["weekValues"] : (function () { throw new RuntimeError('Variable "weekValues" does not exist.', 165, $this->source); })()));
        yield ";

    const ctx = document.getElementById('salesWeekChart');

    new Chart(ctx, {
      type: 'bar',
      data: {
        labels,
        datasets: [{
          label: 'Recettes (FCFA)',
          data: values,
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: { display: false },
          tooltip: { enabled: true }
        },
        scales: {
          y: {
            beginAtZero: true,
            ticks: {
              callback: function(value) {
                return value + ' FCFA';
              }
            }
          }
        }
      }
    });
  </script>
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
        return "dashboard/index.html.twig";
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
        return array (  443 => 165,  439 => 164,  434 => 161,  421 => 160,  405 => 153,  396 => 149,  394 => 148,  385 => 144,  382 => 143,  377 => 142,  372 => 141,  367 => 140,  363 => 139,  357 => 136,  353 => 135,  347 => 132,  343 => 131,  337 => 128,  334 => 127,  329 => 126,  310 => 110,  302 => 104,  297 => 98,  290 => 96,  288 => 95,  274 => 93,  267 => 88,  263 => 87,  258 => 85,  254 => 83,  236 => 82,  228 => 76,  215 => 62,  205 => 52,  193 => 43,  182 => 35,  171 => 27,  160 => 19,  152 => 13,  149 => 9,  136 => 8,  113 => 6,  90 => 5,  67 => 4,  44 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# templates/dashboard/index.html.twig #}
{% extends 'base.html.twig' %}

{% block title %}Dashboard{% endblock %}
{% block page_title %}Tableau de bord{% endblock %}
{% block page_subtitle %}{{ \"now\"|date(\"l d F Y\") }}{% endblock %}

{% block body %}

  {# =======================
     Cartes statistiques du jour
     ======================= #}
  <section class=\"db-cards\">

    <article class=\"db-card\">
      <div class=\"db-card__icon is-orange\">🛒</div>
      <div class=\"db-card__meta\">
        <div class=\"db-card__label\">Commandes en cours</div>
        <div class=\"db-card__value\">{{ dto.enCours }}</div>
      </div>
    </article>

    <article class=\"db-card\">
      <div class=\"db-card__icon is-blue\">✅</div>
      <div class=\"db-card__meta\">
        <div class=\"db-card__label\">Commandes validées</div>
        <div class=\"db-card__value\">{{ dto.validees }}</div>
      </div>
    </article>

    <article class=\"db-card\">
      <div class=\"db-card__icon is-green\">✅</div>
      <div class=\"db-card__meta\">
        <div class=\"db-card__label\">Commandes terminées</div>
        <div class=\"db-card__value\">{{ dto.terminees }}</div>
      </div>
    </article>

    <article class=\"db-card\">
      <div class=\"db-card__icon is-red\">✖</div>
      <div class=\"db-card__meta\">
        <div class=\"db-card__label\">Commandes annulées</div>
        <div class=\"db-card__value\">{{ dto.annulees }}</div>
      </div>
    </article>

    <article class=\"db-card\">
      <div class=\"db-card__icon is-green\">\$</div>
      <div class=\"db-card__meta\">
        <div class=\"db-card__label\">Recettes du jour</div>
        <div class=\"db-card__value\">
          {{ dto.recettes }} <span class=\"db-card__unit\">FCFA</span>
        </div>
      </div>
    </article>

  </section>

  {# =======================
     Ventes de la semaine (Chart.js)
     ======================= #}
  <section class=\"db-panel\">
    <div class=\"db-panel__head\">
      <h3 class=\"db-panel__title\">Ventes de la semaine</h3>
      <span class=\"db-panel__trend\">📈</span>
    </div>

    <div class=\"db-chart\">
      <canvas id=\"salesWeekChart\" height=\"120\"></canvas>
    </div>
  </section>

  {# =======================
     Top burgers du jour
     ======================= #}
  <section class=\"db-panel\">
    <div class=\"db-panel__head\">
      <h3 class=\"db-panel__title\">Produits les plus vendus</h3>
    </div>

    <div class=\"db-top\">
      {% for item in dto.topBurgers %}
        <div class=\"db-top__row\">
          <div class=\"db-top__left\">
            <div class=\"db-top__rank\">{{ loop.index }}</div>
            <div class=\"db-top__info\">
              <div class=\"db-top__name\">{{ item.nom }}</div>
              <div class=\"db-top__sub\">{{ item.totalQuantite }} vendus</div>
            </div>
          </div>

          {# CA par produit non fourni dans TopBurgerDto, on laisse volontairement en placeholder #}
          <div class=\"db-top__amount\">— FCFA</div>
        </div>
      {% else %}
        <div class=\"db-empty\">Aucune vente aujourd’hui.</div>
      {% endfor %}
    </div>
  </section>

  {# =======================
     Dernières commandes du jour
     ======================= #}
  <section class=\"db-panel\">
    <div class=\"db-panel__head\">
      <h3 class=\"db-panel__title\">Dernières commandes</h3>
    </div>

    <div class=\"db-panel__hint\">
      Aujourd’hui — {{ \"now\"|date(\"d/m/Y\") }}
    </div>

    <div class=\"db-table\">
      <table class=\"db-table__table\">
        <thead>
        <tr>
          <th>Référence</th>
          <th>Client</th>
          <th>Date</th>
          <th>Montant</th>
          <th>État</th>
        </tr>
        </thead>

        <tbody>
        {% for c in lastOrders %}
          <tr>
            <td class=\"db-strong\">{{ c.reference }}</td>
            <td>
              <div class=\"db-client\">
                <div class=\"db-client__name\">{{ c.clientNomComplet }}</div>
                <div class=\"db-client__tel\">{{ c.clientTelephone }}</div>
              </div>
            </td>
            <td>{{ c.dateCommande|date('d/m/Y') }}</td>
            <td class=\"db-amount\">{{ c.montantTotal }} FCFA</td>
            <td>
              <span class=\"db-badge
                {% if c.etat.value == 'ENCOURS' %} is-warn{% endif %}
                {% if c.etat.value == 'VALIDEE' %} is-blue{% endif %}
                {% if c.etat.value == 'TERMINER' %} is-green{% endif %}
                {% if c.etat.value == 'ANNULEE' %} is-red{% endif %}
              \">
                {{ c.etat.value }}
              </span>
            </td>
          </tr>
        {% else %}
          <tr>
            <td colspan=\"5\" class=\"db-empty-row\">Aucune commande aujourd’hui.</td>
          </tr>
        {% endfor %}
        </tbody>
      </table>
    </div>
  </section>

{% endblock %}

{% block javascripts %}
  <script src=\"https://cdn.jsdelivr.net/npm/chart.js\"></script>

  <script>
    const labels = {{ weekLabels|json_encode|raw }};
    const values = {{ weekValues|json_encode|raw }};

    const ctx = document.getElementById('salesWeekChart');

    new Chart(ctx, {
      type: 'bar',
      data: {
        labels,
        datasets: [{
          label: 'Recettes (FCFA)',
          data: values,
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: { display: false },
          tooltip: { enabled: true }
        },
        scales: {
          y: {
            beginAtZero: true,
            ticks: {
              callback: function(value) {
                return value + ' FCFA';
              }
            }
          }
        }
      }
    });
  </script>
{% endblock %}
", "dashboard/index.html.twig", "C:\\Users\\oper\\Desktop\\L3_GLRS_COURS\\SEM1\\BrasilBurgerExam\\BrasilBurgerExam\\templates\\dashboard\\index.html.twig");
    }
}
