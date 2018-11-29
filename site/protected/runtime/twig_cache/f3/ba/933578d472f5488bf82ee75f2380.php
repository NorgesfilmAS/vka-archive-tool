<?php

/* /views/site/profile.twig */
class __TwigTemplate_f3ba933578d472f5488bf82ee75f2380 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "main"), "method"));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 7
        $context["layout"] = "full";
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 8
    public function block_content($context, array $blocks = array())
    {
        // line 9
        echo "<br /><br /><br />
<div class=\"row \">
\t<div class=\"col-sm-6 col-sm-offset-3 well\">
\t\t<h2>User profile: ";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "username"), "html", null, true);
        echo "</h2>
";
        // line 27
        echo "\t\t";
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "flash"), "method"));
        $template->display($context);
        echo "\t
\t\t";
        // line 28
        if (((isset($context["mode"]) ? $context["mode"] : null) != "edit")) {
            // line 29
            echo "\t\t";
            $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "_view"), "method"));
            $template->display($context);
            // line 30
            echo "\t\t";
        } else {
            // line 31
            echo "\t\t";
            $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "_form"), "method"));
            $template->display($context);
            // line 32
            echo "\t\t";
        }
        // line 33
        echo "\t\t";
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "_buttons"), "method"));
        $template->display($context);
        // line 34
        echo "\t
</div>\t
\t
\t
</div>\t
";
    }

    public function getTemplateName()
    {
        return "/views/site/profile.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 34,  62 => 33,  59 => 32,  55 => 31,  52 => 30,  48 => 29,  46 => 28,  40 => 27,  36 => 12,  31 => 9,  28 => 8,  23 => 7,);
    }
}
