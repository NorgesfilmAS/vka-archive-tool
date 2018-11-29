<?php

/* /views/transfer/form.twig */
class __TwigTemplate_be0f32b14f4af626ca7596928b94daaa extends Twig_Template
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
        return $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "dialog"), "method"));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 16
    public function block_content($context, array $blocks = array())
    {
        // line 17
        echo "<form id=\"id-transfer\" method=\"POST\" accept-charset=\"UTF-8\" action=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["App"]) ? $context["App"] : null), "createUrl", array(0 => "transfer/listFiles", 1 => array("id" => $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "id"))), "method"), "html", null, true);
        echo "\" >
  <fieldset>
    <div class=\"modal-header\">
      <button class=\"close action-close\" aria-hidden=\"true\" data-dismiss=\"modal\" type=\"button\">×</button>
      <h3>Transfer files by email</h3>
    </div>
    <div class=\"modal-body\">
      ";
        // line 24
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "flash"), "method"));
        $template->display($context);
        // line 25
        echo "      ";
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "_error"), "method"));
        $template->display($context);
        // line 26
        echo "      
      <div class=\"form-group\">
        <label class=\"control-label col-lg-2 no-right-padding\" 
               for=\"id-send-to\">";
        // line 29
        echo twig_escape_filter($this->env, YiiTranslate("app", "Send to"), "html", null, true);
        echo "</label><br/>

          <input id=\"id-sendTo\"
                 class=\"input-xlarge form-control\"
                 type=\"text\" 
                 name=\"Transfer[sendTo]\",
                 value=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["transfer"]) ? $context["transfer"] : null), "sendTo"), "html", null, true);
        echo "\">           
      </div>     

      <div class=\"form-group\">
        <label class=\"control-label col-lg-2 no-right-padding\" 
               for=\"id-message\">";
        // line 40
        echo twig_escape_filter($this->env, YiiTranslate("app", "Message"), "html", null, true);
        echo "</label><br />
        <textarea id=\"id-message\" 
                  class=\"input-xlarge form-control\" 
                  rows=\"5\" 
                  name=\"Transfer[message]\" 
                  style=\"overflow: hidden; height: 102px;\">";
        // line 45
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["transfer"]) ? $context["transfer"] : null), "message"), "html", null, true);
        echo "</textarea>
      </div>     

      <div class=\"\">
        <label class=\"control-label col-lg-10 no-right-padding\" 
               for=\"id-message\">";
        // line 50
        echo twig_escape_filter($this->env, YiiTranslate("app", "What to send"), "html", null, true);
        echo "</label><br />
        <div class=\"row\">  
          <div class=\"col-xs-7 col-xs-offset-1\"><b>";
        // line 52
        echo twig_escape_filter($this->env, YiiTranslate("app", "Preview in player"), "html", null, true);
        echo "</b></div>
          <div class=\"col-xs-3\"><b>";
        // line 53
        echo twig_escape_filter($this->env, YiiTranslate("app", "View"), "html", null, true);
        echo "</b></div>
        </div>
        <div class=\"row\">  
          <div class=\"col-xs-6 col-xs-offset-2\">
            ";
        // line 57
        echo twig_escape_filter($this->env, YiiTranslate("app", "Low Quality"), "html", null, true);
        echo "            
          </div>  
          <div class=\"col-xs-3\">
            <input type=\"hidden\" 
                  value=\"0\" 
                  name=\"Transfer[view_lq]\">
            <input type=\"checkbox\" 
                  value=\"lq\"                    
                  ";
        // line 65
        if ($this->getAttribute((isset($context["transfer"]) ? $context["transfer"] : null), "fileChecked", array(0 => "view", 1 => "lq"), "method")) {
            echo "checked";
        }
        // line 66
        echo "                  name=\"Transfer[view_lq]\">
          </div>
        </div>    
        
        <div class=\"row\">  
          <div class=\"col-xs-6 col-xs-offset-2\">
            ";
        // line 72
        echo twig_escape_filter($this->env, YiiTranslate("app", "High Quality"), "html", null, true);
        echo "            
          </div>  
          <div class=\"col-xs-3\">
            <input type=\"hidden\" 
                  value=\"0\" 
                  name=\"Transfer[view_hq]\">
            <input type=\"checkbox\" 
                  value=\"hq\"                    
                  ";
        // line 80
        if ($this->getAttribute((isset($context["transfer"]) ? $context["transfer"] : null), "fileChecked", array(0 => "view", 1 => "hq"), "method")) {
            echo "checked";
        }
        // line 81
        echo "                  name=\"Transfer[view_hq]\">
          </div>
        </div>    

        
        <div class=\"row\">  
          <br/>
          <div class=\"col-xs-7 col-xs-offset-1\"><b>";
        // line 88
        echo twig_escape_filter($this->env, YiiTranslate("app", "Art file for downloading"), "html", null, true);
        echo "</b></div>
          <div class=\"col-xs-3\"><b>";
        // line 89
        echo twig_escape_filter($this->env, YiiTranslate("app", "Download"), "html", null, true);
        echo "</b></div>
        </div>
";
        // line 91
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["transfer"]) ? $context["transfer"] : null), "masterTypes"));
        foreach ($context['_seq'] as $context["key"] => $context["value"]) {
            // line 92
            echo "        <div class=\"row\">  
          <div class=\"col-xs-6 col-xs-offset-2\">
            ";
            // line 94
            echo twig_escape_filter($this->env, YiiTranslate("app", (isset($context["value"]) ? $context["value"] : null)), "html", null, true);
            echo "            
          </div>  
          <div class=\"col-xs-3\">
            <input type=\"hidden\" 
                  value=\"0\" 
                  name=\"Transfer[down_";
            // line 99
            echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
            echo "]\">
            <input type=\"checkbox\" 
                  value=\"";
            // line 101
            echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
            echo "\"                    
                  ";
            // line 102
            if ($this->getAttribute((isset($context["transfer"]) ? $context["transfer"] : null), "fileChecked", array(0 => "download", 1 => (isset($context["key"]) ? $context["key"] : null)), "method")) {
                echo "checked";
            }
            // line 103
            echo "                  name=\"Transfer[down_";
            echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
            echo "]\">
          </div>       
        </div>    
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 107
        echo "       <div class=\"row\">  <br/>
          <div class=\"col-xs-7 col-xs-offset-1\"><b>";
        // line 108
        echo twig_escape_filter($this->env, YiiTranslate("app", "Alternate files"), "html", null, true);
        echo "</b></div>
          <div class=\"col-xs-3\"><b>";
        // line 109
        echo twig_escape_filter($this->env, YiiTranslate("app", "Download"), "html", null, true);
        echo "</b></div>
        </div> 
      </div> 
";
        // line 112
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["model"]) ? $context["model"] : null), "altFiles"));
        foreach ($context['_seq'] as $context["_key"] => $context["file"]) {
            // line 113
            echo "      <div class=\"row\">  
        <div class=\"col-xs-6 col-xs-offset-2\">
          ";
            // line 115
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "name"), "html", null, true);
            echo "
        </div>  
        <div class=\"col-xs-3\">
          <input type=\"hidden\" 
                value=\"0\" 
                name=\"Transfer[altr_";
            // line 120
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "id"), "html", null, true);
            echo "]\">
          <input type=\"checkbox\" 
                value=\"";
            // line 122
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "id"), "html", null, true);
            echo "\"   
                ";
            // line 123
            if ($this->getAttribute((isset($context["transfer"]) ? $context["transfer"] : null), "fileChecked", array(0 => "alternative", 1 => "lq"), "method")) {
                echo "checked";
            }
            // line 124
            echo "                name=\"Transfer[altr_";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "id"), "html", null, true);
            echo "]\">
        </div>      
      </div>          
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['file'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 128
        echo "        
    </div>
    <div class=\"modal-footer\">
      <input type=\"submit\" class=\"btn btn-default\" value=\"Send\">
      <button  class=\"btn  btn-close action-close\" data-dismiss=\"modal\" type=\"button\">Cancel</button>
    </div>
  </fieldset>
</form>
";
    }

    // line 138
    public function block_onReady($context, array $blocks = array())
    {
        // line 139
        echo "
\t";
        // line 140
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "registerPackage", array(0 => "ajaxForm", 1 => array("isAjax" => true, "executeAfterLoad" => (("\tvar options = {
\t\ttarget : '#id-modal-body',
\t\tsuccess : processResponse
\t};
console.log('loaded');
\t\$('#id-transfer').ajaxForm(options);\t\t
\tfunction processResponse(responseText, statusText, xhr, \$form) {
    if (responseText == 'url') {
      window.location = '" . $this->getAttribute((isset($context["App"]) ? $context["App"] : null), "createUrl", array(0 => "art/files", 1 => array("id" => $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "id"))), "method")) . "';
    }\telse {
      \$('#id-modal-body').html(responseText);
    }
  };
"))), "method"), "html", null, true);
        // line 154
        echo "

";
    }

    public function getTemplateName()
    {
        return "/views/transfer/form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  284 => 154,  269 => 140,  266 => 139,  263 => 138,  251 => 128,  240 => 124,  236 => 123,  232 => 122,  227 => 120,  219 => 115,  215 => 113,  211 => 112,  205 => 109,  201 => 108,  198 => 107,  187 => 103,  183 => 102,  179 => 101,  174 => 99,  166 => 94,  162 => 92,  158 => 91,  153 => 89,  149 => 88,  140 => 81,  136 => 80,  125 => 72,  117 => 66,  113 => 65,  102 => 57,  95 => 53,  91 => 52,  86 => 50,  78 => 45,  70 => 40,  62 => 35,  53 => 29,  48 => 26,  44 => 25,  41 => 24,  30 => 17,  27 => 16,);
    }
}
