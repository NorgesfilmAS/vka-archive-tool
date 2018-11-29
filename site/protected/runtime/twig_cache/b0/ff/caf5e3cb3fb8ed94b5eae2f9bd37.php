<?php

/* /vendors/toxus/views/layouts/_menu.twig */
class __TwigTemplate_b0ffcaf5e3cb3fb8ed94b5eae2f9bd37 extends Twig_Template
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
        // line 20
        echo "
";
        // line 77
        echo "
";
        // line 78
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["menu"]) ? $context["menu"] : null));
        foreach ($context['_seq'] as $context["key"] => $context["item"]) {
            // line 79
            echo "\t";
            if (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "type") == "caption-right")) {
                // line 80
                echo "\t<h5 class=\"short_headline right\"><span>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "caption"), "html", null, true);
                echo "</span></h5>
\t";
            } elseif (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "type") == "caption")) {
                // line 82
                echo "\t<h5 class=\"short_headline\"><span>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "caption"), "html", null, true);
                echo "</span></h5>
\t";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 85
        echo "
";
        // line 86
        if ((twig_length_filter($this->env, (isset($context["menu"]) ? $context["menu"] : null)) > 0)) {
            // line 87
            echo "<ul class=\"";
            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["menu"]) ? $context["menu"] : null), "style", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["menu"]) ? $context["menu"] : null), "style"), $this->getAttribute((isset($context["layout"]) ? $context["layout"] : null), "class"))) : ($this->getAttribute((isset($context["layout"]) ? $context["layout"] : null), "class"))), "html", null, true);
            echo "\">\t
\t";
            // line 88
            echo $this->getAttribute($this, "menuItemBuilder", array(0 => (isset($context["menu"]) ? $context["menu"] : null), 1 => (isset($context["this"]) ? $context["this"] : null), 2 => 0), "method");
            echo "
</ul>
";
        }
        // line 91
        echo "\t
";
    }

    // line 21
    public function getmenuItemBuilder($_menu = null, $_t = null, $_level = null)
    {
        $context = $this->env->mergeGlobals(array(
            "menu" => $_menu,
            "t" => $_t,
            "level" => $_level,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 22
            echo " \t";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["menu"]) ? $context["menu"] : null));
            foreach ($context['_seq'] as $context["key"] => $context["menuItem"]) {
                echo "\t
\t\t";
                // line 23
                if (twig_test_iterable((isset($context["menuItem"]) ? $context["menuItem"] : null))) {
                    // line 24
                    echo "\t\t\t";
                    if (($this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "hidden") != true)) {
                        // line 25
                        echo "\t\t\t\t";
                        if ($this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "type")) {
                            // line 26
                            echo "\t\t\t\t";
                        } else {
                            // line 27
                            echo "\t\t\t\t\t<li class=\"menu-";
                            echo twig_escape_filter($this->env, strtolower(strtr((isset($context["key"]) ? $context["key"] : null), array(" " => "-"))), "html", null, true);
                            echo " menu-item";
                            if ($this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "items")) {
                                echo " menu-submenu ";
                            }
                            if ($this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "isActive")) {
                                echo " active";
                            }
                            echo "\">\t
\t\t\t\t\t";
                            // line 28
                            if (($this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "url") != "xxxx")) {
                                echo "\t
\t\t\t\t\t<a href=\"";
                                // line 29
                                echo (($this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "url", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "url"), "#")) : ("#"));
                                echo "\" data-placement=\"bottom\" ";
                                if ($this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "tooltip")) {
                                    echo "title=\"";
                                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "tooltip"), "html", null, true);
                                    echo "\"";
                                }
                                // line 30
                                echo "\t\t\t\t\t\t ";
                                if ($this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "style")) {
                                    echo " class=\"";
                                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "style"), "html", null, true);
                                    echo "\" ";
                                }
                                // line 31
                                echo "\t";
                                // line 41
                                echo "\t\t\t\t\t>
\t\t\t\t\t";
                                // line 42
                                if ($this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "level")) {
                                    // line 43
                                    echo "\t\t\t\t\t\t<span class=\"menu-item-level-";
                                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "level"), "html", null, true);
                                    echo "\">
\t\t\t\t\t";
                                }
                                // line 44
                                echo "\t\t
\t\t\t\t\t";
                                // line 45
                                if ($this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "icon", array(), "any", true, true)) {
                                    echo "<span class=\"";
                                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "icon"), "html", null, true);
                                    echo "\"></span>";
                                }
                                // line 46
                                echo "\t\t\t\t\t";
                                if ($this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "label")) {
                                    echo $this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "label");
                                }
                                // line 47
                                echo "\t\t\t\t\t";
                                if ($this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "level")) {
                                    // line 48
                                    echo "\t\t\t\t\t\t</span>
\t\t\t\t\t";
                                }
                                // line 50
                                echo "\t\t\t\t\t";
                                if ($this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "badge")) {
                                    echo "\t
\t\t\t\t\t\t<span class=\"pull-right badge-menu badge ";
                                    // line 51
                                    echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "badgeStyle", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "badgeStyle"), "badge-info")) : ("badge-info")), "html", null, true);
                                    echo "\" >";
                                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "badge"), "html", null, true);
                                    echo "</span>\t
\t\t\t\t\t";
                                }
                                // line 52
                                echo "\t
\t\t\t\t\t</a>
\t\t\t\t\t\t
\t\t\t\t\t";
                            } else {
                                // line 56
                                echo "\t\t\t\t\t\tYYY
\t\t\t\t\t\t";
                                // line 57
                                if ($this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "level")) {
                                    // line 58
                                    echo "\t\t\t\t\t\t\t<span class=\"menu-item-level-";
                                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "level"), "html", null, true);
                                    echo "\">
\t\t\t\t\t\t";
                                }
                                // line 59
                                echo "\t\t
\t\t\t\t\t\t";
                                // line 60
                                if ($this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "icon", array(), "any", true, true)) {
                                    echo "<span class=\"";
                                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "icon"), "html", null, true);
                                    echo "\"></span>";
                                }
                                // line 61
                                echo "\t\t\t\t\t\t";
                                if ($this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "label")) {
                                    echo $this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "label");
                                }
                                echo "\t\t\t\t\t
\t\t\t\t\t\t";
                                // line 62
                                if ($this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "level")) {
                                    // line 63
                                    echo "\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t";
                                }
                                // line 64
                                echo "\t
\t\t\t\t\t";
                            }
                            // line 66
                            echo "\t\t\t\t\t";
                            if ((twig_length_filter($this->env, $this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "items")) > 0)) {
                                echo "\t
\t\t\t\t\t<ul class=\"nav menu-level-";
                                // line 67
                                echo twig_escape_filter($this->env, (isset($context["level"]) ? $context["level"] : null), "html", null, true);
                                echo " menu-submenu menu-level\">
\t\t\t\t\t\t";
                                // line 68
                                echo $this->getAttribute($this, "menuItemBuilder", array(0 => $this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "items"), 1 => (isset($context["t"]) ? $context["t"] : null), 2 => ((isset($context["level"]) ? $context["level"] : null) + 1)), "method");
                                echo "
\t\t\t\t\t</ul>
\t\t\t\t\t";
                            }
                            // line 71
                            echo "\t\t\t\t\t</li>\t\t
\t\t\t\t";
                        }
                        // line 73
                        echo "\t\t\t";
                    }
                    // line 74
                    echo "\t\t";
                }
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
        return "/vendors/toxus/views/layouts/_menu.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  242 => 74,  235 => 71,  229 => 68,  225 => 67,  220 => 66,  212 => 63,  210 => 62,  203 => 61,  186 => 57,  183 => 56,  158 => 47,  32 => 80,  198 => 49,  181 => 47,  165 => 50,  145 => 40,  107 => 30,  50 => 23,  45 => 22,  42 => 21,  123 => 49,  112 => 28,  104 => 48,  101 => 47,  98 => 46,  53 => 87,  31 => 17,  28 => 10,  1124 => 294,  1122 => 293,  1117 => 291,  1113 => 289,  1108 => 286,  1102 => 282,  1086 => 267,  1081 => 265,  1078 => 264,  1076 => 263,  1071 => 261,  1060 => 257,  1053 => 252,  1049 => 251,  1035 => 250,  1028 => 249,  1011 => 248,  1008 => 247,  1006 => 246,  997 => 244,  993 => 242,  991 => 241,  988 => 240,  959 => 238,  953 => 236,  924 => 234,  915 => 232,  905 => 230,  902 => 229,  896 => 227,  894 => 226,  891 => 225,  887 => 224,  883 => 221,  881 => 220,  877 => 218,  873 => 215,  869 => 214,  856 => 213,  829 => 210,  825 => 209,  819 => 207,  814 => 204,  781 => 174,  763 => 172,  751 => 170,  739 => 169,  734 => 168,  730 => 166,  727 => 152,  722 => 149,  714 => 143,  698 => 142,  694 => 140,  682 => 130,  671 => 129,  653 => 126,  636 => 124,  630 => 122,  613 => 118,  606 => 111,  587 => 109,  583 => 107,  579 => 106,  520 => 102,  517 => 101,  509 => 99,  477 => 96,  472 => 95,  467 => 93,  462 => 92,  459 => 90,  450 => 79,  419 => 77,  411 => 74,  384 => 73,  380 => 71,  377 => 70,  333 => 67,  292 => 61,  287 => 59,  262 => 57,  256 => 56,  221 => 54,  207 => 53,  195 => 47,  188 => 58,  185 => 44,  170 => 51,  164 => 37,  161 => 48,  153 => 46,  148 => 28,  144 => 44,  141 => 26,  138 => 43,  136 => 42,  119 => 23,  105 => 18,  84 => 16,  82 => 22,  62 => 12,  55 => 11,  40 => 14,  21 => 2,  23 => 3,  135 => 38,  131 => 31,  125 => 35,  120 => 48,  93 => 25,  72 => 24,  61 => 9,  58 => 88,  49 => 6,  36 => 13,  29 => 79,  25 => 78,  133 => 41,  128 => 37,  122 => 26,  117 => 22,  110 => 23,  106 => 51,  100 => 27,  97 => 26,  90 => 41,  79 => 13,  76 => 12,  70 => 10,  59 => 8,  34 => 12,  27 => 15,  22 => 77,  19 => 20,  775 => 264,  771 => 261,  768 => 260,  752 => 221,  742 => 220,  732 => 219,  724 => 218,  718 => 222,  715 => 221,  712 => 220,  709 => 219,  707 => 218,  703 => 216,  700 => 215,  695 => 209,  681 => 208,  674 => 204,  668 => 203,  665 => 202,  659 => 128,  656 => 127,  638 => 197,  635 => 196,  628 => 190,  625 => 189,  621 => 188,  617 => 120,  614 => 186,  611 => 185,  600 => 180,  591 => 178,  585 => 175,  581 => 174,  577 => 105,  574 => 172,  571 => 171,  565 => 224,  563 => 215,  556 => 210,  554 => 196,  549 => 104,  547 => 185,  542 => 182,  540 => 171,  535 => 168,  532 => 167,  527 => 143,  522 => 139,  516 => 130,  511 => 100,  504 => 98,  501 => 97,  495 => 91,  489 => 90,  486 => 89,  480 => 100,  478 => 97,  474 => 95,  471 => 93,  469 => 89,  464 => 87,  461 => 86,  456 => 81,  448 => 77,  444 => 75,  441 => 74,  435 => 68,  426 => 61,  423 => 60,  418 => 81,  416 => 75,  408 => 69,  404 => 68,  399 => 66,  394 => 63,  391 => 60,  385 => 56,  383 => 55,  374 => 48,  371 => 47,  366 => 43,  359 => 41,  356 => 68,  351 => 38,  348 => 37,  345 => 36,  342 => 35,  335 => 43,  332 => 40,  329 => 35,  326 => 34,  321 => 28,  316 => 66,  310 => 65,  301 => 64,  296 => 63,  294 => 264,  290 => 60,  288 => 260,  276 => 254,  264 => 245,  257 => 240,  249 => 232,  241 => 226,  239 => 73,  234 => 164,  224 => 55,  218 => 142,  214 => 141,  209 => 139,  206 => 138,  197 => 60,  194 => 59,  189 => 133,  184 => 131,  179 => 42,  177 => 52,  174 => 44,  160 => 121,  156 => 119,  154 => 118,  149 => 116,  146 => 115,  143 => 105,  137 => 30,  132 => 84,  129 => 83,  127 => 47,  118 => 34,  116 => 29,  113 => 20,  99 => 24,  95 => 29,  91 => 24,  88 => 23,  85 => 14,  81 => 26,  73 => 17,  69 => 21,  65 => 15,  56 => 7,  280 => 255,  252 => 106,  236 => 93,  228 => 145,  222 => 143,  219 => 85,  216 => 64,  205 => 81,  202 => 51,  196 => 78,  191 => 46,  182 => 43,  176 => 41,  167 => 124,  163 => 66,  159 => 65,  151 => 63,  147 => 45,  142 => 59,  139 => 103,  124 => 30,  121 => 45,  114 => 32,  111 => 31,  108 => 38,  96 => 29,  92 => 27,  89 => 23,  86 => 40,  78 => 25,  75 => 21,  67 => 33,  64 => 91,  48 => 85,  109 => 30,  103 => 17,  94 => 25,  83 => 27,  80 => 22,  77 => 18,  74 => 37,  71 => 14,  68 => 10,  66 => 9,  60 => 15,  57 => 14,  54 => 6,  51 => 86,  47 => 18,  41 => 16,  38 => 82,  35 => 19,  30 => 4,);
    }
}
