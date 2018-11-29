<?php

/* /views/job/index.twig */
class __TwigTemplate_2c067b5c34b145311b7ac6ad937d0c2c extends Twig_Template
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

    // line 6
    public function block_content($context, array $blocks = array())
    {
        // line 7
        echo "\t<h2>";
        echo twig_escape_filter($this->env, YiiTranslate("app", "Resource Space Processing Queue"), "html", null, true);
        echo "</h2>
\t<h4>";
        // line 8
        echo twig_escape_filter($this->env, YiiTranslate("app", "jobs"), "html", null, true);
        echo "</h4>
\t";
        // line 9
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "flash"), "method"));
        $template->display($context);
        // line 10
        echo "\t<dl class=\"dl-horizontal\">
\t\t<dt>";
        // line 11
        echo twig_escape_filter($this->env, YiiTranslate("app", "total count of jobs"), "html", null, true);
        echo "</dt>
\t\t<dd>";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "jobCount", array(), "method"), "html", null, true);
        echo "</dd>
\t\t<dt>";
        // line 13
        echo twig_escape_filter($this->env, YiiTranslate("app", "waiting jobs"), "html", null, true);
        echo "</dt>
\t\t<dd>";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "queueCount", array(), "method"), "html", null, true);
        echo "</dd>
\t</dl>
\t<h4>";
        // line 16
        echo twig_escape_filter($this->env, YiiTranslate("app", "queue status"), "html", null, true);
        echo "</h4>
\t<div>
\t";
        // line 18
        if ($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "queue"), "status")) {
            // line 19
            echo "\t<dl class=\"dl-horizontal\">
\t\t<dt>";
            // line 20
            echo twig_escape_filter($this->env, YiiTranslate("app", "running since"), "html", null, true);
            echo "</dt>
\t\t<dd id='last-login'>";
            // line 21
            if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "queue"), "status"), "started")) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "queue"), "status"), "started"), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, YiiTranslate("app", "(no information)"), "html", null, true);
            }
            echo "</dd>
\t\t<dt>";
            // line 22
            echo twig_escape_filter($this->env, YiiTranslate("app", "checked for jobs"), "html", null, true);
            echo "</dt>
\t\t<dd id=\"last-run\">";
            // line 23
            if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "queue"), "status"), "last_active")) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "queue"), "status"), "last_active"), "html", null, true);
            } else {
                echo " ";
                echo twig_escape_filter($this->env, YiiTranslate("app", "not running"), "html", null, true);
                echo " ";
            }
            echo "</dd>
\t\t<dt>";
            // line 24
            echo twig_escape_filter($this->env, YiiTranslate("app", "session id"), "html", null, true);
            echo "</dt>
\t\t<dd>";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "queue"), "status"), "session"), "html", null, true);
            echo "</dd>
\t\t<dt>";
            // line 26
            echo twig_escape_filter($this->env, YiiTranslate("app", "generating size"), "html", null, true);
            echo "</dt>\t\t\t
\t\t<dd>
\t\t\t";
            // line 28
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "queue"), "status"), "running"));
            foreach ($context['_seq'] as $context["_key"] => $context["art"]) {
                // line 29
                echo "\t\t\t<span id=\"id-popup-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["art"]) ? $context["art"] : null), "jobId"), "html", null, true);
                echo "\"
\t\t\t\t\t\tclass='cls-info' data-toggle=\"popover\" 
\t\t\t\t\t\tdata-html='true'
\t\t\t\t\t\tdata-placement='bottom'
\t\t\t\t\t\ttitle=\"";
                // line 33
                echo twig_escape_filter($this->env, YiiTranslate("app", "files info"), "html", null, true);
                echo "\" >
\t\t\tArtwork ";
                // line 34
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["art"]) ? $context["art"] : null), "id"), "html", null, true);
                echo " - <span id=\"id-size-text-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["art"]) ? $context["art"] : null), "jobId"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["art"]) ? $context["art"] : null), "sizeText"), "html", null, true);
                echo "</span>
\t\t\t(<span id=\"id-size-";
                // line 35
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["art"]) ? $context["art"] : null), "jobId"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["art"]) ? $context["art"] : null), "size"), "html", null, true);
                echo "</span> bytes)<br />
\t\t\t</span>
\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['art'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 38
            echo "\t\t</dd>
\t</dl>\t
\t <a id=\"btn-reset\" href=\"#\" class=\"btn btn-default\">";
            // line 40
            echo twig_escape_filter($this->env, YiiTranslate("app", "Reset process"), "html", null, true);
            echo "</a>\t
\t";
        } else {
            // line 42
            echo "\t\t";
            echo twig_escape_filter($this->env, YiiTranslate("app", "There is no queue status. Probably the user is not defined in the system."), "html", null, true);
            echo "
\t";
        }
        // line 44
        echo "\t</div>\t
\t<br />
\t<h4>";
        // line 46
        echo twig_escape_filter($this->env, YiiTranslate("app", "logging"), "html", null, true);
        echo "</h4>
\t<p>
\t\t<a href='";
        // line 48
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "job/downloadLog"), "method"), "html", null, true);
        echo "' class='btn btn-default'>";
        echo twig_escape_filter($this->env, YiiTranslate("app", "Download log"), "html", null, true);
        echo "</a>
\t</p>\t
\t\t
\t
";
    }

    // line 55
    public function block_onReady($context, array $blocks = array())
    {
        // line 56
        echo "\t\$('.cls-info').popover();
  \$('.menu-overview').addClass('active');
\t\$('#btn-reset').on('click', function() {
\t  if (confirm('";
        // line 59
        echo twig_escape_filter($this->env, YiiTranslate("app", "Are you sure you want to end this session and start an extra Resource Space queue?"), "html", null, true);
        echo "')) {
\t\t\twindow.location = \"";
        // line 60
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "job/restart"), "method"), "html", null, true);
        echo "\";
\t\t}
\t});
\twindow.setInterval(function() {
\t\t\$.getJSON('";
        // line 64
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "job/lastActive"), "method"), "html", null, true);
        echo "', function(data) {
\t\t\tif (data.active == null) {
\t\t\t  \$('#last-run').html('not running');
\t\t\t\t\$('#last-login').html('(no information)');
\t\t\t} else {
\t\t\t\tconsole.log(data);
\t\t\t\t\$('#last-run').html(data.active);
\t\t\t\t\$('#last-login').html(data.started);
\t\t\t\tif (data.running) {
\t\t\t\t\tfor (var i=0, cnt=data.running.length; i < cnt; i++) {
\t\t\t\t\t\tvar job = data.running[i];
\t\t\t\t\t\tconsole.log(job);
\t\t\t\t\t\t\$('#id-size-text-'+job.jobId).html(job.sizeText);
\t\t\t\t\t\t\$('#id-size-'+job.jobId).html(job.size);
\t\t\t\t\t\tif (job.files) {
\t\t\t\t\t\t\tvar html = '';
\t\t\t\t\t\t\tfor (l = 0, cnt2=job.files.length; l < cnt2; l++) {
\t\t\t\t\t\t\t\tvar file = job.files[l];
\t\t\t\t\t\t\t\thtml += file.filename + ' - Size: <b>' + file.size + '</b> bytes<br />';\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\$('#id-popup-'+job.jobId).attr('data-content', html);
\t\t\t\t\t\t}
\t\t\t\t\t\t
\t\t\t\t\t}
\t\t\t\t}
\t\t\t}
\t\t});
\t},1000);
\t";
        // line 92
        $this->displayParentBlock("onReady", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "/views/job/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  231 => 92,  200 => 64,  193 => 60,  189 => 59,  184 => 56,  181 => 55,  170 => 48,  165 => 46,  161 => 44,  155 => 42,  150 => 40,  146 => 38,  135 => 35,  127 => 34,  123 => 33,  115 => 29,  111 => 28,  106 => 26,  102 => 25,  98 => 24,  88 => 23,  84 => 22,  76 => 21,  72 => 20,  69 => 19,  67 => 18,  62 => 16,  57 => 14,  53 => 13,  49 => 12,  45 => 11,  42 => 10,  39 => 9,  35 => 8,  30 => 7,  27 => 6,);
    }
}
