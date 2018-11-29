<?php

/* /vendors/toxus/views/article/index.twig */
class __TwigTemplate_41f978108d9ae1053cb5ae4c2b7fb4f2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'menuLeft' => array($this, 'block_menuLeft'),
            'extraNav' => array($this, 'block_extraNav'),
            'content' => array($this, 'block_content'),
            'onReady' => array($this, 'block_onReady'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "main"), "method"));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 9
    public function block_menuLeft($context, array $blocks = array())
    {
        // line 10
        echo "  ";
        if ($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "user"), "canUpdateHelp")) {
            // line 11
            echo "  <div class=\"cls-navbar-toolbar navbar bs-nav-toolbar id-navbar-toolbar\">
  ";
            // line 12
            $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "_buttons"), "method"));
            $template->display($context);
            // line 13
            echo "  </div>
  ";
        }
        // line 15
        echo "\t<div class=\"article-search\">
\t\t<form method=\"get\" class=\"article-search-form well form-inline\">
\t\t\t";
        // line 17
        echo twig_escape_filter($this->env, YiiTranslate("base", "search"), "html", null, true);
        echo "\t\t\t
\t\t\t<input type=\"text\" id=\"id-field\" class=\"article-search-field  form-control input-sm\">
\t\t</form>
\t</div>\t
\t<div class=\"art-result well\">
\t</div>
";
    }

    // line 25
    public function block_extraNav($context, array $blocks = array())
    {
    }

    // line 27
    public function block_content($context, array $blocks = array())
    {
        // line 28
        echo "\t<div class=\"row article-body\">
\t\t";
        // line 29
        if ($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model")) {
            // line 30
            echo "\t\t";
            $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "view"), "method"));
            $template->display($context);
            // line 31
            echo "\t\t";
        }
        // line 32
        echo "\t</div>
";
    }

    // line 36
    public function block_onReady($context, array $blocks = array())
    {
        // line 37
        echo "  function articleSearchFor(value) {
    if (typeof value == 'undefined') {
      value = '';
    }  
\t\t\$.ajax( {
\t\t\t'url' : \"";
        // line 42
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "article/list", 1 => array("q" => "")), "method"), "html", null, true);
        echo "\" + value,
\t\t\t'success' : function(data) {
\t\t\t\t\t\$('.art-result').html(data);\t
\t\t\t}\t\t
\t\t});  
  }
  
\t\$('.article-search-field').on('keyup', function() {
    articleSearchFor(\$(this).val());
\t});
  articleSearchFor();
\t
\t";
        // line 54
        $this->displayParentBlock("onReady", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "/vendors/toxus/views/article/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 54,  95 => 42,  88 => 37,  85 => 36,  80 => 32,  77 => 31,  73 => 30,  71 => 29,  68 => 28,  65 => 27,  60 => 25,  49 => 17,  45 => 15,  41 => 13,  38 => 12,  35 => 11,  32 => 10,  29 => 9,);
    }
}
