<?php

/* vendors/toxus/views/layouts/_view.twig */
class __TwigTemplate_7a785d22535d67072be9e9216d7a7d72 extends Twig_Template
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
                    echo "\t\t\t<dt>";
                    if (($this->getAttribute((isset($context["groupElement"]) ? $context["groupElement"] : null), "hideLabel") != true)) {
                        if ($this->getAttribute((isset($context["groupElement"]) ? $context["groupElement"] : null), "label")) {
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["groupElement"]) ? $context["groupElement"] : null), "label"), "html", null, true);
                        } else {
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "attributeLabel", array(0 => (isset($context["groupKey"]) ? $context["groupKey"] : null)), "method"), "html", null, true);
                        }
                    }
                    echo "</dt> 
\t\t\t";
                }
                // line 10
                echo "\t\t\t
\t\t\t<dd>
\t\t\t\t";
                // line 12
                if ((twig_length_filter($this->env, $this->getAttribute((isset($context["groupElement"]) ? $context["groupElement"] : null), "elements")) > 0)) {
                    // line 13
                    echo "\t\t\t\t\t";
                    $context["fields"] = $this->getAttribute((isset($context["groupElement"]) ? $context["groupElement"] : null), "elements");
                    // line 14
                    echo "\t\t\t\t";
                } else {
                    // line 15
                    echo "\t\t\t\t\t";
                    $context["fields"] = array((isset($context["groupKey"]) ? $context["groupKey"] : null) => (isset($context["groupElement"]) ? $context["groupElement"] : null));
                    echo " ";
                    // line 16
                    echo "\t\t\t\t";
                }
                echo "\t
\t\t\t\t";
                // line 17
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["fields"]) ? $context["fields"] : null));
                foreach ($context['_seq'] as $context["key"] => $context["element"]) {
                    echo "\t

\t\t\t\t";
                    // line 19
                    if ((($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "dropdown") || ($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "radiobuttonlist"))) {
                        echo "\t\t\t\t\t\t\t
\t\t\t\t\t";
                        // line 20
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "items"));
                        foreach ($context['_seq'] as $context["itemKey"] => $context["itemCaption"]) {
                            // line 21
                            echo "\t\t\t\t\t ";
                            if (((isset($context["itemKey"]) ? $context["itemKey"] : null) == $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"))) {
                                echo twig_escape_filter($this->env, (isset($context["itemCaption"]) ? $context["itemCaption"] : null), "html", null, true);
                            }
                            // line 22
                            echo "\t\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['itemKey'], $context['itemCaption'], $context['_parent'], $context['loop']);
                        $context = array_merge($_parent, array_intersect_key($context, $_parent));
                        // line 23
                        echo "\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "textarea")) {
                        // line 24
                        echo "\t\t\t\t\t ";
                        echo strtr($this->getAttribute((isset($context["html"]) ? $context["html"] : null), "encode", array(0 => $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method")), "method"), array("
" => "<br />"));
                        echo "
\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "checkbox")) {
                        // line 25
                        echo "\t
\t\t\t\t\t";
                        // line 26
                        if (($this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method") == 1)) {
                            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "trueCaption", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "trueCaption"), YiiTranslate("base", "Yes"))) : (YiiTranslate("base", "Yes"))), "html", null, true);
                        } else {
                            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "falseCaption", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "falseCaption"), YiiTranslate("base", "No"))) : (YiiTranslate("base", "No"))), "html", null, true);
                        }
                        // line 27
                        echo "\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "image")) {
                        // line 28
                        echo "\t\t\t\t\t";
                        echo $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "form"), "image", array(0 => (isset($context["model"]) ? $context["model"] : null), 1 => (isset($context["key"]) ? $context["key"] : null)), "method");
                        echo "\t\t\t\t\t\t\t\t
\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "finder")) {
                        // line 29
                        echo "\t\t\t\t\t
\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "html")) {
                        // line 31
                        echo "\t\t\t\t\t";
                        echo $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method");
                        echo "
\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "chosen")) {
                        // line 32
                        echo "\t\t\t\t\t\t\t\t
\t\t\t\t\t\t";
                        // line 33
                        if (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "multi") && (twig_length_filter($this->env, $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method")) > 0))) {
                            echo "\t\t\t\t\t\t
\t\t\t\t\t\t\t<ul class=\"comma-list-summary\">
\t\t\t\t\t\t\t";
                            // line 35
                            $context['_parent'] = (array) $context;
                            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "items"));
                            foreach ($context['_seq'] as $context["itemKey"] => $context["itemCaption"]) {
                                // line 36
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
                                // line 37
                                echo "\t\t\t\t\t\t\t";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['itemKey'], $context['itemCaption'], $context['_parent'], $context['loop']);
                            $context = array_merge($_parent, array_intersect_key($context, $_parent));
                            echo "\t\t\t\t\t
\t\t\t\t\t\t\t</ul> 
\t\t\t\t\t\t";
                        } else {
                            // line 40
                            echo "\t\t\t\t\t\t\t";
                            $context['_parent'] = (array) $context;
                            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "items"));
                            foreach ($context['_seq'] as $context["itemKey"] => $context["itemCaption"]) {
                                // line 41
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
                                // line 42
                                echo "\t\t\t\t\t\t\t";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['itemKey'], $context['itemCaption'], $context['_parent'], $context['loop']);
                            $context = array_merge($_parent, array_intersect_key($context, $_parent));
                            echo "\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t";
                        }
                        // line 43
                        echo "\t\t\t\t
\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "datetime")) {
                        // line 44
                        echo "\t\t\t\t\t\t
\t\t\t\t\t";
                        // line 45
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"), "html", null, true);
                        echo "\t
\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "hidden")) {
                        // line 47
                        echo "\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "view")) {
                        // line 48
                        echo "\t\t\t\t\t";
                        echo $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method");
                        echo "\t
\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "password")) {
                        // line 50
                        echo "\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "typeahead")) {
                        // line 51
                        echo "\t\t\t\t\t";
                        if ((($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "associative", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "associative"), 1)) : (1))) {
                            // line 52
                            echo "\t\t\t\t\t";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["element"]) ? $context["element"] : null), "caption"), "html", null, true);
                            echo "\t
\t\t\t\t\t";
                        } else {
                            // line 54
                            echo "\t\t\t\t\t";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"), "html", null, true);
                            echo "\t
\t\t\t\t\t";
                        }
                        // line 56
                        echo "\t\t\t\t";
                    } elseif ((($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "button") || ($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "dialog"))) {
                        echo "\t
\t\t\t\t\t";
                        // line 57
                        if (((($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "showMode", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "showMode"), "view")) : ("view")) == "view")) {
                            // line 58
                            echo "\t\t\t\t<h4>
\t\t\t\t\t<span id=\"\" class=\"a-url btn ";
                            // line 59
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
                        // line 62
                        echo "\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "email")) {
                        // line 63
                        echo "\t\t\t\t\t";
                        if ($this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method")) {
                            // line 64
                            echo "\t\t\t\t\t<a href=\"mailto:";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"), "html", null, true);
                            echo "\">";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"), "html", null, true);
                            echo "</a>
\t\t\t\t\t";
                        }
                        // line 65
                        echo "\t
\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "url")) {
                        // line 66
                        echo "\t\t\t\t\t\t
\t\t\t\t\t\t<a href=\"";
                        // line 67
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"), "html", null, true);
                        echo "</a>\t
\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "raw")) {
                        // line 69
                        echo "\t\t\t\t\t\t";
                        echo $this->getAttribute((isset($context["element"]) ? $context["element"] : null), "value");
                        echo "
\t\t\t\t";
                    } else {
                        // line 70
                        echo "\t
\t\t\t\t\t";
                        // line 71
                        echo $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method");
                        echo "\t
\t\t\t\t";
                    }
                    // line 73
                    echo "\t\t\t\t";
                    if ($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "openUrl")) {
                        // line 74
                        echo "\t\t\t\t\t&nbsp;<a href=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["element"]) ? $context["element"] : null), "openUrl"), "html", null, true);
                        echo "\"><span class=\"glyphicon glyphicon-link\"></span></a>
\t\t\t\t";
                    }
                    // line 76
                    echo "\t\t\t\t\t
\t\t\t  ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['element'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 77
                echo "&nbsp;

\t\t\t</dd>\t
\t\t\t
\t\t";
                // line 82
                echo "\t\t";
            }
            echo "\t
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['groupKey'], $context['groupElement'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 83
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
        return array (  343 => 83,  334 => 82,  328 => 77,  321 => 76,  315 => 74,  312 => 73,  307 => 71,  304 => 70,  298 => 69,  291 => 67,  288 => 66,  284 => 65,  276 => 64,  273 => 63,  270 => 62,  258 => 59,  255 => 58,  253 => 57,  248 => 56,  242 => 54,  236 => 52,  233 => 51,  230 => 50,  224 => 48,  221 => 47,  216 => 45,  213 => 44,  209 => 43,  200 => 42,  186 => 41,  181 => 40,  171 => 37,  155 => 36,  151 => 35,  146 => 33,  137 => 31,  118 => 26,  115 => 25,  99 => 22,  94 => 21,  86 => 19,  79 => 17,  70 => 15,  67 => 14,  64 => 13,  58 => 10,  39 => 5,  24 => 2,  32 => 7,  25 => 4,  21 => 2,  19 => 1,  133 => 29,  127 => 28,  124 => 27,  121 => 39,  114 => 33,  108 => 24,  105 => 23,  89 => 20,  85 => 18,  82 => 17,  74 => 16,  71 => 33,  68 => 32,  65 => 25,  62 => 12,  59 => 17,  57 => 16,  54 => 15,  47 => 13,  41 => 6,  38 => 10,  36 => 9,  152 => 54,  143 => 32,  140 => 46,  132 => 42,  126 => 38,  122 => 37,  101 => 26,  98 => 25,  92 => 21,  90 => 20,  83 => 29,  73 => 23,  66 => 18,  49 => 17,  46 => 8,  44 => 7,  40 => 13,  37 => 4,  33 => 8,  30 => 3,  27 => 8,);
    }
}
