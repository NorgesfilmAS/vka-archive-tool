<?php

/* /views/selection/preview.twig */
class __TwigTemplate_fb4d9ebf08b2a8572f43975514533a4d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'scriptFiles' => array($this, 'block_scriptFiles'),
            'itemMenuHeader' => array($this, 'block_itemMenuHeader'),
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
        // line 2
        $context["layout"] = "content";
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_scriptFiles($context, array $blocks = array())
    {
        // line 6
        echo "<script type=\"text/javascript\">
\tvar collections = ";
        // line 7
        echo twig_jsonencode_filter((isset($context["collections"]) ? $context["collections"] : null));
        echo ";
</script>
\t ";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "registerScriptFile", array(0 => array(0 => "app.js", 1 => "controllers.js", 2 => "models.js", 3 => "util.js", 4 => "dynamic-forms.js")), "method"), "html", null, true);
        // line 16
        echo "
";
    }

    // line 20
    public function block_itemMenuHeader($context, array $blocks = array())
    {
        // line 21
        echo "\t\t<button ng-hide=\"designState\"  
\t\t\t\t\t\tng-click=\"designState= ! designState\" 
\t\t\t\t\t\tclass=\"btn btn-info btn-sm\" >
\t\t\t<span class=\"glyphicon glyphicon-pencil\"></span>
\t\t\t";
        // line 25
        echo twig_escape_filter($this->env, YiiTranslate("button", "btn-design"), "html", null, true);
        echo "
\t\t</button> \t\t\t
\t\t<button ng-show=\"designState\" 
\t\t\t\t\t\tng-click=\"designState= ! designState\" 
\t\t\t\t\t\tclass=\"btn btn-info btn-sm\" >
\t\t\t<span class=\"glyphicon glyphicon-pencil\"></span> 
\t\t\t";
        // line 31
        echo twig_escape_filter($this->env, YiiTranslate("button", "btn-preview"), "html", null, true);
        echo "
\t\t</button> 
\t\t<button ng-click=\"reportSave()\" 
\t\t\t\t\t\tng-show=\"designState\"
\t\t\t\t\t\tclass=\"btn btn-info btn-sm pull-right\">
\t\t\t";
        // line 36
        echo twig_escape_filter($this->env, YiiTranslate("button", "btn-save"), "html", null, true);
        echo "
\t\t</button>
\t\t<span ng-show=\"designState\" class=\"pull-right\">&nbsp;</span>
\t\t<button ng-click=\"reportDelete()\" 
\t\t\t\t\t\tng-show=\"designState\"
\t\t\t\t\t\tclass=\"btn btn-info btn-sm pull-right\">
\t\t\t";
        // line 42
        echo twig_escape_filter($this->env, YiiTranslate("button", "btn-delete"), "html", null, true);
        echo "
\t\t</button> 
\t\t<button ng-click=\"reportExport()\" 
\t\t\t\t\t\tng-hide=\"designState\"
\t\t\t\t\t\tng-disabled=\"canExport==false\"
\t\t\t\t\t\tclass=\"btn btn-info btn-sm pull-right\">
\t\t\t";
        // line 48
        echo twig_escape_filter($this->env, YiiTranslate("button", "btn-export"), "html", null, true);
        echo "
\t\t</button> \t\t
";
    }

    // line 52
    public function block_bodyTag($context, array $blocks = array())
    {
        // line 53
        echo "\tng-controller=\"SelectController\"
\t";
        // line 54
        $this->displayParentBlock("bodyTag", $context, $blocks);
        echo "
";
    }

    // line 58
    public function block_itemMenuContent($context, array $blocks = array())
    {
        // line 106
        echo "
\t<div class=\"row\">
\t\t<div class=\"col-xs-10 col-xs-offset-1\">
\t\t\t<div class=\"row select-fields\">
\t\t\t\t<div class=\"col-xs-6 menu\" 
\t\t\t\t\t\t ng-class=\"{active : navState=='select'}\"
\t\t\t\t\t\t ng-click=\"navState='select'\"
\t\t\t\t\t\t >
\t\t\t\t\tSelection
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<form ng-submit=\"submit()\">\t
\t\t\t\t<div ng-show=\"navState=='select'\">\t
\t\t\t\t\t<div class=\"control-group\" 
\t\t\t\t\t\t\t ng-repeat=\"element in queryFields\">
\t\t\t\t\t\t<div class=\"row select-field\">
\t\t\t\t\t\t\t<h4>{{ element.label }}</h4>
\t\t\t\t\t\t\t<div class=\"controls\" ng-switch=\"element.type\">
\t\t\t\t\t\t\t\t<div ng-switch-when=\"text\" >
\t\t\t\t\t\t\t\t\t<input type=\"text\" 
\t\t\t\t\t\t\t\t\t\t\t\t class=\"form-control\" 
\t\t\t\t\t\t\t\t\t\t\t\t ng-model=\"queryFields[\$index].value\" 
\t\t\t\t\t\t\t\t\t\t\t\t ng-required=\"element.required\" />
\t\t\t\t\t\t\t\t</div>\t
\t\t\t\t\t\t\t\t<div ng-switch-when=\"dropdown\"> 
\t\t\t\t\t\t\t\t\t<select class=\"form-control\" 
\t\t\t\t\t\t\t\t\t\t\t\t\tng-model=\"queryFields[\$index].value\" 
\t\t\t\t\t\t\t\t\t\t\t\t\tng-required=\"element.required\" >
\t\t\t\t\t\t\t\t\t\t<option value=\"{{ data.id }}\" ng-repeat=\"data in element.data\" ng-attr-selected=\"element.value==data.id\" >{{ data.label }}</option>
\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>\t\t\t
\t\t\t\t\t</div>\t
\t\t\t\t</div>
\t\t\t\t<div class=\"row select-field\">
\t\t\t\t\t<h5>&nbsp;</h5>
\t\t\t\t\t<div class=\"control-group\"> 
\t\t\t\t\t\t<div class=\"controls\">
\t\t\t\t\t\t<input type=\"submit\" class=\"btn btn-info\" value=\"Run selection\" />
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>\t\t\t\t\t
\t\t\t\t</div>\t
\t\t\t</form>\t\t\t\t
\t\t</div>\t
\t</div>

";
        echo "

";
    }

    // line 110
    public function block_content($context, array $blocks = array())
    {
        // line 111
        echo "\t";
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "caption"), "method"));
        $template->display($context);
        // line 112
        echo "\t";
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "flash"), "method"));
        $template->display($context);
        echo "\t
\t
\t";
        // line 118
        echo "
\t<div class=\"alert alert-warning\" ng-show=\"errorMessage\">{{ errorMessage }}</div>\t
\t<div ng-bind-html=\"reportData\" ng-hide=\"designState\"></div>
\t<div ng-show=\"designState\" >\t
\t";
        echo "
\t\t";
        // line 119
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "designer", 1 => array("extension" => ".html")), "method"));
        $template->display($context);
        echo "\t
\t";
        // line 122
        echo "\t
\t</div>\t
\t";
        echo "
\t<div ng-show=\"showWait==1\" style=\"margin-top:300px\"
       class=\"waiting\"><img src=\"";
        // line 124
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["App"]) ? $context["App"] : null), "baseUrl"), "html", null, true);
        echo "/images/loading4.gif\"/>
  </div>

\t";
        // line 127
        $this->displayParentBlock("content", $context, $blocks);
        echo "\t
\t";
        // line 128
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "registerPackage", array(0 => "angularJs.sanitize.min"), "method"), "html", null, true);
        echo "
";
    }

    public function getTemplateName()
    {
        return "/views/selection/preview.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  214 => 128,  210 => 127,  204 => 124,  197 => 122,  192 => 119,  184 => 118,  177 => 112,  173 => 111,  170 => 110,  116 => 106,  113 => 58,  107 => 54,  104 => 53,  101 => 52,  94 => 48,  85 => 42,  76 => 36,  68 => 31,  59 => 25,  53 => 21,  50 => 20,  45 => 16,  43 => 9,  38 => 7,  35 => 6,  32 => 5,  27 => 2,);
    }
}
