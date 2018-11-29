<?php

/* /views/access/groups.twig */
class __TwigTemplate_4c7e6dbd9741742f5e25ae9d07c2914e extends Twig_Template
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
\t<h2>";
        // line 9
        echo twig_escape_filter($this->env, YiiTranslate("app", "groups"), "html", null, true);
        echo "</h2>
\t
\t<div class=\"row grid-header\">
\t\t<div class=\"col-xs-1 text-right sort-key\" data-sort=\"id\">";
        // line 12
        echo twig_escape_filter($this->env, YiiTranslate("app", "id"), "html", null, true);
        echo "</div>
\t\t<div class=\"col-xs-4 sort-key\" data-sort=\"name\">";
        // line 13
        echo twig_escape_filter($this->env, YiiTranslate("app", "name"), "html", null, true);
        echo "</div>
\t\t<div class=\"col-xs-4 sort-key\" data-sort=\"parent\">";
        // line 14
        echo twig_escape_filter($this->env, YiiTranslate("app", "parent"), "html", null, true);
        echo "</div>
\t</div>
\t";
        // line 16
        echo $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "widget", array(0 => "zii.widgets.CListView", 1 => array("id" => "id-grid", "dataProvider" => $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "search"), "itemView" => "viewGroupList", "template" => "{items} {pager}", "pager" => array("class" => "toxus.extensions.infiniteScroll.IasPager", "rowSelector" => ".art-row", "listViewId" => "id-grid", "header" => "", "loaderText" => ((("<img src=\"" . $this->getAttribute((isset($context["App"]) ? $context["App"] : null), "baseUrl")) . "/images/loading.gif") . "\"/ >"), "options" => array("history" => false, "triggerPageTreshold" => 10, "trigger" => "Load more"))), 2 => true), "method");
        // line 31
        echo "\t\t\t
</div>
<script type=\"text/javascript\">
  function bindEvents(id, result)
\t{
\t\t\$('.a-url').on('click', function() {
\t\t\twindow.location = \$(this).data('url');
\t\t});
\t\t";
        // line 39
        echo $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "getReady", array(0 => "modal-dialog"), "method");
        echo "
\t}
</script>\t

";
    }

    // line 46
    public function block_onReady($context, array $blocks = array())
    {
        // line 47
        echo "  \$('.menu-groups').addClass('active');
\t";
        // line 48
        $this->displayParentBlock("onReady", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "/views/access/groups.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  79 => 48,  76 => 47,  73 => 46,  64 => 39,  54 => 31,  52 => 16,  47 => 14,  43 => 13,  39 => 12,  33 => 9,  30 => 8,  27 => 7,);
    }
}
