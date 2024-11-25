<!doctype html>
<html lang="en">
    <head>
        <title><?php echo $__env->yieldContent("title"); ?></title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        
        <!-- Bootstrap CSS v5.2.1 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" /> 
        
        <!-- Favicon -->
        <link href="<?php echo e(asset('img/favicon.ico')); ?>" rel="icon">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="<?php echo e(asset('lib/animate/animate.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('lib/owlcarousel/assets/owl.carousel.min.css')); ?>" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
        <!-- Template Stylesheet -->
        <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
    </head>

    <body>
        <header>
        <?php if(Auth::check() && Auth::user()->user_type == "admin"): ?>
            <?php echo $__env->make('template.navbar.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?>
            <?php echo $__env->make('template.navbar.navbarpublic', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?> 
        
        <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container">
                <h1 class="display-3 mb-3 animated slideInDown"><?php echo $__env->yieldContent("section-title"); ?></h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a class="text-body" href="<?php echo e(route('welcome')); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-body" href="#">Pages</a></li>
                        <li class="breadcrumb-item text-dark active" aria-current="page"><?php echo $__env->yieldContent("section-title"); ?></li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->
        </header>
        <main>
            <?php echo $__env->yieldContent("content"); ?>
        </main>
        <footer>
            <!-- place footer here --> 
             <?php echo $__env->make("template.footer.footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </footer>
        
        <!-- Scripts template -->
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo e(asset('lib/wow/wow.min.js')); ?>"></script>
        <script src="<?php echo e(asset('lib/easing/easing.min.js')); ?>"></script>
        <script src="<?php echo e(asset('lib/waypoints/waypoints.min.js')); ?>"></script>
        <script src="<?php echo e(asset('lib/owlcarousel/owl.carousel.min.js')); ?>"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/styles/dracula.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/highlight.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/languages/json.min.js"></script>
        <!-- Template Javascript -->
        <script src="<?php echo e(asset('js/main.js')); ?>"></script>
        
        <!-- Bootstrap scripts -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\Laravel\restaurant-menu-web\resources\views/template/sectiontemplate.blade.php ENDPATH**/ ?>