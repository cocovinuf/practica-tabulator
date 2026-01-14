//Esto crea un objeto que está modelado en la libreria de tabulator. Se manda el objeto y tabulator lo instancia 

//AjaxURL se refiere a la url desde donde se van a obtener los datos partiendo desde home.php ya que es donde se carga tabla.js

var table = new Tabulator("#tabla-alumnos", {
    ajaxURL: "../datos.php",
    ajaxCache: false,
    layout: "fitColumns",
    pagination: "local",
    paginationSize: 20,
    frozenRows:0,

    //field se refiere a la clave del json

        columns: [
        {title:"Nombre", field:"nombre_alumno", headerFilter:"input", headerFilterPlaceholder:"Distingue tildes"},
        {title:"DNI", field:"dni_alumno", headerFilter:"input"},
        {title:"Año", field:"ano_alumno", headerFilter:"list",headerFilterParams:{valuesLookup:true, clearable:true}},
        {title:"Sede", field:"nombre_sede", headerFilter:"list",headerFilterParams:{valuesLookup:true, clearable:true}},
    ],
});
