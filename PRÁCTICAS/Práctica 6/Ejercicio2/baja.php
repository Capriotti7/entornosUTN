<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head><title>Baja de Ciudad</title></head>
<body>
    <h2>Baja de Ciudad</h2>
    <form method="post">
        <label>ID de la Ciudad: <input type="number" name="id" required></label><br>
        <input type="submit" value="Eliminar Ciudad">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    }
    ?>
</body>
</html>
