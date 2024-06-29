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
    <h4>Estudia el Código de Tránsito de Colombia</h4>
    <p>
        En esta sección, te ofrecemos la oportunidad de estudiar a fondo el código de tránsito de Colombia. Hemos recopilado un documento PDF detallado que puedes revisar y descargar para aprender sobre las normativas vigentes.
    </p>

    <h6>Contenido del PDF:</h6>

    <ul>
        <li>
            Explicaciones claras y precisas de las leyes y regulaciones de tránsito colombianas.
        </li>
        <li>
            Ejemplos prácticos y casos de estudio para comprender mejor la aplicación de las normativas.
        </li>
        <li>
            Consejos útiles para conductores, peatones y ciclistas sobre cómo cumplir con las normativas de manera segura.
        </li>
    </ul>

    <p>
        Para acceder al PDF, haz clic en el siguiente enlace: 
        <a href="https://senorbiter.com/codigo-nacional-de-transito/">Descargar PDF</a>
    </p>

    <p>
        <b>Nota:</b> El contenido original y completo está disponible en otra página. Al hacer clic en el enlace anterior, serás redirigido automáticamente para revisar y descargar el documento.
    </p>

    <p>¡Aprovecha esta oportunidad para mejorar tu conocimiento sobre el código de tránsito de Colombia!</p>
</div>

<div class="codido_transito_contenedor">
    <!-- <iframe src="recursos/Codigo-de-Transito-2023-Biter.pdf"> -->
    <object data="recursos/Codigo-de-Transito-2023-Biter.pdf" height="100%" width="100%"></object>
    <!-- <embed src="recursos/Codigo-de-Transito-2023-Biter.pdf" type="application/pdf" width="100%" height="100%" /> -->
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
