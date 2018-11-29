<?php

/* /views/layouts/previewVideojs.twig */
class __TwigTemplate_b2715bd85fae09f6f28b37b4ea9b5ceb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'dialogHeader' => array($this, 'block_dialogHeader'),
            'modalCloseText' => array($this, 'block_modalCloseText'),
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

    // line 13
    public function block_dialogHeader($context, array $blocks = array())
    {
        echo "\t
\t";
        // line 14
        if ($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "isVideo")) {
            // line 15
            echo "\t<div class=\"quality-switch\">
\t\t<button class=\"btn-quality active\" 
\t\t\t href=\"#\" 
\t\t\t id='btn-hq'
\t\t\t data-quality=\"hq\">HQ</button>&nbsp; 
\t\t<button 
\t\t\t class=\"btn-quality\" 
\t\t\t id ='btn-lq'
\t\t\t data-quality=\"lq\"
\t\t\t href=\"#\" >LQ</button>
\t</div>
\t";
        }
        // line 27
        echo "<h4>";
        echo twig_escape_filter($this->env, twig_slice($this->env, (isset($context["title"]) ? $context["title"] : null), 0, 60), "html", null, true);
        echo "</h4>
";
    }

    // line 30
    public function block_modalCloseText($context, array $blocks = array())
    {
        // line 31
        echo twig_escape_filter($this->env, YiiTranslate("button", "close"), "html", null, true);
        echo "
";
    }

    // line 34
    public function block_dialogBody($context, array $blocks = array())
    {
        // line 35
        echo "\t";
        if ($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "isVideo")) {
            // line 36
            echo "\t<div id=\"id-hq\" class=\"text-center pagination-centered\" style=\"padding-left: 0px;\">
\t\t<video id=\"popup-video-hq\" class=\"video-js vjs-default-skin\"
\t\t\t\tcontrols preload=\"auto\" width=\"598\" ";
            // line 39
            echo "\t\t\t\tposter=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "previewImageUrl"), "html", null, true);
            echo "?x=";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["util"]) ? $context["util"] : null), "unique", array(), "method"), "html", null, true);
            echo "\"
\t\t\t\tdata-setup='{\"example_option\":true}'>
\t\t\t<source src=\"";
            // line 41
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "previewUrl", array(0 => "mp4"), "method"), "html", null, true);
            echo "?x=";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["util"]) ? $context["util"] : null), "unique", array(), "method"), "html", null, true);
            echo "\" type='video/mp4' />
\t\t\t<source src=\"";
            // line 42
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "previewUrl", array(0 => "webm"), "method"), "html", null, true);
            echo "?x=";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["util"]) ? $context["util"] : null), "unique", array(), "method"), "html", null, true);
            echo "\" type='video/webm' />
\t\t</video>
\t</div>
\t";
            // line 45
            if ((isset($context["isMaster"]) ? $context["isMaster"] : null)) {
                // line 46
                echo "\t<div id=\"id-lq\" class=\"text-center pagination-centered\" style=\"padding-left: 0px;  display: none;\">
\t\t<video id=\"popup-video-lq\" class=\"video-js vjs-default-skin\"
\t\t\t\tcontrols preload=\"auto\" width=\"598\" ";
                // line 49
                echo "\t\t\t\tposter=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "previewImageUrl"), "html", null, true);
                echo "?x=";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["util"]) ? $context["util"] : null), "unique", array(), "method"), "html", null, true);
                echo "\"
\t\t\t\tdata-setup='{\"example_option\":true}'>
\t\t\t<source src=\"";
                // line 51
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "previewUrl", array(0 => "mp4", 1 => true), "method"), "html", null, true);
                echo "?x=";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["util"]) ? $context["util"] : null), "unique", array(), "method"), "html", null, true);
                echo "\" type='video/mp4' />
\t\t\t<source src=\"";
                // line 52
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "previewUrl", array(0 => "webm", 1 => true), "method"), "html", null, true);
                echo "?x=";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["util"]) ? $context["util"] : null), "unique", array(), "method"), "html", null, true);
                echo "\" type='video/webm' />
\t\t</video>
\t</div>
\t";
            }
            // line 56
            echo "\t";
        } else {
            // line 57
            echo "\t<div class=\"text-center pagination-centered\" >\t\t\t
\t\t\t<img src=\"";
            // line 58
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "previewImageUrl"), "html", null, true);
            echo "\" class=\"pagination-centered\" style=\"width: 598px;\"/>
\t</div> 
\t";
        }
        // line 60
        echo " 
";
    }

    // line 63
    public function block_dialogFooter($context, array $blocks = array())
    {
        // line 64
        if (((isset($context["isMaster"]) ? $context["isMaster"] : null) == 1)) {
            echo " \t
\t<div class=\"pull-left\">
\t\t";
            // line 66
            echo twig_escape_filter($this->env, YiiTranslate("app", "quality"), "html", null, true);
            echo ": <input id=\"id-quality\" type=\"checkbox\" name=\"quality\" checked=\"1\" data-on-label=\"";
            echo twig_escape_filter($this->env, YiiTranslate("app", "hi"), "html", null, true);
            echo "\" data-off-label=\"";
            echo twig_escape_filter($this->env, YiiTranslate("app", "low"), "html", null, true);
            echo "\"
\t\t>
\t</div>
";
        }
        // line 69
        echo "\t
\t";
        // line 70
        $this->displayParentBlock("dialogFooter", $context, $blocks);
        echo "
";
    }

    // line 73
    public function block_onReady($context, array $blocks = array())
    {
        // line 74
        if (((isset($context["isMaster"]) ? $context["isMaster"] : null) == 1)) {
            echo " \t
\t\$('.quality-switch button').on('click', function() {
\t\tvar q = \$(this).data('quality');
\t\t\$('.quality-switch button').removeClass('active');
\t\t\$('#btn-'+q).addClass('active');
\t\t\$('#popup-video-lq').get(0).pause();
\t\t\$('#popup-video-hq').get(0).pause();
\t\t\$('#id-lq').hide(0);\t\t
\t\t\$('#id-hq').hide(0);\t\t
\t\t\$('#id-' + q).show(0);\t\t\t\t\t
\t});
\t\$('#id-modal').on('hidden.bs.modal', function () {
\t\t\$('#popup-video-lq').get(0).pause();
\t\t\$('#popup-video-hq').get(0).pause();\t\t
\t});
\t
";
        } else {
            // line 91
            echo "\t\$('.quality-switch').hide();
";
        }
        // line 93
        echo "\t\t
\t";
        // line 94
        $this->displayParentBlock("onReady", $context, $blocks);
        echo "\t
";
    }

    public function getTemplateName()
    {
        return "/views/layouts/previewVideojs.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  203 => 94,  200 => 93,  196 => 91,  176 => 74,  173 => 73,  167 => 70,  164 => 69,  153 => 66,  148 => 64,  145 => 63,  140 => 60,  134 => 58,  131 => 57,  128 => 56,  119 => 52,  113 => 51,  105 => 49,  101 => 46,  99 => 45,  91 => 42,  85 => 41,  77 => 39,  73 => 36,  70 => 35,  67 => 34,  61 => 31,  58 => 30,  51 => 27,  37 => 15,  35 => 14,  30 => 13,);
    }
}
