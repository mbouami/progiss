<?php

/* AcmeProsalesBundle:Devis:message.html.twig */
class __TwigTemplate_9149cf3d6435dc7d4e6f4b4e9f710b9da3aa06eb38415336f3750b3a8f147f85 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start', array("attr" => array("onsubmit" => "sendMessage(\"POST\",this,niveau); return false;", "enctype" => "multipart/form-data")));
        echo "    
    <table border='1'>
        <tr>
            <td>";
        // line 7
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "a"), 'label');
        echo "</td>
            <td>";
        // line 8
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "a"), 'widget');
        echo " ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "contact"), 'widget');
        echo "</td> 
";
        // line 10
        echo "            <td rowspan=\"5\" style=\"vertical-align: central\">
";
        // line 13
        echo " 
";
        // line 15
        echo "                    <div style=\"width: 350px; height: 400px\">
                        <div data-dojo-type=\"dijit/layout/TabContainer\" style=\"width: 100%; height: 100%;\">
                            <div data-dojo-type=\"dijit/layout/ContentPane\" title=\"Pièces Jointes\" data-dojo-props=\"selected:true\">
                                ";
        // line 18
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "file"), 'widget');
        echo "            
";
        // line 21
        echo "                                    <select data-dojo-type=\"dijit/form/MultiSelect\" id=\"listefiles_";
        echo twig_escape_filter($this->env, (isset($context["niveau"]) ? $context["niveau"] : $this->getContext($context, "niveau")), "html", null, true);
        echo "\" name=\"listefiles_";
        echo twig_escape_filter($this->env, (isset($context["niveau"]) ? $context["niveau"] : $this->getContext($context, "niveau")), "html", null, true);
        echo "\" style=\"width:300px;height:300px\">
                                        <option value=\"";
        // line 22
        echo twig_escape_filter($this->env, (isset($context["nomfichier"]) ? $context["nomfichier"] : $this->getContext($context, "nomfichier")), "html", null, true);
        echo "\" selected=\"selected\">";
        echo twig_escape_filter($this->env, (isset($context["nomfichier"]) ? $context["nomfichier"] : $this->getContext($context, "nomfichier")), "html", null, true);
        echo " : ";
        echo twig_escape_filter($this->env, (isset($context["taille"]) ? $context["taille"] : $this->getContext($context, "taille")), "html", null, true);
        echo " bytes</option>
                                    </select>                                
                                    <button data-dojo-type=\"dijit/form/Button\" type=\"button\">Supprimer la sélection
                                        <script type=\"dojo/on\" data-dojo-event=\"click\" data-dojo-args=\"evt\">
                                            require([\"dojo/dom\"], function(dom){
";
        // line 28
        echo "                                                SupprimerlistefichierFiles('listefiles_";
        echo twig_escape_filter($this->env, (isset($context["niveau"]) ? $context["niveau"] : $this->getContext($context, "niveau")), "html", null, true);
        echo "');        
                                            });
                                        </script>
                                    </button>                                
                                <div id=\"zoneinfo\">1 fichier sélectionné</div>
                            </div>
                            <div data-dojo-type=\"dijit/layout/ContentPane\" title=\"Liste des modèles\">
                                ";
        // line 35
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "modelecourrier"), 'widget');
        echo "
                            </div>
                        </div>
                    </div>                        
";
        // line 40
        echo "                                    
            
            </td>  
        </tr>               
        <tr>
            <td>";
        // line 45
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "bcc"), 'label');
        echo "</td>
            <td>";
        // line 46
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "bcc"), 'widget');
        echo "</td>           
        </tr>          
        <tr>
            <td>";
        // line 49
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "objet"), 'label');
        echo "</td>
            <td>";
        // line 50
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "objet"), 'widget');
        echo "</td>           
        </tr>     
        <tr>
            <td>";
        // line 53
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "description"), 'label');
        echo "</td>
            <td>";
        // line 54
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "description"), 'widget');
        echo "</td>                   
        </tr>        
    </table>       
        ";
        // line 57
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form');
        echo "
    ";
        // line 58
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_end');
        echo "
<script>
";
        // line 89
        echo "    
";
        // line 159
        echo "</script>    
";
    }

    public function getTemplateName()
    {
        return "AcmeProsalesBundle:Devis:message.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  148 => 159,  145 => 89,  140 => 58,  136 => 57,  130 => 54,  126 => 53,  120 => 50,  116 => 49,  110 => 46,  106 => 45,  99 => 40,  92 => 35,  81 => 28,  69 => 22,  62 => 21,  58 => 18,  53 => 15,  50 => 13,  47 => 10,  41 => 8,  37 => 7,  31 => 4,  28 => 3,);
    }
}
