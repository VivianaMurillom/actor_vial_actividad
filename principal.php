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
    <h4>Bienvenido al Portal para el estudio del Código de Tránsito de Colombia</h4>

    <p>
    ¡Bienvenido! En este sitio web, te invitamos a explorar las diversas secciones que hemos preparado para que conozcas a fondo el código de tránsito de Colombia. A través de nuestras pestañas, encontrarás información detallada y recursos útiles que te ayudarán a comprender mejor las normativas y regulaciones vigentes.    </p>

    <h6>¿Qué encontrarás aquí?</h6>

    <ol>
        <li>
            <b> Sección de Leyes y Normativas: </b>
            Descubre los artículos más relevantes del código de tránsito colombiano, explicados de manera clara y concisa.
        </li>
        <li>
        <b>  Guías y Consejos: </b>
        Obtén consejos prácticos para conductores, peatones y ciclistas sobre cómo cumplir con las normativas de tránsito de manera segura y responsable.
        </li>
        <li>
        <b> Actualizaciones y Noticias: </b>
            Mantente al día con las últimas noticias y cambios en las leyes de tránsito que puedan afectarte.
        </li>
    </ol>

    <p>
    Explora nuestras pestañas y sumérgete en el mundo del código de tránsito de Colombia. ¡Estamos aquí para ayudarte a entenderlo mejor!    </p>
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