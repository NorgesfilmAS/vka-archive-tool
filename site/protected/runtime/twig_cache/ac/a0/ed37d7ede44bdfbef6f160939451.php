<?php

/* /views/layouts/logging.twig */
class __TwigTemplate_aca0ed37d7ede44bdfbef6f160939451 extends Twig_Template
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
        return $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "viewForm"), "method"));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "caption"), "method"));
        $template->display($context);
        // line 5
        echo "
<div id=\"scroll\" class=\"bs-content\">
\t<div class=\"row grid-header\">
\t\t<div class=\"col-sm-3 sort-key\" data-sort=\"id\">";
        // line 8
        echo twig_escape_filter($this->env, YiiTranslate("app", "date"), "html", null, true);
        echo "</div>
\t\t<div class=\"col-sm-2 sort-key\" data-sort=\"title\">";
        // line 9
        echo twig_escape_filter($this->env, YiiTranslate("app", "user"), "html", null, true);
        echo "</div>
\t\t<div class=\"col-sm-1 sort-key\" data-sort=\"title\">";
        // line 10
        echo twig_escape_filter($this->env, YiiTranslate("app", "action"), "html", null, true);
        echo "</div>
\t\t<div class=\"col-sm-6 sort-key\" data-sort=\"title\">";
        // line 11
        echo twig_escape_filter($this->env, YiiTranslate("app", "fields"), "html", null, true);
        echo "</div>
\t</div>
\t<div class=\"row no-horz-margin\">
\t";
        // line 14
        echo $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "widget", array(0 => "zii.widgets.CListView", 1 => array("id" => "id-grid", "dataProvider" => $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "logging"), "itemView" => "loggingList", "afterAjaxUpdate" => "bindEvents", "template" => "{items}{pager}", "pager" => array("class" => "toxus.extensions.infiniteScroll.IasPager", "pageSize" => 20, "rowSelector" => ".art-row", "listViewId" => "id-grid", "header" => "", "loaderText" => ((("<img src=\"" . $this->getAttribute((isset($context["App"]) ? $context["App"] : null), "baseUrl")) . "/images/loading.gif") . "\"/ >"), "options" => array("history" => false, "triggerPageTreshold" => 10, "trigger" => "Load more", "thresholdMargin" => (-200)))), 2 => true), "method");
        // line 31
        echo "\t\t\t
\t</div>\t\t
\t\t";
        // line 33
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "onReady", array(0 => "
\t\$.ias['defaults']['onRenderComplete'] =  function() {bindEvents();}
\t\$('.sort-key').on('click', function() {
\t\t\$('.id-sort').val(\$(this).data('sort'));
\t\t\$('.id-search').submit();
\t})
"), "method"), "html", null, true);
        // line 39
        echo "\t
\t\t
<script type=\"text/javascript\">
  function bindEvents(id, result)
\t{
\t\t\$('.menu-modal').on('click', function() {
\t\t\t";
        // line 46
        echo "\t\t\tdiv = \$(this).data(\"div\");
\t\t\tif (div) {
\t\t\t\t\$(div + \" .modal-content\").html(\$(\"#id-wait-message\").html());
\t\t\t\t\$(div).modal(\"show\"); \t\t\t\t\t\t\t
\t\t\t\t\$(div + \" .modal-content\").load(\$(this).data(\"url\"));
\t\t\t} else {
\t\t\t\t\$(\"#id-modal-body\").html(\$(\"#id-wait-message\").html());
\t\t\t\t\$(\"#id-modal\").modal(\"show\"); \t\t\t\t\t\t\t
\t\t\t\t\$(\"#id-modal-body\").load(\$(this).data(\"url\"));\t\t\t\t\t\t\t
\t\t\t}
\t\t});
\t}

</script>\t
</div>\t\t
";
    }

    public function getTemplateName()
    {
        return "/views/layouts/logging.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 46,  69 => 39,  61 => 33,  57 => 31,  55 => 14,  49 => 11,  45 => 10,  41 => 9,  37 => 8,  32 => 5,  29 => 4,  26 => 3,);
    }
}
