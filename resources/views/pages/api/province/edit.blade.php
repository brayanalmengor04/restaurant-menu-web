@extends("template.sectiontemplate")

@section("title", "Update Province")
@section("section-title", "Provinces")

@section("content")
<div class="container-xxl py-6">
    <div class="container">
        <div class="section-header text-center mx-auto mb-5" style="max-width: 500px;">
            <h1 class="display-5 mb-3">Update Province</h1>
            <p>Please provide the province details to update it in the system.</p>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-12">
                <!-- PUT - REQUEST -->
                <form action="{{ route('provinces.update', $province->id) }}" method="POST">
                    @csrf
                    @method('PUT') 
                    <div class="row g-3">
                        <!-- Province Name -->
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input 
                                    type="text" 
                                    class="form-control @error('name') is-invalid @enderror" 
                                    id="name" 
                                    name="name" 
                                    value="{{ old('name', $province->name) }}" 
                                    placeholder="Province Name*" 
                                    required>
                                <label for="name">Province Name *</label>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-12 text-center">
                            <button class="btn btn-primary rounded-pill py-3 px-5" type="submit">Update Province</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
