<?php

/* vendors/toxus/views/layouts/flash.twig */
class __TwigTemplate_d279d3b915a49a67e72869d88e1e210f extends Twig_Template
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
        $context["styles"] = array("error" => "danger", "notice" => "info");
        // line 6
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "user"), "getFlashes", array(), "method"));
        foreach ($context['_seq'] as $context["key"] => $context["message"]) {
            // line 7
            echo "<br />

<div class=\"panel panel-";
            // line 9
            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["styles"]) ? $context["styles"] : null), (isset($context["key"]) ? $context["key"] : null), array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["styles"]) ? $context["styles"] : null), (isset($context["key"]) ? $context["key"] : null)), (isset($context["key"]) ? $context["key"] : null))) : ((isset($context["key"]) ? $context["key"] : null))), "html", null, true);
            echo "\">
\t<div class=\"panel-heading\">
    <h3 class=\"panel-title\">";
            // line 11
            echo twig_escape_filter($this->env, YiiTranslate("base", (isset($context["key"]) ? $context["key"] : null)), "html", null, true);
            echo "</h3>
  </div>
  <div class=\"panel-body\">
    ";
            // line 14
            echo (isset($context["message"]) ? $context["message"] : null);
            echo "
  </div>
</div>

";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
    }

    public function getTemplateName()
    {
        return "vendors/toxus/views/layouts/flash.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 14,  21 => 6,  33 => 12,  23 => 8,  131 => 36,  125 => 35,  72 => 11,  61 => 9,  58 => 8,  49 => 6,  36 => 5,  29 => 9,  25 => 7,  133 => 29,  128 => 27,  122 => 26,  106 => 21,  100 => 28,  97 => 19,  90 => 16,  79 => 13,  76 => 12,  70 => 10,  59 => 8,  34 => 11,  27 => 36,  22 => 41,  19 => 4,  773 => 263,  769 => 260,  766 => 259,  750 => 220,  740 => 219,  730 => 218,  722 => 217,  716 => 221,  713 => 220,  710 => 219,  707 => 218,  705 => 217,  701 => 215,  698 => 214,  693 => 208,  679 => 207,  672 => 203,  666 => 202,  663 => 201,  657 => 198,  654 => 197,  636 => 196,  633 => 195,  626 => 189,  623 => 188,  619 => 187,  615 => 186,  612 => 185,  609 => 184,  598 => 179,  589 => 177,  583 => 174,  579 => 173,  575 => 172,  572 => 171,  569 => 170,  563 => 223,  561 => 214,  554 => 209,  552 => 195,  547 => 192,  545 => 184,  540 => 181,  538 => 170,  533 => 167,  530 => 166,  525 => 142,  520 => 138,  514 => 129,  509 => 115,  502 => 98,  499 => 97,  493 => 91,  487 => 90,  484 => 89,  478 => 100,  476 => 97,  472 => 95,  469 => 93,  467 => 89,  462 => 87,  459 => 86,  454 => 84,  446 => 77,  442 => 75,  439 => 74,  433 => 68,  424 => 61,  421 => 60,  416 => 81,  414 => 74,  406 => 69,  402 => 68,  397 => 66,  392 => 63,  389 => 60,  383 => 56,  381 => 55,  372 => 48,  369 => 47,  364 => 43,  357 => 41,  354 => 40,  349 => 38,  346 => 37,  343 => 36,  340 => 35,  333 => 43,  330 => 40,  327 => 35,  324 => 34,  319 => 28,  314 => 19,  308 => 9,  299 => 267,  294 => 264,  292 => 263,  288 => 261,  286 => 259,  278 => 254,  274 => 253,  262 => 244,  255 => 239,  247 => 231,  239 => 225,  237 => 166,  232 => 163,  226 => 144,  220 => 142,  212 => 140,  207 => 138,  204 => 137,  200 => 136,  195 => 135,  182 => 130,  180 => 129,  177 => 128,  175 => 127,  165 => 123,  158 => 120,  154 => 118,  152 => 117,  146 => 115,  139 => 103,  137 => 30,  132 => 84,  129 => 83,  127 => 47,  121 => 45,  118 => 34,  116 => 33,  113 => 32,  99 => 24,  95 => 23,  91 => 22,  88 => 23,  85 => 14,  81 => 22,  73 => 17,  69 => 16,  65 => 15,  56 => 7,  273 => 128,  245 => 103,  230 => 91,  222 => 143,  216 => 141,  213 => 83,  210 => 82,  201 => 79,  198 => 78,  192 => 134,  187 => 132,  178 => 72,  172 => 126,  163 => 65,  159 => 64,  155 => 63,  147 => 61,  143 => 105,  138 => 57,  135 => 38,  120 => 33,  117 => 24,  110 => 23,  107 => 37,  104 => 36,  93 => 25,  89 => 26,  86 => 25,  78 => 13,  75 => 21,  67 => 17,  64 => 16,  48 => 11,  109 => 30,  103 => 29,  94 => 12,  83 => 23,  80 => 22,  77 => 18,  74 => 20,  71 => 19,  68 => 10,  66 => 9,  60 => 15,  57 => 14,  54 => 6,  51 => 6,  47 => 5,  41 => 8,  38 => 7,  35 => 7,  30 => 4,);
    }
}
