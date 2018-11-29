<?php

/* vendors/toxus/views/layouts/_error.twig */
class __TwigTemplate_7b99e0f5fbc7a4efc9e38607e70ca693 extends Twig_Template
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
        if ($this->getAttribute((isset($context["model"]) ? $context["model"] : null), "hasErrors", array(), "method")) {
            // line 2
            echo "\t<div class=\"row\">
\t\t<div class=\"col-lg-8 col-lg-offset-2 alert alert-danger\">\t\t\t
\t\t\t";
            // line 4
            echo $this->getAttribute((isset($context["html"]) ? $context["html"] : null), "errorSummary", array(0 => (isset($context["model"]) ? $context["model"] : null)), "method");
            echo "
\t\t</div>
\t</div>
";
        }
        // line 7
        echo "\t";
    }

    public function getTemplateName()
    {
        return "vendors/toxus/views/layouts/_error.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  32 => 7,  25 => 4,  21 => 2,  19 => 1,);
    }
}
