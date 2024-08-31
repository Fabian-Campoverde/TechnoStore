@extends('layouts.page')
@section('content')
    <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Carrito de Compras</h2>

            <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">
                <div class="mx-auto w-full flex-none lg:max-w-2xl xl:max-w-4xl">
                    <div class="space-y-6">
                        <div class="relative overflow-x-auto">
                            <table class="min-w-full  text-sm text-left rtl:text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>


                                        <th scope="col" class="px-6 py-3 text-center">
                                            Producto
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            Cantidad
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            Precio
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            Subtotal
                                        </th>
                                        <th scope="col" class="px-6 py-3 ">
                                            Accion
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($cart))
                                        @foreach ($cart['items'] as $item)
                                            <tr class="bg-white dark:bg-gray-800">
                                                <th scope="row"
                                                    class="flex items-center  px-6 py-4 text-center text-gray-900 whitespace-nowrap dark:text-white">

                                                    <div class="mr-2">
                                                        <img class="w-10 h-10 object-contain rounded-lg"
                                                            src="{{ $item['imagen'] }}" />
                                                    </div>
                                                    <div class="pl-3">
                                                        <div class="text-base font-semibold">{{ $item['name'] }} </div>

                                                    </div>

                                                </th>
                                                <td class="px-6 py-4 text-center">{{ $item['quantity'] }}</td>
                                                <td class="px-6 py-4 text-center">S/ {{ number_format($item['price'], 2) }}
                                                </td>
                                                <td class="subtotal text-center px-6 py-4">S/
                                                    {{ number_format($item['quantity'] * $item['price'], 2) }}</td>
                                                <td class="px-6 py-4 flex items-center">
                                                    <div class="flex item-center justify-center">
                                                        <div
                                                            class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">

                                                            <a href="#" class="modify-quantity"
                                                                data-product-id="{{ $item['id'] }}"
                                                                data-current-quantity="{{ $item['quantity'] }}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                                </svg>
                                                            </a>
                                                        </div>
                                                        <div
                                                            class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                            <form class="form-delete2" action="" method="post">

                                                                <input type="hidden" name="product_id"
                                                                    value="{{ $item['id'] }}">
                                                                <input type="hidden" name="product_name"
                                                                    value="{{ $item['name'] }}">
                                                                <button type="submit" data-product-id="{{ $item['id'] }}"
                                                                    class="remove-item eliminar-fila text-red-600 hover:text-red-700 dark:text-red-500 dark:hover:text-red-600">
                                                                    <span class="sr-only">Eliminar</span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                        viewBox="0 0 24 24" stroke="currentColor"
                                                                        class="w-4 h-4">
                                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                                            stroke-width="2"
                                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                    </svg>
                                                                </button>

                                                            </form>
                                                            {{-- <a href="#" class="eliminar-fila">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </a> --}}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6"
                                                class="py-4 text-center font-bold text-gray-500 dark:text-gray-400">
                                                El carrito está vacío
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <br>
                <!-- Contenedor del resumen del pedido -->
                <div class="w-full lg:w-1/3">
                    <div
                        class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                        <p class="text-xl font-semibold text-gray-900 dark:text-white">Resumen</p>

                        <div class="space-y-4">
                            <div class="space-y-2">
                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Subtotal</dt>
                                    <dd class="text-base font-medium text-gray-900 dark:text-white subtotal1">S/0.00</dd>
                                </dl>


                            </div>

                            <dl
                                class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                                <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                                <dd class="text-base font-bold text-gray-900 dark:text-white total">S/0.00</dd>
                            </dl>
                        </div>

                        @auth
                            <a href="{{ route('checkout') }}"
                                class="flex w-full items-center justify-center rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Proceder con el pago
                            </a>
                        @endauth

                        @guest
                            <a href="{{ route('login') }}"
                                class="flex w-full items-center justify-center text-center rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Inicie sesión para realizar la compra</a>
                        @endguest


                        <div class="flex items-center justify-center gap-2">
                            <span class="text-sm font-normal text-gray-500 dark:text-gray-400"></span>
                            <a href="{{ url('/') }}" title=""
                                class="inline-flex items-center gap-2 text-sm font-medium text-primary-700 underline hover:no-underline dark:text-primary-500">
                                Continuar comprando
                                <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            // Inicializa el total en 0
            var total = 0;

            // Recorre cada fila con clase 'subtotal' y suma sus valores al total
            $('.subtotal').each(function() {
                // Obtiene el valor del subtotal, eliminando el 'S/' y convirtiéndolo a número
                var subtotal = parseFloat($(this).text().replace('S/', '').trim());
                if (!isNaN(subtotal)) {
                    total += subtotal;
                }
            });

            $('.subtotal1').text('S/ ' + total.toFixed(2));
            $('.total').text('S/ ' + total.toFixed(2));


        });
    </script>
    <script>
        $('.form-delete2').submit(function(e) {
            e.preventDefault();
            const productName = e.target.querySelector("input[name='product_name']").value;
            const productId = e.target.querySelector("input[name='product_id']").value;
            var csrf = document.querySelector('meta[name="csrf-token"]').content;
            Swal.fire({
                title: `¿Estás seguro de que deseas eliminar "${productName}" del carrito?`,
                text: "No hay vuelta atrás!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, hazlo!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/cart/remove',
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            _token: csrf,
                            _method: 'DELETE',
                            product_id: productId
                        },
                        success: function(response) {

                            console.log('Correcto')
                            location.reload();

                            // Opcional: Mostrar un mensaje de éxito

                            // Recargar la página después de la alerta

                        },
                        error: function(xhr) {
                            console.error('Error al eliminar el producto del carrito:', xhr
                                .responseText);
                        }
                    });

                }

            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.modify-quantity', function(e) {
                e.preventDefault();

                // Obtener datos del enlace
                var productId = $(this).data('product-id');
                var currentQuantity = $(this).data('current-quantity');
                var newQuantity = prompt("Ingrese la nueva cantidad:", currentQuantity);

                // Verificar si la nueva cantidad es válida
                if (newQuantity === null || isNaN(newQuantity) || newQuantity <= 0) {
                    alert("Cantidad inválida. Debe ser un número positivo.");
                    return;
                }

                // Realizar la solicitud AJAX
                $.ajax({
                    url: '/cart/update', // URL de la ruta
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        product_id: productId,
                        quantity: newQuantity
                    },
                    success: function(response) {
                        console.log('Cantidad actualizada correctamente');
                        location.reload();


                    },
                    error: function(xhr) {
                        console.error('Error al actualizar la cantidad del carrito:', xhr
                            .responseText);
                        var errorMessage = xhr.responseJSON?.message ||
                            'Error al actualizar carrito';
                        alert(errorMessage);
                    }
                });
            });
        });
    </script>
@endsection
