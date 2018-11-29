<?php

/* /views/logging/list.twig */
class __TwigTemplate_f15aadac0df36d63d924eecff6fea679 extends Twig_Template
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

    // line 8
    public function block_content($context, array $blocks = array())
    {
        // line 9
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "caption"), "method"));
        $template->display($context);
        // line 10
        echo "
<div class=\"bs-content\">
\t";
        // line 12
        echo "\t\t
\t";
        // line 13
        if ($this->getAttribute((isset($context["model"]) ? $context["model"] : null), "hasErrors", array(), "method")) {
            // line 14
            echo "\t<div class=\"row\">
\t\t<div class=\"col-lg-10 col-offset-2 alert alert-danger\">\t\t\t
\t\t\t";
            // line 16
            echo $this->getAttribute((isset($context["html"]) ? $context["html"] : null), "errorSummary", array(0 => (isset($context["model"]) ? $context["model"] : null)), "method");
            echo "
\t\t</div>
\t</div>
\t";
        }
        // line 19
        echo "\t
\t<form id=\"id-filter\"> \t
\t\t<input id=\"id-order-by\" type=\"hidden\" name=\"Logging[orderBy]\" value=\"date\"/>
\t\t<div class=\"row grid-header\">\t\t
\t\t\t<div class=\"col-sm-2 sort-key\" data-sort=\"date\">";
        // line 23
        echo twig_escape_filter($this->env, YiiTranslate("app", "date"), "html", null, true);
        echo "</div>
\t\t\t<div class=\"col-sm-1 sort-key\" data-sort=\"action\">";
        // line 24
        echo twig_escape_filter($this->env, YiiTranslate("app", "action"), "html", null, true);
        echo "</div>
\t\t\t<div class=\"col-sm-1 text-right sort-key\" data-sort=\"id\">";
        // line 25
        echo twig_escape_filter($this->env, YiiTranslate("app", "id"), "html", null, true);
        echo "</div>
\t\t\t<div class=\"col-sm-3 sort-key\" data-sort=\"explain\">";
        // line 26
        echo twig_escape_filter($this->env, YiiTranslate("app", "explain"), "html", null, true);
        echo "</div>
\t\t\t<div class=\"col-sm-2 sort-key\" data-sort=\"user\">";
        // line 27
        echo twig_escape_filter($this->env, YiiTranslate("app", "user"), "html", null, true);
        echo "</div>
\t\t\t<div class=\"col-sm-3 sort-keyXX\" data-sort=\"fields\">";
        // line 28
        echo twig_escape_filter($this->env, YiiTranslate("app", "fields"), "html", null, true);
        echo "</div>
\t\t</div>
\t\t<div class=\"row grid-header\">\t\t
\t\t\t<div class=\"col-sm-2 \" ><input type=\"date\" name=\"Logging[date]\" value=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "date"), "html", null, true);
        echo "\" style=\"width:100%\"/></div>
\t\t\t<div class=\"col-sm-2 \" >
\t\t\t\t<select name=\"Logging[action]\" style=\"width:100%\" class=\"trig-change\">
\t\t\t\t\t<option value=\"\"></option>
\t\t\t\t";
        // line 35
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "loggingTypes"));
        foreach ($context['_seq'] as $context["_key"] => $context["type"]) {
            // line 36
            echo "\t\t\t\t\t<option value=\"";
            echo twig_escape_filter($this->env, (isset($context["type"]) ? $context["type"] : null), "html", null, true);
            echo "\" ";
            if (($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "action") == (isset($context["type"]) ? $context["type"] : null))) {
                echo "selected=\"selected\"";
            }
            echo " >";
            echo twig_escape_filter($this->env, YiiTranslate("app", "log-{type}", array("{type}" => (isset($context["type"]) ? $context["type"] : null))), "html", null, true);
            echo "</option>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['type'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 37
        echo "\t
\t\t\t\t</select>\t\t
\t\t\t</div>
\t\t\t<div class=\"col-sm-3 \" ><input type=\"text\" name=\"Logging[explain]\" value=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "title"), "html", null, true);
        echo "\" style=\"width:100%\" class=\"trig-change\"/></div>
\t\t\t<div class=\"col-sm-2 \" >
\t\t\t\t<select name=\"Logging[user]\" style=\"width:100%\" class=\"trig-change\">
\t\t\t\t\t<option value=\"\"></option>
\t\t\t\t";
        // line 44
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "users"));
        foreach ($context['_seq'] as $context["userId"] => $context["userName"]) {
            // line 45
            echo "\t\t\t\t\t<option value=\"";
            echo twig_escape_filter($this->env, (isset($context["userId"]) ? $context["userId"] : null), "html", null, true);
            echo "\" ";
            if (($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "user") == (isset($context["userId"]) ? $context["userId"] : null))) {
                echo "selected=\"selected\"";
            }
            echo ">";
            echo twig_escape_filter($this->env, (isset($context["userName"]) ? $context["userName"] : null), "html", null, true);
            echo "</option>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['userId'], $context['userName'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 46
        echo "\t
\t\t\t\t</select>\t\t\t\t\t\t
\t\t\t</div>
\t\t\t<div class=\"col-sm-3 \" ></div>
\t\t</div>
\t\t<div class=\"id-grid\">
\t\t
\t\t";
        // line 53
        echo $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "widget", array(0 => "BootstrapListView", 1 => array("id" => "id-grid", "dataProvider" => $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "entries"), "itemView" => "loggingRow", "viewData" => array("url" => $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "art/logging"), "method"))), 2 => true), "method");
        // line 60
        echo "\t
\t\t</div>\t
\t</form>\t\t
</div>
";
    }

    // line 67
    public function block_onReady($context, array $blocks = array())
    {
        // line 68
        echo "  ";
        if ((isset($context["menuItem"]) ? $context["menuItem"] : null)) {
            // line 69
            echo "\t\t\$('";
            echo twig_escape_filter($this->env, (isset($context["menuItem"]) ? $context["menuItem"] : null), "html", null, true);
            echo "').addClass('active');
\t";
        }
        // line 70
        echo "\t
\t\$('.sort-key').on('click', function() {
\t\t\$('#id-order-by').val(\$(this).data('sort'));
\t\t\$('#id-filter').submit();
\t})\t\t
\t\$('.trig-change').on('change', function() {
\t\t\$('#id-filter').submit();
\t});
\t";
        // line 78
        $this->displayParentBlock("onReady", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "/views/logging/list.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  183 => 78,  173 => 70,  167 => 69,  164 => 68,  161 => 67,  153 => 60,  151 => 53,  142 => 46,  127 => 45,  123 => 44,  116 => 40,  111 => 37,  96 => 36,  92 => 35,  85 => 31,  79 => 28,  75 => 27,  71 => 26,  67 => 25,  63 => 24,  59 => 23,  53 => 19,  46 => 16,  42 => 14,  40 => 13,  37 => 12,  33 => 10,  30 => 9,  27 => 8,);
    }
}
