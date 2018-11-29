<?php

/* /views/moderation/index.twig */
class __TwigTemplate_79023e782edad2274411d11e683f5ed8 extends Twig_Template
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
        echo "\t";
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "caption"), "method"));
        $template->display($context);
        // line 8
        echo "<div class=\"row\">
\t<div class=\"col-xs-9\">\t 
<p>This module show the changes made to the description of the Artwork or Artists.
\tThe changed information can be view by date and by the group the user belongs to.</p>
<h3>Changes by Date</h3>
<p>This selection only shows the days on which changes were made to the VKA interface. By clicking on the data the changed Artwork
or changed artist are shown.<br />
You can click direct on the link image to go that Artwork / Artist of click on the name or title to see the changes made. When click
in this information box on the link you will go directly to the view where changes where made.</p>
<h3>Changes by Group</h3>
<p>When click on this option all active groups are show. You can click on one of the group to see what changes where made by
\tthat group. The days shown are the only days these changes where made.<br />
The rest is equal to the usage on the per Date base</p>
\t</div>
</div>
";
    }

    // line 25
    public function block_onReady($context, array $blocks = array())
    {
        // line 26
        echo "\t
  \$('.menu-overview').addClass('active');
\t";
        // line 28
        $this->displayParentBlock("onReady", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "/views/moderation/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 28,  56 => 26,  53 => 25,  34 => 8,  30 => 7,  27 => 6,);
    }
}
