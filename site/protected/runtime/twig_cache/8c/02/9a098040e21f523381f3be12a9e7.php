<?php

/* /views/userInfo/index.twig */
class __TwigTemplate_8c029a098040e21f523381f3be12a9e7 extends Twig_Template
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
        echo "\t";
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "caption"), "method"));
        $template->display($context);
        // line 9
        echo "
\t<div class=\"row\">
\t\t<div class=\"col-sm-6\">
\t\t\t<h4>";
        // line 12
        echo twig_escape_filter($this->env, YiiTranslate("app", "Profile"), "html", null, true);
        echo "</h4>
\t\t\t<dl class=\"dl-horizontal a-url\" data-url=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "userInfo/profile", 1 => array("id" => $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "id"))), "method"), "html", null, true);
        echo "\">
\t\t\t\t<dt>";
        // line 14
        echo twig_escape_filter($this->env, YiiTranslate("app", $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "getAttributeLabel", array(0 => "fullname"), "method")), "html", null, true);
        echo "</dt>
\t\t\t\t<dd>";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "fullname"), "html", null, true);
        echo "</dd>
\t\t\t\t<dt>";
        // line 16
        echo twig_escape_filter($this->env, YiiTranslate("app", $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "getAttributeLabel", array(0 => "email"), "method")), "html", null, true);
        echo "</dt>
\t\t\t\t<dd><a href=\"mailto:";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "email"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "email"), "html", null, true);
        echo "</a></dd>
\t\t\t\t<dt>";
        // line 18
        echo twig_escape_filter($this->env, YiiTranslate("app", $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "getAttributeLabel", array(0 => "usergroup"), "method")), "html", null, true);
        echo "</dt>
\t\t\t\t<dd>";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "group"), "name"), "html", null, true);
        echo "</dd>
\t\t\t\t<dt>";
        // line 20
        echo twig_escape_filter($this->env, YiiTranslate("app", $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "getAttributeLabel", array(0 => "account_expires"), "method")), "html", null, true);
        echo "</dt>
\t\t\t\t<dd>";
        // line 21
        echo twig_escape_filter($this->env, ((twig_test_empty($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "account_expires"))) ? (YiiTranslate("app", "(never)")) : (twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "account_expires"), "d/m/Y"))), "html", null, true);
        echo "</dd>\t\t\t\t
\t\t\t</dl>
\t\t</div>
\t\t<div class=\"col-sm-6\">
\t\t\t<h4>";
        // line 25
        echo twig_escape_filter($this->env, YiiTranslate("app", "access"), "html", null, true);
        echo "</h4>
\t\t</div>
\t</div>
";
    }

    // line 30
    public function block_onReady($context, array $blocks = array())
    {
        // line 31
        echo "  \$('.menu-user-overview').addClass('active');
\t";
        // line 32
        $this->displayParentBlock("onReady", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "/views/userInfo/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  98 => 32,  95 => 31,  92 => 30,  84 => 25,  77 => 21,  73 => 20,  69 => 19,  65 => 18,  59 => 17,  55 => 16,  51 => 15,  47 => 14,  43 => 13,  39 => 12,  34 => 9,  30 => 8,  27 => 7,);
    }
}
