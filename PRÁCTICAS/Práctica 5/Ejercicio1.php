<?php
// Datos del correo
$destinatario = "xx@xx.com";  // Dirección del destinatario
$asunto = "Correo con Formato HTML";  // Asunto del correo

// Cuerpo del mensaje en HTML
$cuerpo = "
<html>
<head>
  <title>Prueba de correo en HTML</title>
</head>
<body>
  <h1 style='color:blue;'>¡Hola!</h1>
  <p>Este es un <strong>correo de prueba</strong> con formato <span style='color:green;'>HTML</span>.</p>
  <p>Puedes agregar enlaces, como este: <a href='https://www.google.com'>Google</a></p>
</body>
</html>
";

// Encabezados del correo
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: remitente@example.com" . "\r\n";  // Dirección del remitente (opcional)

// Enviar el correo
if (mail($destinatario, $asunto, $cuerpo, $headers)) {
    echo "Correo enviado exitosamente.";
} else {
    echo "Error al enviar el correo.";
}
?>
