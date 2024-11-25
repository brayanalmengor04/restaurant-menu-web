
<?php $__env->startSection("title", "Category Manager"); ?>
<?php $__env->startSection("section-title", "Category"); ?>
<?php $__env->startSection("content"); ?>
    <div class="container my-4">
        <h2 class="text-center mb-4">Category List</h2>
        
        <!-- Success message -->
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <table class="table table-bordered table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">User</th>
                    <th scope="col">Created At</th>
                    <th scope="col" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($category->id); ?></td>
                        <td><?php echo e($category->category_name); ?></td>
                        <td><?php echo e($category->user ? $category->user->username : 'No user assigned'); ?></td>
                        <td><?php echo e($category->created_at->format('d-m-Y')); ?></td>
                        <td class="text-center">
                            <a href="<?php echo e(route('category.show', $category->id)); ?>" class="btn btn-info btn-sm mx-1">
                                <i class="fas fa-eye"></i> View
                            </a>
                            <a href="<?php echo e(route('category.edit', $category->id)); ?>" class="btn btn-warning btn-sm mx-1">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                      <!-- Botón para abrir el modal (fuera de cualquier formulario) -->
            <button type="button" class="btn btn-danger btn-sm mx-1" data-bs-toggle="modal" data-bs-target="#deleteModal-<?php echo e($category->id); ?>">
                <i class="fas fa-trash"></i> Delete
            </button> 
                        <div class="modal fade" id="deleteModal-<?php echo e($category->id); ?>" tabindex="-1" aria-labelledby="deleteModalLabel-<?php echo e($category->id); ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel-<?php echo e($category->id); ?>">Confirm Delete</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this category?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        
                                        <!-- Formulario de eliminación -->
                                        <form action="<?php echo e(route('category.destroy', $category->id)); ?>" method="POST" style="display:inline;">
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
<?php echo $__env->make("template.sectiontemplate", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\restaurant-menu-web\resources\views/pages/category/index.blade.php ENDPATH**/ ?>