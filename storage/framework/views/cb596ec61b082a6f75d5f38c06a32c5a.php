
<?php $__env->startSection("title", "Dish Manager"); ?>
<?php $__env->startSection("section-title", "Dish"); ?>
<?php $__env->startSection("content"); ?>

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Tarjeta de información del plato -->
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0"><?php echo e($dish->dish_name); ?></h5>
                    <?php if($dish->user->company_logo): ?>
                        <!-- Imagen de logo de la empresa -->
                        <img src="<?php echo e(asset('storage/' . $dish->user->company_logo)); ?>" alt="Company Logo" class="rounded-circle" style="width: 50px; height: 50px;">
                    <?php endif; ?>
                </div>
                
                <?php if($dish->user->background_image): ?>
                    <!-- Imagen de fondo -->
                    <img src="<?php echo e(asset('storage/' . $dish->user->background_image)); ?>" class="card-img-top" alt="Background Image">
                <?php endif; ?>
                <div class="card-body"> 
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Created By:</strong> <?php echo e($dish->user->username ?? 'Unknown'); ?></li>
                        <li class="list-group-item"><strong>Dish Description:</strong> <?php echo e($dish->dish_description ?? 'No description'); ?></li>
                        <li class="list-group-item"><strong>Price:</strong> $<?php echo e($dish->dish_price); ?></li>
                        <li class="list-group-item"><strong>Category:</strong> <?php echo e($dish->category ? $dish->category->category_name : 'No category assigned'); ?></li>
                        <li class="list-group-item"><strong>Date Created:</strong> <?php echo e($dish->created_at->format('d/m/Y')); ?></li>
                        <li class="list-group-item"><strong>Last Updated:</strong> <?php echo e($dish->updated_at->format('d/m/Y')); ?></li>
                    </ul>
                    
                    <?php if(Auth::check() && Auth::user()->user_type == "admin"): ?>
                    <div class="d-flex justify-content-end mt-3">
                        <a href="<?php echo e(route('dish.edit', $dish->id)); ?>" class="btn btn-warning me-2">Edit</a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-<?php echo e($dish->id); ?>">Delete</button>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de confirmación de eliminación -->
<div class="modal fade" id="deleteModal-<?php echo e($dish->id); ?>" tabindex="-1" aria-labelledby="deleteModalLabel-<?php echo e($dish->id); ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel-<?php echo e($dish->id); ?>">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this dish?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form action="<?php echo e(route('dish.destroy', $dish->id)); ?>" method="POST" style="display:inline;">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("template.sectiontemplate", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\restaurant-menu-web\resources\views/pages/dishes/show.blade.php ENDPATH**/ ?>