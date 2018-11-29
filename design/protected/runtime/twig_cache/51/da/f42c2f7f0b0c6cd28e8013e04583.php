<?php

/* views/access/caption.twig */
class __TwigTemplate_51daf42c2f7f0b0c6cd28e8013e04583 extends Twig_Template
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
        // line 4
        echo "<div class=\"bs-content\">
\t<div class=\"row bs-page-header no-padding no-bottom-padding\">
\t\t";
        // line 6
        echo twig_escape_filter($this->env, YiiTranslate("app", "group: {name}}", array("{name}" => $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "name"))), "html", null, true);
        echo "
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "views/access/caption.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  23 => 6,  19 => 4,  108 => 38,  97 => 36,  93 => 35,  87 => 32,  79 => 26,  68 => 24,  64 => 23,  58 => 20,  51 => 15,  41 => 12,  38 => 11,  35 => 10,  32 => 9,  29 => 8,  26 => 7,);
    }
}
