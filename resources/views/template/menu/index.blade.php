<!doctype html>
<html lang="en">
    <head>
        <title>Preview Menu</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <style>
            /* Limitar el tamaño de los cards */
            .card {
                max-width: 300px;
                margin: 0 auto;
                height: 100%; /* Mantener el tamaño uniforme */
                display: flex;
                flex-direction: column;
            }
            .card-img-top {
                height: 180px; /* Altura fija */
                object-fit: cover; /* Evitar deformación */
                object-position: center; /* Centrar la imagen recortada */
            }
            .card-body {
                flex: 1; /* Permitir que el contenido del body ocupe el espacio restante */
                text-align: center;
            }
            .card-footer {
                display: flex;
                justify-content: space-between;
                align-items: center;
                flex-wrap: wrap;
            }
            .filter-section {
                max-width: 600px;
                margin: 0 auto;
            }
        </style>
    </head>
    <body>
        <div class="container mt-5">
            <!-- Header -->
            <div class="text-center mb-4">
                <h1 class="fw-bold">{{ auth()->user()->username }} - Menú</h1>
                <p class="text-muted">Explore the dishes registered on your menu.</p>
            </div>

            <!-- Filtro por categorías -->
            <div class="filter-section mb-4">
                <form method="GET" action="{{ route('user.dishes') }}" class="d-flex">
                    <select name="category" class="form-select me-2" style="flex: 1;">
                        <option value="" selected>All categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </form>
            </div>

            <!-- Platos -->
            @if($dishes->count() > 0)
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                    @foreach($dishes as $dish)
                        <div class="col">
                            <div class="card shadow-sm">
                                @if($dish->dish_photo)
                                    <img src="{{ asset('storage/' . $dish->dish_photo) }}" class="card-img-top" alt="{{ $dish->dish_name }}">
                                @else
                                    <img src="https://via.placeholder.com/300x200?text=Sin+Foto" class="card-img-top" alt="Sin foto">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">{{ $dish->dish_name }}</h5>
                                    <p class="card-text text-muted">{{ Str::limit($dish->dish_description, 70, '...') }}</p>
                                    <p class="card-text">
                                        <strong>Precio:</strong> ${{ number_format($dish->dish_price, 2) }}
                                    </p>
                                    <p class="card-text">
                                        <strong>Categoría:</strong> {{ $dish->category->category_name ?? 'Sin categoría' }}
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('dish.show', $dish->id) }}" class="btn btn-sm btn-primary">Detalles</a>
                                    <a href="{{ route('dish.edit', $dish->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                    <form action="{{ route('dish.destroy', $dish->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este plato?')">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-center mt-4">
                    <a href="{{ route('dish.create') }}" class="btn btn-success">Register new dish</a>
                    <a href="{{ route('welcome') }}" class="btn btn-danger">Back</a>
                </div>
                
            @else
                <div class="alert alert-info text-center">
                    <h4>You do not have registered dishes.</h4>
                    <p>You can start by registering a new dish in the system.</p>
                    <a href="{{ route('dish.create') }}" class="btn btn-primary">Register dish</a>
                </div> 
                
            @endif
        </div>

        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
