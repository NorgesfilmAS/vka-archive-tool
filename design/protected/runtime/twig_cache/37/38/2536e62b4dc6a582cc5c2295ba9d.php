<?php

/* /views/layouts/files.twig */
class __TwigTemplate_37382536e62b4dc6a582cc5c2295ba9d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'content' => array($this, 'block_content'),
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

    // line 12
    public function block_content($context, array $blocks = array())
    {
        // line 13
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "caption"), "method"));
        $template->display($context);
        // line 14
        echo "
<div class=\"bs-content\">\t
\t";
        // line 16
        echo "\t\t
\t";
        // line 17
        if ($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "hasErrors", array(), "method")) {
            // line 18
            echo "\t<div class=\"row\">
\t\t<div class=\"col-lg-10 col-offset-2 alert alert-danger\">\t\t\t
\t\t\t";
            // line 20
            echo $this->getAttribute((isset($context["html"]) ? $context["html"] : null), "errorSummary", array(0 => $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model")), "method");
            echo "
\t\t</div>
\t</div>
\t";
        }
        // line 23
        echo "\t
\t\t";
        // line 24
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "flash"), "method"));
        $template->display($context);
        // line 27
        echo "\t";
        if (((!(isset($context["hideMasterResource"]) ? $context["hideMasterResource"] : null)) && $this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "user"), "hasMenu", array(0 => ((isset($context["baseClass"]) ? $context["baseClass"] : null) . "/master/view")), "method"))) {
            echo "\t
\t<div class=\"row\">
\t\t";
            // line 29
            if ($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "isProcessing")) {
                // line 30
                echo "\t\t<div class=\"col-sm-offset-8 col-sm-4\" >
\t\t\t<img id=\"img-art-";
                // line 31
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "id"), "html", null, true);
                echo "\" width=\"100%\" src=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["App"]) ? $context["App"] : null), "baseUrl"), "html", null, true);
                echo "/images/processing.jpg\" />\t\t\t
\t\t</div>\t
\t\t";
            } else {
                // line 33
                echo "\t\t
\t\t<div class=\"col-xs-3 col-md-4\" >
\t\t\t<ul class=\"button-list\">
\t\t\t\t";
                // line 36
                if ($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "masterFileExists")) {
                    // line 37
                    echo "\t\t\t\t<li>
\t\t\t\t\t<a id=\"btn-preview\" href=\"#\" data-url=\"";
                    // line 38
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => ((isset($context["baseClass"]) ? $context["baseClass"] : null) . "/preview"), 1 => array("id" => $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "id"))), "method"), "html", null, true);
                    echo "\"  class=\"btn btn-info menu-modal btn-block\">Preview</a>
\t\t\t\t</li>
\t\t\t\t";
                }
                // line 41
                echo "\t\t\t\t";
                if ((($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "user"), "hasMenu", array(0 => ((isset($context["baseClass"]) ? $context["baseClass"] : null) . "/download")), "method") == 1) && $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "masterFileExists"))) {
                    // line 42
                    echo "\t\t\t\t<li>
\t\t\t\t\t<a href=\"";
                    // line 43
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => ((isset($context["baseClass"]) ? $context["baseClass"] : null) . "/alt-download"), 1 => array("id" => $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "id"), "isMaster" => 1)), "method"), "html", null, true);
                    echo "\" class=\"btn btn-info btn-block\">Download</a>
\t\t\t\t</li>\t\t\t
\t\t\t\t";
                }
                // line 46
                echo "\t\t\t\t";
                if (($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "user"), "hasMenu", array(0 => ((isset($context["baseClass"]) ? $context["baseClass"] : null) . "/upload")), "method") == 1)) {
                    // line 47
                    echo "\t\t\t\t\t";
                    if (($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "masterFileExists") && $this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "user"), "hasMenu", array(0 => ((isset($context["baseClass"]) ? $context["baseClass"] : null) . "/file/change")), "method"))) {
                        // line 48
                        echo "\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a id=\"btn-link\" href=\"#\" data-url=\"";
                        // line 49
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => ((isset($context["baseClass"]) ? $context["baseClass"] : null) . "/upload"), 1 => array("id" => $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "id"), "isMaster" => 1)), "method"), "html", null, true);
                        echo "\"  class=\"btn btn-info menu-modal btn-block\">";
                        echo twig_escape_filter($this->env, YiiTranslate("app", "Change file"), "html", null, true);
                        echo "</a>
\t\t\t\t\t\t</li> 
          ";
                    } elseif (($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "masterFileExists") && $this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "user"), "hasMenu", array(0 => ((isset($context["baseClass"]) ? $context["baseClass"] : null) . "/changerequest")), "method"))) {
                        // line 51
                        echo "  
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a id=\"btn-link\" href=\"#\" data-url=\"";
                        // line 53
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => ((isset($context["baseClass"]) ? $context["baseClass"] : null) . "/changerequest"), 1 => array("id" => $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "id"), "isMaster" => 1)), "method"), "html", null, true);
                        echo "\"  class=\"btn btn-info menu-modal btn-block\">";
                        echo twig_escape_filter($this->env, YiiTranslate("app", "Request change file"), "html", null, true);
                        echo "</a>
\t\t\t\t\t\t</li>             
\t\t\t\t\t";
                    } elseif ((!$this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "masterFileExists"))) {
                        // line 56
                        echo "\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a id=\"btn-link\" href=\"#\" data-url=\"";
                        // line 57
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => ((isset($context["baseClass"]) ? $context["baseClass"] : null) . "/upload"), 1 => array("id" => $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "id"), "isMaster" => 1)), "method"), "html", null, true);
                        echo "\"  class=\"btn btn-info menu-modal btn-block\">";
                        echo twig_escape_filter($this->env, YiiTranslate("app", "Add file"), "html", null, true);
                        echo "</a>
\t\t\t\t\t\t</li> \t\t\t\t\t\t
\t\t\t\t\t";
                    }
                    // line 60
                    echo "\t\t\t\t";
                }
                // line 61
                echo "\t\t\t\t";
                if ((($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "user"), "hasMenu", array(0 => "job/reprocess"), "method") == 1) && $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "masterFileExists"))) {
                    // line 62
                    echo "\t\t\t\t\t<li>
\t\t\t\t\t\t<a id=\"btn-link\" href=\"#\" data-url=\"";
                    // line 63
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "job/reprocess", 1 => array("id" => $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "id"))), "method"), "html", null, true);
                    echo "\"  class=\"btn btn-info btn-block id-confirm\" data-confirm=\"";
                    echo twig_escape_filter($this->env, YiiTranslate("app", "Do you want to reprocess this file"), "html", null, true);
                    echo "?\">";
                    echo twig_escape_filter($this->env, YiiTranslate("app", "Re-process"), "html", null, true);
                    echo "</a>
\t\t\t\t\t</li> \t\t\t\t
\t\t\t\t";
                }
                // line 65
                echo "\t
\t\t\t\t";
                // line 66
                if (($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "user"), "hasMenu", array(0 => "art/md5"), "method") == 1)) {
                    // line 67
                    echo "\t\t\t\t\t<li>
\t\t\t\t\t\t<a id=\"btn-link\" href=\"#\" data-url=\"";
                    // line 68
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "art/md5", 1 => array("id" => $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "id"))), "method"), "html", null, true);
                    echo "\"  class=\"btn btn-info btn-block menu-modal\">";
                    echo twig_escape_filter($this->env, YiiTranslate("app", "MD5 information"), "html", null, true);
                    echo "</a>
\t\t\t\t\t</li> \t\t\t\t
\t\t\t\t";
                }
                // line 71
                echo "\t\t\t\t";
                if (($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "user"), "hasMenu", array(0 => "art/transfer"), "method") == 1)) {
                    // line 72
                    echo "\t\t\t\t\t<li>
\t\t\t\t\t\t<a id=\"btn-link\" href=\"#\" data-url=\"";
                    // line 73
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "transfer/listFiles", 1 => array("id" => $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "id"))), "method"), "html", null, true);
                    echo "\"  class=\"btn btn-info btn-block menu-modal\">";
                    echo twig_escape_filter($this->env, YiiTranslate("app", "Transfer files"), "html", null, true);
                    echo "</a>
\t\t\t\t\t</li> \t\t\t\t\t\t\t\t\t
\t\t\t\t";
                }
                // line 76
                echo "        
\t\t\t</ul>
\t\t</div>\t\t\t\t\t\t
\t\t<div class=\"col-xs-5 col-md-4 master-info\">
\t\t\t<h4>File information</h4>
\t\t\t";
                // line 81
                if ($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "masterFileExists")) {
                    // line 82
                    echo "\t\t\t<dl class=\"dl-horizontal\">
\t\t\t\t<dt>size</dt><dd>";
                    // line 83
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "masterFileSize"), "html", null, true);
                    echo "</dd>
\t\t\t\t<dt>original type</dt><dd>";
                    // line 84
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "masterFileExtension"), "html", null, true);
                    echo "</dd>
\t\t\t\t";
                    // line 86
                    echo "\t\t\t\t<dt>preview webm</dt>
\t\t\t\t<dd>
\t\t\t\t\tHQ <span class=\"glyphicon ";
                    // line 88
                    if ($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "previewExists", array(0 => "webm", 1 => false), "method")) {
                        echo "glyphicon-ok text-success";
                    } else {
                        echo "glyphicon-remove text-danger";
                    }
                    echo "\"></span>
\t\t\t\t\tLQ <span class=\"glyphicon ";
                    // line 89
                    if ($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "previewExists", array(0 => "webm", 1 => true), "method")) {
                        echo "glyphicon-ok text-success";
                    } else {
                        echo "glyphicon-remove text-danger";
                    }
                    echo "\"></span>
\t\t\t\t</dd>
\t\t\t\t<dt>preview mp4</dt>
\t\t\t\t<dd>
\t\t\t\t\tHQ <span class=\"glyphicon ";
                    // line 93
                    if ($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "previewExists", array(0 => "mp4", 1 => false), "method")) {
                        echo "glyphicon-ok text-success";
                    } else {
                        echo "glyphicon-remove text-danger";
                    }
                    echo "\"></span>
\t\t\t\t\tLQ <span class=\"glyphicon ";
                    // line 94
                    if ($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "previewExists", array(0 => "mp4", 1 => true), "method")) {
                        echo "glyphicon-ok text-success";
                    } else {
                        echo "glyphicon-remove text-danger";
                    }
                    echo "\"></span>
\t\t\t\t</dd>
\t\t\t\t";
                    // line 97
                    echo "
\t\t\t</dl>
\t\t\t";
                } else {
                    // line 100
                    echo "\t\t\t  ";
                    echo twig_escape_filter($this->env, YiiTranslate("app", "The master file does not exist."), "html", null, true);
                    echo "
\t\t\t";
                }
                // line 102
                echo "\t\t</div>\t
\t\t<div class=\"col-sm-4\">\t\t\t
\t\t\t";
                // line 104
                if ($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "masterFileExists")) {
                    // line 105
                    echo "\t\t\t<img id=\"img-art-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "id"), "html", null, true);
                    echo "\" 
\t\t\t\t\t width=\"100%\" 
\t\t\t\t\t";
                    // line 107
                    if (file_exists($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "previewImagePath"))) {
                        echo " 
\t\t\t\t\t\tclass=\"menu-modal\" 
\t\t\t\t\t\tdata-compact=\"1\"
\t\t\t\t\t\tdata-url=\"";
                        // line 110
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => ((isset($context["baseClass"]) ? $context["baseClass"] : null) . "/preview"), 1 => array("id" => $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "id"))), "method"), "html", null, true);
                        echo "\" 
\t\t\t\t\t\tsrc=\"";
                        // line 111
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "previewImageUrl"), "html", null, true);
                        echo "?r=";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["util"]) ? $context["util"] : null), "unique", array(), "method"), "html", null, true);
                        echo "\"
\t\t\t\t\t";
                    } else {
                        // line 113
                        echo "\t\t\t\t\t\tsrc=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["App"]) ? $context["App"] : null), "baseUrl"), "html", null, true);
                        echo "/images/no.preview.jpg\"
\t\t\t\t\t";
                    }
                    // line 114
                    echo " 
\t\t\t\t\tdata-missing-image=\"";
                    // line 115
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "previewImagePath"), "html", null, true);
                    echo "\" />
\t\t\t";
                }
                // line 117
                echo "\t\t</div>
\t\t";
            }
            // line 118
            echo "\t
\t</div>\t
\t";
        }
        // line 120
        echo "\t\t
</div>

";
        // line 126
        if (((twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "altFiles")) > 0) && ($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "user"), "hasMenu", array(0 => ((isset($context["baseClass"]) ? $context["baseClass"] : null) . "/alt-files")), "method") == 1))) {
            // line 127
            echo "  
  ";
            // line 128
            $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "file.alt"), "method"));
            $template->display($context);
            // line 129
            echo "
";
        } elseif (($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "user"), "hasMenu", array(0 => ((isset($context["baseClass"]) ? $context["baseClass"] : null) . "/alt-files")), "method") == 1)) {
            // line 131
            echo "\t<div class=\"bs-content\">
    <div class=\"bs-page-header no-padding no-bottom-padding\">
      ";
            // line 133
            echo twig_escape_filter($this->env, YiiTranslate("app", "there are no additional files"), "html", null, true);
            echo "
    </div>\t
\t</div>\t\t
";
        }
        // line 137
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "registerPackage", array(0 => "videojs"), "method"), "html", null, true);
        echo "
";
    }

    // line 141
    public function block_onReady($context, array $blocks = array())
    {
        // line 142
        echo "  \$('.menu-files').addClass('active');
\t
\t\$('.btn-edit').on('click', function() {
\t\twindow.location = window.location+\"?mode=edit\"; 
\t});
\t
\t\$('.id-confirm').on('click', function() {
\t\tmsg = \$(this).data('confirm');
\t\tif (msg && !confirm(msg)) {
\t\t\treturn; 
\t\t}
\t\twindow.location = \$(this).data('url');
\t});
\t\$('.id-preview').on('click', function(){ 
\t\talert('the preview is temporarydisabled');
\t});
\t
\t";
        // line 159
        $this->displayParentBlock("onReady", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "/views/layouts/files.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  374 => 159,  355 => 142,  352 => 141,  346 => 137,  339 => 133,  335 => 131,  331 => 129,  328 => 128,  325 => 127,  323 => 126,  318 => 120,  313 => 118,  309 => 117,  304 => 115,  301 => 114,  295 => 113,  288 => 111,  284 => 110,  278 => 107,  272 => 105,  270 => 104,  266 => 102,  260 => 100,  255 => 97,  246 => 94,  238 => 93,  227 => 89,  219 => 88,  215 => 86,  211 => 84,  207 => 83,  204 => 82,  202 => 81,  195 => 76,  187 => 73,  184 => 72,  181 => 71,  173 => 68,  170 => 67,  168 => 66,  165 => 65,  155 => 63,  152 => 62,  149 => 61,  146 => 60,  138 => 57,  135 => 56,  127 => 53,  123 => 51,  115 => 49,  112 => 48,  109 => 47,  106 => 46,  100 => 43,  97 => 42,  94 => 41,  88 => 38,  85 => 37,  83 => 36,  78 => 33,  70 => 31,  67 => 30,  65 => 29,  59 => 27,  56 => 24,  53 => 23,  46 => 20,  42 => 18,  40 => 17,  37 => 16,  33 => 14,  30 => 13,  27 => 12,);
    }
}
