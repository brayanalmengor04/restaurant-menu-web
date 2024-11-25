<?php

namespace App\Http\Controllers;
use App\Models\Dishes;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        // Buscar el plato por ID
        $dish = Dishes::findOrFail($id);
        // Obtener el carrito de la sesión
        $cart = session()->get('cart', []);
        // Si el plato ya está en el carrito, incrementa la cantidad
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            // Si no está, añadirlo al carrito
            $cart[$id] = [
                "name" => $dish->dish_name,
                "quantity" => 1,
                "price" => $dish->dish_price,
                "photo" => $dish->dish_photo
            ];
        }

        // Guardar el carrito de vuelta en la sesión
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Dish added to cart!');
    }

    public function viewCart()
    {
        $cart = session()->get('cart', []);
        return view('pages.cart.index', compact('cart'));
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->route('cart.index')->with('success', 'Dish removed from cart!');
    }
}
