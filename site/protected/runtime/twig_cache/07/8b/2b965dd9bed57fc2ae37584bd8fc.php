<?php

/* /views/mail/transfer.twig */
class __TwigTemplate_078b2b965dd9bed57fc2ae37584bd8fc extends Twig_Template
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

    // line 7
    public function block_toUser($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["definition"]) ? $context["definition"] : null), "email"), "html", null, true);
    }

    // line 9
    public function block_subject($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "config"), "value", array(0 => "transfer.mail_subject"), "method"), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["model"]) ? $context["model"] : null), "art"), "title"), "html", null, true);
        echo " by ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["model"]) ? $context["model"] : null), "art"), "artistNames"), "html", null, true);
    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        // line 12
        echo "\t";
        echo twig_escape_filter($this->env, YiiTranslate("mail", "Hi {username}", array("{username}" => $this->getAttribute((isset($context["definition"]) ? $context["definition"] : null), "email"))), "html", null, true);
        echo "

  ";
        // line 14
        echo twig_escape_filter($this->env, YiiTranslate("mail", "{username} has send you a information about \"{title}\"", array("{username}" => $this->getAttribute($this->getAttribute((isset($context["model"]) ? $context["model"] : null), "sender"), "fullname"), "{title}" => $this->getAttribute($this->getAttribute((isset($context["model"]) ? $context["model"] : null), "art"), "title"))), "html", null, true);
        echo "
  
  ";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "message"), "html", null, true);
        echo "
  
  You can open the files by click on the link below:
\t";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["App"]) ? $context["App"] : null), "createAbsoluteUrl", array(0 => "transfer/index", 1 => $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "generateUrlKey", array(0 => (isset($context["definition"]) ? $context["definition"] : null)), "method")), "method"), "html", null, true);
        echo "
\t
\t
\t";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "config"), "value", array(0 => "transfer.mail_footer"), "method"), "html", null, true);
        echo "

";
    }

    // line 26
    public function block_html($context, array $blocks = array())
    {
        // line 27
        echo "<div class=\"mail-body\" style=\"padding-top: 30px;width: 100%;\">
  <div class=\"content\" style=\"width: 400px;margin: 0 auto;font-family: Arial,Helvetica Neue,Helvetica,sans-serif;position: relative;-webkit-box-shadow: 14px 14px 82px -3px rgba(0,0,0,0.25);-moz-box-shadow: 14px 14px 82px -3px rgba(0,0,0,0.25);box-shadow: 14px 14px 82px -3px rgba(0,0,0,0.25);\">
    <div class=\"header\" style=\"width: 100%;background-color: darkgray;padding: 20px;color: white;font-size: 24px;-webkit-border-top-left-radius: 20px;-webkit-border-top-right-radius: 20px;-moz-border-radius-topleft: 20px;-moz-border-radius-topright: 20px;border-top-left-radius: 20px;border-top-right-radius: 20px;\">
     ";
        // line 30
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "config"), "value", array(0 => "transfer.mail_header"), "method"), "html", null, true);
        echo "
    </div>
    <div class=\"message\" style=\"width: 100%;padding: 20px;background-color: #EFEFEF;\">
      <p>";
        // line 33
        echo twig_escape_filter($this->env, YiiTranslate("mail", "Hi {username}", array("{username}" => $this->getAttribute((isset($context["definition"]) ? $context["definition"] : null), "email"))), "html", null, true);
        echo ",</p>
      <p><b>";
        // line 34
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["model"]) ? $context["model"] : null), "sender"), "fullname"), "html", null, true);
        echo "</b> has shared information about \"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["model"]) ? $context["model"] : null), "art"), "title"), "html", null, true);
        echo "\" with you.</p>
      ";
        // line 35
        if (($this->getAttribute((isset($context["model"]) ? $context["model"] : null), "message") != "")) {
            // line 36
            echo "        <p>There was also a message:<br/>
          ";
            // line 37
            echo nl2br(twig_escape_filter($this->env, $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "message"), "html", null, true));
            echo "
        </p>      
      ";
        }
        // line 40
        echo "      <p>You can open the files by clicking on the button below.</p>
      <p class=\"button-space\" style=\"margin-left: 50px;padding: 20px;\">
        <span class=\"button\" style=\"background-color: #5bc0de;font-size: 22px;width: 100px;padding: 10px 30px;-webkit-border-radius: 8px;-moz-border-radius: 8px;border-radius: 8px;\">
          <a href=\"";
        // line 43
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["App"]) ? $context["App"] : null), "createAbsoluteUrl", array(0 => "transfer/index", 1 => $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "generateUrlKey", array(0 => (isset($context["definition"]) ? $context["definition"] : null)), "method")), "method"), "html", null, true);
        echo "\" style=\"text-decoration: none;color: black;\">Goto the files</a>
        </span>
      </p>
    </div>
    <div class=\"footer\" style=\"width: 100%;background-color: darkgray;padding: 20px;color: white;font-size: 14px;-webkit-border-bottom-right-radius: 20px;-webkit-border-bottom-left-radius: 20px;-moz-border-radius-bottomright: 20px;-moz-border-radius-bottomleft: 20px;border-bottom-right-radius: 20px;border-bottom-left-radius: 20px;\">
      ";
        // line 48
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["App"]) ? $context["App"] : null), "config"), "value", array(0 => "transfer.mail_footer"), "method"), "html", null, true);
        echo "
    </div>
  </div>
</div>  
";
    }

    public function getTemplateName()
    {
        return "/views/mail/transfer.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  126 => 48,  118 => 43,  113 => 40,  107 => 37,  104 => 36,  102 => 35,  96 => 34,  92 => 33,  86 => 30,  81 => 27,  78 => 26,  71 => 22,  65 => 19,  59 => 16,  54 => 14,  48 => 12,  45 => 11,  35 => 9,  29 => 7,);
    }
}
