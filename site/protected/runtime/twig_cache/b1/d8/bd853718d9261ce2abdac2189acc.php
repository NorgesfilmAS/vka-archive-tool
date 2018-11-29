<?php

/* /views/access/users.twig */
class __TwigTemplate_b1d8bd853718d9261ce2abdac2189acc extends Twig_Template
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
        echo twig_escape_filter($this->env, YiiTranslate("app", "users"), "html", null, true);
        echo "</h2>
\t
\t<div class=\"row grid-header\">
\t\t<div class=\"col-xs-1 text-right sort-key\" data-sort=\"id\">";
        // line 12
        echo twig_escape_filter($this->env, YiiTranslate("app", "id"), "html", null, true);
        echo "</div>
\t\t<div class=\"col-xs-3 sort-key\" data-sort=\"username\">";
        // line 13
        echo twig_escape_filter($this->env, YiiTranslate("app", "login"), "html", null, true);
        echo "</div>
\t\t<div class=\"col-xs-3 sort-key\" data-sort=\"fullname\">";
        // line 14
        echo twig_escape_filter($this->env, YiiTranslate("app", "fullname"), "html", null, true);
        echo "</div>
\t\t<div class=\"col-xs-2 sort-key\" data-sort=\"usergroup\">";
        // line 15
        echo twig_escape_filter($this->env, YiiTranslate("app", "type"), "html", null, true);
        echo "</div>
\t\t<div class=\"col-xs-2 sort-key\" data-sort=\"account_expires\">";
        // line 16
        echo twig_escape_filter($this->env, YiiTranslate("app", "expires"), "html", null, true);
        echo "</div>
\t\t
\t</div>
\t";
        // line 19
        echo $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "widget", array(0 => "zii.widgets.CListView", 1 => array("id" => "id-grid", "dataProvider" => $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "search"), "itemView" => "viewUserList", "afterAjaxUpdate" => "bindEvents", "template" => "{items} {pager}", "pager" => array("class" => "toxus.extensions.infiniteScroll.IasPager", "rowSelector" => ".art-row", "listViewId" => "id-grid", "header" => "", "loaderText" => ((("<img src=\"" . $this->getAttribute((isset($context["App"]) ? $context["App"] : null), "baseUrl")) . "/images/loading.gif") . "\"/ >"), "options" => array("history" => false, "triggerPageTreshold" => 10, "trigger" => "Load more"))), 2 => true), "method");
        // line 35
        echo "
</div>

<script type=\"text/javascript\">
  function bindEvents(id, result)
\t{
\t\t\$('.a-url').on('click', function() {
\t\t\twindow.location = \$(this).data('url');
\t\t});
\t\t";
        // line 44
        echo $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "getReady", array(0 => "modal-dialog"), "method");
        echo "
\t}
</script>\t

";
    }

    // line 51
    public function block_onReady($context, array $blocks = array())
    {
        // line 52
        echo "\t\$.ias['defaults']['onRenderComplete'] =  function() {bindEvents();}
  \$('.menu-users').addClass('active');
\t\$('.sort-key').on('click', function() {
\t\twindow.location = \"";
        // line 55
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "access/users", 1 => array("orderBy" => "")), "method"), "html", null, true);
        echo "\" + \$(this).data('sort');
\t});
\t";
        // line 57
        $this->displayParentBlock("onReady", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "/views/access/users.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  96 => 57,  91 => 55,  86 => 52,  83 => 51,  74 => 44,  63 => 35,  61 => 19,  55 => 16,  51 => 15,  47 => 14,  43 => 13,  39 => 12,  33 => 9,  30 => 8,  27 => 7,);
    }
}
