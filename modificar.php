<?php

session_start();

include 'cabecera.php';

$conn = mysqli_connect("localhost", "root", "", "bdamorosos");

$usuario = $_SESSION["usuario"];

$sql = "SELECT * FROM usuarios WHERE usuario = '".$usuario."'";

$result = mysqli_query($conn, $sql);

$fila = mysqli_fetch_array($result);

echo "<h1>Modificar datos </h1>";

//VALIDACION

$errNombre = $errEmail = "";
$nombre = $email = "";
$errores = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

   if (!preg_match("/^[a-zA-Z-' ]*$/", $nombre)) {
        $errNombre = "Sólo se permiten letras y espacios en blanco";
        $errores = 1;
    } else {
        $nombre = $_POST['nombre'];
    }

    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "El formato no es válido";
        $errores = 1;
    } else {
        $email = $_POST['email'];
    }

    $sqlSelect = "SELECT * FROM usuarios WHERE usuario = '" . $usuario . "'";

    $result = mysqli_query($conn, $sqlSelect);

    if (mysqli_num_rows($result) >= 1) {
        $errUsuario = "El usuario ya existe";
        $errores = 1;
    }
}

$_SESSION["usuario"] = $usuario;

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>


<!--FORMULARIO HTML PARA MODIFICAR DATOS-->

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form-hero" method="POST">
        <p> 
            <span class="error"> <?php echo $errNombre ?></span><br>
            <label for="usernamesignup" class="uname" >Nombre</label>
            <input id="usernamesignup" name="nombre" type="text" value="<?php echo $fila['nombre']; ?>"  />
        </p>
        <p> 
            <span class="error"> <?php echo $errEmail ?></span><br>
            <label for="emailsignup" class="youmail" > Email</label>
            <input id="emailsignup" name="email" type="text" value="<?php echo $fila['email']; ?>" /> 
        </p>

        <p class="signin button"> 
            <input type="submit" value="Modificar" name="submit"/> 
        </p>

    </form>

<?php 

include "footer.php"; 



if (isset($_POST['submit'])) { //COMPRUEBA SI SE HA ACCIONADO EL BOTÓN

    $splupdate = "UPDATE usuarios SET nombre= '".$nombre."', email = '".$email."' where usuario='".$usuario."';"; //UPDATE EN LA BD

    if(mysqli_query($conn, $splupdate)){
        header("Location: entrada.php"); 
    } 
}

?>

