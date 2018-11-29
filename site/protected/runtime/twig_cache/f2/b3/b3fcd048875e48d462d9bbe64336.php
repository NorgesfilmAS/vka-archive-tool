<?php

/* /views/site/listDeletedFiles.twig */
class __TwigTemplate_f2b3b3fcd048875e48d462d9bbe64336 extends Twig_Template
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
        if ($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "hasErrors", array(), "method")) {
            // line 6
            echo "<div class=\"bs-content\">
\t";
            // line 7
            echo "\t\t
\t<div class=\"row\">
\t\t<div class=\"col-lg-10 col-offset-2 alert alert-danger\">\t\t\t
\t\t\t";
            // line 10
            echo $this->getAttribute((isset($context["html"]) ? $context["html"] : null), "errorSummary", array(0 => $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model")), "method");
            echo "
\t\t</div>
\t</div>
</div>
";
        }
        // line 15
        echo "
<div class=\"bs-content\">
\t<div class=\"row\">
\t\t<div class=\"col-lg-10\">
\t\t\t<h3>Warning</h3>
\t\t\tResource Space does not store the original filename. This makes it a lot harder to restore file.<br />
\t\t\tThe only thing know is the id of the Art work the file was connected to and the extension.
\t\t</div>
\t</div>
  
\t<div class=\"row \">
\t\t<div class=\"col-lg-10\">\t\t
\t\t\t<h3>File in the delete directory</h3>\t\t\t
\t\t</div>
  </div>
\t\t<div class=\"row grid-header\">
\t\t\t<div class=\"col-sm-1 text-right\" data-sort=\"id\">";
        // line 31
        echo twig_escape_filter($this->env, YiiTranslate("app", "id"), "html", null, true);
        echo "</div>
\t\t\t<div class=\"col-sm-2 text-right\" data-sort=\"title\">";
        // line 32
        echo twig_escape_filter($this->env, YiiTranslate("app", "size"), "html", null, true);
        echo "</div>
\t\t\t<div class=\"col-sm-2 text-right\" data-sort=\"title\">";
        // line 33
        echo twig_escape_filter($this->env, YiiTranslate("app", "extension"), "html", null, true);
        echo "</div>
\t\t\t<div class=\"col-sm-2 \" data-sort=\"year\">";
        // line 34
        echo twig_escape_filter($this->env, YiiTranslate("app", "changed"), "html", null, true);
        echo "</div>
\t\t\t<div class=\"col-sm-1 \">";
        // line 35
        echo twig_escape_filter($this->env, YiiTranslate("app", "view"), "html", null, true);
        echo "</div>
\t\t\t<div class=\"col-sm-2 \">";
        // line 36
        echo twig_escape_filter($this->env, YiiTranslate("app", "download"), "html", null, true);
        echo "</div>
\t\t\t<div class=\"col-sm-1 \">";
        // line 37
        echo twig_escape_filter($this->env, YiiTranslate("app", "restore"), "html", null, true);
        echo "</div>
\t\t</div>\t
\t";
        // line 39
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["files"]) ? $context["files"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["file"]) {
            // line 40
            echo "\t\t<div class=\"grid-row art-row row table-hover\" >\t
\t\t\t<div class=\"col-sm-1 text-right  grid-col-no-wrap\">";
            // line 41
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["util"]) ? $context["util"] : null), "substringIndex", array(0 => $this->getAttribute((isset($context["util"]) ? $context["util"] : null), "substringIndex", array(0 => $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "name"), 1 => ".", 2 => 1), "method"), 1 => "_", 2 => 1), "method"), "html", null, true);
            echo "</div>\t
\t\t\t<div class=\"col-sm-2 text-right nowrap\">";
            // line 42
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "sizeText"), "html", null, true);
            echo "</div>\t
\t\t\t<div class=\"col-sm-2 text-right nowrap\">";
            // line 43
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "extension"), "html", null, true);
            echo "</div>\t
\t\t\t<div class=\"col-sm-2 \">";
            // line 44
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "time"), "d/m/Y"), "html", null, true);
            echo " </div>
\t\t\t<div class=\"col-sm-1 text-center\"><a href=\"#\" class=\"menu-modal\" data-url=\"";
            // line 45
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "site/deleteView", 1 => array("name" => $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "filename"))), "method"), "html", null, true);
            echo "\"><span class=\"glyphicon glyphicon-eye-open\"></span></a> </div>
\t\t\t<div class=\"col-sm-2 text-center\"><a href=\"";
            // line 46
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "site/deleteDownload", 1 => array("name" => $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "filename"))), "method"), "html", null, true);
            echo "\"><span class=\"glyphicon glyphicon-download\"></span></a></div>
\t\t\t<div class=\"col-sm-1 text-center\"><a href=\"";
            // line 47
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "site/deleteRestore", 1 => array("name" => $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "filename"))), "method"), "html", null, true);
            echo "\"><span class=\"glyphicon glyphicon-retweet\"></span></a> </div>\t\t\t
\t\t</div>\t
  ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 50
            echo "    Strange: There are no delete files 
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['file'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 51
        echo "\t
\t\t</div>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "/views/site/listDeletedFiles.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  144 => 51,  137 => 50,  129 => 47,  125 => 46,  121 => 45,  117 => 44,  113 => 43,  109 => 42,  105 => 41,  102 => 40,  97 => 39,  92 => 37,  88 => 36,  84 => 35,  80 => 34,  76 => 33,  72 => 32,  68 => 31,  50 => 15,  42 => 10,  37 => 7,  34 => 6,  32 => 5,  29 => 4,  26 => 3,);
    }
}
