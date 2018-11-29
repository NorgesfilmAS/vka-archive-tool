<?php

/* views/selection/designer.html */
class __TwigTemplate_f707058f742fa54e9507fbd14c8d7522 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 7
        echo "
<div class=\"row\">
\t<div class=\"col-xs-12 select-order\">\t
\t\t<h4>Ordering</h4>
\t\t<div ng-hide=\"orderFields.length==0\">
\t\t\t<h3>
\t\t\t";
        echo "
\t\t\t";
        // line 8
        echo twig_escape_filter($this->env, YiiTranslate("app", "The fields use to order / group the final result."), "html", null, true);
        echo "
\t\t\t";
        // line 61
        echo "\t\t
\t\t\t</h3>\t\t\t
\t\t</div>
\t\t<!-- the definition of the order group  -->
\t\t<div class=\"row order-line\" ng-repeat=\"field in orderFields\" >
\t\t\t<div class=\"col-xs-5\">
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"col-xs-1\" ng-click=\"orderRemove(\$index)\"><span class=\"glyphicon glyphicon-minus-sign\"></span></div>
\t\t\t\t\t<div class=\"col-xs-4\">{{ field.label }}</div>
\t\t\t\t\t<div class=\"col-xs-3\" ng-click=\"orderSortNext(\$index)\">{{ orderSort(field) }}</div>
\t\t\t\t\t<div class=\"col-xs-3\">
\t\t\t\t\t\t<span class=\"glyphicon glyphicon-chevron-up pull-left\" 
\t\t\t\t\t\t\t\t\tng-click=\"orderMoveUp(\$index)\"
\t\t\t\t\t\t\t\t\tng-hide=\"\$first\"></span>
\t\t\t\t\t\t<span class=\"glyphicon glyphicon-chevron-down pull-right\" 
\t\t\t\t\t\t\t\t\tng-click=\"orderMoveDown(\$index)\"
\t\t\t\t\t\t\t\t\tng-hide=\"\$last\"></span>
\t\t\t\t\t</div>\t
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"col-xs-7\">
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"col-xs-11 col-xs-offset-1\" ng-show=\"field.order=='group'\">
\t\t\t\t\t\t<strong>Fields shown in header</strong><br />\t\t\t\t
\t\t\t\t\t\t<span class=\"command\"  
\t\t\t\t\t\t\t\t\tng-hide=\"showHeaderFields[\$index]\" 
\t\t\t\t\t\t\t\t\tng-click=\"showHeaderFields[\$index] = ! showHeaderFields[\$index]\">
\t\t\t\t\t\t\t<span class=\"glyphicon glyphicon-pencil\">Show field list</span>\t\t\t\t\t
\t\t\t\t\t\t</span>
\t\t\t\t\t\t<span class=\"command\"  
\t\t\t\t\t\t\t\t\tng-show=\"showHeaderFields[\$index]\" 
\t\t\t\t\t\t\t\t\tng-click=\"showHeaderFields[\$index] = ! showHeaderFields[\$index]\">
\t\t\t\t\t\t\t<span class=\"glyphicon glyphicon-pencil\">Hide field list</span>\t\t\t\t\t
\t\t\t\t\t\t</span>
\t\t\t\t\t\t<br />\t\t\t

\t\t\t\t\t\t<div class=\"list\" ng-repeat=\"show in field.fields\">
\t\t\t\t\t\t\t<span class=\"glyphicon glyphicon-minus-sign\" ng-click=\"headerRemove(\$parent.\$index, \$index)\">{{ show.label }}</span>\t\t\t\t\t
\t\t\t\t\t\t</div>\t
\t\t\t\t\t\t<div class=\"field-orderlist\" ng-show=\"showHeaderFields[\$index]\">
\t\t\t\t\t\t\t<div class=\"order-field\" ng-repeat=\"header in headerFields\">
\t\t\t\t\t\t\t\t<div ng-click=\"headerAdd(\$parent.\$index, \$index);showHeaderFields[\$parent.\$index]=0\" ng-show=\"headerIndex(\$parent.\$index, header.attribute) < 0\">{{ header.label }}</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>\t
\t\t\t</div>\t\t\t\t
\t\t</div>\t

\t\t<div class=\"row \" ng-hide=\"orderFields.length==allowedOrderFields.length\">
\t\t\t<div class=\"col-xs-12 no-padding\">
\t\t\t\t<h3>
\t\t\t";
        echo "
\t\t\t";
        // line 62
        echo twig_escape_filter($this->env, YiiTranslate("app", "The fields available for ordering and grouping"), "html", null, true);
        echo "
\t\t\t";
        // line 92
        echo "
\t\t\t\t</h3>\t
\t\t\t</div>\t
\t\t</div>
\t\t<div class=\"row\" ng-repeat=\"field in allowedOrderFields\" ng-show=\"orderIndex(field.attribute) < 0 \">
\t\t\t<div class=\"col-xs-1\">
\t\t\t\t<span class=\"glyphicon glyphicon-plus-sign add-field\" 
\t\t\t\t\t\t\tng-click=\"orderAdd(\$index)\" ></span>
\t\t\t</div>
\t\t\t<div class=\"col-xs-10\">{{ field.label }}</div>
\t\t</div>\t
\t</div>












\t<div class=\"col-xs-4 field-list\">
\t<h4>fields in body</h4>
\t\t<div class=\"row\" ng-hide=\"bodyFields.length==0\">
\t\t\t<div class=\"col-xs-12 no-padding\">
\t\t\t\t<h3>
\t\t\t";
        echo "
\t\t\t";
        // line 93
        echo twig_escape_filter($this->env, YiiTranslate("app", "The fields in the report (columns)."), "html", null, true);
        echo "
\t\t\t";
        // line 116
        echo "\t\t
\t\t\t\t</h3>\t
\t\t\t</div>\t
\t\t</div>
\t\t<div class=\"row\" ng-repeat=\"field in bodyFields\" >
\t\t\t<div class=\"col-xs-1\" ng-click=\"bodyRemove(field)\"><span class=\"glyphicon glyphicon-minus-sign\"></span></div>
\t\t\t<div class=\"col-xs-7\">{{ bodyLabel(field) }}</div>
\t\t\t<div class=\"col-xs-1 pull-right\">
\t\t\t\t<span class=\"glyphicon glyphicon-chevron-up\" 
\t\t\t\t\t\t\tng-click=\"bodyMoveUp(field)\"
\t\t\t\t\t\t\tng-hide=\"\$first\"></span>
\t\t\t</div>\t
\t\t\t<div class=\"col-xs-1 pull-right\">\t
\t\t\t\t<span class=\"glyphicon glyphicon-chevron-down\" 
\t\t\t\t\t\t\tng-click=\"bodyMoveDown(field)\"
\t\t\t\t\t\t\tng-hide=\"\$last\"></span>
\t\t\t</div>
\t\t</div>\t

\t\t<div class=\"row \" ng-hide=\"bodyFields.length==allowedBodyFields.length\">
\t\t\t<div class=\"col-xs-12 no-padding\">
\t\t\t\t<h3>
\t\t\t";
        echo "
\t\t\t";
        // line 117
        echo twig_escape_filter($this->env, YiiTranslate("app", "The fields available as columns"), "html", null, true);
        echo "
\t\t\t";
        // line 131
        echo "
\t\t\t\t</h3>\t
\t\t\t</div>\t
\t\t</div>
\t\t<div class=\"row\" ng-repeat=\"field in allowedBodyFields\" ng-hide=\"bodyFields.indexOf(field.attribute) >=0 \">
\t\t\t<div class=\"col-xs-1\">
\t\t\t\t<span class=\"glyphicon glyphicon-plus-sign add-field\" 
\t\t\t\t\t\t\tng-click=\"bodyAdd(\$index)\" ></span>
\t\t\t</div>
\t\t\t<div class=\"col-xs-10\">{{ field.label }}</div>
\t\t</div>\t\t
\t</div> 
</div>
";
        echo "
\t
\t
";
    }

    public function getTemplateName()
    {
        return "views/selection/designer.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  160 => 131,  156 => 117,  130 => 116,  126 => 93,  93 => 92,  89 => 62,  33 => 61,  29 => 8,  19 => 7,  214 => 128,  210 => 127,  204 => 124,  197 => 122,  192 => 119,  184 => 118,  177 => 112,  173 => 111,  170 => 110,  116 => 106,  113 => 58,  107 => 54,  104 => 53,  101 => 52,  94 => 48,  85 => 42,  76 => 36,  68 => 31,  59 => 25,  53 => 21,  50 => 20,  45 => 16,  43 => 9,  38 => 7,  35 => 6,  32 => 5,  27 => 2,);
    }
}
