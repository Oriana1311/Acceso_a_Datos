<?php
session_start();

// $usuario = $_SESSION["usuario"];

session_destroy(); //DESTRUYE LA SESION ACTUAL

header("location: index.php"); //REDIRECCIONA AL INDEX.PHP

?>