<?php

/* /vendors/toxus/views/layouts/viewHelp.twig */
class __TwigTemplate_53ddea81a9b6a44e8429228dea504a63 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
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

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "<div class=\"row\">
\t<div class=\"col-sm-offset-1 col-sm-9 article-body\">
\t\t<h2>";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "title"), "html", null, true);
        echo "
\t\t";
        // line 11
        if ((isset($context["allowEdit"]) ? $context["allowEdit"] : null)) {
            echo "\t
\t\t\t<div class=\"pull-right well well-sm\">
\t\t\t\t\t<a class=\" btn-edit btn btn-info\" href=\"";
            // line 13
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "article/edit", 1 => array("id" => $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "id"), "mode" => "edit")), "method"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, YiiTranslate("button", "btn-edit"), "html", null, true);
            echo "</a>
\t\t\t\t\t<a class=\"btn-new btn btn-info\" href=\"";
            // line 14
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "article/create"), "method"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, YiiTranslate("button", "btn-new"), "html", null, true);
            echo "</a>
\t\t\t</div>\t
\t\t";
        }
        // line 17
        echo "\t\t</h2>
\t\t<div class=\"article-content\">
\t\t";
        // line 19
        echo $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "content");
        echo "
\t\t</div>\t
\t</div>\t
</div>
";
    }

    // line 26
    public function block_onReady($context, array $blocks = array())
    {
        // line 27
        echo "\t\$('";
        echo twig_escape_filter($this->env, (isset($context["menuItem"]) ? $context["menuItem"] : null), "html", null, true);
        echo "').addClass('active');
\t";
        // line 28
        $this->displayParentBlock("onReady", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "/vendors/toxus/views/layouts/viewHelp.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 28,  73 => 27,  70 => 26,  61 => 19,  57 => 17,  49 => 14,  43 => 13,  38 => 11,  34 => 10,  30 => 8,  27 => 7,);
    }
}
