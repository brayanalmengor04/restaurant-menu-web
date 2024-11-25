@extends("template.sectiontemplate")
@section("title", "User Manager")
@section("section-title", "User")
@section("content")
    <div class="container my-4">
        <h2 class="text-center mb-4">User List</h2>

        <!-- Success message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact Name</th>
                    <th scope="col">Restaurant Name</th>
                    <th scope="col">Status</th>
                    <th scope="col" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->contact_name }}</td>
                        <td>{{ $user->restaurant_name }}</td>
                        <td>{{ $user->status }}</td>
                        <td class="text-center">
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm mx-1">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <!-- Delete button with modal -->
                            <button type="button" class="btn btn-danger btn-sm mx-1" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $user->id }}">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                            <div class="modal fade" id="deleteModal-{{ $user->id }}" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $user->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel-{{ $user->id }}">Confirm Delete</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this user?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;">
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
@stop
