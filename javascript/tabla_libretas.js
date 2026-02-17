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

table.on("dataLoaded", function (data) {
  if (data.length > 0) {
    let nombre = data[0].nombre_alumno;
    let dni = data[0].dni_alumno;
    let sede = data[0].nombre_sede;

    table.setColumns([
      {
        title: `Estudiante: ${nombre}`,
        columns: [
          {
            title: `DNI: ${dni}`,
            columns: [
              {
                title: `Sede: ${sede}`,
                columns: [
                  { title: "Materia", field: "nombre_materia" },
                  { title: "Primer Trimestre", field: "T1N2Promedio" },
                  { title: "Segundo Trimestre", field: "T2N2Promedio" },
                  { title: "Tercer Trimestre", field: "T3N2Promedio" },
                  { title: "Promedio Trimestral", field: "T4N1PromTrim" },
                  { title: "DIC", field: "T4N2Diciembre" },
                  { title: "FEB", field: "T4N3Febrero" },
                  { title: "Calif Def.", field: "T4N5CalifDef" },
                ],
              },
            ],
          },
        ],
      },
    ]);
  }
});

document.getElementById("download-pdf").addEventListener("click", function () {
  table.download("pdf", "Libreta.pdf", {
    orientation: "portrait", //set page orientation to portrait
    title: "Boletin de Calificaciones: ESRTIC", //add title to report
  });
});
