<?php

/* /vendors/toxus/views/mail/requestPassword.twig */
class __TwigTemplate_3bb3ee23e89cc0dd11345a537409a6c1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'toUser' => array($this, 'block_toUser'),
            'subject' => array($this, 'block_subject'),
            'body' => array($this, 'block_body'),
            'html' => array($this, 'block_html'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "mail"), "method"));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 6
    public function block_toUser($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "email"), "html", null, true);
    }

    // line 8
    public function block_subject($context, array $blocks = array())
    {
        echo "Password request for ";
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "config", array(), "any", false, true), "value", array(0 => "meta.productName"), "method", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "config", array(), "any", false, true), "value", array(0 => "meta.productName"), "method"), "meta.productName")) : ("meta.productName")), "html", null, true);
    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        // line 11
        echo "\t";
        echo twig_escape_filter($this->env, YiiTranslate("mail", "Hey {username}", array("{username}" => (($this->getAttribute((isset($context["model"]) ? $context["model"] : null), "username", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["model"]) ? $context["model"] : null), "username"), $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "email"))) : ($this->getAttribute((isset($context["model"]) ? $context["model"] : null), "email"))))), "html", null, true);
        echo "

  ";
        // line 13
        echo twig_escape_filter($this->env, YiiTranslate("mail", "We've recieved a request for a new password. You can change your password by clicking on the button below."), "html", null, true);
        echo "

\t";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["App"]) ? $context["App"] : null), "createAbsoluteUrl", array(0 => $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "autoLoginUrl"), 1 => array("k" => $this->getAttribute((isset($context["model"]) ? $context["model"] : null), (isset($context["keyFieldname"]) ? $context["keyFieldname"] : null), array(), "array"))), "method"), "html", null, true);
        echo "
\t
\t";
        // line 17
        echo twig_escape_filter($this->env, YiiTranslate("mail", "If you didn't request your password, just delete this email and everything will go back to the way it was."), "html", null, true);
        echo "\t
\t
\t";
        // line 19
        echo twig_escape_filter($this->env, YiiTranslate("mail", "Best regards"), "html", null, true);
        echo "

\t";
        // line 21
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "config", array(), "any", false, true), "value", array(0 => "meta.productName"), "method", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "config", array(), "any", false, true), "value", array(0 => "meta.productName"), "method"), "meta.productName")) : ("meta.productName")), "html", null, true);
        echo "

";
    }

    // line 25
    public function block_html($context, array $blocks = array())
    {
        // line 26
        echo "  <body style=\"min-width: 100%;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;margin: 0;padding: 0;font-family: arial, Verdana, Geneva, sans-serif;width: 100% !important;\">
    <table class=\"body\" style=\"width: 600px;padding: 0;margin: 0;margin-left: auto;margin-right: auto;background-color: #e9e9e9;height: 100% !important;\">
      <tr>
        <td class=\"table-margin\" style=\"border: none;width: 50px;\"></td>
        <td class=\"table-body\" style=\"border: none;\">
          <table class=\"content\" style=\"width: 450px;margin-left: auto;margin-right: auto;margin-top: 40px;margin-bottom: 40px;background-color: #ffffff;\">
            <tr class=\"header\" style=\"background-color: #2ba6cb;text-align: center;padding-top: 15px;font-size: 20px;font-weight: bold;\">
              <td colspan=\"3\" style=\"border: none;padding-top: 15px;padding-bottom: 15px;color: white;\">";
        // line 33
        echo (($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "config", array(), "any", false, true), "value", array(0 => "mail.header"), "method", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "config", array(), "any", false, true), "value", array(0 => "mail.header"), "method"), "mail.header")) : ("mail.header"));
        echo "</td>
            </tr>
            <tr class=\"body\">
              <td class=\"text-margin\" style=\"border: none;width: 50px;\"></td>
              <td class=\"content\" style=\"border: none;\">
                <div class=\"header\" style=\"padding-top: 15px;font-size: 20px;font-weight: bold;\">";
        // line 38
        echo twig_escape_filter($this->env, YiiTranslate("mail", "Hey {username}", array("{username}" => (($this->getAttribute((isset($context["model"]) ? $context["model"] : null), "username", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["model"]) ? $context["model"] : null), "username"), $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "email"))) : ($this->getAttribute((isset($context["model"]) ? $context["model"] : null), "email"))))), "html", null, true);
        echo ",</div>
                <p>
                  ";
        // line 40
        echo twig_escape_filter($this->env, YiiTranslate("mail", "We've recieved a request for a new password. You can change your password by clicking on the button below."), "html", null, true);
        echo "
                </p>
                <p style=\"margin-top: 30px; margin-bottom: 30px;\"><a href=\"";
        // line 42
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["App"]) ? $context["App"] : null), "createAbsoluteUrl", array(0 => $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "autoLoginUrl"), 1 => array("k" => $this->getAttribute((isset($context["model"]) ? $context["model"] : null), (isset($context["keyFieldname"]) ? $context["keyFieldname"] : null), array(), "array"))), "method"), "html", null, true);
        echo "\" style=\"text-decoration: none;color: white;\"><span class=\"button\" style=\"background-color: #37A637;border-bottom-color: #457a1a;border-radius: 5px;padding: 10px 20px 10px 10px;text-align: center;width: 200px;\">";
        echo twig_escape_filter($this->env, YiiTranslate("mail", "New password"), "html", null, true);
        echo "</span></a></p>
                <p>";
        // line 43
        echo twig_escape_filter($this->env, YiiTranslate("mail", "If you didn't request your password, just delete this email and everything will go back to the way it was."), "html", null, true);
        echo "\t</p>
                <p>&nbsp;</p>
              </td>
              <td class=\"text-margin\" style=\"border: none;width: 50px;\"></td>
            </tr>
            <tr class=\"footer\" style=\"background-color: #2ba6cb;text-align: center;\">
              <td colspan=\"3\" style=\"border: none;padding-top: 15px;padding-bottom: 15px;color: white;\">";
        // line 49
        echo (($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "config", array(), "any", false, true), "value", array(0 => "mail.footer"), "method", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "config", array(), "any", false, true), "value", array(0 => "mail.footer"), "method"), "mail.footer")) : ("mail.footer"));
        echo "</td>
            </tr>
          </table>
        </td>
        <td class=\"table-margin\" style=\"border: none;width: 50px;\"></td>
      </tr>
    </table>
  </body>
";
    }

    public function getTemplateName()
    {
        return "/vendors/toxus/views/mail/requestPassword.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 49,  114 => 43,  108 => 42,  103 => 40,  98 => 38,  90 => 33,  81 => 26,  78 => 25,  71 => 21,  66 => 19,  61 => 17,  56 => 15,  51 => 13,  45 => 11,  42 => 10,  35 => 8,  29 => 6,);
    }
}
