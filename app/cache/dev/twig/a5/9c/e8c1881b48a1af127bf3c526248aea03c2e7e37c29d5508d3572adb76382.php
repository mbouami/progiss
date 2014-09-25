<?php

/* ::base.html.twig */
class __TwigTemplate_a59ce8c1881b48a1af127bf3c526248aea03c2e7e37c29d5508d3572adb76382 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        <link rel=\"stylesheet\" href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/mescss.css"), "html", null, true);
        echo "\" />
        <link rel=\"stylesheet\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/dijit/themes/soria/soria.css"), "html", null, true);
        echo "\" />
        <link rel=\"stylesheet\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/dojo/resources/dojo.css"), "html", null, true);
        echo "\" />
        <link rel=\"stylesheet\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/gridx/resources/claro/Gridx.css"), "html", null, true);
        echo "\" />   
        <link rel=\"stylesheet\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/dojox/calendar/themes/soria/Calendar.css"), "html", null, true);
        echo "\" />
        <link rel=\"stylesheet\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/dojox/form/resources/CheckedMultiSelect.css"), "html", null, true);
        echo "\" />          
        ";
        // line 12
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 13
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
        <script>dojoConfig = {parseOnLoad: true}</script>
        <script src='";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/dojo/dojo.js"), "html", null, true);
        echo "'></script>
";
        // line 17
        echo "        <script src='";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/mesfonctions.js"), "html", null, true);
        echo "'></script>         
        <script>
            require([\"dojo/parser\", \"dijit/layout/ContentPane\", \"dijit/layout/BorderContainer\", \"dijit/layout/TabContainer\", \"dijit/layout/AccordionContainer\", \"dijit/layout/AccordionPane\"]);        
        </script>        
    </head>
    <body class=\"soria\">
        ";
        // line 23
        $this->displayBlock('body', $context, $blocks);
        // line 24
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 25
        echo "    </body>
</html>";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Welcome!";
    }

    // line 12
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    // line 23
    public function block_body($context, array $blocks = array())
    {
    }

    // line 24
    public function block_javascripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 24,  100 => 23,  95 => 12,  89 => 5,  84 => 25,  81 => 24,  79 => 23,  69 => 17,  65 => 15,  59 => 13,  57 => 12,  53 => 11,  45 => 9,  41 => 8,  37 => 7,  33 => 6,  29 => 5,  23 => 1,  92 => 31,  90 => 30,  83 => 26,  75 => 21,  68 => 17,  62 => 14,  58 => 13,  49 => 10,  46 => 7,  39 => 5,  36 => 4,  30 => 3,);
    }
}
