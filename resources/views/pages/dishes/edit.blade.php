@extends("template.sectiontemplate")
@section("title", "Editar Dish")
@section("section-title", "Dishes")
@section("content")  

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container-xxl py-6">
    <div class="container">
        <div class="section-header text-center mx-auto mb-5" style="max-width: 500px;">
            <h1 class="display-5 mb-3">Edit Dish</h1>
            <p>Please update the details of the dish below.</p>
        </div>

        <div class="row g-5 justify-content-center">
            <div class="col-lg-5 col-md-12">
                <div class="bg-primary text-white d-flex flex-column justify-content-center h-100 p-5">
                    <h5 class="text-white">Call Us</h5>
                    <p><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <h5 class="text-white">Email Us</h5>
                    <p><i class="fa fa-envelope me-3"></i>info@developer.com</p>
                    <h5 class="text-white">Office Address</h5>
                    <p><i class="fa fa-map-marker-alt me-3"></i>Panamá, Panama City</p>
                </div> 
                <div class="d-flex pt-2">
                    <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-square btn-outline-light rounded-circle me-0" href=""><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

            <div class="col-lg-7 col-md-12">
                <!-- Formulario para editar el Dish -->
                <form action="{{ route('dish.update', $dish->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <!-- User ID -->
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select class="form-control @error('user_id') is-invalid @enderror" id="user_id" name="user_id">
                                    <option value="" disabled>Select User</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" {{ old('user_id', $dish->user_id) == $user->id ? 'selected' : '' }}>
                                            {{ $user->username }} ({{ $user->email }})
                                        </option>
                                    @endforeach
                                </select>
                                <label for="user_id">User Name</label>
                                @error('user_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Dish Name -->
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control @error('dish_name') is-invalid @enderror" id="dish_name" name="dish_name" value="{{ old('dish_name', $dish->dish_name) }}" placeholder="Dish Name*" required>
                                <label for="dish_name">Dish Name *</label>
                                @error('dish_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Dish Description -->
                        <div class="col-md-6">
                            <div class="form-floating">
                                <textarea class="form-control @error('dish_description') is-invalid @enderror" id="dish_description" name="dish_description" placeholder="Dish Description">{{ old('dish_description', $dish->dish_description) }}</textarea>
                                <label for="dish_description">Dish Description</label>
                                @error('dish_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Dish Price -->
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="number" class="form-control @error('dish_price') is-invalid @enderror" id="dish_price" name="dish_price" value="{{ old('dish_price', $dish->dish_price) }}" placeholder="Dish Price*" step="0.01" required>
                                <label for="dish_price">Dish Price *</label>
                                @error('dish_price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Dish Photo -->
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="file" class="form-control @error('dish_photo') is-invalid @enderror" id="dish_photo" name="dish_photo" accept="image/*">
                                <label for="dish_photo">Dish Photo</label>
                                @error('dish_photo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Category ID -->
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                                    <option value="" disabled>Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id', $dish->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="category_id">Category *</label>
                                @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-12">
                            <button class="btn btn-primary rounded-pill py-3 px-5" type="submit">Update Dish</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@stop
