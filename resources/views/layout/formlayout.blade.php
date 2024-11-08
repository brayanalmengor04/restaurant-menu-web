
<div class="container-xxl py-6">
    <div class="container">
        <div class="section-header text-center mx-auto mb-5" style="max-width: 500px;">
            <h1 class="display-5 mb-3">{{ $form_title ?? 'Register User!' }}</h1>
            <p>{{ $form_description ?? 'Default description for the form.' }}</p>
        </div>

        <div class="row g-5 justify-content-center">
            <div class="col-lg-5 col-md-12">
                <div class="bg-primary text-white d-flex flex-column justify-content-center h-100 p-5">
                    <!-- Contact Information Section -->
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
                <!-- Form with dynamic action and method -->
                <form action="{{ $form_action ?? '#' }}" method="{{ $form_method ?? 'POST' }}">
                    @csrf
                    <!-- Agrega la directiva de método condicionalmente -->
                    @if(isset($method_override) && $method_override === 'PUT')
                        @method('PUT')
                    @endif
                    <div class="row g-3">
                        {!! $input_generator ?? '' !!}
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
