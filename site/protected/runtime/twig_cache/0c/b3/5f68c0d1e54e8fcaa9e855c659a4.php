<?php

/* /views/access/index.twig */
class __TwigTemplate_0cb35f68c0d1e54e8fcaa9e855c659a4 extends Twig_Template
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

    // line 19
    public function block_content($context, array $blocks = array())
    {
        // line 20
        echo "\t<h2>";
        echo twig_escape_filter($this->env, YiiTranslate("app", "Access manager"), "html", null, true);
        echo "</h2>
\t<div class=\"row\">
\t\t<div class=\"col-sm-4\">
\t\t\t<h4>";
        // line 23
        echo twig_escape_filter($this->env, YiiTranslate("app", "Groups"), "html", null, true);
        echo "</h4>
\t\t\t<div class=\"indent-level\">
\t\t\t\t<ul>
\t\t\t\t";
        // line 26
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "rootGroups"));
        foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
            // line 27
            echo "\t\t\t\t\t<li>
\t\t\t\t\t\t<a href=\"";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "access/group", 1 => array("id" => $this->getAttribute((isset($context["group"]) ? $context["group"] : null), "ref"))), "method"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["group"]) ? $context["group"] : null), "name"), "html", null, true);
            echo "</a>
\t\t\t\t\t\t";
            // line 29
            echo $this->getAttribute($this, "subMenu", array(0 => $this->getAttribute((isset($context["group"]) ? $context["group"] : null), "children"), 1 => (isset($context["this"]) ? $context["this"] : null)), "method");
            echo "
\t\t\t\t\t</li>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 32
        echo "\t\t\t\t</ul>\t
\t\t\t</div>\t\t\t
\t\t</div>
\t\t
\t\t
\t\t
\t\t<div class=\"col-sm-4\">
\t\t<h4>";
        // line 39
        echo twig_escape_filter($this->env, YiiTranslate("app", "Users per group"), "html", null, true);
        echo "</h4>
\t\t<div class=\"panel-group\" id=\"accordion\">
\t\t";
        // line 41
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "groups"));
        foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
            echo "\t\t\t
\t\t\t<div class=\"panel panel-default\">
\t\t\t\t<div class=\"panel-heading\">
\t\t\t\t\t<h4 class=\"panel-title\">
\t\t\t\t\t\t<a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse-";
            // line 45
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["group"]) ? $context["group"] : null), "ref"), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t";
            // line 46
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["group"]) ? $context["group"] : null), "name"), "html", null, true);
            echo "
\t\t\t\t\t\t</a>
\t\t\t\t\t\t<div class=\"pull-right badge badge-info\">";
            // line 48
            echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["group"]) ? $context["group"] : null), "users")), "html", null, true);
            echo "</div>
\t\t\t\t\t</h4>
\t\t\t\t</div>
\t\t\t\t<div id=\"collapse-";
            // line 51
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["group"]) ? $context["group"] : null), "ref"), "html", null, true);
            echo "\" class=\"panel-collapse collapse\">
\t\t\t\t\t<div class=\"panel-body\">
\t\t\t\t\t";
            // line 53
            if ($this->getAttribute((isset($context["group"]) ? $context["group"] : null), "users")) {
                // line 54
                echo "\t\t\t\t\t<ul>
\t\t\t\t\t";
                // line 55
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["group"]) ? $context["group"] : null), "users"));
                foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
                    // line 56
                    echo "\t\t\t\t\t\t<li><a href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "userInfo/index", 1 => array("id" => $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "ref"))), "method"), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username"), "html", null, true);
                    echo "</a></li>
\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 58
                echo "\t\t\t\t\t</ul>\t
\t\t\t\t\t";
            }
            // line 60
            echo "\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 63
        echo "\t\t\t
\t\t</div>\t
\t\t";
        // line 65
        if ($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "queue"), "status")) {
            // line 66
            echo "\t\t<dl class=\"dl-horizontal\">
\t\t</dl>\t
\t\t";
        } else {
            // line 69
            echo "\t\t\tThere is no queue status. Probably the user is not defined in the system
\t\t";
        }
        // line 71
        echo "\t\t</div>\t\t
\t</div>
";
    }

    // line 76
    public function block_onReady($context, array $blocks = array())
    {
        // line 77
        echo "  \$('.menu-overview').addClass('active');
\t";
        // line 78
        $this->displayParentBlock("onReady", $context, $blocks);
        echo "
";
    }

    // line 6
    public function getsubMenu($_items = null, $_page = null)
    {
        $context = $this->env->mergeGlobals(array(
            "items" => $_items,
            "page" => $_page,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 7
            echo "\t";
            if ((twig_length_filter($this->env, (isset($context["items"]) ? $context["items"] : null)) > 0)) {
                // line 8
                echo "\t\t<ul class=\"indent-close\">
\t\t\t";
                // line 9
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["items"]) ? $context["items"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 10
                    echo "\t\t\t<li>
\t\t\t\t<a href=\"";
                    // line 11
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "createUrl", array(0 => "access/group", 1 => array("id" => $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "ref"))), "method"), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "name"), "html", null, true);
                    echo "</a>
\t\t\t\t";
                    // line 12
                    echo $this->getAttribute($this, "subMenu", array(0 => $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "children")), "method");
                    echo "
\t\t\t</li>
      ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 15
                echo "\t\t</ul>
  ";
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "/views/access/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  214 => 15,  205 => 12,  199 => 11,  196 => 10,  192 => 9,  189 => 8,  186 => 7,  174 => 6,  168 => 78,  165 => 77,  162 => 76,  156 => 71,  152 => 69,  147 => 66,  145 => 65,  141 => 63,  132 => 60,  128 => 58,  117 => 56,  113 => 55,  110 => 54,  108 => 53,  103 => 51,  97 => 48,  92 => 46,  88 => 45,  79 => 41,  74 => 39,  65 => 32,  56 => 29,  50 => 28,  47 => 27,  43 => 26,  37 => 23,  30 => 20,  27 => 19,);
    }
}
