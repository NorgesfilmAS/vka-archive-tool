<?php

/* views/layouts/logo.twig */
class __TwigTemplate_734f987f27679ac039ce0d6c35ec26c5 extends Twig_Template
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
\t\t<div id=\"logo-pnek-image\">";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "user"), "applicationTitle"), "html", null, true);
        echo "</div>
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
        return array (  33 => 12,  23 => 8,  135 => 38,  131 => 36,  125 => 35,  120 => 33,  93 => 25,  72 => 11,  61 => 9,  58 => 8,  49 => 6,  36 => 5,  29 => 11,  25 => 42,  133 => 29,  128 => 27,  122 => 26,  117 => 24,  110 => 23,  106 => 21,  100 => 28,  97 => 19,  90 => 16,  79 => 13,  76 => 12,  70 => 10,  59 => 8,  34 => 4,  27 => 36,  22 => 41,  19 => 7,  775 => 264,  771 => 261,  768 => 260,  752 => 221,  742 => 220,  732 => 219,  724 => 218,  718 => 222,  715 => 221,  712 => 220,  709 => 219,  707 => 218,  703 => 216,  700 => 215,  695 => 209,  681 => 208,  674 => 204,  668 => 203,  665 => 202,  659 => 199,  656 => 198,  638 => 197,  635 => 196,  628 => 190,  625 => 189,  621 => 188,  617 => 187,  614 => 186,  611 => 185,  600 => 180,  591 => 178,  585 => 175,  581 => 174,  577 => 173,  574 => 172,  571 => 171,  565 => 224,  563 => 215,  556 => 210,  554 => 196,  549 => 193,  547 => 185,  542 => 182,  540 => 171,  535 => 168,  532 => 167,  527 => 143,  522 => 139,  516 => 130,  511 => 116,  504 => 98,  501 => 97,  495 => 91,  489 => 90,  486 => 89,  480 => 100,  478 => 97,  474 => 95,  471 => 93,  469 => 89,  464 => 87,  461 => 86,  456 => 84,  448 => 77,  444 => 75,  441 => 74,  435 => 68,  426 => 61,  423 => 60,  418 => 81,  416 => 74,  408 => 69,  404 => 68,  399 => 66,  394 => 63,  391 => 60,  385 => 56,  383 => 55,  374 => 48,  371 => 47,  366 => 43,  359 => 41,  356 => 40,  351 => 38,  348 => 37,  345 => 36,  342 => 35,  335 => 43,  332 => 40,  329 => 35,  326 => 34,  321 => 28,  316 => 19,  310 => 9,  301 => 268,  296 => 265,  294 => 264,  290 => 262,  288 => 260,  276 => 254,  264 => 245,  257 => 240,  249 => 232,  241 => 226,  239 => 167,  234 => 164,  224 => 144,  218 => 142,  214 => 141,  209 => 139,  206 => 138,  197 => 136,  194 => 135,  189 => 133,  184 => 131,  179 => 129,  177 => 128,  174 => 127,  160 => 121,  156 => 119,  154 => 118,  149 => 116,  146 => 115,  143 => 105,  137 => 30,  132 => 84,  129 => 83,  127 => 47,  118 => 34,  116 => 33,  113 => 32,  99 => 24,  95 => 23,  91 => 22,  88 => 23,  85 => 14,  81 => 22,  73 => 17,  69 => 16,  65 => 15,  56 => 7,  280 => 255,  252 => 106,  236 => 93,  228 => 145,  222 => 143,  219 => 85,  216 => 84,  205 => 81,  202 => 137,  196 => 78,  191 => 77,  182 => 130,  176 => 70,  167 => 124,  163 => 66,  159 => 65,  151 => 63,  147 => 62,  142 => 59,  139 => 103,  124 => 45,  121 => 45,  114 => 40,  111 => 39,  108 => 38,  96 => 29,  92 => 27,  89 => 26,  86 => 25,  78 => 13,  75 => 21,  67 => 17,  64 => 16,  48 => 11,  109 => 30,  103 => 29,  94 => 12,  83 => 23,  80 => 22,  77 => 18,  74 => 20,  71 => 19,  68 => 10,  66 => 9,  60 => 15,  57 => 14,  54 => 6,  51 => 6,  47 => 5,  41 => 8,  38 => 7,  35 => 7,  30 => 4,);
    }
}
