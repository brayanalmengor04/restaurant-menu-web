@extends("template.sectiontemplate")
@section("title", "Dish Manager")
@section("section-title", "Dishes")
@section("content")
<div class="container my-4">
    <h2 class="text-center mb-4">Dish List</h2>
    
    <!-- Success message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Responsive Table Wrapper -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Dish Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Category</th>
                    <th scope="col">User</th>
                    <th scope="col">Created At</th>
                    <th scope="col" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dishes as $dish)
                    <tr>
                        <td>{{ $dish->id }}</td>
                        <td>{{ $dish->dish_name }}</td>
                        <td>{{ Str::limit($dish->dish_description, 50, '...') }}</td>
                        <td>${{ number_format($dish->dish_price, 2) }}</td>
                        <td>{{ $dish->category ? $dish->category->category_name : 'No category assigned' }}</td>
                        <td>{{ $dish->user ? $dish->user->username : 'No user assigned' }}</td>
                        <td>{{ $dish->created_at->format('d-m-Y') }}</td>
                        <td class="text-center">
                            <a href="{{ route('dish.show', $dish->id) }}" class="btn btn-info btn-sm mx-1">
                                <i class="fas fa-eye"></i> View
                            </a>
                            <a href="{{ route('dish.edit', $dish->id) }}" class="btn btn-warning btn-sm mx-1">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <!-- Button to open the modal -->
                            <button type="button" class="btn btn-danger btn-sm mx-1" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $dish->id }}">
                                <i class="fas fa-trash"></i> Delete
                            </button>

                            <!-- Modal for delete confirmation -->
                            <div class="modal fade" id="deleteModal-{{ $dish->id }}" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $dish->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel-{{ $dish->id }}">Confirm Delete</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this dish?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            
                                            <!-- Delete form -->
                                            <form action="{{ route('dish.destroy', $dish->id) }}" method="POST" style="display:inline;">
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
    </div>
</div>
@stop
