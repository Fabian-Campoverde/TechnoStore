@extends('layouts.page')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection
@section('content')
<div class="bg-gray-100 py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-5xl mx-auto">
        <!-- Título -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-extrabold text-gray-900 mb-4">Proceso de Envío Gratuito</h1>
            <p class="text-lg text-gray-600">Descubre cómo gestionamos y enviamos tus pedidos de forma gratuita.</p>
        </div>

        <!-- Proceso de Envío -->
        <div class="space-y-8">
            <!-- Paso 1: Realización del Pedido -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden p-6">
                <div class="flex items-center mb-4">
                    <div class="w-24 h-16 bg-indigo-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-shopping-cart text-indigo-500 text-3xl"></i>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-2xl font-semibold text-gray-800">Paso 1: Realización del Pedido</h2>
                        <p class="text-gray-600 mt-2">El proceso comienza cuando realizas un pedido en nuestra tienda en línea. Seleccionas tus productos, los añades al carrito y procedes a la compra. Asegúrate de ingresar una dirección de envío correcta para garantizar una entrega sin problemas.</p>
                    </div>
                </div>
            </div>

            <!-- Paso 2: Validación del Pedido -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden p-6">
                <div class="flex items-center mb-4">
                    <div class="w-24 h-16 bg-blue-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-check-circle text-blue-500 text-3xl"></i>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-2xl font-semibold text-gray-800">Paso 2: Validación del Pedido</h2>
                        <p class="text-gray-600 mt-2">Nuestro equipo de ventas revisa y valida tu pedido para asegurar que todos los productos estén disponibles y que la información proporcionada sea correcta. Si hay algún problema con el pedido, te contactaremos para resolverlo.</p>
                    </div>
                </div>
            </div>

            <!-- Paso 3: Preparación del Pedido -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden p-6">
                <div class="flex items-center mb-4">
                    <div class="w-24 h-16 bg-green-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-box text-green-500 text-3xl"></i>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-2xl font-semibold text-gray-800">Paso 3: Preparación del Pedido</h2>
                        <p class="text-gray-600 mt-2">Una vez validado, el pedido se envía al proveedor para obtener los productos. Cuando recibimos los artículos, los preparamos cuidadosamente, los empaquetamos y los etiquetamos para su envío. Cada paquete se revisa para asegurar que todo esté correcto antes de salir de nuestras instalaciones.</p>
                    </div>
                </div>
            </div>

            <!-- Paso 4: Envío del Pedido -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden p-6">
                <div class="flex items-center mb-4">
                    <div class="w-24 h-16 bg-yellow-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-truck text-yellow-500 text-3xl"></i>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-2xl font-semibold text-gray-800">Paso 4: Envío del Pedido</h2>
                        <p class="text-gray-600 mt-2">Finalmente, el paquete se envía a la dirección proporcionada en tu pedido. Utilizamos transportistas confiables para asegurar que tu pedido llegue a ti en el menor tiempo posible. Te proporcionaremos un número de seguimiento para que puedas rastrear tu pedido en todo momento.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    window.cartData = @json($cart);
</script>

<!-- Incluir el archivo compilado `cart.js` -->
<script type="text/javascript" src="{{ asset('js/cart.js') }}"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
@endsection