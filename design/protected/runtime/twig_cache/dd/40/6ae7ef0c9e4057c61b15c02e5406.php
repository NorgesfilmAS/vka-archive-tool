<?php

/* views/selection/caption.twig */
class __TwigTemplate_dd406ae7ef0c9e4057c61b15c02e5406 extends Twig_Template
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
        echo "

<div class=\"bs-content\">
\t<div class=\"row bs-page-header no-padding no-bottom-padding\">
\t\t<div class=\"col-xs-2 id-marker text-center\">";
        // line 8
        echo "{{ recordCount }}";
        echo "</div>
\t\t<div class=\"col-xs-10 no-right-padding info-text\">";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["header"]) ? $context["header"] : null), "html", null, true);
        echo "
\t\t\t<span class=\"pull-right caption-buttons\" >
\t\t\t\t<a href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "article/index", 1 => array("reports" => "")), "method"), "html", null, true);
        echo "\" class=\"btn btn-info btn-sm\" ><span class=\"glyphicon glyphicon-question-sign\"></span></a> 
\t\t\t</span>
\t\t</div>
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "views/selection/caption.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  29 => 9,  25 => 8,  19 => 4,  51 => 23,  45 => 21,  28 => 15,  172 => 76,  163 => 70,  159 => 69,  150 => 63,  141 => 57,  134 => 55,  128 => 50,  124 => 49,  115 => 42,  104 => 39,  101 => 38,  97 => 37,  92 => 35,  86 => 34,  84 => 32,  80 => 31,  77 => 30,  71 => 28,  65 => 22,  60 => 24,  57 => 25,  49 => 22,  46 => 18,  40 => 20,  37 => 14,  34 => 11,  31 => 16,  26 => 4,);
    }
}
