<?php

/* /views/site/preview.twig */
class __TwigTemplate_4226980e88a1662e669717447d2b9944 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'dialogHeader' => array($this, 'block_dialogHeader'),
            'dialogBody' => array($this, 'block_dialogBody'),
            'onReady' => array($this, 'block_onReady'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "dialog"), "method"));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 11
    public function block_dialogHeader($context, array $blocks = array())
    {
        echo "\t
\t<h3>";
        // line 12
        echo twig_escape_filter($this->env, twig_slice($this->env, (isset($context["title"]) ? $context["title"] : null), 0, 60), "html", null, true);
        echo "</h3>
";
    }

    // line 15
    public function block_dialogBody($context, array $blocks = array())
    {
        // line 16
        echo "\t";
        if ((isset($context["isVideo"]) ? $context["isVideo"] : null)) {
            // line 17
            echo "\t<div class=\"text-center pagination-centered\" style=\"padding-left: 27px;\">
\t\t<div id=\"id-player\">Loading player ...</div>
\t</div>
\t";
        } else {
            // line 21
            echo "\t<div class=\"row\">
\t\t<div class=\"col-lg-12\">
\t\t\t<img src=\"";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "site/deleteStream", 1 => array("name" => $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "filename"))), "method"), "html", null, true);
            echo "\" class=\"pagination-centered\"/>
\t\t</div>
\t</div> 
\t";
        }
        // line 26
        echo " 
";
    }

    // line 30
    public function block_onReady($context, array $blocks = array())
    {
        // line 31
        echo "\t";
        if ((isset($context["isVideo"]) ? $context["isVideo"] : null)) {
            echo " 
\t";
            // line 32
            echo $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "registerPackage", array(0 => "jwplayer", 1 => array("isAjax" => true, "executeAfterLoad" => (((("\tjwplayer('id-player').setup({\t\t\t\t 
\t\t file: '" . $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "site/deleteStream", 1 => array("name" => $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "filename"))), "method")) . "',
\t\t base: '") . $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "packageBaseUrl", array(0 => "jwplayer"), "method")) . "/',
\t\t autostart: true
\t});\t"))), "method");
            // line 37
            echo " 
";
        }
        // line 39
        echo "\t";
        $this->displayParentBlock("onReady", $context, $blocks);
        echo "\t
";
    }

    public function getTemplateName()
    {
        return "/views/site/preview.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 39,  81 => 37,  75 => 32,  70 => 31,  67 => 30,  62 => 26,  55 => 23,  51 => 21,  45 => 17,  42 => 16,  39 => 15,  33 => 12,  28 => 11,);
    }
}
