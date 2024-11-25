<!doctype html>
<html lang="en">
    <head>
        <title>Shopping cart</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <!-- Navbar opcional -->
        </header>
        <main>
            <div class="container py-5">
                <div class="row">
                    <!-- Sección del carrito -->
                    <div class="col-md-8">
                        <h2 class="mb-4">Carts</h2>
                        <?php if(session('success')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('success')); ?>

                            </div>
                        <?php endif; ?>
                        <?php if(empty($cart)): ?>
                            <p class="text-muted">Your cart is empty.</p>
                        <?php else: ?>
                            <div class="card">
                                <div class="card-body">
                                    <?php
                                        // Inicialización del precio total
                                        $totalPrice = 0;
                                    ?>
                                    <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $itemTotal = $item['price'] * $item['quantity'];
                                            $totalPrice += $itemTotal;
                                        ?>
                                        <div class="d-flex justify-content-between align-items-center border-bottom py-3">
                                            <div class="d-flex align-items-center">
                                                <img src="<?php echo e(asset('storage/' . $item['photo'])); ?>" alt="<?php echo e($item['name']); ?>" style="width: 70px; height: 70px; object-fit: cover; margin-right: 15px;">
                                                <div>
                                                    <h6 class="mb-0"><?php echo e($item['name']); ?></h6>
                                                    <small class="text-muted">Unit price: $<?php echo e($item['price']); ?></small>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="input-group me-3">
                                                    <span class="input-group-text">Amount: </span>
                                                    <input type="text" class="form-control" value="<?php echo e($item['quantity']); ?>" readonly />
                                                </div>
                                                <form action="<?php echo e(route('cart.remove', $id)); ?>" method="POST" class="d-inline">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="bi bi-trash-fill"></i> <!-- Icono de trash -->
                                                        </button>
                                                </form>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <!-- Resumen de compra -->
                    <div class="col-md-4">
                        <?php
                            $totalPrice = $totalPrice ?? 0; // Validación si $totalPrice no está definido
                        ?>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Purchase summary</h5>
                                <ul class="list-group list-group-flush mb-3">
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>Subtotal</span>
                                        <span>$<?php echo e(number_format($totalPrice, 2)); ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>Discounts</span>
                                        <span>$0.00</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between fw-bold">
                                        <span>Total to pay</span>
                                        <span>$<?php echo e(number_format($totalPrice, 2)); ?></span>
                                    </li>
                                </ul>
                                <button class="btn btn-primary w-100">Make purchase</button>
                                <a href="<?php echo e(route('welcome')); ?>" class="btn btn-link w-100 mt-2">Continue shopping</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer>
        </footer>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    </body>
</html>
<?php /**PATH C:\xampp\htdocs\Laravel\restaurant-menu-web\resources\views/pages/cart/index.blade.php ENDPATH**/ ?>