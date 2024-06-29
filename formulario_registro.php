<?php
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {

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

  $subs_name = $_POST['nombre'];
  $subs_last = $_POST['apellido'];
  $subs_email = $_POST['email'];  
  $subs_pass = password_hash($_POST['contrasenia'], PASSWORD_BCRYPT);

  $insert_value = 'INSERT INTO `usuarios` (`nombres`, `apellidos`, `correo`, `contrasenia`) VALUES ("'.$subs_name.'", "'.$subs_last.'", "'.$subs_email.'", "'.$subs_pass.'")';

  if ($db_connection->query($insert_value)) {
    echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
    <strong>Holy guacamole!</strong> Te registraste correctamente.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  } else {
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Holy guacamole!</strong> Se presentó un inconveniente almacenando tus datos.
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
<div class="group">
    <section class="login_titulo">
        <h1>Formulario de registro</h1>
        <h2>Recuerda que todos somos actores viales</h2>
    </section>
  <section class="registro_form">
  <form method="POST">
    <fieldset class="mini_contenedor">
        <div class="mb-3">
          <label for="nombre">Nombre <span><em>(requerido)</em></span></label>
          <input type="text" name="nombre" class="nombre" required/>   
        </div>
        <div class="mb-3">
          <label for="apellido">Apellido <span><em>(requerido)</em></span></label>
          <input type="text" name="apellido" class="apellido" required/>   
        </div>
      </fieldset>
      <fieldset class="mini_contenedor">
        <div class="mb-3">
          <label for="email">Email <span><em>(requerido)</em></span></label>
          <input type="email" name="email" class="email" />
        </div>
        <div class="mb-3">
          <label for="contrasenia">Contraseña <span><em>(requerido)</em></span></label>
          <input type="password" name="contrasenia" class="contrasenia" />
        </div>
      </fieldset>
      <div class="mini_contenedor">
      <div class="group">
      <button type="submit" class="btn btn-primary">Registrarse</button>
      </div>
     </div>
     <fieldset class="mini_contenedor">
     <div class="registrado">
      <h5>¿Ya estás registrado?</h5>
      <h6>
          <a href="formulario_login.php">Inicia sesión aquí</a>
      </h6>
      </div>
      </fieldset>
  </form>
  </section>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>