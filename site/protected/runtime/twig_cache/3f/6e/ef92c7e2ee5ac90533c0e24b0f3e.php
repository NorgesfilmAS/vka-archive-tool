<?php

/* views/site/caption.twig */
class __TwigTemplate_3f6eef92c7e2ee5ac90533c0e24b0f3e extends Twig_Template
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
        // line 6
        echo "<div class=\"bs-content\">
\t<div class=\"row bs-page-header no-padding no-bottom-padding\">
\t\t<div class=\"col-sm-2 id-marker text-center\">";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "id"), "html", null, true);
        echo "</div>
\t\t<div class=\"col-sm-10 no-right-padding info-text\">";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "title"), "html", null, true);
        echo "
\t\t\t";
        // line 10
        if ($this->getAttribute((isset($context["model"]) ? $context["model"] : null), "isChannel")) {
            echo "<span class=\"small\"> (channel)</span>";
        }
        if ($this->getAttribute((isset($context["model"]) ? $context["model"] : null), "isMultiChannel")) {
            echo " <span class=\"small\"> (multi channel)</span>";
        }
        // line 11
        echo "\t\t<span class=\"pull-right \" >";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "agent"), "html", null, true);
        echo $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "field", array(0 => ", ", 1 => $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "year")), "method");
        echo "</span></div>
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "views/site/caption.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 10,  23 => 8,  129 => 34,  109 => 33,  101 => 31,  99 => 30,  90 => 24,  86 => 23,  82 => 22,  78 => 21,  74 => 20,  70 => 19,  66 => 18,  62 => 17,  54 => 12,  50 => 11,  46 => 10,  42 => 9,  38 => 11,  34 => 7,  27 => 9,  22 => 2,  19 => 6,);
    }
}
