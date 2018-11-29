<?php

/* /views/layouts/loggingList.twig */
class __TwigTemplate_0c42100200bb3cb0099cf4c3af615f0b extends Twig_Template
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
        // line 1
        echo "<div class=\"grid-row art-row row menu-modal table-hover\" data-url=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "art/loggingDialog", 1 => array("id" => $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "id"), "date" => $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "date"), "user" => $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "user_id"))), "method"), "html", null, true);
        echo "\" >\t
\t<div class=\"col-sm-3\">";
        // line 2
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "date"), "html", null, true);
        echo "</div>\t
\t<div class=\"col-sm-2 grid-col-no-wrap\">";
        // line 3
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "fullname"), "html", null, true);
        echo "</div>\t
\t<div class=\"col-sm-1 grid-col-no-wrap\">
\t\t";
        // line 5
        echo twig_escape_filter($this->env, YiiTranslate("app", "log-{type}", array("{type}" => $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "type"))), "html", null, true);
        echo "
\t</div>
\t<div class=\"col-sm-6 grid-col-no-wrap\">
\t";
        // line 8
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "loggingFields", array(0 => $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "date"), 1 => $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "user_id"), 2 => 5), "method"));
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
        foreach ($context['_seq'] as $context["fieldname"] => $context["value"]) {
            if ((!$this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "first"))) {
                echo ", ";
            }
            echo twig_escape_filter($this->env, YiiTranslate("app", (isset($context["fieldname"]) ? $context["fieldname"] : null)), "html", null, true);
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
        unset($context['_seq'], $context['_iterated'], $context['fieldname'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo "\t\t
\t</div>\t
</div>";
    }

    public function getTemplateName()
    {
        return "/views/layouts/loggingList.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 8,  28 => 3,  24 => 2,  19 => 1,  152 => 54,  143 => 47,  140 => 46,  132 => 42,  126 => 38,  122 => 37,  101 => 34,  98 => 33,  92 => 31,  90 => 30,  83 => 29,  73 => 23,  66 => 18,  46 => 16,  44 => 15,  40 => 13,  33 => 5,  30 => 9,  27 => 8,  77 => 46,  69 => 39,  61 => 33,  57 => 31,  55 => 14,  49 => 17,  45 => 10,  41 => 9,  37 => 12,  32 => 5,  29 => 4,  26 => 3,);
    }
}
