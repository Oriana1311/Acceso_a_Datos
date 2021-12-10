<?php
    session_start();

    if(!isset($_SESSION["usuario"])){
        header('Location: index.php');
    }

    include 'cabecera.php';
    
    $conn = mysqli_connect("localhost", "root", "", "bdamorosos");
    
    $usuario = $_SESSION["usuario"]; //SE CREA LA SESION DE UN USUARIO
    
    $sql = "SELECT nombre FROM usuarios WHERE usuario = '".$usuario."'"; 
    
    $result = mysqli_query($conn, $sql); //SE HACE UNA QUERY PARA RECOGER SU NOMBRE Y MOSTRARLO
    
    $fila = mysqli_fetch_array($result);
    
    echo "<h1>Bienvenid@ ".$fila["nombre"]."! </h1>";
    
    echo "<p>Has entrado ".$_COOKIE[$usuario]. " veces.</p>" //CONTADOR DE VISTAS POR MEDIO DE COOKIES

?>
<hr>
<h2>¿Qué quieres hacer?</h2>
<p><a href="modificar.php">Modificar datos del perfil</a></p>



<?php 

echo '<p><a href="cerrar_sesion.php">Salir</a></p>'; //SALIR DE LA SESION ACTUAL

include "footer.php"; 

?>