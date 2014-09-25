<?php

/* ::devis.html.twig */
class __TwigTemplate_b000baab36b9483382b908daf4a3c06dfacdff5bf2173fd1339c2711515e2501 extends Twig_Template
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
        ";
        // line 7
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 8
        echo "        <script src='";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/mesfonctions.js"), "html", null, true);
        echo "'></script>                 
    </head>
    <body>
        ";
        // line 11
        $this->displayBlock('body', $context, $blocks);
        // line 12
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 13
        echo "    </body>
</html>
";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Welcome!";
    }

    // line 7
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
    }

    // line 12
    public function block_javascripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::devis.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  68 => 11,  63 => 7,  57 => 5,  51 => 13,  48 => 12,  39 => 8,  37 => 7,  33 => 6,  29 => 5,  23 => 1,  227 => 105,  218 => 99,  197 => 95,  188 => 89,  176 => 80,  172 => 79,  161 => 71,  149 => 62,  139 => 54,  130 => 52,  126 => 51,  122 => 50,  118 => 49,  114 => 48,  110 => 47,  106 => 46,  103 => 45,  99 => 44,  81 => 29,  77 => 28,  73 => 12,  54 => 11,  46 => 11,  38 => 9,  31 => 4,  28 => 3,);
    }
}
