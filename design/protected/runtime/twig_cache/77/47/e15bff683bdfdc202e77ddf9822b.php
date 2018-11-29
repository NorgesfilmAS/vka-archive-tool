<?php

/* vendors/toxus/views/layouts/dialog.twig */
class __TwigTemplate_7747e15bff683bdfdc202e77ddf9822b extends Twig_Template
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
        return array (  110 => 27,  103 => 15,  100 => 14,  94 => 11,  88 => 8,  82 => 7,  77 => 17,  75 => 14,  69 => 11,  63 => 8,  59 => 7,  43 => 28,  28 => 5,  25 => 4,  256 => 150,  241 => 136,  238 => 135,  235 => 134,  223 => 124,  213 => 120,  209 => 119,  204 => 117,  196 => 112,  192 => 110,  188 => 109,  182 => 106,  178 => 105,  175 => 104,  165 => 100,  161 => 99,  156 => 97,  148 => 92,  144 => 90,  140 => 89,  135 => 87,  131 => 86,  113 => 71,  96 => 57,  89 => 53,  85 => 52,  80 => 50,  66 => 39,  53 => 5,  48 => 26,  44 => 25,  41 => 27,  30 => 18,  27 => 16,);
    }
}
