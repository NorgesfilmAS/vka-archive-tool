<?php

/* /views/access/viewUserList.twig */
class __TwigTemplate_f261c14dc156c6b0e7a857f2ef547b75 extends Twig_Template
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
        // line 1
        echo "<div class=\"grid-row art-row row a-url table-hover\" data-url=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "userInfo/index", 1 => array("id" => $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "ref"))), "method"), "html", null, true);
        echo "\" >\t
\t<div class=\"col-xs-1 text-right\">";
        // line 2
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "ref"), "html", null, true);
        echo "</div>\t
\t<div class=\"col-xs-3 grid-col-no-wrap\">";
        // line 3
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "username"), "html", null, true);
        echo "</div>\t
\t<div class=\"col-xs-3 grid-col-no-wrap\">";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "fullname"), "html", null, true);
        echo "</div>\t
\t<div class=\"col-xs-2 grid-col-no-wrap\">";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "group"), "name"), "html", null, true);
        echo "</div>\t
\t<div class=\"col-xs-2 grid-col-no-wrap\">";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "account_expires"), "html", null, true);
        echo "</div>\t
</div>";
    }

    public function getTemplateName()
    {
        return "/views/access/viewUserList.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 6,  36 => 5,  32 => 4,  28 => 3,  24 => 2,  19 => 1,  96 => 57,  91 => 55,  86 => 52,  83 => 51,  74 => 44,  63 => 35,  61 => 19,  55 => 16,  51 => 15,  47 => 14,  43 => 13,  39 => 12,  33 => 9,  30 => 8,  27 => 7,);
    }
}
