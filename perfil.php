<?php 
    // Creamos la variable en algún momento
    session_start();

    // Comprobamos si existe con isset()
    if (isset($_SESSION['id'])) {
    // Si esta identificado, en otras palabras existe la variable, le saludamos
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

        $subs_name = $_POST['nombre'];
        $subs_last = $_POST['apellido'];
        $subs_email = $_POST['email'];
        $subs_pass = $_POST['contrasenia'];

        $insert_value = 'UPDATE `usuarios` SET `nombres` = "'. $subs_name.'", `apellidos` = "'.$subs_last.'", `correo` = "'.$subs_email.'", `contrasenia` = "'.$subs_pass.'" WHERE `usuarios`.`id_usuario` = '.$_SESSION['id'].'';
      
        if ($db_connection->query($insert_value)) {
          echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
          <strong>Holy guacamole!</strong> You should check in on some of those fields below.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        } else {
          echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Holy guacamole!</strong> You should check in on some of those fields below.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
      
        $db_connection->close();
    }
?>
<!DOCTYPE html>
<html lang="es-ES">
<?php include 'componentes/cabecera.php'?>
<body>
<?php include 'componentes/banner.php'?>
<?php include 'componentes/navegador.php'?>
<div class="group2">
<div class="texto_contenido">
  <h4>Actualiza tu perfil</h4>
    <p>
    Bienvenido a la página de actualización de perfil. Aquí puedes modificar la información personal asociada a tu cuenta para asegurarte de que esté siempre actualizada y precisa. Utiliza el formulario a continuación para realizar los cambios necesarios:    </p>

    <h6>Formulario de Actualización de Perfil</h6>

    <p>
    Una vez completados los cambios, presiona el botón "Actualizar" para actualizar tu perfil.</p>
    <p>
    <b>Importante:  </b>Asegúrate de ingresar información válida y precisa para mantener tu cuenta actualizada y segura.</p>

    <p>¡Gracias por mantener tu perfil actualizado con nosotros!</p>

</div>
<section class="perfil_form">
<form method="POST">
<fieldset class="mini_contenedor">
  <div class="mb-3">
    <label for="nombres_perfil" class="form-label">Nombres</label>
    <input type="text" class="form-control" id="nombres_perfil" aria-describedby="nombres_perfil">
  </div>
  <div class="mb-3">
    <label for="apellidos_perfil" class="form-label">Apellidos</label>
    <input type="text" class="form-control" id="apellidos_perfil">
  </div>
  </fieldset>
  <fieldset class="mini_contenedor">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Correo electrónico</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  </fieldset>
  <div class="group">
  <button type="submit" class="btn btn-primary">Actualizar</button>
  </div>
</form>
</section>
</div>
<?php include 'componentes/footer.php'?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<?php 
} else {
    // En caso contrario redirigimos el visitante a otra página
    header('Location: formulario_login.php');
    die();
}

?>
