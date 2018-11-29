<?php

/* /views/mail/processingDone.twig */
class __TwigTemplate_91f0eeeeb66172bd9ec495f7258a23db extends Twig_Template
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
        echo "#to: ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "email"), "html", null, true);
        echo "  
#subject: Processing done for ";
        // line 2
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["art"]) ? $context["art"] : null), "title"), "html", null, true);
        echo "
#body: 

Dear ";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username"), "html", null, true);
        echo "

The processing of the ";
        // line 7
        if ((isset($context["is_alternative"]) ? $context["is_alternative"] : null)) {
            echo " alternative file of ";
        }
        echo " Artwork ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["art"]) ? $context["art"] : null), "title"), "html", null, true);
        echo " has been done.

";
        // line 9
        if ((isset($context["has_errors"]) ? $context["has_errors"] : null)) {
            // line 10
            echo "** THERE WERE ERROR PROCESSING THIS FILE.                       
** For more information please look at the logging in the queue 
** ";
            // line 12
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createAbsoluteUrl", array(0 => "job/done"), "method"), "html", null, true);
            echo "                     
";
        } else {
            // line 14
            echo "You can see the work: ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createAbsoluteUrl", array(0 => "art/files", 1 => array("id" => $this->getAttribute((isset($context["art"]) ? $context["art"] : null), "id"))), "method"), "html", null, true);
            echo "
";
        }
        // line 16
        echo "


Best regards

The Archive Tool interface";
    }

    public function getTemplateName()
    {
        return "/views/mail/processingDone.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 16,  55 => 14,  50 => 12,  46 => 10,  44 => 9,  35 => 7,  30 => 5,  24 => 2,  19 => 1,);
    }
}
