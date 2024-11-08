@extends("template.template")
@section("title","Sistema Restaurante -Principal Pages")
@section("content")  
    <!-- Reducir coding -->
    @include("template.carrucel.carrucel") 
    <!-- About Start -->
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
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <h1 class="display-5 mb-4">Discover Exquisite Dishes & Exclusive Dining Experiences</h1>
                <p class="mb-4">Welcome to our restaurant, where flavor meets innovation. Our menu is curated to offer the best in seasonal ingredients, creative dishes, and exclusive dining experiences that keep you coming back for more.</p>
                <p><i class="fa fa-check text-primary me-3"></i>Curated seasonal menus for every taste</p>
                <p><i class="fa fa-check text-primary me-3"></i>Easy subscription options for exclusive perks</p>
                <p><i class="fa fa-check text-primary me-3"></i>Customizable categories to suit your dietary needs</p>
                <a class="btn btn-primary rounded-pill py-3 px-5 mt-3" href="">Explore More</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->
<!-- Feature Start -->
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
<!-- Feature End --> 

<!-- Platos -->

<!-- Registro usuario -->
@include("template.user.user")
@stop