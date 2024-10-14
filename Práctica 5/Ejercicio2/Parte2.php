<!-- procesar los datos del formulario --> 
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    $asunto = "Consulta de $nombre";
    $cuerpo = "
    <html>
    <head><title>Consulta de Contacto</title></head>
    <body>
        <p>Nombre: $nombre</p>
        <p>Correo: $email</p>
        <p>Mensaje: $mensaje</p>
    </body>
    </html>";

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: $email" . "\r\n";

    if (mail("webmaster@example.com", $asunto, $cuerpo, $headers)) {
        echo "Consulta enviada exitosamente.";
    } else {
        echo "Error al enviar la consulta.";
    }
}
?>