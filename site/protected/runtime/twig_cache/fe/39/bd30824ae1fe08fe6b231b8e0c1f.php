<?php

/* /views/job/viewJobActiveList.twig */
class __TwigTemplate_fe39bd30824ae1fe08fe6b231b8e0c1f extends Twig_Template
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
        echo "<div class=\"grid-row art-row row table-hover\" >\t
\t<div class=\"menu-modal\"  data-url=\"";
        // line 2
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "job/update", 1 => array("id" => $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "id"))), "method"), "html", null, true);
        echo "\">
\t\t<div class=\"col-xs-1 text-right\">";
        // line 3
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "resource_id"), "html", null, true);
        echo "</div>\t
\t\t<div class=\"col-xs-4 grid-col-no-wrap\">
\t\t\t\t";
        // line 5
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "resource_id")) {
            // line 6
            echo "\t\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "explain"), "html", null, true);
            echo "
\t\t\t\t";
        } elseif (($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "job_type_id") == 5)) {
            // line 8
            echo "\t\t\t<span style=\"color: gray\">(system: MD5 generate job)</span>\t
\t\t\t\t";
        }
        // line 10
        echo "\t\t</div>\t
\t\t<div class=\"col-xs-2 text-right\">";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "priorityText"), "html", null, true);
        echo "</div>\t
\t\t<div class=\"col-xs-3 grid-col-no-wrap\">";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "creationDate"), "html", null, true);
        echo "</div>\t
\t</div>
\t<div class=\"col-xs-2 grid-col-no-wrap menu-modal text-right\" data-url=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "job/view", 1 => array("id" => $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "id"))), "method"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "status"), "html", null, true);
        echo " <span class=\"glyphicon glyphicon-paperclip\"></span></div>\t
</div>";
    }

    public function getTemplateName()
    {
        return "/views/job/viewJobActiveList.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  55 => 14,  50 => 12,  46 => 11,  43 => 10,  31 => 5,  26 => 3,  22 => 2,  19 => 1,  81 => 33,  78 => 32,  75 => 31,  68 => 25,  66 => 20,  61 => 18,  57 => 17,  53 => 16,  49 => 15,  45 => 14,  39 => 8,  36 => 10,  33 => 6,  30 => 8,  27 => 7,);
    }
}
