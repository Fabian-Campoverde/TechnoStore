<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Buyer;
use App\Models\Category;
use App\Models\Faq;
use App\Models\Input;
use App\Models\Invoice;
use App\Models\Measure;
use App\Models\Order;
use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\Provider;
use App\Models\Slider;
use App\Models\Store;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware("can:admin.home")->only("index");

    }
    public function index()
    {
        $users = User::all()->count();
        $providers = Provider::all()->count();
        $measures = Measure::all()->count();
        $categories = Category::all()->count();
        $products = Product::all()->count();
        $brands = Brand::all()->count();

        return view("admin.homepage.index", compact('brands', 'users', 'providers', 'measures', 'categories', 'products'));
    }


    private function getCommonData()
    {
        $categories = Category::where('estado', 'A')
            ->whereHas('products', function ($query) {
                $query->where('estado', 'A'); // Filtra productos con estado "A"
            })
            ->withCount([
                'products as active_products_count' => function ($query) {
                    $query->where('estado', 'A'); // Filtra productos con estado "A"
                }
            ])
            ->having('active_products_count', '>', 5) // Asegura que la cantidad de productos activos sea mayor a 0
            ->orderBy('nombre', 'asc')
            ->get();

        $sliders = Slider::where('estado', 'A')->get();

        $videos = Video::where('estado', 'A')->get();

        $brands = Brand::where('estado', 'A')
            ->whereHas('products', function ($query) {
                $query->where('estado', 'A'); // Filtra productos con estado "A"
            })
            ->withCount([
                'products as active_products_count' => function ($query) {
                    $query->where('estado', 'A'); // Filtra productos con estado "A"
                }
            ])
            ->having('active_products_count', '>', 5) // Asegura que la cantidad de productos activos sea mayor a 0
            ->orderBy('nombre', 'asc')
            ->get();
        $laptops = Product::whereHas('category', function ($query) {
            $query->where('nombre', 'Laptops');
        })->orderBy('stock', 'desc') // Ordenar por mayor stock
            ->limit(9) // Limitar a 9 resultados
            ->get();

        $pcs = Product::whereHas('category', function ($query) {
            $query->where('nombre', "Pc's");
        })->orderBy('stock', 'desc') // Ordenar por mayor stock
            ->limit(9) // Limitar a 9 resultados
            ->get();

        $monitores = Product::whereHas('category', function ($query) {
            $query->where('nombre', "Monitores");
        })->orderBy('stock', 'desc') // Ordenar por mayor stock
            ->limit(9) // Limitar a 9 resultados
            ->get();
        $payment_methods = PaymentMethod::where('estado', 'A')->orderBy('nombre', 'asc')->get();
        $cart = session()->get('cart', []);

        return compact('categories', 'videos', 'sliders', 'brands', 'payment_methods', 'laptops', 'pcs', 'monitores', 'cart');
    }

    public function page()
    {

        $data = $this->getCommonData();

        return view('welcome', $data);
    }

    public function nosotros()
    {

        $data = $this->getCommonData();

        return view('cliente.nosotros', $data);
    }

    public function envio()
    {

        $data = $this->getCommonData();

        return view('cliente.envio', $data);
    }

    public function reclamos()
    {

        $data = $this->getCommonData();

        return view('cliente.reclamos', $data);
    }

    public function contacto()
    {

        $data = $this->getCommonData();

        return view('cliente.contacto', $data);
    }

    public function terminos()
    {

        $data = $this->getCommonData();

        return view('cliente.terminos', $data);
    }

    public function politica()
    {

        $data = $this->getCommonData();

        return view('cliente.politica', $data);
    }

    public function faqs()
    {
        $faqs = Faq::where('estado', 'A')->get();
        $data = $this->getCommonData();
        $data['faqs'] = $faqs;

        return view('cliente.faqs', $data);
    }

    public function searchResults($name)
    {
        // Realiza la búsqueda en el modelo de productos, incluyendo nombre, nombre de categoría y nombre de marca
        $products = Product::where(function ($query) use ($name) {
            $query->where('nombre', 'like', "%{$name}%")
                ->orWhereHas('category', function ($query) use ($name) {
                    $query->where('nombre', 'like', "%{$name}%");
                })
                ->orWhereHas('brand', function ($query) use ($name) {
                    $query->where('nombre', 'like', "%{$name}%");
                });
        })->get();

        // Obtén datos comunes (si tienes alguno)
        $data = $this->getCommonData();

        // Asigna los resultados a la vista
        $data['results'] = $products;
        $data['name'] = $name;

        // Retorna la vista con los resultados de búsqueda
        return view('cliente.search_results', $data);
    }

    public function showCategories()
    {
        $categories2 = Category::where('estado', 'A')->orderBy('nombre', 'asc')->get();
        $data = $this->getCommonData();
        $data['categories2'] = $categories2;
        return view('cliente.categories', $data);
    }

    public function showBrands()
    {
        $brands2 = Brand::where('estado', 'A')->orderBy('nombre', 'asc')->get();
        $data = $this->getCommonData();
        $data['brands2'] = $brands2;
        return view('cliente.brands', $data);
    }

    public function show_cart()
    {
        $data = $this->getCommonData();
        return view('cliente.shop_cart', $data);
    }
    public function showProductsByCategory($id)
    {
        $category = Category::findOrFail($id);
        $products = Product::where('category_id', $id)->where('estado', 'A')->get();

        $data = $this->getCommonData();
        $data['category'] = $category;
        $data['products'] = $products;

        return view('cliente.category_products', $data);
    }

    public function showProductsByBrand($id)
    {
        $brand = Brand::findOrFail($id);
        $products = Product::where('brand_id', $id)->where('estado', 'A')->get();

        $data = $this->getCommonData();
        $data['brand'] = $brand;
        $data['products'] = $products;

        return view('cliente.brand_products', $data);
    }

    public function showProductSelected($id)
    {
        // Obtener el producto seleccionado
        $product = Product::findOrFail($id);

        // Obtener productos recomendados (por ejemplo, los que están en la misma categoría)
        $recommendedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $id) // Excluir el producto actual
            ->where('estado', 'A') // Solo productos con estado 'A'
            ->orderBy('stock', 'desc') // Ordenar por stock de mayor a menor
            ->limit(4) // Limitar la cantidad de productos recomendados
            ->get();

        // Obtener datos comunes
        $data = $this->getCommonData();
        $data['product'] = $product;
        $data['recommendedProducts'] = $recommendedProducts;

        // Devolver la vista con los datos
        return view('cliente.view_product', $data);
    }

    public function checkout()
    {
        // Recuperar el carrito actual de la sesión
        $cart = session()->get('cart', ['items' => [], 'total' => 0]);

        // Verificar si el carrito está vacío o si no contiene productos
        if (empty($cart['items'])) {
            // Redirigir a una página de error o mostrar un mensaje si el carrito está vacío
            return redirect()->route('home.page')->with([
                'message' => 'Tu carrito está vacío. Agrega productos antes de proceder.',
                'status' => 'success', // O 'error', dependiendo del contexto
                'color' => 'A4CF79'   // Ajustar el color del mensaje si es necesario
            ]);
        }
        // Verificar si el usuario está autenticado
        if (!Auth::check()) {
            // Redirigir al login con un mensaje si no está autenticado
            return redirect()->route('login')->with('message', 'Debes iniciar sesión para proceder con el pago.');
        }


        $orderNumber = Order::generateOrderNumber(Auth::id());

        $data = $this->getCommonData();
        $data['orderNumber'] = $orderNumber;


        return view('cliente.checkout', $data); // La vista de checkout o cualquier otra acción
    }

    public function orderConfirmation($orderId)
    {
        // Obtener la orden con sus detalles y productos relacionados
        $order = Order::with('orderDetails.product')->findOrFail($orderId);

        // Verificar que la orden pertenece al usuario autenticado
        if ($order->user_id !== auth()->id()) {
            // Redirigir o mostrar un mensaje de error
            return redirect()->route('home.page')->with('error', 'No tienes permiso para ver esta orden.');
        }

        // Obtener los detalles de la orden
        $detalles = $order->orderDetails;
        // Convertir created_at a hora peruana
        $order->created_at = Carbon::parse($order->created_at)->setTimezone('America/Lima');

        // Obtener los datos comunes
        $data = $this->getCommonData();
        $data['order'] = $order;
        $data['detalles'] = $detalles;

        // Retornar la vista con los datos
        return view('cliente.order_confirmation', $data);
    }

    public function showOrders()
    {
        if (!Auth::check()) {
            // Redirigir a la página de inicio de sesión si el usuario no está autenticado
            return redirect()->route('login')->with('error', 'Debes estar autenticado para ver tus órdenes.');
        }

        // Obtener el usuario autenticado
        $user = Auth::user();

        // Obtener las órdenes del usuario autenticado
        $orders = Order::where('user_id', $user->id)->paginate(10);
        

        $data = $this->getCommonData();
        $data['orders'] = $orders;

        // Retornar la vista con las órdenes del usuario
        return view('cliente.orders', $data);

    }

    public function trackOrder($orderId)
    {
         // Obtener la orden con sus detalles y productos relacionados
         $order = Order::with('orderDetails.product')->findOrFail($orderId);

         // Verificar que la orden pertenece al usuario autenticado
         if ($order->user_id !== auth()->id()) {
             // Redirigir o mostrar un mensaje de error
             return redirect()->route('home.page')->with('error', 'No tienes permiso para ver esta orden.');
         }
 
         // Obtener los detalles de la orden
         $detalles = $order->orderDetails;
         // Convertir created_at a hora peruana
         $order->created_at = Carbon::parse($order->created_at)->setTimezone('America/Lima');
 
         // Obtener los datos comunes
         $data = $this->getCommonData();
         $data['order'] = $order;
         $data['detalles'] = $detalles;
        

        return view('cliente.order_track', $data);
    }


    public function novedades()
    {
        // Obtener los productos más recientes (últimos 10 añadidos)
        $novedades = Product::orderBy('created_at', 'desc')
            ->where('estado', 'A')
            ->limit(10)
            ->get();

        $data = $this->getCommonData();
        $data['novedades'] = $novedades;

        // Retornar la vista con los productos
        return view('cliente.novedades', $data);
    }
}
