<!-- Footer Start -->
<div id="footer" class="container-fluid bg-dark footer mt-5 pt-5">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h1 class="fw-bold text-primary mb-4">F<span class="text-secondary">oo</span>dy</h1>
                <p>Diam dolor diam ipsum sit. Aliqu diam amet diam et eos.</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-square btn-outline-light rounded-circle me-1" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-square btn-outline-light rounded-circle me-1" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square btn-outline-light rounded-circle me-1" href="#"><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-square btn-outline-light rounded-circle me-0" href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Address</h4>
                <p><i class="fa fa-map-marker-alt me-3"></i>Panamá, Panamá City</p>
                <p><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                <p><i class="fa fa-envelope me-3"></i>info@developer.com</p>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Quick Links</h4>
                <a class="btn btn-link" href="#">About Us</a>
                <a class="btn btn-link" href="#">Contact Us</a>
                <a class="btn btn-link" href="#">Our Services</a>
                <a class="btn btn-link" href="#">Terms & Condition</a>
                <a class="btn btn-link" href="#">Support</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Subscribe Right Now!</h4>
                <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                
                <!-- Formulario de suscripción -->
                <form action="<?php echo e(route('subcription.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="email" name="email" placeholder="Your email" required>
                        <button type="submit" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

<!-- Modal de éxito -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">¡Éxito!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php echo e(session('success')); ?>

            </div>
        </div>
    </div>
</div>

<!-- Modal de error -->
<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Error</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php echo e(session('error')); ?>

            </div>
        </div>
    </div>
</div>

<!-- Script para mostrar los modales -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        <?php if(session('success')): ?>
            new bootstrap.Modal(document.getElementById('successModal')).show();
        <?php endif; ?>
        <?php if(session('error')): ?>
            new bootstrap.Modal(document.getElementById('errorModal')).show();
        <?php endif; ?>
    });
</script>
<?php /**PATH C:\xampp\htdocs\Laravel\restaurant-menu-web\resources\views/template/footer/footer.blade.php ENDPATH**/ ?>