<?php

/* /views/site/listUploadedFiles.twig */
class __TwigTemplate_8f9da2d14e96e862b565e3b1bfdc1b2c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'content' => array($this, 'block_content'),
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
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "
";
        // line 5
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "flash"), "method"));
        $template->display($context);
        // line 6
        echo "<div class=\"bs-content\">
\t<div class=\"row\">
\t\t<div class=\"col-lg-10\">
\t\t</div>
\t</div>
  
\t<div class=\"row \">
\t\t<div class=\"col-lg-10\">\t\t
\t\t\t<h3>File in the upload directory</h3>\t\t\t
\t\t</div>
  </div>
\t\t<div class=\"row grid-header\">
\t\t\t<div class=\"col-sm-7 \" data-sort=\"id\">";
        // line 18
        echo twig_escape_filter($this->env, YiiTranslate("app", "name"), "html", null, true);
        echo "</div>
\t\t\t<div class=\"col-sm-2 text-right\" data-sort=\"title\">";
        // line 19
        echo twig_escape_filter($this->env, YiiTranslate("app", "size"), "html", null, true);
        echo "</div>\t\t\t
\t\t\t<div class=\"col-sm-2 \" data-sort=\"year\">";
        // line 20
        echo twig_escape_filter($this->env, YiiTranslate("app", "changed"), "html", null, true);
        echo "</div>
\t\t\t<div class=\"col-sm-1 \">";
        // line 21
        echo twig_escape_filter($this->env, YiiTranslate("app", "MD5"), "html", null, true);
        echo "</div>
\t\t</div>\t
\t";
        // line 23
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["files"]) ? $context["files"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["file"]) {
            // line 24
            echo "\t\t<div class=\"grid-row art-row row table-hover\" >\t
\t\t\t<div class=\"col-sm-7 grid-col-no-wrap\">";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "basename"), "html", null, true);
            echo "</div>\t
\t\t\t<div class=\"col-sm-2 text-right nowrap\">";
            // line 26
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "sizeText"), "html", null, true);
            echo "</div>\t\t\t\t
\t\t\t<div class=\"col-sm-2 \">";
            // line 27
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "time"), "d/m/Y"), "html", null, true);
            echo " </div>
\t\t\t<div class=\"col-sm-1 text-center\">
\t\t\t\t<a href=\"";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "site/uploadedFiles", 1 => array("filename" => $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "basename"))), "method"), "html", null, true);
            echo "\"><span class=\"glyphicon glyphicon-retweet\"></span></a> 
\t\t\t</div>\t\t\t
\t\t</div>\t
  ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 33
            echo "    Strange: There are no uploaded files 
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['file'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 34
        echo "\t
\t\t</div>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "/views/site/listUploadedFiles.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 34,  96 => 33,  87 => 29,  82 => 27,  78 => 26,  74 => 25,  71 => 24,  66 => 23,  61 => 21,  57 => 20,  53 => 19,  49 => 18,  35 => 6,  32 => 5,  29 => 4,  26 => 3,);
    }
}
