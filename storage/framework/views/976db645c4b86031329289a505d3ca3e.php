
<?php $__env->startSection('title', 'Menu QR Code'); ?>
<?php $__env->startSection('section-title', 'QR Code for Menu'); ?>
<?php $__env->startSection('content'); ?>
<div class="container text-center mt-5">
    <h3>Scan the QR Code to view the menu</h3>
    <p>This QR Code redirects to the list of dishes.</p>
    <div class="mt-4">
        <!-- Mostrar el QR generado -->
        <?php echo $qr; ?>

    </div>
    <div class="mt-3">
        <a href="<?php echo e(route('user.dishes')); ?>" class="btn btn-primary">Go to Menu</a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.sectiontemplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\restaurant-menu-web\resources\views/template/menu/qr.blade.php ENDPATH**/ ?>