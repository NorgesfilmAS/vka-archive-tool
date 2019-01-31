<?php

/* views/layouts/main.twig */
class __TwigTemplate_be08fb0dc1f7ceaf8a633f6abaa785a7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'pageTitle' => array($this, 'block_pageTitle'),
            'appClass' => array($this, 'block_appClass'),
            'itemMenuHeader' => array($this, 'block_itemMenuHeader'),
            'headerLeft' => array($this, 'block_headerLeft'),
            'headerRight' => array($this, 'block_headerRight'),
            'footerLeftExtra' => array($this, 'block_footerLeftExtra'),
            'footerMiddle' => array($this, 'block_footerMiddle'),
            'footerRight' => array($this, 'block_footerRight'),
            'copyright' => array($this, 'block_copyright'),
            'sitemap' => array($this, 'block_sitemap'),
            'privacy' => array($this, 'block_privacy'),
            'version' => array($this, 'block_version'),
            'onReady' => array($this, 'block_onReady'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "mainBootstrap3"), "method"));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 7
    public function block_pageTitle($context, array $blocks = array())
    {
        // line 8
        echo "  ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "user"), "applicationTitle"), "html", null, true);
        echo "
";
    }

    // line 11
    public function block_appClass($context, array $blocks = array())
    {
        echo " pnek";
    }

    // line 13
    public function block_itemMenuHeader($context, array $blocks = array())
    {
        // line 14
        echo "\t<div class=\"cls-navbar-toolbar navbar bs-nav-toolbar id-navbar-toolbar\">
\t";
        // line 15
        echo $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "getToolButtons", array(0 => true), "method");
        echo "\t\t\t
\t";
        // line 16
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "_buttons"), "method"));
        $template->display($context);
        // line 17
        echo "\t";
        echo $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "getToolButtons", array(0 => false), "method");
        echo "\t
\t</div>
";
    }

    // line 21
    public function block_headerLeft($context, array $blocks = array())
    {
        // line 22
        echo "\t";
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "logo"), "method"));
        $template->display($context);
        echo "\t\t\t\t\t\t\t\t\t
";
    }

    // line 25
    public function block_headerRight($context, array $blocks = array())
    {
        // line 26
        echo "  ";
        if ((!$this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "user"), "isGuest"))) {
            // line 27
            echo "\t<div class=\"search\">
\t\t<div class=\"input-group\">
\t\t\t<input id=\"quick-search\" type=\"text\" class=\"form-control input-bg-dark\" placeholder=\"Search\" name=\"quick[search]\" value=\"";
            // line 29
            echo twig_escape_filter($this->env, (isset($context["quickSearch"]) ? $context["quickSearch"] : null), "html", null, true);
            echo "\">
\t\t\t<div class=\"input-group-btn\">
\t\t\t\t<button id=\"btn-quick-search\" class=\"btn btn-default input-bg-dark\" type=\"submit\"><i class=\"glyphicon glyphicon-search\"></i></button>
\t\t\t</div>
\t\t</div>
\t</div>
  ";
        }
    }

    // line 38
    public function block_footerLeftExtra($context, array $blocks = array())
    {
    }

    // line 41
    public function block_footerMiddle($context, array $blocks = array())
    {
        // line 42
        echo "<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-64177415-1', 'auto');
  ga('send', 'pageview');

</script>

";
    }

    // line 55
    public function block_footerRight($context, array $blocks = array())
    {
        // line 56
        echo "\t<section>
\t\t<h4>Instruction and Help</h4>
\t\t<ul class=\"footerPosts list-unstyled\">
\t\t\t";
        // line 59
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "footerArticles"));
        foreach ($context['_seq'] as $context["_key"] => $context["article"]) {
            // line 60
            echo "\t\t\t\t<li><a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "article/index", 1 => array($this->getAttribute((isset($context["article"]) ? $context["article"] : null), "key") => "")), "method"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : null), "title"), "html", null, true);
            echo "</a></li>
<!--\t\t\t
\t\t\t<li><a href=\"";
            // line 62
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "article/index", 1 => array("search_box" => "")), "method"), "html", null, true);
            echo "\">Understanding the search box</a></li>
\t\t\t<li><a href=\"";
            // line 63
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "article/index", 1 => array("file_upload" => "")), "method"), "html", null, true);
            echo "\">Adding files to an Artwork</a></li>
\t\t\t<li><a href=\"";
            // line 64
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "article/index", 1 => array("multi_channel" => "")), "method"), "html", null, true);
            echo "\">Multi Channel installations</a></li>
-->
\t\t ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['article'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 67
        echo "\t\t</ul>
\t</section>\t
";
    }

    // line 71
    public function block_copyright($context, array $blocks = array())
    {
        echo "<li><a href=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "article/index", 1 => array("copyright" => "")), "method"), "html", null, true);
        echo "\"> &copy; 2013–2019 Archive Tool</a>&nbsp; | </li>
";
    }

    // line 74
    public function block_sitemap($context, array $blocks = array())
    {
    }

    // line 75
    public function block_privacy($context, array $blocks = array())
    {
        echo " ";
    }

    // line 77
    public function block_version($context, array $blocks = array())
    {
        // line 78
        echo "\t<a href=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "article/index", 1 => array("revisions" => "")), "method"), "html", null, true);
        echo "\" title=\"framework version: ";
        $this->displayParentBlock("version", $context, $blocks);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "config"), "system"), "version"), "html", null, true);
        echo "</a> 
";
    }

    // line 81
    public function block_onReady($context, array $blocks = array())
    {
        // line 82
        echo "  ";
        if ((isset($context["menuItem"]) ? $context["menuItem"] : null)) {
            // line 83
            echo "\t\t\$('";
            echo twig_escape_filter($this->env, (isset($context["menuItem"]) ? $context["menuItem"] : null), "html", null, true);
            echo "').addClass('active');
\t";
        }
        // line 84
        echo "\t
\tfunction bindEvents(id, result)
\t{
\t\t\$('.a-url').on('click', function() {
\t\t\twindow.location = \$(this).data('url');
\t\t});
\t\t";
        // line 90
        echo $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "getReady", array(0 => "modal-dialog"), "method");
        echo "
\t}
  bindEvents();
\tvar tmr;\t
\t// console.log('binding');
\tvar quickSearch = function() {
\t\tif (tmr) {
\t\t\tclearTimeout(tmr);\t\t\t
\t\t}
\t\ttmr = setTimeout(function() {
\t\t\tvar val = \$('#quick-search').val();
\t\t\tconsole.log('Changed:' + val);
\t\t\tvar layout = \$('.active').data('layout');
\t\t\t\$('.pnek').load(\"";
        // line 103
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "site/quickSearch"), "method"), "html", null, true);
        echo " #id-body\",\t{ quickSearch : val, layout: layout }, function() {
\t\t\t\tif (setMenuAffix) {
\t\t\t\t\tsetMenuAffix();
\t\t\t\t}\t
\t\t\t\tbindEvents();
\t\t\t\t// menuModalActive();
\t\t\t\tconsole.log('quickSearch.loaded:' + val);\t\t\t\t
\t\t\t\t\$('.display-layout').on('click', function() {\t\t\t\t\t
\t\t\t\t\tlayout = \$(this).data('layout');
\t\t\t\t\t\$('.display-layout').removeClass('active');
\t\t\t\t\t\$(this).addClass('active');
\t\t\t\t\tconsole.log('layout:', layout);
\t\t\t\t\tquickSearch();
\t\t\t\t});
\t\t\t});
\t\t}, 500);\t
\t}
\t
\t\$('#quick-search').on( 'input', function() {\t\t\t\t
\t\tquickSearch();
\t});
\t\$('#btn-quick-search').on('click', function() {
\t\tquickSearch();
\t});
\t
\t";
        // line 128
        $this->displayParentBlock("onReady", $context, $blocks);
        echo "

";
    }

    public function getTemplateName()
    {
        return "views/layouts/main.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  272 => 128,  244 => 103,  228 => 90,  220 => 84,  214 => 83,  211 => 82,  208 => 81,  197 => 78,  194 => 77,  188 => 75,  183 => 74,  174 => 71,  168 => 67,  159 => 64,  155 => 63,  151 => 62,  143 => 60,  139 => 59,  134 => 56,  131 => 55,  116 => 42,  113 => 41,  108 => 38,  96 => 29,  92 => 27,  89 => 26,  86 => 25,  78 => 22,  75 => 21,  67 => 17,  64 => 16,  60 => 15,  57 => 14,  54 => 13,  48 => 11,  41 => 8,  38 => 7,);
    }
}
