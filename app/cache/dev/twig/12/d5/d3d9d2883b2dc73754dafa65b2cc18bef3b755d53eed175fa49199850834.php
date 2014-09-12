<?php

/* WebProfilerBundle:Profiler:bag.html.twig */
class __TwigTemplate_12d5d3d9d2883b2dc73754dafa65b2cc18bef3b755d53eed175fa49199850834 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<table ";
        if (array_key_exists("class", $context)) {
            echo "class='";
            echo twig_escape_filter($this->env, (isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "html", null, true);
            echo "'";
        }
        echo " >
    <thead>
        <tr>
            <th scope=\"col\" style=\"width: 25%\">Key</th>
            <th scope=\"col\" style=\"width: 75%\">Value</th>
        </tr>
    </thead>
    <tbody>
        ";
        // line 9
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(twig_sort_filter($this->getAttribute((isset($context["bag"]) ? $context["bag"] : $this->getContext($context, "bag")), "keys")));
        foreach ($context['_seq'] as $context["_key"] => $context["key"]) {
            // line 10
            echo "            <tr>
                <th>";
            // line 11
            echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : $this->getContext($context, "key")), "html", null, true);
            echo "</th>
                <td><pre>";
            // line 12
            echo twig_escape_filter($this->env, $this->env->getExtension('profiler')->dumpValue($this->getAttribute((isset($context["bag"]) ? $context["bag"] : $this->getContext($context, "bag")), "get", array(0 => (isset($context["key"]) ? $context["key"] : $this->getContext($context, "key"))), "method")), "html", null, true);
            echo "</pre></td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['key'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 15
        echo "    </tbody>
</table>
";
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:bag.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  20 => 1,  104 => 37,  100 => 36,  65 => 22,  58 => 18,  127 => 60,  84 => 27,  76 => 27,  146 => 55,  134 => 49,  113 => 40,  97 => 41,  77 => 25,  148 => 74,  124 => 44,  118 => 43,  160 => 62,  153 => 60,  126 => 44,  114 => 42,  110 => 22,  90 => 32,  70 => 24,  155 => 78,  137 => 66,  81 => 33,  53 => 15,  23 => 1,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  229 => 73,  220 => 70,  214 => 69,  177 => 65,  169 => 60,  140 => 69,  132 => 51,  128 => 46,  107 => 36,  61 => 12,  273 => 96,  269 => 94,  254 => 92,  243 => 88,  240 => 86,  238 => 85,  235 => 74,  230 => 82,  227 => 81,  224 => 71,  221 => 77,  219 => 76,  217 => 75,  208 => 68,  204 => 72,  179 => 69,  159 => 61,  143 => 56,  135 => 62,  119 => 42,  102 => 17,  71 => 23,  67 => 22,  63 => 21,  59 => 13,  38 => 12,  94 => 34,  89 => 30,  85 => 32,  75 => 28,  68 => 14,  56 => 11,  201 => 92,  196 => 90,  183 => 82,  171 => 61,  166 => 71,  163 => 62,  158 => 79,  156 => 66,  151 => 57,  142 => 59,  138 => 54,  136 => 56,  121 => 46,  117 => 19,  105 => 18,  91 => 35,  62 => 24,  49 => 13,  26 => 6,  28 => 3,  87 => 32,  31 => 8,  25 => 35,  24 => 2,  21 => 2,  19 => 1,  93 => 36,  88 => 31,  78 => 26,  46 => 12,  44 => 11,  27 => 4,  79 => 29,  72 => 16,  69 => 30,  47 => 15,  40 => 11,  37 => 7,  22 => 2,  246 => 90,  157 => 56,  145 => 46,  139 => 63,  131 => 61,  123 => 59,  120 => 20,  115 => 43,  111 => 37,  108 => 19,  101 => 43,  98 => 34,  96 => 35,  83 => 31,  74 => 27,  66 => 25,  55 => 15,  52 => 14,  50 => 15,  43 => 11,  41 => 10,  35 => 9,  32 => 6,  29 => 3,  209 => 82,  203 => 78,  199 => 67,  193 => 73,  189 => 71,  187 => 84,  182 => 66,  176 => 64,  173 => 65,  168 => 72,  164 => 59,  162 => 82,  154 => 58,  149 => 51,  147 => 73,  144 => 49,  141 => 51,  133 => 48,  130 => 62,  125 => 44,  122 => 43,  116 => 54,  112 => 42,  109 => 40,  106 => 45,  103 => 32,  99 => 40,  95 => 34,  92 => 35,  86 => 35,  82 => 28,  80 => 30,  73 => 23,  64 => 21,  60 => 20,  57 => 20,  54 => 19,  51 => 14,  48 => 9,  45 => 14,  42 => 11,  39 => 10,  36 => 9,  33 => 4,  30 => 5,);
    }
}
