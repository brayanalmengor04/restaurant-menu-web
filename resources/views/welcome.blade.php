@extends("template.template")
@section("title","Sistema Restaurante -Principal Pages")
@section("content")  
    <!-- Reducir coding --> 
    @include("template.carrucel.carrucel") 
    <!-- About Start -->
    @if(session('confirmation_message'))
<div id="confirmation-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Account Activation Required</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>{{ session('confirmation_message') }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endif

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
@if(Auth::check() && Auth::user()->user_type == "admin")
<div class="container-fluid bg-light bg-icon my-5 py-6">
    <div class="container">
        <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-5 mb-3">Our Unique Features</h1>
            <p>Discover what sets our restaurant apart, from personalized menu options to easy subscription management for an unforgettable dining experience.</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="bg-white text-center h-100 p-4 p-xl-5">
                    <img class="img-fluid mb-4" src="{{ asset('img/icon-1.png') }}" alt="">
                    <h4 class="mb-3">Exclusive Dishes</h4>
                    <p class="mb-4">Experience a variety of chef-crafted dishes that blend tradition with creativity. Enjoy flavors crafted just for you.</p>
                    <a class="btn btn-outline-primary border-2 py-2 px-4 rounded-pill" href="{{ route('dish.index')}}">Discover Dishes</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="bg-white text-center h-100 p-4 p-xl-5">
                    <img class="img-fluid mb-4" src="{{ asset('img/icon-2.png') }}" alt="">
                    <h4 class="mb-3">Flexible Categories</h4>
                    <p class="mb-4">Browse and select from categories tailored to dietary preferences, including vegan, gluten-free, and more.</p>
                    <a class="btn btn-outline-primary border-2 py-2 px-4 rounded-pill" href="{{ route('category.index')}}">View Categories</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="bg-white text-center h-100 p-4 p-xl-5">
                    <img class="img-fluid mb-4" src="{{ asset('img/icon-3.png') }}" alt="">
                    <h4 class="mb-3">Dining Subscriptions</h4>
                    <p class="mb-4">Join our subscription program for exclusive deals, early access to special events, and members-only dishes.</p>
                    <a class="btn btn-outline-primary border-2 py-2 px-4 rounded-pill" href="">Subscribe</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endif


<div class="container my-5">
    <h1 class="text-center mb-4 fw-bold text-primary">Top Rated Dishes</h1>
    <div class="row g-4">
        @if(isset($topRatings) && $topRatings->isNotEmpty())
            @foreach($topRatings as $dish)
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-sm border-0 h-100">
                        <!-- Dish Image -->
                        <div class="position-relative">
                        <img class="card-img-top rounded-top"
                        src="{{asset($dish->dish_photo) ? :  'https://via.placeholder.com/300?text=No+Image+Available' }}""
                         alt="{{ $dish->dish_name }}"
                        style="height: 200px; object-fit: cover;">
<!--                         
                        Solucion del storage en produccion necesita SSH
                        <div class="position-relative">
                        <img class="card-img-top rounded-top"
                        src="{{asset($dish->dish_photo)}}"
                         alt="{{ $dish->dish_name }}"
                        style="height: 200px; object-fit: cover;"> -->

                            <div class="position-absolute top-0 end-0 bg-primary text-white px-3 py-1 rounded-start">
                                <strong>{{ $dish->average_rating }}/5</strong>
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold">{{ $dish->dish_name }}</h5>
                            <p class="text-muted mb-2">
                                <small>Category: {{ $dish->category->category_name ?? 'No category assigned' }}</small>
                            </p>
                            <p class="text-muted mb-2">
                                <small>Created by: {{ $dish->user->username ?? 'Unknown user' }}</small>
                            </p>
                            <!-- Stars -->
                            <div class="mb-3">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= round($dish->average_rating))
                                        <i class="bi bi-star-fill text-warning"></i>
                                    @else
                                        <i class="bi bi-star text-secondary"></i>
                                    @endif
                                @endfor
                            </div>
                            <small class="text-muted">({{ $dish->ratings_count }} ratings)</small>
                        </div>

                        <!-- Card Footer -->
                        <div class="card-footer bg-light text-center">
                        <a href="{{ route('dish.show', $dish->id) }}" class="btn btn-outline-primary btn-sm">View Details</a>
                            <form action="{{ route('cart.add', $dish->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-muted text-center">No top rated dishes available yet.</p>
        @endif
    </div>
</div>

@if ($reviews->isEmpty())
    <p>No hay reseñas disponibles.</p>
@else
    <!-- Testimonial Start -->
    <div class="container-fluid bg-light bg-icon py-6 mb-5">
        <div class="container">
            <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-5 mb-3">Customer Review</h1>
                <p>A space where users share feedback, ratings, and experiences to help others make informed decisions and build trust through honest opinions.</p>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                @foreach ($reviews as $review)
                    <div class="testimonial-item position-relative bg-white p-5 mt-4">
                        <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                        <p class="mb-4">{{ $review->review }}</p>
                        
                        <!-- Sistema de estrellas -->
                        <div class="rating mb-3">
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="fa fa-star{{ $i <= $review->rating ? ' text-warning' : '-o' }}"></i>
                            @endfor
                        </div>
                        
                        <div class="d-flex align-items-center">
                           <img class="flex-shrink-0 rounded-circle" 
     src="{{ asset($review->user->company_logo ?: 'https://via.placeholder.com/150') }}" 
     alt="User Image">

                            <div class="ms-3">
                                <h5 class="mb-1">{{ $review->user->username }}</h5>
                                <span>{{ $review->user->email }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
@endif

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
    @if(isset($categories) && $categories->isNotEmpty())
        <div class="d-flex justify-content-start justify-content-lg-end overflow-auto mb-5">
            <ul class="nav nav-pills d-inline-flex">
                <li class="nav-item me-2">
                    <a class="btn btn-outline-primary border-2 active" data-bs-toggle="pill" href="#all">All</a>
                </li>
                @foreach ($categories as $category)
                    <li class="nav-item me-2">
                        <a class="btn btn-outline-primary border-2" data-bs-toggle="pill" href="#tab-{{ $category->id }}">
                            {{ $category->category_name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @else
        <p class="text-muted">No categories available.</p>
    @endif
</div>

        <!-- Sección de platos -->
        <div class="tab-content">
            <!-- Todos los platos -->
            <div id="all" class="tab-pane fade show active p-0">
                <div class="row g-4">
                    @if(isset($dishes) && $dishes->isNotEmpty())
                        @foreach ($dishes as $dish)
                            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="product-item">
                                    <div class="position-relative bg-light overflow-hidden">
                                        <div class="img-container">
                                        <img class="img-fluid"
                                            src="{{asset($dish->dish_photo) ? :  'https://via.placeholder.com/300?text=No+Image+Available' }}"
                                            alt="{{ $dish->dish_name }}"
                                           >

                                        </div>
                                        @if($dish->created_at > now()->subDays(7))
                                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                                        @endif
                                    </div>
                                    <div class="text-center p-4">
                                        <a class="d-block h5 mb-2" href="#">{{ $dish->dish_name }}</a>
                                        <span class="text-primary me-1">${{ $dish->dish_price }}</span>
                                    </div>
                                    <div class="text-center mb-3">
                                        <small class="text-muted">Category: {{ $dish->category->category_name ?? 'N/A' }}</small><br>
                                        <small class="text-muted">Added by: {{ $dish->user->restaurant_name ?? 'Admin' }}</small>
                                    </div>
                                    <div class="text-center mb-3">
                                        <div class="rating" data-dish-id="{{ $dish->id }}">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <i class="fa fa-star text-muted star" data-value="{{ $i }}"></i>
                                            @endfor
                                        </div>
                                        </div>
                                    <div class="d-flex border-top">
                                        <small class="w-50 text-center border-end py-2">
                                        <a href="{{ route('dish.show', $dish->id) }}" class="btn btn-outline-primary btn-sm">View Details</a>
                                        </small>
                                        <small class="w-50 text-center py-2">
                                            <form action="{{ route('cart.add', $dish->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-link text-body p-0">
                                                    <i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart
                                                </button>
                                            </form>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-muted text-center">No dishes available.</p>
                    @endif
                </div>
            </div>

            <!-- Platos por categoría -->
            @if(isset($categories) && $categories->isNotEmpty())
                @foreach ($categories as $category)
                    <div id="tab-{{ $category->id }}" class="tab-pane fade p-0">
                        <div class="row g-4">
                            @php
                                $categoryDishes = $dishes->where('category_id', $category->id);
                            @endphp
                            @if($categoryDishes->isNotEmpty())
                                @foreach ($categoryDishes as $dish)
                                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                        <div class="product-item">
                                            <div class="position-relative bg-light overflow-hidden">
                                                <div class="img-container">
                                                    <img class="img-fluid" src="{{asset($dish->dish_photo) ? :  'https://via.placeholder.com/300?text=No+Image+Available' }}" alt="{{ $dish->dish_name }}">
                                                </div>
                                                @if($dish->created_at > now()->subDays(7))
                                                    <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                                                @endif
                                            </div>
                                            <div class="text-center p-4">
                                                <a class="d-block h5 mb-2" href="#">{{ $dish->dish_name }}</a>
                                                <span class="text-primary me-1">${{ $dish->dish_price }}</span>
                                            </div>
                                            <div class="text-center mb-3">
                                                <small class="text-muted">Category: {{ $dish->category->category_name ?? 'N/A' }}</small><br>
                                                <small class="text-muted">Added by: {{ $dish->user->restaurant_name ?? 'Admin' }}</small>
                                            </div>
                                            <div class="text-center mb-3">
                                                <div class="rating" data-dish-id="{{ $dish->id }}">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <i class="fa fa-star text-muted star" data-value="{{ $i }}"></i>
                                                    @endfor
                                                </div>
                                            </div>
                                            <div class="d-flex border-top">
                                                <small class="w-50 text-center border-end py-2">
                                                <a href="{{ route('dish.show', $dish->id) }}" class="btn btn-outline-primary btn-sm">View Details</a>                                                </small>
                                                <small class="w-50 text-center py-2">
                                                    <form action="{{ route('cart.add', $dish->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-link text-body p-0">
                                                            <i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart
                                                        </button>
                                                    </form>
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-muted text-center">No dishes available in this category.</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>

<!-- Si estoy logeado puedo hacer la reseña  -->
@if(auth()->check())
   <!-- Modal de calificación -->
<div class="modal fade" id="ratingModal" tabindex="-1" aria-labelledby="ratingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="ratingForm" method="POST" action="{{ route('dish.rate') }}">
                @csrf
                <input type="hidden" id="dish_id" name="dish_id">
                <input type="hidden" id="rating_value" name="rating">

                <div class="modal-body">
                    <div class="text-center mb-3">
                        <div class="selected-rating">
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="fa fa-star text-muted star-modal" data-value="{{ $i }}"></i>
                            @endfor
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
@else
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
                    <a href="{{ route('login') }}" class="btn btn-primary">Log in</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endif
<script src="{{ asset('js/rating.js')}}"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() { 
        // Mostrar modal de confirmación si hay mensaje en sesión
        @if(session('confirmation_message'))
            var modalElement = document.getElementById('confirmation-modal');
            if (modalElement) {
                var modal = bootstrap.Modal.getInstance(modalElement) || new bootstrap.Modal(modalElement);
                modal.show();
            }
        @endif
    });
</script>
@stop