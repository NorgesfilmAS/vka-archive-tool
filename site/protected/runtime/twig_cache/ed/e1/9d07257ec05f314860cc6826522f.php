<?php

/* /views/logging/loggingRow.twig */
class __TwigTemplate_ede19d07257ec05f314860cc6826522f extends Twig_Template
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
        // line 1
        if (($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "id") == 0)) {
            // line 2
            echo "<div class=\"grid-row art-row row table-hover\"  >\t
";
        } else {
            // line 4
            echo "<div class=\"grid-row art-row row a-url table-hover\" data-url=\"";
            echo twig_escape_filter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "id"), "html", null, true);
            echo "\" >\t
";
        }
        // line 6
        echo "\t<div class=\"col-sm-2 grid-col-no-wrap\" data-sort=\"date\">";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "date"), "d/m/Y H:i"), "html", null, true);
        echo "</div>
\t<div class=\"col-sm-1 grid-col-no-wrap\" data-sort=\"action\">";
        // line 7
        echo twig_escape_filter($this->env, YiiTranslate("app", "log-{action}", array("{action}" => $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "action"))), "html", null, true);
        echo "</div>
\t<div class=\"col-sm-1 text-right\" data-sort=\"id\">";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "id"), "html", null, true);
        echo "</div>
\t<div class=\"col-sm-3 grid-col-no-wrap\" data-sort=\"title\">";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "explain"), "html", null, true);
        echo "</div>
\t<div class=\"col-sm-2 grid-col-no-wrap\" data-sort=\"user\">";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "username"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["modelClass"]) ? $context["modelClass"] : null), "html", null, true);
        echo "</div>
\t<div class=\"col-sm-3 grid-col-no-wrap\" data-sort=\"fields\">";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "fields"), "html", null, true);
        echo "</div>
</div>";
    }

    public function getTemplateName()
    {
        return "/views/logging/loggingRow.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 11,  50 => 10,  38 => 7,  25 => 4,  21 => 2,  23 => 6,  19 => 1,  183 => 78,  173 => 70,  167 => 69,  164 => 68,  161 => 67,  153 => 60,  151 => 53,  142 => 46,  127 => 45,  123 => 44,  116 => 40,  111 => 37,  96 => 36,  92 => 35,  85 => 31,  79 => 28,  75 => 27,  71 => 26,  67 => 25,  63 => 24,  59 => 23,  53 => 19,  46 => 9,  42 => 8,  40 => 13,  37 => 12,  33 => 6,  30 => 9,  27 => 8,);
    }
}
