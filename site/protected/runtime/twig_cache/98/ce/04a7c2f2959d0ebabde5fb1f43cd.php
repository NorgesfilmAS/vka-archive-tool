<?php

/* /views/moderation/listResource.twig */
class __TwigTemplate_98ce04a7c2f2959d0ebabde5fb1f43cd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 4
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["model"]) ? $context["model"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["resource"]) {
            // line 5
            echo "<div class=\"cls-transaction clickable panel-item-full\" data-url=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => (isset($context["detailUrl"]) ? $context["detailUrl"] : null), 1 => array("id" => (isset($context["id"]) ? $context["id"] : null), "d" => (isset($context["date"]) ? $context["date"] : null), "resource_id" => $this->getAttribute((isset($context["resource"]) ? $context["resource"] : null), "id"))), "method"), "html", null, true);
            echo " \">
\t";
            // line 6
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["resource"]) ? $context["resource"] : null), "caption"), "html", null, true);
            echo "
\t<a href=\"";
            // line 7
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => (twig_lower_filter($this->env, $this->getAttribute((isset($context["resource"]) ? $context["resource"] : null), "type")) . "/view"), 1 => array("id" => $this->getAttribute((isset($context["resource"]) ? $context["resource"] : null), "id"))), "method"), "html", null, true);
            echo "\">
\t\t<span class=\"glyphicon glyphicon-link\"></span>
\t</a>\t
\t<div class='pull-right'>";
            // line 10
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["resource"]) ? $context["resource"] : null), "id"), "html", null, true);
            echo "</div>
</div>
";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 13
            echo twig_escape_filter($this->env, YiiTranslate("app", "No resources found"), "html", null, true);
            echo " 
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['resource'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
    }

    public function getTemplateName()
    {
        return "/views/moderation/listResource.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 13,  39 => 10,  33 => 7,  29 => 6,  24 => 5,  19 => 4,);
    }
}
