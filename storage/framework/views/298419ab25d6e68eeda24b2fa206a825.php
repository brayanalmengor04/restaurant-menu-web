    <!-- Navbar Start -->
    <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
            <div class="col-lg-6 px-5 text-start">
                <small><i class="fa fa-map-marker-alt me-2"></i>Panamá , Panama City</small>
                <small class="ms-4"><i class="fa fa-envelope me-2"></i>info@developer.com</small>
            </div>
            <div class="col-lg-6 px-5 text-end">
                <small>Follow me:</small>
                <a class="text-body ms-3" href=""><i class="fab fa-facebook-f"></i></a>
                <a class="text-body ms-3" href=""><i class="fab fa-twitter"></i></a>
                <a class="text-body ms-3" href=""><i class="fab fa-linkedin-in"></i></a>
                <a class="text-body ms-3" href=""><i class="fab fa-instagram"></i></a>
            </div>
        </div> 
          <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

        <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <a href="" class="navbar-brand ms-4 ms-lg-0">
                <h1 class="fw-bold text-primary m-0">F<span class="text-secondary">oo</span>dy</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="<?php echo e(route('welcome')); ?>" class="nav-item nav-link active">Home</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Record</a>
                        <div class="dropdown-menu m-0">
                            <a href="<?php echo e(route('category.index')); ?>" class="dropdown-item">Category Record</a>
                            <a href="<?php echo e(route ('dish.index')); ?>" class="dropdown-item">Dishes Record</a>
                            <a href="<?php echo e(route('subscriptions.index')); ?>" class="dropdown-item">Subscriptions Record </a> 
                            <!-- Podre darle permisos para agregar categorias y productos -->
                            <a href="<?php echo e(route('user.index')); ?>" class="dropdown-item">User Record</a> 
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">API PanamaAPI</a>
                        <div class="dropdown-menu m-0">
                            <a href="<?php echo e(route('api.documentation')); ?>" class="dropdown-item">Documentation</a>
                            <a href="<?php echo e(route('provinces.view')); ?>" class="dropdown-item">Provincies Record</a>
                            <a href="<?php echo e(route('districts.view')); ?>" class="dropdown-item">District Record </a> 
                        
                            <a href="<?php echo e(route('corregimientos.view')); ?>" class="dropdown-item">Corregmiento</a> 
                        </div>
                    </div>
                    <a href="<?php echo e(route('menu.qr')); ?>" class="nav-item nav-link">QR Preview</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Administrator</a>
                        <div class="dropdown-menu m-0">
                            <a href="<?php echo e(route('category.create')); ?>" class="dropdown-item">Category</a>
                            <a href="<?php echo e(route ('dish.create')); ?>" class="dropdown-item">Dishes</a>
                            <a href="<?php echo e(route('subscriptions.create')); ?>" class="dropdown-item">Subscriptions</a> 
                            <!-- Podre darle permisos para agregar categorias y productos -->
                            <a href="<?php echo e(route('user.create')); ?>" class="dropdown-item">Administrator user</a> 
                        </div>
                    </div>
                    <a href="#" class="nav-item nav-link">Contact Us</a>
                </div>
                <div class="d-none d-lg-flex ms-2">
                    <a class="btn-sm-square bg-white rounded-circle ms-3" href="">
                        <small class="fa fa-search text-body"></small>
                    </a>
                    <!-- Hacer login  -->
                    <?php if(!Auth::check()): ?>
                            <a class="btn-sm-square bg-white rounded-circle ms-3" href="<?php echo e(route('login')); ?>">
                                <small class="fa fa-user text-body"></small>
                            </a>
                    <?php else: ?>
                    <a class="btn-sm-square bg-white rounded-circle ms-3" href="<?php echo e(route('user.edit', ['user' => Auth::id()])); ?>">
                     <small class="fa fa-user text-body"></small>
                    </a>
                    <?php endif; ?>
                    <a class="btn-sm-square bg-white rounded-circle ms-3" href="<?php echo e(route('cart.index')); ?>">
                        <small class="fa fa-shopping-bag text-body"></small>
                    </a>  
                    <?php if(Auth::check()): ?> 
                    <a class="d-flex align-items-center rounded-circle ms-3" href="<?php echo e(route('logout')); ?>">
                        <small class="fa fa-user text-danger me-2"></small>
                        <span class="text-danger">Log out</span>
                    </a> 
                    <?php endif; ?>
                </div>
            </div>
        </nav>
    </div>


<?php /**PATH C:\xampp\htdocs\Laravel\restaurant-menu-web\resources\views/template/navbar/navbar.blade.php ENDPATH**/ ?>