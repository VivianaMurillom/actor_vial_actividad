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
    <h4>Agradecimientos</h4>
    <p>
    En nombre de este sitio web Actores Viales, valoramos profundamente el apoyo y la colaboración de aquellos que hacen posible nuestro compromiso con la educación en general. Queremos expresar nuestro reconocimiento especial a:
    </p>
    <ul>
        <li>
        <b>  Centro de Educación para el Trabajo de Cafam: </b>
         Agradecemos sinceramente al Centro de Educación para el Trabajo de Cafam por su continua dedicación a la formación integral de los aprendices de conducción, contribuyendo así a un tráfico más seguro en nuestras carreteras.
        </li>
        <li>
        <b>  Señor Biter: </b>
        Nos gustaría agradecer al influencer Señor Biter por su generosa colaboración al permitir la descarga del código nacional de tránsito resumido. Su compromiso con la educación vial ha sido invaluable para muchos de nuestros usuarios.
        </li>
        <li>
        <b>  Suplos:  </b>
        Reconocemos a Suplos por ser una compañía que prioriza el bienestar y desarrollo de sus trabajadores. Su apoyo y compromiso con nuestra iniciativa han sido fundamentales para alcanzar nuestros objetivos.
        </li>
    </ul>
</div>

<div class="texto_contenido">
    <h4>Agradecimientos a creadores de contenido visual en internet:</h4>
    <p>Imagen de <a href="https://pixabay.com/es/users/nickype-10327513/?utm_source=link-attribution&utm_medium=referral&utm_campaign=image&utm_content=5195903">Nicky ❤️🌿🐞🌿❤️</a> en <a href="https://pixabay.com/es//?utm_source=link-attribution&utm_medium=referral&utm_campaign=image&utm_content=5195903">Pixabay</a></p>
    <p>Imagen de <a href="https://pixabay.com/es/users/d97jro-481086/?utm_source=link-attribution&utm_medium=referral&utm_campaign=image&utm_content=472758">Joakim Roubert</a> en <a href="https://pixabay.com/es//?utm_source=link-attribution&utm_medium=referral&utm_campaign=image&utm_content=472758">Pixabay</a></p>
    <p>Imagen de <a href="https://pixabay.com/es/users/bobtheskater-5488698/?utm_source=link-attribution&utm_medium=referral&utm_campaign=image&utm_content=2934477">bobtheskater</a> en <a href="https://pixabay.com/es//?utm_source=link-attribution&utm_medium=referral&utm_campaign=image&utm_content=2934477">Pixabay</a></p>
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