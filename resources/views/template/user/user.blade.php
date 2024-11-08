
<div class="container-xxl py-6">
    <div class="container">
        <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-5 mb-3">Register User!</h1>
            <p>Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
        </div>
        <div class="row g-5 justify-content-center">
        <div class="row g-5 justify-content-center">
            <div class="col-lg-5 col-md-12 wow fadeInUp" data-wow-delay="0.1s">
                <div class="bg-primary text-white d-flex flex-column justify-content-center h-100 p-5">
                    <h5 class="text-white">Call Us</h5>
                    <p class="mb-5"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <h5 class="text-white">Email Us</h5>
                    <p class="mb-5"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                    <h5 class="text-white">Office Address</h5>
                    <p class="mb-5"><i class="fa fa-map-marker-alt me-3"></i>Panamá , Panama City</p>
                    <h5 class="text-white">Follow Us</h5>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-0" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                </div>
            <div class="col-lg-7 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
        
                <form action="{{ route('user.register')}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="row g-3">
                        <!-- Username Field -->
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username" value="{{ old('username') }}">
                                <label for="username">Username</label>
                                @error('username')
                                    <p class="form-text text-muted">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- Email Field -->
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Your Email" value="{{ old('email') }}">
                                <label for="email">Your Email</label>
                                @error('email')
                                    <p class="form-text text-muted">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Password Field -->
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                                <label for="password">Password</label>
                                @error('password')
                                    <p class="form-text text-muted">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Contact Name Field -->
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control @error('contact_name') is-invalid @enderror" id="contact_name" name="contact_name" placeholder="Contact Name" value="{{ old('contact_name') }}">
                                <label for="contact_name">Contact Name</label>
                                @error('contact_name')
                                    <p class="form-text text-muted">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Restaurant Name Field -->
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control @error('restaurant_name') is-invalid @enderror" id="restaurant_name" name="restaurant_name" placeholder="Restaurant Name" value="{{ old('restaurant_name') }}">
                                <label for="restaurant_name">Restaurant Name</label>
                                @error('restaurant_name')
                                    <p class="form-text text-muted">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Background Image Field -->
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="file" class="form-control @error('background_image') is-invalid @enderror" id="background_image" name="background_image" placeholder="Background Image" accept="image/*">
                                <label for="background_image">Background Image</label>
                                @error('background_image')
                                    <p class="form-text text-muted">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Company Logo Field -->
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="file" class="form-control @error('company_logo') is-invalid @enderror" id="company_logo" name="company_logo" placeholder="Company Logo" accept="image/*">
                                <label for="company_logo">Company Logo</label>
                                @error('company_logo')
                                    <p class="form-text text-muted">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- User Type Field -->
                        <div class="col-12">
                            <div class="form-floating">
                                <select class="form-control @error('user_type') is-invalid @enderror" name="user_type" id="user_type">
                                    <option value="" disabled selected>Select User Type</option>
                                    <option value="admin" {{ old('user_type') == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="customer" {{ old('user_type') == 'customer' ? 'selected' : '' }}>Customer</option>
                                    <option value="vendor" {{ old('user_type') == 'vendor' ? 'selected' : '' }}>Vendor</option>
                                </select>
                                <label for="user_type">User Type</label>
                                @error('user_type')
                                    <p class="form-text text-muted">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Status Field -->
                        <div class="col-12">
                            <div class="form-floating">
                                <select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
                                    <option value="" disabled selected>Select Status</option>
                                    <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                                </select>
                                <label for="status">Status</label>
                                @error('status')
                                    <p class="form-text text-muted">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-12">
                            <button class="btn btn-primary rounded-pill py-3 px-5" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->
