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
            {title:"Con", field:"T1N1Concepto", editor:"input"},
            {title:"Promedio", field:"T1N2Promedio",headerVertical:true},
            {title:"Rec", field:"T1N3Recuperatorio", editor:"input"},
            ],
        },
        
        {title: "Segundo Trimestre", columns:[ 
            {title:"Nota 4", field:"T2N4Envio", editor:"input"},
            {title:"Nota 5", field:"T2N5Envio", editor:"input"},
            {title:"Nota 6", field:"T2N6Envio", editor:"input"},
            {title:"Con", field:"T2N1Concepto", editor:"input"},
            {title:"Promedio", field:"T2N2Promedio",headerVertical:true},
            {title:"Rec", field:"T2N3Recuperatorio", editor:"input"},
            ],
        },
        
        {title: "Tercer Trimestre", columns:[
            {title:"Nota 7", field:"T3N7Envio", editor:"input"},
            {title:"Nota 8", field:"T3N8Envio", editor:"input"},
            {title:"Nota 9", field:"T3N9Envio", editor:"input"},
            {title:"Con", field:"T3N1Concepto", editor:"input"},
            {title:"Promedio", field:"T3N2Promedio",headerVertical:true},
            {title:"Rec", field:"T3N3Recuperatorio", editor:"input"},
        ],
        },
        {title: "Prom. Trim.", field:"T4N1PromTrim",headerVertical:true},
        {title: "DIC", field:"T4N2Diciembre",headerVertical:true, editor:"input"},
        {title: "FEB", field:"T4N3Febrero",headerVertical:true, editor:"input"},
        {title: "Calif Def.", field:"T4N5CalifDef",headerVertical:true},
        {title: "Estado", field:"T4N6Estado",headerVertical:true},

        ],
    });
    

table.on("cellEdited", function(cell){
    let fila = cell.getRow().getData();

    console.log(fila);
    
    fetch("../controlador/controlador_guardar_notas.php", {
    method: "POST",
    headers: {
        "Content-Type": "application/json"
    },
    body: JSON.stringify(fila)
    })
    .then(res => res.json())
    .then(resp => {
    console.log('Guardado de notas: ' + resp);
    });

/*
    fetch("../controlador/controlador_calcular_promedios.php", {
    method: "POST",
    headers: {
        "Content-Type": "application/json"
    },
    body: JSON.stringify(fila)
    })
    .then(res => res.json())
    .then(resp => {
    console.log('Calculo de promedio: ' + resp);
    });
*/  


});



