<?php

/* /views/moderation/listChanges.twig */
class __TwigTemplate_b29b1e948b7f223bb14851dbe8e786d0 extends Twig_Template
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
        // line 4
        echo "
";
        // line 5
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["model"]) ? $context["model"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["transaction"]) {
            // line 6
            echo "<div class=\"transaction well well-sm\"  >
\t<strong>";
            // line 7
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["transaction"]) ? $context["transaction"] : null), "date"), "d/m/Y h:i"), "html", null, true);
            echo "</strong>
\t<div class=\"pull-right\">\t
\t\t<a href=\"";
            // line 9
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => $this->getAttribute((isset($context["transaction"]) ? $context["transaction"] : null), "path"), 1 => array("id" => $this->getAttribute((isset($context["transaction"]) ? $context["transaction"] : null), "id"))), "method"), "html", null, true);
            echo "\">\t\t
\t\t\t";
            // line 10
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["yii"]) ? $context["yii"] : null), "t", array(0 => "menu", 1 => $this->getAttribute((isset($context["transaction"]) ? $context["transaction"] : null), "path")), "method"), "html", null, true);
            echo "\t\t\t
\t\t\t<span class=\"glyphicon glyphicon-link\"></span>\t\t\t

\t\t</a>
\t</div>
\t<dl class=\"dl-vertically\">
\t\t";
            // line 16
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["transaction"]) ? $context["transaction"] : null), "items"));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["_key"] => $context["step"]) {
                // line 17
                echo "\t\t<dt>
\t\t\t";
                // line 18
                echo twig_escape_filter($this->env, YiiTranslate("app", $this->getAttribute((isset($context["step"]) ? $context["step"] : null), "fieldname")), "html", null, true);
                echo "
\t\t</dt>
\t\t<dd>
\t\t\t";
                // line 21
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["step"]) ? $context["step"] : null), "value"), "html", null, true);
                echo "
\t\t</dd>
\t\t";
                $context['_iterated'] = true;
            }
            if (!$context['_iterated']) {
                // line 24
                echo "\t\t";
                echo twig_escape_filter($this->env, YiiTranslate("app", "no undo steps found"), "html", null, true);
                echo "
\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['step'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 26
            echo "\t</dl>
</div>
";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 29
            echo "\t";
            echo twig_escape_filter($this->env, YiiTranslate("app", "no transactions found"), "html", null, true);
            echo "
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['transaction'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 31
        echo "
";
    }

    public function getTemplateName()
    {
        return "/views/moderation/listChanges.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  95 => 31,  86 => 29,  79 => 26,  70 => 24,  62 => 21,  56 => 18,  53 => 17,  48 => 16,  39 => 10,  35 => 9,  30 => 7,  27 => 6,  22 => 5,  19 => 4,);
    }
}
