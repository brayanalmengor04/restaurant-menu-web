<?php $__env->startSection("title","Sistema Restaurante -Principal Pages"); ?>
<?php $__env->startSection("content"); ?>  
    <!-- Reducir coding --> 
    <?php echo $__env->make("template.carrucel.carrucel", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
    <!-- About Start -->
    <?php if(session('confirmation_message')): ?>
<div id="confirmation-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Account Activation Required</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><?php echo e(session('confirmation_message')); ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
            <div class="position-relative overflow-hidden" style="height: 500px; width: 100%;">
    <iframe 
        src="https://lottie.host/embed/d7ae3141-3384-4cfd-8b7c-ca3de2a2e459/eOYtDHRYfv.json" 
        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: none;">
    </iframe>
</div> 
    <!-- Administrador  ------------->
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="display-5 mb-4">Innovative Web Solution for Menu & Dish Management</h1>
                    <p class="mb-4">
                        Welcome to our cutting-edge restaurant management platform. Designed to simplify and enhance the dining experience, our web application empowers users to create, customize, and manage their menus effortlessly. Explore a range of features tailored to meet the needs of restaurants and food enthusiasts alike.
                    </p>
                    <p><i class="fa fa-check text-primary me-3"></i>Create and manage dynamic menus with ease</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Integrated API documentation for seamless development</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Rate and review dishes to enhance user engagement</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Generate QR codes to share menus with customers instantly</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Access menus and ratings by specific users</p>
                    <a class="btn btn-primary rounded-pill py-3 px-5 mt-3 d-flex align-items-center justify-content-center" 
                    href="https://github.com/brayanalmengor04" 
                    style="background-color: #333; color: white; border: none;">
                    <i class="fab fa-github me-2"></i> Developer Github
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Administrador -->
<?php if(Auth::check() && Auth::user()->user_type == "admin"): ?>
<div class="container-fluid bg-light bg-icon my-5 py-6">
    <div class="container">
        <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-5 mb-3">Our Unique Features</h1>
            <p>Discover what sets our restaurant apart, from personalized menu options to easy subscription management for an unforgettable dining experience.</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="bg-white text-center h-100 p-4 p-xl-5">
                    <img class="img-fluid mb-4" src="<?php echo e(asset('img/icon-1.png')); ?>" alt="">
                    <h4 class="mb-3">Exclusive Dishes</h4>
                    <p class="mb-4">Experience a variety of chef-crafted dishes that blend tradition with creativity. Enjoy flavors crafted just for you.</p>
                    <a class="btn btn-outline-primary border-2 py-2 px-4 rounded-pill" href="<?php echo e(route('dish.index')); ?>">Discover Dishes</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="bg-white text-center h-100 p-4 p-xl-5">
                    <img class="img-fluid mb-4" src="<?php echo e(asset('img/icon-2.png')); ?>" alt="">
                    <h4 class="mb-3">Flexible Categories</h4>
                    <p class="mb-4">Browse and select from categories tailored to dietary preferences, including vegan, gluten-free, and more.</p>
                    <a class="btn btn-outline-primary border-2 py-2 px-4 rounded-pill" href="<?php echo e(route('category.index')); ?>">View Categories</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="bg-white text-center h-100 p-4 p-xl-5">
                    <img class="img-fluid mb-4" src="<?php echo e(asset('img/icon-3.png')); ?>" alt="">
                    <h4 class="mb-3">Dining Subscriptions</h4>
                    <p class="mb-4">Join our subscription program for exclusive deals, early access to special events, and members-only dishes.</p>
                    <a class="btn btn-outline-primary border-2 py-2 px-4 rounded-pill" href="">Subscribe</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>


<div class="container my-5">
    <h1 class="text-center mb-4 fw-bold text-primary">Top Rated Dishes</h1>
    <div class="row g-4">
        <?php if(isset($topRatings) && $topRatings->isNotEmpty()): ?>
            <?php $__currentLoopData = $topRatings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dish): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-sm border-0 h-100">
                        <!-- Dish Image -->
                        <div class="position-relative">
                       <img class="card-img-top rounded-top" 
                             src="<?php echo e($dish->dish_photo ? asset('storage/' . $dish->dish_photo) : asset('img/placeholder.png')); ?>" 
                             alt="<?php echo e($dish->dish_name); ?>" 
                            style="height: 200px; object-fit: cover;">

                            <div class="position-absolute top-0 end-0 bg-primary text-white px-3 py-1 rounded-start">
                                <strong><?php echo e($dish->average_rating); ?>/5</strong>
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold"><?php echo e($dish->dish_name); ?></h5>
                            <p class="text-muted mb-2">
                                <small>Category: <?php echo e($dish->category->category_name ?? 'No category assigned'); ?></small>
                            </p>
                            <p class="text-muted mb-2">
                                <small>Created by: <?php echo e($dish->user->username ?? 'Unknown user'); ?></small>
                            </p>
                            <!-- Stars -->
                            <div class="mb-3">
                                <?php for($i = 1; $i <= 5; $i++): ?>
                                    <?php if($i <= round($dish->average_rating)): ?>
                                        <i class="bi bi-star-fill text-warning"></i>
                                    <?php else: ?>
                                        <i class="bi bi-star text-secondary"></i>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </div>
                            <small class="text-muted">(<?php echo e($dish->ratings_count); ?> ratings)</small>
                        </div>

                        <!-- Card Footer -->
                        <div class="card-footer bg-light text-center">
                        <a href="<?php echo e(route('dish.show', $dish->id)); ?>" class="btn btn-outline-primary btn-sm">View Details</a>
                            <form action="<?php echo e(route('cart.add', $dish->id)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-primary btn-sm">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <p class="text-muted text-center">No top rated dishes available yet.</p>
        <?php endif; ?>
    </div>
</div>

<!-- Productos agregados -->
<div class="container-xxl py-5">
    <div class="container">
        <!-- Sección de encabezado -->
        <div class="row g-0 gx-5 align-items-end mb-5">
            <div class="col-lg-6">
                <div class="section-header text-start">
                    <h1 class="display-5">Our Products</h1>
                    <p>Explore a wide range of delicious dishes.</p>
                </div>
            </div>
           <div class="col-lg-6 text-start text-lg-end">
    <?php if(isset($categories) && $categories->isNotEmpty()): ?>
        <div class="d-flex justify-content-start justify-content-lg-end overflow-auto mb-5">
            <ul class="nav nav-pills d-inline-flex">
                <li class="nav-item me-2">
                    <a class="btn btn-outline-primary border-2 active" data-bs-toggle="pill" href="#all">All</a>
                </li>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="nav-item me-2">
                        <a class="btn btn-outline-primary border-2" data-bs-toggle="pill" href="#tab-<?php echo e($category->id); ?>">
                            <?php echo e($category->category_name); ?>

                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php else: ?>
        <p class="text-muted">No categories available.</p>
    <?php endif; ?>
</div>

        <!-- Sección de platos -->
        <div class="tab-content">
            <!-- Todos los platos -->
            <div id="all" class="tab-pane fade show active p-0">
                <div class="row g-4">
                    <?php if(isset($dishes) && $dishes->isNotEmpty()): ?>
                        <?php $__currentLoopData = $dishes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dish): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="product-item">
                                    <div class="position-relative bg-light overflow-hidden">
                                        <div class="img-container">
                                        <img class="img-fluid" 
                                            src="<?php echo e($dish->dish_photo ? asset('storage/' . $dish->dish_photo) : 'https://via.placeholder.com/300?text=No+Image+Available'); ?>" 
                                             alt="<?php echo e($dish->dish_name); ?>">

                                        </div>
                                        <?php if($dish->created_at > now()->subDays(7)): ?>
                                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="text-center p-4">
                                        <a class="d-block h5 mb-2" href="#"><?php echo e($dish->dish_name); ?></a>
                                        <span class="text-primary me-1">$<?php echo e($dish->dish_price); ?></span>
                                    </div>
                                    <div class="text-center mb-3">
                                        <small class="text-muted">Category: <?php echo e($dish->category->category_name ?? 'N/A'); ?></small><br>
                                        <small class="text-muted">Added by: <?php echo e($dish->user->restaurant_name ?? 'Admin'); ?></small>
                                    </div>
                                    <div class="text-center mb-3">
                                        <div class="rating" data-dish-id="<?php echo e($dish->id); ?>">
                                            <?php for($i = 1; $i <= 5; $i++): ?>
                                                <i class="fa fa-star text-muted star" data-value="<?php echo e($i); ?>"></i>
                                            <?php endfor; ?>
                                        </div>
                                        </div>
                                    <div class="d-flex border-top">
                                        <small class="w-50 text-center border-end py-2">
                                        <a href="<?php echo e(route('dish.show', $dish->id)); ?>" class="btn btn-outline-primary btn-sm">View Details</a>
                                        </small>
                                        <small class="w-50 text-center py-2">
                                            <form action="<?php echo e(route('cart.add', $dish->id)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" class="btn btn-link text-body p-0">
                                                    <i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart
                                                </button>
                                            </form>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <p class="text-muted text-center">No dishes available.</p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Platos por categoría -->
            <?php if(isset($categories) && $categories->isNotEmpty()): ?>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div id="tab-<?php echo e($category->id); ?>" class="tab-pane fade p-0">
                        <div class="row g-4">
                            <?php
                                $categoryDishes = $dishes->where('category_id', $category->id);
                            ?>
                            <?php if($categoryDishes->isNotEmpty()): ?>
                                <?php $__currentLoopData = $categoryDishes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dish): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                        <div class="product-item">
                                            <div class="position-relative bg-light overflow-hidden">
                                                <div class="img-container">
                                                    <img class="img-fluid" src="<?php echo e(asset('storage/' . $dish->dish_photo)); ?>" alt="<?php echo e($dish->dish_name); ?>">
                                                </div>
                                                <?php if($dish->created_at > now()->subDays(7)): ?>
                                                    <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="text-center p-4">
                                                <a class="d-block h5 mb-2" href="#"><?php echo e($dish->dish_name); ?></a>
                                                <span class="text-primary me-1">$<?php echo e($dish->dish_price); ?></span>
                                            </div>
                                            <div class="text-center mb-3">
                                                <small class="text-muted">Category: <?php echo e($dish->category->category_name ?? 'N/A'); ?></small><br>
                                                <small class="text-muted">Added by: <?php echo e($dish->user->restaurant_name ?? 'Admin'); ?></small>
                                            </div>
                                            <div class="text-center mb-3">
                                                <div class="rating" data-dish-id="<?php echo e($dish->id); ?>">
                                                    <?php for($i = 1; $i <= 5; $i++): ?>
                                                        <i class="fa fa-star text-muted star" data-value="<?php echo e($i); ?>"></i>
                                                    <?php endfor; ?>
                                                </div>
                                            </div>
                                            <div class="d-flex border-top">
                                                <small class="w-50 text-center border-end py-2">
                                                <a href="<?php echo e(route('dish.show', $dish->id)); ?>" class="btn btn-outline-primary btn-sm">View Details</a>                                                </small>
                                                <small class="w-50 text-center py-2">
                                                    <form action="<?php echo e(route('cart.add', $dish->id)); ?>" method="POST">
                                                        <?php echo csrf_field(); ?>
                                                        <button type="submit" class="btn btn-link text-body p-0">
                                                            <i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart
                                                        </button>
                                                    </form>
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <p class="text-muted text-center">No dishes available in this category.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- Si estoy logeado puedo hacer la reseña  -->
<?php if(auth()->check()): ?>
   <!-- Modal de calificación -->
<div class="modal fade" id="ratingModal" tabindex="-1" aria-labelledby="ratingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="ratingForm" method="POST" action="<?php echo e(route('dish.rate')); ?>">
                <?php echo csrf_field(); ?>
                <input type="hidden" id="dish_id" name="dish_id">
                <input type="hidden" id="rating_value" name="rating">

                <div class="modal-body">
                    <div class="text-center mb-3">
                        <div class="selected-rating">
                            <?php for($i = 1; $i <= 5; $i++): ?>
                                <i class="fa fa-star text-muted star-modal" data-value="<?php echo e($i); ?>"></i>
                            <?php endfor; ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="review" class="form-label">Review</label>
                        <textarea id="review" name="review" class="form-control" rows="3" placeholder="Write your review here..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit Rating</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php else: ?>
    <!-- Botón para mostrar el modal de alerta de inicio de sesión -->
    <div class="text-center mb-3">
        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#loginAlertModal">
            Rate this Dish
        </button>
    </div>

    <!-- Modal de alerta de inicio de sesión -->
    <div class="modal fade" id="loginAlertModal" tabindex="-1" aria-labelledby="loginAlertModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h5 class="modal-title mb-3" id="loginAlertModalLabel">Login Required</h5>
                    <p>You need to log in to rate this dish.</p>
                    <a href="<?php echo e(route('login')); ?>" class="btn btn-primary">Log in</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<script src="<?php echo e(asset('js/rating.js')); ?>"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() { 
        // Mostrar modal de confirmación si hay mensaje en sesión
        <?php if(session('confirmation_message')): ?>
            var modalElement = document.getElementById('confirmation-modal');
            if (modalElement) {
                var modal = bootstrap.Modal.getInstance(modalElement) || new bootstrap.Modal(modalElement);
                modal.show();
            }
        <?php endif; ?>
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("template.template", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u426645434/domains/escueladeprogramacion.net/public_html/grupos/grupo1/resources/views/welcome.blade.php ENDPATH**/ ?>