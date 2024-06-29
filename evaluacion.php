<?php 
// Creamos la variable en algún momento
session_start();

// Comprobamos si existe con isset()
if (isset($_SESSION['id'])) {
    // Si esta identificado, en otras palabras existe la variable, le saludamos
?>

<!DOCTYPE html>
<html lang="es-ES">
<?php include 'componentes/cabecera.php'?>
<body>
<?php include 'componentes/banner.php'?>
<?php include 'componentes/navegador.php'?>
<div class="texto_contenido">
    <h4>Evalúate en el Código Nacional de Tránsito</h4>
    <p>
    Bienvenido a nuestra sección de evaluación, diseñada para fortalecer tu conocimiento del Código Nacional de Tránsito de Colombia. Aquí encontrarás un breve cuestionario de 5 preguntas que te permitirá evaluar tus conocimientos sobre normas de tráfico y seguridad vial.
    </p>

    <p>
    Una vez completado el cuestionario, podrás ver tu puntaje instantáneamente y compararlo con el puntaje ideal. Esto te ayudará a identificar áreas de mejora y reforzar tus conocimientos de manera efectiva.
    </p>

    <p>
    Además, podrás registrar tus resultados en nuestra tabla de notas personalizada, la cual te permitirá hacer un seguimiento de tu progreso a lo largo del tiempo. ¡Prepárate para convertirte en un conductor más seguro y confiado!
    </p>

    <br>
    <br>

    <h4>Aún estamos construyendo esta sección, disculpa las molestias...</h4>
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
