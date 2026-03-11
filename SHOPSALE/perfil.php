<?php 
include('includes/header.php'); 
include('includes/conexion.php');

// Si no está logueado, lo mandamos al login
if(!isset($_SESSION['usuario'])){
    header("location: login.php");
    exit;
}

$email_usuario = $_SESSION['usuario'];
$sql = "SELECT * FROM usuarios WHERE email = '$email_usuario'";
$res = mysqli_query($con, $sql);
$datos_usuario = mysqli_fetch_assoc($res);
?>

<div class="container mt-5 mb-5 d-flex justify-content-center align-items-center" style="flex: 1;">
    <div class="col-md-8 col-lg-7">
        <div class="card shadow-lg border-0 rounded-4">
            
            <div class="card-body p-4 p-md-5">
                <div class="row align-items-center">
                    
                    <div class="col-md-5 text-center mb-4 mb-md-0">
                        <div class="position-relative d-inline-block">
                            <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($datos_usuario['nombre']); ?>&background=343a40&color=fdbd08&size=160&bold=true&rounded=true" 
                                class="img-thumbnail shadow-sm border-0 rounded-circle mb-3" alt="Avatar">
                            
                            <span class="position-absolute bottom-0 end-0 p-2 bg-success border border-light rounded-circle" style="transform: translate(-20px, -20px);">
                                <span class="visually-hidden">Online</span>
                            </span>
                        </div>
                        <h4 class="fw-bold mb-1 text-dark"><?php echo $datos_usuario['nombre']; ?></h4>
                        <p class="text-muted small mb-0">Miembro de SHOPSALE</p>
                    </div>
                    
                    <div class="col-md-7 ps-md-4 border-start-md">
                        <h5 class="fw-bold text-dark border-bottom pb-3 mb-4">
                            <i class="bi bi-person-lines-fill text-warning me-2 fs-4 align-middle"></i>Detalles de la Cuenta
                        </h5>
                        
                        <div class="mb-4">
                            <p class="text-secondary small fw-bold text-uppercase mb-1">Correo Electrónico</p>
                            <p class="fs-6 text-dark mb-0"><i class="bi bi-envelope me-2 text-muted"></i><?php echo $datos_usuario['email']; ?></p>
                        </div>

                        <div class="mb-4">
                            <p class="text-secondary small fw-bold text-uppercase mb-1">Rol en el Sistema</p>
                            <p class="fs-6 mb-0">
                                <i class="bi bi-shield-lock me-2 text-muted"></i>
                                <?php 
                                    if($datos_usuario['rol'] == 'admin') {
                                        echo '<span class="badge bg-dark text-warning px-3 py-2 rounded-pill shadow-sm">Administrador</span>';
                                    } else if($datos_usuario['rol'] == 'dueno') {
                                        echo '<span class="badge bg-warning text-dark px-3 py-2 rounded-pill shadow-sm">Dueño de Local</span>';
                                    } else {
                                        echo '<span class="badge bg-secondary text-light px-3 py-2 rounded-pill shadow-sm">Cliente Registrado</span>';
                                    }
                                ?>
                            </p>
                        </div>
                        
                    </div>
                </div> <div class="d-flex justify-content-between align-items-center mt-4 pt-4 border-top">
                    <a href="index.php" class="btn btn-outline-dark rounded-pill px-4 fw-semibold">
                        <i class="bi bi-arrow-left me-2"></i>Inicio
                    </a>
                    <a href="php/cerrar_sesion.php" class="btn btn-danger rounded-pill px-4 fw-semibold shadow-sm">
                        <i class="bi bi-box-arrow-right me-2"></i>Cerrar Sesión
                    </a>
                </div>
                
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>