<?php 
include('includes/header.php'); 
include('includes/conexion.php');

// Solo el Dueño puede entrar acá
if(!isset($_SESSION['rol']) || $_SESSION['rol'] != 'dueno') {
    header("Location: index.php");
    exit;
}

$email_dueno = $_SESSION['usuario'];

$res_dueno = mysqli_query($con, "SELECT id FROM usuarios WHERE email = '$email_dueno'");
$id_dueno = mysqli_fetch_assoc($res_dueno)['id'];
?>

<div class="container mt-5 mb-5 d-flex flex-column" style="flex: 1;">
    <div class="d-flex align-items-center mb-4 border-bottom pb-3">
        <i class="bi bi-ticket-detailed-fill text-warning fs-1 me-3"></i>
        <div>
            <h2 class="fw-bold text-dark mb-0">Solicitudes de Clientes</h2>
            <p class="text-muted mb-0">Gestioná los pedidos de descuento de tus locales</p>
        </div>
    </div>

    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0 align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th class="ps-4">Fecha</th>
                            <th>Cliente</th>
                            <th>Nivel</th>
                            <th>Promoción Solicitada</th>
                            <th>Local</th>
                            <th class="text-end pe-4">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT up.id as id_solicitud, up.fecha_uso, u.nombre as nombre_cliente, u.categoria_cliente, 
                                p.titulo as promo_titulo, l.nombre as nombre_local
                                FROM uso_promociones up
                                INNER JOIN usuarios u ON up.id_cliente = u.id
                                INNER JOIN promociones p ON up.id_promo = p.id
                                INNER JOIN locales l ON p.id_local = l.id
                                WHERE l.id_usuario = '$id_dueno' AND up.estado = 'enviada'
                                ORDER BY up.fecha_uso DESC";
                        
                        $resultado = mysqli_query($con, $sql);

                        if(mysqli_num_rows($resultado) > 0) {
                            while($fila = mysqli_fetch_assoc($resultado)) {
                                ?>
                                <tr>
                                    <td class="ps-4 text-muted small"><?php echo date("d/m/Y H:i", strtotime($fila['fecha_uso'])); ?></td>
                                    <td class="fw-semibold"><?php echo htmlspecialchars($fila['nombre_cliente']); ?></td>
                                    <td><span class="badge bg-secondary"><?php echo $fila['categoria_cliente']; ?></span></td>
                                    <td class="text-dark fw-bold"><?php echo htmlspecialchars($fila['promo_titulo']); ?></td>
                                    <td><?php echo htmlspecialchars($fila['nombre_local']); ?></td>
                                    <td class="text-end pe-4">
                                        <a href="php/procesar_solicitud.php?accion=aceptado&id=<?php echo $fila['id_solicitud']; ?>" class="btn btn-sm btn-success rounded-pill px-3 shadow-sm"><i class="bi bi-check-lg"></i> Aceptar</a>
                                        <a href="php/procesar_solicitud.php?accion=rechazada&id=<?php echo $fila['id_solicitud']; ?>" class="btn btn-sm btn-danger rounded-pill px-3 shadow-sm"><i class="bi bi-x-lg"></i> Rechazar</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center py-5 text-muted'>No tenés solicitudes pendientes en este momento.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>