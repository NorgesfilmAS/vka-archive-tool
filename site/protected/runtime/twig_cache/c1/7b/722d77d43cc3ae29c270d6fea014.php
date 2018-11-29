<?php

/* vendors/toxus/views/layouts/_buttons.twig */
class __TwigTemplate_c17b722d77d43cc3ae29c270d6fea014 extends Twig_Template
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
        // line 12
        echo "
";
        // line 13
        $context["state"] = ((array_key_exists("mode", $context)) ? (_twig_default_filter((isset($context["mode"]) ? $context["mode"] : null), "edit")) : ("edit"));
        echo " ";
        // line 14
        if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "buttons"), (isset($context["state"]) ? $context["state"] : null), array(), "array")) > 0)) {
            // line 15
            echo "\t";
            $context["buttons"] = $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "buttons"), (isset($context["state"]) ? $context["state"] : null), array(), "array");
        } else {
            // line 17
            echo "\t";
            $context["buttons"] = $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "buttons");
        }
        // line 19
        echo "
";
        // line 20
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["buttons"]) ? $context["buttons"] : null));
        foreach ($context['_seq'] as $context["key"] => $context["button"]) {
            // line 21
            echo "\t";
            if (((($this->getAttribute((isset($context["button"]) ? $context["button"] : null), "visible", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["button"]) ? $context["button"] : null), "visible"), true)) : (true)) != 0)) {
                // line 22
                echo "\t\t";
                if (($this->getAttribute((isset($context["button"]) ? $context["button"] : null), "type") == "submit")) {
                    echo "\t
\t\t\t<button class=\"";
                    // line 23
                    echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["button"]) ? $context["button"] : null), "style", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["button"]) ? $context["button"] : null), "style"), "btn")) : ("btn")), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "position"), "html", null, true);
                    echo " id-";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["util"]) ? $context["util"] : null), "formId", array(0 => (isset($context["form"]) ? $context["form"] : null)), "method"), "html", null, true);
                    echo "\" ";
                    echo $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "options");
                    echo " type=\"submit\">";
                    if ($this->getAttribute((isset($context["button"]) ? $context["button"] : null), "label")) {
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "label"), "html", null, true);
                    } else {
                        if ($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "isNewRecord")) {
                            echo twig_escape_filter($this->env, YiiTranslate("button", "btn-create"), "html", null, true);
                            echo " ";
                        } else {
                            echo twig_escape_filter($this->env, YiiTranslate("button", "btn-save"), "html", null, true);
                            echo " ";
                        }
                    }
                    echo "</button>
\t\t\t";
                    // line 24
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "onReady", array(0 => ((((("
\t" . "\$(\".id-") . $this->getAttribute((isset($context["util"]) ? $context["util"] : null), "formId", array(0 => (isset($context["form"]) ? $context["form"] : null)), "method")) . "\").on(\"click\", function() { \$(\".cls-") . $this->getAttribute((isset($context["util"]) ? $context["util"] : null), "formId", array(0 => (isset($context["form"]) ? $context["form"] : null)), "method")) . "\").submit(); }); ")), "method"), "html", null, true);
                    echo "
\t\t";
                } elseif (($this->getAttribute((isset($context["button"]) ? $context["button"] : null), "type") == "cancel")) {
                    // line 25
                    echo "\t
\t\t\t";
                    // line 26
                    if ((isset($context["isAjax"]) ? $context["isAjax"] : null)) {
                        // line 27
                        echo "\t\t\t<button  href=\"#\" id=\"btn-cancel\" class=\"";
                        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["button"]) ? $context["button"] : null), "style", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["button"]) ? $context["button"] : null), "style"), "btn")) : ("btn")), "html", null, true);
                        echo " ";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "position"), "html", null, true);
                        echo " action-close\" data-dismiss=\"modal\" ";
                        echo $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "options");
                        echo " type=\"button\">";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "label"), "html", null, true);
                        echo "</button>\t\t\t\t\t\t\t\t\t\t\t
\t\t\t";
                    } else {
                        // line 29
                        echo "\t\t\t<button class=\"";
                        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["button"]) ? $context["button"] : null), "style", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["button"]) ? $context["button"] : null), "style"), "btn")) : ("btn")), "html", null, true);
                        echo " ";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "position"), "html", null, true);
                        echo "\" ";
                        echo $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "options");
                        echo " onClick=\"history.go(-1);return true;\">";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "label"), "html", null, true);
                        echo "</button>\t\t\t\t\t\t\t
\t\t\t";
                    }
                    // line 30
                    echo "\t\t
\t\t";
                } elseif (($this->getAttribute((isset($context["button"]) ? $context["button"] : null), "type") == "delete")) {
                    // line 31
                    echo "\t
\t\t\t<button class=\"";
                    // line 32
                    echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["button"]) ? $context["button"] : null), "style", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["button"]) ? $context["button"] : null), "style"), "btn")) : ("btn")), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "position"), "html", null, true);
                    echo "\" ";
                    echo $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "options");
                    echo " onClick=\"if (confirm('";
                    echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["button"]) ? $context["button"] : null), "ask", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["button"]) ? $context["button"] : null), "ask"), YiiTranslate("base", "Delete this information?"))) : (YiiTranslate("base", "Delete this information?"))), "html", null, true);
                    echo "')) { window.location='";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "url"), "html", null, true);
                    echo "'; }\">";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "label"), "html", null, true);
                    echo "</button>\t\t\t\t\t\t\t
\t";
                    // line 37
                    echo "\t\t";
                } elseif (($this->getAttribute((isset($context["button"]) ? $context["button"] : null), "type") == "dialog")) {
                    // line 38
                    echo "\t\t\t<button type=\"button\" class=\"";
                    echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["button"]) ? $context["button"] : null), "style", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["button"]) ? $context["button"] : null), "style"), "btn")) : ("btn")), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "position"), "html", null, true);
                    echo " btn-action menu-modal\" data-url=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "url"), "html", null, true);
                    echo "\" ";
                    echo $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "options");
                    echo ">";
                    echo $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "label");
                    echo "</button>\t\t
\t\t";
                } else {
                    // line 40
                    echo "\t\t\t<a ";
                    if ($this->getAttribute((isset($context["button"]) ? $context["button"] : null), "id")) {
                        echo "id=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "id"), "html", null, true);
                        echo "\"";
                    }
                    echo " href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "url"), "html", null, true);
                    echo "\" class=\"";
                    echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["button"]) ? $context["button"] : null), "style", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["button"]) ? $context["button"] : null), "style"), "btn")) : ("btn")), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "position"), "html", null, true);
                    echo " menu-button\" ";
                    echo $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "options");
                    echo ">";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "label"), "html", null, true);
                    echo "</a>\t
\t\t";
                }
                // line 42
                echo "\t";
            }
            echo "\t\t
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['button'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 44
        echo "\t\t
";
        // line 46
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "extraButtons"));
        foreach ($context['_seq'] as $context["key"] => $context["button"]) {
            // line 47
            echo "\t<a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "url"), "html", null, true);
            echo "\" class=\"";
            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["button"]) ? $context["button"] : null), "style", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["button"]) ? $context["button"] : null), "style"), "btn")) : ("btn")), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "position"), "html", null, true);
            echo " menu-button\" ";
            echo $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "options");
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["button"]) ? $context["button"] : null), "label"), "html", null, true);
            echo "</a>\t
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['button'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 49
        echo "\t\t
\t";
    }

    public function getTemplateName()
    {
        return "vendors/toxus/views/layouts/_buttons.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  198 => 49,  181 => 47,  177 => 46,  174 => 44,  165 => 42,  145 => 40,  131 => 38,  128 => 37,  114 => 32,  111 => 31,  107 => 30,  95 => 29,  83 => 27,  81 => 26,  78 => 25,  72 => 24,  50 => 23,  45 => 22,  42 => 21,  38 => 20,  35 => 19,  31 => 17,  27 => 15,  25 => 14,  22 => 13,  19 => 12,);
    }
}
