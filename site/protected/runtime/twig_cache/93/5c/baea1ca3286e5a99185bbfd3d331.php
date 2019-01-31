<?php

/* vendors/toxus/views/layouts/mainBootstrap3.twig */
class __TwigTemplate_935cbaea1ca3286e5a99185bbfd3d331 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'pageTitle' => array($this, 'block_pageTitle'),
            'head' => array($this, 'block_head'),
            'bodyTag' => array($this, 'block_bodyTag'),
            'menuLeft' => array($this, 'block_menuLeft'),
            'itemMenuHeader' => array($this, 'block_itemMenuHeader'),
            'itemMenuContent' => array($this, 'block_itemMenuContent'),
            'itemMenuFooter' => array($this, 'block_itemMenuFooter'),
            'menuTop' => array($this, 'block_menuTop'),
            'homeLeft' => array($this, 'block_homeLeft'),
            'navbarUserLocation' => array($this, 'block_navbarUserLocation'),
            'extraNav' => array($this, 'block_extraNav'),
            'bsHeaderOptions' => array($this, 'block_bsHeaderOptions'),
            'header' => array($this, 'block_header'),
            'headerLeft' => array($this, 'block_headerLeft'),
            'headerRight' => array($this, 'block_headerRight'),
            'appClass' => array($this, 'block_appClass'),
            'infoLeft' => array($this, 'block_infoLeft'),
            'content' => array($this, 'block_content'),
            'infoRight' => array($this, 'block_infoRight'),
            'bootstrap3Footer' => array($this, 'block_bootstrap3Footer'),
            'footerLeft' => array($this, 'block_footerLeft'),
            'footerLeftExtra' => array($this, 'block_footerLeftExtra'),
            'footerMiddle' => array($this, 'block_footerMiddle'),
            'footerRight' => array($this, 'block_footerRight'),
            'footerCredits' => array($this, 'block_footerCredits'),
            'copyright' => array($this, 'block_copyright'),
            'sitemap' => array($this, 'block_sitemap'),
            'privacy' => array($this, 'block_privacy'),
            'versionInfo' => array($this, 'block_versionInfo'),
            'version' => array($this, 'block_version'),
            'contentBody' => array($this, 'block_contentBody'),
            'onReady' => array($this, 'block_onReady'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 6
        echo "<!DOCTYPE html>
<html>
  <head>
\t\t<title>";
        // line 9
        $this->displayBlock('pageTitle', $context, $blocks);
        echo "</title>\t\t
\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
\t\t<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
\t\t<link rel=\"shortcut icon\" href=\"/favicon.ico\" type=\"image/x-icon\">
\t\t<link rel=\"icon\" href=\"/favicon.ico\" type=\"image/x-icon\">
\t\t";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "addHeader", array(), "method"), "html", null, true);
        echo "
\t\t";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "registerCore", array(0 => "jquery", 1 => true), "method"), "html", null, true);
        echo "
\t\t";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "registerPackage", array(0 => "bootstrap3"), "method"), "html", null, true);
        echo "
\t\t";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "registerPackage", array(0 => "core"), "method"), "html", null, true);
        echo "
\t\t";
        // line 19
        $this->displayBlock('head', $context, $blocks);
        echo "\t\t
\t\t";
        // line 20
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "header"), "method"));
        $template->display($context);
        // line 21
        echo "\t\t
\t\t<meta name=\"description\" content=\"";
        // line 22
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "config", array(), "any", false, true), "value", array(0 => "meta.description"), "method", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "config", array(), "any", false, true), "value", array(0 => "meta.description"), "method"), "site description")) : ("site description")), "html", null, true);
        echo "\" />\t
\t\t<meta name=\"keywords\" content=\"";
        // line 23
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "config", array(), "any", false, true), "value", array(0 => "meta.keywords"), "method", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "config", array(), "any", false, true), "value", array(0 => "meta.keywords"), "method"), "none")) : ("none")), "html", null, true);
        echo "\" />
\t\t<meta name=\"language\" content=\"";
        // line 24
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "config", array(), "any", false, true), "value", array(0 => "meta.language"), "method", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "config", array(), "any", false, true), "value", array(0 => "meta.language"), "method"), "english")) : ("english")), "html", null, true);
        echo "\" />
\t\t<meta http-equiv=\"language\" content=\"";
        // line 25
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "config", array(), "any", false, true), "value", array(0 => "meta.languageShort"), "method", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "config", array(), "any", false, true), "value", array(0 => "meta.languageShort"), "method"), "EN")) : ("EN")), "html", null, true);
        echo "\" />

\t</head>
\t<body ";
        // line 28
        $this->displayBlock('bodyTag', $context, $blocks);
        echo ">
\t\t";
        // line 32
        echo "\t
\t\t";
        // line 33
        ob_start();
        // line 34
        echo "\t\t\t";
        $this->displayBlock('menuLeft', $context, $blocks);
        // line 45
        echo "\t\t";
        $context["itemMenu"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        echo "\t\t\t
\t\t
\t\t";
        // line 47
        $this->displayBlock('menuTop', $context, $blocks);
        // line 83
        echo "\t\t
\t\t<div class=\"bs-header\" ";
        // line 84
        $this->displayBlock('bsHeaderOptions', $context, $blocks);
        echo ">
\t\t\t<div class=\"container\">
\t\t\t\t";
        // line 86
        $this->displayBlock('header', $context, $blocks);
        // line 103
        echo "\t\t\t</div>
\t\t</div>
\t\t";
        // line 105
        $context["colVis"] = ((array_key_exists("layout", $context)) ? (_twig_default_filter((isset($context["layout"]) ? $context["layout"] : null), "content")) : ("content"));
        echo " ";
        // line 115
        echo "
\t\t<div class=\"container bs-container ";
        // line 116
        $this->displayBlock('appClass', $context, $blocks);
        echo "\">
\t\t\t<div id=\"id-body\" class=\"row\">\t\t\t
\t";
        // line 118
        if (((isset($context["colVis"]) ? $context["colVis"] : null) == "full")) {
            // line 119
            echo "\t\t\t\t<div class=\"col-sm-12\" role=\"main\">
\t";
        } else {
            // line 121
            echo "\t\t";
            if (((isset($context["colVis"]) ? $context["colVis"] : null) != "infoRight")) {
                echo "\t\t\t
\t\t\t\t<div class=\"col-sm-3  hidden-xs\" >
\t\t\t\t\t<div class=\"bs-sidebar affix-top hidden-print\" role=\"complementary\"  >
\t\t\t\t\t\t";
                // line 124
                echo (isset($context["itemMenu"]) ? $context["itemMenu"] : null);
                echo "
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t";
            }
            // line 127
            echo "\t\t\t
\t\t";
            // line 128
            if (((isset($context["colVis"]) ? $context["colVis"] : null) == "sub")) {
                // line 129
                echo "\t\t\t\t<div class=\"col-sm-3\">
\t\t\t\t\t";
                // line 130
                $this->displayBlock('infoLeft', $context, $blocks);
                // line 131
                echo "\t\t\t\t</div>
\t\t\t\t<div class=\"col-sm-6\" role=\"main\">
\t\t";
            } elseif (((isset($context["colVis"]) ? $context["colVis"] : null) == "info")) {
                // line 133
                echo "\t
\t\t\t\t<div class=\"col-sm-6\" role=\"main\">\t\t\t\t\t
\t\t";
            } else {
                // line 135
                echo "\t
\t\t\t\t<div class=\"";
                // line 136
                echo twig_escape_filter($this->env, ((array_key_exists("mainColumnClass", $context)) ? (_twig_default_filter((isset($context["mainColumnClass"]) ? $context["mainColumnClass"] : null), "col-sm-9")) : ("col-sm-9")), "html", null, true);
                echo "\" role=\"main\">
\t\t";
            }
            // line 137
            echo "\t
\t";
        }
        // line 138
        echo "\t\t
\t\t\t\t";
        // line 139
        $this->displayBlock('content', $context, $blocks);
        echo "\t\t\t\t\t\t\t\t\t\t
\t\t\t\t</div>\t
\t";
        // line 141
        if ((((isset($context["colVis"]) ? $context["colVis"] : null) == "info") || ((isset($context["colVis"]) ? $context["colVis"] : null) == "infoRight"))) {
            echo "\t
\t\t\t\t<div class=\"";
            // line 142
            echo twig_escape_filter($this->env, ((array_key_exists("rightColumnClass", $context)) ? (_twig_default_filter((isset($context["rightColumnClass"]) ? $context["rightColumnClass"] : null), "col-sm-3")) : ("col-sm-3")), "html", null, true);
            echo "\">
\t\t\t\t\t";
            // line 143
            $this->displayBlock('infoRight', $context, $blocks);
            // line 144
            echo "\t\t\t\t</div>\t\t\t\t\t
\t";
        }
        // line 145
        echo "\t\t\t\t\t
\t\t\t</div>\t\t\t\t
\t\t</div>\t
\t\t
";
        // line 164
        echo "\t\t\t

\t\t<div class=\"bs-footer\">\t
\t\t\t";
        // line 167
        $this->displayBlock('bootstrap3Footer', $context, $blocks);
        // line 232
        echo "\t
\t\t</div>\t\t
\t\t<div class=\"modal fade\" id=\"id-modal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\" >
\t\t\t<div class=\"modal-body\">
\t\t\t\t<div class=\"modal-dialog\">
\t\t\t\t\t<div id=\"id-modal-body\" class=\"modal-content\">
\t\t\t\t\t";
        // line 238
        echo twig_escape_filter($this->env, YiiTranslate("base", "LOADING INFORMATION ...."), "html", null, true);
        echo "
\t\t\t\t\t</div><!-- /.modal-content -->
\t\t\t\t</div><!-- /.modal-dialog -->\t\t\t\t
\t\t\t</div>
\t\t</div>
";
        // line 246
        echo "\t\t
\t\t<div class=\"modal fade modal-preview\" id=\"id-preview\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\" >
\t\t\t<div class=\"modal-body\">
\t\t\t\t<div class=\"modal-dialog\">
\t\t\t\t\t<div class=\"modal-content\">
\t\t\t\t\t";
        // line 251
        echo twig_escape_filter($this->env, YiiTranslate("base", "LOADING INFORMATION ...."), "html", null, true);
        echo "
\t\t\t\t\t</div><!-- /.modal-content -->
\t\t\t\t</div><!-- /.modal-dialog -->\t\t\t\t
\t\t\t</div>
\t\t</div>
\t\t\t
\t\t<div id=\"id-wait-message\" class=\"hide\">
\t\t\t<div class=\"row id-wait\">
\t\t\t\t<div class=\"col-offset-1 col-lg-10\">
\t\t\t\t\t<h2 style=\"text-align: center\" class=\"wait-message\">";
        // line 260
        echo twig_escape_filter($this->env, YiiTranslate("base", "Processing ....."), "html", null, true);
        echo "</h2>
\t\t\t\t\t<div class=\"wait-icon\"><img class=\"wait-icon\" src=\"";
        // line 261
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "getPackageBaseUrl", array(0 => "core"), "method"), "html", null, true);
        echo "/images/progress.gif\"/></div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>\t
\t\t\t
\t\t";
        // line 266
        $this->displayBlock('contentBody', $context, $blocks);
        // line 268
        echo "\t\t<script\ttype=\"text/javascript\">
\t\t\t\$().ready(function() {
\t\t\t\t";
        // line 270
        $this->displayBlock('onReady', $context, $blocks);
        // line 271
        echo "\t\t\t\t\$('.a-url').on('click', function() {
\t\t\t\t\twindow.location = \$(this).data('url');
\t\t\t\t});
\t\t\t\t";
        // line 274
        echo $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "scriptOnReady", array(), "method");
        echo "
\t\t\t});
\t\t</script>\t\t
  </body>
</html>";
    }

    // line 9
    public function block_pageTitle($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "pageTitle"), "html", null, true);
    }

    // line 19
    public function block_head($context, array $blocks = array())
    {
    }

    // line 28
    public function block_bodyTag($context, array $blocks = array())
    {
    }

    // line 34
    public function block_menuLeft($context, array $blocks = array())
    {
        // line 35
        echo "\t\t\t";
        $this->displayBlock('itemMenuHeader', $context, $blocks);
        // line 40
        echo "\t\t\t";
        $this->displayBlock('itemMenuContent', $context, $blocks);
        // line 43
        echo "\t\t\t";
        $this->displayBlock('itemMenuFooter', $context, $blocks);
        echo "\t
\t\t\t";
    }

    // line 35
    public function block_itemMenuHeader($context, array $blocks = array())
    {
        // line 36
        echo "\t\t\t<div class=\"cls-navbar-toolbar navbar bs-nav-toolbar id-navbar-toolbar\">
\t\t\t";
        // line 37
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "_buttons"), "method"));
        $template->display($context);
        // line 38
        echo "\t\t\t</div>
\t\t\t";
    }

    // line 40
    public function block_itemMenuContent($context, array $blocks = array())
    {
        // line 41
        echo "      ";
        echo $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "menuHtml", array(0 => "item", 1 => array("class" => "nav bs-sidenav")), "method");
        echo "
\t\t\t";
    }

    // line 43
    public function block_itemMenuFooter($context, array $blocks = array())
    {
    }

    // line 47
    public function block_menuTop($context, array $blocks = array())
    {
        // line 48
        echo "\t\t<div class=\"navbar navbar-inverse navbar-fixed-top bs-docs-nav\">
\t\t\t<div class=\"container\">
\t\t\t\t<button class=\"navbar-toggle pull-left\" type=\"button\" data-toggle=\"collapse\" data-target=\".bs-navbar-collapse\">
\t\t\t\t\t<span class=\"icon-bar\"></span>
\t\t\t\t\t<span class=\"icon-bar\"></span>
\t\t\t\t\t<span class=\"icon-bar\"></span>
\t\t\t\t</button>
\t\t\t\t";
        // line 55
        if ($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "hasMenu", array(0 => "item"), "method")) {
            // line 56
            echo "\t\t\t\t<button class=\"navbar-toggle btn-info\" type=\"button\" data-toggle=\"collapse\" data-target=\".bs-item-menu\" style=\"margin-right: 10px\">
\t\t\t\t\t<span class=\"glyphicon glyphicon-retweet\"></span>
\t\t\t\t</button>\t\t\t\t
\t\t\t\t";
        }
        // line 60
        echo "\t\t\t\t";
        $this->displayBlock('homeLeft', $context, $blocks);
        // line 63
        echo "\t\t\t\t
\t\t\t\t<div class=\"collapse navbar-collapse bs-navbar-collapse\" style=\"overflow-y:hidden;\">
\t\t\t\t\t<div class=\"navbar-left\">
\t\t\t\t\t";
        // line 66
        echo $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "menuHtml", array(0 => "system", 1 => array("class" => "nav navbar-nav")), "method");
        echo "
\t\t\t\t\t</div>
\t\t\t\t\t<div ";
        // line 68
        $this->displayBlock('navbarUserLocation', $context, $blocks);
        echo ">\t
\t\t\t\t\t";
        // line 69
        echo $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "menuHtml", array(0 => "user", 1 => array("class" => "nav navbar-nav")), "method");
        echo "
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t";
        // line 74
        $this->displayBlock('extraNav', $context, $blocks);
        // line 81
        echo "\t\t</div>
\t\t";
    }

    // line 60
    public function block_homeLeft($context, array $blocks = array())
    {
        // line 61
        echo "\t\t\t\t<a href=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "/"), "method"), "html", null, true);
        echo "\" class=\"navbar-brand\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["App"]) ? $context["App"] : null), "name"), "html", null, true);
        echo "</a>\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t";
    }

    // line 68
    public function block_navbarUserLocation($context, array $blocks = array())
    {
        echo "class=\"navbar-right pull-right\" ";
    }

    // line 74
    public function block_extraNav($context, array $blocks = array())
    {
        // line 75
        echo "\t\t\t\t<div class=\"visible-xs\">
\t\t\t\t<div class=\"collapse navbar-collapse bs-item-menu\">
\t\t\t\t\t";
        // line 77
        echo (isset($context["itemMenu"]) ? $context["itemMenu"] : null);
        echo "
\t\t\t\t</div>
\t\t\t\t</div>\t\t
\t\t\t\t";
    }

    // line 84
    public function block_bsHeaderOptions($context, array $blocks = array())
    {
    }

    // line 86
    public function block_header($context, array $blocks = array())
    {
        // line 87
        echo "\t\t\t\t";
        echo "\t\t\t\t
\t\t\t\t<div class=\"navbar-left col-xs-6 no-padding no-wrap \">\t
\t\t\t\t\t";
        // line 89
        $this->displayBlock('headerLeft', $context, $blocks);
        // line 93
        echo "\t\t\t\t</div>
";
        // line 95
        echo "\t\t\t\t<div class=\"navbar-right no-padding col-xs-6\">\t
\t\t\t\t\t<div class=\"pull-right\">
\t\t\t\t\t";
        // line 97
        $this->displayBlock('headerRight', $context, $blocks);
        // line 100
        echo "\t\t\t\t\t</div>\t\t
\t\t\t\t</div>
\t\t\t\t";
    }

    // line 89
    public function block_headerLeft($context, array $blocks = array())
    {
        // line 90
        echo "\t\t\t\t\t";
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "logo"), "method"));
        $template->display($context);
        echo "\t\t\t\t\t\t\t\t\t
\t\t\t\t\t";
        // line 91
        echo $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "menuHtml", array(0 => "logo", 1 => array("class" => "nav navbar-nav")), "method");
        echo "
\t\t\t\t\t";
    }

    // line 97
    public function block_headerRight($context, array $blocks = array())
    {
        // line 98
        echo "\t\t\t\t\t";
        echo $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "menuHtml", array(0 => "header", 1 => array("class" => "nav navbar-nav")), "method");
        echo "\t\t\t\t\t
\t\t\t\t\t";
    }

    // line 116
    public function block_appClass($context, array $blocks = array())
    {
    }

    // line 130
    public function block_infoLeft($context, array $blocks = array())
    {
        echo " ";
    }

    // line 139
    public function block_content($context, array $blocks = array())
    {
    }

    // line 143
    public function block_infoRight($context, array $blocks = array())
    {
    }

    // line 167
    public function block_bootstrap3Footer($context, array $blocks = array())
    {
        // line 168
        echo "\t\t\t<div class=\"container\">
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"col-sm-4\">
\t\t\t\t\t\t";
        // line 171
        $this->displayBlock('footerLeft', $context, $blocks);
        // line 188
        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-sm-4\">
\t\t\t\t\t\t";
        // line 191
        $this->displayBlock('footerMiddle', $context, $blocks);
        // line 199
        echo "\t
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-sm-4\">
\t\t\t\t\t\t";
        // line 202
        $this->displayBlock('footerRight', $context, $blocks);
        // line 216
        echo "\t
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"footerCredits\">
\t\t\t\t";
        // line 221
        $this->displayBlock('footerCredits', $context, $blocks);
        // line 230
        echo "\t
\t\t\t</div>\t
\t\t ";
    }

    // line 171
    public function block_footerLeft($context, array $blocks = array())
    {
        // line 172
        echo "\t\t\t\t\t\t<section>
\t\t\t\t\t\t\t<h4>";
        // line 173
        echo twig_escape_filter($this->env, YiiTranslate("base", "Contact us"), "html", null, true);
        echo "</h4>
\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\tMobile: <a href=\"tel:93069406\">93069406</a>
\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\tEmail: <a href=\"mailto:mail@videokunstarkivet.org\">mail@videokunstarkivet.org</a>
\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\tContact person for Videokunstarkivet: Per Platou
\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\tContact person for Norsk kulturråd: Birgit Bærøe
\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t";
        // line 186
        $this->displayBlock('footerLeftExtra', $context, $blocks);
        echo "\t\t\t\t\t\t\t
\t\t\t\t\t\t</section>
\t\t\t\t\t\t";
    }

    public function block_footerLeftExtra($context, array $blocks = array())
    {
    }

    // line 191
    public function block_footerMiddle($context, array $blocks = array())
    {
        // line 192
        echo "\t\t\t\t\t\t<section>
\t\t\t\t\t\t\t<h4>";
        // line 193
        echo twig_escape_filter($this->env, YiiTranslate("base", "stay updated"), "html", null, true);
        echo "</h4>
\t\t\t\t\t\t\t<p>";
        // line 194
        echo twig_escape_filter($this->env, YiiTranslate("base", "sign up for our newsletter. We won't share your email address."), "html", null, true);
        echo "</p>
\t\t\t\t\t\t\t";
        // line 195
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "newsletter"), "method"));
        $template->display($context);
        // line 196
        echo "\t\t\t\t\t\t\t\t<!--close input-append-->
\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t</section>\t\t\t\t\t\t\t
\t\t\t\t\t\t";
    }

    // line 202
    public function block_footerRight($context, array $blocks = array())
    {
        // line 203
        echo "            ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "footerArticles"));
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
        foreach ($context['_seq'] as $context["_key"] => $context["article"]) {
            // line 204
            echo "              ";
            if ($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "first")) {
                // line 205
                echo "            <section>
              <h4>Instruction and Help</h4>
              <ul class=\"footerPosts list-unstyled\">
              ";
            }
            // line 208
            echo "  
                <li><a href=\"";
            // line 209
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "article/index", 1 => array($this->getAttribute((isset($context["article"]) ? $context["article"] : null), "key") => "")), "method"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : null), "title"), "html", null, true);
            echo "</a></li>
              ";
            // line 210
            if ($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "last")) {
                echo "    
              </ul>
            </section>\t
              ";
            }
            // line 214
            echo "           ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['article'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 215
        echo "              
\t\t\t\t\t\t";
    }

    // line 221
    public function block_footerCredits($context, array $blocks = array())
    {
        // line 222
        echo "\t\t\t\t<div class=\"container\">
\t\t\t\t\t<ul class=\"footer-links text-center\">
\t\t\t\t\t\t";
        // line 224
        $this->displayBlock('copyright', $context, $blocks);
        // line 225
        echo "\t\t\t\t\t\t";
        $this->displayBlock('sitemap', $context, $blocks);
        // line 226
        echo "\t\t\t\t\t\t";
        $this->displayBlock('privacy', $context, $blocks);
        // line 227
        echo "\t\t\t\t\t\t";
        $this->displayBlock('versionInfo', $context, $blocks);
        // line 228
        echo "\t\t\t\t\t</ul>
\t\t\t\t</div>\t\t
\t\t\t\t";
    }

    // line 224
    public function block_copyright($context, array $blocks = array())
    {
        echo "<li><a href=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "article/index", 1 => array("copyright" => "")), "method"), "html", null, true);
        echo "\"> &copy; 2013 - 2015 Toxus</a> | </li>";
    }

    // line 225
    public function block_sitemap($context, array $blocks = array())
    {
        echo "<li><a href=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "site/sitemap"), "method"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, YiiTranslate("base", "site map"), "html", null, true);
        echo "</a> | </li>";
    }

    // line 226
    public function block_privacy($context, array $blocks = array())
    {
        echo "<li><a href=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "site/privacy"), "method"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, YiiTranslate("base", "privacy"), "html", null, true);
        echo "</a></li>";
    }

    // line 227
    public function block_versionInfo($context, array $blocks = array())
    {
        echo "<li class=\"version\">";
        echo twig_escape_filter($this->env, YiiTranslate("base", "version"), "html", null, true);
        echo ": ";
        $this->displayBlock('version', $context, $blocks);
        echo "</li>";
    }

    public function block_version($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "version"), "html", null, true);
        echo "3";
    }

    // line 266
    public function block_contentBody($context, array $blocks = array())
    {
        // line 267
        echo "\t\t";
    }

    // line 270
    public function block_onReady($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "vendors/toxus/views/layouts/mainBootstrap3.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  768 => 270,  764 => 267,  761 => 266,  745 => 227,  735 => 226,  725 => 225,  717 => 224,  711 => 228,  708 => 227,  705 => 226,  702 => 225,  700 => 224,  696 => 222,  693 => 221,  688 => 215,  674 => 214,  667 => 210,  661 => 209,  658 => 208,  652 => 205,  649 => 204,  631 => 203,  628 => 202,  621 => 196,  618 => 195,  614 => 194,  610 => 193,  607 => 192,  604 => 191,  593 => 186,  577 => 173,  574 => 172,  571 => 171,  565 => 230,  563 => 221,  556 => 216,  554 => 202,  549 => 199,  547 => 191,  542 => 188,  540 => 171,  535 => 168,  532 => 167,  527 => 143,  522 => 139,  516 => 130,  511 => 116,  504 => 98,  501 => 97,  495 => 91,  489 => 90,  486 => 89,  480 => 100,  478 => 97,  474 => 95,  471 => 93,  469 => 89,  464 => 87,  461 => 86,  456 => 84,  448 => 77,  444 => 75,  441 => 74,  435 => 68,  426 => 61,  423 => 60,  418 => 81,  416 => 74,  408 => 69,  404 => 68,  399 => 66,  394 => 63,  391 => 60,  385 => 56,  383 => 55,  374 => 48,  371 => 47,  366 => 43,  359 => 41,  356 => 40,  351 => 38,  348 => 37,  345 => 36,  342 => 35,  335 => 43,  332 => 40,  329 => 35,  326 => 34,  321 => 28,  316 => 19,  310 => 9,  301 => 274,  296 => 271,  294 => 270,  290 => 268,  288 => 266,  280 => 261,  276 => 260,  264 => 251,  257 => 246,  249 => 238,  241 => 232,  239 => 167,  234 => 164,  228 => 145,  224 => 144,  222 => 143,  218 => 142,  214 => 141,  209 => 139,  206 => 138,  202 => 137,  197 => 136,  194 => 135,  189 => 133,  184 => 131,  182 => 130,  179 => 129,  177 => 128,  174 => 127,  167 => 124,  160 => 121,  156 => 119,  154 => 118,  149 => 116,  146 => 115,  143 => 105,  139 => 103,  137 => 86,  132 => 84,  129 => 83,  127 => 47,  121 => 45,  118 => 34,  116 => 33,  113 => 32,  109 => 28,  103 => 25,  99 => 24,  95 => 23,  91 => 22,  88 => 21,  85 => 20,  81 => 19,  77 => 18,  73 => 17,  69 => 16,  65 => 15,  56 => 9,  51 => 6,);
    }
}
