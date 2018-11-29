<?php

/* views/logging/caption.twig */
class __TwigTemplate_a21824050de23fefd41c54a5cda65b04 extends Twig_Template
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
        echo "<div class=\"bs-content\">
\t<div class=\"row bs-page-header no-padding no-bottom-padding\">
\t\t<div class=\"col-sm-2 id-marker text-center\">";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["modelClass"]) ? $context["modelClass"] : null), "html", null, true);
        echo "</div>
\t\t<div class=\"col-sm-10 no-right-padding info-text\">Logging
\t\t<span class=\"pull-right \" ></span></div>
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "views/logging/caption.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  23 => 6,  19 => 4,  183 => 78,  173 => 70,  167 => 69,  164 => 68,  161 => 67,  153 => 60,  151 => 53,  142 => 46,  127 => 45,  123 => 44,  116 => 40,  111 => 37,  96 => 36,  92 => 35,  85 => 31,  79 => 28,  75 => 27,  71 => 26,  67 => 25,  63 => 24,  59 => 23,  53 => 19,  46 => 16,  42 => 14,  40 => 13,  37 => 12,  33 => 10,  30 => 9,  27 => 8,);
    }
}
