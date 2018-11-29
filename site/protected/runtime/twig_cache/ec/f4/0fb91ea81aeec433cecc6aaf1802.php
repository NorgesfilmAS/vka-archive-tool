<?php

/* /vendors/toxus/views/layouts/_systemMenu.twig */
class __TwigTemplate_ecf40fb91ea81aeec433cecc6aaf1802 extends Twig_Template
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
        return array (  133 => 29,  128 => 27,  122 => 26,  117 => 24,  110 => 23,  106 => 21,  100 => 20,  97 => 19,  90 => 16,  79 => 13,  76 => 12,  70 => 10,  59 => 8,  34 => 4,  27 => 36,  22 => 34,  19 => 33,  775 => 264,  771 => 261,  768 => 260,  752 => 221,  742 => 220,  732 => 219,  724 => 218,  718 => 222,  715 => 221,  712 => 220,  709 => 219,  707 => 218,  703 => 216,  700 => 215,  695 => 209,  681 => 208,  674 => 204,  668 => 203,  665 => 202,  659 => 199,  656 => 198,  638 => 197,  635 => 196,  628 => 190,  625 => 189,  621 => 188,  617 => 187,  614 => 186,  611 => 185,  600 => 180,  591 => 178,  585 => 175,  581 => 174,  577 => 173,  574 => 172,  571 => 171,  565 => 224,  563 => 215,  556 => 210,  554 => 196,  549 => 193,  547 => 185,  542 => 182,  540 => 171,  535 => 168,  532 => 167,  527 => 143,  522 => 139,  516 => 130,  511 => 116,  504 => 98,  501 => 97,  495 => 91,  489 => 90,  486 => 89,  480 => 100,  478 => 97,  474 => 95,  471 => 93,  469 => 89,  464 => 87,  461 => 86,  456 => 84,  448 => 77,  444 => 75,  441 => 74,  435 => 68,  426 => 61,  423 => 60,  418 => 81,  416 => 74,  408 => 69,  404 => 68,  399 => 66,  394 => 63,  391 => 60,  385 => 56,  383 => 55,  374 => 48,  371 => 47,  366 => 43,  359 => 41,  356 => 40,  351 => 38,  348 => 37,  345 => 36,  342 => 35,  335 => 43,  332 => 40,  329 => 35,  326 => 34,  321 => 28,  316 => 19,  310 => 9,  301 => 268,  296 => 265,  294 => 264,  290 => 262,  288 => 260,  276 => 254,  264 => 245,  257 => 240,  249 => 232,  241 => 226,  239 => 167,  234 => 164,  224 => 144,  218 => 142,  214 => 141,  209 => 139,  206 => 138,  197 => 136,  194 => 135,  189 => 133,  184 => 131,  179 => 129,  177 => 128,  174 => 127,  160 => 121,  156 => 119,  154 => 118,  149 => 116,  146 => 115,  143 => 105,  137 => 30,  132 => 84,  129 => 83,  127 => 47,  118 => 34,  116 => 33,  113 => 32,  99 => 24,  95 => 23,  91 => 22,  88 => 21,  85 => 14,  81 => 19,  73 => 17,  69 => 16,  65 => 15,  56 => 7,  280 => 255,  252 => 106,  236 => 93,  228 => 145,  222 => 143,  219 => 85,  216 => 84,  205 => 81,  202 => 137,  196 => 78,  191 => 77,  182 => 130,  176 => 70,  167 => 124,  163 => 66,  159 => 65,  151 => 63,  147 => 62,  142 => 59,  139 => 103,  124 => 45,  121 => 45,  114 => 40,  111 => 39,  108 => 38,  96 => 29,  92 => 27,  89 => 26,  86 => 25,  78 => 22,  75 => 21,  67 => 17,  64 => 16,  48 => 11,  109 => 28,  103 => 25,  94 => 12,  83 => 23,  80 => 22,  77 => 18,  74 => 20,  71 => 19,  68 => 18,  66 => 9,  60 => 15,  57 => 14,  54 => 6,  51 => 6,  47 => 5,  41 => 8,  38 => 7,  35 => 7,  30 => 4,);
    }
}
