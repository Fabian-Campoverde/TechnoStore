<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    public function add(Request $request)
{
    $productId = $request->input('product_id');
    $quantity = $request->input('quantity');

    // Recuperar el carrito actual de la sesión
    $cart = Session::get('cart', ['items' => [], 'total' => 0]);

    // Obtener la información del producto desde la base de datos
    $product = Product::find($productId);

    if (!$product) {
        return response()->json([
            'message' => 'Producto no encontrado'
        ], 404);
    }

    // Calcular la cantidad total de este producto en el carrito, incluyendo lo que se quiere añadir
    $currentQuantityInCart = isset($cart['items'][$productId]) ? $cart['items'][$productId]['quantity'] : 0;
    $newTotalQuantity = $currentQuantityInCart + $quantity;

    // Validar si la nueva cantidad total excede el stock
    if ($newTotalQuantity > $product->stock) {
        return response()->json([
            'message' => 'Cantidad mayor al stock disponible'
        ], 400);
    }

    // Crear o actualizar el artículo en el carrito
    $item = [
        'id' => $product->id,
        'name' => $product->nombre,
        'price' => $product->precio_venta,
        'imagen' => asset($product->image_url),
        'quantity' => $newTotalQuantity, // Actualizar con la nueva cantidad total
        'stock' => $product->stock
    ];

    // Agregar o actualizar el producto en el carrito
    $cart['items'][$productId] = $item;

    // Calcular el total del carrito
    $cart['total'] = array_reduce($cart['items'], function ($carry, $item) {
        return $carry + ($item['price'] * $item['quantity']);
    }, 0);

    // Guardar el carrito actualizado en la sesión
    Session::put('cart', $cart);

    // Calcular la cantidad total de productos en el carrito
    $totalQuantity = array_reduce($cart['items'], function ($carry, $item) {
        return $carry + $item['quantity'];
    }, 0);

    return response()->json([
        'cart' => $cart,
        'totalQuantity' => $totalQuantity,
        'message' => 'Producto agregado'
    ]);
}


    public function remove(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
        ]);

        // Obtener el carrito desde la sesión
        $cart = session()->get('cart', ['items' => []]);

        // ID del producto a eliminar
        $productId = $request->input('product_id');

        // Eliminar el producto del carrito
        if (isset($cart['items'][$productId])) {
            unset($cart['items'][$productId]);
            // Si el carrito está vacío, se puede eliminar la clave
            if (empty($cart['items'])) {
                session()->forget('cart');
            } else {
                session()->put('cart', $cart);
            }
        }

        // Devolver una respuesta JSON con el carrito actualizado
        return response()->json([
            'cart' => $cart,
            'success' => true
            
        ]);
    }

    public function clear()
{
    // Vaciar el carrito
    Session::forget('cart');

    // Devolver una respuesta JSON con el carrito vacío
    return response()->json([
        'cart' => ['items' => [], 'total' => 0],
        'message' => 'El carrito ha sido vaciado.'
    ]);
}

public function show(){
    $cart = session()->get('cart', []);
    return view('cliente.shop_cart', ['cart' => $cart]);
}

public function updateQuantity(Request $request)
{
    // Validar la solicitud
    $request->validate([
        'product_id' => 'required|integer|exists:products,id',
        'quantity' => 'required|integer|min:1',
    ]);

    // Obtener el carrito desde la sesión
    $cart = session()->get('cart', ['items' => []]);

    // ID del producto a actualizar
    $productId = $request->input('product_id');
    $quantity = $request->input('quantity');

    // Verificar si el producto está en el carrito
    if (isset($cart['items'][$productId])) {
        // Obtener el producto de la base de datos para verificar el stock
        $product = Product::find($productId);

        // Validar que la nueva cantidad no exceda el stock disponible
        if ($quantity > $product->stock) {
            return response()->json([
                'message' => 'La cantidad solicitada excede el stock disponible',
            ], 400); // Código de estado 400 para error
        }

        // Actualizar la cantidad del producto en el carrito
        $cart['items'][$productId]['quantity'] = $quantity;

        // Recalcular el subtotal
        $cart['items'][$productId]['subtotal'] = $cart['items'][$productId]['quantity'] * $cart['items'][$productId]['price'];

        // Actualizar el carrito en la sesión
        session()->put('cart', $cart);

        // Devolver una respuesta JSON con el carrito actualizado
        return response()->json([
            'cart' => $cart,
            'message' => 'Cantidad actualizada correctamente',
        ]);
    }

    // Si el producto no está en el carrito, devolver un error
    return response()->json([
        'message' => 'Producto no encontrado en el carrito',
    ], 404); // Código de estado 404 para error
}
}
