<?php

/* /vendors/toxus/views/layouts/error.twig */
class __TwigTemplate_c66bafc7eecd46506b0d9775388535f3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'dialogHeader' => array($this, 'block_dialogHeader'),
            'dialogFooter' => array($this, 'block_dialogFooter'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate((((isset($context["dialog"]) ? $context["dialog"] : null)) ? ($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "ajaxDialog"), "method")) : ($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "main"), "method"))));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 10
    public function block_content($context, array $blocks = array())
    {
        // line 11
        echo "  <div class=\"row\">
  ";
        // line 12
        if (((isset($context["page"]) ? $context["page"] : null) != 1)) {
            // line 13
            echo "\t\t<div class=\"modal-header\">
\t\t\t\t<button type=\"button\" class=\"close action-close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>

\t\t\t<h4>";
            // line 16
            $this->displayBlock('dialogHeader', $context, $blocks);
            echo "</h4>
\t\t</div>
\t";
        }
        // line 18
        echo "\t
\t<div class=\"well well-lg\" style=\"margin-top: 30px;\">
\t<div class=\"row\" >
\t\t<div class=\"col-md-offset-3 col-md-6\">
\t\t\t<h4>";
        // line 22
        echo nl2br(twig_escape_filter($this->env, (isset($context["message"]) ? $context["message"] : null), "html", null, true));
        echo "</h4>
\t\t</div>\t\t
\t</div>
\t<div class=\"row\">
\t\t<div class=\"col-md-3\"> <i style=\"font-size: 50px; color:red;\" class=\"glyphicon glyphicon-wrench icon-size-large pull-right\"></i></div>
\t\t<div class=\"col-md-6\">
\t\t\t<p class=\"statement\">No biggie. Chillax. The page you are looking for is not here. Either we moved our site around, or this page never existed in the first place. Please check your url and try again or search our site with the <i class=\"icon-search\"></i> search button above.</p>
\t\t</div>
\t</div>\t
\t</div>\t
\t</div>\t
\t";
        // line 33
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "config"), "debug"), "fullError")) {
            // line 34
            echo "\t<div class=\"row\">
\t\t<div class=\"col-xs-12  well well-lg\">
\t\t\t<p>
\t\t\t\tcode: ";
            // line 37
            echo twig_escape_filter($this->env, (isset($context["code"]) ? $context["code"] : null), "html", null, true);
            echo "<br/>
\t\t\t\ttype: ";
            // line 38
            echo twig_escape_filter($this->env, (isset($context["type"]) ? $context["type"] : null), "html", null, true);
            echo "<br />
\t\t\t\tfile: ";
            // line 39
            echo twig_escape_filter($this->env, (isset($context["file"]) ? $context["file"] : null), "html", null, true);
            echo "<br />
\t\t\t\tline: ";
            // line 40
            echo twig_escape_filter($this->env, (isset($context["line"]) ? $context["line"] : null), "html", null, true);
            echo "<br /><br />
\t\t\t\ttrace: ";
            // line 41
            echo nl2br(twig_escape_filter($this->env, (isset($context["trace"]) ? $context["trace"] : null), "html", null, true));
            echo " <br />
\t\t\t</p>
\t\t</div>\t
\t</div>
\t";
        }
        // line 46
        echo "\t";
        if (((isset($context["page"]) ? $context["page"] : null) != 1)) {
            // line 47
            echo "  <div class=\"modal-footer\">
\t\t";
            // line 48
            $this->displayBlock('dialogFooter', $context, $blocks);
            // line 51
            echo "  </div>
\t";
        }
    }

    // line 16
    public function block_dialogHeader($context, array $blocks = array())
    {
        echo "<h3>";
        echo twig_escape_filter($this->env, ((array_key_exists("title", $context)) ? (_twig_default_filter((isset($context["title"]) ? $context["title"] : null), YiiTranslate("base", "error"))) : (YiiTranslate("base", "error"))), "html", null, true);
        echo "</h3>";
    }

    // line 48
    public function block_dialogFooter($context, array $blocks = array())
    {
        // line 49
        echo "    <a id=\"btn-close\" class=\"btn btn-primary action-close\" ";
        if ((isset($context["url"]) ? $context["url"] : null)) {
            echo "href=\"";
            echo twig_escape_filter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true);
            echo "\" ";
        } else {
            echo "data-dismiss=\"modal\"";
        }
        echo ">";
        echo twig_escape_filter($this->env, ((array_key_exists("closeCaption", $context)) ? (_twig_default_filter((isset($context["closeCaption"]) ? $context["closeCaption"] : null), YiiTranslate("button", "btn-close"))) : (YiiTranslate("button", "btn-close"))), "html", null, true);
        echo "</a>
\t\t";
    }

    public function getTemplateName()
    {
        return "/vendors/toxus/views/layouts/error.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 49,  112 => 16,  104 => 48,  101 => 47,  98 => 46,  53 => 22,  31 => 11,  28 => 10,  1124 => 294,  1122 => 293,  1117 => 291,  1113 => 289,  1108 => 286,  1102 => 282,  1086 => 267,  1081 => 265,  1078 => 264,  1076 => 263,  1071 => 261,  1060 => 257,  1053 => 252,  1049 => 251,  1035 => 250,  1028 => 249,  1011 => 248,  1008 => 247,  1006 => 246,  997 => 244,  993 => 242,  991 => 241,  988 => 240,  959 => 238,  953 => 236,  924 => 234,  915 => 232,  905 => 230,  902 => 229,  896 => 227,  894 => 226,  891 => 225,  887 => 224,  883 => 221,  881 => 220,  877 => 218,  873 => 215,  869 => 214,  856 => 213,  829 => 210,  825 => 209,  819 => 207,  814 => 204,  781 => 174,  763 => 172,  751 => 170,  739 => 169,  734 => 168,  730 => 166,  727 => 152,  722 => 149,  714 => 143,  698 => 142,  694 => 140,  682 => 130,  671 => 129,  653 => 126,  636 => 124,  630 => 122,  613 => 118,  606 => 111,  587 => 109,  583 => 107,  579 => 106,  520 => 102,  517 => 101,  509 => 99,  477 => 96,  472 => 95,  467 => 93,  462 => 92,  459 => 90,  450 => 79,  419 => 77,  411 => 74,  384 => 73,  380 => 71,  377 => 70,  333 => 67,  292 => 61,  287 => 59,  262 => 57,  256 => 56,  221 => 54,  207 => 53,  195 => 47,  188 => 45,  185 => 44,  170 => 38,  164 => 37,  161 => 36,  153 => 33,  148 => 28,  144 => 27,  141 => 26,  138 => 25,  136 => 24,  119 => 23,  105 => 18,  84 => 16,  82 => 39,  62 => 12,  55 => 11,  40 => 14,  21 => 2,  23 => 3,  135 => 38,  131 => 36,  125 => 35,  120 => 48,  93 => 25,  72 => 11,  61 => 9,  58 => 8,  49 => 6,  36 => 13,  29 => 9,  25 => 4,  133 => 29,  128 => 27,  122 => 26,  117 => 22,  110 => 23,  106 => 51,  100 => 28,  97 => 19,  90 => 41,  79 => 13,  76 => 12,  70 => 10,  59 => 8,  34 => 12,  27 => 36,  22 => 41,  19 => 1,  775 => 264,  771 => 261,  768 => 260,  752 => 221,  742 => 220,  732 => 219,  724 => 218,  718 => 222,  715 => 221,  712 => 220,  709 => 219,  707 => 218,  703 => 216,  700 => 215,  695 => 209,  681 => 208,  674 => 204,  668 => 203,  665 => 202,  659 => 128,  656 => 127,  638 => 197,  635 => 196,  628 => 190,  625 => 189,  621 => 188,  617 => 120,  614 => 186,  611 => 185,  600 => 180,  591 => 178,  585 => 175,  581 => 174,  577 => 105,  574 => 172,  571 => 171,  565 => 224,  563 => 215,  556 => 210,  554 => 196,  549 => 104,  547 => 185,  542 => 182,  540 => 171,  535 => 168,  532 => 167,  527 => 143,  522 => 139,  516 => 130,  511 => 100,  504 => 98,  501 => 97,  495 => 91,  489 => 90,  486 => 89,  480 => 100,  478 => 97,  474 => 95,  471 => 93,  469 => 89,  464 => 87,  461 => 86,  456 => 81,  448 => 77,  444 => 75,  441 => 74,  435 => 68,  426 => 61,  423 => 60,  418 => 81,  416 => 75,  408 => 69,  404 => 68,  399 => 66,  394 => 63,  391 => 60,  385 => 56,  383 => 55,  374 => 48,  371 => 47,  366 => 43,  359 => 41,  356 => 68,  351 => 38,  348 => 37,  345 => 36,  342 => 35,  335 => 43,  332 => 40,  329 => 35,  326 => 34,  321 => 28,  316 => 66,  310 => 65,  301 => 64,  296 => 63,  294 => 264,  290 => 60,  288 => 260,  276 => 254,  264 => 245,  257 => 240,  249 => 232,  241 => 226,  239 => 167,  234 => 164,  224 => 55,  218 => 142,  214 => 141,  209 => 139,  206 => 138,  197 => 48,  194 => 135,  189 => 133,  184 => 131,  179 => 42,  177 => 128,  174 => 40,  160 => 121,  156 => 119,  154 => 118,  149 => 116,  146 => 115,  143 => 105,  137 => 30,  132 => 84,  129 => 83,  127 => 47,  118 => 34,  116 => 33,  113 => 20,  99 => 24,  95 => 23,  91 => 22,  88 => 23,  85 => 14,  81 => 22,  73 => 17,  69 => 34,  65 => 15,  56 => 7,  280 => 255,  252 => 106,  236 => 93,  228 => 145,  222 => 143,  219 => 85,  216 => 84,  205 => 81,  202 => 51,  196 => 78,  191 => 46,  182 => 43,  176 => 41,  167 => 124,  163 => 66,  159 => 65,  151 => 63,  147 => 62,  142 => 59,  139 => 103,  124 => 45,  121 => 45,  114 => 40,  111 => 39,  108 => 38,  96 => 29,  92 => 27,  89 => 26,  86 => 40,  78 => 38,  75 => 21,  67 => 33,  64 => 16,  48 => 11,  109 => 30,  103 => 17,  94 => 12,  83 => 23,  80 => 22,  77 => 18,  74 => 37,  71 => 14,  68 => 10,  66 => 9,  60 => 15,  57 => 14,  54 => 6,  51 => 6,  47 => 18,  41 => 16,  38 => 7,  35 => 7,  30 => 4,);
    }
}
