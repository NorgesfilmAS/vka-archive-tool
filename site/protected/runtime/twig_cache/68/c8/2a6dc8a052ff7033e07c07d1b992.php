<?php

/* /views/job/viewJob.twig */
class __TwigTemplate_68c82a6dc8a052ff7033e07c07d1b992 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'dialogHeader' => array($this, 'block_dialogHeader'),
            'dialogBody' => array($this, 'block_dialogBody'),
            'dialogFooter' => array($this, 'block_dialogFooter'),
            'onReady' => array($this, 'block_onReady'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "dialog"), "method"));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_dialogHeader($context, array $blocks = array())
    {
        // line 5
        echo "\t";
        echo twig_escape_filter($this->env, YiiTranslate("app", "job information"), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "explain"), "html", null, true);
        echo "  
";
    }

    // line 8
    public function block_dialogBody($context, array $blocks = array())
    {
        // line 9
        echo "<dl class=\"dl-horizontal\">
\t<dt>";
        // line 10
        echo twig_escape_filter($this->env, YiiTranslate("app", "id"), "html", null, true);
        echo "</dt>   <dd>";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "id"), "html", null, true);
        echo "</dd>
\t<dt>";
        // line 11
        echo twig_escape_filter($this->env, YiiTranslate("app", "owner"), "html", null, true);
        echo "</dt>   <dd>";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "user"), "fullname"), "html", null, true);
        echo "</dd>
\t";
        // line 12
        if (($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "resourceType") == "Art")) {
            // line 13
            echo "\t<dt>";
            echo twig_escape_filter($this->env, YiiTranslate("app", "title"), "html", null, true);
            echo "</dt>\t\t
\t<dd>
\t\t";
            // line 15
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "art"), "title"), "html", null, true);
            echo " 
\t\t<a href=\"";
            // line 16
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "art/files", 1 => array("id" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "art"), "id"))), "method"), "html", null, true);
            echo "\">
\t\t\t<span class=\"glyphicon glyphicon-link\"></span>
\t\t</a>
\t</dd>
\t";
        } elseif (($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "resourceType") == "Agent")) {
            // line 21
            echo "\t<dt>";
            echo twig_escape_filter($this->env, YiiTranslate("app", "Name"), "html", null, true);
            echo "</dt>\t\t
\t<dd>
\t\t";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "agent"), "name"), "html", null, true);
            echo "
\t\t<a href=\"";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "agent/files", 1 => array("id" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "agent"), "id"))), "method"), "html", null, true);
            echo "\">
\t\t\t<span class=\"glyphicon glyphicon-link\"></span>
\t\t</a>
\t</dd>
\t";
        }
        // line 29
        echo "\t<dt>";
        echo twig_escape_filter($this->env, YiiTranslate("app", "type"), "html", null, true);
        echo "</dt>    <dd>";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "jobTypeText"), "html", null, true);
        echo "</dd>
\t";
        // line 30
        if (($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "job_type_id") == 5)) {
            // line 31
            echo "\t\t<dt>";
            echo twig_escape_filter($this->env, YiiTranslate("app", "filename"), "html", null, true);
            echo "</dt>    <dd>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "filename"), "html", null, true);
            echo "</dd>
\t\t<dt>";
            // line 32
            echo twig_escape_filter($this->env, YiiTranslate("app", "md5"), "html", null, true);
            echo "</dt>    <dd>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "action"), "html", null, true);
            echo "</dd>
\t";
        }
        // line 34
        echo "\t<dt>";
        echo twig_escape_filter($this->env, YiiTranslate("app", "created"), "html", null, true);
        echo "</dt> <dd>";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "creationDate"), "html", null, true);
        echo "</dd>
\t<dt>";
        // line 35
        echo twig_escape_filter($this->env, YiiTranslate("app", "started"), "html", null, true);
        echo "</dt> <dd>";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "startedDate"), "html", null, true);
        echo "</dd>
\t<dt>";
        // line 36
        echo twig_escape_filter($this->env, YiiTranslate("app", "ended"), "html", null, true);
        echo "</dt>   <dd>";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "endedDate"), "html", null, true);
        if (($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "is_finished") == 1)) {
            echo " (finished)";
        }
        echo "</dd>
\t";
        // line 37
        if ($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "error")) {
            // line 38
            echo "\t<dt>";
            echo twig_escape_filter($this->env, YiiTranslate("app", "error number"), "html", null, true);
            echo "</dt>   <dd>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "error"), "html", null, true);
            echo "</dd>
</dl>
\t";
            // line 40
            echo nl2br(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "error_message"), "html", null, true));
            echo "
";
        } else {
            // line 42
            echo "</dl>

";
        }
        // line 45
        if ($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "logging")) {
            // line 46
            echo "<dl >\t
\t<dt id=\"id-logging\"><a href='#'>";
            // line 47
            echo twig_escape_filter($this->env, YiiTranslate("app", "logging"), "html", null, true);
            echo "<span class=\"caret\"></span></a></dt>   <dd id=\"id-log-info\">";
            echo nl2br(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "logging"), "html", null, true));
            echo "</dd>
</dl>
";
        }
    }

    // line 52
    public function block_dialogFooter($context, array $blocks = array())
    {
        // line 53
        echo "\t";
        if ($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "user"), "hasMenu", array(0 => "job/endprocess"), "method")) {
            // line 54
            echo "\t\t<a class=\"btn btn-danger\" href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "job/endprocess", 1 => array("id" => $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "id"))), "method"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, YiiTranslate("button", "btn-end-process"), "html", null, true);
            echo "</a>
\t";
        }
        // line 56
        echo "\t<a class=\"btn btn-danger\" href=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "job/hide", 1 => array("id" => $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "id"))), "method"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, YiiTranslate("button", "btn-delete"), "html", null, true);
        echo "</a>
\t
\t";
        // line 58
        $this->displayParentBlock("dialogFooter", $context, $blocks);
        echo "
";
    }

    // line 61
    public function block_onReady($context, array $blocks = array())
    {
        // line 62
        echo "\t\$('#id-log-info').hide();
\t\$('#id-logging').on('click',function() {
\t\t\$('#id-log-info').toggle();
\t});
";
    }

    public function getTemplateName()
    {
        return "/views/job/viewJob.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  208 => 62,  205 => 61,  199 => 58,  191 => 56,  183 => 54,  180 => 53,  177 => 52,  167 => 47,  164 => 46,  162 => 45,  157 => 42,  152 => 40,  144 => 38,  142 => 37,  133 => 36,  127 => 35,  120 => 34,  113 => 32,  106 => 31,  104 => 30,  97 => 29,  89 => 24,  85 => 23,  79 => 21,  71 => 16,  67 => 15,  61 => 13,  59 => 12,  53 => 11,  47 => 10,  44 => 9,  41 => 8,  32 => 5,  29 => 4,);
    }
}
