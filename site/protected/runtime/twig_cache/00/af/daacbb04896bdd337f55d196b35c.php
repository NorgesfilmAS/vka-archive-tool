<?php

/* vendors/toxus/views/layouts/message.twig */
class __TwigTemplate_00afdaacbb04896bdd337f55d196b35c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'dialogHeader' => array($this, 'block_dialogHeader'),
            'dialogBody' => array($this, 'block_dialogBody'),
            'body' => array($this, 'block_body'),
            'dialogFooter' => array($this, 'block_dialogFooter'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate((((isset($context["dialog"]) ? $context["dialog"] : null)) ? ($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "ajaxDialog"), "method")) : ($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "main"), "method"))));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 9
    public function block_content($context, array $blocks = array())
    {
        // line 10
        echo "<div class=\"row tx-message\">
\t<div class=\"";
        // line 11
        echo twig_escape_filter($this->env, ((array_key_exists("width", $context)) ? (_twig_default_filter((isset($context["width"]) ? $context["width"] : null), "col-sm-9")) : ("col-sm-9")), "html", null, true);
        echo " panel ";
        echo twig_escape_filter($this->env, ((array_key_exists("style", $context)) ? (_twig_default_filter((isset($context["style"]) ? $context["style"] : null), "panel-primary")) : ("panel-primary")), "html", null, true);
        echo " no-padding\">
\t\t<div class=\"panel-heading\">
\t\t\t";
        // line 14
        echo "\t\t\t";
        $this->displayBlock('dialogHeader', $context, $blocks);
        // line 15
        echo "\t\t</div>

\t\t<div class=\"panel-body\">
\t\t\t";
        // line 18
        $this->displayBlock('dialogBody', $context, $blocks);
        // line 21
        echo "\t\t</div>
\t\t
\t\t<div class=\"panel-footer text-center\">
\t\t\t";
        // line 24
        $this->displayBlock('dialogFooter', $context, $blocks);
        // line 27
        echo "\t\t</div>\t\t
\t</div>
</div>

";
    }

    // line 14
    public function block_dialogHeader($context, array $blocks = array())
    {
        echo "<h3 class=\"panel-title\">";
        echo twig_escape_filter($this->env, ((array_key_exists("title", $context)) ? (_twig_default_filter((isset($context["title"]) ? $context["title"] : null), YiiTranslate("base", "Message"))) : (YiiTranslate("base", "Message"))), "html", null, true);
        echo "</h3>";
    }

    // line 18
    public function block_dialogBody($context, array $blocks = array())
    {
        // line 19
        echo "\t\t\t";
        $this->displayBlock('body', $context, $blocks);
        // line 20
        echo "\t\t\t";
    }

    // line 19
    public function block_body($context, array $blocks = array())
    {
        echo (isset($context["body"]) ? $context["body"] : null);
    }

    // line 24
    public function block_dialogFooter($context, array $blocks = array())
    {
        // line 25
        echo "\t\t\t<a id=\"btn-close\" class=\"btn btn-primary action-close\" ";
        if ((isset($context["url"]) ? $context["url"] : null)) {
            echo "href=\"";
            echo twig_escape_filter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true);
            echo "\" ";
        } else {
            echo "data-dismiss=\"modal\"";
        }
        echo ">";
        echo twig_escape_filter($this->env, ((array_key_exists("closeCaption", $context)) ? (_twig_default_filter((isset($context["closeCaption"]) ? $context["closeCaption"] : null), YiiTranslate("button", "btn-close"))) : (YiiTranslate("button", "btn-close"))), "html", null, true);
        echo "</a>
\t\t\t";
    }

    public function getTemplateName()
    {
        return "vendors/toxus/views/layouts/message.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  95 => 25,  92 => 24,  86 => 19,  82 => 20,  79 => 19,  76 => 18,  68 => 14,  60 => 27,  58 => 24,  53 => 21,  46 => 15,  43 => 14,  36 => 11,  67 => 27,  62 => 24,  56 => 21,  51 => 18,  48 => 19,  41 => 16,  38 => 15,  33 => 10,  30 => 9,);
    }
}
