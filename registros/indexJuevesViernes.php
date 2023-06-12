<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script defer src="principal/frontend.js"></script>
    <link rel="stylesheet" href="modal/modal.css">
    <link rel="stylesheet" href="assets/estilos.css">
    <link rel="stylesheet" href="assets/jquery/jquery.dataTables.min.css">
    <link rel="stylesheet" href="assets/jquery/responsive.dataTables.min.css">
</head>
<body>
<?php
session_start();
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    // Si no ha iniciado sesión, redirigir al formulario de inicio de sesión
    header("Location: login.html");
    exit();
}
?>
    <header>
        <div class="barra">
            <h2>Agrícola  <br> Chilchota</h2><img src="assets/imagenes/menu.png">
            <ul>
                <li ><a href="index.php">Registros</a></li>
                <li ><a href="#">Vistas</a>
                <ul>
                    <li>
                        <a href="indexjuevesViernes.php">jueves y viernes</a>
                    </li>
                </ul>
                </li>
                <li><a href="indexProductos.php">productos</a></li>
                <li ><a href="#">Modificar</a></li>
                <li ><a href="#">Opciones</a></li>
                <li><a href='logout.php'>Cerrar sesión</a></li>
            </ul>
        </div>
        <div class="imagen">
            <img src="assets/imagenes/logo.jpg" width="150px" height="150px">
        </div>
        <div class="support">
            <h3>bienvenido</h3>
            <div class="usuario">
            <img src="assets/imagenes/usuario.png" width="150px" height="150px">
            <h2>usuario</h2>
            </div>
        </div>
    </header>
    <div class="container-seccion">
    <button onclick="exportarTabla()" class="excel">Excel</button>
    <button onclick="exportarTablaPDF()" class="PDF">PDF</button>
        <div class="infoJuevesViernes" id="infoJuevesViernes">
        
        </div>
        <script  src="assets/jquery/jquery-3.5.1.js"></script> 
        <script  src="assets/jquery/jquery.dataTables.min.js"></script>
        <script src="assets/jquery/dataTables.responsive.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.3/jspdf.umd.min.js"></script>
        <script>
            $(document).ready(function () {
            $('#tablaRegistros').DataTable();
            });
        </script>
    </div>
    
</body>
</html>