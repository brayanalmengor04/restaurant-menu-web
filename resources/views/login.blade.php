<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center min-vh-100">

<div class="card" style="max-width: 450px;">
    <div class="card-header text-center bg-primary text-white fs-4 fw-bold">
        Sign In
    </div>
    <div class="card-body p-5"> 
        <div
            class="alert alert-danger alert-dismissible fade show"
            role="alert"
        >
            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"
            ></button>
            <strong>invalid credentials</strong> {{ session('message') }}
        </div>
        
        <form method="POST" action="{{ route('loginpost') }}">
            @csrf
            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="form-label fs-5">Email</label>
                <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="email@example.com" required autofocus>
            </div>
            
            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="form-label fs-5">Password</label>
                <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Enter your password" required>
            </div>
            
            <!-- Remember Me -->
            <div class="form-check mb-4">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label fs-6" for="remember">Remember me</label>
            </div>
            
            <!-- Sign In Button -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg">Sign In</button>
            </div>
            
            <!-- Links for Registration and Password Recovery -->
            <div class="text-center mt-4 fs-6">
                <a href="{{route('user.create')}}" class="d-block">Don’t have an account? Sign Up</a>
                <a href="/forgot-password" class="d-block">Forgot your password?</a>
            </div>
        </form>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
