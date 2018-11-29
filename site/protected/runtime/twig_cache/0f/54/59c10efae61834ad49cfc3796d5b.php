<?php

/* /views/transfer/view.twig */
class __TwigTemplate_0f5459c10efae61834ad49cfc3796d5b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'pageTitle' => array($this, 'block_pageTitle'),
            'menuLeft' => array($this, 'block_menuLeft'),
            'content' => array($this, 'block_content'),
            'bootstrap3Footer' => array($this, 'block_bootstrap3Footer'),
            'onReady' => array($this, 'block_onReady'),
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

    // line 10
    public function block_pageTitle($context, array $blocks = array())
    {
        // line 11
        echo "  Videokunst Archivet
";
    }

    // line 14
    public function block_menuLeft($context, array $blocks = array())
    {
        // line 15
        echo "  <div class=\"transfer\">
  ";
        // line 16
        if (($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "userMasterViewLQMp4") && $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "userMasterViewHQMp4"))) {
            // line 17
            echo "    <h5>Artwork</h5>
    <ul>
    ";
            // line 19
            if ($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "userMasterViewLQMp4")) {
                // line 20
                echo "      <li><a href=\"#\"><span class=\"play-lq\">Show Low Quality</span></a></li>
    ";
            }
            // line 22
            echo "    ";
            if ($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "userMasterViewHQMp4")) {
                // line 23
                echo "      <li><a href=\"#\"><span class=\"play-hq\">Show High Quality</span></a></li>
    ";
            }
            // line 25
            echo "    </ul>
  ";
        }
        // line 26
        echo "  
  ";
        // line 27
        if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "userMasterDownloadFiles")) > 0)) {
            // line 28
            echo "    <h5>Downloadable art file";
            if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "userMasterDownloadFiles")) > 1)) {
                echo "s";
            }
            echo "</h5>
    <ul >
      ";
            // line 30
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "userMasterDownloadFiles"));
            foreach ($context['_seq'] as $context["_key"] => $context["file"]) {
                // line 31
                echo "        <li class=\"file\">
          <a href=\"";
                // line 32
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "url"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, YiiTranslate("app", $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "caption")), "html", null, true);
                echo "</a>
        </li>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['file'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 35
            echo "    </ul>
  ";
        }
        // line 36
        echo "  
  ";
        // line 37
        if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "userAltDownloadFiles")) > 0)) {
            // line 38
            echo "    <h5>Other file";
            if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "userAltDownloadFiles")) > 1)) {
                echo "s";
            }
            echo "</h5>
    <ul >
      ";
            // line 40
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "userAltDownloadFiles"));
            foreach ($context['_seq'] as $context["_key"] => $context["file"]) {
                // line 41
                echo "        <li class=\"file\">
          <a href=\"";
                // line 42
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "url"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, YiiTranslate("app", $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "caption")), "html", null, true);
                echo "</a>
        </li>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['file'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 45
            echo "    </ul>
  ";
        }
        // line 46
        echo "  
  
  </div>
";
    }

    // line 51
    public function block_content($context, array $blocks = array())
    {
        // line 52
        echo "  <div class=\"transfer-view\">
    <h2>";
        // line 53
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "art"), "title"), "html", null, true);
        echo " <span class='pull-right'>";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "art"), "year"), "html", null, true);
        echo "</span></h2>
    <h4>";
        // line 54
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "art"), "artistNames"), "html", null, true);
        echo "</h4>
  </div>
  <div class=\"preview\">
    ";
        // line 57
        if ($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "userMasterViewLQMp4")) {
            // line 58
            echo "    <video id=\"id-video-lq\" 
           class=\"video-js vjs-default-skin\"       
           poster=\"";
            // line 60
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "art"), "previewImageUrl"), "html", null, true);
            echo "\" 
           preload=\"auto\" 
           controls=\"\">
      <source type=\"video/mp4\" 
            src=\"";
            // line 64
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "UserMasterViewLQMp4"), "url"), "html", null, true);
            echo "\"></source>
      <source type=\"video/webm\" 
              src=\"";
            // line 66
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "UserMasterViewLQWebm"), "url"), "html", null, true);
            echo "\"></source>
    </video>
    ";
        }
        // line 69
        echo "    ";
        if ($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "userMasterViewHQMp4")) {
            // line 70
            echo "    <video id=\"id-video-hq\" 
           class=\"video-js vjs-default-skin\"       
           poster=\"";
            // line 72
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "art"), "previewImageUrl"), "html", null, true);
            echo "\" 
           preload=\"auto\" 
           controls=\"\">
      <source type=\"video/mp4\" 
            src=\"";
            // line 76
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "UserMasterViewHQMp4"), "url"), "html", null, true);
            echo "\"></source>
      <source type=\"video/webm\" 
              src=\"";
            // line 78
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "UserMasterViewHQWebm"), "url"), "html", null, true);
            echo "\"></source>
    </video>
    ";
        }
        // line 81
        echo "    
  </div>
";
        // line 83
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "registerPackage", array(0 => "videojs"), "method"), "html", null, true);
        echo "    
";
    }

    // line 86
    public function block_bootstrap3Footer($context, array $blocks = array())
    {
    }

    // line 89
    public function block_onReady($context, array $blocks = array())
    {
        echo "  
  
  
  ";
        // line 92
        if (($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "UserMasterViewHQMp4") && $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "UserMasterViewLQMp4"))) {
            // line 93
            echo "    \$('#id-video-lq').hide();
    \$('.play-hq').on('click',function() {
      \$('#id-video-lq').hide();
      \$('#id-video-hq').show();
    });
    \$('.play-lq').on('click',function() {
      \$('#id-video-hq').hide();
      \$('#id-video-lq').show();    
  });    
  ";
        }
        // line 102
        echo "  
  
  ";
        // line 104
        $this->displayParentBlock("onReady", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "/views/transfer/view.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  251 => 104,  247 => 102,  235 => 93,  233 => 92,  226 => 89,  221 => 86,  215 => 83,  211 => 81,  205 => 78,  200 => 76,  193 => 72,  189 => 70,  186 => 69,  180 => 66,  175 => 64,  168 => 60,  164 => 58,  162 => 57,  156 => 54,  150 => 53,  147 => 52,  144 => 51,  137 => 46,  133 => 45,  122 => 42,  119 => 41,  115 => 40,  107 => 38,  105 => 37,  102 => 36,  98 => 35,  87 => 32,  84 => 31,  80 => 30,  72 => 28,  70 => 27,  67 => 26,  63 => 25,  59 => 23,  56 => 22,  52 => 20,  50 => 19,  46 => 17,  44 => 16,  41 => 15,  38 => 14,  33 => 11,  30 => 10,);
    }
}
