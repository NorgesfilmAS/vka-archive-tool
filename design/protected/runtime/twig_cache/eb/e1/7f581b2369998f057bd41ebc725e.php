<?php

/* /views/moderation/changes.twig */
class __TwigTemplate_ebe17f581b2369998f057bd41ebc725e extends Twig_Template
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

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "\t";
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "caption"), "method"));
        $template->display($context);
        // line 9
        echo "\t<div class=\"row\">
\t\t<div class=\"col-sm-12\">
\t\tThis list the changes by the user, grouped by date and resource changed.
\t\t</div>
\t</div>
\t<div class=\"row\">
\t\t";
        // line 15
        if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "transactionDates")) > 0)) {
            // line 16
            echo "\t\t<div class=\"col-sm-2\">
\t\t\t<div class=\"panel panel-default\" style='height: 390px;'>
\t\t\t\t<div class=\"panel-heading\">";
            // line 18
            echo twig_escape_filter($this->env, YiiTranslate("app", "date"), "html", null, true);
            echo "</div>
\t\t\t\t<div class=\"panel-body panel-no-padding list-dates\" >
\t\t\t\t\t";
            // line 20
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "transactionDates"));
            foreach ($context['_seq'] as $context["_key"] => $context["date"]) {
                // line 21
                echo "\t\t\t\t\t\t<div class=\"select-date clickable panel-item-full\" data-url=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "createUrl", array(0 => (isset($context["listBy"]) ? $context["listBy"] : null), 1 => array("id" => (isset($context["id"]) ? $context["id"] : null), "d" => twig_date_format_filter($this->env, (isset($context["date"]) ? $context["date"] : null), "Y-m-d"))), "method"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["date"]) ? $context["date"] : null), "d/m/Y"), "html", null, true);
                echo "</div>
\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['date'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 23
            echo "\t\t\t\t</div>
\t\t\t</div>\t\t\t
\t\t</div>
\t\t<div class=\"col-sm-5\" >
\t\t\t<div class=\"panel panel-default\" style='height: 390px;'>
\t\t\t\t<div class=\"panel-heading\">";
            // line 28
            echo twig_escape_filter($this->env, YiiTranslate("app", "Art/Artist"), "html", null, true);
            echo "</div>
\t\t\t\t<div class=\"panel-body panel-no-padding\" id=\"resource-list\" style=\"overflow-y: scroll; height:350px;\">
\t\t\t\t</div>
\t\t\t</div>\t
\t\t</div>\t\t
\t\t<div class=\"col-sm-5\">
\t\t\t<div class=\"panel panel-default\">
\t\t\t\t<div class=\"panel-heading\">";
            // line 35
            echo twig_escape_filter($this->env, YiiTranslate("app", "Information"), "html", null, true);
            echo "</div>
\t\t\t\t<div class=\"panel-body\" id=\"changes\">
\t\t\t\t</div>
\t\t\t</div>\t\t\t\t
\t\t</div>
\t\t";
        } else {
            // line 41
            echo "\t\t\t<br/><br/><br/><br/><br/><br/>
\t\t\t<div class=\"col-sm-6 col-sm-offset-3\">
\t\t\t\t<div class=\"well well-lg text-center\">
\t\t\t\t\t<strong>";
            // line 44
            echo twig_escape_filter($this->env, YiiTranslate("app", "there are no transactions"), "html", null, true);
            echo "</strong>
\t\t\t\t</div>\t
\t\t\t</div>\t
\t\t";
        }
        // line 48
        echo "\t</div>\t
";
    }

    // line 52
    public function block_onReady($context, array $blocks = array())
    {
        // line 53
        echo "\tfunction bindResource() {
\t\t\$('.cls-transaction').on('click', function() {
\t\t\turl = \$(this).data('url')
\t\t\t// \$('#change-list').html('<div class=\"wait-icon\"><center>";
        // line 56
        echo twig_escape_filter($this->env, YiiTranslate("app", "loading ..."), "html", null, true);
        echo "</center></div>');
\t\t\t\$('.cls-transaction').removeClass('mark-active');
\t\t\t\$(this).addClass('mark-active');
\t\t\t\$.ajax({
\t\t\t\t\turl: url,
\t\t\t\t\tdataType: 'html',
\t\t\t\t\tsuccess: function(data) {
\t\t\t\t\t\t\t\$('#changes').html(data);
\t\t\t\t\t}
\t\t\t});
\t\t});
\t\t\$('#changes').html('');
\t}

\t\$('.select-date').on('click', function() {
\t\t\$('.select-date').removeClass('mark-active');
\t\t\$(this).addClass('mark-active');
\t\turl = \$(this).data('url');
\t\t
\t\t\$('#resource-list').html('<div class=\"wait-icon\"><center>";
        // line 75
        echo twig_escape_filter($this->env, YiiTranslate("app", "loading ..."), "html", null, true);
        echo "</center></div>');
\t\t\$('#resource-list').load(url, function() {
\t\t\tbindResource();
\t\t});\t
\t\tbindResource();
\t});

\t
  \$('";
        // line 83
        echo twig_escape_filter($this->env, strtr((isset($context["menuItem"]) ? $context["menuItem"] : null), array("~key~" => $this->getAttribute((isset($context["model"]) ? $context["model"] : null), "id"))), "html", null, true);
        echo "').addClass('active');\t
\t";
        // line 84
        $this->displayParentBlock("onReady", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "/views/moderation/changes.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  156 => 84,  152 => 83,  141 => 75,  119 => 56,  114 => 53,  111 => 52,  106 => 48,  99 => 44,  94 => 41,  85 => 35,  75 => 28,  68 => 23,  57 => 21,  53 => 20,  48 => 18,  44 => 16,  42 => 15,  34 => 9,  30 => 8,  27 => 7,);
    }
}
