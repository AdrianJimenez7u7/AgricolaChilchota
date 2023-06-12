const seccion = document.querySelector(".informacion");
const seccionProductos = document.querySelector(".InfoProductos");
const seccionJV = document.querySelector(".infoJuevesViernes");
const seccionIN = document.querySelector(".inputs");
const seccionProd = document.querySelector(".inputsProd");


$(seccion).load('principal/tabla.php');
$(seccionProductos).load('principal/tablaProductos.php');
$(seccionJV).load('principal/tablaJuevesViernes.php');
$(seccionIN).load('inputs.php');
//$(seccionProd).load('principal/inputsProductos.php');

function exportarTabla() {
  var tabla = document.getElementById("tablaRegistros");
  var contenidoCSV = [];
  var sumaImporte = 0;

  // Iterar sobre las filas y columnas de la tabla HTML
  for (var i = 0; i < tabla.rows.length; i++) {
    var filaTabla = tabla.rows[i];
    var contenidoFila = [];

    for (var j = 0; j < filaTabla.cells.length; j++) {
      var celdaTabla = filaTabla.cells[j];

      // Limpiar el contenido de la celda y escapar caracteres especiales
      var contenidoCelda = celdaTabla.innerText.replace(/"/g, '""');
      contenidoFila.push('"' + contenidoCelda + '"');

      // Sumar los valores de la columna "Importe"
      if (j === 6) {
        var valorImporte = parseFloat(contenidoCelda);
        if (!isNaN(valorImporte)) {
          sumaImporte += valorImporte;
        }
      }
    }

    contenidoCSV.push(contenidoFila.join(","));
  }

  var contenidoFinal = contenidoCSV.join("\n");
  var blob = new Blob([contenidoFinal], { type: "text/csv;charset=utf-8;" });
  var url = URL.createObjectURL(blob);
  var a = document.createElement("a");
  a.href = url;
  a.download = "tabla.csv";
  a.click();
  URL.revokeObjectURL(url);

  // Mostrar la suma de la columna "Importe"
  alert("Suma de Importe: " + sumaImporte);
}

  //pdf
  function exportarTablaPDF() {
    var tabla = document.getElementById("tablaRegistros");
    var filas = tabla.getElementsByTagName("tr");
  
    var doc = new jsPDF();
  
    var y = 10; // Posición inicial en el eje Y
  
    for (var i = 0; i < filas.length; i++) {
      var celdas = filas[i].getElementsByTagName("td");
  
      for (var j = 0; j < celdas.length; j++) {
        var texto = celdas[j].innerText;
        doc.text(10, y, texto);
        y += 10; // Aumentar la posición en el eje Y para la siguiente celda
      }
  
      y += 10; // Aumentar la posición en el eje Y para la siguiente fila
    }
  
    doc.save("tabla.pdf");
  }
