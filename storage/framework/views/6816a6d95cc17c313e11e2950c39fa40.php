

<?php $__env->startSection("title","Administrador Category"); ?>
<?php $__env->startSection("section-title","Category"); ?>
<?php $__env->startSection("content"); ?> 

<?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

<!-- Formulario para registrar una categoría -->
<div class="container mt-4">
    <form action="<?php echo e(route('category.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="card">
            <div class="card-header">
                <h3>Register Category!</h3>
                <p>Please fill in the details to register.</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Selección de usuario -->
                    <div class="col-md-6">
                        <div class="form-floating">
                            <select class="form-control" id="user_id" name="user_id" required>
                                <option value="" disabled selected>Select User</option>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($user->id); ?>"><?php echo e($user->username); ?> (<?php echo e($user->email); ?>)</option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <label for="user_id">User Name</label>
                        </div>
                    </div>

                    <!-- Campo para el nombre de la categoría -->
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input 
                                type="text" 
                                class="form-control" 
                                id="category_name" 
                                name="category_name" 
                                placeholder="Category name*" 
                                required>
                            <label for="category_name">Category Name *</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">Save Category</button>
            </div>
        </div>
    </form>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("template.sectiontemplate", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\restaurant-menu-web\resources\views/pages/category/create.blade.php ENDPATH**/ ?>