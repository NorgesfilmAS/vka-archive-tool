<?php

/* /vendors/toxus/views/layouts/dialogForm.twig */
class __TwigTemplate_472444a24df31e2930e039f3e61ec177 extends Twig_Template
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

    // line 6
    public function block_dialogHeader($context, array $blocks = array())
    {
        // line 7
        echo "<h3>";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "title"), "html", null, true);
        echo "</h3>
";
    }

    // line 10
    public function block_dialogBody($context, array $blocks = array())
    {
        // line 11
        echo "\t";
        if ($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "hasErrors", array(), "method")) {
            // line 12
            echo "\t<div class=\"row\">
\t\t<div class=\"col-sm-10 col-sm-offset-1 alert alert-danger\">\t\t\t
\t\t\t";
            // line 14
            echo $this->getAttribute((isset($context["html"]) ? $context["html"] : null), "errorSummary", array(0 => $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model")), "method");
            echo "
\t\t</div>
\t</div>
\t";
        }
        // line 17
        echo "\t
\t<div class=\"row no-horz-margin form-marge\">
  ";
        // line 19
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "_form"), "method"));
        $template->display(array_merge($context, array("isAjax" => 1)));
        // line 20
        echo "\t</div>\t\t
";
    }

    // line 24
    public function block_dialogFooter($context, array $blocks = array())
    {
        // line 25
        echo "<div class=\"row no-horz-margin pull-right\">
\t";
        // line 26
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "_buttons"), "method"));
        $template->display(array_merge($context, array("isAjax" => 1)));
        // line 27
        echo "</div>
";
    }

    // line 31
    public function block_onReady($context, array $blocks = array())
    {
        // line 32
        echo "\t\$(\".cls-";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["util"]) ? $context["util"] : null), "formId", array(0 => (isset($context["form"]) ? $context["form"] : null)), "method"), "html", null, true);
        echo "\").submit(function() { 
\t\t\$.ajax({ // create an AJAX call...
\t\t\tdata: \$(this).serialize(), // get the form data
\t\t\ttype: \$(this).attr('method'), // GET or POST
\t\t\turl: \$(this).attr('action'), // the file to call
\t\t\tsuccess: processResponse
\t\t});
\t\treturn false; // cancel original event to prevent form submitting
\t});
\tfunction processResponse(responseText, statusText, xhr, \$form) {
\t\tvar response=null;
\t\ttry\t{
      response = \$.parseJSON(responseText);
    } catch(err){
      response = false;
    }      
\t\tif (typeof response =='object') {
\t\t\tif (response.status == 200) {
\t\t\t\twindow.location = response.url;
\t\t\t} else {
\t\t\t\talert(\"";
        // line 52
        echo twig_escape_filter($this->env, YiiTranslate("base", "There was an unexepected response. (status != 200)"), "html", null, true);
        echo "\");
\t\t\t}\t
\t\t}\telse {
\t\t\t\$('#id-modal-body').html(responseText);
\t\t}\t
\t}\t\t

";
    }

    public function getTemplateName()
    {
        return "/vendors/toxus/views/layouts/dialogForm.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  109 => 52,  85 => 32,  82 => 31,  77 => 27,  74 => 26,  71 => 25,  68 => 24,  63 => 20,  60 => 19,  56 => 17,  49 => 14,  45 => 12,  42 => 11,  39 => 10,  32 => 7,  29 => 6,);
    }
}
