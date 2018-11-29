<?php

/* /vendors/toxus/views/layouts/formDialog.twig */
class __TwigTemplate_d56b8147149918ebd8f9736d32a90d5f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'menuLeft' => array($this, 'block_menuLeft'),
            'content' => array($this, 'block_content'),
            'title' => array($this, 'block_title'),
            'message' => array($this, 'block_message'),
            'endMessage' => array($this, 'block_endMessage'),
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

    // line 4
    public function block_menuLeft($context, array $blocks = array())
    {
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "
<div class=\"row ";
        // line 9
        echo twig_escape_filter($this->env, ((array_key_exists("class", $context)) ? (_twig_default_filter((isset($context["class"]) ? $context["class"] : null), "dialog")) : ("dialog")), "html", null, true);
        echo "\">
\t<div class=\"col-sm-8 col-xs-10 msgbox-layout border well\">
\t\t<div class=\"col-sm-12\">
\t\t\t<h2>";
        // line 12
        $this->displayBlock('title', $context, $blocks);
        echo "</h2>
\t\t\t";
        // line 13
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "flash"), "method"));
        $template->display($context);
        // line 14
        echo "\t\t\t";
        $this->displayBlock('message', $context, $blocks);
        // line 15
        echo "\t\t\t</div>
\t\t<div class=\"";
        // line 16
        if ($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "hasErrors", array(), "method")) {
            echo "shake";
        }
        echo " col-sm-12\">\t\t
\t\t\t";
        // line 17
        if ((isset($context["form"]) ? $context["form"] : null)) {
            // line 18
            echo "\t\t\t<div class=\"bs-content\">
\t\t";
            // line 19
            $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "_form"), "method"));
            $template->display($context);
            // line 20
            echo "\t\t\t</div>\t\t
\t\t";
            // line 21
            $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "_buttons"), "method"));
            $template->display($context);
            // line 22
            echo "\t\t\t";
        }
        // line 23
        echo "\t\t";
        $this->displayBlock('endMessage', $context, $blocks);
        echo "\t
\t\t</div>\t\t
\t</div>
</div>\t  
\t
";
    }

    // line 12
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "title"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
        echo " ";
    }

    // line 14
    public function block_message($context, array $blocks = array())
    {
        echo (isset($context["message"]) ? $context["message"] : null);
    }

    // line 23
    public function block_endMessage($context, array $blocks = array())
    {
        echo (isset($context["endMessage"]) ? $context["endMessage"] : null);
    }

    public function getTemplateName()
    {
        return "/vendors/toxus/views/layouts/formDialog.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  109 => 23,  103 => 14,  94 => 12,  83 => 23,  80 => 22,  77 => 21,  74 => 20,  71 => 19,  68 => 18,  66 => 17,  60 => 16,  57 => 15,  54 => 14,  51 => 13,  47 => 12,  41 => 9,  38 => 8,  35 => 7,  30 => 4,);
    }
}
