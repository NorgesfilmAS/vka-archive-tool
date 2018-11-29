<?php

/* /views/selection/index.twig */
class __TwigTemplate_1fec2ea658927bf2107971da52375301 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'scriptFiles' => array($this, 'block_scriptFiles'),
            'bodyTag' => array($this, 'block_bodyTag'),
            'itemMenuContent' => array($this, 'block_itemMenuContent'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "angular"), "method"));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 4
        $context["layout"] = "content";
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 6
    public function block_scriptFiles($context, array $blocks = array())
    {
        // line 7
        echo "\t";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "registerScriptFile", array(0 => array(0 => "app.js", 1 => "controllers.js", 2 => "models.js", 3 => "util.js", 4 => "dynamic-forms.js")), "method"), "html", null, true);
        // line 14
        echo "
\t";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "registerPackage", array(0 => "angularJs.sanitize.min"), "method"), "html", null, true);
        echo "
";
    }

    // line 18
    public function block_bodyTag($context, array $blocks = array())
    {
        // line 19
        echo "\t";
        $this->displayParentBlock("bodyTag", $context, $blocks);
        echo "
\tng-controller=\"SelectController\"
";
    }

    // line 23
    public function block_itemMenuContent($context, array $blocks = array())
    {
        // line 24
        echo "\t<button ng-click=\"showDialog()\" class=\"btn btn-info btn-sm\" ><span class=\"glyphicon glyphicon-plus\"></span> ";
        echo twig_escape_filter($this->env, YiiTranslate("app", "New"), "html", null, true);
        echo "</button> 
\t";
        // line 25
        $this->displayParentBlock("itemMenuContent", $context, $blocks);
        echo "
";
    }

    // line 28
    public function block_content($context, array $blocks = array())
    {
        echo "\t\t
\t<div >
\t";
        // line 30
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "flash"), "method"));
        $template->display($context);
        // line 31
        echo "\t";
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "caption"), "method"));
        $template->display($context);
        // line 32
        echo "\t";
        // line 34
        echo "\t\t
\t<div class=\"alert alert-warning\" ng-show=\"errorMessage\">{{ errorMessage }}</div>\t
\t";
        echo "
\t<h4>";
        // line 35
        echo twig_escape_filter($this->env, YiiTranslate("app", "Available reports"), "html", null, true);
        echo " </h4>
\t<div class=\"row\">
\t\t";
        // line 37
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["reports"]) ? $context["reports"] : null));
        foreach ($context['_seq'] as $context["key"] => $context["name"]) {
            // line 38
            echo "\t\t<div class=\"col-xs-8 col-xs-offset-1\">
\t\t\t<a href=\"#\" ng-click=\"reportOpen('";
            // line 39
            echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
            echo "')\">";
            echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
            echo "</a>
\t\t</div>
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['name'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 42
        echo "\t</div>

\t<div id=\"id-dialog-reportname\" class=\"modal fade\">
\t\t<form ng-submit=\"newReport()\" class=\"form-horizontal\" role=\"form\">
\t\t\t<div class=\"modal-dialog\">
\t\t\t\t<div class=\"modal-content\">
\t\t\t\t\t<div class=\"modal-header\">
\t\t\t\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"modal\"><span aria-hidden=\"true\">&times;</span><span class=\"sr-only\">";
        // line 49
        echo twig_escape_filter($this->env, YiiTranslate("button", "btn-close"), "html", null, true);
        echo "</span></button>
\t\t\t\t\t\t<h4 class=\"modal-title\">";
        // line 50
        echo twig_escape_filter($this->env, YiiTranslate("app", "Create new selection/report"), "html", null, true);
        echo "</h4>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"modal-body\">
\t\t\t\t\t\t";
        // line 55
        echo "
\t\t\t\t\t\t<div class=\"alert alert-warning\" ng-show=\"errorMessage\">{{ errorMessage }}</div>\t
\t\t\t\t\t\t";
        echo "
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"id-filename\" class=\"col-sm-4 control-label\">";
        // line 57
        echo twig_escape_filter($this->env, YiiTranslate("app", "Report name"), "html", null, true);
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-sm-8\">
\t\t\t\t\t\t\t\t<input type=\"text\" 
\t\t\t\t\t\t\t\t\t\t\t class=\"form-control\" 
\t\t\t\t\t\t\t\t\t\t\t ng-model=\"store.reportFilename\"
\t\t\t\t\t\t\t\t\t\t\t id=\"id-filename\" 
\t\t\t\t\t\t\t\t\t\t\t placeholder=\"";
        // line 63
        echo twig_escape_filter($this->env, YiiTranslate("app", "Report name"), "html", null, true);
        echo "\" 
\t\t\t\t\t\t\t\t\t\t\t required>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>\t\t\t\t\t\t
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"modal-footer\">
\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">";
        // line 69
        echo twig_escape_filter($this->env, YiiTranslate("button", "btn-close"), "html", null, true);
        echo "</button>
\t\t\t\t\t\t<button type=\"submit\" class=\"btn btn-primary\">";
        // line 70
        echo twig_escape_filter($this->env, YiiTranslate("button", "btn-create"), "html", null, true);
        echo "</button>
\t\t\t\t\t</div>
\t\t\t\t</div><!-- /.modal-content -->
\t\t\t</div><!-- /.modal-dialog -->
\t\t</form>
\t</div><!-- /.modal -->\t
\t";
        // line 76
        $this->displayParentBlock("content", $context, $blocks);
        echo "
\t</div>
";
    }

    public function getTemplateName()
    {
        return "/views/selection/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  172 => 76,  163 => 70,  159 => 69,  150 => 63,  141 => 57,  134 => 55,  128 => 50,  124 => 49,  115 => 42,  104 => 39,  101 => 38,  97 => 37,  92 => 35,  86 => 34,  84 => 32,  80 => 31,  77 => 30,  71 => 28,  65 => 25,  60 => 24,  57 => 23,  49 => 19,  46 => 18,  40 => 15,  37 => 14,  34 => 7,  31 => 6,  26 => 4,);
    }
}
