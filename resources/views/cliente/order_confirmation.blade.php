@extends('layouts.page')
@section('css')
    
@endsection

@section('content')
<section class="bg-dark py-8 antialiased dark:bg-gray-900 md:py-16">
    <div class="mx-auto max-w-2xl px-4 2xl:px-0">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl mb-2">¡Gracias por tu compra!</h2>
        <p class="text-gray-500 dark:text-gray-400 mb-6 md:mb-8">
            Tu pedido será procesado dentro de las próximas 24 horas en días laborables. Te notificaremos por correo electrónico cuando tu pedido haya sido enviado.
        </p>
        <div class="space-y-4 sm:space-y-2 rounded-lg border border-gray-100 bg-blue-50 p-6 dark:border-gray-700 dark:bg-gray-800 mb-6 md:mb-8">
            <dl class="sm:flex items-center justify-between gap-4">
                <dt class="font-normal mb-1 sm:mb-0 text-gray-500 dark:text-gray-400">Orden</dt>
                <dd class="font-medium text-gray-900 dark:text-white sm:text-end">#{{ $order->order_number }}</dd>
            </dl>
            <dl class="sm:flex items-center justify-between gap-4">
                <dt class="font-normal mb-1 sm:mb-0 text-gray-500 dark:text-gray-400">Fecha</dt>
                <dd class="font-medium text-gray-900 dark:text-white sm:text-end">{{ $order->created_at->format('d/m/Y H:i:s') }}</dd>
            </dl>
            <dl class="sm:flex items-center justify-between gap-4">
                <dt class="font-normal mb-1 sm:mb-0 text-gray-500 dark:text-gray-400">Método de Pago</dt>
                <dd class="font-medium text-gray-900 dark:text-white sm:text-end">{{$order->paymentMethod->nombre}}</dd>
            </dl>
            <dl class="sm:flex items-center justify-between gap-4">
                <dt class="font-normal mb-1 sm:mb-0 text-gray-500 dark:text-gray-400">Nombre</dt>
                <dd class="font-medium text-gray-900 dark:text-white sm:text-end">{{ $order->first_name }} {{ $order->last_name }}</dd>
            </dl>
            <dl class="sm:flex items-center justify-between gap-4">
                <dt class="font-normal mb-1 sm:mb-0 text-gray-500 dark:text-gray-400">Dirección</dt>
                <dd class="font-medium text-gray-900 dark:text-white sm:text-end">{{ $order->address }}</dd>
            </dl>
            <dl class="sm:flex items-center justify-between gap-4">
                <dt class="font-normal mb-1 sm:mb-0 text-gray-500 dark:text-gray-400">Teléfono</dt>
                <dd class="font-medium text-gray-900 dark:text-white sm:text-end">{{ $order->phone }}</dd>
            </dl>
            <dl class="sm:flex items-center justify-between gap-4">
                <dt class="font-normal mb-1 sm:mb-0 text-gray-500 dark:text-gray-400">Correo</dt>
                <dd class="font-medium text-gray-900 dark:text-white sm:text-end">{{ $order->email }}</dd>
            </dl>
        </div>
        <div class="flex items-center space-x-4">
            <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Rastrear tu pedido</a>
            <a href="{{ url('/') }}" class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Volver a la tienda</a>
        </div>
    </div>
</section>

@endsection

@section('js')
<script>
    window.cartData = @json($cart);
</script>
<script type="text/javascript" src="{{ asset('js/cart.js') }}"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
@endsection