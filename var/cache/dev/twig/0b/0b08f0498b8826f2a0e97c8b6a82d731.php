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

/* livraison/board.html.twig */
class __TwigTemplate_88daa9cbcf7712ec70befdfb10e20979 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "livraison/board.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "livraison/board.html.twig"));

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

        yield "Gestion des Livraisons";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 6
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

        // line 7
        yield "  <div class=\"bb-pagehead\">
    <h1 class=\"bb-pagehead__title\">Gestion des Livraisons</h1>
    <div class=\"bb-pagehead__sub\">Organisez les livraisons par zone et affectez les livreurs</div>
  </div>

  ";
        // line 12
        $context["zonesCount"] = Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["board"]) || array_key_exists("board", $context) ? $context["board"] : (function () { throw new RuntimeError('Variable "board" does not exist.', 12, $this->source); })()), "zones", [], "any", false, false, false, 12));
        // line 13
        yield "  ";
        $context["livreursCount"] = Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["filterData"]) || array_key_exists("filterData", $context) ? $context["filterData"] : (function () { throw new RuntimeError('Variable "filterData" does not exist.', 13, $this->source); })()), "livreurs", [], "any", false, false, false, 13));
        // line 14
        yield "
  <div class=\"bb-content liv-board\"
       data-assign-zone-url-pattern=\"";
        // line 16
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("livraison_assign_zone", ["idZone" => 0]);
        yield "\"
       data-details-url-pattern=\"";
        // line 17
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("commande_details", ["id" => 0]);
        yield "\">

    <section class=\"liv-zones\">
      ";
        // line 20
        if (Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, (isset($context["board"]) || array_key_exists("board", $context) ? $context["board"] : (function () { throw new RuntimeError('Variable "board" does not exist.', 20, $this->source); })()), "zones", [], "any", false, false, false, 20))) {
            // line 21
            yield "        <div class=\"liv-empty\">
          <div class=\"liv-empty__ico\">📦</div>
          <div class=\"liv-empty__title\">Aucune livraison à afficher</div>
          <div class=\"liv-empty__sub\">Aucune commande validée en livraison n’a été trouvée.</div>
        </div>
      ";
        } else {
            // line 27
            yield "        <div class=\"liv-zone-grid ";
            yield ((((isset($context["zonesCount"]) || array_key_exists("zonesCount", $context) ? $context["zonesCount"] : (function () { throw new RuntimeError('Variable "zonesCount" does not exist.', 27, $this->source); })()) > 3)) ? ("is-carousel") : (""));
            yield "\">
          ";
            // line 28
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["board"]) || array_key_exists("board", $context) ? $context["board"] : (function () { throw new RuntimeError('Variable "board" does not exist.', 28, $this->source); })()), "zones", [], "any", false, false, false, 28));
            foreach ($context['_seq'] as $context["_key"] => $context["zone"]) {
                // line 29
                yield "            ";
                $context["qMap"] = [];
                // line 30
                yield "            ";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["zone"], "commandes", [], "any", false, false, false, 30));
                foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
                    // line 31
                    yield "              ";
                    if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "quartier", [], "any", false, false, false, 31))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 32
                        yield "                ";
                        $context["qMap"] = Twig\Extension\CoreExtension::merge((isset($context["qMap"]) || array_key_exists("qMap", $context) ? $context["qMap"] : (function () { throw new RuntimeError('Variable "qMap" does not exist.', 32, $this->source); })()), [CoreExtension::getAttribute($this->env, $this->source, $context["c"], "quartier", [], "any", false, false, false, 32) => true]);
                        // line 33
                        yield "              ";
                    }
                    // line 34
                    yield "            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['c'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 35
                yield "
            <article class=\"liv-zone-card\"
                     data-zone-id=\"";
                // line 37
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["zone"], "zoneId", [], "any", false, false, false, 37), "html", null, true);
                yield "\"
                     data-zone-label=\"";
                // line 38
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["zone"], "zoneLibelle", [], "any", false, false, false, 38), "html", null, true);
                yield "\">
              <div class=\"liv-zone-top\">
                <div class=\"liv-zone-ico\"></div>
                <div class=\"liv-zone-meta\">
                  <div class=\"liv-zone-title\">Zone<br>";
                // line 42
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["zone"], "zoneLibelle", [], "any", false, false, false, 42), "html", null, true);
                yield "</div>
                  <div class=\"liv-zone-sub\">";
                // line 43
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["zone"], "montantTotal", [], "any", false, false, false, 43), "html", null, true);
                yield " FCFA</div>
                </div>
              </div>

              <div class=\"liv-zone-kpi\">
                <div class=\"liv-pill\">
                  <span class=\"liv-pill__label\">Commandes</span>
                  <span class=\"liv-pill__value\">";
                // line 50
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["zone"], "nbCommandes", [], "any", false, false, false, 50), "html", null, true);
                yield "</span>
                </div>
              </div>

              <div class=\"liv-zone-label\">Quartiers</div>
              <div class=\"liv-tags\">
                ";
                // line 56
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable((isset($context["qMap"]) || array_key_exists("qMap", $context) ? $context["qMap"] : (function () { throw new RuntimeError('Variable "qMap" does not exist.', 56, $this->source); })()));
                $context['_iterated'] = false;
                foreach ($context['_seq'] as $context["quartierLabel"] => $context["_"]) {
                    // line 57
                    yield "                  <span class=\"liv-tag\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["quartierLabel"], "html", null, true);
                    yield "</span>
                ";
                    $context['_iterated'] = true;
                }
                // line 58
                if (!$context['_iterated']) {
                    // line 59
                    yield "                  <span class=\"liv-tag liv-tag--muted\">—</span>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['quartierLabel'], $context['_'], $context['_parent'], $context['_iterated']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 61
                yield "              </div>

              <button type=\"button\"
                      class=\"liv-btn liv-btn--soft js-open-zone\"
                      data-zone=\"";
                // line 65
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["zone"], "zoneId", [], "any", false, false, false, 65), "html", null, true);
                yield "\">
                Voir les<br>commandes
              </button>

              <script type=\"application/json\" class=\"js-zone-data\" data-zone=\"";
                // line 69
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["zone"], "zoneId", [], "any", false, false, false, 69), "html", null, true);
                yield "\">
                {
                  \"zoneId\": ";
                // line 71
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["zone"], "zoneId", [], "any", false, false, false, 71), "html", null, true);
                yield ",
                  \"zoneLibelle\": ";
                // line 72
                yield json_encode(CoreExtension::getAttribute($this->env, $this->source, $context["zone"], "zoneLibelle", [], "any", false, false, false, 72));
                yield ",
                  \"commandes\": [
                    ";
                // line 74
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["zone"], "commandes", [], "any", false, false, false, 74));
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
                foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
                    // line 75
                    yield "                      {
                        \"idCommande\": ";
                    // line 76
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "idCommande", [], "any", false, false, false, 76), "html", null, true);
                    yield ",
                        \"reference\": ";
                    // line 77
                    yield json_encode(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "reference", [], "any", false, false, false, 77));
                    yield ",
                        \"clientNom\": ";
                    // line 78
                    yield json_encode(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "clientNom", [], "any", false, false, false, 78));
                    yield ",
                        \"clientTel\": ";
                    // line 79
                    yield json_encode(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "clientTelephone", [], "any", false, false, false, 79));
                    yield ",
                        \"quartier\": ";
                    // line 80
                    yield json_encode(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "quartier", [], "any", false, false, false, 80));
                    yield ",
                        \"montant\": ";
                    // line 81
                    yield json_encode(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "montant", [], "any", false, false, false, 81));
                    yield ",
                        \"etat\": ";
                    // line 82
                    yield json_encode(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "etat", [], "any", false, false, false, 82), "value", [], "any", false, false, false, 82));
                    yield "
                      }";
                    // line 83
                    yield (((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 83)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (",") : (""));
                    yield "
                    ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['c'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 85
                yield "                  ]
                }
              </script>
            </article>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['zone'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 90
            yield "        </div>
      ";
        }
        // line 92
        yield "    </section>

    <section class=\"liv-panel js-zone-panel\" hidden>
      <div class=\"liv-panel-card\">
        <div class=\"liv-panel-head\">
          <h2 class=\"liv-panel-title\">
            Commandes - <span class=\"js-zone-title\">—</span>
          </h2>
        </div>

        <div class=\"liv-table-wrap\">
          <table class=\"liv-table\">
            <thead>
              <tr>
                <th>Référence</th>
                <th>Client</th>
                <th>Quartier</th>
                <th>Montant</th>
                <th>État</th>
              </tr>
            </thead>
            <tbody class=\"js-zone-tbody\"></tbody>
          </table>
        </div>

        <div class=\"liv-panel-actions\">
          <button type=\"button\" class=\"liv-btn liv-btn--ghost js-close-zone\">Fermer</button>
        </div>
      </div>
    </section>

    <section class=\"liv-assign\">
      <div class=\"liv-assign-card\">
        <div class=\"liv-assign-head\">
          <div class=\"liv-truck-ico\">
            <svg width=\"22\" height=\"22\" viewBox=\"0 0 24 24\" fill=\"none\" aria-hidden=\"true\">
              <path d=\"M3 7h11v9H3V7Z\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linejoin=\"round\"/>
              <path d=\"M14 10h4l3 3v3h-7v-6Z\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linejoin=\"round\"/>
              <path d=\"M7 20a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Z\" stroke=\"currentColor\" stroke-width=\"2\"/>
              <path d=\"M18 20a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Z\" stroke=\"currentColor\" stroke-width=\"2\"/>
            </svg>
          </div>
          <h2 class=\"liv-assign-title\">Affecter un livreur</h2>
        </div>

        <form method=\"post\"
              class=\"liv-assign-form js-assign-form\"
              action=\"";
        // line 139
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("livraison_assign_zone", ["idZone" => 0]);
        yield "\">
          <input type=\"hidden\" name=\"assign_livreur_form[_token]\" value=\"";
        // line 140
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("assign_livreur_form"), "html", null, true);
        yield "\">
          <div class=\"liv-field\">
            <label class=\"liv-label\">Zone</label>
            <select class=\"liv-input js-assign-zone-select\" name=\"zoneUi\" required data-role=\"zone-picker\">
              <option value=\"\">—</option>
              ";
        // line 145
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["board"]) || array_key_exists("board", $context) ? $context["board"] : (function () { throw new RuntimeError('Variable "board" does not exist.', 145, $this->source); })()), "zones", [], "any", false, false, false, 145));
        foreach ($context['_seq'] as $context["_key"] => $context["z"]) {
            // line 146
            yield "                ";
            $context["lock"] = (((CoreExtension::getAttribute($this->env, $this->source, ($context["lockedZones"] ?? null), CoreExtension::getAttribute($this->env, $this->source, $context["z"], "zoneId", [], "any", false, false, false, 146), [], "array", true, true, false, 146) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["lockedZones"]) || array_key_exists("lockedZones", $context) ? $context["lockedZones"] : (function () { throw new RuntimeError('Variable "lockedZones" does not exist.', 146, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["z"], "zoneId", [], "any", false, false, false, 146), [], "array", false, false, false, 146)))) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["lockedZones"]) || array_key_exists("lockedZones", $context) ? $context["lockedZones"] : (function () { throw new RuntimeError('Variable "lockedZones" does not exist.', 146, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["z"], "zoneId", [], "any", false, false, false, 146), [], "array", false, false, false, 146)) : (null));
            // line 147
            yield "                <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["z"], "zoneId", [], "any", false, false, false, 147), "html", null, true);
            yield "\"
                        data-lock=\"";
            // line 148
            yield (((null === (isset($context["lock"]) || array_key_exists("lock", $context) ? $context["lock"] : (function () { throw new RuntimeError('Variable "lock" does not exist.', 148, $this->source); })()))) ? ("") : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["lock"]) || array_key_exists("lock", $context) ? $context["lock"] : (function () { throw new RuntimeError('Variable "lock" does not exist.', 148, $this->source); })()), "html", null, true)));
            yield "\"
                        ";
            // line 149
            if (((isset($context["lock"]) || array_key_exists("lock", $context) ? $context["lock"] : (function () { throw new RuntimeError('Variable "lock" does not exist.', 149, $this->source); })()) ==  -1)) {
                yield "disabled";
            }
            yield ">
                  ";
            // line 150
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["z"], "zoneLibelle", [], "any", false, false, false, 150), "html", null, true);
            if (((isset($context["lock"]) || array_key_exists("lock", $context) ? $context["lock"] : (function () { throw new RuntimeError('Variable "lock" does not exist.', 150, $this->source); })()) ==  -1)) {
                yield " (incohérence)";
            }
            // line 151
            yield "                </option>
              ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['z'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 153
        yield "            </select>
          </div>

          <div class=\"liv-field\">
            <label class=\"liv-label\">Livreur</label>
            <select class=\"liv-input js-assign-livreur-select\" name=\"assign_livreur_form[livreurId]\" required>
              <option value=\"\">—</option>
              ";
        // line 160
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["filterData"]) || array_key_exists("filterData", $context) ? $context["filterData"] : (function () { throw new RuntimeError('Variable "filterData" does not exist.', 160, $this->source); })()), "livreurs", [], "any", false, false, false, 160));
        foreach ($context['_seq'] as $context["_key"] => $context["l"]) {
            // line 161
            yield "                ";
            $context["isBusy"] = CoreExtension::getAttribute($this->env, $this->source, ($context["busyLivreurs"] ?? null), CoreExtension::getAttribute($this->env, $this->source, $context["l"], "id", [], "any", false, false, false, 161), [], "array", true, true, false, 161);
            // line 162
            yield "                <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["l"], "id", [], "any", false, false, false, 162), "html", null, true);
            yield "\"
                        data-busy=\"";
            // line 163
            yield (((($tmp = (isset($context["isBusy"]) || array_key_exists("isBusy", $context) ? $context["isBusy"] : (function () { throw new RuntimeError('Variable "isBusy" does not exist.', 163, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("1") : ("0"));
            yield "\"
                        ";
            // line 164
            if ((($tmp = (isset($context["isBusy"]) || array_key_exists("isBusy", $context) ? $context["isBusy"] : (function () { throw new RuntimeError('Variable "isBusy" does not exist.', 164, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "disabled";
            }
            yield ">
                  ";
            // line 165
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["l"], "label", [], "any", false, false, false, 165), "html", null, true);
            if ((($tmp = (isset($context["isBusy"]) || array_key_exists("isBusy", $context) ? $context["isBusy"] : (function () { throw new RuntimeError('Variable "isBusy" does not exist.', 165, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield " (indisponible)";
            }
            // line 166
            yield "                </option>
              ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['l'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 168
        yield "            </select>
          </div>

          <button type=\"submit\" class=\"liv-btn liv-btn--primary js-assign-submit\" disabled>
            Affecter
          </button>

          ";
        // line 176
        yield "          <p class=\"liv-hint js-assign-hint\" hidden></p>
        </form>

        <h3 class=\"liv-subtitle\">Liste des livreurs</h3>

        <div class=\"liv-livreur-grid ";
        // line 181
        yield ((((isset($context["livreursCount"]) || array_key_exists("livreursCount", $context) ? $context["livreursCount"] : (function () { throw new RuntimeError('Variable "livreursCount" does not exist.', 181, $this->source); })()) > 3)) ? ("is-carousel") : (""));
        yield "\">
          ";
        // line 182
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["filterData"]) || array_key_exists("filterData", $context) ? $context["filterData"] : (function () { throw new RuntimeError('Variable "filterData" does not exist.', 182, $this->source); })()), "livreurs", [], "any", false, false, false, 182));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["l"]) {
            // line 183
            yield "            ";
            $context["isBusy"] = CoreExtension::getAttribute($this->env, $this->source, ($context["busyLivreurs"] ?? null), CoreExtension::getAttribute($this->env, $this->source, $context["l"], "id", [], "any", false, false, false, 183), [], "array", true, true, false, 183);
            // line 184
            yield "
            <article class=\"liv-livreur-card ";
            // line 185
            yield (((($tmp = (isset($context["isBusy"]) || array_key_exists("isBusy", $context) ? $context["isBusy"] : (function () { throw new RuntimeError('Variable "isBusy" does not exist.', 185, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("liv-livreur-card--busy") : ("liv-livreur-card--ok"));
            yield "\">
              <div class=\"liv-avatar\">
                <svg width=\"20\" height=\"20\" viewBox=\"0 0 24 24\" fill=\"none\" aria-hidden=\"true\">
                  <path d=\"M12 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z\" stroke=\"currentColor\" stroke-width=\"2\"/>
                  <path d=\"M20 20a8 8 0 1 0-16 0\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\"/>
                </svg>
              </div>

              <div class=\"liv-livreur-meta\">
                <div class=\"liv-livreur-name\">";
            // line 194
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["l"], "label", [], "any", false, false, false, 194), "html", null, true);
            yield "</div>
                <div class=\"liv-livreur-status ";
            // line 195
            yield (((($tmp = (isset($context["isBusy"]) || array_key_exists("isBusy", $context) ? $context["isBusy"] : (function () { throw new RuntimeError('Variable "isBusy" does not exist.', 195, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("liv-livreur-status--busy") : ("liv-livreur-status--ok"));
            yield "\">
                  ";
            // line 196
            yield (((($tmp = (isset($context["isBusy"]) || array_key_exists("isBusy", $context) ? $context["isBusy"] : (function () { throw new RuntimeError('Variable "isBusy" does not exist.', 196, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Indisponible") : ("Disponible"));
            yield "
                </div>
              </div>
            </article>
          ";
            $context['_iterated'] = true;
        }
        // line 200
        if (!$context['_iterated']) {
            // line 201
            yield "            <div class=\"liv-empty-mini\">Aucun livreur.</div>
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['l'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 203
        yield "        </div>

      </div>
    </section>

  </div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 211
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

        // line 212
        yield "  ";
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "
  <script>
    (function () {
      const root = document.querySelector('.liv-board');
      if (!root) return;

      const panel = document.querySelector('.js-zone-panel');
      const zoneTitle = document.querySelector('.js-zone-title');
      const tbody = document.querySelector('.js-zone-tbody');

      const assignForm = document.querySelector('.js-assign-form');
      const assignZoneSelect = document.querySelector('.js-assign-zone-select');
      const livreurSelect = document.querySelector('.js-assign-livreur-select');
      const assignBtn = document.querySelector('.js-assign-submit');
      const hint = document.querySelector('.js-assign-hint');

      const zonePattern = root.getAttribute('data-assign-zone-url-pattern');
      const detailsPattern = root.getAttribute('data-details-url-pattern');

      let currentZone = null;

      function escapeHtml(str) {
        return String(str)
          .replaceAll('&', '&amp;')
          .replaceAll('<', '&lt;')
          .replaceAll('>', '&gt;')
          .replaceAll('\"', '&quot;')
          .replaceAll(\"'\", '&#039;');
      }

      function setHint(msg) {
        if (!hint) return;
        if (!msg) {
          hint.hidden = true;
          hint.textContent = '';
          return;
        }
        hint.hidden = false;
        hint.textContent = msg;
      }

      function updateAssignState() {
        const zoneId = (assignZoneSelect && assignZoneSelect.value) ? assignZoneSelect.value : '';
        const livreurId = (livreurSelect && livreurSelect.value) ? livreurSelect.value : '';

        // update form action
        if (assignForm && zonePattern && zoneId) {
          assignForm.action = zonePattern.replace(/\\/0\\/assign\$/, '/' + zoneId + '/assign');
        }

        let canSubmit = !!(zoneId && livreurId);
        setHint('');

        // livreur busy (option déjà disabled côté HTML, mais on garde la règle)
        if (canSubmit) {
          const selectedLivreurOption = livreurSelect.options[livreurSelect.selectedIndex];
          const isBusy = selectedLivreurOption && selectedLivreurOption.getAttribute('data-busy') === '1';
          if (isBusy) {
            canSubmit = false;
            setHint(\"Livreur indisponible : il a déjà des commandes validées en cours.\");
          }
        }

        // zone lock
        if (canSubmit) {
          const selectedZoneOption = assignZoneSelect.options[assignZoneSelect.selectedIndex];
          const lock = selectedZoneOption ? selectedZoneOption.getAttribute('data-lock') : '';

          if (lock === '-1') {
            canSubmit = false;
            setHint(\"Zone bloquée : incohérence (plusieurs livreurs actifs).\");
          } else if (lock && lock !== livreurId) {
            canSubmit = false;
            setHint(\"Zone indisponible : déjà affectée à un autre livreur (commandes validées en cours).\");
          }
        }

        // Optionnel UX : disable dynamiquement les zones incompatibles selon livreur choisi
        if (assignZoneSelect) {
          Array.from(assignZoneSelect.options).forEach(opt => {
            if (!opt.value) return;

            const lock = opt.getAttribute('data-lock');

            if (lock === '-1') {
              opt.disabled = true;
              return;
            }

            if (livreurId && lock && lock !== livreurId) {
              opt.disabled = true;
              return;
            }

            // réactive si compatible
            opt.disabled = false;
          });

          // re-bloquer incohérence au cas où
          Array.from(assignZoneSelect.options).forEach(opt => {
            if (opt.getAttribute('data-lock') === '-1') opt.disabled = true;
          });
        }

        if (assignBtn) {
          assignBtn.disabled = !canSubmit;
        }
      }

      function openZone(zoneId) {
        const jsonEl = document.querySelector('.js-zone-data[data-zone=\"' + zoneId + '\"]');
        if (!jsonEl) return;

        currentZone = JSON.parse(jsonEl.textContent);

        zoneTitle.textContent = currentZone.zoneLibelle || '—';
        tbody.innerHTML = '';

        if (assignZoneSelect) {
          assignZoneSelect.value = String(currentZone.zoneId || '');
        }
        updateAssignState();

        (currentZone.commandes || []).forEach(c => {
          const tr = document.createElement('tr');
          tr.className = 'liv-row-select';

          tr.innerHTML = `
            <td><strong>\${escapeHtml(c.reference || '')}</strong></td>
            <td>
              \${escapeHtml(c.clientNom || '')}<br>
              <span style=\"color:#64748b\">\${escapeHtml(c.clientTel || '')}</span>
            </td>
            <td>\${escapeHtml(c.quartier || '')}</td>
            <td class=\"liv-money\">\${escapeHtml(String(c.montant || ''))} FCFA</td>
            <td><span class=\"liv-badge\">\${escapeHtml(String(c.etat || ''))}</span></td>
          `;

          tr.addEventListener('click', () => {
            const id = c.idCommande;
            if (!detailsPattern) return;
            const url = detailsPattern.replace(/\\/0\$/, '/' + id);
            window.location.href = url;
          });

          tbody.appendChild(tr);
        });

        panel.hidden = false;
        panel.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }

      function closeZone() {
        panel.hidden = true;
      }

      document.querySelectorAll('.js-open-zone').forEach(btn => {
        btn.addEventListener('click', () => openZone(btn.getAttribute('data-zone')));
      });

      const closeBtn = document.querySelector('.js-close-zone');
      if (closeBtn) closeBtn.addEventListener('click', closeZone);

      if (assignZoneSelect) assignZoneSelect.addEventListener('change', updateAssignState);
      if (livreurSelect) livreurSelect.addEventListener('change', updateAssignState);

      updateAssignState();
    })();
  </script>

  <style>
    /* petite mise en forme propre du hint (au lieu du style inline) */
    .liv-hint{
      margin: 10px 0 0;
      font-size: 12px;
      font-weight: 900;
      color: #b45309;
    }
  </style>
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
        return "livraison/board.html.twig";
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
        return array (  570 => 212,  557 => 211,  540 => 203,  533 => 201,  531 => 200,  522 => 196,  518 => 195,  514 => 194,  502 => 185,  499 => 184,  496 => 183,  491 => 182,  487 => 181,  480 => 176,  471 => 168,  464 => 166,  459 => 165,  453 => 164,  449 => 163,  444 => 162,  441 => 161,  437 => 160,  428 => 153,  421 => 151,  416 => 150,  410 => 149,  406 => 148,  401 => 147,  398 => 146,  394 => 145,  386 => 140,  382 => 139,  333 => 92,  329 => 90,  319 => 85,  303 => 83,  299 => 82,  295 => 81,  291 => 80,  287 => 79,  283 => 78,  279 => 77,  275 => 76,  272 => 75,  255 => 74,  250 => 72,  246 => 71,  241 => 69,  234 => 65,  228 => 61,  221 => 59,  219 => 58,  212 => 57,  207 => 56,  198 => 50,  188 => 43,  184 => 42,  177 => 38,  173 => 37,  169 => 35,  163 => 34,  160 => 33,  157 => 32,  154 => 31,  149 => 30,  146 => 29,  142 => 28,  137 => 27,  129 => 21,  127 => 20,  121 => 17,  117 => 16,  113 => 14,  110 => 13,  108 => 12,  101 => 7,  88 => 6,  65 => 4,  42 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# templates/livraison/board.html.twig #}
{% extends 'base.html.twig' %}

{% block title %}Gestion des Livraisons{% endblock %}

{% block body %}
  <div class=\"bb-pagehead\">
    <h1 class=\"bb-pagehead__title\">Gestion des Livraisons</h1>
    <div class=\"bb-pagehead__sub\">Organisez les livraisons par zone et affectez les livreurs</div>
  </div>

  {% set zonesCount = board.zones|length %}
  {% set livreursCount = filterData.livreurs|length %}

  <div class=\"bb-content liv-board\"
       data-assign-zone-url-pattern=\"{{ path('livraison_assign_zone', { idZone: 0 }) }}\"
       data-details-url-pattern=\"{{ path('commande_details', { id: 0 }) }}\">

    <section class=\"liv-zones\">
      {% if board.zones is empty %}
        <div class=\"liv-empty\">
          <div class=\"liv-empty__ico\">📦</div>
          <div class=\"liv-empty__title\">Aucune livraison à afficher</div>
          <div class=\"liv-empty__sub\">Aucune commande validée en livraison n’a été trouvée.</div>
        </div>
      {% else %}
        <div class=\"liv-zone-grid {{ zonesCount > 3 ? 'is-carousel' : '' }}\">
          {% for zone in board.zones %}
            {% set qMap = {} %}
            {% for c in zone.commandes %}
              {% if c.quartier is not empty %}
                {% set qMap = qMap|merge({ (c.quartier): true }) %}
              {% endif %}
            {% endfor %}

            <article class=\"liv-zone-card\"
                     data-zone-id=\"{{ zone.zoneId }}\"
                     data-zone-label=\"{{ zone.zoneLibelle }}\">
              <div class=\"liv-zone-top\">
                <div class=\"liv-zone-ico\"></div>
                <div class=\"liv-zone-meta\">
                  <div class=\"liv-zone-title\">Zone<br>{{ zone.zoneLibelle }}</div>
                  <div class=\"liv-zone-sub\">{{ zone.montantTotal }} FCFA</div>
                </div>
              </div>

              <div class=\"liv-zone-kpi\">
                <div class=\"liv-pill\">
                  <span class=\"liv-pill__label\">Commandes</span>
                  <span class=\"liv-pill__value\">{{ zone.nbCommandes }}</span>
                </div>
              </div>

              <div class=\"liv-zone-label\">Quartiers</div>
              <div class=\"liv-tags\">
                {% for quartierLabel, _ in qMap %}
                  <span class=\"liv-tag\">{{ quartierLabel }}</span>
                {% else %}
                  <span class=\"liv-tag liv-tag--muted\">—</span>
                {% endfor %}
              </div>

              <button type=\"button\"
                      class=\"liv-btn liv-btn--soft js-open-zone\"
                      data-zone=\"{{ zone.zoneId }}\">
                Voir les<br>commandes
              </button>

              <script type=\"application/json\" class=\"js-zone-data\" data-zone=\"{{ zone.zoneId }}\">
                {
                  \"zoneId\": {{ zone.zoneId }},
                  \"zoneLibelle\": {{ zone.zoneLibelle|json_encode|raw }},
                  \"commandes\": [
                    {% for c in zone.commandes %}
                      {
                        \"idCommande\": {{ c.idCommande }},
                        \"reference\": {{ c.reference|json_encode|raw }},
                        \"clientNom\": {{ c.clientNom|json_encode|raw }},
                        \"clientTel\": {{ c.clientTelephone|json_encode|raw }},
                        \"quartier\": {{ c.quartier|json_encode|raw }},
                        \"montant\": {{ c.montant|json_encode|raw }},
                        \"etat\": {{ c.etat.value|json_encode|raw }}
                      }{{ not loop.last ? ',' : '' }}
                    {% endfor %}
                  ]
                }
              </script>
            </article>
          {% endfor %}
        </div>
      {% endif %}
    </section>

    <section class=\"liv-panel js-zone-panel\" hidden>
      <div class=\"liv-panel-card\">
        <div class=\"liv-panel-head\">
          <h2 class=\"liv-panel-title\">
            Commandes - <span class=\"js-zone-title\">—</span>
          </h2>
        </div>

        <div class=\"liv-table-wrap\">
          <table class=\"liv-table\">
            <thead>
              <tr>
                <th>Référence</th>
                <th>Client</th>
                <th>Quartier</th>
                <th>Montant</th>
                <th>État</th>
              </tr>
            </thead>
            <tbody class=\"js-zone-tbody\"></tbody>
          </table>
        </div>

        <div class=\"liv-panel-actions\">
          <button type=\"button\" class=\"liv-btn liv-btn--ghost js-close-zone\">Fermer</button>
        </div>
      </div>
    </section>

    <section class=\"liv-assign\">
      <div class=\"liv-assign-card\">
        <div class=\"liv-assign-head\">
          <div class=\"liv-truck-ico\">
            <svg width=\"22\" height=\"22\" viewBox=\"0 0 24 24\" fill=\"none\" aria-hidden=\"true\">
              <path d=\"M3 7h11v9H3V7Z\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linejoin=\"round\"/>
              <path d=\"M14 10h4l3 3v3h-7v-6Z\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linejoin=\"round\"/>
              <path d=\"M7 20a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Z\" stroke=\"currentColor\" stroke-width=\"2\"/>
              <path d=\"M18 20a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Z\" stroke=\"currentColor\" stroke-width=\"2\"/>
            </svg>
          </div>
          <h2 class=\"liv-assign-title\">Affecter un livreur</h2>
        </div>

        <form method=\"post\"
              class=\"liv-assign-form js-assign-form\"
              action=\"{{ path('livraison_assign_zone', { idZone: 0 }) }}\">
          <input type=\"hidden\" name=\"assign_livreur_form[_token]\" value=\"{{ csrf_token('assign_livreur_form') }}\">
          <div class=\"liv-field\">
            <label class=\"liv-label\">Zone</label>
            <select class=\"liv-input js-assign-zone-select\" name=\"zoneUi\" required data-role=\"zone-picker\">
              <option value=\"\">—</option>
              {% for z in board.zones %}
                {% set lock = lockedZones[z.zoneId] ?? null %}
                <option value=\"{{ z.zoneId }}\"
                        data-lock=\"{{ lock is null ? '' : lock }}\"
                        {% if lock == -1 %}disabled{% endif %}>
                  {{ z.zoneLibelle }}{% if lock == -1 %} (incohérence){% endif %}
                </option>
              {% endfor %}
            </select>
          </div>

          <div class=\"liv-field\">
            <label class=\"liv-label\">Livreur</label>
            <select class=\"liv-input js-assign-livreur-select\" name=\"assign_livreur_form[livreurId]\" required>
              <option value=\"\">—</option>
              {% for l in filterData.livreurs %}
                {% set isBusy = busyLivreurs[l.id] is defined %}
                <option value=\"{{ l.id }}\"
                        data-busy=\"{{ isBusy ? '1' : '0' }}\"
                        {% if isBusy %}disabled{% endif %}>
                  {{ l.label }}{% if isBusy %} (indisponible){% endif %}
                </option>
              {% endfor %}
            </select>
          </div>

          <button type=\"submit\" class=\"liv-btn liv-btn--primary js-assign-submit\" disabled>
            Affecter
          </button>

          {# Message explicatif quand le bouton est bloqué #}
          <p class=\"liv-hint js-assign-hint\" hidden></p>
        </form>

        <h3 class=\"liv-subtitle\">Liste des livreurs</h3>

        <div class=\"liv-livreur-grid {{ livreursCount > 3 ? 'is-carousel' : '' }}\">
          {% for l in filterData.livreurs %}
            {% set isBusy = busyLivreurs[l.id] is defined %}

            <article class=\"liv-livreur-card {{ isBusy ? 'liv-livreur-card--busy' : 'liv-livreur-card--ok' }}\">
              <div class=\"liv-avatar\">
                <svg width=\"20\" height=\"20\" viewBox=\"0 0 24 24\" fill=\"none\" aria-hidden=\"true\">
                  <path d=\"M12 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z\" stroke=\"currentColor\" stroke-width=\"2\"/>
                  <path d=\"M20 20a8 8 0 1 0-16 0\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\"/>
                </svg>
              </div>

              <div class=\"liv-livreur-meta\">
                <div class=\"liv-livreur-name\">{{ l.label }}</div>
                <div class=\"liv-livreur-status {{ isBusy ? 'liv-livreur-status--busy' : 'liv-livreur-status--ok' }}\">
                  {{ isBusy ? 'Indisponible' : 'Disponible' }}
                </div>
              </div>
            </article>
          {% else %}
            <div class=\"liv-empty-mini\">Aucun livreur.</div>
          {% endfor %}
        </div>

      </div>
    </section>

  </div>
{% endblock %}

{% block javascripts %}
  {{ parent() }}
  <script>
    (function () {
      const root = document.querySelector('.liv-board');
      if (!root) return;

      const panel = document.querySelector('.js-zone-panel');
      const zoneTitle = document.querySelector('.js-zone-title');
      const tbody = document.querySelector('.js-zone-tbody');

      const assignForm = document.querySelector('.js-assign-form');
      const assignZoneSelect = document.querySelector('.js-assign-zone-select');
      const livreurSelect = document.querySelector('.js-assign-livreur-select');
      const assignBtn = document.querySelector('.js-assign-submit');
      const hint = document.querySelector('.js-assign-hint');

      const zonePattern = root.getAttribute('data-assign-zone-url-pattern');
      const detailsPattern = root.getAttribute('data-details-url-pattern');

      let currentZone = null;

      function escapeHtml(str) {
        return String(str)
          .replaceAll('&', '&amp;')
          .replaceAll('<', '&lt;')
          .replaceAll('>', '&gt;')
          .replaceAll('\"', '&quot;')
          .replaceAll(\"'\", '&#039;');
      }

      function setHint(msg) {
        if (!hint) return;
        if (!msg) {
          hint.hidden = true;
          hint.textContent = '';
          return;
        }
        hint.hidden = false;
        hint.textContent = msg;
      }

      function updateAssignState() {
        const zoneId = (assignZoneSelect && assignZoneSelect.value) ? assignZoneSelect.value : '';
        const livreurId = (livreurSelect && livreurSelect.value) ? livreurSelect.value : '';

        // update form action
        if (assignForm && zonePattern && zoneId) {
          assignForm.action = zonePattern.replace(/\\/0\\/assign\$/, '/' + zoneId + '/assign');
        }

        let canSubmit = !!(zoneId && livreurId);
        setHint('');

        // livreur busy (option déjà disabled côté HTML, mais on garde la règle)
        if (canSubmit) {
          const selectedLivreurOption = livreurSelect.options[livreurSelect.selectedIndex];
          const isBusy = selectedLivreurOption && selectedLivreurOption.getAttribute('data-busy') === '1';
          if (isBusy) {
            canSubmit = false;
            setHint(\"Livreur indisponible : il a déjà des commandes validées en cours.\");
          }
        }

        // zone lock
        if (canSubmit) {
          const selectedZoneOption = assignZoneSelect.options[assignZoneSelect.selectedIndex];
          const lock = selectedZoneOption ? selectedZoneOption.getAttribute('data-lock') : '';

          if (lock === '-1') {
            canSubmit = false;
            setHint(\"Zone bloquée : incohérence (plusieurs livreurs actifs).\");
          } else if (lock && lock !== livreurId) {
            canSubmit = false;
            setHint(\"Zone indisponible : déjà affectée à un autre livreur (commandes validées en cours).\");
          }
        }

        // Optionnel UX : disable dynamiquement les zones incompatibles selon livreur choisi
        if (assignZoneSelect) {
          Array.from(assignZoneSelect.options).forEach(opt => {
            if (!opt.value) return;

            const lock = opt.getAttribute('data-lock');

            if (lock === '-1') {
              opt.disabled = true;
              return;
            }

            if (livreurId && lock && lock !== livreurId) {
              opt.disabled = true;
              return;
            }

            // réactive si compatible
            opt.disabled = false;
          });

          // re-bloquer incohérence au cas où
          Array.from(assignZoneSelect.options).forEach(opt => {
            if (opt.getAttribute('data-lock') === '-1') opt.disabled = true;
          });
        }

        if (assignBtn) {
          assignBtn.disabled = !canSubmit;
        }
      }

      function openZone(zoneId) {
        const jsonEl = document.querySelector('.js-zone-data[data-zone=\"' + zoneId + '\"]');
        if (!jsonEl) return;

        currentZone = JSON.parse(jsonEl.textContent);

        zoneTitle.textContent = currentZone.zoneLibelle || '—';
        tbody.innerHTML = '';

        if (assignZoneSelect) {
          assignZoneSelect.value = String(currentZone.zoneId || '');
        }
        updateAssignState();

        (currentZone.commandes || []).forEach(c => {
          const tr = document.createElement('tr');
          tr.className = 'liv-row-select';

          tr.innerHTML = `
            <td><strong>\${escapeHtml(c.reference || '')}</strong></td>
            <td>
              \${escapeHtml(c.clientNom || '')}<br>
              <span style=\"color:#64748b\">\${escapeHtml(c.clientTel || '')}</span>
            </td>
            <td>\${escapeHtml(c.quartier || '')}</td>
            <td class=\"liv-money\">\${escapeHtml(String(c.montant || ''))} FCFA</td>
            <td><span class=\"liv-badge\">\${escapeHtml(String(c.etat || ''))}</span></td>
          `;

          tr.addEventListener('click', () => {
            const id = c.idCommande;
            if (!detailsPattern) return;
            const url = detailsPattern.replace(/\\/0\$/, '/' + id);
            window.location.href = url;
          });

          tbody.appendChild(tr);
        });

        panel.hidden = false;
        panel.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }

      function closeZone() {
        panel.hidden = true;
      }

      document.querySelectorAll('.js-open-zone').forEach(btn => {
        btn.addEventListener('click', () => openZone(btn.getAttribute('data-zone')));
      });

      const closeBtn = document.querySelector('.js-close-zone');
      if (closeBtn) closeBtn.addEventListener('click', closeZone);

      if (assignZoneSelect) assignZoneSelect.addEventListener('change', updateAssignState);
      if (livreurSelect) livreurSelect.addEventListener('change', updateAssignState);

      updateAssignState();
    })();
  </script>

  <style>
    /* petite mise en forme propre du hint (au lieu du style inline) */
    .liv-hint{
      margin: 10px 0 0;
      font-size: 12px;
      font-weight: 900;
      color: #b45309;
    }
  </style>
{% endblock %}
", "livraison/board.html.twig", "C:\\Users\\oper\\Desktop\\L3_GLRS_COURS\\SEM1\\BrasilBurgerExam\\BrasilBurgerExam\\templates\\livraison\\board.html.twig");
    }
}
