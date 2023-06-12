<?php
$hostname = "localhost";
$username = "root";  
$password = "";
$database = "control_almacen"; 
$conn = mysqli_connect($hostname, $username, $password, $database);
?>
<html>
    <body>
    <table id="tablaRegistros" class="table table-striped display responsive nowrap">
                            <thead>
                                <th class="izquierda">No.salida</th>
                                <th>Fecha</th>
                                <th>Almacén</th>
                                <th>Rancho</th>       
                                <th>Productos</th>
                                <th>cantidad</th>
                                <th>Importe</th>
                                <th>Concepto</th>
                                <th>Proovedor</th>
                                <th>FolioSalida</th>
                                <th class="derecha">empleado</th>
                            </thead>
                            <?php 
                            $consulta = "SELECT IDregistro, Fecha, Almacen, Rancho, Productos, Cantidad, Importe, Concepto, Proveedor, FolioSalida, IDempleado FROM entradas_salidas ORDER BY IDregistro DESC LIMIT 1000";
                            $result = mysqli_query($conn, $consulta);
                            while ($fila = mysqli_fetch_array($result)) { ?>
                            <tr>
                                <td><?php echo $fila['IDregistro'] ?></td>
                                <td><?php echo $fila['Fecha'] ?></td>
                                <td><?php echo $fila['Almacen'] ?></td>
                                <td><?php echo $fila['Rancho'] ?></td>
                                <td><?php echo $fila['Productos'] ?></td>
                                <td><?php echo $fila['Cantidad'] ?></td>
                                <td><?php echo $fila['Importe'] ?></td>
                                <td><?php echo $fila['Concepto'] ?></td>
                                <td><?php echo $fila['Proveedor'] ?></td>
                                <td><?php echo $fila['FolioSalida'] ?></td>
                                <td><?php echo $fila['IDempleado'] ?></td>
                            </tr>
                            <?php
                            } ?>
                        </table>
        <script>
            $(document).ready(function () {
            $('#tablaRegistros').DataTable()({
            responsive: true,
            lengthMenu: [10, 25, 50, 100, 500], // Opciones de longitud de página
            pageLength: 100, // Longitud de página predeterminada
            });
            });
        </script>
    </body>
</html>