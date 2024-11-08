@extends("template.sectiontemplate") 
@section("title","Administrador Dishes") 
@section("section-title","Dishes")
@section("content")
<!-- Generacion de formulario dinamico -->

@section("title","Administrador Dishes")
@section("section-title","Dishes")
@section("content")
    <!-- Generacion de formulario dinamico -->
@include('layout.formlayout', [
        'form_action' => route('category.store'),
        'form_method' => 'POST',
        'form_title' => 'Register Category!',
        'form_description' => 'Please fill in the details to register.',
        'input_generator' => '
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control" id="user" name="user_id" placeholder="User">
                    <label for="username">User</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Category Name *">
                    <label for="email">Category Name</label>
                </div>
            </div> 
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Category Name *">
                    <label for="email">Category Name</label>
                </div>
            </div>
            
        '
    ])
@stop
@stop