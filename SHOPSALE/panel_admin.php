<?php 
include('includes/header.php'); 
include('includes/conexion.php');

// SEGURIDAD: Solo entra el Admin
if(!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin'){
    echo "<script>alert('Acceso Denegado'); window.location='index.php';</script>";
    exit;
}
?>

<div class="container mt-5">
    <h2 class="mb-4">Panel de Administración</h2>

    <!-- SECCIÓN DE PROMOCIONES PENDIENTES -->
    <div class="card shadow mb-5">
        <div class="card-header bg-danger text-white">
            <h5 class="mb-0">Promociones Pendientes de Aprobación</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Local</th>
                            <th>Título Promo</th>
                            <th>Fechas</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Traemos solo las pendientes
                        $sql = "SELECT p.*, l.nombre as nombre_local 
                                FROM promociones p 
                                JOIN locales l ON p.id_local = l.id 
                                WHERE p.estado = 'pendiente'";
                        
                        $result = mysqli_query($con, $sql);

                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)){
                                ?>
                                <tr>
                                    <td><?php echo $row['nombre_local']; ?></td>
                                    <td><?php echo $row['titulo']; ?></td>
                                    <td>
                                        Desde: <?php echo $row['fecha_inicio']; ?><br>
                                        Hasta: <?php echo $row['fecha_fin']; ?>
                                    </td>
                                    <td><span class="badge bg-warning text-dark">Pendiente</span></td>
                                    <td>
                                        <!-- Botones de Acción -->
                                        <a href="php/cambiar_estado_promo.php?id=<?php echo $row['id']; ?>&estado=aprobada" 
                                           class="btn btn-success btn-sm" title="Aprobar">
                                            <i class="bi bi-check-lg"></i> Aprobar
                                        </a>
                                        <a href="php/cambiar_estado_promo.php?id=<?php echo $row['id']; ?>&estado=rechazada" 
                                           class="btn btn-danger btn-sm" title="Rechazar"
                                           onclick="return confirm('¿Estás seguro de rechazar esta promo?')">
                                            <i class="bi bi-x-lg"></i> Rechazar
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            echo "<tr><td colspan='5' class='text-center'>¡No hay promociones pendientes!</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Aquí podríamos agregar otra tabla para gestionar usuarios o locales en el futuro -->
    
</div>

<?php include('includes/footer.php'); ?>