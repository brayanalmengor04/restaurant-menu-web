@extends("template.sectiontemplate")
@section("title", "Edit Subscription")
@section("section-title", "Subscription")
@section("content")
<div class="container-xxl py-6">
    <div class="container">
        <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-5 mb-3">Edit Subscription</h1>
            <p>Update the email address for your subscription below.</p>
        </div>
        <div class="row g-5 justify-content-center">
            <div class="col-lg-7 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                <form action="{{ route('subscriptions.update', $subscription->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <!-- Email Field -->
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Your Email" value="{{ old('email', $subscription->email) }}">
                                <label for="email">Your Email</label>
                                @error('email')
                                    <p class="form-text text-muted">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-12">
                            <button class="btn btn-primary rounded-pill py-3 px-5" type="submit">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
