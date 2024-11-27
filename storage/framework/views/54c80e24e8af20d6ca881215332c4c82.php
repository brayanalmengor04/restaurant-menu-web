<?php $__env->startSection("title", "Corregimientos API"); ?>
<?php $__env->startSection("section-title", "Corregimientos"); ?>
<?php $__env->startSection("content"); ?>
<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="display-5 text-primary">Corregimientos API</h1>
        <div>
            <a href="<?php echo e(route('corregimientos.index')); ?>" class="btn btn-outline-primary btn-lg me-2">
                <i class="bi bi-list-ul"></i> View All
            </a>
            <a href="<?php echo e(route('corregimientos.create')); ?>" class="btn btn-primary btn-lg">
                <i class="bi bi-plus-lg"></i> Create New
            </a>
        </div>
    </div>
    <hr class="my-4">
    <?php if(session('message')): ?>
        <div class="alert alert-<?php echo e(session('type', 'info')); ?> text-center">
            <?php echo e(session('message')); ?>

        </div>
    <?php endif; ?>
    <p class="lead text-muted">
        Welcome to the Corregimientos API section. Here you can manage all corregimientos dynamically. Use the buttons above to get started!
    </p>

    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>Corregimiento Name</th>
                    <th>District Name</th>
                    <th>Province Name</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody id="corregimientoTableBody">
            </tbody>
        </table>
    </div>
</div>

<!-- Confirm Delete -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="deleteCorregimientoForm" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>
                        Are you sure you want to delete the corregimiento 
                        <strong id="corregimientoName"></strong>? This action cannot be undone.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- JavaScript for API consumption -->
<script src="<?php echo e(asset('js/api.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("template.sectiontemplate", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u426645434/domains/escueladeprogramacion.net/public_html/grupos/grupo1/resources/views/pages/api/corregimiento/index.blade.php ENDPATH**/ ?>