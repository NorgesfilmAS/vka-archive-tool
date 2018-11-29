<?php

/* /views/art/channels.twig */
class __TwigTemplate_45a172473421093d51814812e5b3de05 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'itemMenuToolbar' => array($this, 'block_itemMenuToolbar'),
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

    // line 10
    public function block_itemMenuToolbar($context, array $blocks = array())
    {
    }

    // line 13
    public function block_content($context, array $blocks = array())
    {
        // line 14
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "caption"), "method"));
        $template->display($context);
        // line 15
        echo "
";
        // line 16
        if ($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "hasErrors", array(), "method")) {
            // line 17
            echo "<div class=\"bs-content\">
\t";
            // line 18
            echo "\t\t
\t<div class=\"row\">
\t\t<div class=\"col-sm-10 col-sm-offset-2 alert alert-danger\">\t\t\t
\t\t\t";
            // line 21
            echo $this->getAttribute((isset($context["html"]) ? $context["html"] : null), "errorSummary", array(0 => $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model")), "method");
            echo "
\t\t</div>
\t</div>
</div>
";
        }
        // line 26
        echo "
<div class=\"bs-content\">
\t<div class=\"row \">
\t";
        // line 29
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "channels"));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["art"]) {
            // line 30
            echo "\t\t<div class=\"col-sm-4 a-url\" data-url=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "art/view", 1 => array("id" => $this->getAttribute((isset($context["art"]) ? $context["art"] : null), "id"))), "method"), "html", null, true);
            echo "\">
\t\t\t<div class=\"thumbnail btn-area panel-preview\">
\t\t\t\t<img width=\"100%\" ";
            // line 32
            if (file_exists($this->getAttribute((isset($context["art"]) ? $context["art"] : null), "previewImagePath"))) {
                echo "src=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["art"]) ? $context["art"] : null), "previewImageUrl"), "html", null, true);
                echo "\"";
            } else {
                echo "src=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "images/no.preview.jpg"), "method"), "html", null, true);
                echo "\"";
            }
            echo " />\t\t\t\t\t\t\t\t
\t\t\t\t<div class=\"pull-right btn-group in-image\">
\t\t\t\t</div>
\t\t\t\t<div class=\"caption\">
\t\t\t\t\t<h4>";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["art"]) ? $context["art"] : null), "title"), "html", null, true);
            echo "</h4>\t\t\t\t\t
\t\t\t\t</div>\t\t\t\t\t
\t\t\t</div>\t
\t\t</div>
  ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 41
            echo "    ";
            echo twig_escape_filter($this->env, YiiTranslate("app", "Strange: There are no channels connected to this art work."), "html", null, true);
            echo " 
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['art'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 42
        echo "\t
  </div>
</div>
";
    }

    // line 48
    public function block_onReady($context, array $blocks = array())
    {
        // line 49
        echo "  \$('.menu-channels').addClass('active');
\t";
        // line 50
        $this->displayParentBlock("onReady", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "/views/art/channels.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 50,  120 => 49,  117 => 48,  110 => 42,  101 => 41,  91 => 36,  76 => 32,  70 => 30,  65 => 29,  60 => 26,  52 => 21,  47 => 18,  44 => 17,  42 => 16,  39 => 15,  36 => 14,  33 => 13,  28 => 10,);
    }
}
