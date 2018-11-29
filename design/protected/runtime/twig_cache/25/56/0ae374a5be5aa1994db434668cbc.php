<?php

/* /views/site/viewArtList.twig */
class __TwigTemplate_25560ae374a5be5aa1994db434668cbc extends Twig_Template
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
        echo "<div class=\"grid-row art-row row a-url table-hover\" data-url=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "art/view", 1 => array("id" => $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "id"))), "method"), "html", null, true);
        echo "\" >\t
\t<div class=\"col-xs-1 text-center\" >
\t\t";
        // line 3
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "isProcessing")) {
            // line 4
            echo "\t\t\t<img id=\"img-art-";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "id"), "html", null, true);
            echo "\" width=\"100%\" src=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["App"]) ? $context["App"] : null), "baseUrl"), "html", null, true);
            echo "/images/processing.jpg\" />\t\t\t
\t\t";
        } else {
            // line 5
            echo "\t\t\t
\t\t\t<img id=\"img-art-";
            // line 6
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "id"), "html", null, true);
            echo "\" 
\t\t\t\t\t width=\"100%\" 
\t\t\t\t\t";
            // line 8
            if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tvRatioUrl")) {
                echo " 
\t\t\t\t\t\tclass=\"menu-modal\" 
\t\t\t\t\t\tdata-compact=\"1\"
\t\t\t\t\t\tdata-url=\"";
                // line 11
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "art/preview", 1 => array("id" => $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "id"))), "method"), "html", null, true);
                echo "\" 
\t\t\t\t\t\tsrc=\"";
                // line 12
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tvRatioUrl"), "html", null, true);
                echo "\"";
            } else {
                echo "src=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["App"]) ? $context["App"] : null), "baseUrl"), "html", null, true);
                echo "/images/no-preview-small.png\"
\t\t\t\t\t";
            }
            // line 13
            echo " 
\t\t\t\t\tdata-missing-image=\"";
            // line 14
            echo twig_escape_filter($this->env, (isset($context["dataImagePath"]) ? $context["dataImagePath"] : null), "html", null, true);
            echo "\" />
\t\t";
        }
        // line 15
        echo "\t\t
\t</div>\t
\t<div class=\"col-xs-1 text-right\">";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "id"), "html", null, true);
        echo "</div>\t
\t<div class=\"col-xs-3 grid-col-no-wrap\">";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "title"), "html", null, true);
        echo "</div>\t
\t<div class=\"col-xs-1 text-right\">";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "year"), "html", null, true);
        echo "</div>\t
\t<div class=\"col-xs-3 grid-col-no-wrap\">";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "agent"), "html", null, true);
        echo "</div>\t
\t<div class=\"col-xs-1 grid-col-no-wrap\">";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "type"), "html", null, true);
        echo "</div>\t
\t<div class=\"col-xs-1 grid-col-no-wrap\">";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "format"), "html", null, true);
        echo "</div>\t
\t<div class=\"col-xs-1 text-right\">";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "length"), "html", null, true);
        echo "</div>\t
</div>";
    }

    public function getTemplateName()
    {
        return "/views/site/viewArtList.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  98 => 23,  94 => 22,  90 => 21,  86 => 20,  82 => 19,  78 => 18,  74 => 17,  70 => 15,  65 => 14,  62 => 13,  53 => 12,  49 => 11,  43 => 8,  38 => 6,  35 => 5,  27 => 4,  25 => 3,  19 => 1,);
    }
}
