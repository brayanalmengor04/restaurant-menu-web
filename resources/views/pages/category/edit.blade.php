@extends("template.sectiontemplate")
@section("title", "Editar Category")
@section("section-title", "Category")
<!-- Input Dinámico -->
@section("content") 
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@php
    $inputGenerator = '
        <div class="col-md-6">
            <div class="form-floating">
                <select class="form-control" id="user_id" name="user_id">
                    <option value="" disabled>Select User</option>';
                    foreach ($users as $user) {
                        $selected = $user->id == $category->user_id ? 'selected' : '';
                        $inputGenerator .= '<option value="' . $user->id . '" ' . $selected . '>' . $user->username . ' (' . $user->email . ')</option>';
                    }

    $inputGenerator .= '
                </select>
                <label for="user_id">User Name</label>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-floating">
                <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Category name*" value="' . old('category_name', $category->category_name) . '">
                <label for="category_name">Category Name *</label>
            </div>
        </div>
    ';
@endphp

@include('layout.formlayout', [
    'form_action' => route('category.update', $category->id),  
    'form_method' => 'POST',
    'method_override' => 'PUT',
    'form_title' => 'Edit Category', 
    'form_description' => 'Please update the category details.',
    'input_generator' => $inputGenerator
])
@stop
