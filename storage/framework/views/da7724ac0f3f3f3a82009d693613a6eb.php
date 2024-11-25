
<?php $__env->startSection("title", "User Manager"); ?>
<?php $__env->startSection("section-title", "User"); ?>
<?php $__env->startSection("content"); ?>
    <div class="container my-4">
        <h2 class="text-center mb-4">User List</h2>

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
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact Name</th>
                    <th scope="col">Restaurant Name</th>
                    <th scope="col">Status</th>
                    <th scope="col" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($user->id); ?></td>
                        <td><?php echo e($user->username); ?></td>
                        <td><?php echo e($user->email); ?></td>
                        <td><?php echo e($user->contact_name); ?></td>
                        <td><?php echo e($user->restaurant_name); ?></td>
                        <td><?php echo e($user->status); ?></td>
                        <td class="text-center">
                            <a href="<?php echo e(route('user.edit', $user->id)); ?>" class="btn btn-warning btn-sm mx-1">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <!-- Delete button with modal -->
                            <button type="button" class="btn btn-danger btn-sm mx-1" data-bs-toggle="modal" data-bs-target="#deleteModal-<?php echo e($user->id); ?>">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                            <div class="modal fade" id="deleteModal-<?php echo e($user->id); ?>" tabindex="-1" aria-labelledby="deleteModalLabel-<?php echo e($user->id); ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel-<?php echo e($user->id); ?>">Confirm Delete</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this user?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <form action="<?php echo e(route('user.destroy', $user->id)); ?>" method="POST" style="display:inline;">
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

<?php echo $__env->make("template.sectiontemplate", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\restaurant-menu-web\resources\views/template/user/index.blade.php ENDPATH**/ ?>