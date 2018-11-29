<?php

/* /views/access/viewGroupList.twig */
class __TwigTemplate_1f4473a651203be29ed1ac7cbeef5bcf extends Twig_Template
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
        // line 1
        echo "<div class=\"grid-row art-row row a-url table-hover\" data-url=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "access/group", 1 => array("id" => $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "ref"))), "method"), "html", null, true);
        echo "\" >\t
\t<div class=\"col-xs-1 text-right\">";
        // line 2
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "ref"), "html", null, true);
        echo "</div>\t
\t<div class=\"col-xs-4 grid-col-no-wrap\">";
        // line 3
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "name"), "html", null, true);
        echo "</div>\t
\t<div class=\"col-xs-4 grid-col-no-wrap\">";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "parentgroup"), "name"), "html", null, true);
        echo "</div>\t
</div>";
    }

    public function getTemplateName()
    {
        return "/views/access/viewGroupList.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  32 => 4,  28 => 3,  24 => 2,  19 => 1,  79 => 48,  76 => 47,  73 => 46,  64 => 39,  54 => 31,  52 => 16,  47 => 14,  43 => 13,  39 => 12,  33 => 9,  30 => 8,  27 => 7,);
    }
}
