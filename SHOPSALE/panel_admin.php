<?php 
include('includes/header.php'); 
include('includes/conexion.php');

// Solo entra el Admin
if(!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin'){
    echo "<script>alert('Acceso Denegado'); window.location='index.php';</script>";
    exit;
}
?>

<div class="container mt-5 mb-5 d-flex flex-column" style="flex: 1;">
    <div class="d-flex align-items-center mb-5 border-bottom pb-3">
        <i class="bi bi-gear-fill text-warning fs-1 me-3"></i>
        <div>
            <h2 class="fw-bold text-dark mb-0">Panel de Administración</h2>
            <p class="text-muted mb-0">Gestión de cuentas y moderación de contenido</p>
        </div>
    </div>

    <div class="row g-4">
        
        <div class="col-lg-12 mb-4">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-dark text-white rounded-top-4 py-3">
                    <h5 class="mb-0 fw-bold"><i class="bi bi-person-badge me-2 text-warning"></i>Cuentas de Dueños Pendientes</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4">Nombre del Dueño</th>
                                    <th>Email</th>
                                    <th>Estado</th>
                                    <th class="text-end pe-4">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql_duenos = "SELECT * FROM usuarios WHERE rol = 'dueno' AND estado_cuenta = 'pendiente'";
                                $res_duenos = mysqli_query($con, $sql_duenos);

                                if(mysqli_num_rows($res_duenos) > 0) {
                                    while($dueno = mysqli_fetch_assoc($res_duenos)) {
                                        ?>
                                        <tr>
                                            <td class="ps-4 fw-semibold"><?php echo htmlspecialchars($dueno['nombre']); ?></td>
                                            <td class="text-muted"><?php echo htmlspecialchars($dueno['email']); ?></td>
                                            <td><span class="badge bg-secondary">Pendiente</span></td>
                                            <td class="text-end pe-4">
                                                <a href="php/admin_acciones.php?accion=aprobar_dueno&id=<?php echo $dueno['id']; ?>" class="btn btn-sm btn-success rounded-pill px-3 shadow-sm" title="Aprobar"><i class="bi bi-check-lg"></i> Aprobar</a>
                                                <a href="php/admin_acciones.php?accion=rechazar_dueno&id=<?php echo $dueno['id']; ?>" class="btn btn-sm btn-danger rounded-pill px-3 shadow-sm" title="Denegar" onclick="return confirm('¿Seguro que querés rechazar a este dueño?');"><i class="bi bi-x-lg"></i> Rechazar</a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo "<tr><td colspan='4' class='text-center py-4 text-muted'>No hay cuentas de dueños pendientes de aprobación.</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-danger text-white rounded-top-4 py-3">
                    <h5 class="mb-0 fw-bold"><i class="bi bi-tags-fill me-2 text-warning"></i>Promociones Pendientes de Aprobación</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4">Local</th>
                                    <th>Título Promo</th>
                                    <th>Vigencia</th>
                                    <th>Estado</th>
                                    <th class="text-end pe-4">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql_promos = "SELECT p.*, l.nombre as nombre_local 
                                               FROM promociones p 
                                               JOIN locales l ON p.id_local = l.id 
                                               WHERE p.estado = 'pendiente'";
                                $res_promos = mysqli_query($con, $sql_promos);

                                if(mysqli_num_rows($res_promos) > 0){
                                    while($row = mysqli_fetch_assoc($res_promos)){
                                        ?>
                                        <tr>
                                            <td class="ps-4 fw-semibold"><?php echo htmlspecialchars($row['nombre_local']); ?></td>
                                            <td class="text-dark fw-bold"><?php echo htmlspecialchars($row['titulo']); ?></td>
                                            <td class="text-muted small">
                                                Desde: <?php echo date("d/m/Y", strtotime($row['fecha_inicio'])); ?><br>
                                                Hasta: <?php echo date("d/m/Y", strtotime($row['fecha_fin'])); ?>
                                            </td>
                                            <td><span class="badge bg-warning text-dark">Pendiente</span></td>
                                            <td class="text-end pe-4">
                                                <a href="php/admin_acciones.php?accion=aprobar_promo&id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm rounded-pill px-3 shadow-sm" title="Aprobar">
                                                    <i class="bi bi-check-lg"></i> Aprobar
                                                </a>
                                                <a href="php/admin_acciones.php?accion=rechazar_promo&id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm rounded-pill px-3 shadow-sm" title="Rechazar" onclick="return confirm('¿Estás seguro de rechazar esta promo?')">
                                                    <i class="bi bi-x-lg"></i> Rechazar
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo "<tr><td colspan='5' class='text-center py-4 text-muted'>¡Excelente! No hay promociones pendientes.</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>