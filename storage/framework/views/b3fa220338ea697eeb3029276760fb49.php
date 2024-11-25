
<?php $__env->startSection("title", "Dish Manager"); ?>
<?php $__env->startSection("section-title", "Dishes"); ?>
<?php $__env->startSection("content"); ?>
    <div class="container my-4">
        <h2 class="text-center mb-4">Dish List</h2>
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
                    <th scope="col">Dish Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Category</th>
                    <th scope="col">User</th>
                    <th scope="col">Created At</th>
                    <th scope="col" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $dishes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dish): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($dish->id); ?></td>
                        <td><?php echo e($dish->dish_name); ?></td>
                        <td><?php echo e($dish->dish_description); ?></td>
                        <td><?php echo e($dish->dish_price); ?></td>
                        <td><?php echo e($dish->category ? $dish->category->category_name : 'No category assigned'); ?></td>
                        <td><?php echo e($dish->user ? $dish->user->username : 'No user assigned'); ?></td>
                        <td><?php echo e($dish->created_at->format('d-m-Y')); ?></td>
                        <td class="text-center">
                            <a href="<?php echo e(route('dish.show', $dish->id)); ?>" class="btn btn-info btn-sm mx-1">
                                <i class="fas fa-eye"></i> View
                            </a>
                            <a href="<?php echo e(route('dish.edit', $dish->id)); ?>" class="btn btn-warning btn-sm mx-1">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <!-- Button to open the modal -->
                            <button type="button" class="btn btn-danger btn-sm mx-1" data-bs-toggle="modal" data-bs-target="#deleteModal-<?php echo e($dish->id); ?>">
                                <i class="fas fa-trash"></i> Delete
                            </button> 

                                        <!-- Modal for delete confirmation -->
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
                                    
                                    <!-- Delete form -->
                                    <form action="<?php echo e(route('dish.destroy', $dish->id)); ?>" method="POST" style="display:inline;">
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

<?php echo $__env->make("template.sectiontemplate", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\restaurant-menu-web\resources\views/pages/dishes/index.blade.php ENDPATH**/ ?>