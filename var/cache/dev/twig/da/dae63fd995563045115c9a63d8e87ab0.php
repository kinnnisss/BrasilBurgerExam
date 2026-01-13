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

/* partials/pagination.html.twig */
class __TwigTemplate_265bc9b98a40212a7d39a12ac8dbcd10 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "partials/pagination.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "partials/pagination.html.twig"));

        // line 2
        $context["routeParams"] = (((array_key_exists("routeParams", $context) &&  !(null === $context["routeParams"]))) ? ($context["routeParams"]) : ([]));
        // line 3
        $context["page"] = (((CoreExtension::getAttribute($this->env, $this->source, ($context["paged"] ?? null), "page", [], "any", true, true, false, 3) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["paged"]) || array_key_exists("paged", $context) ? $context["paged"] : (function () { throw new RuntimeError('Variable "paged" does not exist.', 3, $this->source); })()), "page", [], "any", false, false, false, 3)))) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["paged"]) || array_key_exists("paged", $context) ? $context["paged"] : (function () { throw new RuntimeError('Variable "paged" does not exist.', 3, $this->source); })()), "page", [], "any", false, false, false, 3)) : (1));
        // line 4
        $context["pageSize"] = (((CoreExtension::getAttribute($this->env, $this->source, ($context["paged"] ?? null), "pageSize", [], "any", true, true, false, 4) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["paged"]) || array_key_exists("paged", $context) ? $context["paged"] : (function () { throw new RuntimeError('Variable "paged" does not exist.', 4, $this->source); })()), "pageSize", [], "any", false, false, false, 4)))) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["paged"]) || array_key_exists("paged", $context) ? $context["paged"] : (function () { throw new RuntimeError('Variable "paged" does not exist.', 4, $this->source); })()), "pageSize", [], "any", false, false, false, 4)) : (12));
        // line 5
        $context["totalItems"] = (((CoreExtension::getAttribute($this->env, $this->source, ($context["paged"] ?? null), "totalItems", [], "any", true, true, false, 5) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["paged"]) || array_key_exists("paged", $context) ? $context["paged"] : (function () { throw new RuntimeError('Variable "paged" does not exist.', 5, $this->source); })()), "totalItems", [], "any", false, false, false, 5)))) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["paged"]) || array_key_exists("paged", $context) ? $context["paged"] : (function () { throw new RuntimeError('Variable "paged" does not exist.', 5, $this->source); })()), "totalItems", [], "any", false, false, false, 5)) : (0));
        // line 6
        yield "
";
        // line 7
        $context["totalPages"] = Twig\Extension\CoreExtension::round(((isset($context["totalItems"]) || array_key_exists("totalItems", $context) ? $context["totalItems"] : (function () { throw new RuntimeError('Variable "totalItems" does not exist.', 7, $this->source); })()) / (isset($context["pageSize"]) || array_key_exists("pageSize", $context) ? $context["pageSize"] : (function () { throw new RuntimeError('Variable "pageSize" does not exist.', 7, $this->source); })())), 0, "ceil");
        // line 8
        if (((isset($context["totalPages"]) || array_key_exists("totalPages", $context) ? $context["totalPages"] : (function () { throw new RuntimeError('Variable "totalPages" does not exist.', 8, $this->source); })()) < 1)) {
            $context["totalPages"] = 1;
        }
        // line 9
        yield "
";
        // line 10
        $context["query"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 10, $this->source); })()), "request", [], "any", false, false, false, 10), "query", [], "any", false, false, false, 10), "all", [], "any", false, false, false, 10);
        // line 11
        yield "
<nav class=\"bb-pagination\" aria-label=\"Pagination\">

    ";
        // line 14
        if (((isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 14, $this->source); })()) > 1)) {
            // line 15
            yield "        <a class=\"bb-page\"
           href=\"";
            // line 16
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath((isset($context["route"]) || array_key_exists("route", $context) ? $context["route"] : (function () { throw new RuntimeError('Variable "route" does not exist.', 16, $this->source); })()), Twig\Extension\CoreExtension::merge(Twig\Extension\CoreExtension::merge((isset($context["routeParams"]) || array_key_exists("routeParams", $context) ? $context["routeParams"] : (function () { throw new RuntimeError('Variable "routeParams" does not exist.', 16, $this->source); })()), (isset($context["query"]) || array_key_exists("query", $context) ? $context["query"] : (function () { throw new RuntimeError('Variable "query" does not exist.', 16, $this->source); })())), ["page" => ((isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 16, $this->source); })()) - 1)])), "html", null, true);
            yield "\">
            Précédent
        </a>
    ";
        } else {
            // line 20
            yield "        <span class=\"bb-page is-disabled\">Précédent</span>
    ";
        }
        // line 22
        yield "
    ";
        // line 23
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(range(1, (isset($context["totalPages"]) || array_key_exists("totalPages", $context) ? $context["totalPages"] : (function () { throw new RuntimeError('Variable "totalPages" does not exist.', 23, $this->source); })())));
        foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
            // line 24
            yield "        ";
            if (($context["p"] == (isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 24, $this->source); })()))) {
                // line 25
                yield "            <span class=\"bb-page is-active\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["p"], "html", null, true);
                yield "</span>
        ";
            } else {
                // line 27
                yield "            <a class=\"bb-page\"
               href=\"";
                // line 28
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath((isset($context["route"]) || array_key_exists("route", $context) ? $context["route"] : (function () { throw new RuntimeError('Variable "route" does not exist.', 28, $this->source); })()), Twig\Extension\CoreExtension::merge(Twig\Extension\CoreExtension::merge((isset($context["routeParams"]) || array_key_exists("routeParams", $context) ? $context["routeParams"] : (function () { throw new RuntimeError('Variable "routeParams" does not exist.', 28, $this->source); })()), (isset($context["query"]) || array_key_exists("query", $context) ? $context["query"] : (function () { throw new RuntimeError('Variable "query" does not exist.', 28, $this->source); })())), ["page" => $context["p"]])), "html", null, true);
                yield "\">
                ";
                // line 29
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["p"], "html", null, true);
                yield "
            </a>
        ";
            }
            // line 32
            yield "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['p'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        yield "
    ";
        // line 34
        if (((isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 34, $this->source); })()) < (isset($context["totalPages"]) || array_key_exists("totalPages", $context) ? $context["totalPages"] : (function () { throw new RuntimeError('Variable "totalPages" does not exist.', 34, $this->source); })()))) {
            // line 35
            yield "        <a class=\"bb-page\"
           href=\"";
            // line 36
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath((isset($context["route"]) || array_key_exists("route", $context) ? $context["route"] : (function () { throw new RuntimeError('Variable "route" does not exist.', 36, $this->source); })()), Twig\Extension\CoreExtension::merge(Twig\Extension\CoreExtension::merge((isset($context["routeParams"]) || array_key_exists("routeParams", $context) ? $context["routeParams"] : (function () { throw new RuntimeError('Variable "routeParams" does not exist.', 36, $this->source); })()), (isset($context["query"]) || array_key_exists("query", $context) ? $context["query"] : (function () { throw new RuntimeError('Variable "query" does not exist.', 36, $this->source); })())), ["page" => ((isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 36, $this->source); })()) + 1)])), "html", null, true);
            yield "\">
            Suivant
        </a>
    ";
        } else {
            // line 40
            yield "        <span class=\"bb-page is-disabled\">Suivant</span>
    ";
        }
        // line 42
        yield "
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
        return "partials/pagination.html.twig";
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
        return array (  145 => 42,  141 => 40,  134 => 36,  131 => 35,  129 => 34,  126 => 33,  120 => 32,  114 => 29,  110 => 28,  107 => 27,  101 => 25,  98 => 24,  94 => 23,  91 => 22,  87 => 20,  80 => 16,  77 => 15,  75 => 14,  70 => 11,  68 => 10,  65 => 9,  61 => 8,  59 => 7,  56 => 6,  54 => 5,  52 => 4,  50 => 3,  48 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# templates/partials/pagination.html.twig #}
{% set routeParams = routeParams ?? {} %}
{% set page = paged.page ?? 1 %}
{% set pageSize = paged.pageSize ?? 12 %}
{% set totalItems = paged.totalItems ?? 0 %}

{% set totalPages = (totalItems / pageSize)|round(0, 'ceil') %}
{% if totalPages < 1 %}{% set totalPages = 1 %}{% endif %}

{% set query = app.request.query.all %}

<nav class=\"bb-pagination\" aria-label=\"Pagination\">

    {% if page > 1 %}
        <a class=\"bb-page\"
           href=\"{{ path(route, routeParams|merge(query)|merge({ page: page - 1 })) }}\">
            Précédent
        </a>
    {% else %}
        <span class=\"bb-page is-disabled\">Précédent</span>
    {% endif %}

    {% for p in 1..totalPages %}
        {% if p == page %}
            <span class=\"bb-page is-active\">{{ p }}</span>
        {% else %}
            <a class=\"bb-page\"
               href=\"{{ path(route, routeParams|merge(query)|merge({ page: p })) }}\">
                {{ p }}
            </a>
        {% endif %}
    {% endfor %}

    {% if page < totalPages %}
        <a class=\"bb-page\"
           href=\"{{ path(route,routeParams|merge(query)|merge({ page: page + 1 })) }}\">
            Suivant
        </a>
    {% else %}
        <span class=\"bb-page is-disabled\">Suivant</span>
    {% endif %}

</nav>
", "partials/pagination.html.twig", "C:\\Users\\oper\\Desktop\\L3_GLRS_COURS\\SEM1\\BrasilBurgerExam\\BrasilBurgerExam\\templates\\partials\\pagination.html.twig");
    }
}
