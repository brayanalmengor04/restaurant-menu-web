@extends("template.sectiontemplate")

@section("title","Administrador Category")
@section("section-title","Category")
@section("content") 

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<!-- Formulario para registrar una categoría -->
<div class="container mt-4">
    <form action="{{ route('category.store') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-header">
                <h3>Register Category!</h3>
                <p>Please fill in the details to register.</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Selección de usuario -->
                    <div class="col-md-6">
                        <div class="form-floating">
                            <select class="form-control" id="user_id" name="user_id" required>
                                <option value="" disabled selected>Select User</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->username }} ({{ $user->email }})</option>
                                @endforeach
                            </select>
                            <label for="user_id">User Name</label>
                        </div>
                    </div>

                    <!-- Campo para el nombre de la categoría -->
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input 
                                type="text" 
                                class="form-control" 
                                id="category_name" 
                                name="category_name" 
                                placeholder="Category name*" 
                                required>
                            <label for="category_name">Category Name *</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">Save Category</button>
            </div>
        </div>
    </form>
</div>

@stop
