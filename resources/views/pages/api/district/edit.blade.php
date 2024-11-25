@extends("template.sectiontemplate")
@section("title", "Update District")
@section("section-title", "Districts")
@section("content")
<div class="container-xxl py-6">
    <div class="container">
        <div class="section-header text-center mx-auto mb-5" style="max-width: 500px;">
            <h1 class="display-5 mb-3">Update District</h1>
            <p>Please provide the district details to update it in the system.</p>
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
                <form action="{{ route('districts.update', $district->id) }}" method="POST">
                    @csrf
                    @method('PUT') 
                    <div class="row g-3">
                        <!-- District Name -->
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input 
                                    type="text" 
                                    class="form-control @error('name') is-invalid @enderror" 
                                    id="name" 
                                    name="name" 
                                    value="{{ old('name', $district->name) }}" 
                                    placeholder="District Name*" 
                                    required>
                                <label for="name">District Name *</label>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Province Selection -->
                        <div class="col-md-12">
                            <div class="form-floating">
                                <select 
                                    class="form-select @error('province_id') is-invalid @enderror" 
                                    id="province_id" 
                                    name="province_id" 
                                    required>
                                    <option value="" disabled selected>Select a Province *</option>
                                    @foreach($provinces as $province)
                                        <option value="{{ $province->id }}" 
                                            {{ old('province_id', $district->province_id) == $province->id ? 'selected' : '' }}>
                                            {{ $province->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="province_id">Province *</label>
                                @error('province_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-12 text-center">
                            <button class="btn btn-primary rounded-pill py-3 px-5" type="submit">Update District</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
