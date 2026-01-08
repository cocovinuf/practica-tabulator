//Esto crea un objeto que está modelado en la libreria de tabulator. Se manda el objeto y tabulator lo instancia 


var table = new Tabulator("#tabla-alumnos", {
    ajaxURL: "datos.php",
    ajaxCache: false,
    layout: "fitColumns",
    pagination: "local",
    paginationSize: 50,
    
    //field se refiere a la clave del json
    columns: [
        {title:"Nombre", field:"nombre_alumno"},
        {title:"DNI", field:"dni_alumno"},
        {title:"Año", field:"ano_alumno"},
        {title:"Sede", field:"nombre_sede"},
    ],
});
