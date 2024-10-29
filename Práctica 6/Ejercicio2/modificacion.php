<?php
include('db.php');

// Verifico si se ha enviado el formulario para buscar la ciudad
if (isset($_POST['buscar'])) {
    $id = $_POST['id'];
    // Obtengo la ciudad a modificar
    $query = "SELECT * FROM ciudades WHERE id = $id";
    $resultado = mysqli_query($conexion, $query);
    $ciudad = mysqli_fetch_assoc($resultado);
}

// Verifico si se ha enviado el formulario para modificar la ciudad
if (isset($_POST['modificar'])) {
    $id = $_POST['id'];
    $ciudadNombre = $_POST['ciudad'];
    $pais = $_POST['pais'];
    $habitantes = $_POST['habitantes'];
    $superficie = $_POST['superficie'];
    $tieneMetro = isset($_POST['tieneMetro']) ? 1 : 0;

    // Actualizo la ciudad en la base de datos
    $query = "UPDATE ciudades SET ciudad='$ciudadNombre', pais='$pais', habitantes=$habitantes, superficie=$superficie, tieneMetro=$tieneMetro WHERE id = $id";
    
    if (mysqli_query($conexion, $query)) {
        echo "Ciudad actualizada exitosamente.";
    } else {
        echo "Error al actualizar la ciudad: " . mysqli_error($conexion);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head><title>Modificación de Ciudad</title></head>
<body>
    <h2>Modificación de Ciudad</h2>
    
    <!-- Formulario para buscar la ciudad por ID -->
    <form method="post">
        <label>ID de la Ciudad: <input type="number" name="id" required></label>
        <input type="submit" name="buscar" value="Buscar Ciudad">
    </form>

    <?php if (isset($ciudad)) { ?>
        <!-- Formulario para modificar los datos de la ciudad -->
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $ciudad['id']; ?>">
            <label>Ciudad: <input type="text" name="ciudad" value="<?php echo $ciudad['ciudad']; ?>" required></label><br>
            <label>País: <input type="text" name="pais" value="<?php echo $ciudad['pais']; ?>" required></label><br>
            <label>Habitantes: <input type="number" name="habitantes" value="<?php echo $ciudad['habitantes']; ?>" required></label><br>
            <label>Superficie: <input type="number" step="0.01" name="superficie" value="<?php echo $ciudad['superficie']; ?>" required></label><br>
            <label>Tiene Metro: <input type="checkbox" name="tieneMetro" <?php if ($ciudad['tieneMetro'] == 1) echo 'checked'; ?>></label><br>
            <input type="submit" name="modificar" value="Modificar Ciudad">
        </form>
    <?php } ?>
</body>
</html>
