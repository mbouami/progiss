function openpdf(method,url) {
    var oReq = new XMLHttpRequest();
    oReq.onload = function(e) {  
                                if (this.status == 200) {
                                  var data = JSON.parse(oReq.response); 
                                  window.open(data.url,data.message);
                                }
    }   
    oReq.open(method, url, true);
    oReq.send();    
}
function sendMessage(method,form,niveau) {
  if (!form.action) { return; }
  var oReq = new XMLHttpRequest();
  var formData = new FormData(form);
  var liste = "listefiles_"+niveau;  
  var description = dijit.registry.byId('message_description_'+niveau);
//console.log(dojo.indexOf(formData, 'form[description]'));  
  formData.append('form[description]', description.get('value')); 
    var listepiecesjointes = dijit.byId(liste);    
    listepiecesjointes.set("value",[]);
    listepiecesjointes.invertSelection(); 
  formData.append('listepiecejointes', listepiecesjointes.get('value').toString());      
//    console.log("sendMessage : "+listepiecesjointes.get('value')); 
//  formData.append('form[fichiersjoints]', listepiecesjointes.get('value'));    
  oReq.onload = function (e) {
        var data = JSON.parse(oReq.response);
        SupprimerlistefichierFiles(listepiecesjointes);        
        FermerZone(data.idonglet,"onglet"); 
        grilledevisencours.store.put(data.resultat, {id: data.resultat.id,overwrite :true}); 
        grilleactions.store.add(data.action);       
  };
  if (form.method.toLowerCase() === "post") {
    oReq.open("post", form.action, true);
    oReq.send(formData);
  }   
}
function sendForm(method,form,grille) {
    var formData = new FormData(form);
    var xhr = new XMLHttpRequest();
    xhr.open(method, form.action, true);
//xhr.addEventListener("progress", updateProgress, false);
//xhr.addEventListener("load", transferComplete, false);
//xhr.addEventListener("error", transferFailed, false);
//xhr.addEventListener("abort", transferCanceled, false); 
//function updateProgress (oEvent) {
//    console.log("updateProgress");    
//  if (oEvent.lengthComputable) {
//    var percentComplete = oEvent.loaded / oEvent.total;
//    console.log(percentComplete);
//  } else {
//    // Unable to compute progress information since the total size is unknown
//  }
//}
//
//    function transferComplete(evt) {
//        console.log("The transfer is complete.");
//        if (this.status == 200) {
//          var data = JSON.parse(this.response);
//          if (data.action=="new") grille.store.add(data.resultat);
//          if (data.action=="update") grille.store.put(data.resultat, {id: data.resultat.id,overwrite :true});                    
//          FermerZone(data.idonglet,"onglet");
//        }  
//    }
//
//function transferFailed(evt) {
//  console.log("An error occurred while transferring the file.");
//}
//
//function transferCanceled(evt) {
//  console.log("The transfer has been canceled by the user.");
//}
//    xhr.onprogress = function(e) { 
//                                    console.log("updateProgress");    
//                                  if (e.lengthComputable) {
//                                    var percentComplete = e.loaded / e.total;
//                                    console.log(percentComplete);
//                                  } else {
//                                    // Unable to compute progress information since the total size is unknown
//                                  }
//                    };
    xhr.onload = function(e) { 
                  if (this.status == 200) {
                    var data = JSON.parse(this.response);
                    var ongletencours = data.action+"_"+data.type+"_"+niveau;  
                    var grilleencours = dijit.registry.byId(grille);
                    if (data.action=="new" && data.type!="message") {                        
                        grilleencours.store.add(data.resultat);
                        if (data.type=="commande") {
                            grilledevisencours.store.remove(data.iddevis);                             
                        }                        
                    }
                    if (data.action=="update") {
                        grilleencours.store.put(data.resultat, {id: data.resultat.id,overwrite :true});                        
                    }
                    if (data.action=="update"|| data.type=="commande" || data.type=="message" ) {
                        FermerZone(data.idonglet,"onglet");                        
                    } else {
                        FermerZone(ongletencours,"onglet");                        
                    }
                  }
              };

    xhr.send(formData);
    return false; // Prevent page from submitting.
}
function sendFormDevisXHR(method,form,niveau,grille) {
    require(["dojo/request/xhr", "dojo/dom","dojo/dom-form","dijit/registry", "dojo/dom-construct", "dojo/json", "dojo/on", "dojo/domReady!"],
    function(xhr, dom,domForm,registry, domConst, JSON, on){
        var lesdonnees = domForm.toObject(form);
        var grillelignesdevis = registry.byId("grillelignesdevis_"+niveau);
        xhr(form.action,{
          data: lesdonnees,
          method : method,            
          query: {
            lignesdevis: JSON.stringify(grillelignesdevis.store.data)
//            key1: "value1",
//            key2: "value2"
          },
          handleAs: "json"
        }).then(function(data){
          console.log(JSON.stringify(data));
        });
      });    
}
function sendFormDevis(method,form,niveau,grille) {
//    var xhr = new XMLHttpRequest();
//    xhr.open(method, form.action, true);
//    xhr.responseType = 'blob';
//
//    xhr.onload = function(e) {
//      if (this.status == 200) {
//        var blob = this.response;
//
//        var img = document.createElement('img');
//        img.onload = function(e) {
//          window.URL.revokeObjectURL(img.src); // Clean up after yourself.
//        };
//        img.src = window.URL.createObjectURL(blob);
//        document.body.appendChild(img);
//      }
//    };
//
//    xhr.send();
//var gril = "grillelignesdevis_"+niveau;
//var gril = registry.byId("grillelignesdevis_"+niveau);
//    require(['dijit/registry', 
//             "dojo/domReady!"],
//    function(registry){
//        var grillelignesdevis = registry.byId("grillelignesdevis_"+niveau);
////        console.log(JSON.stringify(grillelignesdevis.store.data));
//        var formData = new FormData(form);
//        formData.append('lignesdevis', JSON.stringify(grillelignesdevis.store.data));
//        var xhr = new XMLHttpRequest();
//        xhr.open(method, form.action, true);
//        xhr.onload = function(e) { 
//                      if (this.status == 200) {
//                          var data = JSON.parse(this.response);
////                          console.log(data);
//                      }
//                  };
//
//        xhr.send(formData);
//        return false; // Prevent page from submitting.
//    })
//document.getElementById("grillelignesdevis_"+niveau);
//console.log(JSON.stringify(grille.store.data));
    var formData = new FormData(form);
//    formData.append('coucou', 'test');
    var xhr = new XMLHttpRequest();
    xhr.open(method, form.action, true);
    xhr.onload = function(e) { 
                  if (this.status == 200) {
                    var donnees = JSON.parse(this.response);
                    sendLignesDevis("GET","enregistrerlignesdevis",niveau,donnees.iddevis);
//                    console.log(donnees);                     
//                    if (donnees.action=="new") {
//                        if (donnees.resultat.devisparent>0) grilledevisencours.store.remove(donnees.resultat.devisparent);
//                        grilledevisencours.store.add(donnees.resultat);
//                    }
////                    if (donnees.action=="update") grille.store.put(donnees.resultat, {id: donnees.resultat.id,overwrite :true});                    
//                    FermerZone(donnees.idonglet,"onglet");                      
                  }
              };

    xhr.send(formData);
    return false; // Prevent page from submitting.
}

function sendLignesDevis(method,href,niveau,iddevis) {
    require(["dojo/request/xhr", "dojo/dom","dojo/dom-form","dijit/registry", "dojo/dom-construct", "dojo/json", "dojo/on", "dojo/domReady!"],
    function(xhr, dom,domForm,registry, domConst, JSON, on){
        var grillelignesdevis = registry.byId("grillelignesdevis_"+niveau);
        var ongletencours = null;
        xhr(href,{
          method : method,            
          query: {
            iddevis: iddevis,
            lignesdevis: JSON.stringify(grillelignesdevis.store.data)
          },
          handleAs: "json"
        }).then(function(resultats){            
//                ongletencours = resultats.idonglet;
//                ongletencours = resultats.action+"_devis_"+niveau;
                ongletencours = resultats.action+"_"+resultats.type+"_"+niveau;  
                if (resultats.action=="new") {
                    if (resultats.resultat.iddevisparent>0){
                        grilledevisencours.store.remove(resultats.resultat.iddevisparent); 
//                        ongletencours = "modifier_devis_"+resultats.resultat.iddevisparent;
//                        ongletencours = "modifier_devis_"+niveau;
                    }                   
                    grilledevisencours.store.add(resultats.resultat);
                }
//                    if (donnees.action=="update") grille.store.put(donnees.resultat, {id: donnees.resultat.id,overwrite :true}); 
                FermerZone(ongletencours,"onglet");             
        })
      });    
}

function Execute_href(method,url,grille) {
    var xhr = new XMLHttpRequest();
    xhr.open(method, url, true);
    xhr.onload = function(e) {         
      if (this.status == 200) {
          var data = JSON.parse(this.response);
          if (grille!==null){
                if (data.action=="delete") grille.RemoveElement(data.id);
                if (data.action=="new") grille.AddElement(data.resultat);                
//              grille.store.remove(data.id);              
          } else {               
                if (data.action=="nommel" && data.resultat.mel!=="") {
                    var boxa = dijit.registry.byId('message_a_'+data.resultat.niveau);
                    boxa.set("value", boxa.get("value") + ";"+data.resultat.nom+"<"+data.resultat.mel+">");                   
                }
          }
      }
    };
    xhr.send();    
}
function Deconnexion(zone,ordre){
	require(["dijit/form/Button", "dojo/dom","dojo/dom-construct", "dojo/_base/window", "dojo/domReady!"], function(Button, dom,domConstruct, win){	
	    domConstruct.create("div", { id: "deconnexion" }, zone, ordre);			
	    var myButton = new Button({
//	    	id:"button_"+id,
	        label: "D�connexion",
	        onClick: function(){
	            FermerSession();
	        }
	    },"deconnexion");	    
	});	
}

function loadimage(fichier,nomcanevas) {
    var x = 0;
    var y = 0;
    var xDirection = 1;
    var yDirection = 1;    
    var file = fichier.files[0];
    var imageType = /image.*/;  
    if (file.type.match(imageType)) {                       
            var reader = new FileReader();
            reader.onload = function(e) {
                afficher_image(nomcanevas,reader.result);                                                     
            }
            reader.readAsDataURL(file);	
    } else {
            afficher_text_canevas(nomcanevas,"Fichier non supporté !","red")
    }
}
function afficher_text_canevas(nomcanevas,txt,couleur) {
    var canvas = document.getElementById(nomcanevas);
    var context = canvas.getContext("2d");   
    context.clearRect(0, 0, canvas.width, canvas.height); 
    context.font = "20px Arial";
    context.strokeStyle = couleur;
    context.strokeText(txt,10,50);    
}
function afficher_image(nomcanevas,image) {
    var canvas = document.getElementById(nomcanevas);
    var context = canvas.getContext("2d");
    context.clearRect(0, 0, canvas.width, canvas.height);     
    if (image) {
        var imageObj = new Image();
        imageObj.src = image; 
        imageObj.onload = function() {
          context.drawImage(imageObj,0,0);
        };          
    } else {
        context.font = "20px Arial";
        context.strokeStyle = 'black';
        context.strokeText("Choisir votre signature",10,50);        
    }

}

function EditerReferent(zone,parametres) {
    var pane;
    require([
    'dijit/registry',        
    "dijit/layout/ContentPane",
    "dojo/_base/array",
    "dojo/domReady!"    
    ], function(registry,ContentPane,array){    
            var p = registry.byId(zone);
            var c = p.getChildren();
            var ongletsencours = array.filter(c, function(onglet){
              return onglet.id == parametres.id;
            }); 
            if (ongletsencours[0]){
                p.selectChild(ongletsencours[0]);
            } else {              
                pane = new ContentPane(parametres); 
                p.addChild(pane,1);
                p.selectChild(pane);                  
                var xhr = new XMLHttpRequest();
                xhr.open("POST", parametres.signatures, true);
                xhr.onload = function(e) {      
                  if (this.status == 200) {
                    var data = JSON.parse(this.response);                      
//                    var canevassignature = registry.byId("signature_canvas_"+parametres.niveau);  
                    afficher_image("signature_canvas_"+parametres.niveau,data.signature);
                    afficher_image("signatureweb_canvas_"+parametres.niveau,data.signatureweb);
                  }
                };
                xhr.send();               
            };

            
    });    
}

function AjouterOnglet(zone,parametres) {
    var pane;
    require([
    'dijit/registry',        
    "dijit/layout/ContentPane",
    "dojo/_base/array",
    "dojo/domReady!"    
    ], function(registry,ContentPane,array){    
            var p = registry.byId(zone);
            var c = p.getChildren();
            var ongletsencours = array.filter(c, function(onglet){
              return onglet.id == parametres.id;
            }); 
            if (ongletsencours[0]){
                p.selectChild(ongletsencours[0]);
            } else {
                pane = new ContentPane(parametres); 
                p.addChild(pane,1);
                p.selectChild(pane);                
            }
    });    
}
//function AjouterOnglet(zone,parametres) {
//    var pane;
//    require([
//    'dijit/registry',        
//    "dijit/layout/ContentPane"
//    ], function(registry,ContentPane){    
//            var p = registry.byId(zone);
//            var c = p.getChildren();
//            for(var i=0; i<c.length; i++){
//                if(c[i].id== parametres.id){
//                    p.selectChild(c[i]); 
//                    c[i].set('title',parametres.title);
//                    return;
//                }
//            } 
//            pane = new ContentPane(parametres); 
//            p.addChild(pane,1);
//            p.selectChild(pane);
//    });    
//}

function AfficherDialogue(parametres) {
    require(["dojo/dom",
             "dijit/Dialog",
             'dijit/registry',
             "dojo/window",
             "dijit/Editor", 
             "dijit/_editor/plugins/AlwaysShowToolbar",
             "dijit/_editor/plugins/FontChoice",
             "dijit/_editor/plugins/TextColor",
             "dijit/_editor/plugins/LinkDialog",
//             "dijit/_editor/RichText",
             "dojo/domReady!"], 
    function(dom,Dialog,registry) {
        var dial = dom.byId(parametres.id);
            if (dial==null) {
                dialog = new Dialog({
                    id: parametres.id,
                    title: parametres.title,
                    href: parametres.href,
                    loadingMessage:'Chargement en cours...',
                    isLayoutContainer: true,
                    parseOnLoad: true,
                    style: "width: auto;height: auto;",
//                    onCancel: function(){
//                        this.destroyRecursive(false);
//                    }
                });        
            } else {
                dialog.set('href',parametres.href);        
                dialog.set('title',parametres.title);
                dialog.startup();
            }
                dialog.show();
    }); 
}

function Afficher_Modele(idmodele,iddevis,niveau){
    require([
            'dijit/registry',
             "dojo/store/Memory",
             "dojo/store/Observable",            
            "dojo/request",
            "dojo/_base/lang",
             "dojo/request/xhr", 
             "dojo/dom", 
             "dojo/dom-construct", 
             "dojo/json", 
             "dojo/on", 
             "dojo/dom-form", 
             "dojo/domReady!"],
    function(registry,Memory,Observable){
        modelecourrierStore.query("?id="+idmodele).then(function(modeleencours){
            var messagedescription = dijit.registry.byId('message_description_'+niveau);   
            var messageobjet = dijit.registry.byId('message_objet_'+niveau);  
            detaildevisStore.query("?id="+iddevis).then(function(devisencours){
                messagedescription.set('value',modeleencours.resultat.description
                                                .replace("{{ devis.reference }}", devisencours.resultat.reference)
                                                .replace("{{ devis.referent }}", devisencours.resultat.referent) 
                                                .replace("{{ devis.contact }}", devisencours.resultat.contact) 
                                                .replace("{{ niveau }}", niveau)    
                                                .replace("{{ signatureweb }}", "<img src='"+devisencours.resultat.signatureweb+"'/>")                                                                                                  
//                                                .replace("{{ devis.signatureweb }}", "<canvas id='message_signatureweb_"+niveau+"'></canvas>")                                                  
//                                                .replace("{{ devis.signatureweb }}", "<canvas id='message_signatureweb_"+niveau+"'><img src="+devisencours.resultat.signatureweb+"/></canvas>")                                                 
                                      );   
                messageobjet.set('value',modeleencours.resultat.sujet.replace("{{ devis.reference }}", devisencours.resultat.reference)); 
//afficher_image("message_signatureweb_"+niveau,devisencours.resultat.signatureweb);                 
            })           
        })
    }
   )
}

function Afficher_Contacts(idorg){
    require([
            'dijit/registry',
             "dojo/store/Memory",
             "dojo/store/Observable",            
            "dojo/request",
            "dojo/_base/lang",
             "dojo/request/xhr", 
             "dojo/dom", 
             "dojo/dom-construct", 
             "dojo/json", 
             "dojo/on", 
             "dojo/dom-form", 
             "dojo/domReady!"],
    function(registry,Memory,Observable){
        contactstore.query("?id="+idorg).then(function(lescontacts){
            listecontacts.set('value', null);        
            listecontacts.set('store',new Memory({data: lescontacts.resultat }));            
        })              
    }
   )
}

function FermerZone(idzone,type) {
    require([
             'dijit/registry',             
             "dojo/domReady!"],
    function(registry){   
        if (registry.byId(idzone) && type=="dialogue") {
            registry.byId(idzone).hide();           
        }
        if (registry.byId(idzone) && type=="onglet") {
            registry.byId("zoneonglets").removeChild(registry.byId(idzone));              
        }    
        registry.byId(idzone).destroyRecursive(false);        
    });      
}

function FermerSession() {
    var xhrArgs = {
        url: 'logout',
        load: function(data){ 
            dojo.query("html")[0].innerHTML = data;
        },
        error: function(error){
            alert("Une erreur est parvenue lors de l'exécution de cette instruction : " + error);
        }
    }     
    var deferred =  dojo.xhrGet(xhrArgs);  
}

function Executer_url(href,method){
    require(["dojo/request",
             "dojo/request/xhr",
            "dojo/_base/array",             
             "dojo/dom", 
             "dojo/dom-construct", 
             "dojo/json", 
             "dojo/on", 
             "dijit/TooltipDialog",
             "dijit/popup", 
             "dojo/domReady!"],
    function(request, xhr,array, dom, domConst, JSON, on,TooltipDialog,popup){
        xhr(href, {
          method : method,
          handleAs: "json"
        }).then(function(data){         
                        if (!data.erreur){
                            if (data.action=="delete" && data.type=="contacts"){
                                    grillecontacts.store.remove(data.id);
//                                    StoreContacts.remove(data.id);                                  
                            } 
                            if (data.action=="delete" && data.type=="devis"){ 
//                                    grilledevis.store.remove(data.id);
                                    grilledevis.RemoveElement(data.id,data.resultat.id)
                                    grilleorganisations.RemoveElement(data.idorg,data.id,data.resultat.id);                                   
                            }
                            if (data.action=="delete" && data.type=="organisations"){ 
                                    grilleorganisations.store.remove(data.id);                            
                            } 
                            if (data.action=="delete" && data.type=="commandes"){ 
                                    grillecommandes.store.remove(data.id);                            
                            }         
                            if (data.action=="new" && data.type=="organisation"){   
                                    grilleorganisations.store.add(data.resultat);
                            }       
                            if (data.action=="new" && data.type=="contact"){                        
                                    grillecontacts.store.add(data.resultat);                           
                            }                             
                            if (data.action=="new" && data.type=="devis"){   
                                    grilledevis.store.remove();
                                    grilledevis.store.add(data.resultat);
                            }                        
                        }                        
        }, function(err){
                        console.log(err.response.text);
        }, function(evt){
                        console.log(evt);
        });
        });
}

function Enregistrer_Devis(niveau,idonglet) {
    require(['dijit/registry', 
             "dojo/domReady!"],
    function(registry){
        var grillelignesdevis = registry.byId("grillelignesdevis_"+niveau); 
        Traitement_Formulaire('devis/create?lignesdevis='+JSON.stringify(grillelignesdevis.store.data),'newdevis_'+niveau,'POST',idonglet);
    })
}

function Dupliquer_Devis(niveau,idonglet) {
    require(['dijit/registry', 
             "dojo/domReady!"],
    function(registry){
        var grillelignesdevis = registry.byId("grillelignesdevis_"+niveau); 
        Traitement_Formulaire('dupliquer?lignesdevis='+JSON.stringify(grillelignesdevis.store.data),'newdevis_'+niveau,'POST',idonglet);
    })
}
function Traitement_Formulaire(href,formulaire,method,idonglet){
    require(["dojo/request",
            "dojo/_base/lang",
             "dojo/request/xhr",
             'dijit/registry',             
             "dojo/_base/array",             
             "dojo/dom", 
             "dojo/dom-construct", 
             "dojo/json", 
             "dojo/on", 
             "dojo/dom-form",
             "dojo/store/Memory",
             "dojo/store/Observable",
             "dojo/_base/Deferred",
             "dojo/domReady!"],
    function(request,lang, xhr, registry, array, dom, domConstruct, JSON, on,domForm,Memory,Observable,Deferred){         
        var lesdonnees = domForm.toObject(formulaire);           
        xhr(href, {
          data: lesdonnees,
          method : method,
          handleAs: "json"
        }).then(function(resultats){ 
                    if (resultats.erreur){
                      alert("Une erreur a emp�ch� le bon fonctionnement de la requ�te");
                      return true;
                    }
//                    FermerZone(resultats.idonglet,resultats.typezone);
                    FermerZone(idonglet,resultats.typezone);
                    if (resultats.action=="new" && resultats.type=="devis"){           
//dossier[0].hasChildren = function(id, item){
//console.log(resultats.resultat.id);  
//return item && dossier[0].getValues(item, 'children').length;
//
//};
                        var dossier = grilledevis.store.query({ id: resultats.resultat.id });
//                        console.log(dossier[0].children.length);
//            console.log(dossier[0].children); 
//console.log(resultats.resultat.children[0]);
                        if (dossier.length==0) {
                            grilledevis.store.add(resultats.resultat);
                        } else {
//                            dossier[0].children.unshift(resultats.resultat.children[0]);
//                            grilledevis.setStore(resultats.resultat);                            
//            console.log(dossier[0].children); 
//            grilledevis.setStore(dossier[0].children);
//            grilledevis.refresh();   
//                            grilleorganisations.AddDevis(resultats.idorg,resultats.resultat.children[0]);
                            grilleorganisations.AddDevis(resultats);
                            grilledevis.AddProduit(resultats.resultat.reference,resultats.resultat.children[0]);
//                            grilledevis.store.add(resultats.resultat.children[0],{parent:resultats.resultat.id});
                        }                     
//                            grilledevis.store.remove(resultats.resultat.id); 
//                            grilledevis.store.add(resultats.resultat);                     
                    }
                    if (resultats.action=="dupliquer" && resultats.type=="devis"){                                          
//                            grilledevis.store.add(resultats.resultat);  
                            grilleorganisations.AddDevis(resultats);                                                    
//                            grilledevis.AddProduit(resultats.resultat.reference,resultats.resultat.children[0]);                            
                    }                    
                    if (resultats.action=="new" && resultats.type=="contact"){                        
                            grillecontacts.store.add(resultats.resultat);
//                            StoreContacts.put(resultats.resultat);                            
                    }      
                    if (resultats.action=="new" && resultats.type=="organisation"){                    
                            grilleorganisations.store.add(resultats.resultat);
                    }       
                    if (resultats.action=="update" && resultats.type=="organisation"){  
                            grilleorganisations.store.put(resultats.resultat, {id: resultats.resultat.id,overwrite :true});                       
                    }                     
                    if (resultats.action=="update" && resultats.type=="contact"){                        
//grilleorganisations.store.put(resultats.resultat, {id: resultats.resultat.id,overwrite :true});
                            grillecontacts.store.put(resultats.resultat, {id: resultats.resultat.id,overwrite :true});                            
                    }           
                    if (resultats.action=="update" && resultats.type=="devis"){  
                            grilledevis.store.put(resultats.resultat, {id: resultats.resultat.id,overwrite :true});
//                            grilledevis.setStore(new Memory({data: null }));                             
//                            grilledevis.store.add(resultats.resultat);                           
                    }                     
                    if (resultats.action=="receptionner" && resultats.type=="commande"){
                            grilledevis.store.remove(resultats.resultat.iddevis);                           
                            grillecommandes.store.add(resultats.resultat);
                    }                      
        })         
    }
    )
}

function Traitement_Formulaire_io(href,formulaire,method){
    require(["dojo/request",
            "dojo/_base/lang",
             "dojo/request/iframe",
             "dojo/domReady!"],
    function(request,lang, iframe){         
        iframe(href,{
          form: formulaire,
          method: method,
          handleAs: "html"
        }).then(function(data){
//            console.log(data);
            FermerZone("new_referent","onglet");
        }, function(err){
            console.log("erreur "+err);
        });       
    }
    )
}

function Calculer_Total_TTC(niveau){
    require([
            "dijit/registry",
             "dojo/domReady!"],
    function(registry){      
        var ttva = document.getElementById("ttva_"+niveau);
        var totalht = registry.byId("devis_totalht_"+niveau);
        var tauxtva = registry.byId("devis_tauxtva_"+niveau);           
        var totaltva = registry.byId("devis_totaltva_"+niveau);   
        var fraisport = registry.byId("devis_fraisport_"+niveau);   
        var totalttc = registry.byId("devis_totalttc_"+niveau);   
        totaltva.set('value',tauxtva.get('displayedValue')*totalht.get('value')/100);        
        totalttc.set('value',totalht.get('value')+totaltva.get('value')+fraisport.get('value'));
        ttva.innerHTML = "("+tauxtva.get('displayedValue')+" %)";
    }
   )
}
   
function Calculer_Total_TVA(){
    require([
            "dijit/registry",
             "dojo/domReady!"],
    function(registry){
        var tauxtva = registry.byId("devis_tauxtva");
        var totalht = registry.byId("devis_totalht");     
        var totaltva = registry.byId("devis_totaltva");          
        totaltva.set('value',tauxtva.get('displayedValue')*totalht.get('value')/100);
    }
   )}
      
function Activer_Liste(choix,liste){
    require(["dojo/domReady!"],
    function(){
        if (choix.get('value')) {
                liste.set('style', { visibility:'hidden' });    
        } else {
                liste.set('style', { visibility:'visible' });    
        }
    }
)}      
      
function DessineBoutton(id,txt,zone,ordre){
	require(["dijit/form/Button", 
                "dojo/dom",
                "dojo/dom-construct",
                "dijit/registry",
                "dojo/_base/window", 
                "dojo/domReady!"], function(Button, dom,domConstruct,registry, win){	
	    domConstruct.create("div", { id: "zone_"+id }, zone, ordre);			
	    var myButton = new Button({
//	    	id:"button_"+id,
	        label: txt,
	        onClick: function(){
	            // Do something:
//	            dom.byId("result1").innerHTML += "Thank you! ";
	            console.log("Thank you! "+this.label);
	        }
	    },"zone_"+id);	    
	});	
}

function DessineComboBoutton(id,label,nomfichier,zone,ordre,href){
	require(["dijit/Menu", 
            "dijit/MenuItem",
            "dijit/form/ComboButton", 
            "dojo/dom","dojo/dom-construct", 
            "dojo/query", 
            "dijit/registry",            
            "dojo/NodeList-traverse", "dojo/domReady!"], function(Menu, MenuItem, ComboButton, dom,domConstruct, query,registry){	
            var num = Math.floor((Math.random() * 100) + 1);
            var menu = new Menu({ style: "display: none;"});
            var menuItem1 = new MenuItem({
                label: "Supprimer",
                parent: nomfichier,
                iconClass:"dijitEditorIcon dijitEditorIconCut",
                onClick: function(){
                                        var oReq = new XMLHttpRequest();
                                        oReq.onload = function(e) {  
                                                                    if (this.status == 200) {
                                                                      var data = JSON.parse(oReq.response); 
                                                                      if (!data.erreur) {
                                                                          domConstruct.destroy(nomfichier);                                                                         
//                                                                          registry.byId("combobutton_"+id).destroyRecursive(false)
                                                                          state.innerHTML = "<p>"+dojo.query(".piecejointe").length+" fichiers sélectionnés!</p>";
//dojo.query(".piecejointe").forEach(function(node, index, array){   
//    console.log(node.id);
//});                                                                          
//                                                                          console.log(dojo.query(".piecejointe").last().id);
                                                                      }
                                                                    }
                                        }   
                                        oReq.open("POST", href+"effacerfichier/"+this.parent, true);
                                        oReq.send();                                          
                                   }
            });
            menu.addChild(menuItem1);
            menu.startup();

            var button = new ComboButton({
//                id: "combobutton_"+id,
//                id: "combobutton_"+num,
                id: nomfichier,
                class:'piecejointe',
                label: label,
                fichier: nomfichier,
                dropDownPosition:["after"],
                iconClass:"plusBlockIcon",
                dropDown: menu
            });
            button.placeAt(zone,ordre);
            button.startup();            
	});	
}

//function handleFiles(files,href) {
//fileElem = document.getElementById("message_file");
//state = document.getElementById('status');
//fileList = document.getElementById("holder");    
//  if (!files.length) {
//    state.innerHTML = "<p>Aucun fichier sélectionné!</p>";
//  } else {
//    state.innerHTML = "<p>"+files.length+" fichiers sélectionnés!</p>";      
//    var list = document.createElement("ul");
//    for (var i = 0; i < files.length; i++) {
//      var li = document.createElement("li");
//      list.appendChild(li);
//      
////      var img = document.createElement("img");
////      img.src = window.URL.createObjectURL(files[i]);
////      img.height = 60;
////      img.onload = function(e) {
////        window.URL.revokeObjectURL(this.src);
////      }
////      li.appendChild(img);
////      var img = document.createElement("iframe");
////      img.src = window.URL.createObjectURL(files[i]);
////      img.height = 60;
////      img.onload = function(e) {
////        window.URL.revokeObjectURL(this.src);
////      }
////      li.appendChild(img);   
//      sendFile(files[i],href);
//      var info = document.createElement("span");
//      info.innerHTML = files[i].name + ": " + files[i].size + " bytes";
//      li.appendChild(info);
////var obj_url = window.URL.createObjectURL(files[i]);
////var iframe = document.getElementById('viewer');
////iframe.setAttribute('src', obj_url);
////window.URL.revokeObjectURL(obj_url);      
//    }
//    fileList.appendChild(list);
//  }
//}

function AjoutlistefichierFiles(liste,nom,taille) {
	require([
                "dijit/form/MultiSelect", "dijit/form/Button",
                "dojo/dom", "dojo/_base/window", "dojo/domReady!"
        ], function(MultiSelect, Button, dom, win){	
            var sel = dom.byId(liste);            
            var c = win.doc.createElement('option');
            c.innerHTML = nom+" : "+taille+" bytes";
            c.value = nom;
            sel.appendChild(c);
//            dom.byId('zoneinfo').innerHTML = "<p>"+sel.options.length+" fichiers sélectionnés!</p>"; 
            AfficherNombredefichiersparListe(sel);

dijit.byId(liste).set("value",[]);
dijit.byId(liste).invertSelection(); 
//console.log(dijit.byId(liste).get('value'));            
	});	
}
function AfficherNombredefichiersparListe(liste) {
	require([
                "dojo/dom","dojo/domReady!"
        ], function(dom){
            var sel = dijit.byId(liste); 
            dom.byId('zoneinfo').innerHTML = "<p>"+dojo.query('option', sel.domNode).length+" fichiers sélectionnés!</p>";            
        })    
}
//function SupprimerlistefichierFiles(liste,href) {
function SupprimerlistefichierFiles(liste) {
	require([
                "dijit/form/MultiSelect", "dijit/form/Button",
                "dojo/dom", "dojo/_base/window","dojo/_base/array", "dojo/domReady!"
        ], function(MultiSelect, Button, dom, win,array){          
            var sel = dijit.byId(liste);    
            array.forEach(sel.get('value'), function(item){
                    var oReq = new XMLHttpRequest();
                    oReq.onload = function(e) {  
                                                if (this.status == 200) {
                                                  var data = JSON.parse(oReq.response); 
                                                  if (!data.erreur && sel.domNode) {
                                                      AfficherNombredefichiersparListe(sel);
//                                                      dom.byId('zoneinfo').innerHTML = "<p>"+dojo.query('option', sel.domNode).length+" fichiers sélectionnés!</p>";
                                                  }
                                                }
                    }   
//                    oReq.open("POST", href+"effacerfichier/"+item, true);
                    oReq.open("POST", "effacerfichier/"+item, true);
                    oReq.send();
            });
            sel.getSelected().forEach(function(n,index){
                dojo.destroy(n);              
            });
            sel.set("value",[]);
            sel.invertSelection();
//            console.log(sel.get('value'));
	});	
}

function handleFiles(files,href,liste) {
fileElem = document.getElementById("message_file");
state = document.getElementById('status');
//  if (!files.length) {
////    state.innerHTML = "<p>Aucun fichier sélectionné!</p>";
//  } else {
//    state.innerHTML = "<p>"+files.length+" fichiers sélectionnés!</p>";      
    for (var i = 0; i < files.length; i++) {        
//        DessineComboBoutton(i,files[i].name + ": " + files[i].size + " bytes",files[i].name,"holder","last",href);
        AjoutlistefichierFiles(liste,files[i].name,files[i].size);
        sendFile(files[i],href+"upload");   
    }
//  }
}

function sendFile(file,uri) {
    var xhr = new XMLHttpRequest();
    var fd = new FormData();
//    fd.append('form_file', file); 
    fd.append('document[file]', file);
    xhr.open("POST", uri, true);
//    xhr.onreadystatechange = function() {
//        if (xhr.readyState == 4 && xhr.status == 200) {
//            // Handle response.
//            console.log(xhr.responseText); // handle response.
//        }
//    };
    xhr.onload = function() {
      if (this.status == 200) {
        var resp = JSON.parse(this.response);
        console.log('Réponse:', resp);
      };
    };    
//    fd.append('document[file]', file);     
    // Initiate a multipart/form-data upload
    xhr.send(fd);
}