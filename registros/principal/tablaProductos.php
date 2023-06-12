<?php
$hostname = "localhost";
$username = "root";  
$password = "";
$database = "control_almacen"; 
$conn = mysqli_connect($hostname, $username, $password, $database);
session_start();
?>
<html>
    <body>
    <div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div class="cabezal">
                <h1>Editar</h1>
                </div> 
        <form action="conexionProductos.php" method="post" class="formulario">
            <select name="Productos" class="form-control">
                <?php       
                $getProductos = 'select * from productos';
                $getProductos2 = mysqli_query($conn, $getProductos);    
                while($row = mysqli_fetch_array($getProductos2)){
                    $idProduc = $row['IDproductos'];
                    $productos = $row['Producto'];
                    ?>
                    <option value="<?php echo $productos ?>"><?php echo $productos ?></option>
                    <?php   
                }
                ?>
            </select>
            <input name="Precio" id="Precio" class="Precio" type="number" placeholder="Precio">
            <button class="anadir" type="submit">editar</button>
        </form>
    </div>
    </div>
    <table id="tablaRegistros" class="table table-striped display responsive nowrap">
                            <thead>
                                <th class="izquierda">IDProducto</th>
                                <th>Producto</th>
                                <th>disponible</th>
                                <th>Precio</th>
                                <th>Medida</th>
                                <th>Clasificacion</th>
                                <th class="derecha">Empleado</th>
                            </thead>
                            <?php 
                            $consulta = "SELECT * FROM productos ORDER BY IDproductos";
                            $result = mysqli_query($conn, $consulta);
                            while ($fila = mysqli_fetch_array($result)) { ?>
                            <tr>
                                <td><?php echo $fila['IDproductos'] ?></td>
                                <td><?php echo $fila['Producto'] ?></td>
                                <td><?php echo $fila['disponible'] ?></td>
                                <td><?php echo $fila['Precio'] ?></td>
                                <td><?php echo $fila['UnidadMedida'] ?></td>
                                <td><?php echo $fila['Clasificacion'] ?></td>
                                <td><?php echo $fila['IDempleado'] ?></td>
                            </tr>
                            <?php
                            } ?>
                        </table>
        <script  defer src="modal/modal.js"></script>
        <link rel="stylesheet" href="modal/modal.css">
        <script src="assets/popper/popper.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function () {
            $('#tablaRegistros').DataTable()({
            responsive:true
            });
            });
        </script>
    </body>
</html>