var table = new Tabulator("#tabla_libretas", {
  layout: "fitDataTable",
  ajaxURL: "../datos_tabla_libretas.php",
  ajaxCache: false,
  pagination: "local",
  paginationSize: 11,
  frozenRows: 0,

  //field se refiere a la clave del json
  columns: [
    {
      title: "Estudiante: ",
      columns: [
        {
          title: "DNI: ",
          columns: [
            {
              title: "Sede: ",
              columns: [
                { title: "Materia", field: "", editor: "" },
                { title: "Primer Trimestre", field: "", editor: "" },
                { title: "Segundo Trimestre", field: "", editor: "" },
                { title: "Tercer Trimestre", field: "", editor: "" },
                { title: "Promedio Trimestral", field: "" },
                { title: "DIC", field: "", editor: "" },
                { title: "FEB", field: "", editor: "" },
                { title: "Calif Def.", field: "" },
                { title: "Estado", field: "" },
              ],
            },
          ],
        },
      ],
    },
  ],
});
