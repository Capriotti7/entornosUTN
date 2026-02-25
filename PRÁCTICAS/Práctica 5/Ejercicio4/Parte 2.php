<?php
session_start(); // Inicia o reanuda la sesión
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contador de visitas</title>
</head>
<body>
<?php
// Mostramos el número de visitas durante la sesión actual
echo "Has visitado " . $_SESSION["contador"] . " páginas.";
?>
<br><br>
<!-- Enlace para volver a la página principal -->
<a href="cuenta.php">Volver a la página principal</a>
</body>
</html>