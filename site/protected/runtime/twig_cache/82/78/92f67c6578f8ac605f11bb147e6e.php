<?php

/* /vendors/toxus/views/layouts/_systemMenu.twig */
class __TwigTemplate_827892f67c6578f8ac605f11bb147e6e extends Twig_Template
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
        // line 33
        echo "
<ul class=\"";
        // line 34
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["layout"]) ? $context["layout"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["layout"]) ? $context["layout"] : null), "class"), "accordmobile")) : ("accordmobile")), "html", null, true);
        echo "\">
\t
\t";
        // line 36
        echo $this->getAttribute($this, "menuSystemBuilder", array(0 => (isset($context["menu"]) ? $context["menu"] : null), 1 => (isset($context["name"]) ? $context["name"] : null), 2 => (isset($context["this"]) ? $context["this"] : null)), "method");
        echo "
</ul>
";
    }

    // line 4
    public function getmenuSystemBuilder($_menu = null, $_name = null, $_t = null)
    {
        $context = $this->env->mergeGlobals(array(
            "menu" => $_menu,
            "name" => $_name,
            "t" => $_t,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 5
            echo "\t";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["menu"]) ? $context["menu"] : null));
            foreach ($context['_seq'] as $context["key"] => $context["menuItem"]) {
                echo "\t
\t\t";
                // line 6
                if (((($this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "isVisible", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "isVisible"), 1)) : (1)) == 1)) {
                    // line 7
                    echo "\t\t";
                    if (twig_in_filter("page", twig_get_array_keys_filter((isset($context["menuItem"]) ? $context["menuItem"] : null)))) {
                        // line 8
                        echo "\t<li class=\"parent";
                        if ($this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "isActive")) {
                            echo " active";
                        }
                        echo "\">
\t\t<a href=\"javascript:void()\" >";
                        // line 9
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "label"), "html", null, true);
                        echo "<i></i></a>
\t\t";
                        // line 10
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "form"), "page", array(0 => $this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "page")), "method"), "html", null, true);
                        echo "
\t</li>\t\t
\t\t";
                    } elseif (twig_in_filter("items", twig_get_array_keys_filter((isset($context["menuItem"]) ? $context["menuItem"] : null)))) {
                        // line 12
                        echo "\t
\t<li class=\"parent";
                        // line 13
                        if ($this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "isActive")) {
                            echo " active";
                        }
                        echo "\">
\t\t<a href=\"javascript:void()\" >";
                        // line 14
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "label"), "html", null, true);
                        echo "<i></i></a>
\t\t<ul>
\t\t";
                        // line 16
                        echo $this->getAttribute($this, "menuSystemBuilder", array(0 => $this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "items")), "method");
                        echo "
\t\t</ul>
\t</li>\t\t
\t\t";
                    } else {
                        // line 19
                        echo "\t\t\t
\t\t\t<li";
                        // line 20
                        if ($this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "isActive")) {
                            echo " class=\"active\"";
                        }
                        echo ">
\t\t\t";
                        // line 21
                        if ($this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "dialog")) {
                            echo "\t\t\t\t\t
\t\t\t\t";
                            // line 23
                            echo "\t\t\t\t<a href=\"#\" class=\"menu-modal\" data-url=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "url"), "html", null, true);
                            echo "\">";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "label"), "html", null, true);
                            echo "</a>
\t\t\t\t";
                            // line 24
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "registerPackage", array(0 => "modal-dialog"), "method"), "html", null, true);
                            echo "
\t\t\t";
                        } else {
                            // line 26
                            echo "\t\t\t\t";
                            echo $this->getAttribute((isset($context["html"]) ? $context["html"] : null), "link", array(0 => $this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "label"), 1 => $this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "url"), 2 => $this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "linkOptions")), "method");
                            echo "
\t\t\t";
                        }
                        // line 27
                        echo "\t
\t\t\t </li>\t
\t\t";
                    }
                    // line 29
                    echo "\t\t
\t";
                }
                // line 30
                echo "\t\t
\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['menuItem'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "/vendors/toxus/views/layouts/_systemMenu.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  133 => 29,  128 => 27,  122 => 26,  106 => 21,  100 => 20,  97 => 19,  90 => 16,  79 => 13,  76 => 12,  70 => 10,  59 => 8,  34 => 4,  27 => 36,  22 => 34,  19 => 33,  773 => 263,  769 => 260,  766 => 259,  750 => 220,  740 => 219,  730 => 218,  722 => 217,  716 => 221,  713 => 220,  710 => 219,  707 => 218,  705 => 217,  701 => 215,  698 => 214,  693 => 208,  679 => 207,  672 => 203,  666 => 202,  663 => 201,  657 => 198,  654 => 197,  636 => 196,  633 => 195,  626 => 189,  623 => 188,  619 => 187,  615 => 186,  612 => 185,  609 => 184,  598 => 179,  589 => 177,  583 => 174,  579 => 173,  575 => 172,  572 => 171,  569 => 170,  563 => 223,  561 => 214,  554 => 209,  552 => 195,  547 => 192,  545 => 184,  540 => 181,  538 => 170,  533 => 167,  530 => 166,  525 => 142,  520 => 138,  514 => 129,  509 => 115,  502 => 98,  499 => 97,  493 => 91,  487 => 90,  484 => 89,  478 => 100,  476 => 97,  472 => 95,  469 => 93,  467 => 89,  462 => 87,  459 => 86,  454 => 84,  446 => 77,  442 => 75,  439 => 74,  433 => 68,  424 => 61,  421 => 60,  416 => 81,  414 => 74,  406 => 69,  402 => 68,  397 => 66,  392 => 63,  389 => 60,  383 => 56,  381 => 55,  372 => 48,  369 => 47,  364 => 43,  357 => 41,  354 => 40,  349 => 38,  346 => 37,  343 => 36,  340 => 35,  333 => 43,  330 => 40,  327 => 35,  324 => 34,  319 => 28,  314 => 19,  308 => 9,  299 => 267,  294 => 264,  292 => 263,  288 => 261,  286 => 259,  278 => 254,  274 => 253,  262 => 244,  255 => 239,  247 => 231,  239 => 225,  237 => 166,  232 => 163,  226 => 144,  220 => 142,  212 => 140,  207 => 138,  204 => 137,  200 => 136,  195 => 135,  182 => 130,  180 => 129,  177 => 128,  175 => 127,  165 => 123,  158 => 120,  154 => 118,  152 => 117,  146 => 115,  139 => 103,  137 => 30,  132 => 84,  129 => 83,  127 => 47,  121 => 45,  118 => 34,  116 => 33,  113 => 32,  99 => 24,  95 => 23,  91 => 22,  88 => 21,  85 => 14,  81 => 19,  73 => 17,  69 => 16,  65 => 15,  56 => 7,  273 => 128,  245 => 103,  230 => 91,  222 => 143,  216 => 141,  213 => 83,  210 => 82,  201 => 79,  198 => 78,  192 => 134,  187 => 132,  178 => 72,  172 => 126,  163 => 65,  159 => 64,  155 => 63,  147 => 61,  143 => 105,  138 => 57,  135 => 56,  120 => 43,  117 => 24,  110 => 23,  107 => 37,  104 => 36,  93 => 28,  89 => 26,  86 => 25,  78 => 22,  75 => 21,  67 => 17,  64 => 16,  48 => 11,  109 => 28,  103 => 25,  94 => 12,  83 => 23,  80 => 22,  77 => 18,  74 => 20,  71 => 19,  68 => 18,  66 => 9,  60 => 15,  57 => 14,  54 => 6,  51 => 6,  47 => 5,  41 => 8,  38 => 7,  35 => 7,  30 => 4,);
    }
}
