<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

 <style>
    @media (max-width: 768px) {
        .profile-card {
            width: 90%; /* Se ajusta al ancho disponible */
            padding: 20px;
        }

        .form-floating label {
            font-size: 0.9rem; /* Reducir texto de etiquetas en inputs */
        }

        .nav-tabs .nav-link {
            font-size: 0.85rem; /* Ajuste menor de fuentes */
            padding: 6px 10px; /* Reducción de tamaño en pestañas */
        }

        .btn {
            font-size: 0.9rem;
            padding: 10px 20px;
        }

        .btn-dark {
            padding: 10px 20px;
        }

        .principal-container {
            padding: 10px; /* Reducir márgenes en contenedores */
        }
    }

    @media (max-width: 576px) {
        .profile-card img {
            width: 80px; /* Disminuir tamaño de imagen */
            height: 80px;
        }

        .nav-tabs {
            flex-wrap: wrap; /* Permite saltos de línea en pestañas */
            justify-content: center;
        }

        .nav-tabs .nav-link {
            margin-bottom: 5px; /* Añade espacio vertical */
        }

        .btn-dark {
            font-size: 0.8rem;
            padding: 8px 16px; /* Compactar botones */
        }

        .principal-container {
            flex-direction: column; /* Contenedor más compacto */
            align-items: stretch;
        }
    }
</style>

</head>
<body>
<div class="principal-container">
    <!-- Alertas -->
    @if (session('success') || session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') ?? session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex flex-column align-items-center w-100">
        <!-- Card de perfil -->
       <div class="profile-card" style="background-image: url('{{ asset($user->background_image ?: 'https://via.placeholder.com/500') }}');">
    <img src="{{ asset($user->company_logo ?: 'https://via.placeholder.com/100') }}" alt="Profile">
    <h4>{{ $user->username }}</h4>
    <p>{{ $user->contact_name }}</p>
</div>

        <!-- Formulario con pestañas -->
        <form action="{{ route('user.update', ['user' => $user->id]) }}" method="POST" enctype="multipart/form-data" class="mt-4 w-100" style="max-width: 600px;">
            @method('PUT')
            @csrf
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
                                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" value="{{ old('username', $user->username) }}">
                                <label for="username">Username</label>
                                @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Your Email" value="{{ old('email', $user->email) }}">
                                <label for="email">Your Email</label>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password">
                                <label for="password">Password *</label>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="user_type" class="form-control @error('user_type') is-invalid @enderror" id="userType" placeholder="Type User" value="{{ old('user_type', $user->user_type) }}">
                                <label for="userType">Type User</label>
                                @error('user_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" name="status" class="form-control @error('status') is-invalid @enderror" id="status" placeholder="Status" value="{{ old('status', $user->status) }}">
                                <label for="status">Status</label>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
                                <input type="text" name="contact_name" class="form-control @error('contact_name') is-invalid @enderror" id="contactName" placeholder="Contact Name" value="{{ old('contact_name', $user->contact_name) }}">
                                <label for="contactName">Contact Name *</label>
                                @error('contact_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="file" name="background_image" class="form-control @error('background_image') is-invalid @enderror" id="backgroundUser" accept="image/*">
                                <label for="backgroundUser">Background User</label>
                                @error('background_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
                                <input type="text" name="restaurant_name" class="form-control @error('restaurant_name') is-invalid @enderror" id="restaurantName" placeholder="Restaurant Name" value="{{ old('restaurant_name', $user->restaurant_name) }}">
                                <label for="restaurantName">Restaurant Name</label>
                                @error('restaurant_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="file" name="company_logo" class="form-control @error('company_logo') is-invalid @enderror" id="companyLogo" accept="image/*">
                                <label for="companyLogo">Company Logo</label>
                                @error('company_logo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                         </div>
                    </div>
                </div>
            </div>
            <!-- Botón de guardar -->
            <div class="col-12 text-center mt-4">
                    <div class="d-flex justify-content-center gap-3">
                        <button type="submit" class="btn btn-dark rounded-pill py-3 px-5">Save</button>
                        <a href="{{ route('welcome') }}" class="btn btn-dark rounded-pill py-3 px-5 text-white text-decoration-none">Cancel</a>
                    </div>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
