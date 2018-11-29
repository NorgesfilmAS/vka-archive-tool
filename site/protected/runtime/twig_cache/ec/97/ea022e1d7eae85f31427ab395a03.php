<?php

/* /views/site/index.twig */
class __TwigTemplate_ec97ea022e1d7eae85f31427ab395a03 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'itemMenuHeader' => array($this, 'block_itemMenuHeader'),
            'itemMenuFooter' => array($this, 'block_itemMenuFooter'),
            'content' => array($this, 'block_content'),
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

    // line 3
    public function block_itemMenuHeader($context, array $blocks = array())
    {
        // line 4
        echo "<div class=\"search-spacer\"></div>
";
    }

    // line 7
    public function block_itemMenuFooter($context, array $blocks = array())
    {
        // line 8
        echo "\t";
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "search-layout"), "method"));
        $template->display($context);
    }

    // line 11
    public function block_content($context, array $blocks = array())
    {
        // line 12
        echo "\t<div class=\"rowX\">
\t\t<div class=\"col-xs-12 bs-page-header\" style=\"margin-top: 25px;\">
\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"col-sm-2 id-marker2 id-marker\" style=\"width: 180px; padding-left:14px\">
\t\t\t\t\t";
        // line 16
        echo twig_escape_filter($this->env, YiiTranslate("app", "Latest Videos"), "html", null, true);
        echo "
\t\t\t\t</div>
\t\t\t</div>\t
\t\t</div>
\t</div>

\t";
        // line 23
        echo "\t";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["digitized"]) ? $context["digitized"] : null), "done"));
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
        foreach ($context['_seq'] as $context["_key"] => $context["data"]) {
            // line 24
            echo "\t\t";
            if ((($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index0") % 3) == 0)) {
                // line 25
                echo "\t\t<div class=\"row\">
\t\t";
            }
            // line 26
            echo "\t

\t\t<div class=\"art-row art-spacer col-sm-4 clearfix\">\t
\t\t\t<div class=\"tile-view\">
\t\t\t\t<div class=\"preview-image\">\t\t\t\t
\t\t\t\t";
            // line 31
            if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "isProcessing")) {
                // line 32
                echo "\t\t\t\t\t<img id=\"img-art-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "id"), "html", null, true);
                echo "\" width=\"100%\" src=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["App"]) ? $context["App"] : null), "baseUrl"), "html", null, true);
                echo "/images/processing.jpg\" />\t\t\t
\t\t\t\t";
            } else {
                // line 33
                echo "\t\t\t
\t\t\t\t\t<img id=\"img-art-";
                // line 34
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "id"), "html", null, true);
                echo "\" 
\t\t\t\t\t\t\t width=\"100%\" 
\t\t\t\t\t\t\t";
                // line 36
                if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tvRatioUrl")) {
                    echo " 
\t\t\t\t\t\t\t\tclass=\"menu-modal\" 
\t\t\t\t\t\t\t\tdata-url=\"";
                    // line 38
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "art/preview", 1 => array("id" => $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "id"))), "method"), "html", null, true);
                    echo "\" 
\t\t\t\t\t\t\t\tsrc=\"";
                    // line 39
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tvRatioUrl"), "html", null, true);
                    echo "\"
\t\t\t\t\t\t\t\tdata-compact=\"1\"
\t\t\t\t\t\t\t";
                } else {
                    // line 42
                    echo "\t\t\t\t\t\t\t\tsrc=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["App"]) ? $context["App"] : null), "baseUrl"), "html", null, true);
                    echo "/images/no-preview.png\"
\t\t\t\t\t\t\t";
                }
                // line 43
                echo " 
\t\t\t\t\t\t\tdata-missing-image=\"";
                // line 44
                echo twig_escape_filter($this->env, (isset($context["dataImagePath"]) ? $context["dataImagePath"] : null), "html", null, true);
                echo "\" />
\t\t\t\t\t";
                // line 45
                if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tvRatioUrl")) {
                    // line 46
                    echo "\t\t\t\t\t\t<span class=\"play menu-modal\" 
\t\t\t\t\t\t\t\t\tdata-url=\"";
                    // line 47
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "art/preview", 1 => array("id" => $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "id"))), "method"), "html", null, true);
                    echo "\"
\t\t\t\t\t\t\t\t\tdata-compact=\"1\">
\t\t\t\t\t\t</span>
\t\t\t\t\t";
                }
                // line 51
                echo "\t\t\t\t";
            }
            // line 52
            echo "\t\t\t\t</div>\t
\t\t\t\t<div class=\"preview-data line-div\">
\t\t\t\t\t<div class=\"art\">
\t\t\t\t\t\t<a href=\"";
            // line 55
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "art/view", 1 => array("id" => $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "id"))), "method"), "html", null, true);
            echo "\" >";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "title"), "html", null, true);
            echo "</a>&nbsp;\t\t\t\t
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"artist line-div\">
\t\t\t\t\t\t";
            // line 58
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "agents"));
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
            foreach ($context['_seq'] as $context["id"] => $context["name"]) {
                // line 59
                echo "\t\t\t\t\t\t<a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "agent/view", 1 => array("id" => (isset($context["id"]) ? $context["id"] : null))), "method"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
                if ((!$this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "last"))) {
                    echo ", ";
                }
                echo "</a>
\t\t\t\t\t\t";
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
            unset($context['_seq'], $context['_iterated'], $context['id'], $context['name'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 60
            echo "&nbsp;
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"line-div\"><div class=\"data-label\">Year</div><div class=\"data-info\">";
            // line 62
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "year"), "html", null, true);
            echo "</div></div>\t
\t\t\t\t\t<div class=\"line-div\"><div class=\"data-label\">Org. format</div>";
            // line 63
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "format"), "html", null, true);
            echo "</div>\t
\t\t\t\t\t<div class=\"line-div\"><div class=\"data-label\">Length</div>";
            // line 64
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "length"), "html", null, true);
            echo "</div>\t
\t\t\t\t</div>\t
\t\t\t</div>
\t\t</div>\t
\t\t";
            // line 68
            if (((($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index0") % 3) == 2) || $this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "last"))) {
                // line 69
                echo "\t</div>
\t";
            }
            // line 70
            echo "\t\t\t\t
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['data'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 72
        echo "\t";
        // line 73
        echo "<div class=\"row\" style=\"margin-bottom: 20px\">
\t<div class=\"col-sm-4 col-sm-offset-8\">\t\t
\t\t<a href=\"";
        // line 75
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["App"]) ? $context["App"] : null), "createUrl", array(0 => "site/lastDigitized"), "method"), "html", null, true);
        echo "\" style=\"font-weight: bold;\">";
        echo twig_escape_filter($this->env, YiiTranslate("app", "More..."), "html", null, true);
        echo "</a>\t\t
\t</div>
</div>

<div class=\"row\">
\t<div class=\"col-sm-4\">
\t\t<div class=\"panel panel-top panel-list\">
\t\t<div class=\"panel-default\">
\t\t\t<div class=\"panel-heading\">";
        // line 83
        echo twig_escape_filter($this->env, YiiTranslate("app", "New artwork"), "html", null, true);
        echo "</div>
\t\t\t<div class=\"panel-bodyX\">
\t\t\t\t\t";
        // line 85
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["art"]) ? $context["art"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["work"]) {
            // line 86
            echo "\t\t\t\t<div class=\"art-sum\">
\t\t\t\t\t
\t\t\t\t\t\t";
            // line 95
            echo "\t\t\t\t\t<div class=\"grid-col-no-wrap2\" ><a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "art/view", 1 => array("id" => $this->getAttribute((isset($context["work"]) ? $context["work"] : null), "id"))), "method"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["work"]) ? $context["work"] : null), "title"), "html", null, true);
            echo "</a></div>
\t\t\t\t\t<div>";
            // line 96
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["work"]) ? $context["work"] : null), "agent"), "html", null, true);
            echo "</div>
\t\t\t\t\t<div class=\"grid-small\">";
            // line 97
            echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["work"]) ? $context["work"] : null), "altFiles")), "html", null, true);
            echo " files</div>
\t\t\t\t</div>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['work'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 99
        echo "\t
\t\t\t\t<a href=\"";
        // line 100
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "site/search", 1 => array("layout" => "grid", "Art[searchOrder]" => "creation")), "method"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, YiiTranslate("app", "More"), "html", null, true);
        echo " ...</a>
\t\t
\t\t\t</div>
\t\t</div>\t
\t\t</div>\t\t
\t\t\t\t\t
\t</div>
\t<div class=\"col-sm-4 panel-top panel-list\">
\t\t<div class=\"panel\">
\t\t<div class=\"panel-default\">
\t\t\t<div class=\"panel-heading\">";
        // line 110
        echo twig_escape_filter($this->env, YiiTranslate("app", "New artists"), "html", null, true);
        echo "</div>
\t\t\t<div class=\"panel-bodyX\">
\t\t\t\t
\t\t\t\t\t";
        // line 113
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["agent"]) ? $context["agent"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["artist"]) {
            // line 114
            echo "\t\t\t\t<div class=\"art-sum\">
\t\t\t\t\t<div ><a href=\"";
            // line 115
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "agent/view", 1 => array("id" => $this->getAttribute((isset($context["artist"]) ? $context["artist"] : null), "id"))), "method"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["artist"]) ? $context["artist"] : null), "name"), "html", null, true);
            echo "</a></div>
\t\t\t\t\t<div class=\"grid-small\">biography: <b>";
            // line 116
            if ($this->getAttribute((isset($context["artist"]) ? $context["artist"] : null), "biography")) {
                echo "Yes";
            } else {
                echo "No";
            }
            echo "</b></div>
\t\t\t\t\t";
            // line 117
            if ($this->getAttribute((isset($context["artist"]) ? $context["artist"] : null), "born")) {
                echo "<div class=\"grid-small\">born: <b>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["artist"]) ? $context["artist"] : null), "born"), "html", null, true);
                echo "</b></div>";
            }
            // line 118
            echo "\t\t\t\t</div>\t\t
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['artist'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 119
        echo "\t
\t\t\t\t
\t\t\t</div>
\t\t</div>\t
\t\t</div>\t\t
\t</div>
\t\t\t

\t<div class=\"col-sm-4 panel-top panel-list\">
\t\t";
        // line 173
        echo "\t
\t\t<div class=\"panel\" panel-list>\t\t
\t\t";
        // line 175
        if ((twig_length_filter($this->env, (isset($context["files"]) ? $context["files"] : null)) == 0)) {
            // line 176
            echo "\t\t<div class=\"panel-default\">
\t\t\t<div class=\"panel-heading\">Info</div>
\t\t\t<div class=\"panel-body\">
\t\t\t<b >There are no files in the upload directory</b>
\t\t\t</div>
\t\t</div>
\t\t";
        } else {
            // line 183
            echo "\t\t\t<div class=\"panel-default\">
\t\t\t\t<div class=\"panel-heading\" style=\"margin-bottom: 10px\">Files in upload directory</div>
\t\t\t\t<div class=\"panel-body\">
\t\t\t\t";
            // line 186
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["files"]) ? $context["files"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["file"]) {
                // line 187
                echo "\t\t\t\t\t<div class=\"art-sum\">
\t\t\t\t\t\t<div>";
                // line 188
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "name"), "html", null, true);
                echo "</div>
\t\t\t\t\t\t<div class=\"grid-small\">";
                // line 189
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "date"), "html", null, true);
                echo "</div>
\t\t\t\t\t\t<div class=\"grid-small\">";
                // line 190
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($this->getAttribute((isset($context["file"]) ? $context["file"] : null), "size") / (1024 * 1024)), 2), "html", null, true);
                echo " Mb</div>
\t\t\t\t\t</div>
\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['file'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 193
            echo "\t\t\t\t</div>
\t\t\t\t";
            // line 194
            if ((isset($context["moreFiles"]) ? $context["moreFiles"] : null)) {
                // line 195
                echo "\t\t\t\t<div class=\"panel-footer\">There are more files in the upload directory</div>
\t\t\t\t";
            }
            // line 197
            echo "\t\t\t</div>\t\t
\t\t";
        }
        // line 199
        echo "\t\t</div>\t\t
\t\t\t\t
\t</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "/views/site/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  426 => 199,  422 => 197,  418 => 195,  416 => 194,  413 => 193,  404 => 190,  400 => 189,  396 => 188,  393 => 187,  389 => 186,  384 => 183,  375 => 176,  373 => 175,  369 => 173,  358 => 119,  351 => 118,  345 => 117,  337 => 116,  331 => 115,  328 => 114,  324 => 113,  318 => 110,  303 => 100,  300 => 99,  291 => 97,  287 => 96,  280 => 95,  276 => 86,  272 => 85,  267 => 83,  254 => 75,  250 => 73,  248 => 72,  233 => 70,  229 => 69,  227 => 68,  220 => 64,  216 => 63,  212 => 62,  208 => 60,  186 => 59,  169 => 58,  161 => 55,  156 => 52,  153 => 51,  146 => 47,  143 => 46,  141 => 45,  137 => 44,  134 => 43,  128 => 42,  122 => 39,  118 => 38,  113 => 36,  108 => 34,  105 => 33,  97 => 32,  95 => 31,  88 => 26,  84 => 25,  81 => 24,  63 => 23,  54 => 16,  48 => 12,  45 => 11,  39 => 8,  36 => 7,  31 => 4,  28 => 3,);
    }
}
