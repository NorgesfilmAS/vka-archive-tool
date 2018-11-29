<?php

/* /vendors/toxus/views/article/list.twig */
class __TwigTemplate_14b5a39c12b910a758cfe40d1c965e3e extends Twig_Template
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
        // line 4
        echo "
<div class=\"article-list\">
";
        // line 6
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"));
        foreach ($context['_seq'] as $context["_key"] => $context["article"]) {
            // line 7
            echo "<div class=\"row\">
\t<div class=\"col-sm-12\">
\t\t<a href=\"#\" class=\"a-link\" data-id=\"";
            // line 9
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : null), "id"), "html", null, true);
            echo "\" data-url=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "article/v", 1 => array("key" => $this->getAttribute((isset($context["article"]) ? $context["article"] : null), "key"))), "method"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : null), "title"), "html", null, true);
            echo "</a>
\t</div>
</div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['article'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 13
        echo "</div>

<script type=\"text/javascript\">
\t\$('.a-link').on('click', function() {
    var id = \$(this).data('id');
\t\t\$.ajax({
\t\t\t'url' : \$(this).data('url'),
\t\t\t'success' : function(data) {
\t\t\t\t\$('";
        // line 21
        echo twig_escape_filter($this->env, ((array_key_exists("loadingDiv", $context)) ? (_twig_default_filter((isset($context["loadingDiv"]) ? $context["loadingDiv"] : null), ".article-body")) : (".article-body")), "html", null, true);
        echo "').html(data);
        \$('#btn-edit').attr('href', \"";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "article/edit", 1 => array("id" => "")), "method"), "html", null, true);
        echo "\" + id);        
        \$('#btn-edit').show();
\t\t\t}
\t\t});\t\t
\t});
  if ('";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "id"), "html", null, true);
        echo "' == '') {
    \$('#btn-edit').hide();
  }  
</script>";
    }

    public function getTemplateName()
    {
        return "/vendors/toxus/views/article/list.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 27,  59 => 22,  55 => 21,  45 => 13,  31 => 9,  27 => 7,  23 => 6,  19 => 4,);
    }
}
