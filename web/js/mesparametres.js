require([
	'dojo/parser',
	'dojo/_base/Deferred',
	'gridx/tests/support/data/TreeColumnarTestData',
	'gridx/tests/support/data/TreeNestedTestData',
	'gridx/tests/support/stores/ItemFileWriteStore',
	'gridx/allModules',
        'dojo/store/Memory',
	'gridx/Grid',
        'dijit/Editor',
	'gridx/core/model/cache/Sync',
	'gridx/core/model/cache/Async',
	'dijit/ProgressBar',
	'dijit/form/NumberTextBox',
	'dojo/domReady!'
], function(parser, Deferred, dataSource, nestedDataSource, storeFactory, modules,Memory){
    
var url = window.location.href;
var userlogin, usernom, usergroupe, userrole, userid, refuser;
                        
        niveau = 1;
        structure_organisations = [         
            {field: 'nom',name: 'Organisation',datatype: "string",width:'150px', filterable: true},
            {field: 'tel',name: 'Téléphone',datatype: "string",width:'100px'},  
            {field: 'fax',name: 'Fax',datatype: "string",width:'100px'},                 
            {field: 'email',name: 'Mel',datatype: "string",width:'150px'},          
            {field: 'nomville',name: 'Ville',datatype: "string",width:'auto', filterable: true},   
            {field: 'referent',name: 'Le référent',datatype: "string",width:'auto', filterable: true}, 
        ]; 
    
        structure_contacts = [ 
         {field: 'nom',name: 'Contact',datatype: "string",width:'150px', filterable: true}, 
         {field: 'tel',name: 'Téléphone',datatype: "string",width:'100px'},  
         {field: 'mobile',name: 'Mobile',datatype: "string",width:'100px'},                  
         {field: 'email',name: 'Mel',datatype: "string",width:'150px'},
         {field: 'centresinteret',name: 'Centres d\'Intérêt',datatype: "string",width:'150px'},        
        ];     
        structure_devis = [                      
            {field: 'reference',name: 'Référence',width:'100px', expandLevel: 'all'}, 
            {field: 'createdAt',name: 'Date',width:'100px'},        
            {field: 'contact',name: 'Contact',width:'100px'}, 
            {field: 'referent',name: 'Le Référent',width:'250px'}       
        ]; 
    
        structure_commandes = [                      
                {field: 'numcommande',name: 'Num Commande',datatype: "string",width:'100px', filterable: true}, 
                {field: 'createdAt',name: 'Date',datatype: "string",width:'100px'},        
                {field: 'contact',name: 'Contact',datatype: "string",width:'250px'}, 
                {field: 'referent',name: 'Le Référent',datatype: "string",width:'250px'}       
        ];     
        
        structure_devis_en_cours = [    
            {field: 'reference',name: 'Référence',datatype: "string",width:'auto'},  
            {field: 'dossier',name: 'Dossier',datatype: "string",width:'auto'},          
            {field: 'organisation',name: 'Organisation',datatype: "string",width:'auto'},  
            {field: 'datedevis',name: 'Date',datatype: "string",width:'auto'},        
            {field: 'contact',name: 'Contact',datatype: "string",width:'auto'},  
            {field: 'referent',name: 'Le référent',datatype: "string",width:'auto'},  
            {field: 'mail',name: '@',width:'20px'}       
        ];     
        
        structure_produits = [         
            {field: 'reference',name: 'Référence',datatype: "string",width:'100px', filterable: true}, 
            {field: 'libelle',name: 'Libellé',datatype: "string",width:'250px'}  
        ];  
    
        structure_lignes_devis = [       
    {field: 'ordre',name: 'Ordre',datatype: "string",width:'25px',style: "text-align: right"},                 
    {field: 'reference',name: 'Référence',datatype: "string",width:'100px',style: "text-align: left", filterable: true}, 
    {field: 'description',name: 'Libellé',datatype: "string",width:'250px',
        style: "text-align: left",
        editable: true,
        editor: "dijit.Editor",
//        editorArgs: {
////            type: "dijit/Editor",
//            props:"extraPlugins:['foreColor','hiliteColor',{name:'dijit/_editor/plugins/FontChoice', command:'fontName', generic:true}]"
//        }    
    },  
    {field: 'quantite',name: 'Qt',datatype: "string",width:'50px',
//                                    widgetsInCell: true, 
//                                    navigable: true, 
                        style: "text-align: center",
                        editable: true,
//                                    widgetsInCell: true,
//                                    decorator: function(){
//                                        return "<div data-dojo-type='dijit.form.NumberSpinner' data-dojo-props='minimum: 1' " + 
//                                            "class='gridxHasGridCellValue' style='width: 100%;' data-dojo-attach-point='qte'></div>";
//                                    }, 
//                                    setCellValue: function(gridData, storeData, cellWidget){
//                                //        var data = doSomethingIntersting(gridData);
//                                //        cellWidget.progBar.set('value', data);
//                                        // cellWidget.cell give you full access to everything you want.
//                                        var data = parseInt(gridData);
//                                        var rowIndex = cellWidget.cell.row.index();
//                                        cellWidget.qte.set('value',data);   
////                                        console.log(gridData+"----"+rowIndex+"----"+storeData+"---");
//                                    },                             
//                                    getCellWidgetConnects: function(cellWidget, cell){
//                                        // return an array of connection arguments
//                                        return [
//                                            [cellWidget.quantite, 'onChange', function(e){
//                                                console.log(e);
////                                                var indicerow = cell.row.index();              
////                                                var item = _this.row(indicerow).item();
////                                                var row = _this.model.byId(cell.row.id);  
////                                                item = row.rawData;                
////                                                item.totalht = item.quantite*item.prixht*(100-item.remise)/100; 
////                                                _this.store.put(item); 
////                                                _this.calculerTotalHt();
//                                                // do your job here.....
//                                            }]
//                                        ];
//                                    },                                    
                        editor: "dijit/form/NumberSpinner",
//                        editorArgs: {
//                            onApply: function(cell, applySuccess){
//                                console.log('toto');
//                            }
//                        }, 
    }, 
    {field: 'prixht',name: 'Prix HT',datatype: "string",width:'100px',
            style: "text-align: center",
            editable: true,
            editor: "dijit.form.CurrencyTextBox",
            editorArgs: {
                type: "dijit/form/CurrencyTextBox",
                props: 'constraints:{fractional:true},currency: "EUR",lang: "fr-fr",'
            },
            formatter: function(rawData){
                return isNaN(rawData.prixht) ? '' : parseFloat(rawData.prixht).toFixed(2)+' €';
            },
    },  
    {field: 'remise',name: 'Remise<br>%',datatype: "string",width:'50px', 
            style: "text-align: center",
            editable: true,
            editor: "dijit.form.CurrencyTextBox",
            editorArgs: {
                type: "dijit/form/CurrencyTextBox",                
                props: 'constraints:{fractional:true},currency: "%",lang: "fr-fr",'
            },
            formatter: function(rawData){
                return isNaN(rawData.remise) ? '' : parseFloat(rawData.remise).toFixed(2)+' %';
            },                        
    },
    {field: 'totalht',name: 'Total HT',datatype: "string",width:'100px', 
            style: "text-align: right",
            editable: false,
            editor: "dijit/form/CurrencyTextBox",
            editorArgs: {
                props: 'constraints:{fractional:true},currency: "EUR",lang: "fr-fr",disabled="true"'
            },
//                        widgetsInCell: true,
//                        decorator: function(){
//                            return "<div data-dojo-type='dijit.form.CurrencyTextBox' constraints='{fractional:true}' currency='EUR' " + 
//                                "class='gridxHasGridCellValue' style='width: 100%;' data-dojo-attach-point='totalht' disabled='true'></div>";
////                        return "<input type='text' name='income1' id='income1' dojoType='dijit.form.CurrencyTextBox'"+  data-dojo-attach-event='onChange:console.log(this.value)'
////                            "required='true' constraints='{fractional:true}' currency='EUR' invalidMessage='La valeur saisie est incorrecte.'>";
//                        },    
            formatter: function(rawData){
                return isNaN(rawData.totalht) ? '' : parseFloat(rawData.totalht).toFixed(2)+' €';
            },
//                            setCellValue: function(gridData, storeData, cellWidget){
//                        //        var data = doSomethingIntersting(gridData);
//                        //        cellWidget.progBar.set('value', data);
//                                // cellWidget.cell give you full access to everything you want.
//                                var data = parseFloat(gridData).toFixed(2);
//                                var rowIndex = cellWidget.cell.row.index();
//                                cellWidget.totalht.set('value',data);
////                                cellWidget.qte.set('value', parseInt(rowIndex));
////                                console.log(gridData+"----"+rowIndex+"----"+storeData+"---");
//                            },  
    },                
    ];                 
    
	mods_tree = [
		modules.Tree,
		modules.Pagination,
		modules.PaginationBar,
		modules.ColumnResizer,
		modules.SelectRow,
		modules.ExtendedSelectRow,
		modules.CellWidget,
		modules.Edit,
		modules.IndirectSelectColumn,
		modules.SingleSort,
		modules.VirtualVScroller,
//                modules.SingleSort,
//                modules.RowHeader,
//                modules.IndirectSelect,
                modules.Filter,
                modules.FilterBar,
                modules.QuickFilter,
                modules.Menu,
                modules.Bar,        
	];    
	mods_devis = [
		modules.Tree,
		modules.Pagination,
		modules.PaginationBar,
		modules.ColumnResizer,
//		modules.SelectRow,
//		modules.ExtendedSelectRow,
//		modules.CellWidget,
//		modules.Edit,
//		modules.IndirectSelectColumn,
//		modules.SingleSort,
		modules.VirtualVScroller,
//                modules.SingleSort,
//                modules.RowHeader,
//                modules.IndirectSelect,
                modules.Filter,
                modules.FilterBar,
                modules.QuickFilter,
                modules.Menu,
                modules.Bar,        
	];
	mods = [
                modules.VirtualVScroller,
                modules.SingleSort,
                modules.RowHeader,
                modules.SelectRow,
                modules.IndirectSelect,
                modules.MoveRow,
                modules.DndRow,
                modules.SelectColumn,
                modules.MoveColumn,
                modules.DndColumn,
                modules.Pagination,
                modules.Filter,
                modules.FilterBar,
                modules.QuickFilter,
                modules.Focus,
                modules.PaginationBarDD,
                modules.ColumnResizer,
                modules.CellWidget,
                modules.Edit,
                modules.ExtendedSelectCell,
                modules.Menu,
                modules.Bar,
                modules.ExtendedSelectRow, 
                modules.NestedSort,           
	];
        store_null = new Memory({ data: null});
        
        produitsStore.query().then(function(produits){ 
                    StoreProduits = new Memory({
                    data: produits
                    }); 
//                    grilleproduits.setStore(StoreProduits);                        
        });        
        
	seed = 9973;

	randomNumber = function(range){
		var a = 8887;
		var c = 9643;
		var m = 8677;
		seed = (a * seed + c) % m;
		var res = Math.floor(seed / m * range);
		return res;
	};

	chars = "0,1,2,3,4,5,6,7,8,9,a,b,c,d,e,f,g,h,i,j,k,l,m,n,k,o,p,q,r,s,t,u,v,w,x,y,z".split(',');
	lettres = "a,b,c,d,e,f,g,h,i,j,k,l,m,n,k,o,p,q,r,s,t,u,v,w,x,y,z".split(','); 
	chiffres = "0,1,2,3,4,5,6,7,8,9".split(',');        
	randomString = function(long){
		var len = randomNumber(long)+1, i, str = [];
		for(i = 0; i < len; ++i){
			str.push(lettres[randomNumber(lettres.length)]);
		}
		return str.join('');
	};

	randomDate = function(){
		return new Date(randomNumber(10000000000000));
	};
	genererOrganisation = function(){
                var dd = randomDate().toDateString();
                var nn = randomString(15);
		return {
			nom: nn,
			created_at: dd,
			updated_at: dd, 
                        web: "http://www."+randomString(10)+".fr",
                        email: nn+"@test.fr",
                        fax: "01 02 03 04 05",
                        tel: "01 02 03 04 05",  
                        adresse : randomNumber(100)+" rue "+randomString(15),
                        statut_id : randomNumber(2)+1,
                        referent_id : randomNumber(10)+1,
                        ville_id: randomNumber(1540)+1,
                        description : randomString()+" "+randomString()                        
		};
	};
        
	genererContact = function(idorg){
                var dd = randomDate().toDateString();
                var nom = randomString(15);
                var prenom = randomString(15);
		return {
                        civilite_id : randomNumber(2)+1,
                        ville_id : randomNumber(1540)+1,
                        saisipar_id : randomNumber(7)+1,
                        organisation_id: idorg,
                        service_id : randomNumber(8)+1,
			nom: nom,
                        prenom : prenom,
                        email: nom+"@test.fr",
                        fixe: "01 02 03 04 05",
                        fax : "01 02 03 04 05",
                        mobile : "06 06 06 06 06",
                        adresse : "",
                        observation : "",
			created_at: dd,
			updated_at: dd, 
			connected_at: dd,
                        centreinteret_id: randomNumber(5)+1,
		};
	};        
        
	parser.parse();
});        

