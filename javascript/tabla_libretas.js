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
                { title: "Materia", field: "nombre_materia", editor: "" },
                {
                  title: "Primer Trimestre",
                  field: "T1N2Promedio",
                  editor: "",
                },
                {
                  title: "Segundo Trimestre",
                  field: "T2N2Promedio",
                  editor: "",
                },
                {
                  title: "Tercer Trimestre",
                  field: "T3N2Promedio",
                  editor: "",
                },
                { title: "Promedio Trimestral", field: "T4N1PromTrim" },
                { title: "DIC", field: "T4N2Diciembre", editor: "" },
                { title: "FEB", field: "T4N3Febrero", editor: "" },
                { title: "Calif Def.", field: "T4N5CalifDef" },
              ],
            },
          ],
        },
      ],
    },
  ],
});
