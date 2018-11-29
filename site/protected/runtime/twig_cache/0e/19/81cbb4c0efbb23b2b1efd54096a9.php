<?php

/* /views/job/done.twig */
class __TwigTemplate_0e1981cbb4c0efbb23b2b1efd54096a9 extends Twig_Template
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
        echo twig_escape_filter($this->env, YiiTranslate("app", "Jobs done"), "html", null, true);
        echo "</h2>
\t
\t<div class=\"row grid-header\">
\t\t<div class=\"col-xs-1 text-right sort-key\" data-sort=\"id\">";
        // line 12
        echo twig_escape_filter($this->env, YiiTranslate("app", "id"), "html", null, true);
        echo "</div>
\t\t<div class=\"col-xs-1\"></div>
\t\t<div class=\"col-xs-4 sort-key\" data-sort=\"title\">";
        // line 14
        echo twig_escape_filter($this->env, YiiTranslate("app", "title"), "html", null, true);
        echo "</div>
\t\t<div class=\"col-xs-1 text-right sort-key\" data-sort=\"priority\">";
        // line 15
        echo twig_escape_filter($this->env, YiiTranslate("app", "priorty"), "html", null, true);
        echo "</div>
\t\t<div class=\"col-xs-3 sort-key\" data-sort=\"artist\">";
        // line 16
        echo twig_escape_filter($this->env, YiiTranslate("app", "ended"), "html", null, true);
        echo "</div>
\t\t<div class=\"col-xs-1\" data-sort=\"\">";
        // line 17
        echo twig_escape_filter($this->env, YiiTranslate("app", "status"), "html", null, true);
        echo "</div>
\t</div>
\t";
        // line 19
        echo $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "widget", array(0 => "zii.widgets.CListView", 1 => array("id" => "id-grid", "dataProvider" => $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "doneJobs"), "itemView" => "viewJobDoneList", "template" => "{items} {pager}", "pager" => array("class" => "toxus.extensions.infiniteScroll.IasPager", "rowSelector" => ".art-row", "listViewId" => "id-grid", "header" => "", "loaderText" => ((("<img src=\"" . $this->getAttribute((isset($context["App"]) ? $context["App"] : null), "baseUrl")) . "/images/loading.gif") . "\"/ >"), "options" => array("history" => false, "triggerPageTreshold" => 10, "trigger" => "Load more"))), 2 => true), "method");
        // line 34
        echo "\t\t\t
</div>
<script type=\"text/javascript\">

  function bindEvents(id, result)
\t{
\t\t\$('.menu-modal').on('click', function() {
\t\t\t";
        // line 42
        echo "\t\t\t\t\t\t\$(\".menu-modal\").on(\"click\", function() {
\t\t\t\t\t\t\tdiv = \$(this).data(\"div\");
\t\t\t\t\t\t\tif (div) {
\t\t\t\t\t\t\t\t\$(div + \" .modal-content\").html(\$(\"#id-wait-message\").html());
\t\t\t\t\t\t\t\t\$(div).modal(\"show\"); \t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\$(div + \" .modal-content\").load(\$(this).data(\"url\"));
\t\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\t\$(\"#id-modal-body\").html(\$(\"#id-wait-message\").html());
\t\t\t\t\t\t\t\t\$(\"#id-modal\").modal(\"show\"); \t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\$(\"#id-modal-body\").load(\$(this).data(\"url\"));\t\t\t\t\t\t\t
\t\t\t\t\t\t\t}
\t\t\t\t\t});
\t\t});
\t}

</script>\t

";
    }

    // line 62
    public function block_onReady($context, array $blocks = array())
    {
        // line 63
        echo "  console.log('xx');
\t\$.ias['defaults']['onRenderComplete'] = function() {
\t\tbindEvents();
\t}
  \$('.menu-done').addClass('active');
\t";
        // line 68
        $this->displayParentBlock("onReady", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "/views/job/done.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 68,  96 => 63,  93 => 62,  72 => 42,  63 => 34,  61 => 19,  56 => 17,  52 => 16,  48 => 15,  44 => 14,  39 => 12,  33 => 9,  30 => 8,  27 => 7,);
    }
}
