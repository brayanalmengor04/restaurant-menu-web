<!doctype html>
<html lang="en">
    <head>
        <title>Shopping cart</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <!-- Navbar opcional -->
        </header>
        <main>
            <div class="container py-5">
                <div class="row">
                    <!-- Sección del carrito -->
                    <div class="col-md-8">
                        <h2 class="mb-4">Carts</h2>
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if(empty($cart))
                            <p class="text-muted">Your cart is empty.</p>
                        @else
                            <div class="card">
                                <div class="card-body">
                                    @php
                                        // Inicialización del precio total
                                        $totalPrice = 0;
                                    @endphp
                                    @foreach ($cart as $id => $item)
                                        @php
                                            $itemTotal = $item['price'] * $item['quantity'];
                                            $totalPrice += $itemTotal;
                                        @endphp
                                        <div class="d-flex justify-content-between align-items-center border-bottom py-3">
                                            <div class="d-flex align-items-center">
                                             <img 
   					src="{{ $item['photo'] ? $item['photo'] : 'https://via.placeholder.com/70' }}" 
alt="{{ $item['name'] }}"
    style="width: 70px; height: 70px; object-fit: cover; margin-right: 15px;"
>

                                                <div>
                                                    <h6 class="mb-0">{{ $item['name'] }}</h6>
                                                    <small class="text-muted">Unit price: ${{ $item['price'] }}</small>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="input-group me-3">
                                                    <span class="input-group-text">Amount: </span>
                                                    <input type="text" class="form-control" value="{{ $item['quantity'] }}" readonly />
                                                </div>
                                                <form action="{{ route('cart.remove', $id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="bi bi-trash-fill"></i> <!-- Icono de trash -->
                                                        </button>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                    <!-- Resumen de compra -->
                    <div class="col-md-4">
                        @php
                            $totalPrice = $totalPrice ?? 0; // Validación si $totalPrice no está definido
                        @endphp
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Purchase summary</h5>
                                <ul class="list-group list-group-flush mb-3">
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>Subtotal</span>
                                        <span>${{ number_format($totalPrice, 2) }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>Discounts</span>
                                        <span>$0.00</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between fw-bold">
                                        <span>Total to pay</span>
                                        <span>${{ number_format($totalPrice, 2) }}</span>
                                    </li>
                                </ul>
                                <button class="btn btn-primary w-100">Make purchase</button>
                                <a href="{{route('welcome')}}" class="btn btn-link w-100 mt-2">Continue shopping</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer>
        </footer>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    </body>
</html>
