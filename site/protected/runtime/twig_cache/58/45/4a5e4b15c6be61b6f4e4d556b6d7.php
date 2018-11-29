<?php

/* /vendors/toxus/views/layouts/passwordForm.twig */
class __TwigTemplate_58454a5e4b15c6be61b6f4e4d556b6d7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'message' => array($this, 'block_message'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "formDialog"), "method"));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_message($context, array $blocks = array())
    {
        // line 4
        echo "<p>
Submit your email address and we’ll send you a link to reset your password.
</p>
";
    }

    public function getTemplateName()
    {
        return "/vendors/toxus/views/layouts/passwordForm.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  29 => 4,  26 => 3,);
    }
}
