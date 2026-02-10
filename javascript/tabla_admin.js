//Esto crea un objeto que está modelado en la libreria de tabulator. Se manda el objeto y tabulator lo instancia 

//AjaxURL se refiere a la url desde donde se van a obtener los datos partiendo desde home.php ya que es donde se carga tabla.js

var table = new Tabulator("#tabla_admin", {
    layout:"fitDataTable",
    ajaxURL: "../datos_tabla_admin.php",
    ajaxCache: false,
    pagination: "local",
    paginationSize: 20,
    frozenRows:0,

    //field se refiere a la clave del json
    columns:[

        {title: "Datos del alumno", columns:[
            {title:"ID", field:"id_alumno", headerFilter:"input"},
            {title:"Nombre", field:"nombre_alumno", headerFilter:"input", headerFilterPlaceholder:"Distingue tildes"},
            {title:"Dni", field:"dni_alumno", headerFilter:"input"},
            {title:"Año Alumno", field:"ano_alumno", headerFilter:"list",headerFilterParams:{valuesLookup:true, clearable:true}},
            {title:"Año Materia", field:"ano_materia", headerFilter:"list",headerFilterParams:{valuesLookup:true, clearable:true}},
            {title:"ID Materia", field:"id_materia", headerFilter:"list",headerFilterParams:{valuesLookup:true, clearable:true}},
            {title:"Materia", field:"nombre_materia", headerFilter:"list",headerFilterParams:{valuesLookup:true, clearable:true}},
            {title:"Sede", field:"nombre_sede", headerFilter:"list",headerFilterParams:{valuesLookup:true, clearable:true}},
            ],
        },  

        {title: "Primer Trimestre", columns:[ 
            {title:"Nota 1", field:"", editor:"input"},
            {title:"Nota 2", field:"", editor:"input"},
            {title:"Nota 3", field:"", editor:"input"},
            {title:"Con", field:"", editor:"input"},
            {title:"Promedio", field:"",headerVertical:true},
            {title:"Rec", field:"", editor:"input"},
            ],
        },
        
        {title: "Segundo Trimestre", columns:[ 
            {title:"Nota 4", field:"", editor:"input"},
            {title:"Nota 5", field:"", editor:"input"},
            {title:"Nota 6", field:"", editor:"input"},
            {title:"Con", field:"", editor:"input"},
            {title:"Promedio", field:"",headerVertical:true},
            {title:"Rec", field:"", editor:"input"},
            ],
        },
        
        {title: "Tercer Trimestre", columns:[
            {title:"Nota 7", field:"", editor:"input"},
            {title:"Nota 8", field:"", editor:"input"},
            {title:"Nota 9", field:"", editor:"input"},
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