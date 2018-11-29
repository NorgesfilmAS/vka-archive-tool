<?php

/* /views/art/uploadDialog.twig */
class __TwigTemplate_c84091f86d60bcd26077d9277930145e extends Twig_Template
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

    // line 9
    public function block_dialogHeader($context, array $blocks = array())
    {
        // line 10
        echo "\t";
        if ((isset($context["isMaster"]) ? $context["isMaster"] : null)) {
            // line 11
            echo "\t\t";
            if ($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "hasResource")) {
                // line 12
                echo "\t\t\t";
                echo twig_escape_filter($this->env, YiiTranslate("app", "Replace master file for "), "html", null, true);
                echo " \"";
                echo twig_escape_filter($this->env, twig_slice($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "title"), 0, 20), "html", null, true);
                echo "\"
\t\t";
            } else {
                // line 14
                echo "\t\t\t";
                echo twig_escape_filter($this->env, YiiTranslate("app", "Add master file to "), "html", null, true);
                echo " \"";
                echo twig_escape_filter($this->env, twig_slice($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "title"), 0, 20), "html", null, true);
                echo "\"
\t\t";
            }
            // line 16
            echo "  ";
        } else {
            // line 17
            echo "\t\t";
            echo twig_escape_filter($this->env, YiiTranslate("app", "Add new alternative file"), "html", null, true);
            echo "
\t";
        }
    }

    // line 21
    public function block_dialogBody($context, array $blocks = array())
    {
        // line 22
        echo "\t";
        if ($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "hasErrors", array(), "method")) {
            // line 23
            echo "\t<div class=\"row\">
\t\t<div class=\"col-sm-10 col-sm-offset-1 alert alert-danger\">\t\t\t
\t\t\t";
            // line 25
            echo $this->getAttribute((isset($context["html"]) ? $context["html"] : null), "errorSummary", array(0 => $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model")), "method");
            echo "
\t\t</div>
\t</div>
\t";
        }
        // line 28
        echo "\t
\t<div class=\"row\">\t
\t\t<div class=\"col-sm-10 col-sm-offset-1\">
\t\t\t<h5>";
        // line 31
        echo twig_escape_filter($this->env, YiiTranslate("app", "Uploading a file to the server:"), "html", null, true);
        echo "</h5>
\t\t\t<form id=\"form-upload\" method=\"POST\" action=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "art/upload", 1 => array("id" => $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "id"), "isMaster" => (isset($context["isMaster"]) ? $context["isMaster"] : null), "type" => "upload")), "method"), "html", null, true);
        echo "\" enctype = \"multipart/form-data\">\t\t
\t\t\t\t";
        // line 33
        echo $this->getAttribute((isset($context["html"]) ? $context["html"] : null), "activeFileField", array(0 => $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), 1 => "file"), "method");
        echo "<br>
\t\t\t\t<div class=\"upload-bar progress progress-striped active\"  >
\t\t\t\t\t<div  id=\"id-bar\" class=\"progress-bar\"  role=\"progressbar\" aria-valuenow=\"0\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 0%\">
\t\t\t\t\t\t<span class=\"sr-only\">0% Complete</span>
\t\t\t\t\t</div>
\t\t\t\t</div>\t\t\t\t
\t\t\t\t<button type=\"submit\" class=\"btn btn-primary\">";
        // line 39
        echo twig_escape_filter($this->env, YiiTranslate("app", "Upload the file"), "html", null, true);
        echo "</button>
\t\t\t</form>
\t\t</div>\t\t
\t</div>\t\t\t\t\t
\t";
        // line 43
        if ((twig_length_filter($this->env, (isset($context["fileList"]) ? $context["fileList"] : null)) > 0)) {
            echo "\t\t\t
\t<div class=\"row\">
\t\t<div class=\"col-sm-10 col-sm-offset-1\">
\t\t<hr />\t
\t\t<h3 style=\"text-align: center\">OR</h3>
\t\t<hr />
\t\t</div>
\t</div>\t
\t\t\t
\t<div class=\"row\">\t\t
\t\t<div class=\"col-sm-10 col-sm-offset-1\">
\t\t\t<h5>";
            // line 54
            echo twig_escape_filter($this->env, YiiTranslate("app", "Select a file from the file store:"), "html", null, true);
            echo "</h5>
\t\t\t<div style=\"height: 150px; overflow-y: scroll;\" class=\"pnek-filelist\">
\t\t\t\t<ul class=\"filelist\">
\t\t\t\t";
            // line 57
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["fileList"]) ? $context["fileList"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["file"]) {
                // line 58
                echo "\t\t\t\t\t<li data-file=\"";
                echo twig_escape_filter($this->env, (isset($context["file"]) ? $context["file"] : null), "html", null, true);
                echo "\" class=\"file-select\">";
                echo twig_escape_filter($this->env, (isset($context["file"]) ? $context["file"] : null), "html", null, true);
                echo "</li>\t
\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['file'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 59
            echo "\t
\t\t\t\t</ul>\t\t
\t\t\t</div>
\t\t</div>
\t</div>
\t<div class=\"row\">\t\t
\t\t<div class=\"col-sm-10 col-sm-offset-1\">
\t\t\t<form id=\"form-select\" method=\"POST\" action=\"";
            // line 66
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "art/upload", 1 => array("id" => $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "id"), "isMaster" => (isset($context["isMaster"]) ? $context["isMaster"] : null), "type" => "select")), "method"), "html", null, true);
            echo "\" enctype = \"multipart/form-data\">\t\t
\t\t\t\t<div id=\"id-showFilename\" class=\"pnek-file-selected\"></div>
\t\t\t\t<input type=\"hidden\" id=\"id-selectFilename\" name=\"Art[selectFilename]\" value=\"\">
\t\t\t\t<button type=\"submit\" class=\"btn btn-primary\">Use this file</button><br>
\t\t\t</form>\t\t\t
\t\t</div>
\t</div>\t\t
\t";
        }
        // line 74
        echo "
";
    }

    // line 77
    public function block_dialogFooter($context, array $blocks = array())
    {
        // line 78
        echo "\t<button type=\"button\" class=\"btn btn-default btn-close action-close\" data-dismiss=\"modal\">";
        echo twig_escape_filter($this->env, YiiTranslate("button", "btn-cancel"), "html", null, true);
        echo "</button>
";
    }

    // line 81
    public function block_onReady($context, array $blocks = array())
    {
        // line 82
        echo "\tvar bar = \$('#id-bar');
\t\$('.upload-bar').hide();
\t
\t";
        // line 85
        $context["confirm"] = (($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "hasResource")) ? ((("if (!confirm('" . YiiTranslate("app", "There is already a master file. Do you want to replace the existing file?")) . "')) return false")) : (""));
        // line 86
        echo "\t";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "registerPackage", array(0 => "ajaxForm", 1 => array("isAjax" => true, "executeAfterLoad" => (((("
\t\t
\t\tvar optionsUpload = {
\t\t\ttarget : '#id-modal-body',
\t\t\tsuccess : processResponse,
\t\t\tbeforeSend : beforeSend,
\t\t\tuploadProgress : uploadProgress,
\t\t\tbeforeSubmit : showWaitConfirm
\t\t};
\t\t\$('#form-upload').ajaxForm(optionsUpload);\t\t

\t\tvar optionsSelect = {
\t\t\ttarget : '#id-modal-body',
\t\t\tsuccess : processResponse,
\t\t\tbeforeSubmit : showWait
\t\t};

\t\t\$('#form-select').ajaxForm(optionsSelect);\t\t\t

\t\tfunction showWaitConfirm()
\t\t{
\t\t\t" . (isset($context["confirm"]) ? $context["confirm"] : null)) . "
\t\t}
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
      bar.width(pVal);     
    }
\t\tfunction processResponse(responseText, statusText, xhr, \$form) 
\t\t{
\t\t\tif (responseText == 'ok') {/* ok: load information in a div */
\t\t\t\talert('did not expect to get an ok');
\t\t\t} else\tif (responseText == 'url') {/* ok, but open an other page */
\t\t\t\t\$('#id-modal-body').html('');
\t\t\t\twindow.location = '") . $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => "art/files", 1 => array("id" => $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "id"), "refresh" => $this->getAttribute((isset($context["util"]) ? $context["util"] : null), "unique", array(), "method"))), "method")) . "';
\t\t\t}\telse {
\t\t\t\t\$('#id-modal-body').html(responseText);
\t\t\t}
\t\t};\t
\t"))), "method"), "html", null, true);
        // line 136
        echo "
\tfunction showWait(arr, \$form, options) {
\t\t";
        // line 138
        echo (isset($context["confirm"]) ? $context["confirm"] : null);
        echo "
\t\t\$('.wait-message').text(\"";
        // line 139
        echo twig_escape_filter($this->env, YiiTranslate("app", "Processing file with ResourceSpace"), "html", null, true);
        echo "\");
\t\t\$('#id-modal-body').html(\$('#id-wait-message').html());
\t}
\t
\t\$('.action-close').on('click', function() {
\t\t\$('#id-modal').modal('hide');
\t});
\t
\t\$('#btn-create').on('click', function() {\t\t
\t\t\$('#id-form').submit();  
\t});\t
\t\$('.file-select').on('click', function() {
\t\t\$('.file-select').removeClass('active');
\t  \$('#id-showFilename').text(\$(this).data('file'));
\t\t\$(this).addClass('active');
\t\t\$('#id-selectFilename').val(\$(this).data('file'));
\t});
\t
\t
\t
\t";
        // line 159
        echo twig_escape_filter($this->env, (isset($context["parent"]) ? $context["parent"] : null), "html", null, true);
        echo "
";
    }

    public function getTemplateName()
    {
        return "/views/art/uploadDialog.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  275 => 159,  252 => 139,  248 => 138,  244 => 136,  191 => 86,  189 => 85,  184 => 82,  181 => 81,  174 => 78,  171 => 77,  166 => 74,  155 => 66,  146 => 59,  135 => 58,  131 => 57,  125 => 54,  111 => 43,  104 => 39,  95 => 33,  91 => 32,  87 => 31,  82 => 28,  75 => 25,  71 => 23,  68 => 22,  65 => 21,  57 => 17,  54 => 16,  46 => 14,  38 => 12,  35 => 11,  32 => 10,  29 => 9,);
    }
}
