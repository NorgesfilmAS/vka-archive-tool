<?php

/* /views/art/view.twig */
class __TwigTemplate_7c8c7e2db9247fdb8ebd5a7115aacb5e extends Twig_Template
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

    // line 4
    public function block_content($context, array $blocks = array())
    {
        // line 5
        echo "<div class=\"pnek pnek-view\">
\t";
        // line 6
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "flash"), "method"));
        $template->display($context);
        // line 7
        echo "\t";
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "caption"), "method"));
        $template->display($context);
        // line 8
        echo "\t";
        if ($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "user"), "hasMenu", array(0 => "art/agent"), "method")) {
            echo "\t
\t<div class=\"row tx-view\">
\t\t<div class=\"col-xs-12 col-sm-8 bg-hover\">
\t\t\t<div class=\"panel panel-default panel-top a-url\" data-url=\"";
            // line 11
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "art/agent", 1 => array("id" => $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "id"))), "method"), "html", null, true);
            echo "\">
\t\t\t\t<div class=\"panel-heading\">
\t\t\t\t\t<h3 class=\"panel-title\">";
            // line 13
            echo twig_escape_filter($this->env, YiiTranslate("app", "Artist / credits"), "html", null, true);
            echo "</h3>
\t\t\t\t</div>\t
\t\t\t\t<div class=\"panel-body\">\t\t\t\t\t\t
\t\t\t\t\t<dl class=\"dl-horizontal\">
\t\t\t\t\t\t<dt>";
            // line 17
            echo twig_escape_filter($this->env, YiiTranslate("app", "Artist"), "html", null, true);
            echo "</dt>
\t\t\t\t\t\t\t<dd>
\t\t\t\t\t\t\t";
            // line 19
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "agents"));
            foreach ($context['_seq'] as $context["id"] => $context["name"]) {
                // line 20
                echo "\t\t\t\t\t\t\t<a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "agent/view", 1 => array("id" => (isset($context["id"]) ? $context["id"] : null))), "method"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
                echo " </a><br />
\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['id'], $context['name'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 22
            echo "\t\t\t\t\t\t\t</dd>
\t\t\t\t\t\t<dt>";
            // line 23
            echo twig_escape_filter($this->env, YiiTranslate("app", "Producer"), "html", null, true);
            echo "</dt><dd>";
            echo strtr(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "producer")), array("
" => "<br/>"));
            echo "</dd>
\t\t\t\t\t\t<dt>";
            // line 24
            echo twig_escape_filter($this->env, YiiTranslate("app", "Distributor"), "html", null, true);
            echo "</dt><dd>";
            echo strtr(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "distributor")), array("
" => "<br/>"));
            echo "</dd>
\t\t\t\t\t</dl>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t<div class=\"col-xs-12 col-sm-4 float-right\" style=\"position: relative\">
\t\t\t  <div style=\"position: absolute; padding-top:10px;\">
\t\t\t\t\t<img id=\"img-art-";
            // line 31
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "id"), "html", null, true);
            echo "\" 
\t\t\t\t\t\t\t width=\"100%\" 
\t\t\t\t\t\t\t class=\"menu-modal\" 
\t\t\t\t\t\t\t data-url=\"";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "art/preview", 1 => array("id" => $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "id"))), "method"), "html", null, true);
            echo "\" 
\t\t\t\t\t\t\t data-compact=\"1\"
\t\t\t\t\t\t\t";
            // line 36
            if ($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "tvRatioUrl")) {
                echo " 
\t\t\t\t\t\t\t\tsrc=\"";
                // line 37
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "tvRatioUrl"), "html", null, true);
                echo "?r=";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["util"]) ? $context["util"] : null), "unique", array(), "method"), "html", null, true);
                echo "\"
\t\t\t\t\t\t\t";
            } else {
                // line 39
                echo "\t\t\t\t\t\t\t\tsrc=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["App"]) ? $context["App"] : null), "baseUrl"), "html", null, true);
                echo "/images/no-preview.png\"
\t\t\t\t\t\t\t";
            }
            // line 40
            echo "/>
\t\t\t\t\t";
            // line 41
            if ($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "tvRatioUrl")) {
                // line 42
                echo "\t\t\t\t\t\t<span class=\"play menu-modal\" 
\t\t\t\t\t\t\t\t\tstyle=\"margin-top:28px;\"
\t\t\t\t\t\t\t\t\tdata-compact=\"1\"
\t\t\t\t\t\t\t\t\tdata-url=\"";
                // line 45
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "art/preview", 1 => array("id" => $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "id"))), "method"), "html", null, true);
                echo "\"></span>
\t\t\t\t\t";
            }
            // line 47
            echo "\t\t\t\t\t
\t\t\t\t</div>
\t\t</div>
\t</div>
\t";
        }
        // line 51
        echo "\t
\t";
        // line 52
        if ($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "user"), "hasMenu", array(0 => "art/artworkInfo"), "method")) {
            echo "\t
\t<div class=\"row tx-view\">
\t\t<div class=\"col-xs-12 col-sm-8 bg-hover\">
\t\t\t<div class=\"panel panel-default panel-top a-url\" data-url=\"";
            // line 55
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "art/artworkInfo", 1 => array("id" => $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "id"))), "method"), "html", null, true);
            echo "\">
\t\t\t\t<div class=\"panel-heading\">
\t\t\t\t\t<h3 class=\"panel-title\">";
            // line 57
            echo twig_escape_filter($this->env, YiiTranslate("app", "Artwork info"), "html", null, true);
            echo " </h3>
\t\t\t\t</div>\t
\t\t\t\t<div class=\"panel-body\">\t\t\t\t\t\t
\t\t\t\t\t<dl class=\"dl-horizontal\">
\t\t\t\t\t\t<dt>";
            // line 61
            echo twig_escape_filter($this->env, YiiTranslate("app", "Year"), "html", null, true);
            echo "</dt><dd>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "year"), "html", null, true);
            echo "</dd>
\t\t\t\t\t\t<dt>";
            // line 62
            echo twig_escape_filter($this->env, YiiTranslate("app", "Type"), "html", null, true);
            echo "</dt><dd>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "type"), "html", null, true);
            echo "</dd>
\t\t\t\t\t\t<dt>";
            // line 63
            echo twig_escape_filter($this->env, YiiTranslate("app", "Length"), "html", null, true);
            echo "</dt><dd>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "length"), "html", null, true);
            echo "</dd>
\t\t\t\t\t\t<dt>";
            // line 64
            echo twig_escape_filter($this->env, YiiTranslate("app", "Format"), "html", null, true);
            echo "</dt><dd>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "format"), "html", null, true);
            echo "</dd>
";
            // line 65
            if ($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "user"), "hasMenu", array(0 => "art/files"), "method")) {
                echo "\t\t\t\t\t\t\t\t
\t\t\t\t\t\t<dt>";
                // line 66
                echo twig_escape_filter($this->env, YiiTranslate("app", "Fields"), "html", null, true);
                echo "</dt><dd>";
                if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "altFiles")) > 0)) {
                    echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "altFiles")), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, YiiTranslate("app", "alternate files"), "html", null, true);
                } else {
                    echo twig_escape_filter($this->env, YiiTranslate("app", "no files"), "html", null, true);
                }
                echo "</dd>
";
            }
            // line 67
            echo "\t\t\t\t\t\t
\t\t\t\t\t\t<dt>";
            // line 68
            echo twig_escape_filter($this->env, YiiTranslate("app", "Collection"), "html", null, true);
            echo "</dt>
\t\t\t\t\t\t<dd>
\t\t\t\t\t\t\t<ul class=\"comma-list-summary\">
\t\t\t\t\t\t\t\t";
            // line 71
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "collection"));
            foreach ($context['_seq'] as $context["_key"] => $context["itemCaption"]) {
                // line 72
                echo "\t\t\t\t\t\t\t\t  ";
                if ((isset($context["itemCaption"]) ? $context["itemCaption"] : null)) {
                    // line 73
                    echo "\t\t\t\t\t\t\t\t\t<li class=\"comma-list popit\" 
\t\t\t\t\t\t\t\t\t\t\tdata-toggle=\"popover\" 
\t\t\t\t\t\t\t\t\t\t\tdata-html=\"true\"
\t\t\t\t\t\t\t\t\t\t\tdata-title=\"";
                    // line 76
                    echo twig_escape_filter($this->env, ((YiiTranslate("app", "collection") . " ") . (isset($context["itemCaption"]) ? $context["itemCaption"] : null)), "html", null, true);
                    echo "\"\t
\t\t\t\t\t\t\t\t\t\t\tdata-placement=\"left\" data-content=\"";
                    // line 77
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "collectionInfo", array(0 => (isset($context["itemCaption"]) ? $context["itemCaption"] : null)), "method"), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t";
                    // line 78
                    echo twig_escape_filter($this->env, (isset($context["itemCaption"]) ? $context["itemCaption"] : null), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t";
                }
                // line 81
                echo "\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['itemCaption'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t</ul>

\t\t\t\t\t\t</dd>
\t\t\t\t\t</dl>
\t\t\t\t\t
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t";
        }
        // line 91
        echo "\t</div>
\t<div class=\"row tx-view\">\t\t
\t\t";
        // line 93
        if ($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "user"), "hasMenu", array(0 => "art/description"), "method")) {
            // line 94
            echo "\t\t<div class=\"col-xs-12 col-sm-8 bg-hover\">
\t\t\t<div class=\"panel panel-default panel-top a-url\" data-url=\"";
            // line 95
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "art/description", 1 => array("id" => $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "id"))), "method"), "html", null, true);
            echo "\">
\t\t\t\t<div class=\"panel-heading\">
\t\t\t\t\t<h3 class=\"panel-title\">";
            // line 97
            echo twig_escape_filter($this->env, YiiTranslate("app", "Description"), "html", null, true);
            echo "</h3>
\t\t\t\t</div>\t
\t\t\t\t<div class=\"panel-body\">\t\t\t
\t\t\t\t\t";
            // line 100
            if ($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "tags_gama")) {
                // line 101
                echo "\t\t\t\t\t<dl class=\"dl-horizontal\">
\t\t\t\t\t\t<dt>";
                // line 102
                echo twig_escape_filter($this->env, YiiTranslate("app", "Tags gama"), "html", null, true);
                echo "</dt><dd>";
                echo twig_escape_filter($this->env, twig_join_filter($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "tags_gama"), ", "), "html", null, true);
                echo "</dd>\t\t\t\t\t
\t\t\t\t\t</dl>\t
\t\t\t\t\t";
            }
            // line 105
            echo "\t\t\t\t\t<p class=\"text-overflow\">\t
\t\t\t\t\t";
            // line 107
            echo "\t\t\t\t\t";
            echo $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "content");
            echo "\t
\t\t\t\t\t</p>\t
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>\t\t
\t</div>
\t";
        }
        // line 114
        echo "\t";
        if ($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "user"), "hasMenu", array(0 => "art/digitization"), "method")) {
            // line 115
            echo "\t<div class=\"row tx-view\">\t\t\t\t
\t\t<div class=\"col-xs-12 col-sm-8 bg-hover\">
\t\t\t<div class=\"panel panel-default panel-top a-url\" data-url=\"";
            // line 117
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "art/digitization", 1 => array("id" => $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "id"))), "method"), "html", null, true);
            echo "\">
\t\t\t\t<div class=\"panel-heading\">
\t\t\t\t\t<h3 class=\"panel-title\">";
            // line 119
            echo twig_escape_filter($this->env, YiiTranslate("app", "Digitization"), "html", null, true);
            echo "</h3>
\t\t\t\t</div>\t
\t\t\t\t<div class=\"panel-body\">\t\t\t\t\t\t
\t\t\t\t\t<dl class=\"dl-horizontal\">
\t\t\t\t\t\t<dt>";
            // line 123
            echo twig_escape_filter($this->env, YiiTranslate("app", "Is digitized"), "html", null, true);
            echo "</dt><dd>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "is_digitized"), "html", null, true);
            echo "</dd>
\t\t\t\t\t\t<dt>";
            // line 124
            echo twig_escape_filter($this->env, YiiTranslate("app", "Location"), "html", null, true);
            echo "</dt><dd>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "digitizing_location"), "html", null, true);
            echo "</dd>
\t\t\t\t\t\t<dt>";
            // line 125
            echo twig_escape_filter($this->env, YiiTranslate("app", "Return date agent"), "html", null, true);
            echo "</dt><dd>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "return_date_agent"), "html", null, true);
            echo "</dd>
\t\t\t\t\t\t<dt>";
            // line 126
            echo twig_escape_filter($this->env, YiiTranslate("app", "Digitization date"), "html", null, true);
            echo "</dt><dd>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "digitization_date"), "html", null, true);
            echo "</dd>
\t\t\t\t\t</dl>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>\t\t\t\t
\t</div>\t
\t";
        }
        // line 133
        echo "\t";
        if ($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "user"), "hasMenu", array(0 => "art/history"), "method")) {
            echo "\t
\t<div class=\"row tx-view\">\t\t
\t\t<div class=\"col-xs-12 col-sm-8 bg-hover\">
\t\t\t<div class=\"panel panel-default panel-top a-url\" data-url=\"";
            // line 136
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "art/history", 1 => array("id" => $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "id"))), "method"), "html", null, true);
            echo "\">
\t\t\t\t<div class=\"panel-heading\">
\t\t\t\t\t<h3 class=\"panel-title\">";
            // line 138
            echo twig_escape_filter($this->env, YiiTranslate("app", "History"), "html", null, true);
            echo " </h3>
\t\t\t\t</div>\t
\t\t\t\t<div class=\"panel-body text-overflow\">\t\t\t\t\t\t
\t\t\t\t\t";
            // line 141
            echo $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "awards");
            echo "
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
\t";
        }
        // line 146
        echo "\t
\t
</div>\t
";
    }

    // line 152
    public function block_onReady($context, array $blocks = array())
    {
        // line 153
        echo "\tconsole.log('ready');
  \$('.menu-overview').addClass('active');
\t\$('.popit').popover({trigger: 'hover'});
\t";
        // line 156
        $this->displayParentBlock("onReady", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "/views/art/view.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  404 => 156,  399 => 153,  396 => 152,  389 => 146,  380 => 141,  374 => 138,  369 => 136,  362 => 133,  350 => 126,  344 => 125,  338 => 124,  332 => 123,  325 => 119,  320 => 117,  316 => 115,  313 => 114,  302 => 107,  299 => 105,  291 => 102,  288 => 101,  286 => 100,  280 => 97,  275 => 95,  272 => 94,  270 => 93,  266 => 91,  249 => 81,  243 => 78,  239 => 77,  235 => 76,  230 => 73,  227 => 72,  223 => 71,  217 => 68,  214 => 67,  201 => 66,  197 => 65,  191 => 64,  185 => 63,  179 => 62,  173 => 61,  166 => 57,  161 => 55,  155 => 52,  152 => 51,  145 => 47,  140 => 45,  135 => 42,  133 => 41,  130 => 40,  124 => 39,  117 => 37,  113 => 36,  108 => 34,  102 => 31,  89 => 24,  82 => 23,  79 => 22,  68 => 20,  64 => 19,  59 => 17,  52 => 13,  47 => 11,  40 => 8,  36 => 7,  33 => 6,  30 => 5,  27 => 4,);
    }
}
