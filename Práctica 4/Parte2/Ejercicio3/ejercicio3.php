<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre">
        <input type="submit" name="enviar" value="Enviar">
    </form>
    <?php 
        include('./funcion.php');
        
        if (isset($_POST['enviar'])) {
            $nombre = $_POST['nombre'];
            comprobar_nombre_usuario($nombre);
        }
    ?>
</body>
</html>