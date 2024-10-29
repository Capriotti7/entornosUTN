<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email_amigo = $_POST['email_amigo'];

    $asunto = "$nombre te recomienda visitar nuestro sitio";
    $cuerpo = "
    <html>
    <head><title>Recomendación de sitio</title></head>
    <body>
        <p>¡Hola! Tu amigo <strong>$nombre</strong> quiere recomendarte visitar nuestro sitio web.</p>
        <p><a href='https://www.ejemplo.com'>Haz clic aquí para visitar nuestro sitio</a></p>
    </body>
    </html>";

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: noreply@example.com" . "\r\n";

    if (mail($email_amigo, $asunto, $cuerpo, $headers)) {
        echo "Recomendación enviada exitosamente.";
    } else {
        echo "Error al enviar la recomendación.";
    }
}
?>