<?php

/* views/moderation/caption.twig */
class __TwigTemplate_55ffcede749cdd172cc2c18aa9410600 extends Twig_Template
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
        echo "
<h2>";
        // line 2
        echo ((array_key_exists("caption", $context)) ? ((isset($context["caption"]) ? $context["caption"] : null)) : ($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "username")));
        echo "</h2>";
    }

    public function getTemplateName()
    {
        return "views/moderation/caption.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  22 => 2,  19 => 1,  60 => 28,  56 => 26,  53 => 25,  34 => 8,  30 => 7,  27 => 6,);
    }
}
