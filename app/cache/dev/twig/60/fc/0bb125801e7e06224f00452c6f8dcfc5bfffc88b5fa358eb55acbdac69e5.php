<?php

/* AcmeProsalesBundle:Devis:imprimer.html.twig */
class __TwigTemplate_60fc0bb125801e7e06224f00452c6f8dcfc5bfffc88b5fa358eb55acbdac69e5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::devis.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::devis.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "<table style=\"width: 100%;\">
            <tr>
                <td style=\"width: 40%\">Devis</td>
                <td style=\"width: 20%\"></td>
                <td rowspan=\"2\" style=\"width: 40%\">
                        ";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "organisation"), "html", null, true);
        echo "<br>Tél : ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "organisation"), "tel"), "html", null, true);
        echo "<br>";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "organisation"), "adresse"), "html", null, true);
        echo "
                        <br>";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "organisation"), "ville"), "cp"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "organisation"), "ville"), "nom"), "html", null, true);
        echo "(";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "organisation"), "ville"), "pays"), "html", null, true);
        echo ")
                        <br>A l'attention de ";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "contact"), "html", null, true);
        echo "
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>    
        </table>
        <table style=\"width: 100%;\">
            <thead>
            <th style=\"background-color: #00B0F0\">Date</th>
            <th style=\"background-color: #00B0F0\">Référence</th> 
            <th style=\"background-color: #00B0F0\">Votre Correspondant</th>
            <th style=\"background-color: #00B0F0\">Page</th>         
            </thead> 
            <tr>
                <td style=\"text-align: center\">";
        // line 27
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "createdAt"), "d/m/Y"), "html", null, true);
        echo "</td>
                <td style=\"text-align: center\">";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "reference"), "html", null, true);
        echo "</td>    
                <td style=\"text-align: center\">";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "referent"), "html", null, true);
        echo "</td>
                <td style=\"text-align: center\">[page]</td>          
            </tr>
        </table>
        <br/><br />
        <table style=\"width: 100%;border: 2px;\">
            <thead>
            <th style=\"background-color: #00B0F0\">N°</th>
            <th style=\"background-color: #00B0F0\">Référence</th> 
            <th style=\"background-color: #00B0F0\">Libellé</th>
            <th style=\"background-color: #00B0F0\">Qte</th>     
            <th style=\"background-color: #00B0F0\">Prix HT</th> 
            <th style=\"background-color: #00B0F0\">Remise</th>
            <th style=\"background-color: #00B0F0\">Total HT</th>       
            </thead>   
            ";
        // line 44
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "lignesdevis"));
        foreach ($context['_seq'] as $context["_key"] => $context["lignedevis"]) {
            // line 45
            echo "            <tr>
                <td style=\"text-align: center\">";
            // line 46
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["lignedevis"]) ? $context["lignedevis"] : $this->getContext($context, "lignedevis")), "ordre")), "html", null, true);
            echo "</td>
                <td style=\"text-align: center\">";
            // line 47
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["lignedevis"]) ? $context["lignedevis"] : $this->getContext($context, "lignedevis")), "reference"));
            echo "</td>  
                <td style=\"text-align: left\">";
            // line 48
            echo $this->getAttribute((isset($context["lignedevis"]) ? $context["lignedevis"] : $this->getContext($context, "lignedevis")), "description");
            echo "</td>
                <td style=\"text-align: center\">";
            // line 49
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["lignedevis"]) ? $context["lignedevis"] : $this->getContext($context, "lignedevis")), "quantite")), "html", null, true);
            echo "</td>   
                <td style=\"text-align: center\">";
            // line 50
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["lignedevis"]) ? $context["lignedevis"] : $this->getContext($context, "lignedevis")), "prixht"), 2, ".", " "), "html", null, true);
            echo " &euro;</td>  
                <td style=\"text-align: center\">";
            // line 51
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["lignedevis"]) ? $context["lignedevis"] : $this->getContext($context, "lignedevis")), "remise"), 2, ".", " "), "html", null, true);
            echo " %</td>
                <td style=\"text-align: right\">";
            // line 52
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["lignedevis"]) ? $context["lignedevis"] : $this->getContext($context, "lignedevis")), "totalht"), 2, ".", " "), "html", null, true);
            echo " &euro;</td>         
            </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['lignedevis'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 54
        echo "  
            <tr>
                <td ></td>
                <td ></td>  
                <td ></td>
                <td ></td>   
                <td ></td> 
                <td style=\"text-align: left\">Frais de port </td>
                <td style=\"text-align: right\">";
        // line 62
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fraisport"), 2, ".", " "), "html", null, true);
        echo " &euro;</td> 
            </tr>
            <tr>
                <td ></td>
                <td ></td>  
                <td ></td>
                <td ></td>   
                <td ></td> 
                <td style=\"text-align: left\">Total HT </td>
                <td style=\"text-align: right\">";
        // line 71
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "totalht"), 2, ".", " "), "html", null, true);
        echo " &euro;</td> 
            </tr>    
            <tr>
                <td ></td>
                <td ></td>  
                <td ></td>
                <td ></td>   
                <td ></td> 
                <td style=\"text-align: left\">TVA (";
        // line 79
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "tauxtva"), 2, ".", " "), "html", null, true);
        echo " %) </td>
                <td style=\"text-align: right\">";
        // line 80
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "totaltva"), 2, ".", " "), "html", null, true);
        echo " &euro;</td> 
            </tr>   
            <tr>
                <td ></td>
                <td ></td>  
                <td ></td>
                <td ></td>   
                <td ></td> 
                <td style=\"text-align: left\">Total TTC </td>
                <td style=\"text-align: right\">";
        // line 89
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "totalttc"), 2, ".", " "), "html", null, true);
        echo " &euro;</td> 
            </tr>     
        </table>

        <table style=\"width: 100%;border: 2px;\">
            <tr>
                <td colspan=\"2\">Lien de paiement sécurisé : <a href=\"";
        // line 95
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["paiement"]) ? $context["paiement"] : $this->getContext($context, "paiement")), "valeur"), "html", null, true);
        echo "?email=";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "contact"), "email"), "html", null, true);
        echo "&montant=";
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "totalttc"), 2, ".", ""), "html", null, true);
        echo "&reference=";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "reference"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["paiement"]) ? $context["paiement"] : $this->getContext($context, "paiement")), "valeur"), "html", null, true);
        echo "?email=";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "contact"), "email"), "html", null, true);
        echo "&montant=";
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "totalttc"), 2, ".", ""), "html", null, true);
        echo "&reference=";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "reference"), "html", null, true);
        echo "</a></td>
            </tr>
            <tr>
                <td>Validité de l'offre : 15 jours</td>
                <td>Condition de règlement : ";
        // line 99
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "modereglement"), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <td colspan=\"2\">Nos tarifs comprennent un service d'assistance téléphonique d'installation sur les logiciels proposées</td>
            </tr>
        </table>
        ";
        // line 105
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "referent"), "html", null, true);
        echo "       
";
    }

    public function getTemplateName()
    {
        return "AcmeProsalesBundle:Devis:imprimer.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  227 => 105,  218 => 99,  197 => 95,  188 => 89,  176 => 80,  172 => 79,  161 => 71,  149 => 62,  139 => 54,  130 => 52,  126 => 51,  122 => 50,  118 => 49,  114 => 48,  110 => 47,  106 => 46,  103 => 45,  99 => 44,  81 => 29,  77 => 28,  73 => 27,  54 => 11,  46 => 10,  38 => 9,  31 => 4,  28 => 3,);
    }
}
