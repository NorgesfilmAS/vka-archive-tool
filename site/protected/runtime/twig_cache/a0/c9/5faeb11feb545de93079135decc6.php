<?php

/* vendors/toxus/views/layouts/_error.twig */
class __TwigTemplate_a0c95faeb11feb545de93079135decc6 extends Twig_Template
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
        return array (  32 => 7,  25 => 4,  21 => 2,  19 => 1,  143 => 50,  133 => 42,  127 => 41,  124 => 40,  121 => 39,  114 => 33,  108 => 29,  105 => 28,  101 => 26,  98 => 25,  92 => 21,  89 => 20,  85 => 18,  82 => 17,  74 => 34,  71 => 33,  68 => 32,  65 => 25,  62 => 24,  59 => 17,  57 => 16,  54 => 15,  47 => 13,  44 => 12,  41 => 11,  38 => 10,  36 => 9,  33 => 8,  30 => 7,);
    }
}
