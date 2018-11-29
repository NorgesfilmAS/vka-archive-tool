<?php

/* views/userInfo/caption.twig */
class __TwigTemplate_e319b9e8a8656f4d6bb21db50e5d7b1a extends Twig_Template
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
        echo twig_escape_filter($this->env, YiiTranslate("app", "profile: {name}", array("{name}" => ((array_key_exists("caption", $context)) ? ((isset($context["caption"]) ? $context["caption"] : null)) : ($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "username"))))), "html", null, true);
        echo "</h2>
<div class=\"col-sm-6 col-sm-offset-3\">
";
        // line 4
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "flash"), "method"));
        $template->display($context);
        // line 5
        echo "</div>\t
";
    }

    public function getTemplateName()
    {
        return "views/userInfo/caption.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  22 => 2,  19 => 1,  98 => 32,  95 => 31,  92 => 30,  84 => 25,  77 => 21,  73 => 20,  69 => 19,  65 => 18,  59 => 17,  55 => 16,  51 => 15,  47 => 14,  43 => 13,  39 => 12,  34 => 9,  30 => 5,  27 => 4,);
    }
}
