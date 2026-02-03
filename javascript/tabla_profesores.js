//Esto crea un objeto que está modelado en la libreria de tabulator. Se manda el objeto y tabulator lo instancia 

//AjaxURL se refiere a la url desde donde se van a obtener los datos partiendo desde planilla_materias.php ya que es donde se carga tabla.js

var table = new Tabulator("#tabla_profesores", {
    layout:"fitDataTable",
    ajaxURL: "../datos_tabla_profesores.php",
    ajaxCache: false,
    pagination: "local",
    paginationSize: 20, 
    frozenRows:0,

    //field se refiere a la clave del json
    columns:[

        {title: "Datos del alumno:", columns:[
            {title:"Nombre", field:"nombre", headerFilter:"input", headerFilterPlaceholder:"Distingue tildes"},
            {title:"Año", field:"ano", headerFilter:"list",headerFilterParams:{valuesLookup:true, clearable:true}},
            {title:"Sede", field:"sede", headerFilter:"list",headerFilterParams:{valuesLookup:true, clearable:true}},
            ],
        },  

        {title: "Primer Trimestre", columns:[ 
            {title:"Nota 1", field:"T1N1Envio", editor: "input"},
            {title:"Nota 2", field:"T1N2Envio", editor:"input"},
            {title:"Nota 3", field:"T1N3Envio", editor:"input"},
            {title:"Con", field:"", editor:"input"},
            {title:"Promedio", field:"",headerVertical:true},
            {title:"Rec", field:"", editor:"input"},
            ],
        },
        
        {title: "Segundo Trimestre", columns:[ 
            {title:"Nota 4", field:"T2N4Envio", editor:"input"},
            {title:"Nota 5", field:"T2N5Envio", editor:"input"},
            {title:"Nota 6", field:"T2N6Envio", editor:"input"},
            {title:"Con", field:"", editor:"input"},
            {title:"Promedio", field:"",headerVertical:true},
            {title:"Rec", field:"", editor:"input"},
            ],
        },
        
        {title: "Tercer Trimestre", columns:[
            {title:"Nota 7", field:"T3N7Envio", editor:"input"},
            {title:"Nota 8", field:"T3N8Envio", editor:"input"},
            {title:"Nota 9", field:"T3N9Envio", editor:"input"},
            {title:"Con", field:"", editor:"input"},
            {title:"Promedio", field:"",headerVertical:true},
            {title:"Rec", field:"", editor:"input"},
        ],
        },
        {title: "Prom. Trim.", field:"",headerVertical:true},
        {title: "DIC", field:"",headerVertical:true, editor:"input"},
        {title: "FEB", field:"",headerVertical:true, editor:"input"},
        {title: "Calif Def.", field:"",headerVertical:true},
        {title: "Estado", field:"",headerVertical:true},

        ],
    });
    

table.on("cellEdited", function(cell){
    let fila = cell.getRow().getData();
    
    //console.log(fila);

    fetch("../controlador/controlador_guardar_notas.php", {
    method: "POST",
    headers: {
        "Content-Type": "application/json"
    },
    body: JSON.stringify(fila)
    })
    .then(res => res.json())
    .then(resp => {
    console.log(resp);
    });


});



