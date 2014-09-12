<?php

/* AcmeDemoBundle:Demo:hello.html.twig */
class __TwigTemplate_7b0fa4b9091d4d920e9d3e6d6291a8cdd7bb534d5f4bb85622d5357a8a637bcc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AcmeDemoBundle::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AcmeDemoBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 9
        $context["code"] = $this->env->getExtension('demo')->getCode($this);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, ("Hello " . (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name"))), "html", null, true);
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <h1>Hello ";
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), "html", null, true);
        echo "!</h1>
";
    }

    public function getTemplateName()
    {
        return "AcmeDemoBundle:Demo:hello.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  146 => 55,  134 => 49,  113 => 41,  97 => 37,  77 => 32,  148 => 74,  124 => 44,  118 => 43,  160 => 62,  153 => 60,  126 => 44,  114 => 42,  110 => 41,  90 => 36,  70 => 29,  155 => 78,  137 => 66,  81 => 33,  53 => 18,  23 => 1,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  229 => 73,  220 => 70,  214 => 69,  177 => 65,  169 => 60,  140 => 69,  132 => 51,  128 => 46,  107 => 36,  61 => 29,  273 => 96,  269 => 94,  254 => 92,  243 => 88,  240 => 86,  238 => 85,  235 => 74,  230 => 82,  227 => 81,  224 => 71,  221 => 77,  219 => 76,  217 => 75,  208 => 68,  204 => 72,  179 => 69,  159 => 61,  143 => 56,  135 => 48,  119 => 42,  102 => 46,  71 => 17,  67 => 26,  63 => 29,  59 => 20,  38 => 6,  94 => 37,  89 => 35,  85 => 34,  75 => 17,  68 => 14,  56 => 27,  201 => 92,  196 => 90,  183 => 82,  171 => 61,  166 => 71,  163 => 62,  158 => 62,  156 => 66,  151 => 57,  142 => 59,  138 => 54,  136 => 56,  121 => 46,  117 => 44,  105 => 39,  91 => 27,  62 => 23,  49 => 14,  26 => 9,  28 => 3,  87 => 25,  31 => 3,  25 => 3,  24 => 4,  21 => 2,  19 => 1,  93 => 36,  88 => 38,  78 => 34,  46 => 14,  44 => 11,  27 => 4,  79 => 18,  72 => 16,  69 => 30,  47 => 12,  40 => 6,  37 => 5,  22 => 2,  246 => 90,  157 => 56,  145 => 46,  139 => 51,  131 => 52,  123 => 58,  120 => 43,  115 => 43,  111 => 37,  108 => 36,  101 => 38,  98 => 38,  96 => 31,  83 => 25,  74 => 30,  66 => 24,  55 => 15,  52 => 21,  50 => 18,  43 => 8,  41 => 7,  35 => 6,  32 => 4,  29 => 5,  209 => 82,  203 => 78,  199 => 67,  193 => 73,  189 => 71,  187 => 84,  182 => 66,  176 => 64,  173 => 65,  168 => 72,  164 => 59,  162 => 82,  154 => 58,  149 => 51,  147 => 73,  144 => 49,  141 => 51,  133 => 48,  130 => 62,  125 => 44,  122 => 43,  116 => 54,  112 => 42,  109 => 40,  106 => 40,  103 => 32,  99 => 40,  95 => 42,  92 => 35,  86 => 35,  82 => 34,  80 => 29,  73 => 31,  64 => 30,  60 => 28,  57 => 28,  54 => 10,  51 => 14,  48 => 8,  45 => 17,  42 => 10,  39 => 10,  36 => 5,  33 => 6,  30 => 7,);
    }
}
