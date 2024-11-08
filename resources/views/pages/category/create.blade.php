@extends("template.sectiontemplate")
@section("title","Administrador Category")
@section("section-title","Category")
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
                        <option value="" disabled selected>Select User</option>';
                        foreach ($users as $user) {
                            $inputGenerator .= '<option value="' . $user->id . '">' . $user->username . ' (' . $user->email . ')</option>';
                        }
                        $inputGenerator .= '
                    </select>
                    <label for="user_id">User Name</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Category name*">
                    <label for="category_name">Category Name *</label>
                </div>
            </div>
        ';
    @endphp
    <!-- Incluimos la plantilla y pasamos el contenido generado de inputs -->
    @include('layout.formlayout', [
        'form_action' => route('category.store'),
        'form_method' => 'POST',
        'form_title' => 'Register Category!',
        'form_description' => 'Please fill in the details to register.',
        'input_generator' => $inputGenerator 
    ])
@stop
