<?php

/* /vendors/toxus/views/layouts/systemInfo.twig */
class __TwigTemplate_67212b578df2f703c248dd27b508ae83 extends Twig_Template
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

    // line 6
    public function block_content($context, array $blocks = array())
    {
        // line 7
        echo "\t";
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "flash"), "method"));
        $template->display($context);
        // line 8
        echo "\t<div class=\"row\">
\t<h2>System information</h2>
\t</div>
\t";
        // line 11
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["properties"]) ? $context["properties"] : null));
        foreach ($context['_seq'] as $context["key"] => $context["props"]) {
            // line 12
            echo "\t<div class=\"panel panel-primary\">
\t\t<div class=\"panel-heading\">";
            // line 13
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["props"]) ? $context["props"] : null), "caption"), "html", null, true);
            echo "</div>
\t\t<div class=\"panel-body\">
\t\t\t
\t";
            // line 16
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["props"]) ? $context["props"] : null), "items"));
            foreach ($context['_seq'] as $context["name"] => $context["value"]) {
                // line 17
                echo "\t<div class=\"row\">\t\t
\t\t<div class=\"col-xs-3\">
\t\t\t\t";
                // line 19
                echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
                echo "
\t\t\t\t";
                // line 20
                if ($this->getAttribute((isset($context["value"]) ? $context["value"] : null), "explain")) {
                    // line 21
                    echo "\t\t\t\t<span class='pull-right'><a href=\"#\" class=\"tip\" data-toggle=\"tooltip\" title=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["value"]) ? $context["value"] : null), "explain"), "html", null, true);
                    echo "\"><span class=\"glyphicon glyphicon-question-sign\"></span></a></span>
\t\t\t\t";
                }
                // line 23
                echo "\t\t</div>
\t\t<div class=\"col-xs-9\">";
                // line 24
                if (twig_test_iterable((isset($context["value"]) ? $context["value"] : null))) {
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["value"]) ? $context["value"] : null), "value"), "html", null, true);
                    echo " ";
                } else {
                    echo twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : null), "html", null, true);
                }
                echo "</div>
\t</div>\t
\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['name'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 26
            echo "\t\t\t
\t\t\t
\t\t</div>
\t</div>
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['props'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 31
        echo "
\t";
        // line 32
        if ((twig_length_filter($this->env, (isset($context["actions"]) ? $context["actions"] : null)) > 0)) {
            // line 33
            echo "\t<div class=\"panel panel-primary\">
\t\t<div class=\"panel-heading\">";
            // line 34
            echo twig_escape_filter($this->env, YiiTranslate("base", "actions"), "html", null, true);
            echo "</div>
\t\t<div class=\"panel-body\">
\t";
            // line 36
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["actions"]) ? $context["actions"] : null));
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
            foreach ($context['_seq'] as $context["key"] => $context["action"]) {
                // line 37
                echo "\t\t<div class='row'>\t
\t\t\t<div class='col-xs-3'>
\t\t\t\t<p class=\"text-right\"><a href=\"";
                // line 39
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => $this->getAttribute((isset($context["action"]) ? $context["action"] : null), "action"), 1 => (($this->getAttribute((isset($context["action"]) ? $context["action"] : null), "params", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["action"]) ? $context["action"] : null), "params"), array())) : (array()))), "method"), "html", null, true);
                echo "\" class=\"btn ";
                echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["action"]) ? $context["action"] : null), "style", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["action"]) ? $context["action"] : null), "style"), "btn-primary")) : ("btn-primary")), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["action"]) ? $context["action"] : null), "caption"), "html", null, true);
                echo "</a></p>
\t\t\t</div>
\t\t\t<div class=\"col-xs-9\">
\t\t\t";
                // line 42
                if ($this->getAttribute((isset($context["action"]) ? $context["action"] : null), "info")) {
                    // line 43
                    echo "\t\t\t\t<p>";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["action"]) ? $context["action"] : null), "info"), "html", null, true);
                    echo "</p>
\t\t\t";
                }
                // line 45
                echo "\t\t\t";
                if (($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "last") == false)) {
                    // line 46
                    echo "\t\t\t\t<hr />\t
\t\t\t";
                }
                // line 48
                echo "\t\t\t</div>
\t\t</div>
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
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['action'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 51
            echo "\t\t</div>
\t</div>\t
\t";
        }
        // line 54
        echo "

";
    }

    // line 58
    public function block_onReady($context, array $blocks = array())
    {
        // line 59
        echo "\t\$('.tip').tooltip();
\t";
        // line 60
        $this->displayParentBlock("onReady", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "/vendors/toxus/views/layouts/systemInfo.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  191 => 60,  188 => 59,  185 => 58,  179 => 54,  174 => 51,  158 => 48,  154 => 46,  151 => 45,  145 => 43,  143 => 42,  133 => 39,  129 => 37,  112 => 36,  107 => 34,  104 => 33,  102 => 32,  99 => 31,  89 => 26,  75 => 24,  72 => 23,  66 => 21,  64 => 20,  60 => 19,  56 => 17,  52 => 16,  46 => 13,  43 => 12,  39 => 11,  34 => 8,  30 => 7,  27 => 6,);
    }
}
