<?php

/* /views/job/active.twig */
class __TwigTemplate_b0f47f91f7ac7fa58a40e9e01f597f6d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
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

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "<div id=\"scroll\" class=\"bs-content\">
\t";
        // line 9
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "flash"), "method"));
        $template->display($context);
        // line 10
        echo "\t
\t<h2>";
        // line 11
        echo twig_escape_filter($this->env, YiiTranslate("app", "Active Jobs in the queue"), "html", null, true);
        echo "</h2>
\t
\t<div class=\"row grid-header\">
\t\t<div class=\"col-xs-1 text-right sort-key\" data-sort=\"id\">";
        // line 14
        echo twig_escape_filter($this->env, YiiTranslate("app", "id"), "html", null, true);
        echo "</div>
\t\t<div class=\"col-xs-4 sort-key\" data-sort=\"title\">";
        // line 15
        echo twig_escape_filter($this->env, YiiTranslate("app", "title"), "html", null, true);
        echo "</div>
\t\t<div class=\"col-xs-2 text-right sort-key\" data-sort=\"priority\">";
        // line 16
        echo twig_escape_filter($this->env, YiiTranslate("app", "priorty"), "html", null, true);
        echo "</div>
\t\t<div class=\"col-xs-3 sort-key\" data-sort=\"artist\">";
        // line 17
        echo twig_escape_filter($this->env, YiiTranslate("app", "created"), "html", null, true);
        echo "</div>
\t\t<div class=\"col-xs-2 text-right\" data-sort=\"\">";
        // line 18
        echo twig_escape_filter($this->env, YiiTranslate("app", "status"), "html", null, true);
        echo "</div>
\t</div>
\t";
        // line 20
        echo $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "widget", array(0 => "zii.widgets.CListView", 1 => array("id" => "id-grid", "dataProvider" => $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "activeJobs"), "itemView" => "viewJobActiveList", "template" => "{items} {pager}"), 2 => true), "method");
        // line 25
        echo "\t\t\t
</div>

";
    }

    // line 31
    public function block_onReady($context, array $blocks = array())
    {
        // line 32
        echo "  \$('.menu-active').addClass('active');
\t";
        // line 33
        $this->displayParentBlock("onReady", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "/views/job/active.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 33,  78 => 32,  75 => 31,  68 => 25,  66 => 20,  61 => 18,  57 => 17,  53 => 16,  49 => 15,  45 => 14,  39 => 11,  36 => 10,  33 => 9,  30 => 8,  27 => 7,);
    }
}
