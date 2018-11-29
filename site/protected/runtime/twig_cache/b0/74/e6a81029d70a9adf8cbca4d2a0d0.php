<?php

/* views/layouts/logo.twig */
class __TwigTemplate_b074e6a81029d70a9adf8cbca4d2a0d0 extends Twig_Template
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
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "registerCssFile", array(0 => "pnek.css"), "method"), "html", null, true);
        echo "
";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "registerCssFile", array(0 => "pnek.bauhaus.css"), "method"), "html", null, true);
        echo "

<div id=\"logo-pnek\">
\t<a href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["App"]) ? $context["App"] : null), "baseUrl"), "html", null, true);
        echo "\">
\t\t<div id=\"logo-pnek-image\">Archive Tool</div>
\t</a>\t\t
</div>

";
    }

    public function getTemplateName()
    {
        return "views/layouts/logo.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  29 => 11,  23 => 8,  19 => 7,  280 => 131,  252 => 106,  236 => 93,  228 => 87,  222 => 86,  219 => 85,  216 => 84,  205 => 81,  202 => 80,  196 => 78,  191 => 77,  182 => 74,  176 => 70,  167 => 67,  163 => 66,  159 => 65,  151 => 63,  147 => 62,  142 => 59,  139 => 58,  124 => 45,  121 => 44,  114 => 40,  111 => 39,  108 => 38,  96 => 29,  92 => 27,  89 => 26,  86 => 25,  78 => 22,  75 => 21,  67 => 17,  64 => 16,  60 => 15,  57 => 14,  54 => 13,  48 => 11,  41 => 8,  38 => 7,);
    }
}
