<?php

/* /views/userInfo/invite.twig */
class __TwigTemplate_278668b268ec765d86f13677c22e365a extends Twig_Template
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
        echo "  ";
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "caption"), "method"));
        $template->display($context);
        // line 9
        echo "<div class=\"row\">
\t<div class=\"col-sm-8 well well-small\">Send an invitation to an user to become part the Videokunst Archive</div>
</div>
\t";
        // line 12
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "_form"), "method"));
        $template->display($context);
        // line 13
        echo "\t";
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "_buttons"), "method"));
        $template->display($context);
    }

    public function getTemplateName()
    {
        return "/views/userInfo/invite.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 13,  38 => 12,  33 => 9,  29 => 8,  26 => 7,);
    }
}
