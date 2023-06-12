<?php
$hostname = "localhost";
$username = "root";  
$password = "";
$database = "control_almacen"; 
$conn = mysqli_connect($hostname, $username, $password, $database);
?>      
<html>
    <body>  
    <form class="formulario" action="conexion.php" method="post">
    <input name="Fecha" id="Fecha" class="Fecha" type="date" placeholder="Fecha">

    <select name="Concepto" class="from-control">
        <?php       
        $getConcepto = 'select * from conceptos';
        $getConcepto2 = mysqli_query($conn, $getConcepto);    
        while($row = mysqli_fetch_array($getConcepto2)){
            $idConcepto = $row['IDconcepto'];
            $concepto = $row['concepto'];
            ?>
            <option value="<?php echo $concepto ?>"><?php echo $concepto ?></option>
            <?php   
        }
        ?>
    </select>

    <select name="Almacen" class="from-control">
        <?php          
        $consulta = "SELECT * FROM areas";     
        $result = mysqli_query($conn, $consulta);      
        while($row = mysqli_fetch_array($result)){
            $ID = $row['IDalmacen'];
            $almacen = $row['almacen'];
            ?>
            <option value="<?php echo $almacen ?>"><?php echo $almacen ?></option>
            <?php   
        }
        ?>
    </select>

    <select name="Rancho" class="from-control">
        <?php       
        $getRanchos = 'select * from ranchos';
        $getRanchos2 = mysqli_query($conn, $getRanchos);    
        while($row = mysqli_fetch_array($getRanchos2)){
            $id = $row['ID'];
            $rancho = $row['Rancho'];
            ?>
            <option value="<?php echo $rancho ?>"><?php echo $rancho ?></option>
            <?php   
        }
        ?>
    </select>

    <select name="Productos" class="from-control">
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

    <input name="Cantidad" id="Cantidad" class="Cantidad" type="number" placeholder="Cantidad">
    <input name="Proveedor" id="Proveedor" class="Proveedor" type="text" placeholder="Proveedor">
    <input name="NoSalida" id="NoSalida" class="NoSalida" type="number" placeholder="No.Entrada">

    <button class="anadir">añadir</button>
    
</form>
    </body>
</html>