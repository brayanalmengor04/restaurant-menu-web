@extends("template.sectiontemplate")
@section("title", "Subscription Manager")
@section("section-title", "Subscriptions")
@section("content")
    <div class="container my-4">
        <h2 class="text-center mb-4">Subscription List</h2>
        
        <!-- Mensajes de éxito o error -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Tabla de suscripciones -->
        <table class="table table-bordered table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Email</th>
                    <th scope="col" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subscriptions as $subscription)
                    <tr>
                        <td>{{ $subscription->id }}</td>
                        <td>{{ $subscription->email }}</td>
                        <td class="text-center">
                            <!-- Botón para editar -->
                            <a href="{{ route('subscriptions.edit', $subscription->id) }}" class="btn btn-primary btn-sm mx-1">
                                <i class="fas fa-edit"></i> Edit
                            </a>

                            <!-- Botón para eliminar -->
                            <button type="button" class="btn btn-danger btn-sm mx-1" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $subscription->id }}">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                            
                            <!-- Modal de confirmación -->
                            <div class="modal fade" id="deleteModal-{{ $subscription->id }}" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $subscription->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel-{{ $subscription->id }}">Confirm Delete</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this subscription?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <form action="{{ route('subscriptions.destroy', $subscription->id) }}" method="POST" style="display:inline;">
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
