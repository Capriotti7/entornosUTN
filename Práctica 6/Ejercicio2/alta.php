<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Alta de Ciudad</title>
</head>
<body>
    <h2>Alta de Ciudad</h2>
    <form method="post">
        <label>Ciudad: <input type="text" name="ciudad" required></label><br>
        <label>País: <input type="text" name="pais" required></label><br>
        <label>Habitantes: <input type="number" name="habitantes" required></label><br>
        <label>Superficie: <input type="number" step="0.01" name="superficie" required></label><br>
        <label>Tiene Metro: <input type="checkbox" name="tieneMetro"></label><br>
        <input type="submit" value="Agregar Ciudad">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    }
    ?>
</body>
</html>
