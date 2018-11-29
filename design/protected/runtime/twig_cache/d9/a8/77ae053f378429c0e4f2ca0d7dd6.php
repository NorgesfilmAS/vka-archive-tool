<?php

/* /views/site/invite.twig */
class __TwigTemplate_d9a877ae053f378429c0e4f2ca0d7dd6 extends Twig_Template
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
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "
<br/><br/><br/><br/><br/>
<div class=\"col-sm-6 col-sm-offset-3 well well-large\">
\t";
        // line 11
        if ((isset($context["error"]) ? $context["error"] : null)) {
            // line 12
            echo "\t\t";
            echo twig_escape_filter($this->env, (isset($context["error"]) ? $context["error"] : null), "html", null, true);
            echo "
\t";
        } else {
            // line 14
            echo "\t\t<div class=\"row\">
\t\t\t<div class=\"col-sm-10 col-sm-offset-1\">
\t\t\t\t<h4>";
            // line 16
            echo twig_escape_filter($this->env, YiiTranslate("app", "Welcome {name}", array("{name}" => $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "fullname"))), "html", null, true);
            echo "</h4>
\t\t\t\t";
            // line 17
            if ($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "hasErrors", array(), "method")) {
                // line 18
                echo "\t\t\t\t\t\t<div class=\"alert alert-block bg-warning\">
\t\t\t\t\t\t\t";
                // line 19
                echo $this->getAttribute((isset($context["html"]) ? $context["html"] : null), "errorSummary", array(0 => $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model")), "method");
                echo "
\t\t\t\t\t\t</div>
\t\t\t\t";
            }
            // line 21
            echo "\t
\t\t\t";
            // line 22
            echo twig_escape_filter($this->env, YiiTranslate("app", "in this page you can set your password. You username is "), "html", null, true);
            echo "<br/>
\t\t\t<div class=\"text-center\"><strong>";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "username"), "html", null, true);
            echo "</strong></div>
\t\t\t<br /><br />
\t\t\t";
            // line 25
            $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "flash"), "method"));
            $template->display($context);
            echo "\t
\t\t\t";
            // line 26
            $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "_form"), "method"));
            $template->display($context);
            // line 27
            echo "\t\t\t";
            $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "_buttons"), "method"));
            $template->display($context);
            // line 28
            echo "\t\t</div>\t\t\t
\t\t</div>\t\t
\t";
        }
        // line 31
        echo "</div>\t

";
    }

    public function getTemplateName()
    {
        return "/views/site/invite.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  90 => 31,  85 => 28,  81 => 27,  78 => 26,  73 => 25,  68 => 23,  64 => 22,  61 => 21,  55 => 19,  52 => 18,  50 => 17,  46 => 16,  42 => 14,  36 => 12,  34 => 11,  29 => 8,  26 => 7,);
    }
}
