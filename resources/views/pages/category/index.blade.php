@extends("template.sectiontemplate")
@section("title", "Category Manager")
@section("section-title", "Category")
@section("content")
    <div class="container my-4">
        <h2 class="text-center mb-4">Category List</h2>
        
        <!-- Success message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Contenedor responsivo para la tabla -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">User</th>
                        <th scope="col">Created At</th>
                        <th scope="col" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td>{{ $category->user ? $category->user->username : 'No user assigned' }}</td>
                            <td>{{ $category->created_at->format('d-m-Y') }}</td>
                            <td class="text-center">
                                <a href="{{ route('category.show', $category->id) }}" class="btn btn-info btn-sm mx-1">
                                    <i class="fas fa-eye"></i> View
                                </a>
                                <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning btn-sm mx-1">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <!-- Botón para abrir el modal (fuera de cualquier formulario) -->
                                <button type="button" class="btn btn-danger btn-sm mx-1" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $category->id }}">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                                <div class="modal fade" id="deleteModal-{{ $category->id }}" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $category->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel-{{ $category->id }}">Confirm Delete</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete this category?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                
                                                <!-- Formulario de eliminación -->
                                                <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div> <!-- Fin del contenedor responsivo -->

    </div>
@stop
