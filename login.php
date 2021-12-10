<?php
    session_start();

        include "cabecera.php";

        $conn = mysqli_connect("localhost", "root", "", "bdamorosos");

        $usuario = $contrasenna = "";
        $errUsuario = $errContrasenna = "";
        $errores = 0;

        //VALIDACION DEL LOGIN

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (empty($_POST["usuario"])) {
                $errUsuario = "Rellena el campo Usuario";
                $errores = 1;
            } else {
                $usuario = $_POST["usuario"];
            }

            if (empty($_POST["contrasenna"])) {
                $errContrasenna = "Rellena el campo Contraseña";
                $errores = 1;
            } else {
                $contrasenna = $_POST['contrasenna'];
            }

            $sqlSelect = "SELECT * FROM usuarios WHERE usuario = '" . $usuario . "'";
            $sqlContrasenna = "SELECT * FROM usuarios WHERE usuario = '" . $usuario . "' and contrasenna = '" . $contrasenna . "'";

            $result = mysqli_query($conn, $sqlSelect);
            $resultContrasenna = mysqli_query($conn, $sqlContrasenna);

            if (mysqli_num_rows($result) == 0) {
                $errUsuario = "El usuario no existe";
                $errores = 1;
            } elseif (mysqli_num_rows($resultContrasenna) == 0) {
                $errContrasenna = "La contraseña es incorrecta";
                $errores = 1;
            } else {
                setcookie($usuario, $_COOKIE[$usuario]+1);
                header('Location: entrada.php');
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

        <!--FORMULARIO HTML LOGIN -->
        
        <h1>LOGIN</h1>

        <div id="content">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form-hero" method="POST">
                <span class="error"><?php echo $errUsuario ?></span><br>
                <p>Usuario: <input type="text" name="usuario" placeholder="Usuario"></p>

                <span class="error"><?php echo $errContrasenna ?></span><br>
                <p>Contraseña: <input type="password" name="contrasenna" placeholder="Contraseña" value="<?php echo $contrasenna ?>" ></p>
                <input type="submit" value="Entrar">
                <p>¿No estás registrado aun? <a href="registro.php">Regístrate</a></p>
            </form>
        </div>

<?php

include "footer.php";

?>