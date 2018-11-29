<?php

/* vendors/toxus/views/layouts/angular.twig */
class __TwigTemplate_fda3ae0aff59f24a4d4d435930ce6b16 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'bodyTag' => array($this, 'block_bodyTag'),
            'content' => array($this, 'block_content'),
            'scriptFiles' => array($this, 'block_scriptFiles'),
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

    // line 15
    public function block_bodyTag($context, array $blocks = array())
    {
        // line 16
        echo "ng-app=\"app\" 
";
        // line 17
        $this->displayParentBlock("bodyTag", $context, $blocks);
        echo "
";
    }

    // line 20
    public function block_content($context, array $blocks = array())
    {
        echo "\t
\t";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "registerPackage", array(0 => "angularJs.min"), "method"), "html", null, true);
        echo " 
\t";
        // line 22
        $this->displayBlock('scriptFiles', $context, $blocks);
        // line 23
        echo "\t";
        $this->displayParentBlock("content", $context, $blocks);
        echo "
<script type=\"text/javascript\">
\tvar serverUrl = \"";
        // line 25
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "xx"), "method"), "html", null, true);
        echo "\".slice(0,-2);\t
</script>

";
    }

    // line 22
    public function block_scriptFiles($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "vendors/toxus/views/layouts/angular.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  51 => 23,  45 => 21,  28 => 15,  172 => 76,  163 => 70,  159 => 69,  150 => 63,  141 => 57,  134 => 55,  128 => 50,  124 => 49,  115 => 42,  104 => 39,  101 => 38,  97 => 37,  92 => 35,  86 => 34,  84 => 32,  80 => 31,  77 => 30,  71 => 28,  65 => 22,  60 => 24,  57 => 25,  49 => 22,  46 => 18,  40 => 20,  37 => 14,  34 => 17,  31 => 16,  26 => 4,);
    }
}
