<?php
include('includes/header.php');

// solo el Admin puede publicar noticias
if(!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin') {
    header("Location: index.php");
    exit;
}
?>

<div class="container mt-5 mb-5 d-flex justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-dark text-white text-center rounded-top-4 py-3">
                <h4 class="mb-0 fw-bold"><i class="bi bi-newspaper text-warning me-2"></i>Publicar Nueva Noticia</h4>
            </div>
            
            <div class="card-body p-5 bg-light">
                <form action="php/crear_noticia_be.php" method="POST">
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold text-secondary">Título de la Noticia</label>
                        <input type="text" class="form-control rounded-3" name="titulo" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold text-secondary">Categoría Cliente</label>
                        <select class="form-select rounded-3" name="categoria_destino" required>
                            <option value="Inicial">Inicial (La ven todos los clientes)</option>
                            <option value="Medium">Medium (Solo clientes Medium y Premium)</option>
                            <option value="Premium">Premium (Exclusiva para clientes Premium)</option>
                        </select>
                        <div class="form-text small">¿Quiénes pueden ver esta noticia?</div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold text-secondary">Fecha de Publicación</label>
                            <input type="date" class="form-control rounded-3" name="fecha_desde" value="<?php echo date('Y-m-d'); ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold text-secondary">Fecha de Expiración</label>
                            <input type="date" class="form-control rounded-3" name="fecha_hasta" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold text-secondary">Contenido</label>
                        <textarea class="form-control rounded-3" name="texto_novedad" rows="5" placeholder="Escribí el detalle de la novedad acá..." required></textarea>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end border-top pt-4">
                        <a href="panel_admin.php" class="btn btn-outline-dark rounded-pill px-4 fw-bold">Cancelar</a>
                        <button type="submit" class="btn btn-warning rounded-pill px-4 fw-bold text-dark shadow-sm">Publicar Noticia</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>