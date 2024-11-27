<?php $__env->startSection("title","Create new User!"); ?>
<?php $__env->startSection("section-title","user"); ?>
<?php $__env->startSection("content"); ?>
<div class="container-xxl py-6">
    <div class="container">
        <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-5 mb-3">Register User!</h1>
            <p>Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
        </div>
        <div class="row g-5 justify-content-center">
        <div class="row g-5 justify-content-center">
            <div class="col-lg-5 col-md-12 wow fadeInUp" data-wow-delay="0.1s">
                <div class="bg-primary text-white d-flex flex-column justify-content-center h-100 p-5">
                    <h5 class="text-white">Call Us</h5>
                    <p class="mb-5"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <h5 class="text-white">Email Us</h5>
                    <p class="mb-5"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                    <h5 class="text-white">Office Address</h5>
                    <p class="mb-5"><i class="fa fa-map-marker-alt me-3"></i>Panamá , Panama City</p>
                    <h5 class="text-white">Follow Us</h5>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-0" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                </div>
            <div class="col-lg-7 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
        
                <form action="<?php echo e(route('user.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                    <div class="row g-3">
                        <!-- Username Field -->
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="username" name="username" placeholder="Username" value="<?php echo e(old('username')); ?>">
                                <label for="username">Username</label>
                                <?php $__errorArgs = ['username'];
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
                        
                        <!-- Email Field -->
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email" name="email" placeholder="Your Email" value="<?php echo e(old('email')); ?>">
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

                        <!-- Password Field -->
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="password" name="password" placeholder="Password">
                                <label for="password">Password</label>
                                <?php $__errorArgs = ['password'];
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

                        <!-- Contact Name Field -->
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control <?php $__errorArgs = ['contact_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="contact_name" name="contact_name" placeholder="Contact Name" value="<?php echo e(old('contact_name')); ?>">
                                <label for="contact_name">Contact Name</label>
                                <?php $__errorArgs = ['contact_name'];
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

                        <!-- Restaurant Name Field -->
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control <?php $__errorArgs = ['restaurant_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="restaurant_name" name="restaurant_name" placeholder="Restaurant Name" value="<?php echo e(old('restaurant_name')); ?>">
                                <label for="restaurant_name">Restaurant Name</label>
                                <?php $__errorArgs = ['restaurant_name'];
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

                        <!-- Background Image Field -->
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="file" class="form-control <?php $__errorArgs = ['background_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="background_image" name="background_image" placeholder="Background Image" accept="image/*">
                                <label for="background_image">Background Image</label>
                                <?php $__errorArgs = ['background_image'];
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

                        <!-- Company Logo Field -->
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="file" class="form-control <?php $__errorArgs = ['company_logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="company_logo" name="company_logo" placeholder="Company Logo" accept="image/*">
                                <label for="company_logo">Company Logo</label>
                                <?php $__errorArgs = ['company_logo'];
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
                 <!-- User Type Field -->
                    <?php if(Auth::check() && Auth::user()->user_type == "admin"): ?>
                        <!-- Si el usuario está autenticado como administrador, se desglosan todas las opciones -->
                        <div class="col-12">
                            <div class="form-floating">
                                <select class="form-control <?php $__errorArgs = ['user_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="user_type" id="user_type">
                                    <option value="" disabled selected>Select User Type</option>
                                    <option value="admin" <?php echo e(old('user_type', $user->user_type ?? '') == 'admin' ? 'selected' : ''); ?>>admin</option>
                                    <option value="customer" <?php echo e(old('user_type', $user->user_type ?? '') == 'customer' ? 'selected' : ''); ?>>customer</option>
                                    <option value="vendor" <?php echo e(old('user_type', $user->user_type ?? '') == 'vendor' ? 'selected' : ''); ?>>vendor</option>
                                </select>
                                <label for="user_type">User Type</label>
                                <?php $__errorArgs = ['user_type'];
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
                    <?php else: ?>
                        <!-- Si el usuario no está autenticado o no es administrador, solo permite la selección de "Customer" -->
                        <div class="col-12">
                            <div class="form-floating">
                                <select class="form-control <?php $__errorArgs = ['user_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="user_type" id="user_type" readonly>
                                    <option value="customer" selected>customer</option>
                                </select>
                                <label for="user_type">User Type</label>
                                <?php $__errorArgs = ['user_type'];
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
                    <?php endif; ?>
                        <!-- Status Field -->
                        <div class="col-12">
                            <div class="form-floating">
                                <select class="form-control <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="status" id="status">
                                    <option value="" disabled selected>Select Status</option>
                                    <option value="1" <?php echo e(old('status') == '1' ? 'selected' : ''); ?>>Active</option>
                                    <option value="0" <?php echo e(old('status') == '0' ? 'selected' : ''); ?>>Inactive</option>
                                </select>
                                <label for="status">Status</label>
                                <?php $__errorArgs = ['status'];
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
                            <button class="btn btn-primary rounded-pill py-3 px-5" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make("template.sectiontemplate", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u426645434/domains/escueladeprogramacion.net/public_html/grupos/grupo1/resources/views/template/user/create.blade.php ENDPATH**/ ?>