<?php

/* views/agent/caption.twig */
class __TwigTemplate_2a2bfffdfb2e6a6919b2be746dc3e3be extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "id"), "html", null, true);
        echo "</div>
\t\t<div class=\"col-xs-10 no-right-padding info-text\">";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "name"), "html", null, true);
        echo "</div>\t\t\t
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "views/agent/caption.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  29 => 9,  25 => 8,  19 => 4,  336 => 115,  333 => 114,  324 => 106,  315 => 100,  306 => 99,  298 => 97,  293 => 96,  286 => 92,  281 => 90,  277 => 88,  275 => 87,  272 => 86,  264 => 80,  252 => 77,  247 => 75,  243 => 73,  238 => 72,  235 => 71,  226 => 70,  222 => 69,  216 => 66,  210 => 63,  207 => 62,  199 => 61,  197 => 60,  193 => 58,  189 => 57,  183 => 54,  177 => 50,  175 => 49,  171 => 47,  163 => 41,  156 => 40,  152 => 39,  149 => 38,  142 => 36,  138 => 35,  128 => 34,  124 => 33,  120 => 32,  116 => 31,  112 => 30,  108 => 29,  103 => 28,  98 => 27,  96 => 26,  90 => 25,  87 => 24,  79 => 23,  77 => 22,  71 => 21,  64 => 17,  59 => 15,  56 => 14,  54 => 13,  51 => 12,  48 => 11,  44 => 9,  41 => 8,  31 => 4,  28 => 3,);
    }
}
