<?php

/* vendors/toxus/views/layouts/_view.twig */
class __TwigTemplate_ca7be650759a52161d86511c72991f17 extends Twig_Template
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
        echo "<dl class=\"";
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "layoutClass", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "layoutClass"), "dl-horizontal")) : ("dl-horizontal")), "html", null, true);
        echo "\">
\t\t";
        // line 2
        if ($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "controlWidth")) {
            $context["width"] = $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "controlWidth");
        } else {
            $context["width"] = "input-xlarge";
        }
        // line 3
        echo "\t\t";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "elements"));
        foreach ($context['_seq'] as $context["groupKey"] => $context["groupElement"]) {
            echo "\t\t\t
\t\t";
            // line 4
            if ((($this->getAttribute((isset($context["groupElement"]) ? $context["groupElement"] : null), "hidden") != true) && ($this->getAttribute((isset($context["groupElement"]) ? $context["groupElement"] : null), "viewHidden") != true))) {
                // line 5
                echo "\t\t";
                // line 6
                echo "\t\t\t";
                if (($this->getAttribute((isset($context["groupElement"]) ? $context["groupElement"] : null), "type") != "hidden")) {
                    // line 7
                    echo "\t\t\t";
                    // line 8
                    echo "\t\t\t<dt>
        ";
                    // line 9
                    if (($this->getAttribute((isset($context["groupElement"]) ? $context["groupElement"] : null), "hideLabel") != true)) {
                        // line 10
                        echo "          ";
                        if ((($this->getAttribute((isset($context["groupElement"]) ? $context["groupElement"] : null), "type") == "checkbox") && $this->getAttribute((isset($context["groupElement"]) ? $context["groupElement"] : null), "viewLabel"))) {
                            // line 11
                            echo "            ";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["groupElement"]) ? $context["groupElement"] : null), "viewLabel"), "label"), "html", null, true);
                            echo "
          ";
                        } else {
                            // line 12
                            echo " 
            ";
                            // line 13
                            if ($this->getAttribute((isset($context["groupElement"]) ? $context["groupElement"] : null), "label")) {
                                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["groupElement"]) ? $context["groupElement"] : null), "label"), "html", null, true);
                            } else {
                                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "attributeLabel", array(0 => (isset($context["groupKey"]) ? $context["groupKey"] : null)), "method"), "html", null, true);
                            }
                            // line 14
                            echo "          ";
                        }
                        echo "  
        ";
                    }
                    // line 15
                    echo "</dt> 
\t\t\t";
                }
                // line 17
                echo "\t\t\t
\t\t\t<dd>
\t\t\t\t";
                // line 19
                if ((twig_length_filter($this->env, $this->getAttribute((isset($context["groupElement"]) ? $context["groupElement"] : null), "elements")) > 0)) {
                    // line 20
                    echo "\t\t\t\t\t";
                    $context["fields"] = $this->getAttribute((isset($context["groupElement"]) ? $context["groupElement"] : null), "elements");
                    // line 21
                    echo "\t\t\t\t";
                } else {
                    // line 22
                    echo "\t\t\t\t\t";
                    $context["fields"] = array((isset($context["groupKey"]) ? $context["groupKey"] : null) => (isset($context["groupElement"]) ? $context["groupElement"] : null));
                    echo " ";
                    // line 23
                    echo "\t\t\t\t";
                }
                echo "\t
\t\t\t\t";
                // line 24
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["fields"]) ? $context["fields"] : null));
                foreach ($context['_seq'] as $context["key"] => $context["element"]) {
                    echo "\t

\t\t\t\t";
                    // line 26
                    if ((($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "dropdown") || ($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "radiobuttonlist"))) {
                        echo "\t\t\t\t\t\t\t
\t\t\t\t\t";
                        // line 27
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "items"));
                        foreach ($context['_seq'] as $context["itemKey"] => $context["itemCaption"]) {
                            // line 28
                            echo "\t\t\t\t\t ";
                            if (((isset($context["itemKey"]) ? $context["itemKey"] : null) == $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"))) {
                                echo twig_escape_filter($this->env, (isset($context["itemCaption"]) ? $context["itemCaption"] : null), "html", null, true);
                            }
                            // line 29
                            echo "\t\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['itemKey'], $context['itemCaption'], $context['_parent'], $context['loop']);
                        $context = array_merge($_parent, array_intersect_key($context, $_parent));
                        // line 30
                        echo "\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "textarea")) {
                        // line 31
                        echo "\t\t\t\t\t ";
                        echo strtr($this->getAttribute((isset($context["html"]) ? $context["html"] : null), "encode", array(0 => $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method")), "method"), array("
" => "<br />"));
                        echo "
\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "checkbox")) {
                        // line 32
                        echo "\t
          ";
                        // line 33
                        if ($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "viewLabel")) {
                            // line 34
                            echo "            ";
                            if (($this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method") == 1)) {
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["groupElement"]) ? $context["groupElement"] : null), "viewLabel"), "true"), "html", null, true);
                            } else {
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["groupElement"]) ? $context["groupElement"] : null), "viewLabel"), "false"), "html", null, true);
                            }
                            // line 35
                            echo "          ";
                        } else {
                            echo "  
            ";
                            // line 36
                            if (($this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method") == 1)) {
                                echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "trueCaption", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "trueCaption"), YiiTranslate("base", "Yes"))) : (YiiTranslate("base", "Yes"))), "html", null, true);
                            } else {
                                echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "falseCaption", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "falseCaption"), YiiTranslate("base", "No"))) : (YiiTranslate("base", "No"))), "html", null, true);
                            }
                            echo " 
          ";
                        }
                        // line 38
                        echo "\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "image")) {
                        // line 39
                        echo "\t\t\t\t\t";
                        echo $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "form"), "image", array(0 => (isset($context["model"]) ? $context["model"] : null), 1 => (isset($context["key"]) ? $context["key"] : null)), "method");
                        echo "\t\t\t\t\t\t\t\t
\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "finder")) {
                        // line 40
                        echo "\t\t\t\t\t
\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "html")) {
                        // line 42
                        echo "\t\t\t\t\t";
                        echo $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method");
                        echo "
\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "chosen")) {
                        // line 43
                        echo "\t\t\t\t\t\t\t\t
\t\t\t\t\t\t";
                        // line 44
                        if (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "multi") && (twig_length_filter($this->env, $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method")) > 0))) {
                            echo "\t\t\t\t\t\t
\t\t\t\t\t\t\t<ul class=\"comma-list-summary\">
\t\t\t\t\t\t\t";
                            // line 46
                            $context['_parent'] = (array) $context;
                            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "items"));
                            foreach ($context['_seq'] as $context["itemKey"] => $context["itemCaption"]) {
                                // line 47
                                echo "\t\t\t\t\t\t\t ";
                                if (((twig_in_filter((isset($context["itemKey"]) ? $context["itemKey"] : null), $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method")) && (isset($context["itemKey"]) ? $context["itemKey"] : null)) && (isset($context["itemCaption"]) ? $context["itemCaption"] : null))) {
                                    echo "<li class=\"comma-list\">";
                                    if ($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "url")) {
                                        echo "<a href=\"";
                                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["element"]) ? $context["element"] : null), "url"), "html", null, true);
                                        echo twig_escape_filter($this->env, (isset($context["itemKey"]) ? $context["itemKey"] : null), "html", null, true);
                                        echo "\">";
                                    }
                                    echo twig_escape_filter($this->env, (isset($context["itemCaption"]) ? $context["itemCaption"] : null), "html", null, true);
                                    if ($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "url")) {
                                        echo "</a>";
                                    }
                                    echo "</li>";
                                }
                                // line 48
                                echo "\t\t\t\t\t\t\t";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['itemKey'], $context['itemCaption'], $context['_parent'], $context['loop']);
                            $context = array_merge($_parent, array_intersect_key($context, $_parent));
                            echo "\t\t\t\t\t
\t\t\t\t\t\t\t</ul> 
\t\t\t\t\t\t";
                        } else {
                            // line 51
                            echo "\t\t\t\t\t\t\t";
                            $context['_parent'] = (array) $context;
                            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "items"));
                            foreach ($context['_seq'] as $context["itemKey"] => $context["itemCaption"]) {
                                // line 52
                                echo "\t\t\t\t\t\t\t ";
                                if (((isset($context["itemKey"]) ? $context["itemKey"] : null) == $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"))) {
                                    if ($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "url")) {
                                        echo "<a href=\"";
                                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["element"]) ? $context["element"] : null), "url"), "html", null, true);
                                        echo twig_escape_filter($this->env, (isset($context["itemKey"]) ? $context["itemKey"] : null), "html", null, true);
                                        echo "\">";
                                    }
                                    echo twig_escape_filter($this->env, (isset($context["itemCaption"]) ? $context["itemCaption"] : null), "html", null, true);
                                    if ($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "url")) {
                                        echo "</a>";
                                    }
                                }
                                // line 53
                                echo "\t\t\t\t\t\t\t";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['itemKey'], $context['itemCaption'], $context['_parent'], $context['loop']);
                            $context = array_merge($_parent, array_intersect_key($context, $_parent));
                            echo "\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t";
                        }
                        // line 54
                        echo "\t\t\t\t
\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "datetime")) {
                        // line 55
                        echo "\t\t\t\t\t\t
\t\t\t\t\t";
                        // line 56
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"), "html", null, true);
                        echo "\t
\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "hidden")) {
                        // line 58
                        echo "\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "view")) {
                        // line 59
                        echo "\t\t\t\t\t";
                        echo $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method");
                        echo "\t
\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "password")) {
                        // line 61
                        echo "\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "typeahead")) {
                        // line 62
                        echo "\t\t\t\t\t";
                        if ((($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "associative", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "associative"), 1)) : (1))) {
                            // line 63
                            echo "\t\t\t\t\t";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["element"]) ? $context["element"] : null), "caption"), "html", null, true);
                            echo "\t
\t\t\t\t\t";
                        } else {
                            // line 65
                            echo "\t\t\t\t\t";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"), "html", null, true);
                            echo "\t
\t\t\t\t\t";
                        }
                        // line 67
                        echo "\t\t\t\t";
                    } elseif ((($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "button") || ($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "dialog"))) {
                        echo "\t
\t\t\t\t\t";
                        // line 68
                        if (((($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "showMode", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "showMode"), "view")) : ("view")) == "view")) {
                            // line 69
                            echo "\t\t\t\t<h4>
\t\t\t\t\t<span id=\"\" class=\"a-url btn ";
                            // line 70
                            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "style", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "style"), "btn-primary")) : ("btn-primary")), "html", null, true);
                            echo "\"";
                            echo $this->getAttribute((isset($context["element"]) ? $context["element"] : null), "popover");
                            echo " data-url=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["element"]) ? $context["element"] : null), "url"), "html", null, true);
                            echo "\">";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["element"]) ? $context["element"] : null), "caption"), "html", null, true);
                            echo "</span>
\t\t\t\t</h4>\t
\t\t\t\t\t";
                        }
                        // line 73
                        echo "\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "email")) {
                        // line 74
                        echo "\t\t\t\t\t";
                        if ($this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method")) {
                            // line 75
                            echo "\t\t\t\t\t<a href=\"mailto:";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"), "html", null, true);
                            echo "\">";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"), "html", null, true);
                            echo "</a>
\t\t\t\t\t";
                        }
                        // line 76
                        echo "\t
\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "url")) {
                        // line 77
                        echo "\t\t\t\t\t\t
\t\t\t\t\t\t<a href=\"";
                        // line 78
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"), "html", null, true);
                        echo "</a>\t
\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "raw")) {
                        // line 80
                        echo "\t\t\t\t\t\t";
                        echo $this->getAttribute((isset($context["element"]) ? $context["element"] : null), "value");
                        echo "
\t\t\t\t";
                    } else {
                        // line 81
                        echo "\t
\t\t\t\t\t";
                        // line 82
                        echo $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method");
                        echo "\t
\t\t\t\t";
                    }
                    // line 84
                    echo "\t\t\t\t";
                    if ($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "openUrl")) {
                        // line 85
                        echo "\t\t\t\t\t&nbsp;<a href=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["element"]) ? $context["element"] : null), "openUrl"), "html", null, true);
                        echo "\"><span class=\"glyphicon glyphicon-link\"></span></a>
\t\t\t\t";
                    }
                    // line 87
                    echo "\t\t\t\t\t
\t\t\t  ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['element'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 88
                echo "&nbsp;

\t\t\t</dd>\t
\t\t\t
\t\t";
                // line 93
                echo "\t\t";
            }
            echo "\t
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['groupKey'], $context['groupElement'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 94
        echo "\t
\t\t
</dl>";
    }

    public function getTemplateName()
    {
        return "vendors/toxus/views/layouts/_view.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  381 => 94,  372 => 93,  366 => 88,  359 => 87,  353 => 85,  350 => 84,  345 => 82,  342 => 81,  336 => 80,  329 => 78,  326 => 77,  322 => 76,  314 => 75,  311 => 74,  308 => 73,  296 => 70,  293 => 69,  291 => 68,  286 => 67,  280 => 65,  274 => 63,  271 => 62,  268 => 61,  262 => 59,  259 => 58,  254 => 56,  251 => 55,  247 => 54,  238 => 53,  224 => 52,  219 => 51,  209 => 48,  193 => 47,  189 => 46,  184 => 44,  181 => 43,  175 => 42,  171 => 40,  165 => 39,  162 => 38,  153 => 36,  148 => 35,  141 => 34,  139 => 33,  136 => 32,  129 => 31,  126 => 30,  120 => 29,  115 => 28,  111 => 27,  107 => 26,  100 => 24,  95 => 23,  91 => 22,  88 => 21,  83 => 19,  79 => 17,  75 => 15,  69 => 14,  63 => 13,  60 => 12,  51 => 10,  49 => 9,  46 => 8,  39 => 5,  37 => 4,  24 => 2,  32 => 7,  25 => 4,  21 => 2,  19 => 1,  143 => 50,  133 => 42,  127 => 41,  124 => 40,  121 => 39,  114 => 33,  108 => 29,  105 => 28,  101 => 26,  98 => 25,  92 => 21,  89 => 20,  85 => 20,  82 => 17,  74 => 34,  71 => 33,  68 => 32,  65 => 25,  62 => 24,  59 => 17,  57 => 16,  54 => 11,  47 => 13,  44 => 7,  41 => 6,  38 => 10,  36 => 9,  33 => 8,  30 => 3,);
    }
}
