/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require([
    "dojo/store/JsonRest",
    "dojo/domReady!"], 
function(JsonRest) {
        organisationsStore = new JsonRest({target: "listeorganisations"});
        adressesStores = new JsonRest({target: "listeadresses"});
        contactsStore = new JsonRest({target: "listecontacts"});   
        produitsStore = new JsonRest({target: "listeproduits"});   
        devisStore = new JsonRest({target: "/public/gestionzen/gestion/Devis/listedevis"});
        devisencoursStore = new JsonRest({target: "devisencours"});         
        lignesdevisStore = new JsonRest({target: "lignesdevis"});     
        lignescommandeStore = new JsonRest({target: "lignescommande"});          
});

