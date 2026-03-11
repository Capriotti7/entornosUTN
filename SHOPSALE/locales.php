<?php 
include('includes/header.php'); 
include('includes/conexion.php'); 
?>

<div class="container mt-5 mb-5 d-flex flex-column" style="flex: 1;">
    
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-5 border-bottom pb-3">
        <div>
            <h2 class="fw-bold text-dark mb-0"><i class="bi bi-shop text-warning me-2"></i>Nuestros Locales</h2>
            <p class="text-muted mt-1 mb-0">Explorá las mejores tiendas de SHOPSALE</p>
        </div>
        
        <?php if(isset($_SESSION['rol']) && ($_SESSION['rol'] == 'admin' || $_SESSION['rol'] == 'dueno')): ?>
            <a href="agregar_local.php" class="btn btn-dark rounded-pill px-4 fw-bold mt-3 mt-md-0 shadow-sm">
                <i class="bi bi-plus-lg text-warning me-2"></i>Agregar Local
            </a>
        <?php endif; ?>
    </div>

    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <form action="locales.php" method="GET" class="d-flex shadow-sm rounded-pill overflow-hidden">
                <span class="input-group-text bg-white border-0 ps-4"><i class="bi bi-search text-muted"></i></span>
                <input type="text" name="busqueda" class="form-control border-0 bg-white py-3 shadow-none" 
                       placeholder="Buscar por nombre o rubro (ej: Moda, Tecnología...)" 
                       value="<?php if(isset($_GET['busqueda'])) echo htmlspecialchars($_GET['busqueda']); ?>">
                
                <button type="submit" class="btn btn-warning fw-bold px-4">Buscar</button>
                
                <?php if(isset($_GET['busqueda']) && $_GET['busqueda'] != ''): ?>
                    <a href="locales.php" class="btn btn-dark fw-bold px-4 d-flex align-items-center">Limpiar</a>
                <?php endif; ?>
            </form>
        </div>
    </div>

    <div class="row g-4">
        <?php
        $where = "";
        
        // Lógica de filtrado con SEGURIDAD (evita Inyección SQL)
        if(isset($_GET['busqueda']) && trim($_GET['busqueda']) != ''){
            $busqueda = mysqli_real_escape_string($con, $_GET['busqueda']);
            $where = "WHERE nombre LIKE '%$busqueda%' OR rubro LIKE '%$busqueda%'";
        }

        $sql = "SELECT * FROM locales $where ORDER BY nombre ASC";
        $resultado = mysqli_query($con, $sql);

        if($resultado && mysqli_num_rows($resultado) > 0){
            while($fila = mysqli_fetch_assoc($resultado)){
                ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                        
                        <div class="position-relative">
                            <?php if(!empty($fila['imagen'])): ?>
                                <img src="assets/img/locales/<?php echo $fila['imagen']; ?>" class="card-img-top" alt="<?php echo $fila['nombre']; ?>" style="height: 220px; object-fit: cover;">
                            <?php else: ?>
                                <div class="bg-secondary d-flex justify-content-center align-items-center" style="height: 220px;">
                                    <i class="bi bi-shop text-light opacity-50" style="font-size: 4rem;"></i>
                                </div>
                            <?php endif; ?>
                            
                            <span class="badge bg-warning text-dark position-absolute top-0 end-0 m-3 px-3 py-2 rounded-pill shadow-sm">
                                <?php echo htmlspecialchars($fila['rubro']); ?>
                            </span>
                        </div>
                        
                        <div class="card-body p-4 d-flex flex-column">
                            <h4 class="card-title fw-bold text-dark mb-2"><?php echo htmlspecialchars($fila['nombre']); ?></h4>
                            <p class="small text-muted mb-3"><i class="bi bi-geo-alt-fill me-1 text-danger"></i> <?php echo htmlspecialchars($fila['ubicacion']); ?></p>
                            <p class="card-text text-secondary flex-grow-1"><?php echo htmlspecialchars($fila['descripcion']); ?></p>
                        </div>

                        <div class="card-footer bg-white border-0 p-4 pt-0 d-flex flex-column gap-2">
                            <a href="promociones.php?id_local=<?php echo $fila['id']; ?>" class="btn btn-outline-dark rounded-pill w-100 fw-semibold">
                                Ver Promociones
                            </a>
                            
                            <?php if(isset($_SESSION['rol']) && ($_SESSION['rol'] == 'admin' || $_SESSION['rol'] == 'dueno')): ?>
                                <div class="d-flex gap-2 mt-2 border-top pt-3">
                                    <a href="agregar_promocion.php?id_local=<?php echo $fila['id']; ?>" class="btn btn-sm btn-warning rounded-pill flex-grow-1 fw-bold text-dark" title="Crear Promoción">
                                        <i class="bi bi-tag"></i> Promo
                                    </a>
                                    <a href="editar_local.php?id=<?php echo $fila['id']; ?>" class="btn btn-sm btn-dark rounded-pill flex-grow-1" title="Editar Local">
                                        <i class="bi bi-pencil"></i> Editar
                                    </a>
                                    <a href="php/borrar_local.php?id=<?php echo $fila['id']; ?>&imagen=<?php echo $fila['imagen']; ?>" class="btn btn-sm btn-danger rounded-pill flex-grow-1" onclick="return confirm('¿Seguro que querés eliminar este local de forma permanente?')" title="Borrar Local">
                                        <i class="bi bi-trash"></i> Borrar
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
                <?php
            }
        } else {
            echo '
            <div class="col-12 text-center py-5">
                <i class="bi bi-search text-muted mb-3" style="font-size: 3rem;"></i>
                <h4 class="text-muted fw-bold">No encontramos locales</h4>
                <p class="text-secondary">Intentá buscar con otra palabra o limpiá los filtros.</p>
                <a href="locales.php" class="btn btn-dark rounded-pill px-4 mt-2">Ver todos los locales</a>
            </div>';
        }
        ?>
    </div>
</div>

<?php include('includes/footer.php'); ?>