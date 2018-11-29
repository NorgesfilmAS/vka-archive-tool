<?php

/* /views/site/viewArt.twig */
class __TwigTemplate_10bb9bbdf54a67894d5ebf5dc911fba9 extends Twig_Template
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
        echo "<div class=\"art-row row  search-item\" >
\t";
        // line 2
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "caption"), "method"));
        $template->display(array_merge($context, array("model" => (isset($context["data"]) ? $context["data"] : null))));
        echo "\t\t
\t<div class=\"col-xs-8 a-url\" data-url=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "art/view", 1 => array("id" => $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "id"))), "method"), "html", null, true);
        echo "\">\t
\t\t<div class=\"row\">
\t\t\t<div class=\"col-xs-8\">\t\t\t\t\t\t\t\t\t
\t\t\t\t<dl class=\"dl-horizontal2\">
\t\t\t\t\t<dt>";
        // line 7
        echo twig_escape_filter($this->env, YiiTranslate("app", "artist"), "html", null, true);
        echo "</dt>
\t\t\t\t\t<dd>";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "agent"), "html", null, true);
        echo " </dd>
\t\t\t\t\t<dt>";
        // line 9
        echo twig_escape_filter($this->env, YiiTranslate("app", "type"), "html", null, true);
        echo "</dt>
\t\t\t\t\t<dd>";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "type"), "html", null, true);
        echo " </dd>\t\t\t\t\t
\t\t\t\t\t<dt>";
        // line 11
        echo twig_escape_filter($this->env, YiiTranslate("app", "length"), "html", null, true);
        echo "</dt>
\t\t\t\t\t<dd>";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "length"), "html", null, true);
        echo " </dd>
\t\t\t\t</dl>
\t\t\t</div>\t\t\t\t\t
\t\t\t<div class=\"col-xs-4\">\t\t\t\t\t
\t\t\t\t<dl class=\"dl-horizontal2\">
\t\t\t\t\t<dt>";
        // line 17
        echo twig_escape_filter($this->env, YiiTranslate("app", "format"), "html", null, true);
        echo "</dt>
\t\t\t\t\t<dd>";
        // line 18
        echo twig_escape_filter($this->env, twig_join_filter($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "format"), ", "), "html", null, true);
        echo " </dd>
\t\t\t\t\t<dt>";
        // line 19
        echo twig_escape_filter($this->env, YiiTranslate("app", "collection"), "html", null, true);
        echo "</dt>
\t\t\t\t\t<dd>";
        // line 20
        echo twig_escape_filter($this->env, twig_join_filter($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "collection"), ", "), "html", null, true);
        echo " </dd>
\t\t\t\t\t<dt>";
        // line 21
        echo twig_escape_filter($this->env, YiiTranslate("app", "tags_gama"), "html", null, true);
        echo "</dt>
\t\t\t\t\t<dd>";
        // line 22
        echo twig_escape_filter($this->env, twig_join_filter($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tags_gama"), ", "), "html", null, true);
        echo "</dd>
\t\t\t\t\t<dt>";
        // line 23
        echo twig_escape_filter($this->env, YiiTranslate("app", "alternative files"), "html", null, true);
        echo "</dt>
\t\t\t\t\t<dd>";
        // line 24
        echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "altFiles")), "html", null, true);
        echo " files</dd>\t\t\t\t\t
\t\t\t\t</dl>\t\t\t\t\t\t\t\t
\t\t\t</div>\t\t
\t\t</div>\t\t
\t</div>\t\t
\t<div class=\"col-xs-4\">
\t";
        // line 30
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "isProcessing")) {
            // line 31
            echo "\t\t<img id=\"img-art-";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "id"), "html", null, true);
            echo "\" width=\"100%\" src=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["App"]) ? $context["App"] : null), "baseUrl"), "html", null, true);
            echo "/images/processing.jpg\" />\t\t\t
\t";
        } else {
            // line 33
            echo "\t\t<img id=\"img-art-";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "id"), "html", null, true);
            echo "\" width=\"100%\" ";
            if (file_exists($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "previewImagePath"))) {
                echo " class=\"menu-modal\" data-url=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "art/preview", 1 => array("id" => $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "id"))), "method"), "html", null, true);
                echo "\" src=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "previewImageUrl"), "html", null, true);
                echo "\"";
            } else {
                echo "src=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["App"]) ? $context["App"] : null), "baseUrl"), "html", null, true);
                echo "/images/no.preview.jpg\"";
            }
            echo " data-missing-image=\"";
            echo twig_escape_filter($this->env, (isset($context["dataImagePath"]) ? $context["dataImagePath"] : null), "html", null, true);
            echo "\" />
\t";
        }
        // line 34
        echo "\t

\t</div>
\t\t
</div>";
    }

    public function getTemplateName()
    {
        return "/views/site/viewArt.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  129 => 34,  109 => 33,  101 => 31,  99 => 30,  90 => 24,  86 => 23,  82 => 22,  78 => 21,  74 => 20,  70 => 19,  66 => 18,  62 => 17,  54 => 12,  50 => 11,  46 => 10,  42 => 9,  38 => 8,  34 => 7,  27 => 3,  22 => 2,  19 => 1,);
    }
}
