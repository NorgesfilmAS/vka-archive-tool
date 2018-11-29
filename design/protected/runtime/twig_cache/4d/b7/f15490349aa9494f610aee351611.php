<?php

/* /vendors/toxus/views/layouts/error.twig */
class __TwigTemplate_4db7f15490349aa9494f610aee351611 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'dialogHeader' => array($this, 'block_dialogHeader'),
            'dialogFooter' => array($this, 'block_dialogFooter'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate((((isset($context["dialog"]) ? $context["dialog"] : null)) ? ($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "ajaxDialog"), "method")) : ($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "main"), "method"))));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 10
    public function block_content($context, array $blocks = array())
    {
        // line 11
        echo "  <div class=\"row\">
  ";
        // line 12
        if (((isset($context["page"]) ? $context["page"] : null) != 1)) {
            // line 13
            echo "\t\t<div class=\"modal-header\">
\t\t\t\t<button type=\"button\" class=\"close action-close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>

\t\t\t<h4>";
            // line 16
            $this->displayBlock('dialogHeader', $context, $blocks);
            echo "</h4>
\t\t</div>
\t";
        }
        // line 18
        echo "\t
\t<div class=\"well well-lg\" style=\"margin-top: 30px;\">
\t<div class=\"row\" >
\t\t<div class=\"col-md-offset-3 col-md-6\">
\t\t\t<h4>";
        // line 22
        echo nl2br(twig_escape_filter($this->env, (isset($context["message"]) ? $context["message"] : null), "html", null, true));
        echo "</h4>
\t\t</div>\t\t
\t</div>
\t<div class=\"row\">
\t\t<div class=\"col-md-3\"> <i style=\"font-size: 50px; color:red;\" class=\"glyphicon glyphicon-wrench icon-size-large pull-right\"></i></div>
\t\t<div class=\"col-md-6\">
\t\t\t<p class=\"statement\">No biggie. Chillax. The page you are looking for is not here. Either we moved our site around, or this page never existed in the first place. Please check your url and try again or search our site with the <i class=\"icon-search\"></i> search button above.</p>
\t\t</div>
\t</div>\t
\t</div>\t
\t</div>\t
\t";
        // line 33
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "config"), "debug"), "fullError")) {
            // line 34
            echo "\t<div class=\"row\">
\t\t<div class=\"col-xs-12  well well-lg\">
\t\t\t<p>
\t\t\t\tcode: ";
            // line 37
            echo twig_escape_filter($this->env, (isset($context["code"]) ? $context["code"] : null), "html", null, true);
            echo "<br/>
\t\t\t\ttype: ";
            // line 38
            echo twig_escape_filter($this->env, (isset($context["type"]) ? $context["type"] : null), "html", null, true);
            echo "<br />
\t\t\t\tfile: ";
            // line 39
            echo twig_escape_filter($this->env, (isset($context["file"]) ? $context["file"] : null), "html", null, true);
            echo "<br />
\t\t\t\tline: ";
            // line 40
            echo twig_escape_filter($this->env, (isset($context["line"]) ? $context["line"] : null), "html", null, true);
            echo "<br /><br />
\t\t\t\ttrace: ";
            // line 41
            echo nl2br(twig_escape_filter($this->env, (isset($context["trace"]) ? $context["trace"] : null), "html", null, true));
            echo " <br />
\t\t\t</p>
\t\t</div>\t
\t</div>
\t";
        }
        // line 46
        echo "\t";
        if (((isset($context["page"]) ? $context["page"] : null) != 1)) {
            // line 47
            echo "  <div class=\"modal-footer\">
\t\t";
            // line 48
            $this->displayBlock('dialogFooter', $context, $blocks);
            // line 51
            echo "  </div>
\t";
        }
    }

    // line 16
    public function block_dialogHeader($context, array $blocks = array())
    {
        echo "<h3>";
        echo twig_escape_filter($this->env, ((array_key_exists("title", $context)) ? (_twig_default_filter((isset($context["title"]) ? $context["title"] : null), YiiTranslate("base", "error"))) : (YiiTranslate("base", "error"))), "html", null, true);
        echo "</h3>";
    }

    // line 48
    public function block_dialogFooter($context, array $blocks = array())
    {
        // line 49
        echo "    <a id=\"btn-close\" class=\"btn btn-primary action-close\" ";
        if ((isset($context["url"]) ? $context["url"] : null)) {
            echo "href=\"";
            echo twig_escape_filter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true);
            echo "\" ";
        } else {
            echo "data-dismiss=\"modal\"";
        }
        echo ">";
        echo twig_escape_filter($this->env, ((array_key_exists("closeCaption", $context)) ? (_twig_default_filter((isset($context["closeCaption"]) ? $context["closeCaption"] : null), YiiTranslate("button", "btn-close"))) : (YiiTranslate("button", "btn-close"))), "html", null, true);
        echo "</a>
\t\t";
    }

    public function getTemplateName()
    {
        return "/vendors/toxus/views/layouts/error.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 49,  120 => 48,  112 => 16,  106 => 51,  104 => 48,  101 => 47,  98 => 46,  90 => 41,  86 => 40,  82 => 39,  78 => 38,  74 => 37,  69 => 34,  67 => 33,  53 => 22,  47 => 18,  41 => 16,  36 => 13,  34 => 12,  31 => 11,  28 => 10,);
    }
}
