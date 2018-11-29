<?php

/* /views/agent/works.twig */
class __TwigTemplate_2bd74417884ef695494bbda3e8536677 extends Twig_Template
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

    // line 11
    public function block_pageTitle($context, array $blocks = array())
    {
        // line 12
        echo "\t";
        echo $this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "params"), "appName");
        echo " - Artist ";
        if ($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model")) {
            echo "- ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "name"), "html", null, true);
        }
    }

    // line 17
    public function block_content($context, array $blocks = array())
    {
        // line 18
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "caption"), "method"));
        $template->display($context);
        // line 19
        echo "
";
        // line 20
        if ($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "hasErrors", array(), "method")) {
            // line 21
            echo "<div class=\"bs-content\">
\t";
            // line 22
            echo "\t\t
\t<div class=\"row\">
\t\t<div class=\"col-xs-10 col-xs-offset-1 alert alert-danger\">\t\t\t
\t\t\t";
            // line 25
            echo $this->getAttribute((isset($context["html"]) ? $context["html"] : null), "errorSummary", array(0 => $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model")), "method");
            echo "
\t\t</div>
\t</div>
</div>
\t";
        }
        // line 29
        echo "\t

";
        // line 35
        if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "works")) > 0)) {
            // line 36
            echo " \t<div class=\"row overview\">
\t";
            // line 37
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "works"));
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
            foreach ($context['_seq'] as $context["_key"] => $context["data"]) {
                // line 38
                echo "\t\t<div class=\"art-row art-spacer col-sm-4\">\t
\t\t\t<div class=\"tile-view\">
\t\t\t\t<div class=\"preview-image\">\t
\t\t\t\t";
                // line 42
                echo "\t\t\t\t";
                if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "isProcessing")) {
                    // line 43
                    echo "\t\t\t\t\t<img id=\"img-art-";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "id"), "html", null, true);
                    echo "\" width=\"100%\" src=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["App"]) ? $context["App"] : null), "baseUrl"), "html", null, true);
                    echo "/images/processing.jpg\" />\t\t\t
\t\t\t\t";
                } else {
                    // line 44
                    echo "\t\t\t
\t\t\t\t\t<img id=\"img-art-";
                    // line 45
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "id"), "html", null, true);
                    echo "\" 
\t\t\t\t\t\t\t width=\"100%\" 
\t\t\t\t\t\t\t";
                    // line 47
                    if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tvRatioUrl")) {
                        echo " 
\t\t\t\t\t\t\t\tclass=\"menu-modal\" 
\t\t\t\t\t\t\t\tdata-url=\"";
                        // line 49
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "art/preview", 1 => array("id" => $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "id"))), "method"), "html", null, true);
                        echo "\" 
\t\t\t\t\t\t\t\tsrc=\"";
                        // line 50
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tvRatioUrl"), "html", null, true);
                        echo "\"
\t\t\t\t\t\t\t\tdata-compact=\"1\"
\t\t\t\t\t\t\t";
                    } else {
                        // line 53
                        echo "\t\t\t\t\t\t\t\tsrc=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["App"]) ? $context["App"] : null), "baseUrl"), "html", null, true);
                        echo "/images/no-preview.png\"
\t\t\t\t\t\t\t";
                    }
                    // line 54
                    echo " 
\t\t\t\t\t\t\tdata-missing-image=\"";
                    // line 55
                    echo twig_escape_filter($this->env, (isset($context["dataImagePath"]) ? $context["dataImagePath"] : null), "html", null, true);
                    echo "\" />
\t\t\t\t\t";
                    // line 56
                    if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tvRatioUrl")) {
                        // line 57
                        echo "\t\t\t\t\t<span class=\"play menu-modal\" 
\t\t\t\t\t\t\t\t\tstyle=\"margin-top:0px;\"
\t\t\t\t\t\t\t\t\tdata-compact=\"1\"
\t\t\t\t\t\t\t\t\tdata-url=\"";
                        // line 60
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "art/preview", 1 => array("id" => $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "id"))), "method"), "html", null, true);
                        echo "\" >
\t\t\t\t\t</span>
\t\t\t\t\t";
                    }
                    // line 63
                    echo "\t\t\t\t";
                }
                // line 64
                echo "\t\t\t\t</div>\t
\t\t\t\t<div class=\"preview-data line-div\">
\t\t\t\t\t<div class=\"art\">
\t\t\t\t\t\t<a href=\"";
                // line 67
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "art/view", 1 => array("id" => $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "id"))), "method"), "html", null, true);
                echo "\" >";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "title"), "html", null, true);
                echo "</a>&nbsp;\t\t\t\t
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"line-div\"><div class=\"data-label\">Year</div><div class=\"data-info\">";
                // line 69
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "year"), "html", null, true);
                echo "</div></div>\t
\t\t\t\t\t<div class=\"line-div\"><div class=\"data-label\">Org. format</div>";
                // line 70
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "format"), "html", null, true);
                echo "</div>\t
\t\t\t\t\t<div class=\"line-div\"><div class=\"data-label\">Length</div>";
                // line 71
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "length"), "html", null, true);
                echo "</div>\t
\t\t\t\t</div>\t
\t\t\t</div>
\t\t</div>
\t\t";
                // line 75
                if ((($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index0") % 3) == 2)) {
                    // line 76
                    echo "\t\t</div>
\t\t<div class=\"row overview\">
\t\t";
                }
                // line 96
                echo "\t";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['data'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            echo "\t
</div>
";
        } else {
            // line 99
            echo "\t\t";
        }
    }

    // line 108
    public function block_onReady($context, array $blocks = array())
    {
        // line 109
        echo "  \$('.menu-works').addClass('active');
\t\$('.id-preview').on('click', function(){ 
\t\talert('the preview is temporary disabled');
\t});
\t";
        // line 113
        $this->displayParentBlock("onReady", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "/views/agent/works.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  228 => 113,  222 => 109,  219 => 108,  214 => 99,  196 => 96,  191 => 76,  189 => 75,  182 => 71,  178 => 70,  174 => 69,  167 => 67,  162 => 64,  159 => 63,  153 => 60,  148 => 57,  146 => 56,  142 => 55,  139 => 54,  133 => 53,  127 => 50,  123 => 49,  118 => 47,  113 => 45,  110 => 44,  102 => 43,  99 => 42,  94 => 38,  77 => 37,  74 => 36,  72 => 35,  68 => 29,  60 => 25,  55 => 22,  52 => 21,  50 => 20,  47 => 19,  44 => 18,  41 => 17,  31 => 12,  28 => 11,);
    }
}
