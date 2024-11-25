
<?php $__env->startSection("title", "Edit Subscription"); ?>
<?php $__env->startSection("section-title", "Subscription"); ?>
<?php $__env->startSection("content"); ?>
<div class="container-xxl py-6">
    <div class="container">
        <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-5 mb-3">Edit Subscription</h1>
            <p>Update the email address for your subscription below.</p>
        </div>
        <div class="row g-5 justify-content-center">
            <div class="col-lg-7 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                <form action="<?php echo e(route('subscriptions.update', $subscription->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="row g-3">
                        <!-- Email Field -->
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email" name="email" placeholder="Your Email" value="<?php echo e(old('email', $subscription->email)); ?>">
                                <label for="email">Your Email</label>
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="form-text text-muted"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-12">
                            <button class="btn btn-primary rounded-pill py-3 px-5" type="submit">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("template.sectiontemplate", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\restaurant-menu-web\resources\views/pages/subscriptions/edit.blade.php ENDPATH**/ ?>