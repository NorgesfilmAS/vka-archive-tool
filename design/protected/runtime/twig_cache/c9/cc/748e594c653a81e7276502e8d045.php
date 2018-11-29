<?php

/* vendors/toxus/views/layouts/mail.twig */
class __TwigTemplate_c9cc748e594c653a81e7276502e8d045 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'toUser' => array($this, 'block_toUser'),
            'fromUser' => array($this, 'block_fromUser'),
            'subject' => array($this, 'block_subject'),
            'body' => array($this, 'block_body'),
            'html' => array($this, 'block_html'),
            'pdf' => array($this, 'block_pdf'),
            'attach' => array($this, 'block_attach'),
            'config' => array($this, 'block_config'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 4
        echo "#to:";
        $this->displayBlock('toUser', $context, $blocks);
        // line 5
        echo "
#from:";
        // line 6
        $this->displayBlock('fromUser', $context, $blocks);
        // line 7
        echo "
#subject:";
        // line 8
        $this->displayBlock('subject', $context, $blocks);
        // line 9
        echo "
#body: 
";
        // line 11
        $this->displayBlock('body', $context, $blocks);
        // line 12
        echo "
#html:
";
        // line 14
        $this->displayBlock('html', $context, $blocks);
        // line 15
        echo "
#pdf:
";
        // line 17
        $this->displayBlock('pdf', $context, $blocks);
        // line 18
        echo "
#attach:
";
        // line 20
        $this->displayBlock('attach', $context, $blocks);
        // line 21
        echo "
#config:
";
        // line 23
        $this->displayBlock('config', $context, $blocks);
    }

    // line 4
    public function block_toUser($context, array $blocks = array())
    {
        echo "toUser ";
    }

    // line 6
    public function block_fromUser($context, array $blocks = array())
    {
    }

    // line 8
    public function block_subject($context, array $blocks = array())
    {
        echo "subject ";
    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        echo "body";
    }

    // line 14
    public function block_html($context, array $blocks = array())
    {
        echo "html";
    }

    // line 17
    public function block_pdf($context, array $blocks = array())
    {
        echo "pdf NOT YET (is parsed to a pdf and attached)";
    }

    // line 20
    public function block_attach($context, array $blocks = array())
    {
        echo "attach NET YET (one file per line)";
    }

    // line 23
    public function block_config($context, array $blocks = array())
    {
        echo "NOT YET debug=1 (one per line_";
    }

    public function getTemplateName()
    {
        return "vendors/toxus/views/layouts/mail.twig";
    }

    public function getDebugInfo()
    {
        return array (  113 => 23,  107 => 20,  101 => 17,  95 => 14,  89 => 11,  83 => 8,  78 => 6,  68 => 23,  64 => 21,  62 => 20,  58 => 18,  56 => 17,  52 => 15,  46 => 12,  40 => 9,  38 => 8,  33 => 6,  30 => 5,  27 => 4,  110 => 41,  105 => 39,  99 => 36,  93 => 33,  88 => 31,  82 => 29,  79 => 28,  72 => 4,  67 => 22,  61 => 19,  55 => 16,  50 => 14,  44 => 11,  41 => 11,  35 => 7,  29 => 7,);
    }
}
