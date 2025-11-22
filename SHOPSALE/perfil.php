<?php 
include('includes/header.php'); 
include('includes/conexion.php');

// Seguridad: Si no está logueado, lo mandamos al login
if(!isset($_SESSION['usuario'])){
    header("location: login.php");
    exit;
}

$email_usuario = $_SESSION['usuario'];
$sql = "SELECT * FROM usuarios WHERE email = '$email_usuario'";
$res = mysqli_query($con, $sql);
$datos_usuario = mysqli_fetch_assoc($res);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h3><i class="bi bi-person-circle"></i> Mi Perfil</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 text-center mb-3">
                            <!-- Avatar genérico -->
                            <img src="https://ui-avatars.com/api/?name=<?php echo $datos_usuario['nombre']; ?>&background=random&size=200" 
                                 class="rounded-circle img-fluid" alt="Avatar">
                        </div>
                        <div class="col-md-8">
                            <h4 class="card-title mb-3">Información Personal</h4>
                            
                            <div class="mb-3 border-bottom pb-2">
                                <strong class="text-muted">Nombre Completo:</strong>
                                <p class="lead mb-0"><?php echo $datos_usuario['nombre']; ?></p>
                            </div>

                            <div class="mb-3 border-bottom pb-2">
                                <strong class="text-muted">Correo Electrónico:</strong>
                                <p class="lead mb-0"><?php echo $datos_usuario['email']; ?></p>
                            </div>

                            <div class="mb-3 border-bottom pb-2">
                                <strong class="text-muted">Tipo de Usuario:</strong>
                                <p class="lead mb-0 text-capitalize">
                                    <?php 
                                        if($datos_usuario['rol'] == 'admin') echo '<span class="badge bg-danger">Administrador</span>';
                                        else if($datos_usuario['rol'] == 'dueno') echo '<span class="badge bg-success">Dueño de Local</span>';
                                        else echo '<span class="badge bg-info text-dark">Cliente</span>';
                                    ?>
                                </p>
                            </div>
                            
                            <div class="mt-4">
                                <a href="index.php" class="btn btn-outline-primary">Volver al Inicio</a>
                                <a href="php/cerrar_sesion.php" class="btn btn-danger float-end">Cerrar Sesión</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>