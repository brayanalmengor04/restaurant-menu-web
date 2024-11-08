@extends("template.sectiontemplate")
@section("title", "Category Manager")
@section("section-title", "Category")
@section("content")

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Tarjeta de información de la categoría -->
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">{{ $category->category_name }}</h5>
                    @if($category->user->company_logo)
                        <!-- Imagen de logo de la empresa -->
                        <img src="{{ asset('storage/' . $category->user->company_logo) }}" alt="Company Logo" class="rounded-circle" style="width: 50px; height: 50px;">
                    @endif
                </div>
                
                @if($category->user->background_image)
                    <!-- Imagen de fondo -->
                    <img src="{{ asset('storage/' . $category->user->background_image) }}" class="card-img-top" alt="Background Image">
                @endif
                <div class="card-body"> 
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Created By:</strong> {{ $category->user->username ?? 'Unknown' }}</li>
                        <li class="list-group-item"><strong>Contact Name:</strong> {{ $category->user->contact_name ?? 'No contact name' }}</li>
                        <li class="list-group-item"><strong>Restaurant Name:</strong> {{ $category->user->restaurant_name ?? 'No restaurant name' }}</li>
                        <li class="list-group-item"><strong>Date Created:</strong> {{ $category->created_at->format('d/m/Y') }}</li>
                        <li class="list-group-item"><strong>Last Updated:</strong> {{ $category->updated_at->format('d/m/Y') }}</li>
                    </ul>
                    
                    <div class="d-flex justify-content-end mt-3">
                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning me-2">Edit</a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $category->id }}">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de confirmación de eliminación -->
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
                <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
