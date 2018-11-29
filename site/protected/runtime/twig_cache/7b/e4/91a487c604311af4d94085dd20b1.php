<?php

/* vendors/toxus/views/layouts/dialog.twig */
class __TwigTemplate_7be491a487c604311af4d94085dd20b1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'modalCloseText' => array($this, 'block_modalCloseText'),
            'dialogHeader' => array($this, 'block_dialogHeader'),
            'dialogBody' => array($this, 'block_dialogBody'),
            'dialogFooter' => array($this, 'block_dialogFooter'),
            'onReady' => array($this, 'block_onReady'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 4
        echo " ";
        $context["prefix"] = "dia-";
        // line 5
        $this->displayBlock('content', $context, $blocks);
        // line 18
        echo "  
<script type=\"text/javascript\">
\t\$().ready(function() {
\t\t\$('.action-close').on('click', function() {
\t\t\t\$('#id-modal').modal('hide');  
\t\t});
\t\t\$('.a-url').on('click', function() {
\t\t\twindow.location = \$(this).data('url');
\t\t});\t\t
\t\t";
        // line 27
        $this->displayBlock('onReady', $context, $blocks);
        // line 28
        echo "\t";
        echo $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "scriptOnReady", array(0 => true), "method");
        echo "  
\t});\t

</script>\t
";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        echo " 
\t<div class=\"modal-header\">
    <button type=\"button\" class=\"close action-close\" data-dismiss=\"modal\" aria-hidden=\"true\">";
        // line 7
        $this->displayBlock('modalCloseText', $context, $blocks);
        echo "</button>
    ";
        // line 8
        $this->displayBlock('dialogHeader', $context, $blocks);
        echo "&nbsp;
  </div>
  <div class=\"modal-body\" >
\t\t";
        // line 11
        $this->displayBlock('dialogBody', $context, $blocks);
        echo "    
  </div>
  <div class=\"modal-footer\">
\t\t";
        // line 14
        $this->displayBlock('dialogFooter', $context, $blocks);
        // line 17
        echo "  </div>
";
    }

    // line 7
    public function block_modalCloseText($context, array $blocks = array())
    {
        echo "×";
    }

    // line 8
    public function block_dialogHeader($context, array $blocks = array())
    {
        echo "dialogHeader";
    }

    // line 11
    public function block_dialogBody($context, array $blocks = array())
    {
        echo "This is the body";
    }

    // line 14
    public function block_dialogFooter($context, array $blocks = array())
    {
        // line 15
        echo "    <button id=\"btn-close\" class=\"btn action-close\">";
        echo twig_escape_filter($this->env, YiiTranslate("button", "btn-close"), "html", null, true);
        echo "</button>
\t\t";
    }

    // line 27
    public function block_onReady($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "vendors/toxus/views/layouts/dialog.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 27,  103 => 15,  100 => 14,  94 => 11,  88 => 8,  75 => 14,  69 => 11,  59 => 7,  53 => 5,  43 => 28,  41 => 27,  30 => 18,  28 => 5,  25 => 4,  109 => 52,  85 => 32,  82 => 7,  77 => 17,  74 => 26,  71 => 25,  68 => 24,  63 => 8,  60 => 19,  56 => 17,  49 => 14,  45 => 12,  42 => 11,  39 => 10,  32 => 7,  29 => 6,);
    }
}
