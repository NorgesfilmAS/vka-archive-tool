<?php

/* vendors/toxus/views/layouts/viewForm.twig */
class __TwigTemplate_a0bde59e8ddf09b8e791c35e0ca3c40b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'formContent' => array($this, 'block_formContent'),
            'viewContent' => array($this, 'block_viewContent'),
            'otherMode' => array($this, 'block_otherMode'),
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
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "caption"), "method"));
        $template->display($context);
        // line 9
        $context["mode"] = ((array_key_exists("mode", $context)) ? (_twig_default_filter((isset($context["mode"]) ? $context["mode"] : null), "view")) : ("view"));
        // line 10
        echo "<div class=\"bs-content\">
\t";
        // line 11
        echo "\t
  ";
        // line 12
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "_error"), "method"));
        $template->display($context);
        // line 13
        echo "\t";
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "flash"), "method"));
        $template->display($context);
        echo "\t
  
\t";
        // line 15
        echo "\t
\t";
        // line 16
        if (((isset($context["mode"]) ? $context["mode"] : null) == "edit")) {
            // line 17
            echo "\t\t";
            $this->displayBlock('formContent', $context, $blocks);
            // line 24
            echo "\t";
        } elseif (((isset($context["mode"]) ? $context["mode"] : null) == "view")) {
            // line 25
            echo "\t\t";
            $this->displayBlock('viewContent', $context, $blocks);
            // line 32
            echo "\t";
        } else {
            // line 33
            echo "\t\t";
            $this->displayBlock('otherMode', $context, $blocks);
            // line 34
            echo "\t";
        }
        echo "\t
</div>
";
    }

    // line 17
    public function block_formContent($context, array $blocks = array())
    {
        // line 18
        echo "      <div class=\"row\">      
        <div class=\"col-xs-12\">
          ";
        // line 20
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "_form"), "method"));
        $template->display($context);
        // line 21
        echo "        </div>    
      </div>      
\t\t";
    }

    // line 25
    public function block_viewContent($context, array $blocks = array())
    {
        // line 26
        echo "\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"col-sm-10\">
\t\t\t\t";
        // line 28
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "_view"), "method"));
        $template->display($context);
        // line 29
        echo "\t\t\t\t</div>
\t\t\t</div>\t\t
\t\t";
    }

    // line 33
    public function block_otherMode($context, array $blocks = array())
    {
        echo "mode: ";
        echo twig_escape_filter($this->env, (isset($context["mode"]) ? $context["mode"] : null), "html", null, true);
    }

    // line 39
    public function block_onReady($context, array $blocks = array())
    {
        // line 40
        echo "  ";
        if ((isset($context["menuItem"]) ? $context["menuItem"] : null)) {
            // line 41
            echo "\t\t\$('";
            echo twig_escape_filter($this->env, (isset($context["menuItem"]) ? $context["menuItem"] : null), "html", null, true);
            echo "').addClass('active');
\t";
        }
        // line 42
        echo "\t
  
\t\$('.btn-edit').on('click', function() {
\t\twindow.location = window.location+\"?mode=edit\"; 
\t});
  \$('.btn-edit').hide();
  

\t";
        // line 50
        $this->displayParentBlock("onReady", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "vendors/toxus/views/layouts/viewForm.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  143 => 50,  133 => 42,  127 => 41,  124 => 40,  121 => 39,  114 => 33,  108 => 29,  105 => 28,  101 => 26,  98 => 25,  92 => 21,  89 => 20,  85 => 18,  82 => 17,  74 => 34,  71 => 33,  68 => 32,  65 => 25,  62 => 24,  59 => 17,  57 => 16,  54 => 15,  47 => 13,  44 => 12,  41 => 11,  38 => 10,  36 => 9,  33 => 8,  30 => 7,);
    }
}
