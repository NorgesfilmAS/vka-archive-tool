<?php

/* /views/resourceSpace/index.twig */
class __TwigTemplate_3823290f4a8745647950bf25606fa2f3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'pageContent' => array($this, 'block_pageContent'),
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

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "<div id=\"scroll\" class=\"bs-content\">
\t<h2>Resource Space Definitions</h2>
\t
\t";
        // line 7
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "flash"), "method"));
        $template->display($context);
        // line 8
        echo "\t";
        $this->displayBlock('pageContent', $context, $blocks);
        // line 31
        echo "</div>\t\t\t
";
    }

    // line 8
    public function block_pageContent($context, array $blocks = array())
    {
        // line 9
        echo "\t
\t\t<div class=\"row grid-header\">
\t\t\t<div class=\"col-xs-1\">ID</div>
\t\t\t<div class=\"col-xs-2\">NameID</div>
\t\t\t<div class=\"col-xs-2\">Fields</div>
\t\t\t<div class=\"col-xs-2\">Model</div>
\t\t\t<div class=\"col-xs-2\">Show</div>
\t\t</div>
\t\t<div id=\"id-grid\" class=\"list-view\">
\t\t\t<div class=\"items\">
\t\t\t\t";
        // line 19
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"));
        foreach ($context['_seq'] as $context["id"] => $context["key"]) {
            // line 20
            echo "\t\t\t\t<div class=\"grid-row row table-hover\">
\t\t\t\t\t<div class=\"col-xs-1\">";
            // line 21
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
            echo "</div>
\t\t\t\t\t<div class=\"col-xs-2\">";
            // line 22
            echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
            echo "</div>
\t\t\t\t\t<div class=\"col-xs-2\"><a href=\"";
            // line 23
            echo $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "resourceSpace/listModel", 1 => array("id" => (isset($context["id"]) ? $context["id"] : null))), "method");
            echo "\">List fields</a></div>
\t\t\t\t\t<div class=\"col-xs-2\"><a href=\"";
            // line 24
            echo $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "resourceSpace/generateModel", 1 => array("id" => (isset($context["id"]) ? $context["id"] : null))), "method");
            echo "\">Generate model</a></div>
\t\t\t\t\t<div class=\"col-xs-2\"><a href=\"";
            // line 25
            echo $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "resourceSpace/show", 1 => array("modelName" => (isset($context["key"]) ? $context["key"] : null), "id" => 4)), "method");
            echo "\">Show</a></div>
\t\t\t\t</div>\t
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['id'], $context['key'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 27
        echo "\t
\t\t\t</div>
\t\t</div>\t\t\t\t
  ";
    }

    public function getTemplateName()
    {
        return "/views/resourceSpace/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 27,  84 => 25,  80 => 24,  76 => 23,  72 => 22,  68 => 21,  65 => 20,  61 => 19,  49 => 9,  46 => 8,  41 => 31,  38 => 8,  35 => 7,  30 => 4,  27 => 3,);
    }
}
