<?php

/* /vendors/toxus/views/article/view.twig */
class __TwigTemplate_c6140b406f9eb4d2fa6b2101db9ced7d extends Twig_Template
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
        echo "
<div class=\"row\">
  <div class=\"col-xs-offset-1 col-xs-11 article-body\">
    <h2>";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "title"), "html", null, true);
        echo "</h2>\t
    <div class=\"article-content\">
    ";
        // line 9
        echo $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "content");
        echo "
    </div>\t
  </div>\t
</div>

";
    }

    public function getTemplateName()
    {
        return "/vendors/toxus/views/article/view.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  29 => 9,  24 => 7,  19 => 4,);
    }
}
