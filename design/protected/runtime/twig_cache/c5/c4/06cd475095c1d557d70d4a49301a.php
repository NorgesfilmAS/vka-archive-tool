<?php

/* views/layouts/_moderate.twig */
class __TwigTemplate_c5c406cd475095c1d557d70d4a49301a extends Twig_Template
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
        $context["oldVersion"] = $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "previousVersion", array(0 => (isset($context["transactionId"]) ? $context["transactionId"] : null)), "method");
        // line 5
        $context["changes"] = $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "fieldChanges", array(0 => $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "route")), "method");
        // line 6
        echo "
<dl class=\"";
        // line 7
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "layoutClass", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "layoutClass"), "dl-horizontal")) : ("dl-horizontal")), "html", null, true);
        echo "\">
\t";
        // line 8
        if ($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "controlWidth")) {
            $context["width"] = $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "controlWidth");
        } else {
            $context["width"] = "input-xlarge";
        }
        // line 9
        echo "\t";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "elements"));
        foreach ($context['_seq'] as $context["groupKey"] => $context["groupElement"]) {
            echo "\t\t\t
\t\t";
            // line 10
            if (((($this->getAttribute((isset($context["groupElement"]) ? $context["groupElement"] : null), "hidden") != true) && ($this->getAttribute((isset($context["groupElement"]) ? $context["groupElement"] : null), "viewHidden") != true)) && $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "isVisible", array(0 => (isset($context["groupKey"]) ? $context["groupKey"] : null)), "method"))) {
                // line 11
                echo "\t\t\t";
                if (($this->getAttribute((isset($context["groupElement"]) ? $context["groupElement"] : null), "type") != "hidden")) {
                    // line 12
                    echo "\t\t\t<dt>";
                    if ($this->getAttribute((isset($context["groupElement"]) ? $context["groupElement"] : null), "label")) {
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["groupElement"]) ? $context["groupElement"] : null), "label"), "html", null, true);
                    } else {
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "attributeLabel", array(0 => (isset($context["groupKey"]) ? $context["groupKey"] : null)), "method"), "html", null, true);
                    }
                    echo "</dt> 
\t\t\t";
                }
                // line 14
                echo "\t\t\t<dd>
\t\t\t\t";
                // line 15
                if ((twig_length_filter($this->env, $this->getAttribute((isset($context["groupElement"]) ? $context["groupElement"] : null), "elements")) > 0)) {
                    // line 16
                    echo "\t\t\t\t\t";
                    $context["fields"] = $this->getAttribute((isset($context["groupElement"]) ? $context["groupElement"] : null), "elements");
                    // line 17
                    echo "\t\t\t\t";
                } else {
                    // line 18
                    echo "\t\t\t\t\t";
                    $context["fields"] = array((isset($context["groupKey"]) ? $context["groupKey"] : null) => (isset($context["groupElement"]) ? $context["groupElement"] : null));
                    // line 19
                    echo "\t\t\t\t";
                }
                echo "\t
\t\t\t\t";
                // line 20
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["fields"]) ? $context["fields"] : null));
                foreach ($context['_seq'] as $context["key"] => $context["element"]) {
                    echo "\t
\t\t\t\t";
                    // line 21
                    $context["isHtml"] = 0;
                    // line 22
                    echo "\t\t\t\t";
                    $context["useItems"] = 0;
                    // line 23
                    echo "\t\t\t\t
\t\t\t\t";
                    // line 24
                    if ((($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "dropdown") || ($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "radiobuttonlist"))) {
                        echo "\t
\t\t\t\t\t";
                        // line 25
                        $context["useItems"] = 1;
                        // line 26
                        echo "\t\t\t\t\t";
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "items"));
                        foreach ($context['_seq'] as $context["itemKey"] => $context["itemCaption"]) {
                            // line 27
                            echo "\t\t\t\t\t ";
                            if (((isset($context["itemKey"]) ? $context["itemKey"] : null) == $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"))) {
                                echo twig_escape_filter($this->env, (isset($context["itemCaption"]) ? $context["itemCaption"] : null), "html", null, true);
                            }
                            // line 28
                            echo "\t\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['itemKey'], $context['itemCaption'], $context['_parent'], $context['loop']);
                        $context = array_merge($_parent, array_intersect_key($context, $_parent));
                        // line 29
                        echo "\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "textarea")) {
                        // line 30
                        echo "\t\t\t\t\t ";
                        echo strtr($this->getAttribute((isset($context["html"]) ? $context["html"] : null), "encode", array(0 => $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method")), "method"), array("
" => "<br />"));
                        echo "
\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "checkbox")) {
                        // line 31
                        echo "\t
\t\t\t\t\t";
                        // line 32
                        if (($this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method") == 1)) {
                            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "trueCaption", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "trueCaption"), YiiTranslate("app", "yes"))) : (YiiTranslate("app", "yes"))), "html", null, true);
                        } else {
                            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "falseCaption", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "falseCaption"), YiiTranslate("app", "no"))) : (YiiTranslate("app", "no"))), "html", null, true);
                        }
                        // line 33
                        echo "\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "image")) {
                        // line 34
                        echo "\t\t\t\t\t";
                        echo $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "form"), "image", array(0 => (isset($context["model"]) ? $context["model"] : null), 1 => (isset($context["key"]) ? $context["key"] : null)), "method");
                        echo "\t\t\t\t\t\t\t\t
\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "finder")) {
                        // line 35
                        echo "\t\t\t\t\t
\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "html")) {
                        // line 37
                        echo "\t\t\t\t\t";
                        echo $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method");
                        echo "
\t\t\t\t\t";
                        // line 38
                        $context["isHtml"] = 1;
                        echo "\t\t\t\t
\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "chosen")) {
                        // line 39
                        echo "\t\t\t\t\t\t
\t\t\t\t\t";
                        // line 40
                        $context["useItems"] = 1;
                        // line 41
                        echo "\t\t\t\t\t\t";
                        if (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "multi") && (twig_length_filter($this->env, $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method")) > 0))) {
                            echo "\t\t\t\t\t\t
\t\t\t\t\t\t\t<ul class=\"comma-list-summary\">
\t\t\t\t\t\t\t";
                            // line 43
                            $context['_parent'] = (array) $context;
                            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "items"));
                            foreach ($context['_seq'] as $context["itemKey"] => $context["itemCaption"]) {
                                // line 44
                                echo "\t\t\t\t\t\t\t ";
                                if (((twig_in_filter((isset($context["itemKey"]) ? $context["itemKey"] : null), $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method")) && (isset($context["itemKey"]) ? $context["itemKey"] : null)) && (isset($context["itemCaption"]) ? $context["itemCaption"] : null))) {
                                    echo "<li class=\"comma-list\">";
                                    echo twig_escape_filter($this->env, (isset($context["itemCaption"]) ? $context["itemCaption"] : null), "html", null, true);
                                    echo "</li>";
                                }
                                // line 45
                                echo "\t\t\t\t\t\t\t";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['itemKey'], $context['itemCaption'], $context['_parent'], $context['loop']);
                            $context = array_merge($_parent, array_intersect_key($context, $_parent));
                            echo "\t\t\t\t\t
\t\t\t\t\t\t\t</ul> 
\t\t\t\t\t\t";
                        } else {
                            // line 48
                            echo "\t\t\t\t\t\t\t";
                            $context['_parent'] = (array) $context;
                            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "items"));
                            foreach ($context['_seq'] as $context["itemKey"] => $context["itemCaption"]) {
                                // line 49
                                echo "\t\t\t\t\t\t\t ";
                                if (((isset($context["itemKey"]) ? $context["itemKey"] : null) == $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"))) {
                                    echo twig_escape_filter($this->env, (isset($context["itemCaption"]) ? $context["itemCaption"] : null), "html", null, true);
                                }
                                // line 50
                                echo "\t\t\t\t\t\t\t";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['itemKey'], $context['itemCaption'], $context['_parent'], $context['loop']);
                            $context = array_merge($_parent, array_intersect_key($context, $_parent));
                            echo "\t\t\t\t\t
\t\t\t\t\t\t";
                        }
                        // line 52
                        echo "\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "datetime")) {
                        echo "\t\t\t\t\t\t
\t\t\t\t\t";
                        // line 53
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"), "html", null, true);
                        echo "\t
\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "hidden")) {
                        // line 55
                        echo "\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "view")) {
                        // line 56
                        echo "\t\t\t\t\t";
                        echo $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method");
                        echo "\t
\t\t\t\t  ";
                        // line 57
                        $context["isHtml"] = 1;
                        // line 58
                        echo "\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "password")) {
                        // line 59
                        echo "\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "typeahead")) {
                        // line 60
                        echo "\t\t\t\t\t";
                        if ((($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "associative", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "associative"), 1)) : (1))) {
                            // line 61
                            echo "\t\t\t\t\t";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["element"]) ? $context["element"] : null), "caption"), "html", null, true);
                            echo "\t
\t\t\t\t\t";
                        } else {
                            // line 63
                            echo "\t\t\t\t\t";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"), "html", null, true);
                            echo "\t
\t\t\t\t\t";
                        }
                        // line 65
                        echo "\t\t\t\t";
                    } elseif ((($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "button") || ($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "dialog"))) {
                        echo "\t
\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "email")) {
                        // line 67
                        echo "\t\t\t\t\t";
                        if ($this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method")) {
                            // line 68
                            echo "\t\t\t\t\t\t<a href=\"mailto:";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"), "html", null, true);
                            echo "\">";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"), "html", null, true);
                            echo "</a>
\t\t\t\t\t";
                        }
                        // line 69
                        echo "\t
\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "url")) {
                        // line 70
                        echo "\t\t\t\t\t\t
\t\t\t\t\t\t<a href=\"";
                        // line 71
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"), "html", null, true);
                        echo "</a>\t
\t\t\t\t";
                    } elseif (($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "type") == "raw")) {
                        // line 73
                        echo "\t\t\t\t\t\t";
                        echo $this->getAttribute((isset($context["element"]) ? $context["element"] : null), "value");
                        echo "\t\t\t\t\t\t
\t\t\t\t";
                    } else {
                        // line 74
                        echo "\t
\t\t\t\t\t";
                        // line 75
                        echo $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "__get", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method");
                        echo "\t
\t\t\t\t";
                    }
                    // line 77
                    echo "\t\t\t\t";
                    if ($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "openUrl")) {
                        // line 78
                        echo "\t\t\t\t\t&nbsp;<a href=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["element"]) ? $context["element"] : null), "openUrl"), "html", null, true);
                        echo "\"><span class=\"glyphicon glyphicon-link\"></span></a>
\t\t\t\t";
                    }
                    // line 80
                    echo "\t\t\t\t\t
\t\t\t\t\t
\t\t\t\t";
                    // line 82
                    if ($this->getAttribute((isset($context["oldVersion"]) ? $context["oldVersion"] : null), "itemAt", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method")) {
                        echo "\t
\t\t\t\t\t<span class=\"mod-original level-";
                        // line 83
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["oldVersion"]) ? $context["oldVersion"] : null), "itemAt", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"), "level"), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["oldVersion"]) ? $context["oldVersion"] : null), "itemAt", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"), "value"), "html", null, true);
                        echo "</span> 
\t\t\t\t\t<a title=\"Undo this change\" href=\"";
                        // line 84
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "resourceSpace/undoStep", 1 => array("id" => $this->getAttribute($this->getAttribute((isset($context["oldVersion"]) ? $context["oldVersion"] : null), "itemAt", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"), "id"), "route" => $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "route"), "url" => $this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "request"), "requestUri"))), "method"), "html", null, true);
                        echo "\" class=\"mod-undo-field level-";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["oldVersion"]) ? $context["oldVersion"] : null), "itemAt", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"), "level"), "html", null, true);
                        echo "\"> &nbsp; &#8404; &nbsp; </a> 
\t\t\t\t";
                    }
                    // line 86
                    echo "\t\t\t\t";
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable(twig_reverse_filter($this->env, $this->getAttribute((isset($context["changes"]) ? $context["changes"] : null), "itemAt", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method")));
                    foreach ($context['_seq'] as $context["_key"] => $context["change"]) {
                        echo "\t
\t\t\t\t\t<div class=\"mod-info-marker pull-right level-";
                        // line 87
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["change"]) ? $context["change"] : null), "level"), "html", null, true);
                        echo "\" data-toggle=\"tooltip\" title=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["change"]) ? $context["change"] : null), "value"), "html", null, true);
                        echo "\" data-placement=\"bottom\">
\t\t\t\t\t\t<div class=\"mod-info-link\" data-url=\"#id-";
                        // line 88
                        echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                        echo "-";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["change"]) ? $context["change"] : null), "id"), "html", null, true);
                        echo "\">&nbsp;&#x233E;</div>
\t\t\t\t\t</div>
\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['change'], $context['_parent'], $context['loop']);
                    $context = array_merge($_parent, array_intersect_key($context, $_parent));
                    // line 90
                    echo "\t
\t\t\t\t";
                    // line 91
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["changes"]) ? $context["changes"] : null), "itemAt", array(0 => (isset($context["key"]) ? $context["key"] : null)), "method"));
                    foreach ($context['_seq'] as $context["_key"] => $context["change"]) {
                        echo "\t\t
\t\t\t\t\t<div id=\"id-";
                        // line 92
                        echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                        echo "-";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["change"]) ? $context["change"] : null), "id"), "html", null, true);
                        echo "\" 
\t\t\t\t\t\t\t class=\"mod-info-text level-";
                        // line 93
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["change"]) ? $context["change"] : null), "level"), "html", null, true);
                        echo " 
\t\t\t\t\t\t\t\t\t\t  mod-trans-";
                        // line 94
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["change"]) ? $context["change"] : null), "transaction"), "html", null, true);
                        echo "
\t\t\t\t\t\t\t\t\t\t\tmod-value-link\"  
\t\t\t\t\t\t\t style=\"display:none\" 
\t\t\t\t\t\t\t data-toggle=\"tooltip\" 
\t\t\t\t\t\t\t data-url=\"";
                        // line 98
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "resourceSpace/undoStep", 1 => array("id" => $this->getAttribute((isset($context["change"]) ? $context["change"] : null), "id"), "route" => $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "route"), "url" => $this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "request"), "requestUri"))), "method"), "html", null, true);
                        echo "\"
\t\t\t\t\t\t\t title=\"";
                        // line 99
                        echo twig_escape_filter($this->env, YiiTranslate("app", "Reverse this change"), "html", null, true);
                        echo "\"
\t\t\t\t\t\t\t >
\t\t\t\t\t\t";
                        // line 101
                        if ((isset($context["isHtml"]) ? $context["isHtml"] : null)) {
                            // line 102
                            echo "\t\t\t\t\t\t";
                            echo (($this->getAttribute((isset($context["change"]) ? $context["change"] : null), "value", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["change"]) ? $context["change"] : null), "value"), YiiTranslate("app", "(field was empty)"))) : (YiiTranslate("app", "(field was empty)")));
                            echo "
\t\t\t\t\t\t";
                        } else {
                            // line 104
                            echo "\t\t\t\t\t\t";
                            if (((isset($context["useItems"]) ? $context["useItems"] : null) != 0)) {
                                // line 105
                                echo "\t\t\t\t\t\t\t";
                                $context["tmp"] = "";
                                // line 106
                                echo "\t\t\t\t\t\t\t";
                                $context['_parent'] = (array) $context;
                                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["element"]) ? $context["element"] : null), "items"));
                                foreach ($context['_seq'] as $context["itemKey"] => $context["itemCaption"]) {
                                    // line 107
                                    echo "\t\t\t\t\t\t\t ";
                                    if (((isset($context["itemKey"]) ? $context["itemKey"] : null) == $this->getAttribute((isset($context["change"]) ? $context["change"] : null), "value"))) {
                                        $context["tmp"] = (isset($context["itemCaption"]) ? $context["itemCaption"] : null);
                                    }
                                    // line 108
                                    echo "\t\t\t\t\t\t\t";
                                }
                                $_parent = $context['_parent'];
                                unset($context['_seq'], $context['_iterated'], $context['itemKey'], $context['itemCaption'], $context['_parent'], $context['loop']);
                                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                                // line 109
                                echo "\t\t\t\t\t\t\t";
                                echo twig_escape_filter($this->env, ((array_key_exists("tmp", $context)) ? (_twig_default_filter((isset($context["tmp"]) ? $context["tmp"] : null), YiiTranslate("app", "(field was empty)"))) : (YiiTranslate("app", "(field was empty)"))), "html", null, true);
                                echo "
\t\t\t\t\t\t";
                            } else {
                                // line 111
                                echo "\t\t\t\t\t\t\t";
                                echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["change"]) ? $context["change"] : null), "value", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["change"]) ? $context["change"] : null), "value"), YiiTranslate("app", "(field was empty)"))) : (YiiTranslate("app", "(field was empty)"))), "html", null, true);
                                echo "
\t\t\t\t\t\t";
                            }
                            // line 113
                            echo "\t\t\t\t\t\t";
                        }
                        // line 114
                        echo "\t\t\t\t\t</div>\t\t\t\t\t
\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['change'], $context['_parent'], $context['loop']);
                    $context = array_merge($_parent, array_intersect_key($context, $_parent));
                    // line 115
                    echo "\t
\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['element'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 116
                echo "&nbsp;
\t\t\t</dd>\t
\t\t";
                // line 119
                echo "\t\t";
            }
            echo "\t
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['groupKey'], $context['groupElement'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 120
        echo "\t
</dl>

";
        // line 123
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "onReady", array(0 => "
\t\$('.mod-info-link').on('click', function() { \$(\$(this).data('url')).toggle('fast') });
\t\$('.mod-value-link').on('click', function() { window.location = \$(this).data('url') });
"), "method"), "html", null, true);
    }

    public function getTemplateName()
    {
        return "views/layouts/_moderate.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  458 => 123,  453 => 120,  444 => 119,  440 => 116,  433 => 115,  426 => 114,  423 => 113,  417 => 111,  411 => 109,  405 => 108,  400 => 107,  395 => 106,  392 => 105,  389 => 104,  383 => 102,  381 => 101,  376 => 99,  372 => 98,  365 => 94,  361 => 93,  355 => 92,  349 => 91,  346 => 90,  335 => 88,  329 => 87,  322 => 86,  315 => 84,  309 => 83,  305 => 82,  301 => 80,  295 => 78,  292 => 77,  287 => 75,  284 => 74,  278 => 73,  271 => 71,  268 => 70,  264 => 69,  256 => 68,  253 => 67,  247 => 65,  241 => 63,  235 => 61,  232 => 60,  229 => 59,  226 => 58,  224 => 57,  219 => 56,  216 => 55,  211 => 53,  206 => 52,  197 => 50,  192 => 49,  187 => 48,  177 => 45,  170 => 44,  166 => 43,  160 => 41,  158 => 40,  155 => 39,  150 => 38,  145 => 37,  141 => 35,  135 => 34,  132 => 33,  126 => 32,  123 => 31,  116 => 30,  113 => 29,  107 => 28,  102 => 27,  97 => 26,  95 => 25,  91 => 24,  88 => 23,  85 => 22,  83 => 21,  77 => 20,  72 => 19,  69 => 18,  66 => 17,  63 => 16,  61 => 15,  58 => 14,  48 => 12,  45 => 11,  43 => 10,  36 => 9,  30 => 8,  26 => 7,  23 => 6,  21 => 5,  19 => 4,);
    }
}
