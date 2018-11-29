<?php

/* views/site/search-layout.twig */
class __TwigTemplate_c909f13a2dec32da157341b3dd2365c2 extends Twig_Template
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
        // line 1
        echo "

<form class=\"id-search\" method=\"get\" action=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "site/search"), "method"), "html", null, true);
        echo "\">
\t<div class=\"nav-form nav bs-sidenav\">\t
\t\t<input type=\"hidden\" class=\"id-layout\" value=\"";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["layout"]) ? $context["layout"] : null), "html", null, true);
        echo "\" name=\"layout\"/>
\t\t<div class=\"pull-right\" style=\"display: inline-block\">
\t\t\t<ul class=\"list-layout\">
\t\t\t\t<li id=\"id-large\"><a href=\"#\" class=\"display-layout ";
        // line 8
        if (((isset($context["layout"]) ? $context["layout"] : null) == "grid")) {
            echo "active";
        }
        echo "\" data-layout=\"grid\" title=\"list\"><span class=\"glyphicon glyphicon-th-list\"></span></a></li>
\t\t\t\t<li id=\"id-4column\"><a href=\"#\" class=\"display-layout ";
        // line 9
        if (((isset($context["layout"]) ? $context["layout"] : null) != "grid")) {
            echo "active";
        }
        echo "\" data-layout=\"tiles\"><span class=\"glyphicon glyphicon-th\"></span></a></li>
\t\t\t</ul>
\t\t</div>

\t\t<label for=\"id-agent\">";
        // line 13
        echo twig_escape_filter($this->env, YiiTranslate("app", "Artist"), "html", null, true);
        echo "</label>
\t\t<input type=\"text\" id=\"id-agent\" name=\"Art[agent]\" class=\"form-control cls-search\" value=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "agent"), "html", null, true);
        echo "\"/>\t\t
\t\t<label for=\"id-title\">";
        // line 15
        echo twig_escape_filter($this->env, YiiTranslate("app", "Title"), "html", null, true);
        echo "</label>
\t\t<input type=\"text\" id=\"id-title\" name=\"Art[title]\" class=\"form-control cls-search\" value=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "title"), "html", null, true);
        echo "\" />
\t\t<div class=\"nav-options\">
\t\t\t<div class=\"nav-option-header cls-toggle\"><label><span class=\"caption\">";
        // line 18
        echo twig_escape_filter($this->env, YiiTranslate("app", "Show extra search"), "html", null, true);
        echo "</span><span class=\"pull-right nav-arrow\">&#x25BC</span></label></div>
\t\t\t<div class=\"nav-option-body\" style=\"display: none;\">
\t\t\t\t<label for=\"id-year\">";
        // line 20
        echo twig_escape_filter($this->env, YiiTranslate("app", "Year"), "html", null, true);
        echo "</label>
\t\t\t\t<input type=\"year\" id=\"id-title\" name=\"Art[year]\" class=\"form-control cls-search\" value=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "year"), "html", null, true);
        echo "\"/>
\t\t\t\t
\t\t\t\t<label for=\"id-agent\">";
        // line 23
        echo twig_escape_filter($this->env, YiiTranslate("app", "Digitization"), "html", null, true);
        echo "</label>
\t\t\t\t<select name=\"Art[is_digitized]\" class=\"form-control cls-select-search cls-digitization\">
\t\t\t\t\t<option value=\"\"></option>
\t\t\t";
        // line 26
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "attributeOptions", array(0 => "is_digitized"), "method"));
        foreach ($context['_seq'] as $context["key"] => $context["caption"]) {
            // line 27
            echo "\t\t\t\t\t<option value=\"";
            echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, (isset($context["caption"]) ? $context["caption"] : null), "html", null, true);
            echo "\t
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['caption'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 28
        echo "\t
\t\t\t\t</select>
\t\t\t\t<label for=\"id-collection\">";
        // line 30
        echo twig_escape_filter($this->env, YiiTranslate("app", "Collection"), "html", null, true);
        echo "</label>
\t\t\t\t<select name=\"Art[collection]\" class=\"form-control cls-select-search cls-collection\">
\t\t\t\t\t<option value=\"\"></option>
\t\t\t";
        // line 33
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "attributeOptions", array(0 => "collection"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["caption"]) {
            // line 34
            echo "\t\t\t\t\t<option 
\t\t\t\t\t\t\tdata-toggle=\"popover\" 
\t\t\t\t\t\t\tdata-content=\"";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "collectionInfo", array(0 => (isset($context["caption"]) ? $context["caption"] : null)), "method"), "html", null, true);
            echo "\" 
\t\t\t\t\t\t\tdata-trigger=\"hover\" 
\t\t\t\t\t\t\tvalue=\"";
            // line 38
            echo twig_escape_filter($this->env, (isset($context["caption"]) ? $context["caption"] : null), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t";
            // line 39
            echo twig_escape_filter($this->env, (isset($context["caption"]) ? $context["caption"] : null), "html", null, true);
            echo "\t
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['caption'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 40
        echo "\t\t\t\t\t
\t\t\t\t</select>\t
\t\t\t</div>
\t\t</div>\t\t
\t\t<label for=\"id-agent\">";
        // line 44
        echo twig_escape_filter($this->env, YiiTranslate("app", "Direct search on ID"), "html", null, true);
        echo "
    ";
        // line 45
        if ($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "user"), "hasFlash", array(0 => "error"), "method")) {
            // line 46
            echo "      <div class=\"text-warning\">
        ";
            // line 47
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "user"), "getFlash", array(0 => "error"), "method"), "html", null, true);
            echo "
      </div>
    ";
        }
        // line 49
        echo "    
    </label>
\t\t<input type=\"text\" id=\"id-agent\" name=\"Art[searchId]\" class=\"form-control\" value=\"";
        // line 51
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "searchId"), "html", null, true);
        echo "\"/>\t\t
\t\t<label for=\"id-sort\">";
        // line 52
        echo twig_escape_filter($this->env, YiiTranslate("app", "Sort by"), "html", null, true);
        echo "</label>
\t\t<select name=\"Art[searchOrder]\" class=\"id-sort form-control\">
\t\t\t<option value=\"agent\" ";
        // line 54
        if (($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "searchOrder") == "agent")) {
            echo "selected=\"1\"";
        }
        echo ">";
        echo twig_escape_filter($this->env, YiiTranslate("app", "artist"), "html", null, true);
        echo "</option>
\t\t\t<option value=\"title\" ";
        // line 55
        if (($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "searchOrder") == "title")) {
            echo "selected=\"1\"";
        }
        echo ">";
        echo twig_escape_filter($this->env, YiiTranslate("app", "title"), "html", null, true);
        echo "</option>
\t\t\t<option value=\"year\" ";
        // line 56
        if (($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "searchOrder") == "year")) {
            echo "selected=\"1\"";
        }
        echo ">";
        echo twig_escape_filter($this->env, YiiTranslate("app", "year"), "html", null, true);
        echo "</option>
\t\t\t<option value=\"id\" ";
        // line 57
        if (($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "searchOrder") == "id")) {
            echo "selected=\"1\"";
        }
        echo ">";
        echo twig_escape_filter($this->env, YiiTranslate("app", "id"), "html", null, true);
        echo "</option>
\t\t\t<option value=\"creation\" ";
        // line 58
        if (($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "searchOrder") == "creation")) {
            echo "selected=\"1\"";
        }
        echo ">";
        echo twig_escape_filter($this->env, YiiTranslate("app", "creation date"), "html", null, true);
        echo "</option>
\t\t\t<option value=\"digitization_date\" ";
        // line 59
        if (($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "searchOrder") == "digitization_date")) {
            echo "selected=\"1\"";
        }
        echo ">";
        echo twig_escape_filter($this->env, YiiTranslate("app", "digitization date"), "html", null, true);
        echo "</option>
\t\t\t<option value=\"received_date\" ";
        // line 60
        if (($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "searchOrder") == "received_date")) {
            echo "selected=\"1\"";
        }
        echo ">";
        echo twig_escape_filter($this->env, YiiTranslate("app", "received date"), "html", null, true);
        echo "</option>\t\t\t
\t\t</select>
\t\t<div class=\"bs-nav-searchbar\">
\t\t<input type=\"submit\" class=\"btn btn-info pull-right\" value=\"";
        // line 63
        echo twig_escape_filter($this->env, YiiTranslate("app", "search"), "html", null, true);
        echo "\"/>
\t\t</div>
\t</div>
</form>\t
";
        // line 67
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "onReady", array(0 => (((((((("

\$('.display-layout').on('click', function() {\t
\t\$('.display-layout').parent().removeClass('active');
\t\$('.id-layout').val(\$(this).data('layout'));
\t\$('.id-'+\$(this).data('layout')).addClass('active');
\t\$('.id-search').submit();
});
\$('.id-'+\$('#id-layout').val()).addClass('active');
\$('.id-sort').on('change', function() {
\t\$(this).closest('form').submit();

});
var theForm;
function formRefreh() {
\tif (document.getElementById('id-grid') !== null) {
\t\t\$.fn.yiiListView.update('id-grid', {
\t\t\tdata: theForm.serialize()
\t\t});
\t}\t
}
\$('.cls-select-search').on('change', function() {
\ttheForm = \t\$(this).closest('form');
\tsetTimeout(formRefreh, 150);
})

\$('.cls-search').on('keyup', function(e) {
\t//console.log('changed: '+ e.keyCode);
\tswitch  (e.keyCode) {
       case 40: // down arrow
        case 38: // up arrow
        case 16: // shift
        case 17: // ctrl
        case 18: // alt
\t\t\t\tcase 37: // left
\t\t\t\tcase 39: // right
          break;
\t\t\t\tdefault: 
\t\t\t\t\ttheForm = \t\$(this).closest('form');
\t\t\t\t\tsetTimeout(formRefreh, 150);
\t\t\t\t\treturn;
\t}\t\t\t\t
});
\$('.cls-search').on('change', function() {
\tif (document.getElementById('id-grid') === null) {
\t\t\$(this).closest('form').submit();
\t}
});

\$('.cls-toggle').on('click', function() {
\tif (\$('.nav-option-body').is(':visible')) {
\t\t\$('.nav-option-body').hide('blind');\t
\t\t\$('.caption').text('" . YiiTranslate("app", "show extra search")) . "');
\t\t\$('.nav-arrow').html('&#x25BC');
\t} else {\t
\t\t\$('.nav-option-body').show('blind');\t
\t\t\$('.caption').text('") . YiiTranslate("app", "hide extra search")) . "');
\t\t\$('.nav-arrow').html('&#x25B6');
\t}
});
\$('.cls-digitization').val('") . $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "is_digitized")) . "');
\$('.cls-collection').val('") . twig_join_filter($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "collection"))) . "'); 

\$('.cls-collection').on('mouseover', function(e) {
    var \$e = \$(e.target); 
    if (\$e.is('option')) {
\t\t\t\$('.cls-collection').popover('destroy');
\t\t\t\$('.cls-collection').popover({
\t\t\t\t\ttrigger: 'hover',
\t\t\t\t\tplacement: 'right',
\t\t\t\t\ttitle: \$e.attr('data-title'),
\t\t\t\t\tcontent: \$e.attr('data-content'),
\t\t\t\t\thtml: 1,
\t\t\t\t\tdelay : {show: 250, hide:600}
\t\t\t}).popover('show');
    }
});


")), "method"), "html", null, true);
        // line 146
        echo "
";
    }

    public function getTemplateName()
    {
        return "views/site/search-layout.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  316 => 146,  235 => 67,  228 => 63,  218 => 60,  210 => 59,  202 => 58,  194 => 57,  178 => 55,  170 => 54,  165 => 52,  157 => 49,  151 => 47,  148 => 46,  142 => 44,  136 => 40,  124 => 38,  119 => 36,  115 => 34,  111 => 33,  101 => 28,  90 => 27,  86 => 26,  80 => 23,  75 => 21,  71 => 20,  66 => 18,  61 => 16,  57 => 15,  53 => 14,  49 => 13,  40 => 9,  34 => 8,  23 => 3,  19 => 1,  426 => 199,  422 => 197,  418 => 195,  416 => 194,  413 => 193,  404 => 190,  400 => 189,  396 => 188,  393 => 187,  389 => 186,  384 => 183,  375 => 176,  373 => 175,  369 => 173,  358 => 119,  351 => 118,  345 => 117,  337 => 116,  331 => 115,  328 => 114,  324 => 113,  318 => 110,  303 => 100,  300 => 99,  291 => 97,  287 => 96,  280 => 95,  276 => 86,  272 => 85,  267 => 83,  254 => 75,  250 => 73,  248 => 72,  233 => 70,  229 => 69,  227 => 68,  220 => 64,  216 => 63,  212 => 62,  208 => 60,  186 => 56,  169 => 58,  161 => 51,  156 => 52,  153 => 51,  146 => 45,  143 => 46,  141 => 45,  137 => 44,  134 => 43,  128 => 39,  122 => 39,  118 => 38,  113 => 36,  108 => 34,  105 => 30,  97 => 32,  95 => 31,  88 => 26,  84 => 25,  81 => 24,  63 => 23,  54 => 16,  48 => 12,  45 => 11,  39 => 8,  36 => 7,  31 => 4,  28 => 5,);
    }
}
