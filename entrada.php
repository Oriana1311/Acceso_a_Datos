<?php
    session_start();

    include 'cabecera.php';
    
    $conn = mysqli_connect("localhost", "root", "", "bdamorosos");
    
    $usuario = $_SESSION["usuario"];
    
    $sql = "SELECT nombre FROM usuarios WHERE usuario = '".$usuario."'";
    
    $result = mysqli_query($conn, $sql);
    
    $fila = mysqli_fetch_array($result);
    
    echo "<h1>Bienvenido ".$fila["nombre"]."! </h1>";
    
    echo "Has entrado ".$_COOKIE[$usuario]. " veces."

?>

<!-- <h2>¿Qué quieres hacer?</h2>-->

<?php include "footer.php"; ?>