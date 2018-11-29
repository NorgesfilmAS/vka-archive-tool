<?php

/* vendors/toxus/views/layouts/_buttons.twig */
class __TwigTemplate_d61dbbe79a0c24d635148d13b9385ce4 extends Twig_Template
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
        // line 12
        echo "
";
        // line 13
        $context["state"] = ((array_key_exists("mode", $context)) ? (_twig_default_filter((isset($context["mode"]) ? $context["mode"] : null), "edit")) : ("edit"));
        echo " ";
        // line 14
        if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "buttons"), (isset($context["state"]) ? $context["state"] : null), array(), "array")) > 0)) {
            // line 15
            echo "\t";
            $context["buttons"] = $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "buttons"), (isset($context["state"]) ? $context["state"] : null), array(), "array");
        } else {
            // line 17
            echo "\t";
            $context["buttons"] = $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "buttons");
        }
        // line 19
        echo "
";
        // line 20
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["buttons"]) ? $context["buttons"] : null));
        foreach ($context['_seq'] as $context["key"] => $context["button"]) {
            // line 21
            echo "\t";
            if (((($this->getAttribute((isset($context["button"]) ? $context["button"] : null), "visible", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["button"]) ? $context["button"] : null), "visible"), true)) : (true)) != 0)) {
                // line 22
                echo "\t\t";
                if (($this->getAttribute((isset($context["button"]) ? $context["button"] : null), "type") == "submit")) {
                    echo "\t
\t\t\t<button class=\"";
                    // line 23
                    echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["button"]) ? $context["button"] : null), "style", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["button"]) ? $context["button"] : null), "style"), "btn")) : ("btn")), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "position"), "html", null, true);
                    echo " id-";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["util"]) ? $context["util"] : null), "formId", array(0 => (isset($context["form"]) ? $context["form"] : null)), "method"), "html", null, true);
                    echo "\" ";
                    echo $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "options");
                    echo " type=\"submit\">";
                    if ($this->getAttribute((isset($context["button"]) ? $context["button"] : null), "label")) {
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "label"), "html", null, true);
                    } else {
                        if ($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "isNewRecord")) {
                            echo twig_escape_filter($this->env, YiiTranslate("button", "btn-create"), "html", null, true);
                            echo " ";
                        } else {
                            echo twig_escape_filter($this->env, YiiTranslate("button", "btn-save"), "html", null, true);
                            echo " ";
                        }
                    }
                    echo "</button>
\t\t\t";
                    // line 24
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "onReady", array(0 => ((((("
\t" . "\$(\".id-") . $this->getAttribute((isset($context["util"]) ? $context["util"] : null), "formId", array(0 => (isset($context["form"]) ? $context["form"] : null)), "method")) . "\").on(\"click\", function() { \$(\".cls-") . $this->getAttribute((isset($context["util"]) ? $context["util"] : null), "formId", array(0 => (isset($context["form"]) ? $context["form"] : null)), "method")) . "\").submit(); }); ")), "method"), "html", null, true);
                    echo "
\t\t";
                } elseif (($this->getAttribute((isset($context["button"]) ? $context["button"] : null), "type") == "cancel")) {
                    // line 25
                    echo "\t
\t\t\t";
                    // line 26
                    if ((isset($context["isAjax"]) ? $context["isAjax"] : null)) {
                        // line 27
                        echo "\t\t\t<button  href=\"#\" id=\"btn-cancel\" class=\"";
                        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["button"]) ? $context["button"] : null), "style", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["button"]) ? $context["button"] : null), "style"), "btn")) : ("btn")), "html", null, true);
                        echo " ";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "position"), "html", null, true);
                        echo " action-close\" data-dismiss=\"modal\" ";
                        echo $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "options");
                        echo " type=\"button\">";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "label"), "html", null, true);
                        echo "</button>\t\t\t\t\t\t\t\t\t\t\t
\t\t\t";
                    } else {
                        // line 29
                        echo "\t\t\t<button class=\"";
                        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["button"]) ? $context["button"] : null), "style", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["button"]) ? $context["button"] : null), "style"), "btn")) : ("btn")), "html", null, true);
                        echo " ";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "position"), "html", null, true);
                        echo "\" ";
                        echo $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "options");
                        echo " onClick=\"history.go(-1);return true;\">";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "label"), "html", null, true);
                        echo "</button>\t\t\t\t\t\t\t
\t\t\t";
                    }
                    // line 30
                    echo "\t\t
\t\t";
                } elseif (($this->getAttribute((isset($context["button"]) ? $context["button"] : null), "type") == "delete")) {
                    // line 31
                    echo "\t
\t\t\t<button class=\"";
                    // line 32
                    echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["button"]) ? $context["button"] : null), "style", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["button"]) ? $context["button"] : null), "style"), "btn")) : ("btn")), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "position"), "html", null, true);
                    echo "\" ";
                    echo $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "options");
                    echo " onClick=\"if (confirm('";
                    echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["button"]) ? $context["button"] : null), "ask", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["button"]) ? $context["button"] : null), "ask"), YiiTranslate("base", "Delete this information?"))) : (YiiTranslate("base", "Delete this information?"))), "html", null, true);
                    echo "')) { window.location='";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "url"), "html", null, true);
                    echo "'; }\">";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "label"), "html", null, true);
                    echo "</button>\t\t\t\t\t\t\t
\t";
                    // line 37
                    echo "\t\t";
                } elseif (($this->getAttribute((isset($context["button"]) ? $context["button"] : null), "type") == "dialog")) {
                    // line 38
                    echo "\t\t\t<button type=\"button\" class=\"";
                    echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["button"]) ? $context["button"] : null), "style", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["button"]) ? $context["button"] : null), "style"), "btn")) : ("btn")), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "position"), "html", null, true);
                    echo " btn-action menu-modal\" data-url=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "url"), "html", null, true);
                    echo "\" ";
                    echo $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "options");
                    echo ">";
                    echo $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "label");
                    echo "</button>\t\t
\t\t";
                } else {
                    // line 40
                    echo "\t\t\t<a ";
                    if ($this->getAttribute((isset($context["button"]) ? $context["button"] : null), "id")) {
                        echo "id=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "id"), "html", null, true);
                        echo "\"";
                    }
                    echo " href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "url"), "html", null, true);
                    echo "\" class=\"";
                    echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["button"]) ? $context["button"] : null), "style", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["button"]) ? $context["button"] : null), "style"), "btn")) : ("btn")), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "position"), "html", null, true);
                    echo " menu-button\" ";
                    echo $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "options");
                    echo ">";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "label"), "html", null, true);
                    echo "</a>\t
\t\t";
                }
                // line 42
                echo "\t";
            }
            echo "\t\t
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['button'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 44
        echo "\t\t
";
        // line 46
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "extraButtons"));
        foreach ($context['_seq'] as $context["key"] => $context["button"]) {
            // line 47
            echo "\t<a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "url"), "html", null, true);
            echo "\" class=\"";
            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["button"]) ? $context["button"] : null), "style", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["button"]) ? $context["button"] : null), "style"), "btn")) : ("btn")), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "position"), "html", null, true);
            echo " menu-button\" ";
            echo $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "options");
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "label"), "html", null, true);
            echo "</a>\t
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['button'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 49
        echo "\t\t
\t";
    }

    public function getTemplateName()
    {
        return "vendors/toxus/views/layouts/_buttons.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  198 => 49,  181 => 47,  165 => 42,  145 => 40,  107 => 30,  50 => 23,  45 => 22,  42 => 21,  123 => 49,  112 => 16,  104 => 48,  101 => 47,  98 => 46,  53 => 22,  31 => 17,  28 => 10,  1124 => 294,  1122 => 293,  1117 => 291,  1113 => 289,  1108 => 286,  1102 => 282,  1086 => 267,  1081 => 265,  1078 => 264,  1076 => 263,  1071 => 261,  1060 => 257,  1053 => 252,  1049 => 251,  1035 => 250,  1028 => 249,  1011 => 248,  1008 => 247,  1006 => 246,  997 => 244,  993 => 242,  991 => 241,  988 => 240,  959 => 238,  953 => 236,  924 => 234,  915 => 232,  905 => 230,  902 => 229,  896 => 227,  894 => 226,  891 => 225,  887 => 224,  883 => 221,  881 => 220,  877 => 218,  873 => 215,  869 => 214,  856 => 213,  829 => 210,  825 => 209,  819 => 207,  814 => 204,  781 => 174,  763 => 172,  751 => 170,  739 => 169,  734 => 168,  730 => 166,  727 => 152,  722 => 149,  714 => 143,  698 => 142,  694 => 140,  682 => 130,  671 => 129,  653 => 126,  636 => 124,  630 => 122,  613 => 118,  606 => 111,  587 => 109,  583 => 107,  579 => 106,  520 => 102,  517 => 101,  509 => 99,  477 => 96,  472 => 95,  467 => 93,  462 => 92,  459 => 90,  450 => 79,  419 => 77,  411 => 74,  384 => 73,  380 => 71,  377 => 70,  333 => 67,  292 => 61,  287 => 59,  262 => 57,  256 => 56,  221 => 54,  207 => 53,  195 => 47,  188 => 45,  185 => 44,  170 => 38,  164 => 37,  161 => 36,  153 => 33,  148 => 28,  144 => 27,  141 => 26,  138 => 25,  136 => 24,  119 => 23,  105 => 18,  84 => 16,  82 => 39,  62 => 12,  55 => 11,  40 => 14,  21 => 2,  23 => 3,  135 => 38,  131 => 38,  125 => 35,  120 => 48,  93 => 25,  72 => 24,  61 => 9,  58 => 8,  49 => 6,  36 => 13,  29 => 9,  25 => 14,  133 => 29,  128 => 37,  122 => 26,  117 => 22,  110 => 23,  106 => 51,  100 => 28,  97 => 19,  90 => 41,  79 => 13,  76 => 12,  70 => 10,  59 => 8,  34 => 12,  27 => 15,  22 => 13,  19 => 12,  775 => 264,  771 => 261,  768 => 260,  752 => 221,  742 => 220,  732 => 219,  724 => 218,  718 => 222,  715 => 221,  712 => 220,  709 => 219,  707 => 218,  703 => 216,  700 => 215,  695 => 209,  681 => 208,  674 => 204,  668 => 203,  665 => 202,  659 => 128,  656 => 127,  638 => 197,  635 => 196,  628 => 190,  625 => 189,  621 => 188,  617 => 120,  614 => 186,  611 => 185,  600 => 180,  591 => 178,  585 => 175,  581 => 174,  577 => 105,  574 => 172,  571 => 171,  565 => 224,  563 => 215,  556 => 210,  554 => 196,  549 => 104,  547 => 185,  542 => 182,  540 => 171,  535 => 168,  532 => 167,  527 => 143,  522 => 139,  516 => 130,  511 => 100,  504 => 98,  501 => 97,  495 => 91,  489 => 90,  486 => 89,  480 => 100,  478 => 97,  474 => 95,  471 => 93,  469 => 89,  464 => 87,  461 => 86,  456 => 81,  448 => 77,  444 => 75,  441 => 74,  435 => 68,  426 => 61,  423 => 60,  418 => 81,  416 => 75,  408 => 69,  404 => 68,  399 => 66,  394 => 63,  391 => 60,  385 => 56,  383 => 55,  374 => 48,  371 => 47,  366 => 43,  359 => 41,  356 => 68,  351 => 38,  348 => 37,  345 => 36,  342 => 35,  335 => 43,  332 => 40,  329 => 35,  326 => 34,  321 => 28,  316 => 66,  310 => 65,  301 => 64,  296 => 63,  294 => 264,  290 => 60,  288 => 260,  276 => 254,  264 => 245,  257 => 240,  249 => 232,  241 => 226,  239 => 167,  234 => 164,  224 => 55,  218 => 142,  214 => 141,  209 => 139,  206 => 138,  197 => 48,  194 => 135,  189 => 133,  184 => 131,  179 => 42,  177 => 46,  174 => 44,  160 => 121,  156 => 119,  154 => 118,  149 => 116,  146 => 115,  143 => 105,  137 => 30,  132 => 84,  129 => 83,  127 => 47,  118 => 34,  116 => 33,  113 => 20,  99 => 24,  95 => 29,  91 => 22,  88 => 23,  85 => 14,  81 => 26,  73 => 17,  69 => 34,  65 => 15,  56 => 7,  280 => 255,  252 => 106,  236 => 93,  228 => 145,  222 => 143,  219 => 85,  216 => 84,  205 => 81,  202 => 51,  196 => 78,  191 => 46,  182 => 43,  176 => 41,  167 => 124,  163 => 66,  159 => 65,  151 => 63,  147 => 62,  142 => 59,  139 => 103,  124 => 45,  121 => 45,  114 => 32,  111 => 31,  108 => 38,  96 => 29,  92 => 27,  89 => 26,  86 => 40,  78 => 25,  75 => 21,  67 => 33,  64 => 16,  48 => 11,  109 => 30,  103 => 17,  94 => 12,  83 => 27,  80 => 22,  77 => 18,  74 => 37,  71 => 14,  68 => 10,  66 => 9,  60 => 15,  57 => 14,  54 => 6,  51 => 6,  47 => 18,  41 => 16,  38 => 20,  35 => 19,  30 => 4,);
    }
}
