<?php

/* /views/transfer/error.twig */
class __TwigTemplate_f5761080b2156a3c26398371079833fb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'pageTitle' => array($this, 'block_pageTitle'),
            'dialogHeader' => array($this, 'block_dialogHeader'),
            'dialogBody' => array($this, 'block_dialogBody'),
            'dialogFooter' => array($this, 'block_dialogFooter'),
            'bootstrap3Footer' => array($this, 'block_bootstrap3Footer'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "message"), "method"));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 10
    public function block_pageTitle($context, array $blocks = array())
    {
        // line 11
        echo "  Videokunst Archivet
";
    }

    // line 15
    public function block_dialogHeader($context, array $blocks = array())
    {
        // line 16
        echo "  <h3 class=\"panel-title\">";
        echo twig_escape_filter($this->env, YiiTranslate("app", "Error"), "html", null, true);
        echo "</h3>
";
    }

    // line 19
    public function block_dialogBody($context, array $blocks = array())
    {
        // line 20
        echo "  <p>";
        echo twig_escape_filter($this->env, YiiTranslate("app", "There was an error processing your request."), "html", null, true);
        echo "</p>
  <p>";
        // line 21
        echo twig_escape_filter($this->env, (isset($context["message"]) ? $context["message"] : null), "html", null, true);
        echo "</p>
";
    }

    // line 24
    public function block_dialogFooter($context, array $blocks = array())
    {
    }

    // line 27
    public function block_bootstrap3Footer($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "/views/transfer/error.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 27,  62 => 24,  56 => 21,  51 => 20,  48 => 19,  41 => 16,  38 => 15,  33 => 11,  30 => 10,);
    }
}
