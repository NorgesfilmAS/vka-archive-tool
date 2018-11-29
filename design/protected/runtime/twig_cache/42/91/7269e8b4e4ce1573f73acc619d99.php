<?php

/* /views/access/group-view.twig */
class __TwigTemplate_42917269e8b4e4ce1573f73acc619d99 extends Twig_Template
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
        echo "<div id=\"scroll\" class=\"bs-content\">
\t";
        // line 9
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "caption"), "method"));
        $template->display($context);
        // line 10
        echo "\t";
        if ($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "parentGroup")) {
            // line 11
            echo "\t<p>
\t";
            // line 12
            echo twig_escape_filter($this->env, YiiTranslate("app", "sub group of"), "html", null, true);
            echo " <a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "access/group", 1 => array("id" => $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "parent"))), "method"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "parentGroup"), "name"), "html", null, true);
            echo "</a>
\t</p>
\t";
        }
        // line 15
        echo "\t<div class=\"row\">

\t<div class=\"col-sm-4\">
\t\t<div class=\"panel panel-default\">
\t\t\t<div class=\"panel-heading\">
\t\t\t\t<h3 class=\"panel-title\">";
        // line 20
        echo twig_escape_filter($this->env, YiiTranslate("app", "fields editable"), "html", null, true);
        echo "</h3>
\t\t\t</div>
\t\t\t<div class=\"panel-body\">
\t\t\t\t";
        // line 23
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "editAccess"));
        foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
            // line 24
            echo "\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "resourceName"), "html", null, true);
            echo " - ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "fieldname"), "html", null, true);
            echo "<br />
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 26
        echo "\t\t\t</div>
\t\t</div>\t\t
\t</div>
\t<div class=\"col-sm-4\">
\t\t<div class=\"panel panel-default\">
\t\t\t<div class=\"panel-heading\">
\t\t\t\t<h3 class=\"panel-title\">";
        // line 32
        echo twig_escape_filter($this->env, YiiTranslate("app", "fields visible"), "html", null, true);
        echo "</h3>
\t\t\t</div>
\t\t\t<div class=\"panel-body\">
\t\t\t\t";
        // line 35
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "readAccess"));
        foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
            // line 36
            echo "\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "resourceName"), "html", null, true);
            echo " - ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "fieldname"), "html", null, true);
            echo "<br />
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 38
        echo "\t\t\t</div>
\t\t</div>\t\t
\t</div>
\t\t
</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "/views/access/group-view.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  108 => 38,  97 => 36,  93 => 35,  87 => 32,  79 => 26,  68 => 24,  64 => 23,  58 => 20,  51 => 15,  41 => 12,  38 => 11,  35 => 10,  32 => 9,  29 => 8,  26 => 7,);
    }
}
