<?php

/* /views/agent/view.twig */
class __TwigTemplate_027f8d94954ae66a5322078ddcc21299 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'pageTitle' => array($this, 'block_pageTitle'),
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

    // line 3
    public function block_pageTitle($context, array $blocks = array())
    {
        // line 4
        echo "\t";
        echo $this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "params"), "appName");
        echo " - Artist ";
        if ($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model")) {
            echo "- ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "name"), "html", null, true);
        }
    }

    // line 8
    public function block_content($context, array $blocks = array())
    {
        // line 9
        echo "<div class=\"pnek-view\">\t
\t
\t";
        // line 11
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "caption"), "method"));
        $template->display($context);
        // line 12
        echo "\t<div class=\"row tx-view\">
\t\t";
        // line 13
        if ($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "user"), "hasMenu", array(0 => "agent/general"), "method")) {
            // line 14
            echo "\t\t<div class=\"col-xs-12 col-sm-8 bg-hover\">
\t\t\t<div class=\"panel panel-default a-url\" data-url=\"";
            // line 15
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "agent/general", 1 => array("id" => $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "id"))), "method"), "html", null, true);
            echo "\">
\t\t\t\t<div class=\"panel-heading\">
\t\t\t\t\t<h3 class=\"panel-title\">";
            // line 17
            echo twig_escape_filter($this->env, YiiTranslate("app", "General"), "html", null, true);
            echo "</h3>
\t\t\t\t</div>\t
\t\t\t\t<div class=\"panel-body\">\t\t\t\t\t\t
\t\t\t\t\t<dl class=\"dl-horizontal\">\t\t\t\t\t\t
\t\t\t\t\t\t<dt>";
            // line 21
            echo twig_escape_filter($this->env, YiiTranslate("app", "Name"), "html", null, true);
            echo "</dt><dd>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "name"), "html", null, true);
            echo "</dd>
\t\t\t\t\t\t";
            // line 22
            if ($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "born")) {
                // line 23
                echo "\t\t\t\t\t\t\t<dt>";
                echo twig_escape_filter($this->env, YiiTranslate("app", "Born"), "html", null, true);
                echo "</dt><dd>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "born"), "html", null, true);
                echo " </dd> 
\t\t\t\t\t\t";
            }
            // line 24
            echo "\t
\t\t\t\t\t\t<dt>";
            // line 25
            echo twig_escape_filter($this->env, YiiTranslate("app", "Gender"), "html", null, true);
            echo "</dt><dd>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "gender"), "html", null, true);
            echo " </dd> 
\t\t\t\t\t\t";
            // line 26
            if ($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "user"), "hasMenu", array(0 => "agent/description"), "method")) {
                // line 27
                echo "\t\t\t\t\t\t\t<dt>";
                echo twig_escape_filter($this->env, YiiTranslate("app", "Address"), "html", null, true);
                echo "</dt>
\t\t\t\t\t\t\t<dd>";
                // line 28
                echo twig_escape_filter($this->env, strtr(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "address")), array("
" => "<br/>")), "html", null, true);
                echo "</dd>\t\t\t\t\t\t
\t\t\t\t\t\t\t<dt>";
                // line 29
                echo twig_escape_filter($this->env, YiiTranslate("app", "Telephone"), "html", null, true);
                echo "</dt>
\t\t\t\t\t\t\t<dd>";
                // line 30
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "telephone"), "html", null, true);
                echo "</dd>\t\t\t\t\t\t
\t\t\t\t\t\t\t<dt>";
                // line 31
                echo twig_escape_filter($this->env, YiiTranslate("app", "Email"), "html", null, true);
                echo "</dt>
\t\t\t\t\t\t\t<dd>";
                // line 32
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "email"), "html", null, true);
                echo "</dd>\t\t\t\t\t\t
\t\t\t\t\t\t\t<dt>";
                // line 33
                echo twig_escape_filter($this->env, YiiTranslate("app", "Url"), "html", null, true);
                echo "</dt>
\t\t\t\t\t\t\t<dd>";
                // line 34
                if ($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "url")) {
                    echo "<a href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "url"), "html", null, true);
                    echo "\" target=\"_blank\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "url"), "html", null, true);
                    echo "</a></dd>";
                }
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<dt>";
                // line 35
                echo twig_escape_filter($this->env, YiiTranslate("app", "Contact information"), "html", null, true);
                echo "</dt>
\t\t\t\t\t\t\t<dd>";
                // line 36
                echo twig_escape_filter($this->env, strtr(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "contact_information")), array("
" => "<br/>")), "html", null, true);
                echo "</dd>\t\t\t\t\t\t
\t\t\t\t\t\t\t
\t\t\t\t\t\t";
            }
            // line 38
            echo "\t
\t\t\t\t\t\t";
            // line 39
            if ($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "user"), "hasMenu", array(0 => "agent/biography"), "method")) {
                echo "\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<dt>";
                // line 40
                echo twig_escape_filter($this->env, YiiTranslate("app", "Biography"), "html", null, true);
                echo "</dt><dd>";
                echo $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "biography");
                echo "</dd>\t
\t\t\t\t\t\t";
            }
            // line 41
            echo "\t
\t\t\t\t\t</dl>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t";
        }
        // line 47
        echo "\t</div>
\t
\t";
        // line 49
        if ($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "user"), "hasMenu", array(0 => "agent/works"), "method")) {
            // line 50
            echo "\t<div class=\"row tx-view\">
\t\t<div class=\"col-xs-12 col-sm-8\">
\t\t\t<div class=\"panel panel-default panel-top\">
\t\t\t\t<div class=\"panel-heading\">
\t\t\t\t\t<h3 class=\"panel-title\">";
            // line 54
            echo twig_escape_filter($this->env, YiiTranslate("app", "Works"), "html", null, true);
            echo "</h3>
\t\t\t\t</div>\t
\t\t\t\t<div class=\"panel-body\">
\t\t\t\t\t";
            // line 57
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "works"));
            foreach ($context['_seq'] as $context["_key"] => $context["work"]) {
                // line 58
                echo "\t\t\t\t\t<div class=\"row grid\">
\t\t\t\t\t\t<div class=\"col-xs-2\">
\t\t\t\t\t\t\t";
                // line 60
                if ($this->getAttribute((isset($context["work"]) ? $context["work"] : null), "isProcessing")) {
                    // line 61
                    echo "\t\t\t\t\t\t\t\t<img id=\"img-art-";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["work"]) ? $context["work"] : null), "id"), "html", null, true);
                    echo "\" width=\"100%\" src=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["App"]) ? $context["App"] : null), "baseUrl"), "html", null, true);
                    echo "/images/processing.jpg\" />\t\t\t
\t\t\t\t\t\t\t";
                } else {
                    // line 62
                    echo "\t\t\t
\t\t\t\t\t\t\t\t<img id=\"img-art-";
                    // line 63
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["work"]) ? $context["work"] : null), "id"), "html", null, true);
                    echo "\"
\t\t\t\t\t\t\t\t\t\t class=\"art-preview\"
\t\t\t\t\t\t\t\t\t\t width=\"100%\" 
\t\t\t\t\t\t\t\t\t\t";
                    // line 66
                    if ($this->getAttribute((isset($context["work"]) ? $context["work"] : null), "tvRatioUrl")) {
                        echo " 
\t\t\t\t\t\t\t\t\t\t\tclass=\"menu-modal\" 
\t\t\t\t\t\t\t\t\t\t\tdata-compact=\"1\"
\t\t\t\t\t\t\t\t\t\t\tdata-url=\"";
                        // line 69
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "art/preview", 1 => array("id" => $this->getAttribute((isset($context["work"]) ? $context["work"] : null), "id"))), "method"), "html", null, true);
                        echo "\" 
\t\t\t\t\t\t\t\t\t\t\tsrc=\"";
                        // line 70
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["work"]) ? $context["work"] : null), "tvRatioUrl"), "html", null, true);
                        echo "\"";
                    } else {
                        echo "src=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["App"]) ? $context["App"] : null), "baseUrl"), "html", null, true);
                        echo "/images/no-preview-small.png\"
\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 71
                    echo " 
\t\t\t\t\t\t\t\t\t\tdata-missing-image=\"";
                    // line 72
                    echo twig_escape_filter($this->env, (isset($context["dataImagePath"]) ? $context["dataImagePath"] : null), "html", null, true);
                    echo "\" />
\t\t\t\t\t\t\t";
                }
                // line 73
                echo "\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"col-xs-2\">";
                // line 75
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["work"]) ? $context["work"] : null), "year"), "html", null, true);
                echo "</div>
\t\t\t\t\t\t<div class=\"col-xs-8\">
\t\t\t\t\t\t\t<a href=\"";
                // line 77
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "art/view", 1 => array("id" => $this->getAttribute((isset($context["work"]) ? $context["work"] : null), "id"))), "method"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["work"]) ? $context["work"] : null), "title"), "html", null, true);
                echo "</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>\t
\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['work'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 80
            echo "\t
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>\t
\t</div>\t
\t";
        }
        // line 86
        echo "\t\t
\t";
        // line 87
        if ($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "user"), "hasMenu", array(0 => "agent/files"), "method")) {
            // line 88
            echo "\t<div class=\"row tx-view\">
\t\t<div class=\"col-xs-12 col-sm-8 bg-hover\">
\t\t\t<div class=\"panel panel-default panel-top a-url\" data-url=\"";
            // line 90
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "agent/files", 1 => array("id" => $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "id"))), "method"), "html", null, true);
            echo "\">
\t\t\t\t<div class=\"panel-heading\">
\t\t\t\t\t<h3 class=\"panel-title\">";
            // line 92
            echo twig_escape_filter($this->env, YiiTranslate("app", "Documents"), "html", null, true);
            echo "</h3>
\t\t\t\t</div>\t
\t\t\t\t<div class=\"panel-body\">
\t\t\t\t\t<ul class=\"list-unstyled work-list\">
\t\t\t\t\t\t";
            // line 96
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "altFiles"), 0, 10));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["_key"] => $context["file"]) {
                // line 97
                echo "\t\t\t\t\t\t\t<li>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "name"), "html", null, true);
                echo "</li>
\t\t\t\t\t\t";
                $context['_iterated'] = true;
            }
            if (!$context['_iterated']) {
                // line 99
                echo "\t\t\t\t\t\t\t";
                echo twig_escape_filter($this->env, YiiTranslate("app", "There are no documents connected"), "html", null, true);
                echo "
\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['file'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 100
            echo "\t
\t\t\t\t\t</ul>\t\t
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>\t
\t</div>\t
\t";
        }
        // line 106
        echo "\t\t

</div>
\t\t
\t\t\t
";
    }

    // line 114
    public function block_onReady($context, array $blocks = array())
    {
        // line 115
        echo "  \$('.menu-view').addClass('active');\t
";
    }

    public function getTemplateName()
    {
        return "/views/agent/view.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  336 => 115,  333 => 114,  324 => 106,  315 => 100,  306 => 99,  298 => 97,  293 => 96,  286 => 92,  281 => 90,  277 => 88,  275 => 87,  272 => 86,  264 => 80,  252 => 77,  247 => 75,  243 => 73,  238 => 72,  235 => 71,  226 => 70,  222 => 69,  216 => 66,  210 => 63,  207 => 62,  199 => 61,  197 => 60,  193 => 58,  189 => 57,  183 => 54,  177 => 50,  175 => 49,  171 => 47,  163 => 41,  156 => 40,  152 => 39,  149 => 38,  142 => 36,  138 => 35,  128 => 34,  124 => 33,  120 => 32,  116 => 31,  112 => 30,  108 => 29,  103 => 28,  98 => 27,  96 => 26,  90 => 25,  87 => 24,  79 => 23,  77 => 22,  71 => 21,  64 => 17,  59 => 15,  56 => 14,  54 => 13,  51 => 12,  48 => 11,  44 => 9,  41 => 8,  31 => 4,  28 => 3,);
    }
}
