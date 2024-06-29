<?php 
    // Comprobamos que nos llega los datos del formulario
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Alistamos las credenciales de consulta a la base
        $db_host="localhost";
        $db_user="root";
        $db_password="";
        $db_name="sitio_web_db";
        $db_table_name="usuarios";
        $db_connection = new mysqli($db_host, $db_user, $db_password);

        if (!$db_connection) {
            die('No se ha podido conectar a la base de datos');
        }else{
            $db_connection->select_db($db_name) or die ("No se puede seleccionar la base de datos");	//conexion con la base de datos​
        }

        // Variables del formulario
        $emailFormulario = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
        $contrasenyaFormulario = isset($_REQUEST['contrasenya']) ? $_REQUEST['contrasenya'] : null;

        $search_value = 'SELECT * FROM `usuarios` WHERE `correo` = "'.$emailFormulario. '"';
        
        $resultado_consulta = $db_connection->query($search_value);
        $resultado_final = $resultado_consulta->fetch_all(\MYSQLI_ASSOC);

        // Comprobamos si los datos son correctos
        if(isset($resultado_final[0]["nombres"]) != null){
            if ($resultado_final[0]["correo"] == $emailFormulario && password_verify($contrasenyaFormulario, $resultado_final[0]["contrasenia"])) {
                // Si son correctos, creamos la sesión
                session_start();
                $_SESSION['email'] = $_REQUEST['email'];
                $_SESSION['id'] = $resultado_final[0]["id_usuario"];
                // Redireccionamos a la página segura
                header('Location: principal.php');
                die();
                session_destroy();
            } else {
                // Si no son correctos, informamos al usuario
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Holy guacamole!</strong> El correo o la contraseña son incorrectos.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
        }else{
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> No encontramos registros relacionados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
        $db_connection->close();
    }

?>
<!doctype html>
<html>
<?php include_once 'componentes/cabecera.php'?>
    <body>
        <div class="video-container"> 
            <video autoplay loop class="fillWidth visible-lg">
            <source src="recursos/video_fondo.mp4" type="video/mp4">
            </video>
        </div>
        <div class="contenido">
                <section class="login_titulo">
                    <h1>Bienvenido querido aprendiz</h1>
                    <h2>Recuerda que todos somos actores viales</h2>
                </section>
                
                <section class="login_form">
                    <h5>Ingresa tus credenciales para inicio de sesión</h5>
                    <form method="POST">
                        <p>
                            <input type="text" name="email" placeholder="Email"> 
                        </p> 
                        <p>
                            <input type="password" name="contrasenya" placeholder="Contraseña"> 
                        </p>
                        <div class="group">
                        <button type="submit" class="btn btn-primary">Ingresar</button>
                        </div>
                    </form>
                </section>

                <section class="login_form">
                    <h5>¿Aún no estás registrado?</h5>
                    <h6>
                        <a href="formulario_registro.php">Ingresa aquí</a>
                    </h6>
                </section>
            </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
