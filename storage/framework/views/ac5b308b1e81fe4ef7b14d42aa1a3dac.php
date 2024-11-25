<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

   <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #eceff1, #f8f9fa);
            color: #333;
            padding: 20px;
        }

        .principal-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .profile-card {
            display: flex; 
            background: url()
            justify-content: center;
            align-items: center;
            flex-direction: column;
            width: 500px;
            text-align: center;
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .profile-card img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #6c757d;
        }

        .profile-card h4 {
            margin-top: 15px;
            color: #333;
            font-weight: bold;
        }

        .profile-card p {
            color: #6c757d;
        }

        .profile-card .btn {
            border: none;
            color: #333;
            background: #eceff1;
            transition: all 0.3s ease;
        }

        .profile-card .btn:hover {
            background: #007bff;
            color: #fff;
        }

        .nav-tabs {
            margin-bottom: 20px;
            border-bottom: none;
        }

        .nav-link {
            border: 1px solid #ddd;
            border-radius: 8px;
            color: #333;
            margin: 0 5px;
            padding: 8px 15px;
        }

        .nav-link.active {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }

        .form-floating {
            position: relative;
            margin-bottom: 15px;
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 4px rgba(0, 123, 255, 0.5);
        }

        .btn-dark {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-dark:hover {
            background-color: #0056b3;
        }

        .alert {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1050;
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
<div class="principal-container">
    <!-- Alertas -->
    <?php if(session('success') || session('message')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success') ?? session('message')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="d-flex flex-column align-items-center w-100">
        <!-- Card de perfil -->
        <div class="profile-card" style="background-image: url('<?php echo e($user->background_image ? asset('storage/' . $user->background_image) : 'https://via.placeholder.com/500'); ?>');">
            <img src="<?php echo e($user->company_logo ? asset('storage/' . $user->company_logo) : 'https://via.placeholder.com/100'); ?>" alt="Profile">
            <h4><?php echo e($user->username); ?></h4>
            <p><?php echo e($user->contact_name); ?></p>
        </div>

        <!-- Formulario con pestañas -->
        <form action="<?php echo e(route('user.update', ['user' => $user->id])); ?>" method="POST" enctype="multipart/form-data" class="mt-4 w-100" style="max-width: 600px;">
            <?php echo method_field('PUT'); ?>
            <?php echo csrf_field(); ?>
            <ul class="nav nav-tabs justify-content-center" id="profileTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="user-tab" data-bs-toggle="tab" data-bs-target="#user" type="button" role="tab" aria-controls="user" aria-selected="true">User</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="restaurant-tab" data-bs-toggle="tab" data-bs-target="#restaurant" type="button" role="tab" aria-controls="restaurant" aria-selected="false">Restaurant</button>
                </li>
            </ul>
            <div class="tab-content" id="profileTabContent">
                <!-- Usuario -->
                <div class="tab-pane fade show active" id="user" role="tabpanel" aria-labelledby="user-tab">
                    <div class="row g-3">
                        <!-- Campos de usuario -->
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="username" class="form-control <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="username" placeholder="Username" value="<?php echo e(old('username', $user->username)); ?>">
                                <label for="username">Username</label>
                                <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" name="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email" placeholder="Your Email" value="<?php echo e(old('email', $user->email)); ?>">
                                <label for="email">Your Email</label>
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="password" name="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="password" placeholder="Password">
                                <label for="password">Password *</label>
                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="user_type" class="form-control <?php $__errorArgs = ['user_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="userType" placeholder="Type User" value="<?php echo e(old('user_type', $user->user_type)); ?>">
                                <label for="userType">Type User</label>
                                <?php $__errorArgs = ['user_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" name="status" class="form-control <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="status" placeholder="Status" value="<?php echo e(old('status', $user->status)); ?>">
                                <label for="status">Status</label>
                                <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contacto -->
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="row g-3">
                        <!-- Campos de contacto -->
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" name="contact_name" class="form-control <?php $__errorArgs = ['contact_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="contactName" placeholder="Contact Name" value="<?php echo e(old('contact_name', $user->contact_name)); ?>">
                                <label for="contactName">Contact Name *</label>
                                <?php $__errorArgs = ['contact_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="file" name="background_image" class="form-control <?php $__errorArgs = ['background_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="backgroundUser" accept="image/*">
                                <label for="backgroundUser">Background User</label>
                                <?php $__errorArgs = ['background_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Restaurante -->
                <div class="tab-pane fade" id="restaurant" role="tabpanel" aria-labelledby="restaurant-tab">
                    <div class="row g-3">
                        <!-- Campos de restaurante -->
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" name="restaurant_name" class="form-control <?php $__errorArgs = ['restaurant_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="restaurantName" placeholder="Restaurant Name" value="<?php echo e(old('restaurant_name', $user->restaurant_name)); ?>">
                                <label for="restaurantName">Restaurant Name</label>
                                <?php $__errorArgs = ['restaurant_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="file" name="company_logo" class="form-control <?php $__errorArgs = ['company_logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="companyLogo" accept="image/*">
                                <label for="companyLogo">Company Logo</label>
                                <?php $__errorArgs = ['company_logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
            <!-- Botón de guardar -->
            <div class="col-12 text-center mt-4">
                    <div class="d-flex justify-content-center gap-3">
                        <button type="submit" class="btn btn-dark rounded-pill py-3 px-5">Save</button>
                        <a href="<?php echo e(route('welcome')); ?>" class="btn btn-dark rounded-pill py-3 px-5 text-white text-decoration-none">Cancel</a>
                    </div>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\Laravel\restaurant-menu-web\resources\views/template/user/edit.blade.php ENDPATH**/ ?>