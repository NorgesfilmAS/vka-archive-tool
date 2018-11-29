<?php

/* /views/access/group-rights.twig */
class __TwigTemplate_93130d2ecc1b80d74acb26adef3f2901 extends Twig_Template
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
        echo "<div id=\"scroll\" class=\"bs-content\">
\t<div class=\"row\">
\t\t<div class=\"col-sm-9\">
\t\t\t<h2>";
        // line 11
        echo twig_escape_filter($this->env, YiiTranslate("app", "group"), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "name"), "html", null, true);
        echo "</h2>
\t\t\t<h4>";
        // line 12
        echo twig_escape_filter($this->env, YiiTranslate("app", "Access to individual fields"), "html", null, true);
        echo "</h4>
\t\t\t<p>\t\t\t\t
\t\t\t\t";
        // line 14
        echo YiiTranslate("app", "In this screen you can define whichs rights the Group has on the individual fields. A Field can have 3 state: <b>Editable</b>,
\t\t\t\t<b>visible</b> or <b>inherited</b>.<br/>
\t\t\t\t<b>Editable</b> and <b>Visible</b> are self explaining. <b>Inherited</b> means that the fields visibility / editability is defined by the parent group of this
\t\t\t\tgroup. Default all fields are <b>Hidden</b>. Rights can't be revoked; the can only added. Therefor it is important that the parent 
\t\t\t\thas the minimal rights, so the children can get more rights (they can edit something the parent group can't).");
        // line 19
        echo "
\t\t\t</p>\t\t\t
\t\t</div>
\t</div>
\t
\t<div class=\"row\">
\t\t<div class=\"col-sm-4\">
\t\t\t<div class=\"panel panel-default\">
\t\t\t\t<div class=\"panel-heading\">
\t\t\t\t\t<h3 class=\"panel-title\" data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"";
        // line 28
        echo twig_escape_filter($this->env, YiiTranslate("app", "Field that are fully editable."), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, YiiTranslate("app", "fields editable"), "html", null, true);
        echo "
\t\t\t\t\t\t<div class=\"pull-right btn-group\">
\t\t\t\t\t\t\t<button class=\"btn btn-default btn-xs dropdown-toggle btn-dim\" data-toggle=\"dropdown\" href=\"#\"><span class=\"caret\"></span></button>
\t\t\t\t\t\t\t<ul class=\"dropdown-menu dropdown-menu-small\">
\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<a id=\"btn-editable-all\" href=\"#\">";
        // line 33
        echo twig_escape_filter($this->env, YiiTranslate("app", "Add all fields"), "html", null, true);
        echo "</a>
\t\t\t\t\t\t\t\t\t<a id=\"btn-editable-none\" href=\"#\">";
        // line 34
        echo twig_escape_filter($this->env, YiiTranslate("app", "Remove all fields"), "html", null, true);
        echo "</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t</ul>\t
\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t</h3>
\t\t\t\t</div>
\t\t\t\t<div class=\"panel-body\">
\t\t\t\t\t<ol id=\"fields-editable\" class=\"drop-scroll simple_with_animation vertical\">
\t\t\t\t\t";
        // line 42
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "editAccess"));
        foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
            // line 43
            echo "\t\t\t\t\t<li data-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "ref"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, YiiTranslate("app", $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "resourceName")), "html", null, true);
            echo " - ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "fieldname"), "html", null, true);
            echo "</li>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 44
        echo "\t\t\t\t\t\t
\t\t\t\t\t<li class=\"no-items\"></li>
\t\t\t\t\t</ol>\t\t\t\t
\t\t\t\t</div>
\t\t\t</div>\t\t
\t\t</div>
\t\t
\t\t<div class=\"col-sm-4\">\t\t\t
\t\t\t<div class=\"panel panel-default\">
\t\t\t\t<div class=\"panel-heading\">
\t\t\t\t\t<h3 class=\"panel-title\" data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"Field that are only visible, not editable.\">";
        // line 54
        echo twig_escape_filter($this->env, YiiTranslate("app", "fields only visible"), "html", null, true);
        echo "
\t\t\t\t\t<div class=\"pull-right btn-group\">
\t\t\t\t\t\t<button class=\"btn btn-default btn-xs dropdown-toggle btn-dim\" data-toggle=\"dropdown\" href=\"#\"><span class=\"caret\"></span></button>
\t\t\t\t\t<ul class=\"dropdown-menu dropdown-menu-small\">
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a id=\"btn-visible-all\" href=\"#\">";
        // line 59
        echo twig_escape_filter($this->env, YiiTranslate("app", "Add all fields"), "html", null, true);
        echo "</a>
\t\t\t\t\t\t\t<a id=\"btn-visible-none\" href=\"#\">";
        // line 60
        echo twig_escape_filter($this->env, YiiTranslate("app", "Remove all fields"), "html", null, true);
        echo "</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t</ul>\t
\t\t\t\t\t</div>\t\t\t\t\t
\t\t\t\t\t</h3>\t
\t\t\t\t</div>
\t\t\t\t<div class=\"panel-body\">
\t\t\t\t\t<ol id=\"fields-visible\" class=\" drop-scroll simple_with_animation vertical\">
\t\t\t\t\t";
        // line 68
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "readAccess"));
        foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
            // line 69
            echo "\t\t\t\t\t<li data-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "ref"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "resourceName"), "html", null, true);
            echo " - ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "fieldname"), "html", null, true);
            echo "</li>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 71
        echo "\t\t\t\t\t<li class=\"no-items\"></li>\t\t\t\t\t
\t\t\t\t\t</ol>
\t\t\t\t</div>
\t\t\t</div>\t\t
\t\t</div>

\t\t<div class=\"col-sm-4\">
\t\t\t<div class=\"panel panel-default\">
\t\t\t\t<div class=\"panel-heading\">
\t\t\t\t\t<h3 class=\"panel-title\" data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"";
        // line 80
        echo twig_escape_filter($this->env, YiiTranslate("app", "Field that are defined in the parent group and whose rights aren't changed."), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t";
        // line 81
        echo twig_escape_filter($this->env, YiiTranslate("app", "Field rights inherited"), "html", null, true);
        echo "</h3>
\t\t\t\t</div>
\t\t\t\t<div class=\"panel-body\">
\t\t\t\t\t<ol id=\"fields-defined\" class=\"drop-scroll simple_with_animation vertical\">
\t\t\t\t\t";
        // line 85
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "model"), "allFields"));
        foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
            // line 86
            echo "\t\t\t\t\t<li data-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "ref"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "resourceName"), "html", null, true);
            echo " - ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field"]) ? $context["field"] : null), "fieldname"), "html", null, true);
            echo "</li>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 88
        echo "\t\t\t\t\t<li class=\"no-items\"></li>
\t\t\t\t\t</ol>\t\t\t\t
\t\t\t\t</div>
\t\t\t</div>\t\t
\t\t</div>
\t</div>\t
</div>
";
        // line 95
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "viewPath", array(0 => "_form"), "method"));
        $template->display($context);
        // line 96
        echo "
";
    }

    // line 100
    public function block_onReady($context, array $blocks = array())
    {
        // line 101
        echo "  \$('.menu-rights').addClass('active');
\t";
        // line 102
        $this->displayParentBlock("onReady", $context, $blocks);
        echo "
\t";
        // line 103
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["this"]) ? $context["this"] : null), "registerPackage", array(0 => "sortable"), "method"), "html", null, true);
        echo "
\t
\tfunction moveLi(fromSelector, selector)
\t{
\t\tvar p = \$(fromSelector);
\t\t\$(selector).each(function() {
\t\t\t\$this = \$(this);
\t\t\tif (!\$this.hasClass('no-items')) {
\t\t\t\tvar element = \$this.detach();
\t\t\t\tp.append(element);
\t\t\t}\t
\t\t});\t
\t}
\t
\t\$('#btn-visible-all').on('click', function() {
\t\tmoveLi('#fields-visible', '#fields-defined li');
\t});
\t\$('#btn-visible-none').on('click', function() {
\t\tmoveLi('#fields-defined', '#fields-visible li');
\t});
\t\$('#btn-editable-all').on('click', function() {
\t\tmoveLi('#fields-editable', '#fields-defined li');
\t});
\t\$('#btn-editable-none').on('click', function() {
\t\tmoveLi('#fields-defined', '#fields-editable li');
\t});
\t
\t\$('.cls-";
        // line 130
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["util"]) ? $context["util"] : null), "formId", array(0 => (isset($context["form"]) ? $context["form"] : null)), "method"), "html", null, true);
        echo "').submit(function() {
\t\tvar lst='';
\t\t\$('#fields-visible li').each(function() {
\t\t\t\$this = \$(this);
\t\t\tif (!\$this.hasClass('no-items')) {
\t\t\t\tlst += ',' + \$this.data('id');
\t\t\t}
\t\t});
\t\t\$('#id-read_access').val(lst.substr(1));
\t\t
\t\tlst='';
\t\t\$('#fields-editable li').each(function() {
\t\t\t\$this = \$(this);
\t\t\tif (!\$this.hasClass('no-items')) {
\t\t\t\tlst += ',' + \$this.data('id');
\t\t\t}
\t\t});
\t\t\$('#id-edit_access').val(lst.substr(1));\t\t

\t});

\t
\tvar adjustment

\t\$(\"ol.simple_with_animation\").sortable({
\t\tgroup: 'simple_with_animation',
\t\tpullPlaceholder: false,
\t\t// animation on drop
\t\tonDrop: function  (item, targetContainer, _super) {
\t\t\tvar clonedItem = \$('<li/>').css({height: 0})
\t\t\titem.before(clonedItem)
\t\t\tclonedItem.animate({'height': item.height()})

\t\t\titem.animate(clonedItem.position(), function  () {
\t\t\t\tclonedItem.detach()
\t\t\t\t_super(item)
\t\t\t})
\t\t},

\t\t// set item relative to cursor position
\t\tonDragStart: function (\$item, container, _super) {
\t\t\tvar offset = \$item.offset(),
\t\t\tpointer = container.rootGroup.pointer

\t\t\tadjustment = {
\t\t\t\tleft: pointer.left - offset.left,
\t\t\t\ttop: pointer.top - offset.top
\t\t\t}

\t\t\t_super(\$item, container)
\t\t},
\t\tonDrag: function (\$item, position) {
\t\t\t\$item.css({
\t\t\t\tleft: position.left - adjustment.left,
\t\t\t\ttop: position.top - adjustment.top
\t\t\t})
\t\t},
\t\ttolerance: 6,
\t\tdistance: 10
\t})\t
";
    }

    public function getTemplateName()
    {
        return "/views/access/group-rights.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  253 => 130,  223 => 103,  219 => 102,  216 => 101,  213 => 100,  208 => 96,  205 => 95,  196 => 88,  183 => 86,  179 => 85,  172 => 81,  168 => 80,  157 => 71,  144 => 69,  140 => 68,  129 => 60,  125 => 59,  117 => 54,  105 => 44,  92 => 43,  88 => 42,  77 => 34,  73 => 33,  63 => 28,  52 => 19,  46 => 14,  41 => 12,  35 => 11,  30 => 8,  27 => 7,);
    }
}
