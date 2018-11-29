<?php

/* /views/layouts/files.twig */
class __TwigTemplate_41a32d9d922e1d66ca94ca5efc2ae4bb extends Twig_Template
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
\t\t\t<!--
          master: ";
                // line 82
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "masterFileName"), "html", null, true);
                echo "
          webM high: ";
                // line 83
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "previewFileName", array(0 => "webm", 1 => false), "method"), "html", null, true);
                echo "
          webM low : ";
                // line 84
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "previewFileName", array(0 => "webm", 1 => true), "method"), "html", null, true);
                echo "
          mp4  high: ";
                // line 85
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "previewFileName", array(0 => "mp4", 1 => false), "method"), "html", null, true);
                echo "
          mp4  low : ";
                // line 86
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "previewFileName", array(0 => "mp4", 1 => true), "method"), "html", null, true);
                echo "
          mezzanine: ";
                // line 87
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "previewFileName", array(0 => "mezzanine"), "method"), "html", null, true);
                echo "
      -->
\t\t\t<dl class=\"dl-horizontal\">
        ";
                // line 90
                if ($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "masterFileExists")) {
                    // line 91
                    echo "      \t\t<dt>size</dt><dd>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "masterFileSize"), "html", null, true);
                    echo "</dd>
        \t<dt>original type</dt><dd>";
                    // line 92
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "masterFileExtension"), "html", null, true);
                    echo "</dd>
  \t\t\t";
                } else {
                    // line 94
                    echo "  \t\t\t  ";
                    echo twig_escape_filter($this->env, YiiTranslate("app", "The master file does not exist."), "html", null, true);
                    echo "
    \t\t";
                }
                // line 96
                echo "
\t\t\t\t";
                // line 98
                echo "\t\t\t\t<dt>preview webm</dt>
\t\t\t\t<dd>
\t\t\t\t\tHQ <span class=\"glyphicon ";
                // line 100
                if ($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "previewExists", array(0 => "webm", 1 => false), "method")) {
                    echo "glyphicon-ok text-success";
                } else {
                    echo "glyphicon-remove text-danger";
                }
                echo "\"></span>
\t\t\t\t\tLQ <span class=\"glyphicon ";
                // line 101
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
                // line 105
                if ($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "previewExists", array(0 => "mp4", 1 => false), "method")) {
                    echo "glyphicon-ok text-success";
                } else {
                    echo "glyphicon-remove text-danger";
                }
                echo "\"></span>
\t\t\t\t\tLQ <span class=\"glyphicon ";
                // line 106
                if ($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "previewExists", array(0 => "mp4", 1 => true), "method")) {
                    echo "glyphicon-ok text-success";
                } else {
                    echo "glyphicon-remove text-danger";
                }
                echo "\"></span>
\t\t\t\t</dd>
\t\t\t\t";
                // line 109
                echo "        <dt>Mezzanine</dt>
\t\t\t\t<dd>
\t\t\t\t\t<span class=\"glyphicon ";
                // line 111
                if ($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "previewExists", array(0 => "mezzanine"), "method")) {
                    echo "glyphicon-ok text-success";
                } else {
                    echo "glyphicon-remove text-danger";
                }
                echo "\"></span>\t\t\t\t\t
\t\t\t\t</dd>

\t\t\t</dl>
\t\t</div>\t
\t\t<div class=\"col-sm-4\">\t\t\t
\t\t\t";
                // line 117
                if ($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "masterFileExists")) {
                    // line 118
                    echo "\t\t\t<img id=\"img-art-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "id"), "html", null, true);
                    echo "\" 
\t\t\t\t\t width=\"100%\" 
\t\t\t\t\t";
                    // line 120
                    if (file_exists($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "previewImagePath"))) {
                        echo " 
\t\t\t\t\t\tclass=\"menu-modal\" 
\t\t\t\t\t\tdata-compact=\"1\"
\t\t\t\t\t\tdata-url=\"";
                        // line 123
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => ((isset($context["baseClass"]) ? $context["baseClass"] : null) . "/preview"), 1 => array("id" => $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "id"))), "method"), "html", null, true);
                        echo "\" 
\t\t\t\t\t\tsrc=\"";
                        // line 124
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "previewImageUrl"), "html", null, true);
                        echo "?r=";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["util"]) ? $context["util"] : null), "unique", array(), "method"), "html", null, true);
                        echo "\"
\t\t\t\t\t";
                    } else {
                        // line 126
                        echo "\t\t\t\t\t\tsrc=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["App"]) ? $context["App"] : null), "baseUrl"), "html", null, true);
                        echo "/images/no.preview.jpg\"
\t\t\t\t\t";
                    }
                    // line 127
                    echo " 
\t\t\t\t\tdata-missing-image=\"";
                    // line 128
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "previewImagePath"), "html", null, true);
                    echo "\" />
\t\t\t";
                }
                // line 130
                echo "\t\t</div>
\t\t";
            }
            // line 131
            echo "\t
\t</div>\t
\t";
        }
        // line 133
        echo "\t\t
</div>

";
        // line 139
        if (((twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "altFiles")) > 0) && ($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "user"), "hasMenu", array(0 => ((isset($context["baseClass"]) ? $context["baseClass"] : null) . "/alt-files")), "method") == 1))) {
            // line 140
            echo "  
  ";
            // line 141
            $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "file.alt"), "method"));
            $template->display($context);
            // line 142
            echo "
";
        } elseif (($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "user"), "hasMenu", array(0 => ((isset($context["baseClass"]) ? $context["baseClass"] : null) . "/alt-files")), "method") == 1)) {
            // line 144
            echo "\t<div class=\"bs-content\">
    <div class=\"bs-page-header no-padding no-bottom-padding\">
      ";
            // line 146
            echo twig_escape_filter($this->env, YiiTranslate("app", "there are no additional files"), "html", null, true);
            echo "
    </div>\t
\t</div>\t\t
";
        }
        // line 150
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "registerPackage", array(0 => "videojs"), "method"), "html", null, true);
        echo "
";
    }

    // line 154
    public function block_onReady($context, array $blocks = array())
    {
        // line 155
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
        // line 172
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
        return array (  411 => 172,  392 => 155,  389 => 154,  383 => 150,  376 => 146,  372 => 144,  368 => 142,  365 => 141,  362 => 140,  360 => 139,  355 => 133,  350 => 131,  346 => 130,  341 => 128,  338 => 127,  332 => 126,  325 => 124,  321 => 123,  315 => 120,  309 => 118,  307 => 117,  294 => 111,  290 => 109,  281 => 106,  273 => 105,  262 => 101,  254 => 100,  250 => 98,  247 => 96,  241 => 94,  236 => 92,  231 => 91,  229 => 90,  223 => 87,  219 => 86,  215 => 85,  211 => 84,  207 => 83,  203 => 82,  195 => 76,  187 => 73,  184 => 72,  181 => 71,  173 => 68,  170 => 67,  168 => 66,  165 => 65,  155 => 63,  152 => 62,  149 => 61,  146 => 60,  138 => 57,  135 => 56,  127 => 53,  123 => 51,  115 => 49,  112 => 48,  109 => 47,  106 => 46,  100 => 43,  97 => 42,  94 => 41,  88 => 38,  85 => 37,  83 => 36,  78 => 33,  70 => 31,  67 => 30,  65 => 29,  59 => 27,  56 => 24,  53 => 23,  46 => 20,  42 => 18,  40 => 17,  37 => 16,  33 => 14,  30 => 13,  27 => 12,);
    }
}
