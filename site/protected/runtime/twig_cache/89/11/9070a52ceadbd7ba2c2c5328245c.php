<?php

/* vendors/toxus/views/layouts/_form.twig */
class __TwigTemplate_89119070a52ceadbd7ba2c2c5328245c extends Twig_Template
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
        $context["p"] = ((array_key_exists("prefix", $context)) ? (_twig_default_filter((isset($context["prefix"]) ? $context["prefix"] : null), "id-")) : ("id-"));
        // line 2
        $context["formId"] = (($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "id", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "id"), ((isset($context["p"]) ? $context["p"] : null) . "form"))) : (((isset($context["p"]) ? $context["p"] : null) . "form")));
        // line 3
        $context["model"] = ((array_key_exists("model", $context)) ? (_twig_default_filter((isset($context["model"]) ? $context["model"] : null), (isset($context["model"]) ? $context["model"] : null))) : ((isset($context["model"]) ? $context["model"] : null)));
        // line 4
        echo "<form class=\"";
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "class"), "form-horizontal")) : ("form-horizontal")), "html", null, true);
        echo " cls-";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["util"]) ? $context["util"] : null), "formId", array(0 => (isset($context["form"]) ? $context["form"] : null)), "method"), "html", null, true);
        echo "\" method=\"";
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "method", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "method"), "post")) : ("post")), "html", null, true);
        echo "\" action=\"";
        if ($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "action")) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "action"), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "request"), "url"), "html", null, true);
        }
        echo "\" ";
        if ($this->getAttribute((isset($context["model"]) ? $context["model"] : null), "isNewRecord")) {
            if ($this->getAttribute((isset($context["sub"]) ? $context["sub"] : null), "onCreateUrl")) {
                echo "action=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["sub"]) ? $context["sub"] : null), "onCreateUrl"), "html", null, true);
                echo "\"";
            } elseif ($this->getAttribute((isset($context["sub"]) ? $context["sub"] : null), "onEditUrl")) {
                echo "action=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["sub"]) ? $context["sub"] : null), "onEditUrl"), "html", null, true);
                echo "\"";
            }
        }
        echo "  id=\"";
        echo twig_escape_filter($this->env, (isset($context["formId"]) ? $context["formId"] : null), "html", null, true);
        echo "\" accept-charset=\"UTF-8\">
\t<fieldset>
";
        // line 11
        echo "\t\t";
        if ($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "controlWidth")) {
            $context["width"] = $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "controlWidth");
        } else {
            $context["width"] = (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "width", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "width"), "input-xlarge")) : ("input-xlarge"));
        }
        // line 12
        echo "\t\t";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "elements"));
        foreach ($context['_seq'] as $context["groupKey"] => $context["groupElement"]) {
            echo "\t\t\t
\t\t";
            // line 13
            if ((($this->getAttribute((isset($context["groupElement"]) ? $context["groupElement"] : null), "hidden") != true) && ($this->getAttribute((isset($context["groupElement"]) ? $context["groupElement"] : null), "formHidden") != true))) {
                // line 14
                echo "\t\t<div id=\"";
                echo twig_escape_filter($this->env, (isset($context["p"]) ? $context["p"] : null), "html", null, true);
                echo "group-";
                echo twig_escape_filter($this->env, (isset($context["groupKey"]) ? $context["groupKey"] : null), "html", null, true);
                echo "\" class=\"form-group";
                if ($this->getAttribute((isset($context["model"]) ? $context["model"] : null), "getErrors", array(0 => (isset($context["groupKey"]) ? $context["groupKey"] : null)), "method")) {
                    echo " error has-error";
                }
                echo "\">
\t\t\t";
                // line 15
                if (((($this->getAttribute((isset($context["groupElement"]) ? $context["groupElement"] : null), "type") != "checkbox") && ($this->getAttribute((isset($context["groupElement"]) ? $context["groupElement"] : null), "type") != "hidden")) && ($this->getAttribute((isset($context["groupElement"]) ? $context["groupElement"] : null), "hideLabel") != true))) {
                    // line 16
                    echo "\t\t\t<label for=\"";
                    echo twig_escape_filter($this->env, (isset($context["p"]) ? $context["p"] : null), "html", null, true);
                    echo twig_escape_filter($this->env, (isset($context["groupKey"]) ? $context["groupKey"] : null), "html", null, true);
                    echo "\" class=\"control-label ";
                    echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "labelClass", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "labelClass"), "col-lg-2")) : ("col-lg-2")), "html", null, true);
                    echo " no-left-paddingXXXX no-right-padding ";
                    if (($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "hasTooltip", array(0 => (isset($context["groupKey"]) ? $context["groupKey"] : null)), "method") || $this->getAttribute((isset($context["groupElement"]) ? $context["groupElement"] : null), "tooltip"))) {
                        echo " showtip\" data-toggle=\"tooltip\" data-placement=\"right\" data-trigger=\"hover\" data-original-title=\"";
                        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["groupElement"]) ? $context["groupElement"] : null), "tooltip", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["groupElement"]) ? $context["groupElement"] : null), "tooltip"), $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "tooltip", array(0 => (isset($context["groupKey"]) ? $context["groupKey"] : null)), "method"))) : ($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "tooltip", array(0 => (isset($context["groupKey"]) ? $context["groupKey"] : null)), "method"))), "html", null, true);
                    }
                    echo "\" >";
                    if ($this->getAttribute((isset($context["groupElement"]) ? $context["groupElement"] : null), "label")) {
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["groupElement"]) ? $context["groupElement"] : null), "label"), "html", null, true);
                    } else {
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "attributeLabel", array(0 => (isset($context["groupKey"]) ? $context["groupKey"] : null)), "method"), "html", null, true);
                    }
                    echo "&nbsp;
\t\t\t\t";
                    // line 17
                    if ($this->getAttribute((isset($context["groupElement"]) ? $context["groupElement"] : null), "helpUrl")) {
                        // line 18
                        echo "\t\t\t\t<a href=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["groupElement"]) ? $context["groupElement"] : null), "helpUrl"), "html", null, true);
                        echo "\" target=\"_blank\"><span class=\"badge label-help\">";
                        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["groupElement"]) ? $context["groupElement"] : null), "helpText", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["groupElement"]) ? $context["groupElement"] : null), "helpText"), "?")) : ("?")), "html", null, true);
                        echo "</span></a>
\t\t\t\t";
                    }
                    // line 20
                    echo "\t\t\t</label> 
\t\t\t";
                }
                // line 22
                echo "\t\t\t";
                // line 23
                echo "\t\t\t<div class=\"controls";
                if ((twig_length_filter($this->env, $this->getAttribute((isset($context["groupElement"]) ? $context["groupElement"] : null), "elements")) == 0)) {
                    echo " ";
                    if (($this->getAttribute((isset($context["groupElement"]) ? $context["groupElement"] : null), "type") == "checkbox")) {
                        echo "col-lg-offset-2";
                    }
                    echo " ";
                    if (($this->getAttribute((isset($context["groupElement"]) ? $context["groupElement"] : null), "hideLabel") != true)) {
                        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "controlClass", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "controlClass"), "col-lg-10")) : ("col-lg-10")), "html", null, true);
                    } else {
                        echo "col-lg-12";
                    }
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["groupElement"]) ? $context["groupElement"] : null), "width"), "html", null, true);
                }
                echo "\">
\t\t\t\t";
                // line 24
                if ((twig_length_filter($this->env, $this->getAttribute((isset($context["groupElement"]) ? $context["groupElement"] : null), "elements")) > 0)) {
                    // line 25
                    echo "\t\t\t\t\t";
                    $context["fields"] = $this->getAttribute((isset($context["groupElement"]) ? $context["groupElement"] : null), "elements");
                    // line 26
                    echo "\t\t\t\t";
                } else {
                    // line 27
                    echo "\t\t\t\t\t";
                    $context["fields"] = array((isset($context["groupKey"]) ? $context["groupKey"] : null) => (isset($context["groupElement"]) ? $context["groupElement"] : null));
                    echo " ";
                    // line 28
                    echo "\t\t\t\t";
                }
                echo "\t
\t\t\t\t";
                // line 33
                echo "\t\t\t\t";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["fields"]) ? $context["fields"] : null));
                foreach ($context['_seq'] as $context["key"] => $context["element"]) {
                    echo "\t
\t\t\t\t
\t\t\t\t";
                    // line 36
                    echo "\t\t\t\t";
                    if ($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "width")) {
                        // line 37
                        echo "\t\t\t\t\t<div class=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["element"]) ? $context["element"] : null), "width"), "html", null, true);
                        echo "\">
\t\t\t\t";
                    }
                    // line 38
                    echo "\t
\t\t
\t\t\t\t";
                    // line 40
                    if ($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "readOnly")) {
                        // line 41
                        echo "\t\t\t\t\t\t";
                        $context["readOnly"] = " disabled=\"disabled\"";
                        // line 42
                        echo "\t\t\t\t";
                    } else {
                        // line 43
                        echo "\t\t\t\t\t\t";
                        $context["readOnly"] = "";
                        // line 44
                        echo "\t\t\t\t";
                    }
                    // line 45
                    echo "\t\t\t\t\t\t
\t\t\t\t";
                    // line 46
                    if (((($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "dropdown") || ($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "vat")) || ($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "chosen"))) {
                        echo "\t\t\t\t\t\t\t
\t\t\t\t  ";
                        // line 47
                        if (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "vat")) {
                            // line 48
                            echo "\t\t\t\t\t<div class=\"input-prepend span4\">
\t\t\t\t\t\t<span class=\"add-on\">%</span>
\t\t\t\t\t";
                        } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "chosen")) {
                            // line 51
                            echo "\t\t\t\t\t\t";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "registerPackage", array(0 => "chosen", 1 => array("isAjax" => (isset($context["isAjax"]) ? $context["isAjax"] : null))), "method"), "html", null, true);
                            echo "
\t\t\t\t\t\t";
                            // line 53
                            echo "\t\t\t\t\t\t<input id=\"";
                            echo twig_escape_filter($this->env, (isset($context["p"]) ? $context["p"] : null), "html", null, true);
                            echo " ";
                            echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                            echo "-val\" type=\"hidden\" name=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "model"), "html", null, true);
                            echo "[";
                            echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                            echo "][]\" ";
                            echo twig_escape_filter($this->env, (isset($context["readOnly"]) ? $context["readOnly"] : null), "html", null, true);
                            echo "/>
\t\t\t\t\t";
                        }
                        // line 54
                        echo "\t
\t\t\t\t\t\t<select id=\"";
                        // line 55
                        echo twig_escape_filter($this->env, (isset($context["p"]) ? $context["p"] : null), "html", null, true);
                        echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                        echo "\" name=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "model"), "html", null, true);
                        echo "[";
                        echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                        echo "]";
                        if ($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "multi")) {
                            echo "[]";
                        }
                        echo "\" class=\"";
                        echo twig_escape_filter($this->env, (isset($context["elementwidth"]) ? $context["elementwidth"] : null), "html", null, true);
                        echo " ";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["element"]) ? $context["element"] : null), "class"), "html", null, true);
                        echo " form-control";
                        if (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "chosen")) {
                            echo " chosen-select";
                        }
                        echo "\" ";
                        if ($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "placeholder")) {
                            echo " data-placeholder=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["element"]) ? $context["element"] : null), "placeholder"), "html", null, true);
                            echo "\"";
                        }
                        if ($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "multi")) {
                            echo " multiple";
                        }
                        echo " ";
                        echo twig_escape_filter($this->env, (isset($context["readOnly"]) ? $context["readOnly"] : null), "html", null, true);
                        echo ">
\t\t\t\t\t";
                        // line 56
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "items"));
                        foreach ($context['_seq'] as $context["itemKey"] => $context["itemCaption"]) {
                            echo "\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<option value=\"";
                            // line 57
                            echo twig_escape_filter($this->env, (isset($context["itemKey"]) ? $context["itemKey"] : null), "html", null, true);
                            echo "\" ";
                            if ((twig_length_filter($this->env, $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method")) > 0)) {
                                if (twig_in_filter((isset($context["itemKey"]) ? $context["itemKey"] : null), $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"))) {
                                    echo "selected=\"1\"";
                                }
                            } else {
                                if (((isset($context["itemKey"]) ? $context["itemKey"] : null) == $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"))) {
                                    echo "selected=\"1\"";
                                }
                                echo " ";
                            }
                            echo " >";
                            if ((isset($context["itemCaption"]) ? $context["itemCaption"] : null)) {
                                echo twig_escape_filter($this->env, (isset($context["itemCaption"]) ? $context["itemCaption"] : null), "html", null, true);
                            } else {
                                echo "&nbsp;";
                            }
                            echo "</option>
\t\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['itemKey'], $context['itemCaption'], $context['_parent'], $context['loop']);
                        $context = array_merge($_parent, array_intersect_key($context, $_parent));
                        // line 59
                        echo "\t\t\t\t\t\t</select>
\t\t\t\t\t";
                        // line 60
                        if (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "vat")) {
                            // line 61
                            echo "\t\t\t\t\t</div>\t
\t\t\t\t\t";
                        }
                        // line 63
                        echo "\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "radiobuttonlist")) {
                        echo "\t
\t\t\t\t\t\t<input id=\"";
                        // line 64
                        echo twig_escape_filter($this->env, (isset($context["p"]) ? $context["p"] : null), "html", null, true);
                        echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                        echo "\" type=\"hidden\" name=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "model"), "html", null, true);
                        echo "[";
                        echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                        echo "]\" value=\"\" >
\t\t\t\t\t\t<span id=\"";
                        // line 65
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "model"), "html", null, true);
                        echo "_";
                        echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                        echo "\">
\t\t\t\t\t\t\t";
                        // line 66
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "items"));
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
                        foreach ($context['_seq'] as $context["itemKey"] => $context["itemCaption"]) {
                            // line 67
                            echo "\t\t\t\t\t\t\t\t<input id=\"";
                            echo twig_escape_filter($this->env, (isset($context["p"]) ? $context["p"] : null), "html", null, true);
                            echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                            echo "-";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index0"), "html", null, true);
                            echo "\" type=\"radio\" class=\"";
                            echo twig_escape_filter($this->env, (isset($context["p"]) ? $context["p"] : null), "html", null, true);
                            echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                            echo "\" name=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "model"), "html", null, true);
                            echo "[";
                            echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                            echo "]\" ";
                            if (($this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method") == (isset($context["itemKey"]) ? $context["itemKey"] : null))) {
                                echo "checked=\"1\"";
                            }
                            echo "value=\"";
                            echo twig_escape_filter($this->env, (isset($context["itemKey"]) ? $context["itemKey"] : null), "html", null, true);
                            echo "\" ";
                            echo twig_escape_filter($this->env, (isset($context["readOnly"]) ? $context["readOnly"] : null), "html", null, true);
                            echo ">
\t\t\t\t\t\t\t\t<label for=\"";
                            // line 68
                            echo twig_escape_filter($this->env, (isset($context["p"]) ? $context["p"] : null), "html", null, true);
                            echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                            echo "-";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index0"), "html", null, true);
                            echo "\" style=\"display:inline-block;padding-right:8px;margin-top:3px;\">";
                            echo twig_escape_filter($this->env, (isset($context["itemCaption"]) ? $context["itemCaption"] : null), "html", null, true);
                            echo "</label>\t\t
\t\t\t\t\t\t\t";
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
                        unset($context['_seq'], $context['_iterated'], $context['itemKey'], $context['itemCaption'], $context['_parent'], $context['loop']);
                        $context = array_merge($_parent, array_intersect_key($context, $_parent));
                        // line 70
                        echo "\t\t\t\t\t\t</span>\t
\t\t\t\t\t";
                        // line 71
                        echo " 
\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "textarea")) {
                        // line 73
                        echo "\t\t\t\t\t<textarea id=\"";
                        echo twig_escape_filter($this->env, (isset($context["p"]) ? $context["p"] : null), "html", null, true);
                        echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                        echo "\" name=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "model"), "html", null, true);
                        echo "[";
                        echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                        echo "]\" class=\"";
                        if ($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "class")) {
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["element"]) ? $context["element"] : null), "class"), "html", null, true);
                            echo " ";
                        } else {
                            echo twig_escape_filter($this->env, (isset($context["width"]) ? $context["width"] : null), "html", null, true);
                        }
                        echo " form-control\" rows=\"";
                        if ($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "rows")) {
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["element"]) ? $context["element"] : null), "rows"), "html", null, true);
                        } else {
                            echo "5";
                        }
                        echo "\" ";
                        echo twig_escape_filter($this->env, (isset($context["readOnly"]) ? $context["readOnly"] : null), "html", null, true);
                        echo ">";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"), "html", null, true);
                        echo "</textarea>
\t\t\t\t\t";
                        // line 74
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "registerPackage", array(0 => "elastic", 1 => array("isAjax" => (isset($context["isAjax"]) ? $context["isAjax"] : null))), "method"), "html", null, true);
                        echo "
\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "checkbox")) {
                        // line 75
                        echo "\t
\t\t\t\t\t";
                        // line 77
                        echo "\t\t\t\t\t<label class=\"checkbox ";
                        if ($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "style")) {
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["element"]) ? $context["element"] : null), "style"), "html", null, true);
                        }
                        echo "\"><input type=\"hidden\" name=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "model"), "html", null, true);
                        echo "[";
                        echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                        echo "]\" value=\"0\" /><input id=\"";
                        echo twig_escape_filter($this->env, (isset($context["p"]) ? $context["p"] : null), "html", null, true);
                        echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                        echo "\" name=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "model"), "html", null, true);
                        echo "[";
                        echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                        echo "]\" type=\"checkbox\" ";
                        if (($this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method") || ($this->getAttribute((isset($context["groupElement"]) ? $context["groupElement"] : null), "default") == 1))) {
                            echo "checked=\"1\"";
                        }
                        echo " value=\"1\" ";
                        echo twig_escape_filter($this->env, (isset($context["readOnly"]) ? $context["readOnly"] : null), "html", null, true);
                        echo "/>";
                        if ($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "label")) {
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["element"]) ? $context["element"] : null), "label"), "html", null, true);
                        } else {
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "attributeLabel", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"), "html", null, true);
                        }
                        echo "</label>
\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "image")) {
                        // line 79
                        echo "\t\t\t\t\t";
                        echo $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "image", array(0 => (isset($context["model"]) ? $context["model"] : null), 1 => (isset($context["key"]) ? $context["key"] : null)), "method");
                        echo "\t\t\t\t\t\t\t\t
\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "finder")) {
                        // line 81
                        echo "\t\t\t\t\t";
                        echo $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "widget", array(0 => "toxus.extensions.elFinder.ServerFileInput", 1 => array("model" => (isset($context["model"]) ? $context["model"] : null), "attribute" => (isset($context["key"]) ? $context["key"] : null), "connectorRoute" => "elFinder/connector", "settings" => $this->getAttribute((isset($context["element"]) ? $context["element"] : null), "options"), "buttonCaption" => (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "buttonCaption", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "buttonCaption"), "Browse")) : ("Browse"))), 2 => true), "method");
                        // line 90
                        echo "\t\t
\t\t\t\t\t";
                        // line 92
                        echo "\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "html2")) {
                        echo "\t\t\t\t\t\t
\t\t\t\t\t";
                        // line 93
                        echo $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "htmlEditor", array(0 => (isset($context["model"]) ? $context["model"] : null), 1 => (isset($context["key"]) ? $context["key"] : null)), "method");
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "html")) {
                        // line 95
                        echo "\t\t\t\t\t";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "registerPackage", array(0 => "tinymce", 1 => array("isAjax" => (isset($context["isAjax"]) ? $context["isAjax"] : null))), "method"), "html", null, true);
                        echo "\t
\t\t\t\t\t<textarea id=\"";
                        // line 96
                        echo twig_escape_filter($this->env, (isset($context["p"]) ? $context["p"] : null), "html", null, true);
                        echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                        echo "\" name=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "model"), "html", null, true);
                        echo "[";
                        echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                        echo "]\" class=\"tinymce form-control ";
                        if ($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "class")) {
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["element"]) ? $context["element"] : null), "class"), "html", null, true);
                            echo " ";
                        } else {
                            echo twig_escape_filter($this->env, (isset($context["width"]) ? $context["width"] : null), "html", null, true);
                        }
                        echo "\" rows=\"";
                        if ($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "rows")) {
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["element"]) ? $context["element"] : null), "rows"), "html", null, true);
                        } else {
                            echo "5";
                        }
                        echo "\"";
                        echo twig_escape_filter($this->env, (isset($context["readOnly"]) ? $context["readOnly"] : null), "html", null, true);
                        echo ">";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"), "html", null, true);
                        echo "</textarea>
\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "code")) {
                        // line 98
                        echo "\t\t\t\t\t";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "registerPackage", array(0 => "code", 1 => array("isAjax" => (isset($context["isAjax"]) ? $context["isAjax"] : null))), "method"), "html", null, true);
                        echo "
\t\t\t\t\t";
                        // line 99
                        if (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "sourceType") == "html")) {
                            // line 100
                            echo "\t\t\t\t\t\t";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "registerPackage", array(0 => "code-html", 1 => array("isAjax" => (isset($context["isAjax"]) ? $context["isAjax"] : null))), "method"), "html", null, true);
                            echo "
\t\t\t\t\t";
                        }
                        // line 101
                        echo "\t
\t\t\t\t\t<textarea id=\"";
                        // line 102
                        echo twig_escape_filter($this->env, (isset($context["p"]) ? $context["p"] : null), "html", null, true);
                        echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                        echo "\" name=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "model"), "html", null, true);
                        echo "[";
                        echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                        echo "]\" class=\"code-";
                        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "sourceType", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "sourceType"), "html")) : ("html")), "html", null, true);
                        echo " form-control ";
                        if ($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "class")) {
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["element"]) ? $context["element"] : null), "class"), "html", null, true);
                            echo " ";
                        } else {
                            echo twig_escape_filter($this->env, (isset($context["width"]) ? $context["width"] : null), "html", null, true);
                        }
                        echo "\" rows=\"";
                        if ($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "rows")) {
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["element"]) ? $context["element"] : null), "rows"), "html", null, true);
                        } else {
                            echo "5";
                        }
                        echo "\"";
                        echo twig_escape_filter($this->env, (isset($context["readOnly"]) ? $context["readOnly"] : null), "html", null, true);
                        echo ">";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"), "html", null, true);
                        echo "</textarea>
\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "mask")) {
                        // line 104
                        echo "\t\t\t\t\t<input id=\"";
                        echo twig_escape_filter($this->env, (isset($context["p"]) ? $context["p"] : null), "html", null, true);
                        echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                        echo "\" name=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "model"), "html", null, true);
                        echo "[";
                        echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                        echo "]\" type=\"text\" class=\"";
                        echo twig_escape_filter($this->env, (isset($context["width"]) ? $context["width"] : null), "html", null, true);
                        echo " form-control\" value=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"), "html", null, true);
                        echo "\" ";
                        if ((twig_length_filter($this->env, (isset($context["fields"]) ? $context["fields"] : null)) > 1)) {
                            echo " placeholder=\"";
                            if ($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "label")) {
                                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["element"]) ? $context["element"] : null), "label"), "html", null, true);
                            } else {
                                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "attributeLabel", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"), "html", null, true);
                            }
                            echo "\"";
                        }
                        echo " maxlength=\"";
                        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "maxLength", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "maxLength"), 255)) : (255)), "html", null, true);
                        echo "\"";
                        echo twig_escape_filter($this->env, (isset($context["readOnly"]) ? $context["readOnly"] : null), "html", null, true);
                        echo "/> \t\t\t\t
\t\t\t\t\t";
                        // line 105
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "registerPackage", array(0 => "inputmask", 1 => array("isAjax" => (isset($context["isAjax"]) ? $context["isAjax"] : null), "executeAfterLoad" => ((((("\$(\"#" . (isset($context["p"]) ? $context["p"] : null)) . (isset($context["key"]) ? $context["key"] : null)) . "\").inputmask({\"mask\": \"") . $this->getAttribute((isset($context["element"]) ? $context["element"] : null), "mask")) . "\"})"))), "method"), "html", null, true);
                        // line 106
                        echo "
\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "date")) {
                        // line 107
                        echo "\t\t\t\t\t\t
\t\t\t\t\t<div class=\"input-prepend date\">\t\t\t\t\t\t\t
\t\t\t\t\t\t<input id=\"";
                        // line 109
                        echo twig_escape_filter($this->env, (isset($context["p"]) ? $context["p"] : null), "html", null, true);
                        echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                        echo "\" name=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "model"), "html", null, true);
                        echo "[";
                        echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                        echo "]\" size=\"16\" type=\"date\" value=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"), "html", null, true);
                        echo "\" class=\" form-control input-date\" data-date-format=\"";
                        echo $this->getAttribute((isset($context["format"]) ? $context["format"] : null), "dateFormat", array(), "method");
                        echo "\" ";
                        if ($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "calendarWeeks")) {
                            echo "data-date-calendar-weeks=\"true\"";
                        }
                        echo twig_escape_filter($this->env, (isset($context["readOnly"]) ? $context["readOnly"] : null), "html", null, true);
                        echo ">\t\t\t\t\t\t
\t\t\t\t\t</div>\t
\t\t\t\t\t";
                        // line 111
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "registerPackage", array(0 => "datepicker", 1 => array("isAjax" => (isset($context["isAjax"]) ? $context["isAjax"] : null), "executeAfterLoad" => ((("if (!window.Modernizr.inputtypes.date) { /* bugfix Chrome buildin picker */
\t\$('.input-date').datepicker({" . "language : '") . $this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "config"), "language")) . "',
\t\tautoclose: true
\t});
}
"))), "method"), "html", null, true);
                        // line 118
                        echo "
\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "hidden")) {
                        // line 120
                        echo "\t\t\t\t\t<input type=\"hidden\" id=\"";
                        echo twig_escape_filter($this->env, (isset($context["p"]) ? $context["p"] : null), "html", null, true);
                        echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                        echo "\" name=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "model"), "html", null, true);
                        echo "[";
                        echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                        echo "]\" value=\"";
                        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "value", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "value"), $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"))) : ($this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"))), "html", null, true);
                        echo "\" />\t
\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "view")) {
                        // line 122
                        echo "\t\t\t\t\t";
                        echo $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "renderPartial", array(0 => $this->getAttribute((isset($context["element"]) ? $context["element"] : null), "view"), 1 => array("model" => $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"))), "method");
                        echo "
\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "password")) {
                        // line 124
                        echo "\t\t\t\t\t<input id=\"";
                        echo twig_escape_filter($this->env, (isset($context["p"]) ? $context["p"] : null), "html", null, true);
                        echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                        echo "\" name=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "model"), "html", null, true);
                        echo "[";
                        echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                        echo "]\" type=\"password\" class=\"";
                        echo twig_escape_filter($this->env, (isset($context["width"]) ? $context["width"] : null), "html", null, true);
                        echo " form-control\" value=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"), "html", null, true);
                        echo "\"";
                        echo twig_escape_filter($this->env, (isset($context["readOnly"]) ? $context["readOnly"] : null), "html", null, true);
                        echo "/> 
\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "typeahead.old")) {
                        // line 126
                        echo "\t\t\t\t\t";
                        if (((($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "associative", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "associative"), 1)) : (1)) == 1)) {
                            // line 127
                            echo "\t\t\t\t\t
\t\t\t\t\t<input id=\"";
                            // line 128
                            echo twig_escape_filter($this->env, (isset($context["p"]) ? $context["p"] : null), "html", null, true);
                            echo "input-";
                            echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                            echo "\" type=\"text\" class=\"";
                            echo twig_escape_filter($this->env, (isset($context["width"]) ? $context["width"] : null), "html", null, true);
                            echo "  form-control\" value=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["element"]) ? $context["element"] : null), "caption"), "html", null, true);
                            echo "\"";
                            echo twig_escape_filter($this->env, (isset($context["readOnly"]) ? $context["readOnly"] : null), "html", null, true);
                            echo "/>
\t\t\t\t\t<input id=\"";
                            // line 129
                            echo twig_escape_filter($this->env, (isset($context["p"]) ? $context["p"] : null), "html", null, true);
                            echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                            echo "\" name=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "model"), "html", null, true);
                            echo "[";
                            echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                            echo "]\" type=\"hidden\" value=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"), "html", null, true);
                            echo "\">
\t";
                            // line 130
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "registerPackage", array(0 => "typeahead", 1 => array("isAjax" => (isset($context["isAjax"]) ? $context["isAjax"] : null), "executeAfterLoad" => ((((((((((((("
  s = '#" . (isset($context["p"]) ? $context["p"] : null)) . "input-") . (isset($context["key"]) ? $context["key"] : null)) . "';
\t\$(s).typeahead({
\t\tname:'search-") . (isset($context["key"]) ? $context["key"] : null)) . "',
\t\tremote:'") . $this->getAttribute((isset($context["element"]) ? $context["element"] : null), "url")) . "%QUERY'
\t});
\t\$(s).on('typeahead:selected typeahead:autocompleted', function(e,datum, p) {
\t\t\$('#") . (isset($context["p"]) ? $context["p"] : null)) . (isset($context["key"]) ? $context["key"] : null)) . "').val(datum.id);
\t\t") . $this->getAttribute((isset($context["element"]) ? $context["element"] : null), "onChange")) . "
\t});
"))), "method"), "html", null, true);
                            // line 140
                            echo "
\t\t\t\t\t";
                        } else {
                            // line 142
                            echo "\t\t\t\t\t<input id=\"";
                            echo twig_escape_filter($this->env, (isset($context["p"]) ? $context["p"] : null), "html", null, true);
                            echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                            echo "\" name=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "model"), "html", null, true);
                            echo "[";
                            echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                            echo "]\" type=\"text\" class=\"";
                            echo twig_escape_filter($this->env, (isset($context["width"]) ? $context["width"] : null), "html", null, true);
                            echo "  form-control\" value=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"), "html", null, true);
                            echo "\"";
                            echo twig_escape_filter($this->env, (isset($context["readOnly"]) ? $context["readOnly"] : null), "html", null, true);
                            echo "/>
\t";
                            // line 143
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "registerPackage", array(0 => "typeahead", 1 => array("isAjax" => (isset($context["isAjax"]) ? $context["isAjax"] : null), "executeAfterLoad" => ((((((("
  s = '#" . (isset($context["p"]) ? $context["p"] : null)) . (isset($context["key"]) ? $context["key"] : null)) . "';
\t\$(s).typeahead({
\t\tname:'search-") . (isset($context["key"]) ? $context["key"] : null)) . "',
\t\tremote:'") . $this->getAttribute((isset($context["element"]) ? $context["element"] : null), "url")) . "%QUERY'
\t});
"))), "method"), "html", null, true);
                            // line 149
                            echo "
\t\t\t\t\t
\t\t\t\t\t";
                        }
                        // line 152
                        echo "\t\t\t\t\t
\t\t\t\t\t";
                        // line 166
                        echo "\t\t\t\t\t
\t\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "typeahead")) {
                        // line 168
                        echo "\t\t\t\t\t";
                        if (((($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "associative", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "associative"), 1)) : (1)) == 1)) {
                            echo "\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t<input id=\"";
                            // line 169
                            echo twig_escape_filter($this->env, (isset($context["p"]) ? $context["p"] : null), "html", null, true);
                            echo "input-";
                            echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                            echo "\" type=\"text\" class=\"";
                            echo twig_escape_filter($this->env, (isset($context["width"]) ? $context["width"] : null), "html", null, true);
                            echo "  form-control\" value=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["element"]) ? $context["element"] : null), "caption"), "html", null, true);
                            echo "\"";
                            echo twig_escape_filter($this->env, (isset($context["readOnly"]) ? $context["readOnly"] : null), "html", null, true);
                            echo "/>
\t\t\t\t\t<input id=\"";
                            // line 170
                            echo twig_escape_filter($this->env, (isset($context["p"]) ? $context["p"] : null), "html", null, true);
                            echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                            echo "\" name=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "model"), "html", null, true);
                            echo "[";
                            echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                            echo "]\" type=\"hidden\" value=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"), "html", null, true);
                            echo "\">
\t\t\t\t\t";
                        } else {
                            // line 172
                            echo "\t\t\t\t\t<input id=\"";
                            echo twig_escape_filter($this->env, (isset($context["p"]) ? $context["p"] : null), "html", null, true);
                            echo "input-";
                            echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                            echo "\" name=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "model"), "html", null, true);
                            echo "[";
                            echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                            echo "]\" type=\"text\" class=\"";
                            echo twig_escape_filter($this->env, (isset($context["width"]) ? $context["width"] : null), "html", null, true);
                            echo "  form-control\" value=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"), "html", null, true);
                            echo "\"";
                            echo twig_escape_filter($this->env, (isset($context["readOnly"]) ? $context["readOnly"] : null), "html", null, true);
                            echo "/>
\t\t\t\t\t";
                        }
                        // line 174
                        echo "\t";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "registerPackage", array(0 => "typeahead", 1 => array("isAjax" => (isset($context["isAjax"]) ? $context["isAjax"] : null), "executeAfterLoad" => (((((((((((((((((((((((((((("
\tvar items" . (isset($context["key"]) ? $context["key"] : null)) . " = new Bloodhound({
\t\tdatumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
\t\tqueryTokenizer: Bloodhound.tokenizers.whitespace,
\t\tlimit: 20,
\t\tremote: { 
\t\t\turl: '") . $this->getAttribute((isset($context["element"]) ? $context["element"] : null), "url")) . "%QUERY',
      wildcard: '%QUERY',
\t\t\tajax : {
\t\t\t\tbeforeSend: function(jqXhr, settings){
          console.log('before.send.done');
\t\t\t\t\t\$('#") . (isset($context["p"]) ? $context["p"] : null)) . (isset($context["key"]) ? $context["key"] : null)) . "').val('');
\t\t\t\t}
\t\t\t}
\t\t}\t
  });
\titems") . (isset($context["key"]) ? $context["key"] : null)) . ".initialize();

\t\$('#") . (isset($context["p"]) ? $context["p"] : null)) . "input-") . (isset($context["key"]) ? $context["key"] : null)) . "').typeahead(null, {
\t\tname: 'items") . (isset($context["key"]) ? $context["key"] : null)) . "',
\t\tdisplayKey: '") . (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "displayKey", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "displayKey"), "value")) : ("value"))) . "',
\t\thighlight: true,
\t\tsource: items") . (isset($context["key"]) ? $context["key"] : null)) . ".ttAdapter()
\t});

\t\$('#") . (isset($context["p"]) ? $context["p"] : null)) . "input-") . (isset($context["key"]) ? $context["key"] : null)) . "').bind('typeahead:selected', function(obj, datum, name) {      
\t\t\$('#") . (isset($context["p"]) ? $context["p"] : null)) . (isset($context["key"]) ? $context["key"] : null)) . "').val(datum.") . (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "idKey", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "idKey"), "id")) : ("id"))) . ");
\t//\tconsole.log(obj,datum,name);
\t});

"))), "method"), "html", null, true);
                        // line 204
                        echo "
\t\t\t\t\t\t
\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "currency")) {
                        // line 207
                        echo "\t\t\t\t\t";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "registerPackage", array(0 => "currency", 1 => array("isAjax" => (isset($context["isAjax"]) ? $context["isAjax"] : null))), "method"), "html", null, true);
                        echo "
\t\t\t\t\t<div class=\"input-prepend\">
\t\t\t\t\t\t<span class=\"add-on\">";
                        // line 209
                        echo $this->getAttribute((isset($context["format"]) ? $context["format"] : null), "currencySymbolHtml", array(), "method");
                        echo "</span>
\t\t\t\t\t\t<input id=\"";
                        // line 210
                        echo twig_escape_filter($this->env, (isset($context["p"]) ? $context["p"] : null), "html", null, true);
                        echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                        echo "\" name=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "model"), "html", null, true);
                        echo "[";
                        echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                        echo "]\" type=\"text\" class=\"input-currency span6\" value=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"), "html", null, true);
                        echo "\" ";
                        if ((twig_length_filter($this->env, (isset($context["fields"]) ? $context["fields"] : null)) > 1)) {
                            echo " placeholder=\"";
                            if ($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "label")) {
                                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["element"]) ? $context["element"] : null), "label"), "html", null, true);
                            } else {
                                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "attributeLabel", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"), "html", null, true);
                            }
                            echo "\"";
                        }
                        echo " maxlength=\"";
                        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "maxLength", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "maxLength"), 255)) : (255)), "html", null, true);
                        echo "\" style=\"text-align: right;\" ";
                        echo twig_escape_filter($this->env, (isset($context["readOnly"]) ? $context["readOnly"] : null), "html", null, true);
                        echo "/> \t\t\t\t\t
\t\t\t\t\t</div>\t
\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "button")) {
                        // line 213
                        echo "\t\t\t\t\t<span id=\"";
                        echo twig_escape_filter($this->env, (isset($context["p"]) ? $context["p"] : null), "html", null, true);
                        echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                        echo "\" class=\"btn ";
                        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "style", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "style"), "btn-primary")) : ("btn-primary")), "html", null, true);
                        echo "\"";
                        echo $this->getAttribute((isset($context["element"]) ? $context["element"] : null), "popover");
                        echo twig_escape_filter($this->env, (isset($context["readOnly"]) ? $context["readOnly"] : null), "html", null, true);
                        echo ">";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["element"]) ? $context["element"] : null), "caption"), "html", null, true);
                        echo "</span>
";
                        // line 214
                        if ($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "script")) {
                            echo "\t\t\t\t\t
";
                            // line 215
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "onReady", array(0 => ((((("\$('#" . (isset($context["p"]) ? $context["p"] : null)) . (isset($context["key"]) ? $context["key"] : null)) . "').click(function() {
\t") . $this->getAttribute((isset($context["element"]) ? $context["element"] : null), "script")) . "
});")), "method"), "html", null, true);
                            // line 218
                            echo "
";
                        }
                        // line 220
                        if ($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "url")) {
                            // line 221
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "onReady", array(0 => ((((("\$('#" . (isset($context["p"]) ? $context["p"] : null)) . (isset($context["key"]) ? $context["key"] : null)) . "').click(function() {
\twindow.location='") . $this->getAttribute((isset($context["element"]) ? $context["element"] : null), "url")) . "'
});")), "method"), "html", null, true);
                            // line 224
                            echo "\t\t\t\t\t
";
                        }
                        // line 225
                        echo "\t\t\t\t\t
";
                        // line 226
                        if ($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "popover")) {
                            // line 227
                            echo "\t";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "onReady", array(0 => ((("\$('#" . (isset($context["p"]) ? $context["p"] : null)) . (isset($context["key"]) ? $context["key"] : null)) . "').popover({trigger:'hover'});")), "method"), "html", null, true);
                            echo "
";
                        }
                        // line 229
                        echo "\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "dialog")) {
                        // line 230
                        echo "\t\t\t\t<a data-target=\"#id-modal\" role=\"button\" class=\"btn ";
                        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "style", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "style"), "btn-primary")) : ("btn-primary")), "html", null, true);
                        echo "\" data-toggle=\"modal\" href=\"#\" data-remote=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["element"]) ? $context["element"] : null), "remote"), "html", null, true);
                        echo "\"  >";
                        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "caption", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "caption"), "click")) : ("click")), "html", null, true);
                        echo "</a>
\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "panel")) {
                        // line 232
                        echo "\t\t\t\t<div id=\"";
                        echo twig_escape_filter($this->env, (isset($context["p"]) ? $context["p"] : null), "html", null, true);
                        echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                        echo "\" class=\"form-control\" style=\"height: auto; min-height: 34px;\">";
                        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "caption", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "caption"), $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"))) : ($this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"))), "html", null, true);
                        echo "</div>
\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "email")) {
                        // line 234
                        echo "\t\t\t\t\t<input id=\"";
                        echo twig_escape_filter($this->env, (isset($context["p"]) ? $context["p"] : null), "html", null, true);
                        echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                        echo "\" name=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "model"), "html", null, true);
                        echo "[";
                        echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                        echo "]\" type=\"email\" class=\"";
                        echo twig_escape_filter($this->env, (isset($context["width"]) ? $context["width"] : null), "html", null, true);
                        echo " form-control\" value=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"), "html", null, true);
                        echo "\" ";
                        if ((twig_length_filter($this->env, (isset($context["fields"]) ? $context["fields"] : null)) > 1)) {
                            echo " placeholder=\"";
                            if ($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "label")) {
                                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["element"]) ? $context["element"] : null), "label"), "html", null, true);
                            } else {
                                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "attributeLabel", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"), "html", null, true);
                            }
                            echo "\"";
                        }
                        echo " maxlength=\"";
                        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "maxLength", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "maxLength"), 255)) : (255)), "html", null, true);
                        echo "\"";
                        echo twig_escape_filter($this->env, (isset($context["readOnly"]) ? $context["readOnly"] : null), "html", null, true);
                        echo "/> \t\t\t\t
\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "raw")) {
                        // line 236
                        echo "\t\t\t\t\t";
                        echo $this->getAttribute((isset($context["element"]) ? $context["element"] : null), "value");
                        echo "
\t\t\t\t";
                    } else {
                        // line 238
                        echo "\t\t\t\t\t<input id=\"";
                        echo twig_escape_filter($this->env, (isset($context["p"]) ? $context["p"] : null), "html", null, true);
                        echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                        echo "\" name=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "model"), "html", null, true);
                        echo "[";
                        echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                        echo "]\" type=\"text\" class=\"";
                        echo twig_escape_filter($this->env, (isset($context["width"]) ? $context["width"] : null), "html", null, true);
                        echo " form-control\"";
                        echo twig_escape_filter($this->env, (isset($context["readOnly"]) ? $context["readOnly"] : null), "html", null, true);
                        echo " value=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"), "html", null, true);
                        echo "\" ";
                        if ((twig_length_filter($this->env, (isset($context["fields"]) ? $context["fields"] : null)) > 1)) {
                            echo " placeholder=\"";
                            if ($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "label")) {
                                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["element"]) ? $context["element"] : null), "label"), "html", null, true);
                            } else {
                                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "attributeLabel", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"), "html", null, true);
                            }
                            echo "\"";
                        }
                        echo " maxlength=\"";
                        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "maxLength", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "maxLength"), 255)) : (255)), "html", null, true);
                        echo "\"/> 
\t\t\t\t";
                    }
                    // line 240
                    echo "\t\t\t\t
\t\t\t\t";
                    // line 241
                    if ($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "width")) {
                        // line 242
                        echo "\t\t\t\t</div>\t
\t\t\t\t";
                    }
                    // line 244
                    echo "\t\t\t  ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['element'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                echo "\t

\t\t\t";
                // line 246
                if (($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "showErrors") && $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "getErrors", array(0 => (isset($context["groupKey"]) ? $context["groupKey"] : null)), "method"))) {
                    // line 247
                    echo "\t\t\t\t<div class=\"text-danger\">
\t\t\t\t\t";
                    // line 248
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["model"]) ? $context["model"] : null), "getErrors", array(0 => (isset($context["groupKey"]) ? $context["groupKey"] : null)), "method"));
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
                    foreach ($context['_seq'] as $context["_key"] => $context["e"]) {
                        // line 249
                        echo "\t\t\t\t\t";
                        echo twig_escape_filter($this->env, (isset($context["e"]) ? $context["e"] : null), "html", null, true);
                        echo " ";
                        if ((!$this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "last"))) {
                            echo "<br/>";
                        }
                        // line 250
                        echo "\t\t\t\t\t";
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
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['e'], $context['_parent'], $context['loop']);
                    $context = array_merge($_parent, array_intersect_key($context, $_parent));
                    // line 251
                    echo "\t\t\t\t</div>
\t\t\t";
                }
                // line 252
                echo "\t
\t\t\t</div>\t\t\t\t
\t\t</div>
\t\t
\t\t";
            }
            // line 257
            echo "\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['groupKey'], $context['groupElement'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo "\t
\t\t
\t</fieldset>
</form>
";
        // line 261
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "onReady", array(0 => "\$(\".showtip\").tooltip();"), "method"), "html", null, true);
        echo "

";
        // line 263
        if (($this->getAttribute((isset($context["sub"]) ? $context["sub"] : null), "isAjax") || $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "script"))) {
            // line 264
            echo "<script type=\"text/javascript\">
";
            // line 265
            if ($this->getAttribute((isset($context["sub"]) ? $context["sub"] : null), "isAjax")) {
                echo "\t
\t
\t";
                // line 267
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "registerPackage", array(0 => "ajaxForm", 1 => array("isAjax" => true, "executeAfterLoad" => (((((((((("\tvar options = {
\t\ttarget : '" . (($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "refreshDiv", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "refreshDiv"), ("#" . $this->getAttribute((isset($context["sub"]) ? $context["sub"] : null), "slaveFrame")))) : (("#" . $this->getAttribute((isset($context["sub"]) ? $context["sub"] : null), "slaveFrame"))))) . "',
\t\tsuccess : processResponse
\t};
\t\$('#") . $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "id")) . "').ajaxForm(options);\t\t
\tfunction processResponse(responseText, statusText, xhr, \$form) {
\tif (responseText == 'ok') {/* ok: load information in a div */
\t\t\$('") . (($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "refreshDiv", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "refreshDiv"), ("#" . $this->getAttribute((isset($context["sub"]) ? $context["sub"] : null), "masterFrame")))) : (("#" . $this->getAttribute((isset($context["sub"]) ? $context["sub"] : null), "masterFrame"))))) . "').load('/* this is an error: sub.onRefreshUrl */');
\t} else\tif (responseText == 'url') {/* ok, but open an other page */
\t\twindow.location = '") . $this->getAttribute((isset($context["sub"]) ? $context["sub"] : null), "refreshUrl")) . "';
\t}\telse {
\t\t\$('") . (($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "refreshDiv", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "refreshDiv"), ("#" . $this->getAttribute((isset($context["sub"]) ? $context["sub"] : null), "slaveFrame")))) : (("#" . $this->getAttribute((isset($context["sub"]) ? $context["sub"] : null), "slaveFrame"))))) . "').html(responseText);
\t}
};
"))), "method"), "html", null, true);
                // line 282
                echo "


";
            }
            // line 286
            echo "
</script>\t
";
        }
        // line 289
        echo "

";
        // line 291
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "onReady", array(0 => $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "onReady")), "method"), "html", null, true);
        echo "

";
        // line 293
        if ($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "script")) {
            // line 294
            echo "\t";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "registerScript", array(0 => "main-script", 1 => $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "script")), "method"), "html", null, true);
            echo "
";
        }
    }

    public function getTemplateName()
    {
        return "vendors/toxus/views/layouts/_form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1124 => 294,  1122 => 293,  1117 => 291,  1113 => 289,  1108 => 286,  1102 => 282,  1086 => 267,  1081 => 265,  1078 => 264,  1076 => 263,  1071 => 261,  1060 => 257,  1053 => 252,  1049 => 251,  1035 => 250,  1028 => 249,  1011 => 248,  1008 => 247,  1006 => 246,  997 => 244,  993 => 242,  991 => 241,  988 => 240,  959 => 238,  953 => 236,  924 => 234,  915 => 232,  905 => 230,  902 => 229,  896 => 227,  894 => 226,  891 => 225,  887 => 224,  883 => 221,  881 => 220,  877 => 218,  873 => 215,  869 => 214,  856 => 213,  829 => 210,  825 => 209,  819 => 207,  814 => 204,  781 => 174,  763 => 172,  751 => 170,  739 => 169,  734 => 168,  730 => 166,  727 => 152,  722 => 149,  714 => 143,  698 => 142,  694 => 140,  682 => 130,  671 => 129,  653 => 126,  636 => 124,  630 => 122,  613 => 118,  606 => 111,  587 => 109,  583 => 107,  579 => 106,  520 => 102,  517 => 101,  509 => 99,  477 => 96,  472 => 95,  467 => 93,  462 => 92,  459 => 90,  450 => 79,  419 => 77,  411 => 74,  384 => 73,  380 => 71,  377 => 70,  333 => 67,  292 => 61,  287 => 59,  262 => 57,  256 => 56,  221 => 54,  207 => 53,  195 => 47,  188 => 45,  185 => 44,  170 => 38,  164 => 37,  161 => 36,  153 => 33,  148 => 28,  144 => 27,  141 => 26,  138 => 25,  136 => 24,  119 => 23,  105 => 18,  84 => 16,  82 => 15,  62 => 12,  55 => 11,  40 => 14,  21 => 2,  23 => 3,  135 => 38,  131 => 36,  125 => 35,  120 => 33,  93 => 25,  72 => 11,  61 => 9,  58 => 8,  49 => 6,  36 => 5,  29 => 9,  25 => 4,  133 => 29,  128 => 27,  122 => 26,  117 => 22,  110 => 23,  106 => 21,  100 => 28,  97 => 19,  90 => 16,  79 => 13,  76 => 12,  70 => 10,  59 => 8,  34 => 11,  27 => 36,  22 => 41,  19 => 1,  775 => 264,  771 => 261,  768 => 260,  752 => 221,  742 => 220,  732 => 219,  724 => 218,  718 => 222,  715 => 221,  712 => 220,  709 => 219,  707 => 218,  703 => 216,  700 => 215,  695 => 209,  681 => 208,  674 => 204,  668 => 203,  665 => 202,  659 => 128,  656 => 127,  638 => 197,  635 => 196,  628 => 190,  625 => 189,  621 => 188,  617 => 120,  614 => 186,  611 => 185,  600 => 180,  591 => 178,  585 => 175,  581 => 174,  577 => 105,  574 => 172,  571 => 171,  565 => 224,  563 => 215,  556 => 210,  554 => 196,  549 => 104,  547 => 185,  542 => 182,  540 => 171,  535 => 168,  532 => 167,  527 => 143,  522 => 139,  516 => 130,  511 => 100,  504 => 98,  501 => 97,  495 => 91,  489 => 90,  486 => 89,  480 => 100,  478 => 97,  474 => 95,  471 => 93,  469 => 89,  464 => 87,  461 => 86,  456 => 81,  448 => 77,  444 => 75,  441 => 74,  435 => 68,  426 => 61,  423 => 60,  418 => 81,  416 => 75,  408 => 69,  404 => 68,  399 => 66,  394 => 63,  391 => 60,  385 => 56,  383 => 55,  374 => 48,  371 => 47,  366 => 43,  359 => 41,  356 => 68,  351 => 38,  348 => 37,  345 => 36,  342 => 35,  335 => 43,  332 => 40,  329 => 35,  326 => 34,  321 => 28,  316 => 66,  310 => 65,  301 => 64,  296 => 63,  294 => 264,  290 => 60,  288 => 260,  276 => 254,  264 => 245,  257 => 240,  249 => 232,  241 => 226,  239 => 167,  234 => 164,  224 => 55,  218 => 142,  214 => 141,  209 => 139,  206 => 138,  197 => 48,  194 => 135,  189 => 133,  184 => 131,  179 => 42,  177 => 128,  174 => 40,  160 => 121,  156 => 119,  154 => 118,  149 => 116,  146 => 115,  143 => 105,  137 => 30,  132 => 84,  129 => 83,  127 => 47,  118 => 34,  116 => 33,  113 => 20,  99 => 24,  95 => 23,  91 => 22,  88 => 23,  85 => 14,  81 => 22,  73 => 17,  69 => 13,  65 => 15,  56 => 7,  280 => 255,  252 => 106,  236 => 93,  228 => 145,  222 => 143,  219 => 85,  216 => 84,  205 => 81,  202 => 51,  196 => 78,  191 => 46,  182 => 43,  176 => 41,  167 => 124,  163 => 66,  159 => 65,  151 => 63,  147 => 62,  142 => 59,  139 => 103,  124 => 45,  121 => 45,  114 => 40,  111 => 39,  108 => 38,  96 => 29,  92 => 27,  89 => 26,  86 => 25,  78 => 13,  75 => 21,  67 => 17,  64 => 16,  48 => 11,  109 => 30,  103 => 17,  94 => 12,  83 => 23,  80 => 22,  77 => 18,  74 => 20,  71 => 14,  68 => 10,  66 => 9,  60 => 15,  57 => 14,  54 => 6,  51 => 6,  47 => 5,  41 => 8,  38 => 7,  35 => 7,  30 => 4,);
    }
}
