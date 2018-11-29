<?php

/* /views/layouts/previewVideojs.twig */
class __TwigTemplate_8c0530374db143e0b84f153b6af44bbc extends Twig_Template
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
\t\t<button class=\"btn-quality active \" 
\t\t\t href=\"#\" 
\t\t\t id='btn-hq'
\t\t\t data-quality=\"hq\">HQ</button>&nbsp; 
\t\t<button 
\t\t\t class=\"btn-quality\" 
\t\t\t id ='btn-lq'
\t\t\t data-quality=\"lq\"
\t\t\t href=\"#\" >LQ</button>
    <button 
\t\t\t class=\"btn-quality \" 
\t\t\t id ='btn-mezzanine'
\t\t\t data-quality=\"mezzanine\"
\t\t\t href=\"#\" >Mezzanine</button>    
       
\t</div>
\t";
        }
        // line 33
        echo "<h4>";
        echo twig_escape_filter($this->env, twig_slice($this->env, (isset($context["title"]) ? $context["title"] : null), 0, 60), "html", null, true);
        echo "</h4>
";
    }

    // line 36
    public function block_modalCloseText($context, array $blocks = array())
    {
        // line 37
        echo twig_escape_filter($this->env, YiiTranslate("button", "close"), "html", null, true);
        echo "
";
    }

    // line 40
    public function block_dialogBody($context, array $blocks = array())
    {
        // line 41
        echo "\t";
        if ($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "isVideo")) {
            // line 42
            echo "\t<div id=\"id-mezzanine\" class=\"text-center pagination-centered\" style=\"padding-left: 0px; display: none;\">
\t\t<video id=\"popup-video-mezzanine\" class=\"video-js vjs-default-skin\"
\t\t\t\tcontrols preload=\"auto\" width=\"598\" ";
            // line 45
            echo "\t\t\t\tposter=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "previewImageUrl"), "html", null, true);
            echo "?x=";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["util"]) ? $context["util"] : null), "unique", array(), "method"), "html", null, true);
            echo "\"
\t\t\t\tdata-setup='{\"example_option\":true}'>
\t\t\t<source src=\"";
            // line 47
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "previewUrl", array(0 => "mp4"), "method"), "html", null, true);
            echo "?x=";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["util"]) ? $context["util"] : null), "unique", array(), "method"), "html", null, true);
            echo "\" type='video/mp4' />
\t\t\t<source src=\"";
            // line 48
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "previewUrl", array(0 => "webm"), "method"), "html", null, true);
            echo "?x=";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["util"]) ? $context["util"] : null), "unique", array(), "method"), "html", null, true);
            echo "\" type='video/webm' />
\t\t</video>
\t</div>
  <div id=\"id-hq\" class=\"text-center pagination-centered\" style=\"padding-left: 0px; \">
\t\t<video id=\"popup-video-hq\" class=\"video-js vjs-default-skin\"
\t\t\t\tcontrols preload=\"auto\" width=\"598\" ";
            // line 54
            echo "\t\t\t\tposter=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "previewImageUrl"), "html", null, true);
            echo "?x=";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["util"]) ? $context["util"] : null), "unique", array(), "method"), "html", null, true);
            echo "\"
\t\t\t\tdata-setup='{\"example_option\":true}'>
\t\t\t<source src=\"";
            // line 56
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "previewUrl", array(0 => "mp4"), "method"), "html", null, true);
            echo "?x=";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["util"]) ? $context["util"] : null), "unique", array(), "method"), "html", null, true);
            echo "\" type='video/mp4' />
\t\t\t<source src=\"";
            // line 57
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "previewUrl", array(0 => "webm"), "method"), "html", null, true);
            echo "?x=";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["util"]) ? $context["util"] : null), "unique", array(), "method"), "html", null, true);
            echo "\" type='video/webm' />
\t\t</video>
\t</div>
\t";
            // line 60
            if ((isset($context["isMaster"]) ? $context["isMaster"] : null)) {
                // line 61
                echo "\t<div id=\"id-lq\" class=\"text-center pagination-centered\" style=\"padding-left: 0px;  display: none;\">
\t\t<video id=\"popup-video-lq\" class=\"video-js vjs-default-skin\"
\t\t\t\tcontrols preload=\"auto\" width=\"598\" ";
                // line 64
                echo "\t\t\t\tposter=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "previewImageUrl"), "html", null, true);
                echo "?x=";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["util"]) ? $context["util"] : null), "unique", array(), "method"), "html", null, true);
                echo "\"
\t\t\t\tdata-setup='{\"example_option\":true}'>
\t\t\t<source src=\"";
                // line 66
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "previewUrl", array(0 => "mp4", 1 => true), "method"), "html", null, true);
                echo "?x=";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["util"]) ? $context["util"] : null), "unique", array(), "method"), "html", null, true);
                echo "\" type='video/mp4' />
\t\t\t<source src=\"";
                // line 67
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "previewUrl", array(0 => "webm", 1 => true), "method"), "html", null, true);
                echo "?x=";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["util"]) ? $context["util"] : null), "unique", array(), "method"), "html", null, true);
                echo "\" type='video/webm' />
\t\t</video>
\t</div>
\t";
            }
            // line 71
            echo "\t";
        } else {
            // line 72
            echo "\t<div class=\"text-center pagination-centered\" >\t\t\t
\t\t\t<img src=\"";
            // line 73
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "previewImageUrl"), "html", null, true);
            echo "\" class=\"pagination-centered\" style=\"width: 598px;\"/>
\t</div> 
\t";
        }
        // line 75
        echo " 
";
    }

    // line 78
    public function block_dialogFooter($context, array $blocks = array())
    {
        // line 79
        if (((isset($context["isMaster"]) ? $context["isMaster"] : null) == 1)) {
            echo " \t
\t<div class=\"pull-left\">
\t\t";
            // line 81
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
        // line 84
        echo "\t
\t";
        // line 85
        $this->displayParentBlock("dialogFooter", $context, $blocks);
        echo "
";
    }

    // line 88
    public function block_onReady($context, array $blocks = array())
    {
        // line 89
        if (((isset($context["isMaster"]) ? $context["isMaster"] : null) == 1)) {
            echo " \t
\t\$('.quality-switch button').on('click', function() {
\t\tvar q = \$(this).data('quality');
\t\t\$('.quality-switch button').removeClass('active');
\t\t\$('#btn-'+q).addClass('active');
\t\t\$('#popup-video-lq').get(0).pause();
\t\t\$('#popup-video-hq').get(0).pause();
    \$('#popup-video-mezzanine').get(0).pause();    
\t\t\$('#id-lq').hide(0);\t\t
\t\t\$('#id-hq').hide(0);
    \$('#id-mezzanine').hide(0);
\t\t\$('#id-' + q).show(0);\t\t\t\t\t
\t});
\t\$('#id-modal').on('hidden.bs.modal', function () {
\t\t\$('#popup-video-lq').get(0).pause();
\t\t\$('#popup-video-hq').get(0).pause();\t\t
    \$('#popup-video-mezzanine').get(0).pause();
\t});
\t
";
        } else {
            // line 109
            echo "\t\$('.quality-switch').hide();
";
        }
        // line 111
        echo "\t\t
\t";
        // line 112
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
        return array (  236 => 112,  233 => 111,  229 => 109,  206 => 89,  203 => 88,  197 => 85,  194 => 84,  183 => 81,  178 => 79,  175 => 78,  170 => 75,  164 => 73,  161 => 72,  158 => 71,  149 => 67,  143 => 66,  135 => 64,  131 => 61,  129 => 60,  121 => 57,  115 => 56,  107 => 54,  97 => 48,  91 => 47,  83 => 45,  79 => 42,  76 => 41,  73 => 40,  67 => 37,  64 => 36,  57 => 33,  37 => 15,  35 => 14,  30 => 13,);
    }
}
