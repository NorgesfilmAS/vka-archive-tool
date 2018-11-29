<?php

/* /views/layouts/alternativeFiles.twig */
class __TwigTemplate_7e96806a60181d8b2e1b495c4f4542b4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'dialogHeader' => array($this, 'block_dialogHeader'),
            'dialogBody' => array($this, 'block_dialogBody'),
            'dialogFooter' => array($this, 'block_dialogFooter'),
            'onReady' => array($this, 'block_onReady'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "dialog"), "method"));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 12
    public function block_dialogHeader($context, array $blocks = array())
    {
        echo "\t
\t";
        // line 13
        if ($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "isNewRecord")) {
            // line 14
            echo "\t\t <h4>";
            echo twig_escape_filter($this->env, YiiTranslate("app", "Add alternative file to"), "html", null, true);
            echo "</h4>
\t\t ";
            // line 15
            echo twig_escape_filter($this->env, twig_slice($this->env, (isset($context["caption"]) ? $context["caption"] : null), 0, 60), "html", null, true);
            echo "
\t";
        } else {
            // line 17
            echo "\t\t<h4>";
            echo twig_escape_filter($this->env, YiiTranslate("app", "Upload alternative "), "html", null, true);
            echo "</h4>
\t\t";
            // line 18
            echo twig_escape_filter($this->env, twig_slice($this->env, (isset($context["caption"]) ? $context["caption"] : null), 0, 20), "html", null, true);
            echo "
\t";
        }
        // line 19
        echo "  
";
    }

    // line 22
    public function block_dialogBody($context, array $blocks = array())
    {
        // line 23
        echo "\t";
        if ($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "hasErrors", array(), "method")) {
            // line 24
            echo "\t<div class=\"row\">
\t\t<div class=\"col-lg-10 col-lg-offset-1 alert alert-danger\">\t\t\t
\t\t\t";
            // line 26
            echo $this->getAttribute((isset($context["html"]) ? $context["html"] : null), "errorSummary", array(0 => $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model")), "method");
            echo "
\t\t</div>
\t</div>
\t";
        }
        // line 29
        echo "\t
\t\t
\t<form id=\"id-form\" method=\"POST\" 
\t\t\t\taction=\"";
        // line 32
        if ($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "isNewRecord")) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => ((isset($context["baseClass"]) ? $context["baseClass"] : null) . "/alternative"), 1 => array("id" => $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "resource"), "isMaster" => 1)), "method"), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => ((isset($context["baseClass"]) ? $context["baseClass"] : null) . "/alternative"), 1 => array("id" => $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "id"), "isMaster" => 0)), "method"), "html", null, true);
        }
        echo "\" enctype = \"multipart/form-data\">\t\t
\t\t<div class=\"row\">\t
\t\t\t<div class=\"col-lg-10 col-offset-1\">
\t\t\t\t<h5>";
        // line 35
        echo twig_escape_filter($this->env, YiiTranslate("app", "Uploading a file"), "html", null, true);
        echo "</h5>
\t\t\t\t";
        // line 36
        echo $this->getAttribute((isset($context["html"]) ? $context["html"] : null), "activeFileField", array(0 => $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), 1 => "file"), "method");
        echo "<br>
\t\t\t\t<div class=\"upload-bar progress progress-striped active\"  >
\t\t\t\t\t<div  id=\"id-bar\" class=\"progress-bar\"  role=\"progressbar\" aria-valuenow=\"0\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 0%\">
\t\t\t\t\t\t<span class=\"sr-only\">";
        // line 39
        echo twig_escape_filter($this->env, YiiTranslate("app", "0% Complete"), "html", null, true);
        echo "</span>
\t\t\t\t\t</div>
\t\t\t\t</div>\t\t\t\t
\t\t\t\t
\t\t\t</div>\t\t
\t\t</div>\t\t\t\t\t
\t\t";
        // line 45
        if ((twig_length_filter($this->env, (isset($context["fileList"]) ? $context["fileList"] : null)) > 0)) {
            echo "\t\t\t
\t\t<div class=\"row\">
\t\t\t<div class=\"col-lg-10 col-offset-1\">
\t\t\t\t<h5 class=\"text-center\">";
            // line 48
            echo twig_escape_filter($this->env, YiiTranslate("app", "OR"), "html", null, true);
            echo "</h5>
\t\t\t</div>
\t\t</div>\t
\t\t<div class=\"row\">\t\t
\t\t\t<div class=\"col-lg-10 col-offset-1\">
\t\t\t\t<h5>";
            // line 53
            echo twig_escape_filter($this->env, YiiTranslate("Select a file from the file store:"), "html", null, true);
            echo "</h5>
\t\t\t\t<div style=\"height: 130px; overflow-y: scroll;\" class=\"pnek-filelist\">
\t\t\t\t\t<ul class=\"filelist\">
\t\t\t\t\t";
            // line 56
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["fileList"]) ? $context["fileList"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["file"]) {
                // line 57
                echo "\t\t\t\t\t\t<li data-file=\"";
                echo twig_escape_filter($this->env, (isset($context["file"]) ? $context["file"] : null), "html", null, true);
                echo "\" class=\"file-select\">";
                echo twig_escape_filter($this->env, (isset($context["file"]) ? $context["file"] : null), "html", null, true);
                echo "</li>\t
\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['file'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 58
            echo "\t
\t\t\t\t\t</ul>\t\t
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t";
        }
        // line 63
        echo "\t
\t\t<div class=\"row\">\t\t
\t\t\t<div class=\"col-lg-10 col-offset-1\">
\t\t\t\t<div id=\"id-showFilename\" class=\"pnek-file-selected\"></div>
\t\t\t\t<input type=\"hidden\" id=\"id-selectFilename\" name=\"ResourceAltFiles[selectFilename]\" value=\"\">
\t\t\t</div>
\t\t</div>\t\t
\t\t<div class=\"form-group\">
\t\t\t<label class=\"control-label\" for=\"id-name\">";
        // line 71
        echo twig_escape_filter($this->env, YiiTranslate("app", "Name"), "html", null, true);
        echo "</label><br/>
\t\t\t<input id=\"id-name\" class=\"input-xlarge form-control\" type=\"text\" maxlength=\"100\" value=\"";
        // line 72
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "name"), "html", null, true);
        echo "\" name=\"ResourceAltFiles[name]\">
\t\t</div>\t\t\t
\t\t<div class=\"form-group\">
\t\t\t<label class=\"control-label\" for=\"id-folder\">";
        // line 75
        echo twig_escape_filter($this->env, YiiTranslate("app", "Folder"), "html", null, true);
        echo "</label><br/>
\t\t\t<select id=\"id-folder\" class=\"input-xlarge form-control\" name=\"ResourceAltFiles[folder]\">
\t\t\t\t";
        // line 77
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "folderOptions"));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 78
            echo "\t\t\t\t\t<option value=\"";
            echo twig_escape_filter($this->env, (isset($context["item"]) ? $context["item"] : null), "html", null, true);
            echo "\"";
            if (($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "folder") == (isset($context["item"]) ? $context["item"] : null))) {
                echo " SELECTED=\"1\"";
            }
            echo ">";
            echo twig_escape_filter($this->env, (isset($context["item"]) ? $context["item"] : null), "html", null, true);
            echo "</option>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 80
        echo "\t\t\t</select>\t
\t\t</div>\t\t\t
\t\t
\t\t<div class=\"form-group\">
\t\t\t<label class=\"control-label\" for=\"id-description\">";
        // line 84
        echo twig_escape_filter($this->env, YiiTranslate("app", "Description"), "html", null, true);
        echo "</label><br />
\t\t\t<textarea id=\"id-description\" class=\"input-xlarge form-control\" rows=\"1\" name=\"ResourceAltFiles[description]\" style=\"overflow: hidden; height: 40px;\">";
        // line 85
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "description"), "html", null, true);
        echo "</textarea>\t\t\t\t\t\t
\t\t</div>\t
\t\t";
        // line 87
        if ($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "isNewRecord")) {
            // line 88
            echo "\t\t<div class=\"form-group\">
\t\t\t<label>
\t\t\t\t<input id=\"id-sendmail\" name=\"ResourceAltFiles[send_mail]\" type=\"checkbox\" value=\"1\"/>
\t\t\t\t";
            // line 91
            echo twig_escape_filter($this->env, YiiTranslate("app", "Send me an email when processing has been done"), "html", null, true);
            echo ".
\t\t\t</label>
\t\t</div>\t\t\t
\t\t";
        }
        // line 95
        echo "\t</form>\t\t\t\t\t\t
\t\t
";
    }

    // line 99
    public function block_dialogFooter($context, array $blocks = array())
    {
        // line 100
        echo "\t<button id=\"btn-close\" type=\"button\" class=\"btn btn-default action-close\" data-dismiss=\"modal\">";
        echo twig_escape_filter($this->env, YiiTranslate("button", "btn-cancel"), "html", null, true);
        echo "</button>
\t<button id=\"btn-submit\" type=\"submit\" class=\"btn btn-primary\">";
        // line 101
        if ($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "isNewRecord")) {
            echo twig_escape_filter($this->env, YiiTranslate("button", "btn-create"), "html", null, true);
        } else {
            echo " ";
            echo twig_escape_filter($this->env, YiiTranslate("button", "btn-save"), "html", null, true);
        }
        echo "</button><br>\t\t
";
    }

    // line 104
    public function block_onReady($context, array $blocks = array())
    {
        // line 105
        echo "
\t";
        // line 106
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "packageScripts", array(0 => "elastic"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["script"]) {
            // line 107
            echo "\t\t\$.getScript(\"";
            echo twig_escape_filter($this->env, (isset($context["script"]) ? $context["script"] : null), "html", null, true);
            echo "\", function(data, textState) {
\t\t\t\$(\"textarea\").elastic();
\t\t});
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['script'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 111
        echo "\t\t
\tvar bar = \$('#id-bar');
\t\$('.upload-bar').hide();

\t";
        // line 115
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "registerPackage", array(0 => "ajaxForm", 1 => array("isAjax" => true, "executeAfterLoad" => (("\t\t
\t\tvar options = {
\t\t\ttarget : '#id-modal-body',
\t\t\tsuccess : processResponse,
\t\t\tbeforeSend : beforeSend,
\t\t\tuploadProgress : uploadProgress,
\t\t\t// beforeSubmit : showWait
\t\t};
\t\t\$('#id-form').ajaxForm(options);\t\t

\t\t
\t\tfunction beforeSend()
\t\t{ \t
\t\t\tbar.width('0%');     
\t\t\t\$('.upload-bar').show();
\t\t}
\t\tfunction afterSend()
\t\t{\t
\t\t\t// queue for ResourceSpace
\t\t\t// showWait();
\t\t}
\t\tfunction uploadProgress(event, position, total, percentComplete) 
\t\t{
      var pVal = percentComplete + '%';
\t\t\t// console.log(pVal);
      \$('#id-bar').width(pVal);     
    }
\t\tfunction processResponse(responseText, statusText, xhr, \$form) 
\t\t{
\t\t\tif (responseText == 'ok') {/* ok: load information in a div */
\t\t\t\talert('did not expect to get an ok');
\t\t\t} else\tif (responseText == 'url') {/* ok, but open an other page */
\t\t\t\t\$('#id-modal-body').html('');
\t\t\t\twindow.location = '" . $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => ((isset($context["baseClass"]) ? $context["baseClass"] : null) . "/files"), 1 => array("id" => $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "resource"))), "method")) . "';
\t\t\t}\telse {
\t\t\t\t\$('#id-modal-body').html(responseText);
\t\t\t}
\t\t};\t
\t"))), "method"), "html", null, true);
        // line 153
        echo "

\t\t
";
        // line 185
        echo "\t
\t\$('#btn-submit').on('click', function() {\t\t
\t\t\$('#id-form').submit();  
\t});\t
\t
\t\$('.file-select').on('click', function() {
\t\t\$('.file-select').removeClass('active');
\t  \$('#id-showFilename').text(\$(this).data('file'));
\t\t\$(this).addClass('active');
\t\t\$('#id-selectFilename').val(\$(this).data('file'));
\t});
";
    }

    public function getTemplateName()
    {
        return "/views/layouts/alternativeFiles.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  325 => 185,  320 => 153,  280 => 115,  274 => 111,  263 => 107,  259 => 106,  256 => 105,  253 => 104,  242 => 101,  237 => 100,  234 => 99,  228 => 95,  221 => 91,  216 => 88,  214 => 87,  209 => 85,  205 => 84,  199 => 80,  184 => 78,  180 => 77,  175 => 75,  169 => 72,  165 => 71,  155 => 63,  147 => 58,  136 => 57,  132 => 56,  126 => 53,  118 => 48,  112 => 45,  103 => 39,  97 => 36,  93 => 35,  83 => 32,  78 => 29,  71 => 26,  67 => 24,  64 => 23,  61 => 22,  56 => 19,  51 => 18,  46 => 17,  41 => 15,  36 => 14,  34 => 13,  29 => 12,);
    }
}
