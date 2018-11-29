<?php

/* /views/art/related.twig */
class __TwigTemplate_48c06d76242437e8033748917a7c8bb5 extends Twig_Template
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

    // line 4
    public function block_content($context, array $blocks = array())
    {
        // line 5
        echo "<div class=\"pnek\">
";
        // line 6
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "caption"), "method"));
        $template->display($context);
        // line 7
        echo "
<div class=\"bs-content\">
\t";
        // line 9
        if ($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "hasErrors", array(), "method")) {
            // line 10
            echo "\t<div class=\"row\">
\t\t<div class=\"col-sm-10 col-sm-offset-2 alert alert-danger\">\t\t\t
\t\t\t";
            // line 12
            echo $this->getAttribute((isset($context["html"]) ? $context["html"] : null), "errorSummary", array(0 => $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model")), "method");
            echo "
\t\t</div>
\t</div>
\t";
        }
        // line 16
        echo "\t<div class=\"bs-content\">
\t";
        // line 17
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "relatedArt"));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["id"] => $context["art"]) {
            // line 18
            echo "\t\t<div class=\"col-sm-4\">
\t\t\t<div class=\"panel panel-default panel-top panel-fix-height-art\" >
\t\t\t\t<div class=\"panel-heading\">
\t\t\t\t\t<h3 class=\"panel-title\">
\t\t\t\t\t\t<div class=\"pull-right btn-group\" style=\"right: -13px;\">
\t\t\t\t\t\t\t<button href=\"#\" class=\"btn btn-default btn-xs dropdown-toggle btn-dim\" data-toggle=\"dropdown\"><span class=\"caret\"></span></button>
\t\t\t\t\t\t\t<ul class=\"dropdown-menu dropdown-menu-small\">
\t\t\t\t\t\t\t\t<li><a href=\"";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "art/view", 1 => array("id" => $this->getAttribute((isset($context["art"]) ? $context["art"] : null), "id"))), "method"), "html", null, true);
            echo "\" >";
            echo twig_escape_filter($this->env, YiiTranslate("app", "Goto"), "html", null, true);
            echo "</a></li>
\t\t\t\t\t\t\t\t";
            // line 26
            if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["art"]) ? $context["art"] : null), "model"), "agents")) > 0)) {
                // line 27
                echo "\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t";
                // line 28
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "agents"));
                foreach ($context['_seq'] as $context["id"] => $context["name"]) {
                    // line 29
                    echo "\t\t\t\t\t\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
                    echo " <a href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "agent/view", 1 => array("id" => (isset($context["id"]) ? $context["id"] : null))), "method"), "html", null, true);
                    echo "\"><span class=\"glyphicon glyphicon-link\"></span></a><br />
\t\t\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['id'], $context['name'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 31
                echo "\t\t\t\t\t\t\t\t";
            }
            // line 32
            echo "\t\t\t\t\t\t\t\t<li><a id=\"btn-alt-dele-";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["altFile"]) ? $context["altFile"] : null), "id"), "html", null, true);
            echo "\" class=\"id-delete\"  href=\"#\" data-url=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "art/relatedRemove", 1 => array("id" => (isset($context["id"]) ? $context["id"] : null), "parent" => $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "id"))), "method"), "html", null, true);
            echo "\" data-confirm=\"";
            echo twig_escape_filter($this->env, YiiTranslate("app", "Do you want to remove the relation with {title}?", array("{title}" => $this->getAttribute((isset($context["art"]) ? $context["art"] : null), "title"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, YiiTranslate("button", "btn-remove"), "html", null, true);
            echo "</a></li>\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t<span class=\"a-url\" data-url=\"";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "art/view", 1 => array("id" => $this->getAttribute((isset($context["art"]) ? $context["art"] : null), "id"))), "method"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["art"]) ? $context["art"] : null), "title"), "html", null, true);
            echo "</span>
\t\t\t\t\t</h3>
\t\t\t\t</div>\t
\t\t\t\t<div class=\"panel-body a-url\" data-url=\"";
            // line 38
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "art/view", 1 => array("id" => $this->getAttribute((isset($context["art"]) ? $context["art"] : null), "id"))), "method"), "html", null, true);
            echo "\">\t\t\t\t\t\t
\t\t\t\t\t";
            // line 39
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["art"]) ? $context["art"] : null), "agent"), "html", null, true);
            echo "<span class=\"pull-right\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["art"]) ? $context["art"] : null), "year"), "html", null, true);
            echo "</span>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 44
            echo "\t\t<h5>";
            echo twig_escape_filter($this->env, YiiTranslate("app", "There are no related art works"), "html", null, true);
            echo "</h5>\t
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['id'], $context['art'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 45
        echo "\t
\t</div>\t\t
</div>\t
</div>

";
    }

    // line 52
    public function block_onReady($context, array $blocks = array())
    {
        // line 53
        echo "\t\$('.id-delete').on('click', function() {
\t\tmsg = \$(this).data('confirm');
\t\tif (msg && !confirm(msg)) {
\t\t\treturn; 
\t\t}
\t\twindow.location = \$(this).data('url');
\t});
\t";
        // line 60
        $this->displayParentBlock("onReady", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "/views/art/related.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  166 => 60,  157 => 53,  154 => 52,  145 => 45,  136 => 44,  124 => 39,  120 => 38,  112 => 35,  99 => 32,  96 => 31,  85 => 29,  81 => 28,  78 => 27,  76 => 26,  70 => 25,  61 => 18,  56 => 17,  53 => 16,  46 => 12,  42 => 10,  40 => 9,  36 => 7,  33 => 6,  30 => 5,  27 => 4,);
    }
}
