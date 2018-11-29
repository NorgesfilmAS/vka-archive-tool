<?php

/* /views/site/viewArtSmall.twig */
class __TwigTemplate_5d2dc73596bd197e20aae0e6387c40d5 extends Twig_Template
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
        echo "
";
        // line 2
        if ((((isset($context["index"]) ? $context["index"] : null) % 3) == 0)) {
            // line 3
            echo "<div class=\"row\">
";
        }
        // line 4
        echo "\t

<div class=\"art-row art-spacer col-sm-4 clearfix\">\t
\t<div class=\"tile-view\">
\t\t<div class=\"preview-image\">\t
\t\t";
        // line 10
        echo "\t\t";
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "isProcessing")) {
            // line 11
            echo "\t\t\t<img id=\"img-art-";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "id"), "html", null, true);
            echo "\" width=\"100%\" src=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["App"]) ? $context["App"] : null), "baseUrl"), "html", null, true);
            echo "/images/processing.jpg\" />\t\t\t
\t\t";
        } else {
            // line 12
            echo "\t\t\t\t\t\t
\t\t\t<img id=\"img-art-";
            // line 13
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "id"), "html", null, true);
            echo "\" 
\t\t\t\t\t width=\"100%\" 
\t\t\t\t\t";
            // line 15
            if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tvRatioUrl")) {
                echo " 
\t\t\t\t\t\tclass=\"menu-modal\" 
\t\t\t\t\t\tdata-url=\"";
                // line 17
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "art/preview", 1 => array("id" => $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "id"))), "method"), "html", null, true);
                echo "\" 
\t\t\t\t\t\tsrc=\"";
                // line 18
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tvRatioUrl"), "html", null, true);
                echo "\"
\t\t\t\t\t\tdata-compact=\"1\"
\t\t\t\t\t";
            } else {
                // line 21
                echo "\t\t\t\t\t\tsrc=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["App"]) ? $context["App"] : null), "baseUrl"), "html", null, true);
                echo "/images/no-preview.png\"
\t\t\t\t\t";
            }
            // line 22
            echo " 
\t\t\t\t\tdata-missing-image=\"";
            // line 23
            echo twig_escape_filter($this->env, (isset($context["dataImagePath"]) ? $context["dataImagePath"] : null), "html", null, true);
            echo "\" />
\t\t\t";
            // line 24
            if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tvRatioUrl")) {
                // line 25
                echo "\t\t\t\t<span class=\"play menu-modal\" 
\t\t\t\t\t\t\tdata-url=\"";
                // line 26
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "art/preview", 1 => array("id" => $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "id"))), "method"), "html", null, true);
                echo "\"
\t\t\t\t\t\t\tdata-compact=\"1\">
\t\t\t\t</span>
\t\t\t";
            }
            // line 30
            echo "\t\t";
        }
        // line 31
        echo "\t\t</div>\t
\t\t<div class=\"preview-data line-div\">
\t\t\t<div class=\"art\">
\t\t\t\t<a href=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "art/view", 1 => array("id" => $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "id"))), "method"), "html", null, true);
        echo "\" >";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "title"), "html", null, true);
        echo "</a>&nbsp;\t\t\t\t
\t\t\t</div>
\t\t\t<div class=\"artist line-div\">
\t\t\t\t";
        // line 37
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "agents"));
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
        foreach ($context['_seq'] as $context["id"] => $context["name"]) {
            // line 38
            echo "\t\t\t\t<a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "agent/view", 1 => array("id" => (isset($context["id"]) ? $context["id"] : null))), "method"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
            if ((!$this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "last"))) {
                echo ", ";
            }
            echo "</a>
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
        unset($context['_seq'], $context['_iterated'], $context['id'], $context['name'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 39
        echo "&nbsp;
\t\t\t</div>
\t\t\t<div class=\"line-div\"><div class=\"data-label\">Year</div><div class=\"data-info\">";
        // line 41
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "year"), "html", null, true);
        echo "</div></div>\t
\t\t\t<div class=\"line-div\"><div class=\"data-label\">Org. format</div>";
        // line 42
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "format"), "html", null, true);
        echo "</div>\t
\t\t\t<div class=\"line-div\"><div class=\"data-label\">Length</div>";
        // line 43
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "length"), "html", null, true);
        echo "</div>\t
\t\t</div>\t
\t</div>
</div>

";
        // line 48
        if ((((isset($context["index"]) ? $context["index"] : null) % 3) == 2)) {
            // line 49
            echo "</div>
";
        }
        // line 50
        echo "\t
";
    }

    public function getTemplateName()
    {
        return "/views/site/viewArtSmall.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  175 => 50,  171 => 49,  169 => 48,  161 => 43,  157 => 42,  153 => 41,  149 => 39,  127 => 38,  110 => 37,  102 => 34,  97 => 31,  94 => 30,  87 => 26,  84 => 25,  82 => 24,  78 => 23,  75 => 22,  63 => 18,  59 => 17,  54 => 15,  49 => 13,  46 => 12,  38 => 11,  35 => 10,  24 => 3,  22 => 2,  19 => 1,  222 => 123,  211 => 114,  206 => 111,  198 => 105,  195 => 104,  193 => 87,  188 => 85,  184 => 84,  180 => 83,  176 => 82,  172 => 81,  168 => 80,  164 => 79,  159 => 76,  154 => 75,  151 => 74,  148 => 57,  146 => 56,  143 => 55,  140 => 54,  126 => 41,  111 => 40,  105 => 37,  103 => 36,  100 => 35,  93 => 31,  85 => 28,  81 => 26,  69 => 21,  66 => 15,  48 => 14,  45 => 13,  39 => 8,  36 => 7,  31 => 4,  28 => 4,);
    }
}
