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

/* commande/details.html.twig */
class __TwigTemplate_5bde1faa2aca9d2042704fefb8c5f0fa extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "commande/details.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "commande/details.html.twig"));

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

        yield "Détails de la commande";
        
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
        yield "<div class=\"bb-cmd-details\">

  <div class=\"bb-cmd-details__top\">
    <a class=\"bb-back\" href=\"";
        // line 9
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("commande_index");
        yield "\" aria-label=\"Retour\">←</a>

    <div class=\"bb-cmd-details__titles\">
      <h1 class=\"bb-cmd-details__title\">Détails de la commande</h1>
      <div class=\"bb-cmd-details__ref\">Référence: ";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["dto"]) || array_key_exists("dto", $context) ? $context["dto"] : (function () { throw new RuntimeError('Variable "dto" does not exist.', 13, $this->source); })()), "header", [], "any", false, false, false, 13), "reference", [], "any", false, false, false, 13), "html", null, true);
        yield "</div>
    </div>

    ";
        // line 16
        $context["etatValue"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["dto"]) || array_key_exists("dto", $context) ? $context["dto"] : (function () { throw new RuntimeError('Variable "dto" does not exist.', 16, $this->source); })()), "header", [], "any", false, false, false, 16), "etat", [], "any", false, false, false, 16), "value", [], "any", false, false, false, 16);
        // line 17
        yield "    ";
        $context["etatLabel"] = (((        // line 18
(isset($context["etatValue"]) || array_key_exists("etatValue", $context) ? $context["etatValue"] : (function () { throw new RuntimeError('Variable "etatValue" does not exist.', 18, $this->source); })()) == "ENCOURS")) ? ("En cours") : ((((        // line 19
(isset($context["etatValue"]) || array_key_exists("etatValue", $context) ? $context["etatValue"] : (function () { throw new RuntimeError('Variable "etatValue" does not exist.', 19, $this->source); })()) == "VALIDEE")) ? ("Validée") : ((((        // line 20
(isset($context["etatValue"]) || array_key_exists("etatValue", $context) ? $context["etatValue"] : (function () { throw new RuntimeError('Variable "etatValue" does not exist.', 20, $this->source); })()) == "TERMINER")) ? ("Terminée") : ("Annulée"))))));
        // line 22
        yield "
    ";
        // line 23
        $context["etatClass"] = (((        // line 24
(isset($context["etatValue"]) || array_key_exists("etatValue", $context) ? $context["etatValue"] : (function () { throw new RuntimeError('Variable "etatValue" does not exist.', 24, $this->source); })()) == "ENCOURS")) ? ("bb-pill--warn") : ((((        // line 25
(isset($context["etatValue"]) || array_key_exists("etatValue", $context) ? $context["etatValue"] : (function () { throw new RuntimeError('Variable "etatValue" does not exist.', 25, $this->source); })()) == "VALIDEE")) ? ("bb-pill--info") : ((((        // line 26
(isset($context["etatValue"]) || array_key_exists("etatValue", $context) ? $context["etatValue"] : (function () { throw new RuntimeError('Variable "etatValue" does not exist.', 26, $this->source); })()) == "TERMINER")) ? ("bb-pill--success") : ("bb-pill--danger"))))));
        // line 28
        yield "
    <span class=\"bb-pill ";
        // line 29
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["etatClass"]) || array_key_exists("etatClass", $context) ? $context["etatClass"] : (function () { throw new RuntimeError('Variable "etatClass" does not exist.', 29, $this->source); })()), "html", null, true);
        yield "\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["etatLabel"]) || array_key_exists("etatLabel", $context) ? $context["etatLabel"] : (function () { throw new RuntimeError('Variable "etatLabel" does not exist.', 29, $this->source); })()), "html", null, true);
        yield "</span>
  </div>

  <section class=\"bb-card\">
    <div class=\"bb-card__head\">
      <h2 class=\"bb-card__title\">Informations client</h2>
    </div>

    <div class=\"bb-card__body bb-info\">
      <div class=\"bb-info__row\">
        <div class=\"bb-info__icon\">👤</div>
        <div class=\"bb-info__text\">
          <div class=\"bb-info__label\">Nom complet</div>
          <div class=\"bb-info__value\">";
        // line 42
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["dto"]) || array_key_exists("dto", $context) ? $context["dto"] : (function () { throw new RuntimeError('Variable "dto" does not exist.', 42, $this->source); })()), "client", [], "any", false, false, false, 42), "nomComplet", [], "any", false, false, false, 42), "html", null, true);
        yield "</div>
        </div>
      </div>

      <div class=\"bb-info__row\">
        <div class=\"bb-info__icon\">📞</div>
        <div class=\"bb-info__text\">
          <div class=\"bb-info__label\">Téléphone</div>
          <div class=\"bb-info__value\">";
        // line 50
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["dto"]) || array_key_exists("dto", $context) ? $context["dto"] : (function () { throw new RuntimeError('Variable "dto" does not exist.', 50, $this->source); })()), "client", [], "any", false, false, false, 50), "telephone", [], "any", false, false, false, 50), "html", null, true);
        yield "</div>
        </div>
      </div>
    </div>
  </section>

  <section class=\"bb-card\">
    <div class=\"bb-card__head\">
      <h2 class=\"bb-card__title\">Articles commandés</h2>
    </div>

    <div class=\"bb-card__body bb-items\">
      ";
        // line 62
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["dto"]) || array_key_exists("dto", $context) ? $context["dto"] : (function () { throw new RuntimeError('Variable "dto" does not exist.', 62, $this->source); })()), "lignes", [], "any", false, false, false, 62));
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
        foreach ($context['_seq'] as $context["_key"] => $context["l"]) {
            // line 63
            yield "        <div class=\"bb-item\">
          <div class=\"bb-item__thumb\">
            ";
            // line 65
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["l"], "image", [], "any", false, false, false, 65)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 66
                yield "              <img src=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(CoreExtension::getAttribute($this->env, $this->source, $context["l"], "image", [], "any", false, false, false, 66)), "html", null, true);
                yield "\" alt=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["l"], "designation", [], "any", false, false, false, 66), "html", null, true);
                yield "\">
            ";
            } else {
                // line 68
                yield "              <span class=\"bb-item__ph\">
                ";
                // line 69
                yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["l"], "typeArticle", [], "any", false, false, false, 69), "value", [], "any", false, false, false, 69) == "BURGER")) ? ("🍔") : ((((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["l"], "typeArticle", [], "any", false, false, false, 69), "value", [], "any", false, false, false, 69) == "MENU")) ? ("🍟") : ("➕"))));
                yield "
              </span>
            ";
            }
            // line 72
            yield "          </div>

          <div class=\"bb-item__main\">
            <div class=\"bb-item__name\">";
            // line 75
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["l"], "designation", [], "any", false, false, false, 75), "html", null, true);
            yield "</div>
            <div class=\"bb-item__meta\">Quantité: ";
            // line 76
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["l"], "quantite", [], "any", false, false, false, 76), "html", null, true);
            yield "</div>
            <div class=\"bb-item__meta muted\">";
            // line 77
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["l"], "prixUnitaire", [], "any", false, false, false, 77), "html", null, true);
            yield " FCFA × ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["l"], "quantite", [], "any", false, false, false, 77), "html", null, true);
            yield "</div>
          </div>

          <div class=\"bb-item__price\">";
            // line 80
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["l"], "prixTotal", [], "any", false, false, false, 80), "html", null, true);
            yield " FCFA</div>
        </div>

        ";
            // line 83
            if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 83)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 84
                yield "          <div class=\"bb-sep\"></div>
        ";
            }
            // line 86
            yield "      ";
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
        if (!$context['_iterated']) {
            // line 87
            yield "        <div class=\"bb-empty\">Aucun article.</div>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['l'], $context['_parent'], $context['_iterated'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 89
        yield "    </div>
  </section>

  <section class=\"bb-card\">
    <div class=\"bb-card__head\">
      <h2 class=\"bb-card__title\">Type de consommation</h2>
    </div>

    <div class=\"bb-card__body bb-cons\">
      ";
        // line 98
        $context["tc"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["dto"]) || array_key_exists("dto", $context) ? $context["dto"] : (function () { throw new RuntimeError('Variable "dto" does not exist.', 98, $this->source); })()), "header", [], "any", false, false, false, 98), "typeConsommation", [], "any", false, false, false, 98), "value", [], "any", false, false, false, 98);
        // line 99
        yield "      ";
        $context["tcLabel"] = ((((isset($context["tc"]) || array_key_exists("tc", $context) ? $context["tc"] : (function () { throw new RuntimeError('Variable "tc" does not exist.', 99, $this->source); })()) == "LIVRAISON")) ? ("Livraison") : (((((isset($context["tc"]) || array_key_exists("tc", $context) ? $context["tc"] : (function () { throw new RuntimeError('Variable "tc" does not exist.', 99, $this->source); })()) == "SUR_PLACE")) ? ("Sur place") : ("À emporter"))));
        // line 100
        yield "      ";
        $context["tcIcon"] = ((((isset($context["tc"]) || array_key_exists("tc", $context) ? $context["tc"] : (function () { throw new RuntimeError('Variable "tc" does not exist.', 100, $this->source); })()) == "LIVRAISON")) ? ("🛵") : (((((isset($context["tc"]) || array_key_exists("tc", $context) ? $context["tc"] : (function () { throw new RuntimeError('Variable "tc" does not exist.', 100, $this->source); })()) == "SUR_PLACE")) ? ("🍽️") : ("👜"))));
        // line 101
        yield "
      <div class=\"bb-cons__row\">
        <div class=\"bb-cons__icon\">";
        // line 103
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["tcIcon"]) || array_key_exists("tcIcon", $context) ? $context["tcIcon"] : (function () { throw new RuntimeError('Variable "tcIcon" does not exist.', 103, $this->source); })()), "html", null, true);
        yield "</div>
        <div class=\"bb-cons__text\">
          <div class=\"bb-cons__value\">";
        // line 105
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["tcLabel"]) || array_key_exists("tcLabel", $context) ? $context["tcLabel"] : (function () { throw new RuntimeError('Variable "tcLabel" does not exist.', 105, $this->source); })()), "html", null, true);
        yield "</div>
        </div>
      </div>

      ";
        // line 109
        if (((isset($context["tc"]) || array_key_exists("tc", $context) ? $context["tc"] : (function () { throw new RuntimeError('Variable "tc" does not exist.', 109, $this->source); })()) == "LIVRAISON")) {
            // line 110
            yield "        <div class=\"bb-sep\"></div>

        <div class=\"bb-cons__row\">
          <div class=\"bb-cons__icon\">📍</div>
          <div class=\"bb-cons__text\">
            <div class=\"bb-cons__label\">Adresse de livraison</div>
            <div class=\"bb-cons__value\">";
            // line 116
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["dto"]) || array_key_exists("dto", $context) ? $context["dto"] : (function () { throw new RuntimeError('Variable "dto" does not exist.', 116, $this->source); })()), "header", [], "any", false, false, false, 116), "quartier", [], "any", false, false, false, 116)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["dto"]) || array_key_exists("dto", $context) ? $context["dto"] : (function () { throw new RuntimeError('Variable "dto" does not exist.', 116, $this->source); })()), "header", [], "any", false, false, false, 116), "quartier", [], "any", false, false, false, 116), "html", null, true)) : ("—"));
            yield "</div>
            ";
            // line 117
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["dto"]) || array_key_exists("dto", $context) ? $context["dto"] : (function () { throw new RuntimeError('Variable "dto" does not exist.', 117, $this->source); })()), "header", [], "any", false, false, false, 117), "zone", [], "any", false, false, false, 117)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 118
                yield "              <div class=\"bb-cons__sub\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["dto"]) || array_key_exists("dto", $context) ? $context["dto"] : (function () { throw new RuntimeError('Variable "dto" does not exist.', 118, $this->source); })()), "header", [], "any", false, false, false, 118), "zone", [], "any", false, false, false, 118), "html", null, true);
                yield "</div>
            ";
            }
            // line 120
            yield "            ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["dto"]) || array_key_exists("dto", $context) ? $context["dto"] : (function () { throw new RuntimeError('Variable "dto" does not exist.', 120, $this->source); })()), "header", [], "any", false, false, false, 120), "livreur", [], "any", false, false, false, 120)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 121
                yield "              <div class=\"bb-cons__sub\"><span class=\"muted\">Livreur :</span> ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["dto"]) || array_key_exists("dto", $context) ? $context["dto"] : (function () { throw new RuntimeError('Variable "dto" does not exist.', 121, $this->source); })()), "header", [], "any", false, false, false, 121), "livreur", [], "any", false, false, false, 121), "html", null, true);
                yield "</div>
            ";
            }
            // line 123
            yield "          </div>
        </div>
      ";
        }
        // line 126
        yield "    </div>
  </section>

  <section class=\"bb-card\">
    <div class=\"bb-card__head\">
      <h2 class=\"bb-card__title\">Paiement</h2>
    </div>

    <div class=\"bb-card__body bb-pay\">
      <div class=\"bb-pay__row\">
        <div class=\"bb-pay__label\">Total</div>
        <div class=\"bb-pay__value is-strong\">";
        // line 137
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["dto"]) || array_key_exists("dto", $context) ? $context["dto"] : (function () { throw new RuntimeError('Variable "dto" does not exist.', 137, $this->source); })()), "header", [], "any", false, false, false, 137), "montantTotal", [], "any", false, false, false, 137), "html", null, true);
        yield " FCFA</div>
      </div>

      <div class=\"bb-pay__row bb-pay__row--box\">
        <div class=\"bb-pay__label\">Mode de paiement</div>
        <div class=\"bb-pay__value\">";
        // line 142
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["dto"]) || array_key_exists("dto", $context) ? $context["dto"] : (function () { throw new RuntimeError('Variable "dto" does not exist.', 142, $this->source); })()), "paiement", [], "any", false, false, false, 142)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["dto"]) || array_key_exists("dto", $context) ? $context["dto"] : (function () { throw new RuntimeError('Variable "dto" does not exist.', 142, $this->source); })()), "paiement", [], "any", false, false, false, 142), "modePaiement", [], "any", false, false, false, 142), "value", [], "any", false, false, false, 142), "html", null, true)) : ("—"));
        yield "</div>
      </div>

      ";
        // line 145
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["dto"]) || array_key_exists("dto", $context) ? $context["dto"] : (function () { throw new RuntimeError('Variable "dto" does not exist.', 145, $this->source); })()), "paiement", [], "any", false, false, false, 145)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 146
            yield "        <div class=\"bb-alert bb-alert--success\">✓ Paiement effectué</div>
      ";
        } else {
            // line 148
            yield "        <div class=\"bb-alert bb-alert--muted\">Paiement non enregistré</div>
      ";
        }
        // line 150
        yield "    </div>
  </section>

  <section class=\"bb-card\">
    <div class=\"bb-card__head\">
      <h2 class=\"bb-card__title\">Chronologie</h2>
    </div>

    <div class=\"bb-card__body bb-time\">
      <div class=\"bb-time__item\">
        <div class=\"bb-time__dot\">✓</div>
        <div class=\"bb-time__content\">
          <div class=\"bb-time__title\">Commande reçue</div>
          <div class=\"bb-time__sub\">";
        // line 163
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["dto"]) || array_key_exists("dto", $context) ? $context["dto"] : (function () { throw new RuntimeError('Variable "dto" does not exist.', 163, $this->source); })()), "header", [], "any", false, false, false, 163), "dateCommande", [], "any", false, false, false, 163), "d/m/Y H:i:s"), "html", null, true);
        yield "</div>
        </div>
      </div>
    </div>
  </section>

  ";
        // line 169
        if (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["dto"]) || array_key_exists("dto", $context) ? $context["dto"] : (function () { throw new RuntimeError('Variable "dto" does not exist.', 169, $this->source); })()), "actions", [], "any", false, false, false, 169), "canValidate", [], "any", false, false, false, 169) || CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["dto"]) || array_key_exists("dto", $context) ? $context["dto"] : (function () { throw new RuntimeError('Variable "dto" does not exist.', 169, $this->source); })()), "actions", [], "any", false, false, false, 169), "canTerminate", [], "any", false, false, false, 169)) || CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["dto"]) || array_key_exists("dto", $context) ? $context["dto"] : (function () { throw new RuntimeError('Variable "dto" does not exist.', 169, $this->source); })()), "actions", [], "any", false, false, false, 169), "canCancel", [], "any", false, false, false, 169))) {
            // line 170
            yield "    <section class=\"bb-card\">
      <div class=\"bb-card__head\">
        <h2 class=\"bb-card__title\">Actions</h2>
      </div>

      <div class=\"bb-card__body bb-actions\">
        ";
            // line 176
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["dto"]) || array_key_exists("dto", $context) ? $context["dto"] : (function () { throw new RuntimeError('Variable "dto" does not exist.', 176, $this->source); })()), "actions", [], "any", false, false, false, 176), "canValidate", [], "any", false, false, false, 176)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 177
                yield "          <form method=\"post\" action=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("commande_validate", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["dto"]) || array_key_exists("dto", $context) ? $context["dto"] : (function () { throw new RuntimeError('Variable "dto" does not exist.', 177, $this->source); })()), "header", [], "any", false, false, false, 177), "id", [], "any", false, false, false, 177)]), "html", null, true);
                yield "\">
            <button class=\"bb-act bb-act--blue\" type=\"submit\">Valider la commande</button>
          </form>
        ";
            }
            // line 181
            yield "
        ";
            // line 182
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["dto"]) || array_key_exists("dto", $context) ? $context["dto"] : (function () { throw new RuntimeError('Variable "dto" does not exist.', 182, $this->source); })()), "actions", [], "any", false, false, false, 182), "canTerminate", [], "any", false, false, false, 182)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 183
                yield "          <form method=\"post\" action=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("commande_terminate", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["dto"]) || array_key_exists("dto", $context) ? $context["dto"] : (function () { throw new RuntimeError('Variable "dto" does not exist.', 183, $this->source); })()), "header", [], "any", false, false, false, 183), "id", [], "any", false, false, false, 183)]), "html", null, true);
                yield "\">
            <button class=\"bb-act bb-act--green\" type=\"submit\">Marquer comme terminée</button>
          </form>
        ";
            }
            // line 187
            yield "
        ";
            // line 188
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["dto"]) || array_key_exists("dto", $context) ? $context["dto"] : (function () { throw new RuntimeError('Variable "dto" does not exist.', 188, $this->source); })()), "actions", [], "any", false, false, false, 188), "canCancel", [], "any", false, false, false, 188)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 189
                yield "        <form method=\"post\"
              action=\"";
                // line 190
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("commande_cancel", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["dto"]) || array_key_exists("dto", $context) ? $context["dto"] : (function () { throw new RuntimeError('Variable "dto" does not exist.', 190, $this->source); })()), "header", [], "any", false, false, false, 190), "id", [], "any", false, false, false, 190)]), "html", null, true);
                yield "\"
              data-confirm=\"cancel\"
              data-confirm-message=\"Voulez-vous vraiment annuler cette commande ?\"
              data-confirm-meta=\"Commande ";
                // line 193
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["dto"]) || array_key_exists("dto", $context) ? $context["dto"] : (function () { throw new RuntimeError('Variable "dto" does not exist.', 193, $this->source); })()), "header", [], "any", false, false, false, 193), "reference", [], "any", false, false, false, 193), "html", null, true);
                yield "\">
          <button class=\"bb-act bb-act--red\" type=\"submit\">Annuler la commande</button>
        </form>

        ";
            }
            // line 198
            yield "      </div>
    </section>
  ";
        }
        // line 201
        yield "
  <section class=\"bb-card\">
    <div class=\"bb-card__head\">
      <h2 class=\"bb-card__title\">Informations</h2>
    </div>

    <div class=\"bb-card__body bb-kv\">
      <div class=\"bb-kv__row\">
        <div class=\"bb-kv__k\">Date de commande</div>
        <div class=\"bb-kv__v\">";
        // line 210
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["dto"]) || array_key_exists("dto", $context) ? $context["dto"] : (function () { throw new RuntimeError('Variable "dto" does not exist.', 210, $this->source); })()), "header", [], "any", false, false, false, 210), "dateCommande", [], "any", false, false, false, 210), "d/m/Y H:i"), "html", null, true);
        yield "</div>
      </div>
      <div class=\"bb-kv__row\">
        <div class=\"bb-kv__k\">Référence</div>
        <div class=\"bb-kv__v\">";
        // line 214
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["dto"]) || array_key_exists("dto", $context) ? $context["dto"] : (function () { throw new RuntimeError('Variable "dto" does not exist.', 214, $this->source); })()), "header", [], "any", false, false, false, 214), "reference", [], "any", false, false, false, 214), "html", null, true);
        yield "</div>
      </div>
      <div class=\"bb-kv__row\">
        <div class=\"bb-kv__k\">Nombre d'articles</div>
        <div class=\"bb-kv__v\">";
        // line 218
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["dto"]) || array_key_exists("dto", $context) ? $context["dto"] : (function () { throw new RuntimeError('Variable "dto" does not exist.', 218, $this->source); })()), "lignes", [], "any", false, false, false, 218)), "html", null, true);
        yield "</div>
      </div>
    </div>
  </section>

</div>
";
        // line 224
        yield from $this->load("partials/confirm_modal.html.twig", 224)->unwrap()->yield($context);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "commande/details.html.twig";
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
        return array (  501 => 224,  492 => 218,  485 => 214,  478 => 210,  467 => 201,  462 => 198,  454 => 193,  448 => 190,  445 => 189,  443 => 188,  440 => 187,  432 => 183,  430 => 182,  427 => 181,  419 => 177,  417 => 176,  409 => 170,  407 => 169,  398 => 163,  383 => 150,  379 => 148,  375 => 146,  373 => 145,  367 => 142,  359 => 137,  346 => 126,  341 => 123,  335 => 121,  332 => 120,  326 => 118,  324 => 117,  320 => 116,  312 => 110,  310 => 109,  303 => 105,  298 => 103,  294 => 101,  291 => 100,  288 => 99,  286 => 98,  275 => 89,  268 => 87,  255 => 86,  251 => 84,  249 => 83,  243 => 80,  235 => 77,  231 => 76,  227 => 75,  222 => 72,  216 => 69,  213 => 68,  205 => 66,  203 => 65,  199 => 63,  181 => 62,  166 => 50,  155 => 42,  137 => 29,  134 => 28,  132 => 26,  131 => 25,  130 => 24,  129 => 23,  126 => 22,  124 => 20,  123 => 19,  122 => 18,  120 => 17,  118 => 16,  112 => 13,  105 => 9,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Détails de la commande{% endblock %}

{% block body %}
<div class=\"bb-cmd-details\">

  <div class=\"bb-cmd-details__top\">
    <a class=\"bb-back\" href=\"{{ path('commande_index') }}\" aria-label=\"Retour\">←</a>

    <div class=\"bb-cmd-details__titles\">
      <h1 class=\"bb-cmd-details__title\">Détails de la commande</h1>
      <div class=\"bb-cmd-details__ref\">Référence: {{ dto.header.reference }}</div>
    </div>

    {% set etatValue = dto.header.etat.value %}
    {% set etatLabel =
      etatValue == 'ENCOURS' ? 'En cours' :
      (etatValue == 'VALIDEE' ? 'Validée' :
      (etatValue == 'TERMINER' ? 'Terminée' : 'Annulée'))
    %}

    {% set etatClass =
      etatValue == 'ENCOURS' ? 'bb-pill--warn' :
      (etatValue == 'VALIDEE' ? 'bb-pill--info' :
      (etatValue == 'TERMINER' ? 'bb-pill--success' : 'bb-pill--danger'))
    %}

    <span class=\"bb-pill {{ etatClass }}\">{{ etatLabel }}</span>
  </div>

  <section class=\"bb-card\">
    <div class=\"bb-card__head\">
      <h2 class=\"bb-card__title\">Informations client</h2>
    </div>

    <div class=\"bb-card__body bb-info\">
      <div class=\"bb-info__row\">
        <div class=\"bb-info__icon\">👤</div>
        <div class=\"bb-info__text\">
          <div class=\"bb-info__label\">Nom complet</div>
          <div class=\"bb-info__value\">{{ dto.client.nomComplet }}</div>
        </div>
      </div>

      <div class=\"bb-info__row\">
        <div class=\"bb-info__icon\">📞</div>
        <div class=\"bb-info__text\">
          <div class=\"bb-info__label\">Téléphone</div>
          <div class=\"bb-info__value\">{{ dto.client.telephone }}</div>
        </div>
      </div>
    </div>
  </section>

  <section class=\"bb-card\">
    <div class=\"bb-card__head\">
      <h2 class=\"bb-card__title\">Articles commandés</h2>
    </div>

    <div class=\"bb-card__body bb-items\">
      {% for l in dto.lignes %}
        <div class=\"bb-item\">
          <div class=\"bb-item__thumb\">
            {% if l.image %}
              <img src=\"{{ asset(l.image) }}\" alt=\"{{ l.designation }}\">
            {% else %}
              <span class=\"bb-item__ph\">
                {{ l.typeArticle.value == 'BURGER' ? '🍔' : (l.typeArticle.value == 'MENU' ? '🍟' : '➕') }}
              </span>
            {% endif %}
          </div>

          <div class=\"bb-item__main\">
            <div class=\"bb-item__name\">{{ l.designation }}</div>
            <div class=\"bb-item__meta\">Quantité: {{ l.quantite }}</div>
            <div class=\"bb-item__meta muted\">{{ l.prixUnitaire }} FCFA × {{ l.quantite }}</div>
          </div>

          <div class=\"bb-item__price\">{{ l.prixTotal }} FCFA</div>
        </div>

        {% if not loop.last %}
          <div class=\"bb-sep\"></div>
        {% endif %}
      {% else %}
        <div class=\"bb-empty\">Aucun article.</div>
      {% endfor %}
    </div>
  </section>

  <section class=\"bb-card\">
    <div class=\"bb-card__head\">
      <h2 class=\"bb-card__title\">Type de consommation</h2>
    </div>

    <div class=\"bb-card__body bb-cons\">
      {% set tc = dto.header.typeConsommation.value %}
      {% set tcLabel = tc == 'LIVRAISON' ? 'Livraison' : (tc == 'SUR_PLACE' ? 'Sur place' : 'À emporter') %}
      {% set tcIcon = tc == 'LIVRAISON' ? '🛵' : (tc == 'SUR_PLACE' ? '🍽️' : '👜') %}

      <div class=\"bb-cons__row\">
        <div class=\"bb-cons__icon\">{{ tcIcon }}</div>
        <div class=\"bb-cons__text\">
          <div class=\"bb-cons__value\">{{ tcLabel }}</div>
        </div>
      </div>

      {% if tc == 'LIVRAISON' %}
        <div class=\"bb-sep\"></div>

        <div class=\"bb-cons__row\">
          <div class=\"bb-cons__icon\">📍</div>
          <div class=\"bb-cons__text\">
            <div class=\"bb-cons__label\">Adresse de livraison</div>
            <div class=\"bb-cons__value\">{{ dto.header.quartier ? dto.header.quartier : '—' }}</div>
            {% if dto.header.zone %}
              <div class=\"bb-cons__sub\">{{ dto.header.zone }}</div>
            {% endif %}
            {% if dto.header.livreur %}
              <div class=\"bb-cons__sub\"><span class=\"muted\">Livreur :</span> {{ dto.header.livreur }}</div>
            {% endif %}
          </div>
        </div>
      {% endif %}
    </div>
  </section>

  <section class=\"bb-card\">
    <div class=\"bb-card__head\">
      <h2 class=\"bb-card__title\">Paiement</h2>
    </div>

    <div class=\"bb-card__body bb-pay\">
      <div class=\"bb-pay__row\">
        <div class=\"bb-pay__label\">Total</div>
        <div class=\"bb-pay__value is-strong\">{{ dto.header.montantTotal }} FCFA</div>
      </div>

      <div class=\"bb-pay__row bb-pay__row--box\">
        <div class=\"bb-pay__label\">Mode de paiement</div>
        <div class=\"bb-pay__value\">{{ dto.paiement ? dto.paiement.modePaiement.value : '—' }}</div>
      </div>

      {% if dto.paiement %}
        <div class=\"bb-alert bb-alert--success\">✓ Paiement effectué</div>
      {% else %}
        <div class=\"bb-alert bb-alert--muted\">Paiement non enregistré</div>
      {% endif %}
    </div>
  </section>

  <section class=\"bb-card\">
    <div class=\"bb-card__head\">
      <h2 class=\"bb-card__title\">Chronologie</h2>
    </div>

    <div class=\"bb-card__body bb-time\">
      <div class=\"bb-time__item\">
        <div class=\"bb-time__dot\">✓</div>
        <div class=\"bb-time__content\">
          <div class=\"bb-time__title\">Commande reçue</div>
          <div class=\"bb-time__sub\">{{ dto.header.dateCommande|date('d/m/Y H:i:s') }}</div>
        </div>
      </div>
    </div>
  </section>

  {% if dto.actions.canValidate or dto.actions.canTerminate or dto.actions.canCancel %}
    <section class=\"bb-card\">
      <div class=\"bb-card__head\">
        <h2 class=\"bb-card__title\">Actions</h2>
      </div>

      <div class=\"bb-card__body bb-actions\">
        {% if dto.actions.canValidate %}
          <form method=\"post\" action=\"{{ path('commande_validate', {id: dto.header.id}) }}\">
            <button class=\"bb-act bb-act--blue\" type=\"submit\">Valider la commande</button>
          </form>
        {% endif %}

        {% if dto.actions.canTerminate %}
          <form method=\"post\" action=\"{{ path('commande_terminate', {id: dto.header.id}) }}\">
            <button class=\"bb-act bb-act--green\" type=\"submit\">Marquer comme terminée</button>
          </form>
        {% endif %}

        {% if dto.actions.canCancel %}
        <form method=\"post\"
              action=\"{{ path('commande_cancel', {id: dto.header.id}) }}\"
              data-confirm=\"cancel\"
              data-confirm-message=\"Voulez-vous vraiment annuler cette commande ?\"
              data-confirm-meta=\"Commande {{ dto.header.reference }}\">
          <button class=\"bb-act bb-act--red\" type=\"submit\">Annuler la commande</button>
        </form>

        {% endif %}
      </div>
    </section>
  {% endif %}

  <section class=\"bb-card\">
    <div class=\"bb-card__head\">
      <h2 class=\"bb-card__title\">Informations</h2>
    </div>

    <div class=\"bb-card__body bb-kv\">
      <div class=\"bb-kv__row\">
        <div class=\"bb-kv__k\">Date de commande</div>
        <div class=\"bb-kv__v\">{{ dto.header.dateCommande|date('d/m/Y H:i') }}</div>
      </div>
      <div class=\"bb-kv__row\">
        <div class=\"bb-kv__k\">Référence</div>
        <div class=\"bb-kv__v\">{{ dto.header.reference }}</div>
      </div>
      <div class=\"bb-kv__row\">
        <div class=\"bb-kv__k\">Nombre d'articles</div>
        <div class=\"bb-kv__v\">{{ dto.lignes|length }}</div>
      </div>
    </div>
  </section>

</div>
{% include 'partials/confirm_modal.html.twig' %}
{% endblock %}
", "commande/details.html.twig", "C:\\Users\\oper\\Desktop\\L3_GLRS_COURS\\SEM1\\BrasilBurgerExam\\BrasilBurgerExam\\templates\\commande\\details.html.twig");
    }
}
