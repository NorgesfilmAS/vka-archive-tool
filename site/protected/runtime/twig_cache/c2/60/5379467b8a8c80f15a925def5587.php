<?php

/* views/layouts/file.alt.twig */
class __TwigTemplate_c2605379467b8a8c80f15a925def5587 extends Twig_Template
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
        echo "<div class=\"panel-group list-toggle\" id=\"accordion\">
\t";
        // line 5
        $context["folder"] = "XXXXXXX";
        // line 6
        echo "
\t";
        // line 7
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "altFiles"));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["altFile"]) {
            // line 8
            echo "\t\t";
            if (((isset($context["folder"]) ? $context["folder"] : null) != $this->getAttribute((isset($context["altFile"]) ? $context["altFile"] : null), "folder"))) {
                // line 9
                echo "\t\t\t";
                if ((!$this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "first"))) {
                    echo "\t";
                    echo "\t\t
      </div>
    </div>
  </div>\t\t
\t\t\t";
                }
                // line 14
                echo "  ";
                echo "    
\t<div class=\"panel panel-default\">
\t\t<div class=\"panel-heading\">
\t\t\t<span class=\"pull-right\">
\t\t\t\t<a class=\"display-layout";
                // line 18
                if (((isset($context["userLayout"]) ? $context["userLayout"] : null) == "list")) {
                    echo " active ";
                }
                echo "\" title=\"";
                echo twig_escape_filter($this->env, YiiTranslate("app", "Show files in a list layout"), "html", null, true);
                echo "\" data-layout=\"tiles\" href=\"?layout=list\">
\t\t\t\t\t<span class=\"glyphicon glyphicon-th\"></span>
\t\t\t\t</a>&nbsp;

\t\t\t\t<a class=\"display-layout";
                // line 22
                if (((isset($context["userLayout"]) ? $context["userLayout"] : null) == "grid")) {
                    echo " active ";
                }
                echo "\" title=\"";
                echo twig_escape_filter($this->env, YiiTranslate("app", "show files in a grid layout"), "html", null, true);
                echo "\" data-layout=\"grid\" href=\"?layout=grid\">
\t\t\t\t\t<span class=\"glyphicon glyphicon-th-list\"></span>
\t\t\t\t</a>\t\t\t
\t\t\t</span>
\t\t\t<h4 class=\"panel-title\">
        ";
                // line 27
                if ($this->getAttribute((isset($context["altFile"]) ? $context["altFile"] : null), "folder")) {
                    // line 28
                    echo "          ";
                    echo twig_escape_filter($this->env, YiiTranslate("app", "Documents"), "html", null, true);
                    echo " <a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["altFile"]) ? $context["altFile"] : null), "id"), "html", null, true);
                    echo "\"> - ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["altFile"]) ? $context["altFile"] : null), "folder"), "html", null, true);
                    echo " <span class=\"caret\"></span></a></h4>\t\t\t\t\t
        ";
                } else {
                    // line 29
                    echo "\t
          <a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse";
                    // line 30
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["altFile"]) ? $context["altFile"] : null), "id"), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, YiiTranslate("app", "Documents"), "html", null, true);
                    echo "</a>
        ";
                }
                // line 31
                echo "\t
\t\t\t</h4>\t\t\t\t\t\t\t\t\t\t
\t\t</div>
\t\t<div id=\"collapse";
                // line 34
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["altFile"]) ? $context["altFile"] : null), "id"), "html", null, true);
                echo "\" class=\"panel-collapse collapse";
                if ($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "first")) {
                    echo " in";
                }
                echo "\">
\t\t\t<div class=\"panel-grid row\">\t
\t\t\t\t";
                // line 36
                if (((isset($context["userLayout"]) ? $context["userLayout"] : null) == "grid")) {
                    // line 37
                    echo "          <div class=\"row grid-header\">
            <div class=\"col-xs-1\"></div>
            <div class=\"col-xs-7\">Name</div>
            <div class=\"col-xs-1\">Kind</div>
            <div class=\"col-xs-1\">Size</div>
          </div>\t\t\t\t\t\t
\t\t\t\t";
                }
                // line 44
                echo "  \t\t\t";
                $context["folder"] = $this->getAttribute((isset($context["altFile"]) ? $context["altFile"] : null), "folder");
                echo "\t\t\t
\t\t";
            }
            // line 46
            echo "\t\t\t\t\t\t
\t\t";
            // line 47
            echo "\t\t\t\t
\t";
            // line 48
            if (((isset($context["userLayout"]) ? $context["userLayout"] : null) == "grid")) {
                // line 49
                echo "    
\t<div class=\"row table-hover file-table\" >\t
\t\t<div class=\"col-xs-1\">
\t\t\t<img
\t\t\t\t\tstyle=\"width:100%\"
\t\t\t\t";
                // line 54
                if ($this->getAttribute((isset($context["altFile"]) ? $context["altFile"] : null), "isProcessing")) {
                    // line 55
                    echo "\t\t\t\t\tsrc=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["App"]) ? $context["App"] : null), "baseUrl"), "html", null, true);
                    echo "/images/processing.jpg\"
\t\t\t\t";
                } else {
                    // line 57
                    echo "\t\t\t\t\tclass=\"menu-modal\"\t\t\t\t\t
\t\t\t\t\tsrc=\"";
                    // line 58
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["altFile"]) ? $context["altFile"] : null), "tvRatioUrl"), "html", null, true);
                    echo "\"
\t\t\t\t\tdata-url=\"";
                    // line 59
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => ((isset($context["baseClass"]) ? $context["baseClass"] : null) . "/alternative"), 1 => array("id" => $this->getAttribute((isset($context["altFile"]) ? $context["altFile"] : null), "id"), "action" => "preview", "isMaster" => 0)), "method"), "html", null, true);
                    echo "\" 
\t\t\t\t\tdata-compact=\"1\"
\t\t\t\t";
                }
                // line 62
                echo "\t\t\t\t>\t\t\t
\t\t</div>
\t\t<div class=\"col-xs-7\">";
                // line 64
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["altFile"]) ? $context["altFile"] : null), "name"), "html", null, true);
                echo "</div>\t
\t\t<div class=\"col-xs-1 \">";
                // line 65
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["altFile"]) ? $context["altFile"] : null), "file_extension"), "html", null, true);
                echo "</div>\t
\t\t";
                // line 67
                echo "\t\t<div class=\"col-xs-1 text-right grid-col-no-wrap\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["altFile"]) ? $context["altFile"] : null), "fileSize"), "html", null, true);
                echo "</div>\t

\t\t<div class=\"col-xs-2 text-right\">
\t\t";
                // line 70
                if ($this->getAttribute((isset($context["altFile"]) ? $context["altFile"] : null), "isProcessing")) {
                    // line 71
                    echo "\t\t\t<span class=\"processing-job\">";
                    echo twig_escape_filter($this->env, YiiTranslate("app", "Processing"), "html", null, true);
                    echo "</span>
\t\t";
                } else {
                    // line 73
                    echo "\t\t\t";
                    if ($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "user"), "hasMenu", array(0 => ((isset($context["baseClass"]) ? $context["baseClass"] : null) . "/alt-edit")), "method")) {
                        // line 74
                        echo "\t\t\t<a id=\"btn-alt-edit-";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["altFile"]) ? $context["altFile"] : null), "id"), "html", null, true);
                        echo "\" class=\"menu-modal\" href=\"#\" data-url=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => ((isset($context["baseClass"]) ? $context["baseClass"] : null) . "/alternative"), 1 => array("id" => $this->getAttribute((isset($context["altFile"]) ? $context["altFile"] : null), "id"), "isMaster" => 0)), "method"), "html", null, true);
                        echo "\" >
\t\t\t\t<span class=\"glyphicon glyphicon-pencil\"></span>
\t\t\t</a>
\t\t\t";
                    }
                    // line 78
                    echo "\t\t\t";
                    if ($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "user"), "hasMenu", array(0 => ((isset($context["baseClass"]) ? $context["baseClass"] : null) . "/alt-edit")), "method")) {
                        // line 79
                        echo "\t\t\t<a id=\"btn-alt-dele-";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["altFile"]) ? $context["altFile"] : null), "id"), "html", null, true);
                        echo "\" class=\"id-confirm\"  href=\"#\" data-url=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => ((isset($context["baseClass"]) ? $context["baseClass"] : null) . "/alternative"), 1 => array("id" => $this->getAttribute((isset($context["altFile"]) ? $context["altFile"] : null), "id"), "action" => "delete", "isMaster" => 0)), "method"), "html", null, true);
                        echo "\" data-confirm=\"";
                        echo twig_escape_filter($this->env, YiiTranslate("app", "Do you want to remove {filename}?", array("{filename}" => $this->getAttribute((isset($context["altFile"]) ? $context["altFile"] : null), "name"))), "html", null, true);
                        echo "\">
\t\t\t\t<span class=\"glyphicon glyphicon-remove\"></span>
\t\t\t</a>
\t\t\t";
                    }
                    // line 83
                    echo "\t\t\t<a id=\"btn-alt-prev-";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["altFile"]) ? $context["altFile"] : null), "id"), "html", null, true);
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, YiiTranslate("app", "Preview this file"), "html", null, true);
                    echo "\" class=\"menu-modal\" href=\"#\" data-div-debug=\"#id-preview\" data-url=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => ((isset($context["baseClass"]) ? $context["baseClass"] : null) . "/alternative"), 1 => array("id" => $this->getAttribute((isset($context["altFile"]) ? $context["altFile"] : null), "id"), "action" => "preview", "isMaster" => 0)), "method"), "html", null, true);
                    echo "\" >
\t\t\t\t<span class=\"glyphicon glyphicon-expand\"></span>
\t\t\t</a>
\t\t\t";
                    // line 86
                    if ($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "user"), "hasMenu", array(0 => ((isset($context["baseClass"]) ? $context["baseClass"] : null) . "/alt-edit")), "method")) {
                        // line 87
                        echo "\t\t\t<a id=\"btn-alt-down-";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["altFile"]) ? $context["altFile"] : null), "id"), "html", null, true);
                        echo "\" title=\"";
                        echo twig_escape_filter($this->env, YiiTranslate("app", "Download this file"), "html", null, true);
                        echo "\" target=\"_blank\" href=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => ((isset($context["baseClass"]) ? $context["baseClass"] : null) . "/alternative"), 1 => array("id" => $this->getAttribute((isset($context["altFile"]) ? $context["altFile"] : null), "id"), "action" => "download", "isMaster" => 0)), "method"), "html", null, true);
                        echo "\" >
\t\t\t\t<span class=\"glyphicon glyphicon-cloud-download\"></span>
\t\t\t</a>
\t\t\t";
                    }
                    // line 91
                    echo "\t\t";
                }
                // line 92
                echo "\t\t</div>\t
\t</div>\t\t
    
\t";
            } else {
                // line 95
                echo "\t\t
\t\t<div class=\"col-sm-4 thumb-preview\">
\t\t\t<img
\t\t\t\t\tstyle=\"width:100%\"
\t\t\t\t";
                // line 99
                if ($this->getAttribute((isset($context["altFile"]) ? $context["altFile"] : null), "isProcessing")) {
                    // line 100
                    echo "\t\t\t\t\tsrc=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["App"]) ? $context["App"] : null), "baseUrl"), "html", null, true);
                    echo "/images/processing.jpg\"
\t\t\t\t";
                } else {
                    // line 102
                    echo "\t\t\t\t\tclass=\"menu-modal\"\t\t\t\t\t
\t\t\t\t\tsrc=\"";
                    // line 103
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["altFile"]) ? $context["altFile"] : null), "tvRatioUrl"), "html", null, true);
                    echo "\"
\t\t\t\t\tdata-url=\"";
                    // line 104
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => ((isset($context["baseClass"]) ? $context["baseClass"] : null) . "/alternative"), 1 => array("id" => $this->getAttribute((isset($context["altFile"]) ? $context["altFile"] : null), "id"), "action" => "preview", "isMaster" => 0)), "method"), "html", null, true);
                    echo "\" 
\t\t\t\t\tdata-compact=\"1\"
\t\t\t\t";
                }
                // line 107
                echo "\t\t\t\t>
\t\t\t
\t\t\t<div class=\"thumb-info\">\t\t\t\t
\t\t\t\t<div class=\"infoXXX\">
\t\t\t\t\t<span class=\"info\">";
                // line 111
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["altFile"]) ? $context["altFile"] : null), "name"), "html", null, true);
                echo "</span>
\t\t\t\t\t<div class=\"pull-right btn-group btn-alt-dropdown \">
\t\t\t\t\t\t<button href=\"#\" class=\"btn btn-default btn-xs dropdown-toggle btn-dim\" data-toggle=\"dropdown\"><span class=\"caret\"></span></button>
\t\t\t\t\t\t<ul class=\"dropdown-menu dropdown-menu-small no-opacity\" >
\t\t\t\t\t\t\t";
                // line 115
                if ($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "user"), "hasMenu", array(0 => ((isset($context["baseClass"]) ? $context["baseClass"] : null) . "/alt-edit")), "method")) {
                    // line 116
                    echo "\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a id=\"btn-alt-edit-";
                    // line 117
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["altFile"]) ? $context["altFile"] : null), "id"), "html", null, true);
                    echo "\" class=\"menu-modal\" href=\"#\" data-url=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => ((isset($context["baseClass"]) ? $context["baseClass"] : null) . "/alternative"), 1 => array("id" => $this->getAttribute((isset($context["altFile"]) ? $context["altFile"] : null), "id"), "isMaster" => 0)), "method"), "html", null, true);
                    echo "\" >
\t\t\t\t\t\t\t\t\t";
                    // line 118
                    echo twig_escape_filter($this->env, YiiTranslate("button", "btn-edit"), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t";
                }
                // line 122
                echo "\t\t\t\t\t\t\t";
                if ($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "user"), "hasMenu", array(0 => ((isset($context["baseClass"]) ? $context["baseClass"] : null) . "/alt-edit")), "method")) {
                    // line 123
                    echo "\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a id=\"btn-alt-dele-";
                    // line 124
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["altFile"]) ? $context["altFile"] : null), "id"), "html", null, true);
                    echo "\" class=\"id-confirm\"  href=\"#\" data-url=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => ((isset($context["baseClass"]) ? $context["baseClass"] : null) . "/alternative"), 1 => array("id" => $this->getAttribute((isset($context["altFile"]) ? $context["altFile"] : null), "id"), "action" => "delete", "isMaster" => 0)), "method"), "html", null, true);
                    echo "\" data-confirm=\"";
                    echo twig_escape_filter($this->env, YiiTranslate("app", "Do you want to remove "), "html", null, true);
                    echo " '";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["altFile"]) ? $context["altFile"] : null), "name"), "html", null, true);
                    echo "'?\">
\t\t\t\t\t\t\t\t\t";
                    // line 125
                    echo twig_escape_filter($this->env, YiiTranslate("button", "btn-delete"), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t</li>\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t";
                }
                // line 129
                echo "\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a id=\"btn-alt-prev-";
                // line 130
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["altFile"]) ? $context["altFile"] : null), "id"), "html", null, true);
                echo "\" 
\t\t\t\t\t\t\t\t\t class=\"menu-modal\" 
\t\t\t\t\t\t\t\t\t href=\"#\" data-div-debug=\"#id-preview\" 
\t\t\t\t\t\t\t\t\t data-url=\"";
                // line 133
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => ((isset($context["baseClass"]) ? $context["baseClass"] : null) . "/alternative"), 1 => array("id" => $this->getAttribute((isset($context["altFile"]) ? $context["altFile"] : null), "id"), "action" => "preview", "isMaster" => 0)), "method"), "html", null, true);
                echo "\" 
\t\t\t\t\t\t\t\t\t data-compact=\"1\">
\t\t\t\t\t\t\t\t\t";
                // line 135
                echo twig_escape_filter($this->env, YiiTranslate("button", "btn-preview"), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t</li>\t\t\t
\t\t\t\t\t\t\t";
                // line 138
                if ($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "user"), "hasMenu", array(0 => ((isset($context["baseClass"]) ? $context["baseClass"] : null) . "/alt-edit")), "method")) {
                    // line 139
                    echo "\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a id=\"btn-alt-down-";
                    // line 140
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["altFile"]) ? $context["altFile"] : null), "id"), "html", null, true);
                    echo "\" href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => ((isset($context["baseClass"]) ? $context["baseClass"] : null) . "/alt-download"), 1 => array("id" => $this->getAttribute((isset($context["altFile"]) ? $context["altFile"] : null), "id"), "isMaster" => 0)), "method"), "html", null, true);
                    echo "\" >
\t\t\t\t\t\t\t\t\t";
                    // line 141
                    echo twig_escape_filter($this->env, YiiTranslate("button", "btn-download"), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t</li>\t\t\t\t\t\t
\t\t\t\t\t\t\t";
                }
                // line 145
                echo "\t\t\t\t\t\t\t";
                if ($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "user"), "hasMenu", array(0 => ((isset($context["baseClass"]) ? $context["baseClass"] : null) . "/alt-edit")), "method")) {
                    // line 146
                    echo "\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a id=\"btn-alt-check-";
                    // line 147
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["altFile"]) ? $context["altFile"] : null), "id"), "html", null, true);
                    echo "\" href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => ((isset($context["baseClass"]) ? $context["baseClass"] : null) . "/altcheck"), 1 => array("id" => $this->getAttribute((isset($context["altFile"]) ? $context["altFile"] : null), "id"))), "method"), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t\t";
                    // line 148
                    echo twig_escape_filter($this->env, YiiTranslate("app", "Check status"), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t";
                }
                // line 152
                echo "\t\t\t\t\t\t</ul>
\t\t\t\t\t</div>\t\t
\t\t\t\t</div>\t
\t\t\t</div>
\t\t</div>\t
\t";
            }
            // line 157
            echo "\t\t\t\t\t
\t\t";
            // line 158
            if ($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "last")) {
                echo "\t";
                // line 159
                echo "      </div>\t
    </div>
  </div>
\t\t";
            }
            // line 162
            echo "\t\t
\t";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['altFile'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 163
        echo "\t
\t\t
</div>
  ";
    }

    public function getTemplateName()
    {
        return "views/layouts/file.alt.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  438 => 163,  423 => 162,  417 => 159,  414 => 158,  411 => 157,  403 => 152,  396 => 148,  390 => 147,  387 => 146,  384 => 145,  377 => 141,  371 => 140,  368 => 139,  366 => 138,  360 => 135,  349 => 130,  329 => 124,  326 => 123,  316 => 118,  310 => 117,  307 => 116,  305 => 115,  298 => 111,  292 => 107,  286 => 104,  282 => 103,  279 => 102,  273 => 100,  271 => 99,  265 => 95,  259 => 92,  256 => 91,  244 => 87,  242 => 86,  231 => 83,  216 => 78,  206 => 74,  203 => 73,  197 => 71,  188 => 67,  180 => 64,  176 => 62,  166 => 58,  163 => 57,  157 => 55,  148 => 49,  143 => 47,  140 => 46,  134 => 44,  125 => 37,  114 => 34,  102 => 30,  99 => 29,  89 => 28,  87 => 27,  75 => 22,  64 => 18,  57 => 14,  47 => 9,  44 => 8,  24 => 6,  22 => 5,  19 => 4,  374 => 159,  355 => 133,  352 => 141,  346 => 129,  339 => 125,  335 => 131,  331 => 129,  328 => 128,  325 => 127,  323 => 122,  318 => 120,  313 => 118,  309 => 117,  304 => 115,  301 => 114,  295 => 113,  288 => 111,  284 => 110,  278 => 107,  272 => 105,  270 => 104,  266 => 102,  260 => 100,  255 => 97,  246 => 94,  238 => 93,  227 => 89,  219 => 79,  215 => 86,  211 => 84,  207 => 83,  204 => 82,  202 => 81,  195 => 70,  187 => 73,  184 => 65,  181 => 71,  173 => 68,  170 => 59,  168 => 66,  165 => 65,  155 => 54,  152 => 62,  149 => 61,  146 => 48,  138 => 57,  135 => 56,  127 => 53,  123 => 36,  115 => 49,  112 => 48,  109 => 31,  106 => 46,  100 => 43,  97 => 42,  94 => 41,  88 => 38,  85 => 37,  83 => 36,  78 => 33,  70 => 31,  67 => 30,  65 => 29,  59 => 27,  56 => 24,  53 => 23,  46 => 20,  42 => 18,  40 => 17,  37 => 16,  33 => 14,  30 => 13,  27 => 7,);
    }
}
