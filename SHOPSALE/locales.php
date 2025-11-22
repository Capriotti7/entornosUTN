<?php include('includes/header.php'); ?>
<?php include('includes/conexion.php'); ?>

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Nuestros Locales</h1>
        
        <?php if(isset($_SESSION['rol']) && $_SESSION['rol'] == 'admin'): ?>
            <a href="agregar_local.php" class="btn btn-success">+ Agregar Local</a>
        <?php endif; ?>
    </div>

    <!-- FORMULARIO DE BÚSQUEDA -->
    <div class="row mb-4">
        <div class="col-md-12">
            <!-- Usamos el método GET para enviar lo que escribimos a la misma página -->
            <form action="locales.php" method="GET" class="d-flex gap-2">
                <input type="text" name="busqueda" class="form-control" 
                       placeholder="Buscar por nombre o rubro (ej: Moda, Kevin...)" 
                       value="<?php if(isset($_GET['busqueda'])) echo $_GET['busqueda']; ?>">
                <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i> Buscar</button>
                
                <!-- Botón para limpiar la búsqueda -->
                <?php if(isset($_GET['busqueda'])): ?>
                    <a href="locales.php" class="btn btn-outline-secondary">Limpiar</a>
                <?php endif; ?>
            </form>
        </div>
    </div>

    <div class="row">
        <?php
        // LÓGICA DE FILTRADO
        $where = "";
        
        if(isset($_GET['busqueda'])){
            $busqueda = $_GET['busqueda'];
            // Buscamos coincidencias en el nombre O en el rubro
            $where = "WHERE nombre LIKE '%$busqueda%' OR rubro LIKE '%$busqueda%'";
        }

        $sql = "SELECT * FROM locales $where";
        $resultado = mysqli_query($con, $sql);

        if(mysqli_num_rows($resultado) > 0){
            while($fila = mysqli_fetch_assoc($resultado)){
                ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <img src="assets/img/locales/<?php echo $fila['imagen']; ?>" class="card-img-top" alt="Local" style="height: 200px; object-fit: cover;">
                        
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $fila['nombre']; ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $fila['rubro']; ?></h6>
                            <p class="card-text text-truncate"><?php echo $fila['descripcion']; ?></p>
                            <p class="small text-muted"><i class="bi bi-geo-alt"></i> <?php echo $fila['ubicacion']; ?></p>
                        </div>
                        <div class="card-footer bg-white text-center d-flex justify-content-between">
                            <a href="promociones.php" class="btn btn-outline-primary btn-sm">Ver Promociones</a>
                            
                            <?php if(isset($_SESSION['rol']) && $_SESSION['rol'] == 'admin'): ?>
                                <a href="php/borrar_local.php?id=<?php echo $fila['id']; ?>&imagen=<?php echo $fila['imagen']; ?>" 
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('¿Seguro eliminar este local?')">
                                    <i class="bi bi-trash"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<div class='col-12'><div class='alert alert-warning'>No se encontraron locales con esa búsqueda.</div></div>";
        }
        ?>
    </div>
</div>

<?php include('includes/footer.php'); ?>