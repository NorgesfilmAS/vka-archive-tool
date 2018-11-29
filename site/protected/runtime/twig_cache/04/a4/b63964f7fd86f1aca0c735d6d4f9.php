<?php

/* /views/job/viewJobDoneList.twig */
class __TwigTemplate_04a4b63964f7fd86f1aca0c735d6d4f9 extends Twig_Template
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
        echo "<div class=\"grid-row art-row row menu-modal table-hover\" data-url=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "job/view", 1 => array("id" => $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "id"))), "method"), "html", null, true);
        echo "\" >\t
\t<div class=\"col-xs-1 text-right\">";
        // line 2
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "resource_id"), "html", null, true);
        echo "</div>\t
\t<div class=\"col-xs-1 text-right\">";
        // line 3
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "alternate_id")) {
            echo "alt";
        }
        echo "</div>\t
\t";
        // line 4
        if (($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "job_type_id") == 5)) {
            // line 5
            echo "\t<div class=\"col-xs-4 grid-col-no-wrap\">
\t\t<span style=\"color: gray\">system: generate MD5 value</span>\t
\t</div>
\t";
        } else {
            // line 9
            echo "\t

\t<div class=\"col-xs-4 grid-col-no-wrap\">
\t\t";
            // line 12
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "explain"), "html", null, true);
            echo "\t\t
\t</div>\t
\t";
        }
        // line 15
        echo "\t<div class=\"col-xs-1 text-right\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "priorityText"), "html", null, true);
        echo "</div>\t
\t<div class=\"col-xs-3 grid-col-no-wrap\">";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "endedDate"), "html", null, true);
        echo "</div>\t
\t<div class=\"col-xs-1 grid-col-no-wrap\">
\t\t";
        // line 18
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "error_message")) {
            // line 19
            echo "\t\t\t<span title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "error_message"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, YiiTranslate("app", "error"), "html", null, true);
            echo "</span>
\t\t";
        } else {
            // line 21
            echo "\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "status"), "html", null, true);
            echo "
\t\t";
        }
        // line 23
        echo "\t</div>\t
</div>";
    }

    public function getTemplateName()
    {
        return "/views/job/viewJobDoneList.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  79 => 23,  73 => 21,  65 => 19,  58 => 16,  53 => 15,  47 => 12,  42 => 9,  36 => 5,  34 => 4,  28 => 3,  24 => 2,  19 => 1,  103 => 68,  96 => 63,  93 => 62,  72 => 42,  63 => 18,  61 => 19,  56 => 17,  52 => 16,  48 => 15,  44 => 14,  39 => 12,  33 => 9,  30 => 8,  27 => 7,);
    }
}
