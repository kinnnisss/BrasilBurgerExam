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

/* client/details.html.twig */
class __TwigTemplate_93b9d38f1eb09547db9096dd4c766828 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "client/details.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "client/details.html.twig"));

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

        yield "Détails client";
        
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
        yield "  ";
        $context["client"] = ((CoreExtension::getAttribute($this->env, $this->source, ($context["dto"] ?? null), "client", [], "any", true, true, false, 6)) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["dto"]) || array_key_exists("dto", $context) ? $context["dto"] : (function () { throw new RuntimeError('Variable "dto" does not exist.', 6, $this->source); })()), "client", [], "any", false, false, false, 6)) : (((CoreExtension::getAttribute($this->env, $this->source, ($context["dto"] ?? null), "clientInfo", [], "any", true, true, false, 6)) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["dto"]) || array_key_exists("dto", $context) ? $context["dto"] : (function () { throw new RuntimeError('Variable "dto" does not exist.', 6, $this->source); })()), "clientInfo", [], "any", false, false, false, 6)) : (null))));
        // line 7
        yield "  ";
        $context["commandesPaged"] = ((CoreExtension::getAttribute($this->env, $this->source, ($context["dto"] ?? null), "commandes", [], "any", true, true, false, 7)) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["dto"]) || array_key_exists("dto", $context) ? $context["dto"] : (function () { throw new RuntimeError('Variable "dto" does not exist.', 7, $this->source); })()), "commandes", [], "any", false, false, false, 7)) : (((CoreExtension::getAttribute($this->env, $this->source, ($context["dto"] ?? null), "paged", [], "any", true, true, false, 7)) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["dto"]) || array_key_exists("dto", $context) ? $context["dto"] : (function () { throw new RuntimeError('Variable "dto" does not exist.', 7, $this->source); })()), "paged", [], "any", false, false, false, 7)) : (null))));
        // line 8
        yield "  ";
        $context["commandes"] = ((((isset($context["commandesPaged"]) || array_key_exists("commandesPaged", $context) ? $context["commandesPaged"] : (function () { throw new RuntimeError('Variable "commandesPaged" does not exist.', 8, $this->source); })()) && CoreExtension::getAttribute($this->env, $this->source, ($context["commandesPaged"] ?? null), "items", [], "any", true, true, false, 8))) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["commandesPaged"]) || array_key_exists("commandesPaged", $context) ? $context["commandesPaged"] : (function () { throw new RuntimeError('Variable "commandesPaged" does not exist.', 8, $this->source); })()), "items", [], "any", false, false, false, 8)) : (((((isset($context["commandesPaged"]) || array_key_exists("commandesPaged", $context) ? $context["commandesPaged"] : (function () { throw new RuntimeError('Variable "commandesPaged" does not exist.', 8, $this->source); })()) && CoreExtension::getAttribute($this->env, $this->source, ($context["commandesPaged"] ?? null), "data", [], "any", true, true, false, 8))) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["commandesPaged"]) || array_key_exists("commandesPaged", $context) ? $context["commandesPaged"] : (function () { throw new RuntimeError('Variable "commandesPaged" does not exist.', 8, $this->source); })()), "data", [], "any", false, false, false, 8)) : ([]))));
        // line 9
        yield "
  <div class=\"bb-pagehead\">
    <h1 class=\"bb-pagehead__title\">Détails client</h1>
    <div class=\"bb-pagehead__sub\">Commandes du client et annulation</div>
  </div>

  <div class=\"bb-content cd-page\">

    <section class=\"cd-header\">
      <div class=\"cd-card\">
        <div class=\"cd-row\">
          <div class=\"cd-avatar\">👤</div>
          <div class=\"cd-info\">
            <div class=\"cd-name\">
              ";
        // line 23
        yield (((($tmp = (isset($context["client"]) || array_key_exists("client", $context) ? $context["client"] : (function () { throw new RuntimeError('Variable "client" does not exist.', 23, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["client"] ?? null), "nomComplet", [], "any", true, true, false, 23)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["client"]) || array_key_exists("client", $context) ? $context["client"] : (function () { throw new RuntimeError('Variable "client" does not exist.', 23, $this->source); })()), "nomComplet", [], "any", false, false, false, 23), "Client")) : ("Client")), "html", null, true)) : ("Client"));
        yield "
            </div>
            <div class=\"cd-sub\">
              <span class=\"cd-k\">Téléphone:</span>
              <span class=\"cd-v\">";
        // line 27
        yield (((($tmp = (isset($context["client"]) || array_key_exists("client", $context) ? $context["client"] : (function () { throw new RuntimeError('Variable "client" does not exist.', 27, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["client"] ?? null), "telephone", [], "any", true, true, false, 27)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["client"]) || array_key_exists("client", $context) ? $context["client"] : (function () { throw new RuntimeError('Variable "client" does not exist.', 27, $this->source); })()), "telephone", [], "any", false, false, false, 27), "—")) : ("—")), "html", null, true)) : ("—"));
        yield "</span>
              <span class=\"cd-dot\">•</span>
              <span class=\"cd-k\">Login:</span>
              <span class=\"cd-v\">";
        // line 30
        yield (((($tmp = (isset($context["client"]) || array_key_exists("client", $context) ? $context["client"] : (function () { throw new RuntimeError('Variable "client" does not exist.', 30, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["client"] ?? null), "login", [], "any", true, true, false, 30)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["client"]) || array_key_exists("client", $context) ? $context["client"] : (function () { throw new RuntimeError('Variable "client" does not exist.', 30, $this->source); })()), "login", [], "any", false, false, false, 30), "—")) : ("—")), "html", null, true)) : ("—"));
        yield "</span>
            </div>
          </div>

          <div class=\"cd-actions\">
            <a class=\"cd-btn cd-btn--ghost\" href=\"";
        // line 35
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("client_index");
        yield "\">← Retour</a>
          </div>
        </div>
      </div>
    </section>

    <section class=\"cd-filters\">
      <div class=\"cd-card\">
        ";
        // line 43
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["filterForm"]) || array_key_exists("filterForm", $context) ? $context["filterForm"] : (function () { throw new RuntimeError('Variable "filterForm" does not exist.', 43, $this->source); })()), 'form_start', ["method" => "get", "attr" => ["class" => "cd-filterbar"]]);
        yield "
          <div class=\"cd-field\">
            <label class=\"cd-label\">Date</label>
            ";
        // line 46
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["filterForm"]) || array_key_exists("filterForm", $context) ? $context["filterForm"] : (function () { throw new RuntimeError('Variable "filterForm" does not exist.', 46, $this->source); })()), "date", [], "any", false, false, false, 46), 'widget', ["attr" => ["class" => "cd-input"]]);
        yield "
          </div>

          <div class=\"cd-field\">
            <label class=\"cd-label\">État</label>
            ";
        // line 51
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["filterForm"]) || array_key_exists("filterForm", $context) ? $context["filterForm"] : (function () { throw new RuntimeError('Variable "filterForm" does not exist.', 51, $this->source); })()), "etat", [], "any", false, false, false, 51), 'widget', ["attr" => ["class" => "cd-input"]]);
        yield "
          </div>

          <button type=\"submit\" class=\"cd-btn cd-btn--primary\">Filtrer</button>
          <a class=\"cd-btn cd-btn--ghost\" href=\"";
        // line 55
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("client_details", ["id" => ((CoreExtension::getAttribute($this->env, $this->source, ($context["client"] ?? null), "id", [], "any", true, true, false, 55)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["client"]) || array_key_exists("client", $context) ? $context["client"] : (function () { throw new RuntimeError('Variable "client" does not exist.', 55, $this->source); })()), "id", [], "any", false, false, false, 55), ((CoreExtension::getAttribute($this->env, $this->source, ($context["client"] ?? null), "idClient", [], "any", true, true, false, 55)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["client"]) || array_key_exists("client", $context) ? $context["client"] : (function () { throw new RuntimeError('Variable "client" does not exist.', 55, $this->source); })()), "idClient", [], "any", false, false, false, 55), 0)) : (0)))) : (((CoreExtension::getAttribute($this->env, $this->source, ($context["client"] ?? null), "idClient", [], "any", true, true, false, 55)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["client"]) || array_key_exists("client", $context) ? $context["client"] : (function () { throw new RuntimeError('Variable "client" does not exist.', 55, $this->source); })()), "idClient", [], "any", false, false, false, 55), 0)) : (0))))]), "html", null, true);
        yield "\">Réinitialiser</a>
        ";
        // line 56
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["filterForm"]) || array_key_exists("filterForm", $context) ? $context["filterForm"] : (function () { throw new RuntimeError('Variable "filterForm" does not exist.', 56, $this->source); })()), 'form_end');
        yield "
      </div>
    </section>

    <section class=\"cd-table\">
      <div class=\"cd-card\">
        <h2 class=\"cd-title\">Commandes</h2>

        <div class=\"cd-table-wrap\">
          <table class=\"cd-t\">
            <thead>
              <tr>
                <th>Référence</th>
                <th>Date</th>
                <th>Montant</th>
                <th>État</th>
                <th class=\"cd-right\">Actions</th>
              </tr>
            </thead>

            <tbody>
              ";
        // line 77
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["commandes"]) || array_key_exists("commandes", $context) ? $context["commandes"] : (function () { throw new RuntimeError('Variable "commandes" does not exist.', 77, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
            // line 78
            yield "                ";
            $context["idCommande"] = ((CoreExtension::getAttribute($this->env, $this->source, $context["c"], "idCommande", [], "any", true, true, false, 78)) ? (CoreExtension::getAttribute($this->env, $this->source, $context["c"], "idCommande", [], "any", false, false, false, 78)) : (((CoreExtension::getAttribute($this->env, $this->source, $context["c"], "id", [], "any", true, true, false, 78)) ? (CoreExtension::getAttribute($this->env, $this->source, $context["c"], "id", [], "any", false, false, false, 78)) : (0))));
            // line 79
            yield "                ";
            $context["ref"] = ((CoreExtension::getAttribute($this->env, $this->source, $context["c"], "reference", [], "any", true, true, false, 79)) ? (CoreExtension::getAttribute($this->env, $this->source, $context["c"], "reference", [], "any", false, false, false, 79)) : (((CoreExtension::getAttribute($this->env, $this->source, $context["c"], "ref", [], "any", true, true, false, 79)) ? (CoreExtension::getAttribute($this->env, $this->source, $context["c"], "ref", [], "any", false, false, false, 79)) : ("—"))));
            // line 80
            yield "                ";
            $context["date"] = ((CoreExtension::getAttribute($this->env, $this->source, $context["c"], "dateCommande", [], "any", true, true, false, 80)) ? (CoreExtension::getAttribute($this->env, $this->source, $context["c"], "dateCommande", [], "any", false, false, false, 80)) : (((CoreExtension::getAttribute($this->env, $this->source, $context["c"], "date", [], "any", true, true, false, 80)) ? (CoreExtension::getAttribute($this->env, $this->source, $context["c"], "date", [], "any", false, false, false, 80)) : (null))));
            // line 81
            yield "                ";
            $context["montant"] = ((CoreExtension::getAttribute($this->env, $this->source, $context["c"], "montantTotal", [], "any", true, true, false, 81)) ? (CoreExtension::getAttribute($this->env, $this->source, $context["c"], "montantTotal", [], "any", false, false, false, 81)) : (((CoreExtension::getAttribute($this->env, $this->source, $context["c"], "montant", [], "any", true, true, false, 81)) ? (CoreExtension::getAttribute($this->env, $this->source, $context["c"], "montant", [], "any", false, false, false, 81)) : (""))));
            // line 82
            yield "                ";
            $context["etat"] = ((CoreExtension::getAttribute($this->env, $this->source, $context["c"], "etat", [], "any", true, true, false, 82)) ? (CoreExtension::getAttribute($this->env, $this->source, $context["c"], "etat", [], "any", false, false, false, 82)) : (null));
            // line 83
            yield "                ";
            $context["etatLabel"] = (((($tmp = (isset($context["etat"]) || array_key_exists("etat", $context) ? $context["etat"] : (function () { throw new RuntimeError('Variable "etat" does not exist.', 83, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (((CoreExtension::getAttribute($this->env, $this->source, ($context["etat"] ?? null), "value", [], "any", true, true, false, 83)) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["etat"]) || array_key_exists("etat", $context) ? $context["etat"] : (function () { throw new RuntimeError('Variable "etat" does not exist.', 83, $this->source); })()), "value", [], "any", false, false, false, 83)) : ((isset($context["etat"]) || array_key_exists("etat", $context) ? $context["etat"] : (function () { throw new RuntimeError('Variable "etat" does not exist.', 83, $this->source); })())))) : ("—"));
            // line 84
            yield "
                <tr>
                  <td>
                    <a class=\"cd-link\" href=\"";
            // line 87
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("commande_details", ["id" => (isset($context["idCommande"]) || array_key_exists("idCommande", $context) ? $context["idCommande"] : (function () { throw new RuntimeError('Variable "idCommande" does not exist.', 87, $this->source); })())]), "html", null, true);
            yield "\">
                      <strong>";
            // line 88
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["ref"]) || array_key_exists("ref", $context) ? $context["ref"] : (function () { throw new RuntimeError('Variable "ref" does not exist.', 88, $this->source); })()), "html", null, true);
            yield "</strong>
                    </a>
                  </td>

                  <td>
                    ";
            // line 93
            if ((($tmp = (isset($context["date"]) || array_key_exists("date", $context) ? $context["date"] : (function () { throw new RuntimeError('Variable "date" does not exist.', 93, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 94
                yield "                      ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate((isset($context["date"]) || array_key_exists("date", $context) ? $context["date"] : (function () { throw new RuntimeError('Variable "date" does not exist.', 94, $this->source); })()), "d/m/Y H:i"), "html", null, true);
                yield "
                    ";
            } else {
                // line 96
                yield "                      —
                    ";
            }
            // line 98
            yield "                  </td>

                  <td class=\"cd-money\">
                    ";
            // line 101
            if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty((isset($context["montant"]) || array_key_exists("montant", $context) ? $context["montant"] : (function () { throw new RuntimeError('Variable "montant" does not exist.', 101, $this->source); })()))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 102
                yield "                      ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["montant"]) || array_key_exists("montant", $context) ? $context["montant"] : (function () { throw new RuntimeError('Variable "montant" does not exist.', 102, $this->source); })()), "html", null, true);
                yield " FCFA
                    ";
            } else {
                // line 104
                yield "                      —
                    ";
            }
            // line 106
            yield "                  </td>

                  <td>
                    <span class=\"cd-badge\">";
            // line 109
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["etatLabel"]) || array_key_exists("etatLabel", $context) ? $context["etatLabel"] : (function () { throw new RuntimeError('Variable "etatLabel" does not exist.', 109, $this->source); })()), "html", null, true);
            yield "</span>
                  </td>

                  <td class=\"cd-right\">
                    <a class=\"cd-btn cd-btn--mini cd-btn--ghost\"
                href=\"";
            // line 114
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("commande_details", ["id" => (isset($context["idCommande"]) || array_key_exists("idCommande", $context) ? $context["idCommande"] : (function () { throw new RuntimeError('Variable "idCommande" does not exist.', 114, $this->source); })())]), "html", null, true);
            yield "\">
                Détails
                </a>

                ";
            // line 118
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["c"], "canCancel", [], "any", false, false, false, 118)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 119
                yield "            <form method=\"post\"
                action=\"";
                // line 120
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("client_commande_cancel", ["idClient" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["client"]) || array_key_exists("client", $context) ? $context["client"] : (function () { throw new RuntimeError('Variable "client" does not exist.', 120, $this->source); })()), "id", [], "any", false, false, false, 120), "idCommande" => (isset($context["idCommande"]) || array_key_exists("idCommande", $context) ? $context["idCommande"] : (function () { throw new RuntimeError('Variable "idCommande" does not exist.', 120, $this->source); })())]), "html", null, true);
                yield "\"
                class=\"cd-inline\"
                data-confirm=\"cancel\"
                data-confirm-message=\"Voulez-vous vraiment annuler la commande ";
                // line 123
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["ref"]) || array_key_exists("ref", $context) ? $context["ref"] : (function () { throw new RuntimeError('Variable "ref" does not exist.', 123, $this->source); })()), "html", null, true);
                yield " ?\"
                data-confirm-meta=\"Client: ";
                // line 124
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["client"]) || array_key_exists("client", $context) ? $context["client"] : (function () { throw new RuntimeError('Variable "client" does not exist.', 124, $this->source); })()), "nomComplet", [], "any", false, false, false, 124), "html", null, true);
                yield " • Tél: ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["client"]) || array_key_exists("client", $context) ? $context["client"] : (function () { throw new RuntimeError('Variable "client" does not exist.', 124, $this->source); })()), "telephone", [], "any", false, false, false, 124), "html", null, true);
                yield "\">
                    <button type=\"submit\"
                            class=\"cd-btn cd-btn--mini cd-btn--danger\">
                    Annuler
                    </button>
                </form>
                ";
            } else {
                // line 131
                yield "                <button type=\"button\"
                        class=\"cd-btn cd-btn--mini cd-btn--danger cd-btn--disabled\"
                        title=\"Commande terminée – annulation impossible\"
                        disabled>
                    Annuler
                </button>
                ";
            }
            // line 138
            yield "
                  </td>
                </tr>
              ";
            $context['_iterated'] = true;
        }
        // line 141
        if (!$context['_iterated']) {
            // line 142
            yield "                <tr>
                  <td colspan=\"5\">
                    <div class=\"cd-empty\">
                      Aucune commande pour ce client avec ces filtres.
                    </div>
                  </td>
                </tr>
              ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['c'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 150
        yield "            </tbody>
          </table>
        </div>

        <div class=\"cd-pagination\">
          ";
        // line 155
        if ((($tmp = (isset($context["commandesPaged"]) || array_key_exists("commandesPaged", $context) ? $context["commandesPaged"] : (function () { throw new RuntimeError('Variable "commandesPaged" does not exist.', 155, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 156
            yield "            ";
            yield from $this->load("partials/pagination.html.twig", 156)->unwrap()->yield(CoreExtension::merge($context, ["paged" =>             // line 157
(isset($context["commandesPaged"]) || array_key_exists("commandesPaged", $context) ? $context["commandesPaged"] : (function () { throw new RuntimeError('Variable "commandesPaged" does not exist.', 157, $this->source); })()), "route" => "client_details", "routeParams" => ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,             // line 159
(isset($context["dto"]) || array_key_exists("dto", $context) ? $context["dto"] : (function () { throw new RuntimeError('Variable "dto" does not exist.', 159, $this->source); })()), "client", [], "any", false, false, false, 159), "id", [], "any", false, false, false, 159)]]));
            // line 161
            yield "
          ";
        }
        // line 163
        yield "        </div>
      </div>
    </section>

  </div>
  ";
        // line 168
        yield from $this->load("partials/confirm_modal.html.twig", 168)->unwrap()->yield($context);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "client/details.html.twig";
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
        return array (  378 => 168,  371 => 163,  367 => 161,  365 => 159,  364 => 157,  362 => 156,  360 => 155,  353 => 150,  340 => 142,  338 => 141,  331 => 138,  322 => 131,  310 => 124,  306 => 123,  300 => 120,  297 => 119,  295 => 118,  288 => 114,  280 => 109,  275 => 106,  271 => 104,  265 => 102,  263 => 101,  258 => 98,  254 => 96,  248 => 94,  246 => 93,  238 => 88,  234 => 87,  229 => 84,  226 => 83,  223 => 82,  220 => 81,  217 => 80,  214 => 79,  211 => 78,  206 => 77,  182 => 56,  178 => 55,  171 => 51,  163 => 46,  157 => 43,  146 => 35,  138 => 30,  132 => 27,  125 => 23,  109 => 9,  106 => 8,  103 => 7,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Détails client{% endblock %}

{% block body %}
  {% set client = dto.client is defined ? dto.client : (dto.clientInfo is defined ? dto.clientInfo : null) %}
  {% set commandesPaged = dto.commandes is defined ? dto.commandes : (dto.paged is defined ? dto.paged : null) %}
  {% set commandes = commandesPaged and commandesPaged.items is defined ? commandesPaged.items : (commandesPaged and commandesPaged.data is defined ? commandesPaged.data : []) %}

  <div class=\"bb-pagehead\">
    <h1 class=\"bb-pagehead__title\">Détails client</h1>
    <div class=\"bb-pagehead__sub\">Commandes du client et annulation</div>
  </div>

  <div class=\"bb-content cd-page\">

    <section class=\"cd-header\">
      <div class=\"cd-card\">
        <div class=\"cd-row\">
          <div class=\"cd-avatar\">👤</div>
          <div class=\"cd-info\">
            <div class=\"cd-name\">
              {{ client ? (client.nomComplet|default('Client')) : 'Client' }}
            </div>
            <div class=\"cd-sub\">
              <span class=\"cd-k\">Téléphone:</span>
              <span class=\"cd-v\">{{ client ? (client.telephone|default('—')) : '—' }}</span>
              <span class=\"cd-dot\">•</span>
              <span class=\"cd-k\">Login:</span>
              <span class=\"cd-v\">{{ client ? (client.login|default('—')) : '—' }}</span>
            </div>
          </div>

          <div class=\"cd-actions\">
            <a class=\"cd-btn cd-btn--ghost\" href=\"{{ path('client_index') }}\">← Retour</a>
          </div>
        </div>
      </div>
    </section>

    <section class=\"cd-filters\">
      <div class=\"cd-card\">
        {{ form_start(filterForm, { method: 'get', attr: { class: 'cd-filterbar' } }) }}
          <div class=\"cd-field\">
            <label class=\"cd-label\">Date</label>
            {{ form_widget(filterForm.date, { attr: { class: 'cd-input' } }) }}
          </div>

          <div class=\"cd-field\">
            <label class=\"cd-label\">État</label>
            {{ form_widget(filterForm.etat, { attr: { class: 'cd-input' } }) }}
          </div>

          <button type=\"submit\" class=\"cd-btn cd-btn--primary\">Filtrer</button>
          <a class=\"cd-btn cd-btn--ghost\" href=\"{{ path('client_details', { id: client.id|default(client.idClient|default(0)) }) }}\">Réinitialiser</a>
        {{ form_end(filterForm) }}
      </div>
    </section>

    <section class=\"cd-table\">
      <div class=\"cd-card\">
        <h2 class=\"cd-title\">Commandes</h2>

        <div class=\"cd-table-wrap\">
          <table class=\"cd-t\">
            <thead>
              <tr>
                <th>Référence</th>
                <th>Date</th>
                <th>Montant</th>
                <th>État</th>
                <th class=\"cd-right\">Actions</th>
              </tr>
            </thead>

            <tbody>
              {% for c in commandes %}
                {% set idCommande = c.idCommande is defined ? c.idCommande : (c.id is defined ? c.id : 0) %}
                {% set ref = c.reference is defined ? c.reference : (c.ref is defined ? c.ref : '—') %}
                {% set date = c.dateCommande is defined ? c.dateCommande : (c.date is defined ? c.date : null) %}
                {% set montant = c.montantTotal is defined ? c.montantTotal : (c.montant is defined ? c.montant : '') %}
                {% set etat = c.etat is defined ? c.etat : null %}
                {% set etatLabel = etat ? (etat.value is defined ? etat.value : etat) : '—' %}

                <tr>
                  <td>
                    <a class=\"cd-link\" href=\"{{ path('commande_details', { id: idCommande }) }}\">
                      <strong>{{ ref }}</strong>
                    </a>
                  </td>

                  <td>
                    {% if date %}
                      {{ date|date('d/m/Y H:i') }}
                    {% else %}
                      —
                    {% endif %}
                  </td>

                  <td class=\"cd-money\">
                    {% if montant is not empty %}
                      {{ montant }} FCFA
                    {% else %}
                      —
                    {% endif %}
                  </td>

                  <td>
                    <span class=\"cd-badge\">{{ etatLabel }}</span>
                  </td>

                  <td class=\"cd-right\">
                    <a class=\"cd-btn cd-btn--mini cd-btn--ghost\"
                href=\"{{ path('commande_details', { id: idCommande }) }}\">
                Détails
                </a>

                {% if c.canCancel %}
            <form method=\"post\"
                action=\"{{ path('client_commande_cancel', { idClient: client.id, idCommande: idCommande }) }}\"
                class=\"cd-inline\"
                data-confirm=\"cancel\"
                data-confirm-message=\"Voulez-vous vraiment annuler la commande {{ ref }} ?\"
                data-confirm-meta=\"Client: {{ client.nomComplet }} • Tél: {{ client.telephone }}\">
                    <button type=\"submit\"
                            class=\"cd-btn cd-btn--mini cd-btn--danger\">
                    Annuler
                    </button>
                </form>
                {% else %}
                <button type=\"button\"
                        class=\"cd-btn cd-btn--mini cd-btn--danger cd-btn--disabled\"
                        title=\"Commande terminée – annulation impossible\"
                        disabled>
                    Annuler
                </button>
                {% endif %}

                  </td>
                </tr>
              {% else %}
                <tr>
                  <td colspan=\"5\">
                    <div class=\"cd-empty\">
                      Aucune commande pour ce client avec ces filtres.
                    </div>
                  </td>
                </tr>
              {% endfor %}
            </tbody>
          </table>
        </div>

        <div class=\"cd-pagination\">
          {% if commandesPaged %}
            {% include 'partials/pagination.html.twig' with {
            paged: commandesPaged,
            route: 'client_details',
            routeParams: { id: dto.client.id }
            } %}

          {% endif %}
        </div>
      </div>
    </section>

  </div>
  {% include 'partials/confirm_modal.html.twig' %}
{% endblock %}


", "client/details.html.twig", "C:\\Users\\oper\\Desktop\\L3_GLRS_COURS\\SEM1\\BrasilBurgerExam\\BrasilBurgerExam\\templates\\client\\details.html.twig");
    }
}
