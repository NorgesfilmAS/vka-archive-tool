<?php

/* /vendors/toxus/views/layouts/_menu.twig */
class __TwigTemplate_ace4602b3c3e54f6d11b09441e2659e5 extends Twig_Template
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
        // line 20
        echo "
";
        // line 77
        echo "
";
        // line 78
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["menu"]) ? $context["menu"] : null));
        foreach ($context['_seq'] as $context["key"] => $context["item"]) {
            // line 79
            echo "\t";
            if (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "type") == "caption-right")) {
                // line 80
                echo "\t<h5 class=\"short_headline right\"><span>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "caption"), "html", null, true);
                echo "</span></h5>
\t";
            } elseif (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "type") == "caption")) {
                // line 82
                echo "\t<h5 class=\"short_headline\"><span>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "caption"), "html", null, true);
                echo "</span></h5>
\t";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 85
        echo "
";
        // line 86
        if ((twig_length_filter($this->env, (isset($context["menu"]) ? $context["menu"] : null)) > 0)) {
            // line 87
            echo "<ul class=\"";
            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["menu"]) ? $context["menu"] : null), "style", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["menu"]) ? $context["menu"] : null), "style"), $this->getAttribute((isset($context["layout"]) ? $context["layout"] : null), "class"))) : ($this->getAttribute((isset($context["layout"]) ? $context["layout"] : null), "class"))), "html", null, true);
            echo "\">\t
\t";
            // line 88
            echo $this->getAttribute($this, "menuItemBuilder", array(0 => (isset($context["menu"]) ? $context["menu"] : null), 1 => (isset($context["this"]) ? $context["this"] : null), 2 => 0), "method");
            echo "
</ul>
";
        }
        // line 91
        echo "\t
";
    }

    // line 21
    public function getmenuItemBuilder($_menu = null, $_t = null, $_level = null)
    {
        $context = $this->env->mergeGlobals(array(
            "menu" => $_menu,
            "t" => $_t,
            "level" => $_level,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 22
            echo " \t";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["menu"]) ? $context["menu"] : null));
            foreach ($context['_seq'] as $context["key"] => $context["menuItem"]) {
                echo "\t
\t\t";
                // line 23
                if (twig_test_iterable((isset($context["menuItem"]) ? $context["menuItem"] : null))) {
                    // line 24
                    echo "\t\t\t";
                    if (($this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "hidden") != true)) {
                        // line 25
                        echo "\t\t\t\t";
                        if ($this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "type")) {
                            // line 26
                            echo "\t\t\t\t";
                        } else {
                            // line 27
                            echo "\t\t\t\t\t<li class=\"menu-";
                            echo twig_escape_filter($this->env, twig_lower_filter($this->env, strtr((isset($context["key"]) ? $context["key"] : null), array(" " => "-"))), "html", null, true);
                            echo " menu-item";
                            if ($this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "items")) {
                                echo " menu-submenu ";
                            }
                            if ($this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "isActive")) {
                                echo " active";
                            }
                            echo "\">\t
\t\t\t\t\t";
                            // line 28
                            if (($this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "url") != "xxxx")) {
                                echo "\t
\t\t\t\t\t<a href=\"";
                                // line 29
                                echo (($this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "url", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "url"), "#")) : ("#"));
                                echo "\" data-placement=\"bottom\" ";
                                if ($this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "tooltip")) {
                                    echo "title=\"";
                                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "tooltip"), "html", null, true);
                                    echo "\"";
                                }
                                // line 30
                                echo "\t\t\t\t\t\t ";
                                if ($this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "style")) {
                                    echo " class=\"";
                                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "style"), "html", null, true);
                                    echo "\" ";
                                }
                                // line 31
                                echo "\t";
                                // line 41
                                echo "\t\t\t\t\t>
\t\t\t\t\t";
                                // line 42
                                if ($this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "level")) {
                                    // line 43
                                    echo "\t\t\t\t\t\t<span class=\"menu-item-level-";
                                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "level"), "html", null, true);
                                    echo "\">
\t\t\t\t\t";
                                }
                                // line 44
                                echo "\t\t
\t\t\t\t\t";
                                // line 45
                                if ($this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "icon", array(), "any", true, true)) {
                                    echo "<span class=\"";
                                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "icon"), "html", null, true);
                                    echo "\"></span>";
                                }
                                // line 46
                                echo "\t\t\t\t\t";
                                if ($this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "label")) {
                                    echo $this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "label");
                                }
                                // line 47
                                echo "\t\t\t\t\t";
                                if ($this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "level")) {
                                    // line 48
                                    echo "\t\t\t\t\t\t</span>
\t\t\t\t\t";
                                }
                                // line 50
                                echo "\t\t\t\t\t";
                                if ($this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "badge")) {
                                    echo "\t
\t\t\t\t\t\t<span class=\"pull-right badge-menu badge ";
                                    // line 51
                                    echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "badgeStyle", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "badgeStyle"), "badge-info")) : ("badge-info")), "html", null, true);
                                    echo "\" >";
                                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "badge"), "html", null, true);
                                    echo "</span>\t
\t\t\t\t\t";
                                }
                                // line 52
                                echo "\t
\t\t\t\t\t</a>
\t\t\t\t\t\t
\t\t\t\t\t";
                            } else {
                                // line 56
                                echo "\t\t\t\t\t\tYYY
\t\t\t\t\t\t";
                                // line 57
                                if ($this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "level")) {
                                    // line 58
                                    echo "\t\t\t\t\t\t\t<span class=\"menu-item-level-";
                                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "level"), "html", null, true);
                                    echo "\">
\t\t\t\t\t\t";
                                }
                                // line 59
                                echo "\t\t
\t\t\t\t\t\t";
                                // line 60
                                if ($this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "icon", array(), "any", true, true)) {
                                    echo "<span class=\"";
                                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "icon"), "html", null, true);
                                    echo "\"></span>";
                                }
                                // line 61
                                echo "\t\t\t\t\t\t";
                                if ($this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "label")) {
                                    echo $this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "label");
                                }
                                echo "\t\t\t\t\t
\t\t\t\t\t\t";
                                // line 62
                                if ($this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "level")) {
                                    // line 63
                                    echo "\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t";
                                }
                                // line 64
                                echo "\t
\t\t\t\t\t";
                            }
                            // line 66
                            echo "\t\t\t\t\t";
                            if ((twig_length_filter($this->env, $this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "items")) > 0)) {
                                echo "\t
\t\t\t\t\t<ul class=\"nav menu-level-";
                                // line 67
                                echo twig_escape_filter($this->env, (isset($context["level"]) ? $context["level"] : null), "html", null, true);
                                echo " menu-submenu menu-level\">
\t\t\t\t\t\t";
                                // line 68
                                echo $this->getAttribute($this, "menuItemBuilder", array(0 => $this->getAttribute((isset($context["menuItem"]) ? $context["menuItem"] : null), "items"), 1 => (isset($context["t"]) ? $context["t"] : null), 2 => ((isset($context["level"]) ? $context["level"] : null) + 1)), "method");
                                echo "
\t\t\t\t\t</ul>
\t\t\t\t\t";
                            }
                            // line 71
                            echo "\t\t\t\t\t</li>\t\t
\t\t\t\t";
                        }
                        // line 73
                        echo "\t\t\t";
                    }
                    // line 74
                    echo "\t\t";
                }
                echo "\t\t
\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['menuItem'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "/vendors/toxus/views/layouts/_menu.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  242 => 74,  239 => 73,  235 => 71,  229 => 68,  225 => 67,  220 => 66,  216 => 64,  212 => 63,  210 => 62,  203 => 61,  197 => 60,  194 => 59,  188 => 58,  186 => 57,  183 => 56,  177 => 52,  170 => 51,  165 => 50,  161 => 48,  158 => 47,  153 => 46,  147 => 45,  144 => 44,  138 => 43,  136 => 42,  133 => 41,  131 => 31,  124 => 30,  116 => 29,  112 => 28,  100 => 27,  97 => 26,  94 => 25,  91 => 24,  89 => 23,  82 => 22,  69 => 21,  64 => 91,  58 => 88,  53 => 87,  51 => 86,  48 => 85,  32 => 80,  29 => 79,  25 => 78,  22 => 77,  19 => 20,  93 => 27,  84 => 25,  80 => 24,  76 => 23,  72 => 22,  68 => 21,  65 => 20,  61 => 19,  49 => 9,  46 => 8,  41 => 31,  38 => 82,  35 => 7,  30 => 4,  27 => 3,);
    }
}
