<?php

/* /vendors/toxus/views/layouts/passwordSend.twig */
class __TwigTemplate_085c8a3926b649d0560a83efd12a84e6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'message' => array($this, 'block_message'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "formDialog"), "method"));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo "\t";
        echo twig_escape_filter($this->env, YiiTranslate("mail", "Request password"), "html", null, true);
        echo "
";
    }

    // line 7
    public function block_message($context, array $blocks = array())
    {
        // line 8
        echo "\t";
        if ($this->getAttribute((isset($context["profile"]) ? $context["profile"] : null), "hasErrors")) {
            // line 9
            echo "\t\t";
            echo twig_escape_filter($this->env, YiiTranslate("base", "There was an error sending the reactive information"), "html", null, true);
            echo "
\t\t";
            // line 10
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["profile"]) ? $context["profile"] : null), "errors"));
            foreach ($context['_seq'] as $context["_key"] => $context["err"]) {
                // line 11
                echo "\t\t\t<div class=\"text-danger\">";
                echo twig_escape_filter($this->env, YiiTranslate("base", "Error"), "html", null, true);
                echo ": 
\t\t\t\t";
                // line 12
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["err"]) ? $context["err"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["e"]) {
                    // line 13
                    echo "\t\t\t\t\t";
                    echo twig_escape_filter($this->env, YiiTranslate("base", (isset($context["e"]) ? $context["e"] : null)), "html", null, true);
                    echo "<br />
\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['e'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 15
                echo "\t\t\t</div>
\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['err'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 16
            echo "\t
\t\t<div class=\"text-center center\">
\t\t\t<a href=\"";
            // line 18
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "site/login"), "method"), "html", null, true);
            echo "\" class=\"btn btn-success\">";
            echo twig_escape_filter($this->env, YiiTranslate("base", "Try again"), "html", null, true);
            echo "</a>
\t\t</div>\t
\t";
        } else {
            // line 21
            echo "\t\t<div >\t
\t\t\t<p>";
            // line 22
            echo YiiTranslate("mail", "A email has been send to <strong>{email}</strong> with the information how to set your password.", array("{email}" => $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "email")));
            echo "</p>
\t\t\t<p>";
            // line 23
            echo twig_escape_filter($this->env, YiiTranslate("mail", "Please check your email and follow the instruction."), "html", null, true);
            echo "</p>
\t\t</div>
";
            // line 30
            echo "\t";
        }
        // line 31
        echo "
";
    }

    public function getTemplateName()
    {
        return "/vendors/toxus/views/layouts/passwordSend.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  104 => 31,  101 => 30,  96 => 23,  92 => 22,  89 => 21,  77 => 16,  70 => 15,  57 => 12,  52 => 11,  48 => 10,  43 => 9,  40 => 8,  37 => 7,  30 => 4,  27 => 3,  123 => 49,  114 => 43,  108 => 42,  103 => 40,  98 => 38,  90 => 33,  81 => 18,  78 => 25,  71 => 21,  66 => 19,  61 => 13,  56 => 15,  51 => 13,  45 => 11,  42 => 10,  35 => 8,  29 => 6,);
    }
}
