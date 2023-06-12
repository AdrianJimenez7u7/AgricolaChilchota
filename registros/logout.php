<?php
session_start();

// Cerrar sesión
session_unset();
session_destroy();

// Redirigir al formulario de inicio de sesión
header("Location: login.html");
exit();
?>