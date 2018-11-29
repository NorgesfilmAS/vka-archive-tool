<?php

/* vendors/toxus/views/article/view.twig */
class __TwigTemplate_9ee49bd175dd7180437197bfd1cb3ec4 extends Twig_Template
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
        return "vendors/toxus/views/article/view.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  24 => 7,  19 => 4,  110 => 54,  95 => 42,  88 => 37,  85 => 36,  80 => 32,  77 => 31,  73 => 30,  71 => 29,  68 => 28,  65 => 27,  60 => 25,  49 => 17,  45 => 15,  41 => 13,  38 => 12,  35 => 11,  32 => 10,  29 => 9,);
    }
}
