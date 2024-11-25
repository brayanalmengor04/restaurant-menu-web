@extends("template.sectiontemplate")
@section("title", "Update Corregimiento")
@section("section-title", "Corregimientos")
@section("content")
<div class="container-xxl py-6">
    <div class="container">
        <div class="section-header text-center mx-auto mb-5" style="max-width: 500px;">
            <h1 class="display-5 mb-3">Update Corregimiento</h1>
            <p>Please provide the corregimiento details to update it in the system.</p>
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
                <form action="{{ route('corregimientos.update', $corregimiento->id) }}" method="POST">
                    @csrf
                    @method('PUT') 
                    <div class="row g-3">
                        <!-- Corregimiento Name -->
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input 
                                    type="text" 
                                    class="form-control @error('name') is-invalid @enderror" 
                                    id="name" 
                                    name="name" 
                                    value="{{ old('name', $corregimiento->name) }}" 
                                    placeholder="Corregimiento Name*" 
                                    required>
                                <label for="name">Corregimiento Name *</label>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- District Selection -->
                        <div class="col-md-12">
                            <div class="form-floating">
                                <select 
                                    class="form-select @error('district_id') is-invalid @enderror" 
                                    id="district_id" 
                                    name="district_id" 
                                    required>
                                    <option value="" disabled selected>Select a District *</option>
                                    @foreach($districts as $district)
                                        <option value="{{ $district->id }}" 
                                            {{ old('district_id', $corregimiento->district_id) == $district->id ? 'selected' : '' }}>
                                            {{ $district->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="district_id">District *</label>
                                @error('district_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-12 text-center">
                            <button class="btn btn-primary rounded-pill py-3 px-5" type="submit">Update Corregimiento</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
