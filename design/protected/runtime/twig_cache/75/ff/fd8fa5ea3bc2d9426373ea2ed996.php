<?php

/* /views/layouts/viewForm.twig */
class __TwigTemplate_75fffd8fa5ea3bc2d9426373ea2ed996 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'viewContent' => array($this, 'block_viewContent'),
            'onReady' => array($this, 'block_onReady'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "viewForm", 1 => array("libOnly" => 1)), "method"));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 8
    public function block_viewContent($context, array $blocks = array())
    {
        // line 9
        echo "\t";
        if (($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "user"), "isModerating") && $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "canModerate", array(), "any", true, true))) {
            // line 10
            echo "\t<div class=\"row\">
\t\t<div class=\"col-sm-9\">\t
\t\t\t";
            // line 12
            $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "_moderate"), "method"));
            $template->display($context);
            // line 13
            echo "\t\t</div>
\t\t<div class=\"col-sm-3\">
\t\t\t";
            // line 15
            if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "moderationsView", array(0 => $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "route")), "method")) > 0)) {
                // line 16
                echo "\t\t\t\t<ul class=\"moderation\">
\t\t\t\t";
                // line 17
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "moderationsView", array(0 => $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "route")), "method"));
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
                foreach ($context['_seq'] as $context["_key"] => $context["change"]) {
                    // line 18
                    echo "\t\t\t\t\t<li class=\"mod-transaction\">
\t\t\t\t\t\t<div class=\"pull-right btn-group\">
\t\t\t\t\t\t\t<button class=\"btn btn-default btn-xs dropdown-toggle btn-dim\" data-toggle=\"dropdown\" href=\"#\"><span class=\"caret\"></span></button>
\t\t\t\t\t\t\t<ul class=\"dropdown-menu dropdown-menu-small\">
\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<a href=\"";
                    // line 23
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "resourceSpace/undoTransaction", 1 => array("id" => $this->getAttribute((isset($context["change"]) ? $context["change"] : null), "id"), "url" => $this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "request"), "requestUri"))), "method"), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, YiiTranslate("app", "Undo this change"), "html", null, true);
                    echo "</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</div>\t\t\t\t\t\t
\t\t\t\t\t\t
\t\t\t\t\t\t";
                    // line 29
                    echo "\t\t\t\t\t\t<div class=\"mod-icon level-";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index"), "html", null, true);
                    echo " mod-trans-event\" data-id=\".mod-trans-";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["change"]) ? $context["change"] : null), "id"), "html", null, true);
                    echo "\"><span class=\"glyphicon glyphicon-map-marker\"></span><br />
\t\t\t\t\t\t";
                    // line 30
                    if ($this->getAttribute((isset($context["change"]) ? $context["change"] : null), "is_rollback")) {
                        // line 31
                        echo "\t\t\t\t\t\t\t<span class=\"mod-rollback glyphicon glyphicon-refresh mod-trans-event\" data-id=\".mod-trans-";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["change"]) ? $context["change"] : null), "id"), "html", null, true);
                        echo "\"></span>
\t\t\t\t\t\t";
                    }
                    // line 33
                    echo "\t\t\t\t\t\t</div>\t
\t\t\t\t\t\t<div class=\"mod-user mod-trans-event\" data-id=\".mod-trans-";
                    // line 34
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["change"]) ? $context["change"] : null), "id"), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["change"]) ? $context["change"] : null), "user"), "username"), "html", null, true);
                    echo "<br />";
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["change"]) ? $context["change"] : null), "creation_date"), "d/m/Y H:i"), "html", null, true);
                    echo "</div>
\t\t\t\t\t</li>\t
\t\t\t\t";
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['change'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 37
                echo "\t\t\t\t</ul>\t
\t\t\t";
            }
            // line 38
            echo "\t
\t\t</div>
\t</div>\t
  ";
        } else {
            // line 42
            echo "\t";
            $this->displayParentBlock("viewContent", $context, $blocks);
            echo "
\t";
        }
    }

    // line 46
    public function block_onReady($context, array $blocks = array())
    {
        // line 47
        echo "\t\$('.btn-moderate').on('click', function() {
\t\twindow.location = window.location+\"?mode=moderate\"; 
\t});
\t\$('.mod-trans-event').on('click', function() {
\t\t\$('.mod-info-text').hide();
\t\t\$(\$(this).data('id')).show('fast');
\t});
\t";
        // line 54
        $this->displayParentBlock("onReady", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "/views/layouts/viewForm.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  152 => 54,  143 => 47,  140 => 46,  132 => 42,  126 => 38,  122 => 37,  101 => 34,  98 => 33,  92 => 31,  90 => 30,  83 => 29,  73 => 23,  66 => 18,  49 => 17,  46 => 16,  44 => 15,  40 => 13,  37 => 12,  33 => 10,  30 => 9,  27 => 8,);
    }
}
