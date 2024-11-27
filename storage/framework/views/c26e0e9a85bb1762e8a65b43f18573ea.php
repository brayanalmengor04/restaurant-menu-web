<?php $__env->startSection("title", "API Districts"); ?>
<?php $__env->startSection("section-title", "Districts"); ?>
<?php $__env->startSection("content"); ?>
<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="display-5 text-primary">API Districts</h1>
        <div>
            <a href="<?php echo e(route('districts.index')); ?>" class="btn btn-outline-primary btn-lg me-2">
                <i class="bi bi-list-ul"></i> View All
            </a>
            <a href="<?php echo e(route('districts.create')); ?>" class="btn btn-primary btn-lg">
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
        Welcome to the API Districts section. Here you can manage all districts dynamically. Use the buttons above to get started!
    </p>

    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Province</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody id="districtTableBody">
            </tbody>
        </table>
    </div>
</div>

<!-- Confirmar eliminaccion------------------- -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="deleteDistrictForm" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>
                        Are you sure you want to delete the district 
                        <strong id="districtName"></strong>? This action cannot be undone.
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
<!-- Aqui hago el consumo de api con js  -->
<script src="<?php echo e(asset('js/api.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("template.sectiontemplate", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u426645434/domains/escueladeprogramacion.net/public_html/grupos/grupo1/resources/views/pages/api/district/index.blade.php ENDPATH**/ ?>