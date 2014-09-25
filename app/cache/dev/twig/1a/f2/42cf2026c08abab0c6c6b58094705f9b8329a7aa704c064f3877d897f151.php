<?php

/* AcmeProsalesBundle::layout.html.twig */
class __TwigTemplate_1af242cf2026c08abab0c6c6b58094705f9b8329a7aa704c064f3877d897f151 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
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
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 4
        echo "    <script>
        niveau = 1;
        username = '";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "__toString"), "html", null, true);
        echo "';  
        userid = '";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "id"), "html", null, true);
        echo "'; 
        ";
        // line 8
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "groupes"));
        foreach ($context['_seq'] as $context["_key"] => $context["groupe"]) {
            echo " 
            ";
            // line 9
            if (($this->getAttribute((isset($context["groupe"]) ? $context["groupe"] : $this->getContext($context, "groupe")), "role") == "ROLE_ADMIN")) {
                echo " useradmin=true ";
            }
            // line 10
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['groupe'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "        
    </script>
";
    }

    // line 14
    public function block_title($context, array $blocks = array())
    {
        echo "Bienvenu sur l'interface de gestion des Devis et des Commandes!";
    }

    // line 16
    public function block_body($context, array $blocks = array())
    {
        echo "   
<div data-dojo-type=\"dijit/layout/BorderContainer\" data-dojo-props=\"gutters:true, liveSplitters:false\" id=\"zoneaffichage\">
    <div data-dojo-type=\"dijit/layout/ContentPane\" data-dojo-props=\"region:'top', splitter:false\" id=\"zonemenu\" >     
    </div>
    <div data-dojo-type=\"dijit/layout/ContentPane\" data-dojo-props=\"region:'bottom', splitter:false\" id=\"zonebas\">
        <div id=\"message\" style=\"text-align: left\"></div>
        <div id=\"deconnexion\" style=\"text-align: right\">
            ";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.logged_in_as", array("%username%" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "__toString")), "ProsalesBundle"), "html", null, true);
        echo " ( ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "groupes"));
        foreach ($context['_seq'] as $context["_key"] => $context["groupe"]) {
            echo " ";
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["groupe"]) ? $context["groupe"] : $this->getContext($context, "groupe")), "nom")), "html", null, true);
            echo "-";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['groupe'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo ")
            <button data-dojo-type=\"dijit/form/Button\" type=\"button\" onClick='location.href=\"";
        // line 24
        echo $this->env->getExtension('routing')->getPath("_prosales_logout");
        echo "\"'>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.logout", array(), "ProsalesBundle"), "html", null, true);
        echo "</button>
        </div>
    </div>    
    <div data-dojo-type=\"dijit/layout/ContentPane\" data-dojo-props=\"region:'center', tabStrip:true\" id=\"zonecentral\">
        <div data-dojo-type=\"dijit/layout/TabContainer\" style=\"width: 100%; height: 100%;\" data-dojo-props=\"id:'zoneonglets'\">
            <div data-dojo-type=\"dijit/layout/ContentPane\" title=\"Accueil\" data-dojo-props=\"selected:true,id:'accueil',tooltip:'Onglet d\\'accueil de l\\'application'\">
                <div data-dojo-type=\"dijit/layout/BorderContainer\" data-dojo-props=\"gutters:true, liveSplitters:false\">
                    <div data-dojo-type=\"dijit/layout/ContentPane\" data-dojo-props=\"region:'left', splitter:true\" id=\"zonecentralgauche\">
                        <div data-dojo-type=\"dijit/layout/BorderContainer\" data-dojo-props=\"gutters:true, liveSplitters:false\">
                            <div data-dojo-type=\"dijit/layout/ContentPane\" data-dojo-props=\"region:'top', splitter:true\" id=\"zonecentralhautgauche\">
                                <div id=\"zoneetabs\"></div>
                            </div>      
                            <div data-dojo-type=\"dijit/layout/ContentPane\" data-dojo-props=\"region:'center', splitter:true\" id=\"zonecentralbasgauche\">
                                <div id=\"zonedevisencours\"></div>
                            </div>               
                        </div>
                    </div>      
                    <div data-dojo-type=\"dijit/layout/ContentPane\" data-dojo-props=\"region:'center', splitter:true\" id=\"zonecentraldroite\">
                        <div data-dojo-type=\"dijit/layout/BorderContainer\" data-dojo-props=\"gutters:true, liveSplitters:false\">
                            <div data-dojo-type=\"dijit/layout/ContentPane\" data-dojo-props=\"region:'top', splitter:true\" id=\"zonecentralhautdroite\">
                                <div data-dojo-type=\"dijit/layout/TabContainer\" id=\"tabPane\">
                                    <div data-dojo-type=\"dijit/layout/ContentPane\" title=\"Détail\" data-dojo-props=\"selected:true,id:'detail'\">

                                    </div>
                                    <div data-dojo-type=\"dijit/layout/ContentPane\" title=\"Les Contacts\" data-dojo-props=\"id:'contacts'\">
                                        <div id=\"zonecontacts\"></div>
                                    </div>
                                    <div data-dojo-type=\"dijit/layout/ContentPane\" title=\"Les Devis\" data-dojo-props=\"closable:true,id:'devis'\">
                                        <div id=\"zonedevis\"></div>
                                    </div>
                                    <div data-dojo-type=\"dijit/layout/ContentPane\" title=\"Les Commandes\" data-dojo-props=\"id:'commandes'\">
                                        <div id=\"zonecommandes\"></div>
                                    </div>
                                    <div data-dojo-type=\"dijit/layout/ContentPane\" title=\"Les Relances\" data-dojo-props=\"closable:true,id:'relances'\">
                                        <div id=\"zonerelances\"></div>
                                    </div>       
                                    <div data-dojo-type=\"dijit/layout/ContentPane\" title=\"Les Actions\" data-dojo-props=\"id:'actions'\">
                                        <div id=\"zoneactions\"></div>
                                    </div>
                                    <div data-dojo-type=\"dijit/layout/ContentPane\" title=\"Les Devis Classés\" data-dojo-props=\"closable:true,id:'devisclasses'\">

                                    </div>                             
                                </div>
                            </div>      
                            <div data-dojo-type=\"dijit/layout/ContentPane\" data-dojo-props=\"region:'center', splitter:true\" id=\"zonecentralbasdroite\">
                                <div data-dojo-type=\"dijit/layout/TabContainer\" id= \"zoneongletsapercu\">
                                    <div data-dojo-type=\"dijit/layout/ContentPane\" title=\"Calendrier\" data-dojo-props=\"selected:true,id:'calendrier'\">
                                        <div id=\"zoneagenda\"></div>
                                    </div>
                                    <div data-dojo-type=\"dijit/layout/ContentPane\" title=\"Apercu\" data-dojo-props=\"id:'apercu'\">
                                        <div class='zonemessage' id='zonemessage'></div>                                        
                                        <div id=\"zoneapercu\"></div>
                                        <div>
                                            <table style='width:100%;'>
                                                <tr>
                                                    <td class='zonedonneesdevis' id='totalht'></td>
                                                </tr>
                                                <tr>
                                                    <td class='zonedonneesdevis' id='tauxtva'></td>
                                                </tr>
                                                <tr>
                                                    <td class='zonedonneesdevis' id='fraisport'></td>
                                                </tr><tr><td class='zonedonneesdevis' id='totalttc'></td>
                                                </tr>
                                            </table>                                            
                                        </div>                                        
                                    </div>                          
                                </div>
                            </div>               
                        </div>
                    </div>               
                </div>
            </div>                        
        </div>       
    </div>      
</div>
";
    }

    // line 102
    public function block_javascripts($context, array $blocks = array())
    {
        // line 103
        echo "    <script>
    require([
        \"dojo/store/JsonRest\", 
        \"dojo/store/Memory\", 
        'gridx/allModules',
        \"Menuapplication\",
        \"GrilleOrganisations\",
        \"GrilleContacts\",
        \"GrilleDevis\",
        \"GrilleCommandes\",
        \"GrilleActions\",        
        \"GrilleDevisenCours\",
        \"GrilleProduits\",  
        \"GrilleLignesDevis\",
        \"GrilleApercuDevis\",
        \"GrilleTauxtva\",
        \"GrilleServices\",
        \"Agenda\",
        \"MyEditor\"
    ], function(JsonRest,Memory,modules){
            new Menuapplication().placeAt(\"zonemenu\");  
            grillecontacts = new GrilleContacts({
                                    id:'grillecontacts',
                                }).placeAt(\"zonecontacts\"); 
            grilledevis = new GrilleDevis({
                                id:'grilledevis',
                            }).placeAt(\"zonedevis\");   
            grillecommandes = new GrilleCommandes({
                                id:'grillecommandes',
                            }).placeAt(\"zonecommandes\"); 
            grilleactions = new GrilleActions({
                                id:'grilleactions',
                            }).placeAt(\"zoneactions\");                             
            grilledevisencours = new GrilleDevisenCours({
                                id:'grilledevisencours',
                            }).placeAt(\"zonedevisencours\");   
            grilleapercudevis = new GrilleApercuDevis({
                                id:'grilleapercudevis',
                            }).placeAt(\"zoneapercu\");
\t    new Agenda({
                            id: \"agenda\",
                            cssClassFunc: function(item) {
                              return item.cssClass;  
                            },                                          
                            columnViewProps:'{minHours:8,maxHours:19,hourSize:10}',
                            dateInterval: \"week\",
                            class: \"agenda\"
                        }).placeAt(\"zoneagenda\");
            organisationstore = new JsonRest({target: \"listeorganisations\"}); 
            detailorganisationstore = new JsonRest({target: \"detailorganisation\"});              
            contactstore = new JsonRest({target: \"listecontacts\"});  
            devisencoursStore = new JsonRest({target: \"devisencours\"});  
            modelecourrierStore = new JsonRest({target: \"detailmodele\"});  
            detaildevisStore = new JsonRest({target: \"detaildevis\"});                
            if (useradmin) {
                id = 0;
            } else {
                id = userid;
            }            
            organisationstore.query(\"?id=\"+id).then(function(results){
                grilleorganisations = new GrilleOrganisations({
                                            id:'grilleorganisations',
                                            store:new Memory({ data: results.resultat})
                                        }).placeAt(\"zoneetabs\");     
                devisencoursStore.query(\"?id=\"+id).then(function(results){
                    grilledevisencours.setStore(new Memory({data: results.resultat }));             
                });                                         
            });
";
        // line 173
        echo "            
            villesstore = new JsonRest({target: \"listevilles\"});  
            produitsStore = new JsonRest({target: \"listeproduits\"});
            produitsStore.query().then(function(produits){ 
                        StoreProduits = new Memory({data: produits});                        
            });    
            tauxtvaStore = new JsonRest({target: \"listetauxtva\"});
            tauxtvaStore.query().then(function(tva){ 
                        StoreTauxTva = new Memory({data: tva});                        
            });     
            servicesStore = new JsonRest({target: \"listeservices\"});
            servicesStore.query().then(function(service){ 
                        StoreServices = new Memory({data: service});                        
            });             
    });
    </script>
";
    }

    public function getTemplateName()
    {
        return "AcmeProsalesBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  255 => 173,  185 => 103,  182 => 102,  99 => 24,  84 => 23,  73 => 16,  67 => 14,  56 => 10,  52 => 9,  46 => 8,  42 => 7,  38 => 6,  34 => 4,  31 => 3,);
    }
}
