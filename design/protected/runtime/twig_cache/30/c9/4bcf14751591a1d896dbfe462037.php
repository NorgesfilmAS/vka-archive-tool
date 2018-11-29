<?php

/* /views/job/viewJobActiveList.twig */
class __TwigTemplate_30c94bcf14751591a1d896dbfe462037 extends Twig_Template
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
\t\t<div class=\"col-xs-4 grid-col-no-wrap\">";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "explain"), "html", null, true);
        echo "</div>\t
\t\t<div class=\"col-xs-2 text-right\">";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "priorityText"), "html", null, true);
        echo "</div>\t
\t\t<div class=\"col-xs-3 grid-col-no-wrap\">";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "creationDate"), "html", null, true);
        echo "</div>\t
\t</div>
\t<div class=\"col-xs-2 grid-col-no-wrap menu-modal text-right\" data-url=\"";
        // line 8
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
        return array (  43 => 8,  38 => 6,  34 => 5,  30 => 4,  26 => 3,  22 => 2,  19 => 1,);
    }
}
