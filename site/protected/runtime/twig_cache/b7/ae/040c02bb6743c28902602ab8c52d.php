<?php

/* /views/site/search.twig */
class __TwigTemplate_b7ae040c02bb6743c28902602ab8c52d extends Twig_Template
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

    // line 13
    public function block_content($context, array $blocks = array())
    {
        // line 14
        echo "\t";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["agents"]) ? $context["agents"] : null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["agent"]) {
            // line 15
            echo "\t\t";
            if ($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "first")) {
                // line 16
                echo "\t\t<div class=\"bs-content row pnek-found-agent\">
\t\t\t<div class=\"row bs-page-header no-padding \" style=\"position:relative;\" >
\t\t\t\t\t<div class=\"col-xs-2 id-marker2 id-marker text-center\">
\t\t\t\t\t\tArtist
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-xs-2\">&nbsp;</div>
\t\t\t\t\t<div class=\"col-xs-10 no-right-padding info-text\"></div>
\t\t\t</div>\t\t\t\t\t\t
\t\t\t<div class=\"row\">
\t\t";
            }
            // line 26
            echo "\t\t\t\t<div class=\"col-xs-4\">
\t\t\t\t\t<div class=\"search-agent-link\">
\t\t\t\t\t\t<a href=\"";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "agent/view", 1 => array("id" => $this->getAttribute((isset($context["agent"]) ? $context["agent"] : null), "id"))), "method"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["agent"]) ? $context["agent"] : null), "name"), "html", null, true);
            echo "</a>
\t\t\t\t\t</div>
\t\t\t\t</div>\t\t
\t\t\t";
            // line 31
            if ((($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index0") % 3) == 2)) {
                echo "\t
\t\t\t</div>\t
\t\t\t<div class=\"row\"> 
\t\t\t";
            }
            // line 35
            echo "\t\t\t\t
\t\t";
            // line 36
            if ($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "last")) {
                // line 37
                echo "\t\t\t</div>\t
\t\t</div>\t\t\t
\t\t
\t\t";
            }
            // line 40
            echo "\t 
\t";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['agent'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 41
        echo "\t\t


<div id=\"scroll\" class=\"bs-content row\">
\t<div class=\"row bs-page-header\" style=\"position:relative; margin-top:20px; \" >
\t\t<div class=\"col-xs-2 id-marker2 id-marker text-center\">
\t\t\tArtwork
\t\t</div>
\t\t<div class=\"col-xs-2\">&nbsp;</div>
\t\t<div class=\"col-xs-10 no-right-padding info-text\"></div>
\t</div>\t\t\t

\t";
        // line 54
        echo "\t";
        if (((isset($context["layout"]) ? $context["layout"] : null) == "tiles")) {
            // line 55
            echo "\t
\t\t";
            // line 56
            $context["rowIndex"] = 0;
            // line 57
            echo "\t\t";
            echo $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "widget", array(0 => "zii.widgets.CListView", 1 => array("id" => "id-grid", "dataProvider" => $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "search"), "itemView" => "viewArtSmall", "afterAjaxUpdate" => "bindEvents", "template" => "{items} {pager}", "pager" => array("class" => "toxus.extensions.infiniteScroll.IasPager", "rowSelector" => ".art-row", "itemsSelector" => "#id-grid", "listViewId" => "id-grid", "header" => "", "loaderText" => ((("<img src=\"" . $this->getAttribute((isset($context["App"]) ? $context["App"] : null), "baseUrl")) . "/images/loading.gif") . "\"/ >"), "options" => array("history" => false, "triggerPageTreshold" => 21, "trigger" => "Load more"))), 2 => true), "method");
            // line 74
            echo "\t
\t\t";
            // line 75
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "onReady", array(0 => "\$.ias['defaults']['onRenderComplete'] =  function() {bindEvents();}"), "method"), "html", null, true);
            echo "
\t";
        } else {
            // line 76
            echo " 
\t\t<div class=\"row grid-header\">
\t\t\t<div class=\"col-xs-1 \" data-sort=\"img\"></div>
\t\t\t<div class=\"col-xs-1 text-right sort-key\" data-sort=\"id\">";
            // line 79
            echo twig_escape_filter($this->env, YiiTranslate("app", "id"), "html", null, true);
            echo "</div>
\t\t\t<div class=\"col-xs-3 sort-key\" data-sort=\"title\">";
            // line 80
            echo twig_escape_filter($this->env, YiiTranslate("app", "title"), "html", null, true);
            echo "</div>
\t\t\t<div class=\"col-xs-1 text-right sort-key\" data-sort=\"year\">";
            // line 81
            echo twig_escape_filter($this->env, YiiTranslate("app", "year"), "html", null, true);
            echo "</div>
\t\t\t<div class=\"col-xs-3 sort-key\" data-sort=\"artist\">";
            // line 82
            echo twig_escape_filter($this->env, YiiTranslate("app", "artist"), "html", null, true);
            echo "</div>
\t\t\t<div class=\"col-xs-1\">";
            // line 83
            echo twig_escape_filter($this->env, YiiTranslate("app", "type"), "html", null, true);
            echo "</div>
\t\t\t<div class=\"col-xs-1\">";
            // line 84
            echo twig_escape_filter($this->env, YiiTranslate("app", "format"), "html", null, true);
            echo "</div>
\t\t\t<div class=\"col-xs-1 text-right\">";
            // line 85
            echo twig_escape_filter($this->env, YiiTranslate("app", "length"), "html", null, true);
            echo "</div>
\t\t</div>
\t\t";
            // line 87
            echo $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "widget", array(0 => "zii.widgets.CListView", 1 => array("id" => "id-grid", "dataProvider" => $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "search"), "itemView" => "viewArtList", "afterAjaxUpdate" => "bindEvents", "template" => "{items} {pager}", "pager" => array("class" => "toxus.extensions.infiniteScroll.IasPager", "pageSize" => 21, "rowSelector" => ".art-row", "listViewId" => "id-grid", "header" => "", "loaderText" => ((("<img src=\"" . $this->getAttribute((isset($context["App"]) ? $context["App"] : null), "baseUrl")) . "/images/loading.gif") . "\"/ >"), "options" => array("history" => false, "triggerPageTreshold" => 21, "trigger" => "Load more", "thresholdMargin" => (-200)))), 2 => true), "method");
            // line 104
            echo "\t\t\t
\t\t";
            // line 105
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "onReady", array(0 => "
\t\$.ias['defaults']['onRenderComplete'] =  function() {bindEvents();}
\t\$('.sort-key').on('click', function() {
\t\t\$('.id-sort').val(\$(this).data('sort'));
\t\t\$('.id-search').submit();
\t})
"), "method"), "html", null, true);
            // line 111
            echo "\t
\t\t
\t";
        }
        // line 114
        echo "\t\t
<script type=\"text/javascript\">
\t// console.log('We are');
  function bindEvents(id, result)
\t{
\t//\tconsole.log('binding');
\t\t\$('.a-url').on('click', function() {
\t\t\twindow.location = \$(this).data('url');
\t\t});
\t\t";
        // line 123
        echo $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "getReady", array(0 => "modal-dialog"), "method");
        echo "
\t}
\t//console.log('start binding');
\tbindEvents();\t
</script>\t
</div>\t\t
";
    }

    public function getTemplateName()
    {
        return "/views/site/search.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  222 => 123,  211 => 114,  206 => 111,  198 => 105,  195 => 104,  193 => 87,  188 => 85,  184 => 84,  180 => 83,  176 => 82,  172 => 81,  168 => 80,  164 => 79,  159 => 76,  154 => 75,  151 => 74,  148 => 57,  146 => 56,  143 => 55,  140 => 54,  126 => 41,  111 => 40,  105 => 37,  103 => 36,  100 => 35,  93 => 31,  85 => 28,  81 => 26,  69 => 16,  66 => 15,  48 => 14,  45 => 13,  39 => 8,  36 => 7,  31 => 4,  28 => 3,);
    }
}
