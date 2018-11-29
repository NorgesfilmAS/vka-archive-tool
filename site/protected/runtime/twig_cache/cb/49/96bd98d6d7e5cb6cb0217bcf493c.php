<?php

/* views/art/caption.twig */
class __TwigTemplate_cb4996bd98d6d7e5cb6cb0217bcf493c extends Twig_Template
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
\t<div class=\"row bs-page-header no-padding no-bottom-padding\" style=\"position:relative;\" >
\t\t<div class=\"col-xs-2 id-marker2 id-marker text-center\">
\t\t\t";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "id"), "html", null, true);
        echo "
\t\t</div>
\t\t<div class=\"col-xs-2\">&nbsp;</div>
\t\t<div class=\"col-xs-10 no-right-padding info-text\">";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "title"), "html", null, true);
        echo "</div>
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "views/art/caption.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  24 => 7,  19 => 4,  404 => 156,  399 => 153,  396 => 152,  389 => 146,  380 => 141,  374 => 138,  369 => 136,  362 => 133,  350 => 126,  344 => 125,  338 => 124,  332 => 123,  325 => 119,  320 => 117,  316 => 115,  313 => 114,  302 => 107,  299 => 105,  291 => 102,  288 => 101,  286 => 100,  280 => 97,  275 => 95,  272 => 94,  270 => 93,  266 => 91,  249 => 81,  243 => 78,  239 => 77,  235 => 76,  230 => 73,  227 => 72,  223 => 71,  217 => 68,  214 => 67,  201 => 66,  197 => 65,  191 => 64,  185 => 63,  179 => 62,  173 => 61,  166 => 57,  161 => 55,  155 => 52,  152 => 51,  145 => 47,  140 => 45,  135 => 42,  133 => 41,  130 => 40,  124 => 39,  117 => 37,  113 => 36,  108 => 34,  102 => 31,  89 => 24,  82 => 23,  79 => 22,  68 => 20,  64 => 19,  59 => 17,  52 => 13,  47 => 11,  40 => 8,  36 => 7,  33 => 6,  30 => 10,  27 => 4,);
    }
}
