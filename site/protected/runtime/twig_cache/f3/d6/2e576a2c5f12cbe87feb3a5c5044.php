<?php

/* /views/site/lastDigitized.twig */
class __TwigTemplate_f3d62e576a2c5f12cbe87feb3a5c5044 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'itemMenuHeader' => array($this, 'block_itemMenuHeader'),
            'itemMenuFooter' => array($this, 'block_itemMenuFooter'),
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

    // line 3
    public function block_itemMenuHeader($context, array $blocks = array())
    {
        // line 4
        echo "<div class=\"search-spacer\"></div>
";
    }

    // line 7
    public function block_itemMenuFooter($context, array $blocks = array())
    {
        // line 8
        echo "\t";
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "search-layout"), "method"));
        $template->display($context);
    }

    // line 11
    public function block_content($context, array $blocks = array())
    {
        // line 12
        echo "\t
<div id=\"scroll\" class=\"bs-content row\">
\t<div class=\"row bs-page-header\" style=\"position:relative; margin-top:20px; \" >
\t\t<div class=\"col-xs-2 id-marker2 id-marker text-center\" style=\"width:180px;\">
\t\t\t";
        // line 16
        echo twig_escape_filter($this->env, YiiTranslate("app", "Latest Videos"), "html", null, true);
        echo "
\t\t</div>
\t\t<div class=\"col-xs-2\">&nbsp;</div>
\t\t<div class=\"col-xs-10 no-right-padding info-text\"></div>
\t</div>\t\t\t

\t";
        // line 23
        echo "\t";
        echo $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "widget", array(0 => "zii.widgets.CListView", 1 => array("id" => "id-grid", "dataProvider" => $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "searchLastDigitized"), "itemView" => "viewArtSmall", "afterAjaxUpdate" => "bindEvents", "template" => "{items} {pager}", "pager" => array("class" => "toxus.extensions.infiniteScroll.IasPager", "rowSelector" => ".art-row", "itemsSelector" => "#id-grid", "listViewId" => "id-grid", "header" => "", "loaderText" => ((("<img src=\"" . $this->getAttribute((isset($context["App"]) ? $context["App"] : null), "baseUrl")) . "/images/loading.gif") . "\"/ >"), "options" => array("history" => false, "triggerPageTreshold" => 21, "trigger" => "Load more"))), 2 => true), "method");
        // line 40
        echo "\t
\t";
        // line 41
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "onReady", array(0 => "\$.ias['defaults']['onRenderComplete'] =  function() {bindEvents();}"), "method"), "html", null, true);
        echo "
\t\t
\t<script type=\"text/javascript\">
\t\t console.log('We are');
\t\tfunction bindEvents(id, result)
\t\t{
\t\t\tconsole.log('binding');
\t\t\t\$('.a-url').on('click', function() {
\t\t\t\twindow.location = \$(this).data('url');
\t\t\t});
\t\t\t";
        // line 51
        echo $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "getReady", array(0 => "modal-dialog"), "method");
        echo "
\t\t}
\t\tconsole.log('start binding');
\t\tbindEvents();\t
\t</script>\t
</div>\t\t
";
    }

    public function getTemplateName()
    {
        return "/views/site/lastDigitized.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 51,  69 => 41,  66 => 40,  63 => 23,  54 => 16,  48 => 12,  45 => 11,  39 => 8,  36 => 7,  31 => 4,  28 => 3,);
    }
}
