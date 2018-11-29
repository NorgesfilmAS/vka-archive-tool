<?php

/* /views/resourceSpace/listModelFields.twig */
class __TwigTemplate_e60601abff12f10d6cc2637e74bb6756 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'pageContent' => array($this, 'block_pageContent'),
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
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "\t<div class=\"hero-unit\">
\t\t<div class=\"container\">
\t\t\t<h2>Fields of <b>";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["rs"]) ? $context["rs"] : null), "modelName", array(0 => (isset($context["modelId"]) ? $context["modelId"] : null)), "method"), "html", null, true);
        echo "</b></h2>
\t\t</div>
\t</div>\t
\t";
        // line 9
        $this->displayBlock('pageContent', $context, $blocks);
    }

    public function block_pageContent($context, array $blocks = array())
    {
        // line 10
        echo "\t<div class=\"container clearfix\" id=\"main-content\"> 
\t\t<table>
\t\t\t<thead>
\t\t\t\t<tr>
\t\t\t\t\t<td>ID</td>
\t\t\t\t\t<td>name</td>
\t\t\t\t\t<td>type</td>
\t\t\t\t\t<td>options</td>
\t\t\t</thead>
\t\t\t<tbody>
\t\t\t\t";
        // line 20
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"));
        foreach ($context['_seq'] as $context["id"] => $context["field"]) {
            // line 21
            echo "\t\t\t\t<tr>
\t\t\t\t\t<td>";
            // line 22
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
            echo "</td>
\t\t\t\t\t<td>";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "name"), "html", null, true);
            echo "</td>
\t\t\t\t\t<td>";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "optionText"), "html", null, true);
            echo "</td>\t\t\t\t\t
\t\t\t\t</tr>\t
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['id'], $context['field'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 26
        echo "\t
\t\t\t</tbody>\t
\t\t</table>
\t</div>\t\t
  ";
    }

    public function getTemplateName()
    {
        return "/views/resourceSpace/listModelFields.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 26,  73 => 24,  69 => 23,  65 => 22,  62 => 21,  58 => 20,  46 => 10,  40 => 9,  34 => 6,  30 => 4,  27 => 3,);
    }
}
