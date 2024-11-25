
<?php $__env->startSection("title", "Subscription Manager"); ?>
<?php $__env->startSection("section-title", "Subscriptions"); ?>
<?php $__env->startSection("content"); ?>
    <div class="container my-4">
        <h2 class="text-center mb-4">Subscription List</h2>
        
        <!-- Mensajes de éxito o error -->
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <?php if(session('error')): ?>
            <div class="alert alert-danger">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>

        <!-- Tabla de suscripciones -->
        <table class="table table-bordered table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Email</th>
                    <th scope="col" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $subscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($subscription->id); ?></td>
                        <td><?php echo e($subscription->email); ?></td>
                        <td class="text-center">
                            <!-- Botón para editar -->
                            <a href="<?php echo e(route('subscriptions.edit', $subscription->id)); ?>" class="btn btn-primary btn-sm mx-1">
                                <i class="fas fa-edit"></i> Edit
                            </a>

                            <!-- Botón para eliminar -->
                            <button type="button" class="btn btn-danger btn-sm mx-1" data-bs-toggle="modal" data-bs-target="#deleteModal-<?php echo e($subscription->id); ?>">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                            
                            <!-- Modal de confirmación -->
                            <div class="modal fade" id="deleteModal-<?php echo e($subscription->id); ?>" tabindex="-1" aria-labelledby="deleteModalLabel-<?php echo e($subscription->id); ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel-<?php echo e($subscription->id); ?>">Confirm Delete</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this subscription?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <form action="<?php echo e(route('subscriptions.destroy', $subscription->id)); ?>" method="POST" style="display:inline;">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("template.sectiontemplate", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\restaurant-menu-web\resources\views/pages/subscriptions/index.blade.php ENDPATH**/ ?>