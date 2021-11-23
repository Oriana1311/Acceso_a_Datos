<?php
session_start();

include "cabecera.php";

$conn = mysqli_connect("localhost", "root", "", "bdamorosos");

$errNombre = $errUsuario = $errEmail = $errContrasenna = $errContrasenna2 = "";
$nombre = $usuario = $email = $contrasenna = $contrasenna2 = "";
$errores = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["nombre"])) {
        $errNombre = "Rellena el campo Nombre";
        $errores = 1;
    } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $nombre)) {
        $errNombre = "Sólo se permiten letras y espacios en blanco";
        $errores = 1;
    } else {
        $nombre = $_POST['nombre'];
    }

    if (empty($_POST["usuario"])) {
        $errUsuario = "Rellena el campo Usuario";
        $errores = 1;
    } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $usuario)) {
        $errUsuario = "Sólo se permiten letras y espacios en blanco";
        $errores = 1;
    } else {
        $usuario = $_POST["usuario"];
    }

    if (empty($_POST["email"])) {
        $errEmail = "Rellena el campo Email";
        $errores = 1;
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "El formato no es válido";
        $errores = 1;
    } else {
        $email = $_POST['email'];
    }

    if (empty($_POST["contrasenna"])) {
        $errContrasenna = "Rellena el campo Contraseña";
        $errores = 1;
    } else {
        $contrasenna = $_POST['contrasenna'];
    }

    if (empty($_POST["contrasenna2"])) {
        $errContrasenna2 = "Rellena el campo de confirmación de Contraseña";
        $errores = 1;
    } else {
        $contrasenna2 = $_POST['contrasenna2'];
    }

    if ($contrasenna != $contrasenna2) {
        $errContrasenna2 = "Las contraseñas deben coincidir";
        $errores = 1;
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

<h1>REGISTRO</h1>

<div id="content">

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form-hero" method="POST">
        <p> 
            <span class="error"> <?php echo $errNombre ?></span><br>
            <label for="usernamesignup" class="uname" >Nombre</label>
            <input id="usernamesignup" name="nombre" type="text" placeholder="Nombre" value="<?php echo $nombre ?>"/>
        </p>
        <p> 
            <span class="error"> <?php echo $errUsuario ?></span><br>
            <label for="usernamesignup" class="user" >Usuario</label>
            <input id="usernamesignup" name="usuario" type="text" placeholder="Usuario" value="<?php echo $usuario ?>"/>
        </p>
        <p> 
            <span class="error"> <?php echo $errEmail ?></span><br>
            <label for="emailsignup" class="youmail" > Email</label>
            <input id="emailsignup" name="email" type="text" placeholder="ejemplo@mail.com" value="<?php echo $email ?>"/> 
        </p>
        <p> 
            <span class="error"> <?php echo $errContrasenna ?></span><br>
            <label for="passwordsignup" class="youpasswd" >Contraseña </label>
            <input id="passwordsignup" name="contrasenna" type="password" placeholder="ej. X8df!90EO" value="<?php echo $contrasenna ?>"/>
        </p>
        <p> 
            <span class="error"> <?php echo $errContrasenna2 ?></span><br>
            <label for="passwordsignup_confirm" class="youpasswd" >Confirma tu contraseña </label>
            <input id="passwordsignup_confirm" name="contrasenna2" type="password" placeholder="ej. X8df!90EO" value="<?php echo $contrasenna2 ?>"/>
        </p>
        <p class="signin button"> 
            <input type="submit" value="Registrame"/> 
        </p>
        <p class="change_link">  
            ¿Ya eres miembro?
            <a href="login.php" class="to_register">Entrar</a>
        </p>
    </form>
</div>

<?php
if ($errores == 0 && $usuario != "") {
    $sql = "INSERT INTO usuarios (nombre, usuario, email, contrasenna) VALUES ('" . $nombre . "','" . $usuario . "','" . $email . "','" . $contrasenna . "') ";
    if (mysqli_query($conn, $sql)) {
        setcookie($usuario, 1, time() + 365*24*60*60);
        header("Location: entrada.php");
    }
}

mysqli_close($conn);

include "footer.php";
?>