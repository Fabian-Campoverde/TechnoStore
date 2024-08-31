@extends('layouts.page')
@section('css')
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
    <style>
        /* Estilo específico para las listas dentro del id #product-description */
        #product-description ul {
            list-style-type: disc;
            /* Puntos para las listas no ordenadas */

        }

        #product-description ol {
            list-style-type: decimal;
            /* Números para las listas ordenadas */

        }
    </style>
    <section class="py-8 bg-white md:py-16 dark:bg-gray-900 antialiased">
        <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
            <div class="lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-16">
                <div class="shrink-0 max-w-md lg:max-w-lg mx-auto">
                    <img class="w-full dark:hidden object-cover rounded-t-lg" src="{{ asset($product->image_url) }}"
                        alt="" />
                </div>

                <div class="mt-6 sm:mt-8 lg:mt-0">
                    <h1 class="text-xl font-semibold text-center text-gray-900 sm:text-2xl dark:text-white">
                        {{ $product->nombre }}
                    </h1>
                    <div class="mt-4 sm:items-center sm:gap-4 sm:flex">
                        <p class="text-lg font-extrabold text-gray-900 sm:text-xl dark:text-white">
                            Precio: S/ {{ $product->precio_venta }}
                        </p>
                    </div>
                    <div class="mt-4 sm:items-center sm:gap-4 sm:flex">
                        <p class="text-lg font-extrabold text-gray-900 sm:text-xl dark:text-white">
                            @if ($product->stock > 10)
                                <span class="text-green-500">Stock disponible >10 unidades</span>
                            @else
                                <span class="text-red-500">Stock limitado :
                                    @if ($product->stock == 1)
                                        1 unidad
                                    @else
                                        {{ $product->stock }} unidades
                                    @endif
                                </span>
                            @endif
                        </p>
                    </div>
                    <div class="mt-6 sm:gap-4 sm:items-center sm:flex sm:mt-8">
                        <div class="relative flex items-center max-w-[8rem]">
                            <button type="button" id="decrement-button"
                                class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 1h16" />
                                </svg>
                            </button>
                            <input type="text" value="1" id="quantity-input"
                                aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="1" required />
                            <button type="button" id="increment-button"
                                class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 1v16M1 9h16" />
                                </svg>
                            </button>
                        </div>

                        <a style="cursor: pointer;" id="add-to-cart-button" data-product-id="{{ $product->id }}"
                            title=""
                            class="text-white mt-4 sm:mt-0 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800 flex items-center justify-center"
                            role="button">
                            <svg class="w-5 h-5 -ms-2 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                            </svg>
                            Añadir al carrito
                        </a>
                    </div>

                    <br>
                    <div id="accordion-open" data-accordion="open" class="space-y-4">
                        <!-- Acordeón para la Descripción del Producto -->
                        <h2 id="accordion-product-description-heading">
                            <button type="button"
                                class="flex items-center justify-between w-full p-4 font-extrabold text-left text-gray-900 dark:text-white bg-gray-100 dark:bg-gray-800 rounded-lg focus:outline-none focus:ring-0"
                                data-accordion-target="#accordion-product-description-body" aria-expanded="false"
                                aria-controls="accordion-product-description-body">
                                <span>Descripción del Producto</span>
                                <svg data-accordion-icon
                                    class="w-6 h-6 rotate-180 shrink-0 transition-transform duration-300"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5.23 7.21a.75.75 0 011.06.02L10 10.44l3.71-3.21a.75.75 0 111.02 1.1l-4.25 3.68a.75.75 0 01-1.02 0L5.25 8.29a.75.75 0 01-.02-1.08z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-product-description-body" class="hidden overflow-y-auto max-h-56"
                            aria-labelledby="accordion-product-description-heading">
                            <div class="p-4 bg-white dark:bg-gray-800 rounded-lg">
                                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                                    {!! $product->descripcion !!}
                                </p>
                            </div>
                        </div>
                        <hr class="my-6 md:my-8 border-gray-400 dark:border-gray-800" />
                        <!-- Acordeón para las Formas de Pago -->
                        <h2 id="accordion-payment-methods-heading">
                            <button type="button"
                                class="flex items-center justify-between w-full p-4 font-extrabold text-left text-gray-900 dark:text-white bg-gray-100 dark:bg-gray-800 rounded-lg focus:outline-none focus:ring-0"
                                data-accordion-target="#accordion-payment-methods-body" aria-expanded="false"
                                aria-controls="accordion-payment-methods-body">
                                <span>Formas de Pago</span>
                                <svg data-accordion-icon class="w-6 h-6 rotate-0 shrink-0 transition-transform duration-300"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5.23 7.21a.75.75 0 011.06.02L10 10.44l3.71-3.21a.75.75 0 111.02 1.1l-4.25 3.68a.75.75 0 01-1.02 0L5.25 8.29a.75.75 0 01-.02-1.08z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-payment-methods-body" class="hidden overflow-y-auto max-h-56"
                            aria-labelledby="accordion-payment-methods-heading">
                            <div class="p-4 ">
                                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 xl:grid-cols-3">
                                    @foreach ($payment_methods as $payment_method)
                                        <div
                                            class="flex items-center space-x-3 p-4 bg-white dark:bg-gray-900 rounded-lg shadow-sm">
                                            <svg class="w-8 h-8 text-blue-500 dark:text-blue-400" fill="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M2 4.5C2 3.11929 3.11929 2 4.5 2H19.5C20.8807 2 22 3.11929 22 4.5V19.5C22 20.8807 20.8807 22 19.5 22H4.5C3.11929 22 2 20.8807 2 19.5V4.5ZM4.5 3C3.67157 3 3 3.67157 3 4.5V19.5C3 20.3284 3.67157 21 4.5 21H19.5C20.3284 21 21 20.3284 21 19.5V4.5C21 3.67157 20.3284 3 19.5 3H4.5ZM12 16C12.5523 16 13 16.4477 13 17C13 17.5523 12.5523 18 12 18C11.4477 18 11 17.5523 11 17C11 16.4477 11.4477 16 12 16ZM16 14C16.5523 14 17 14.4477 17 15C17 15.5523 16.5523 16 16 16C15.4477 16 15 15.5523 15 15C15 14.4477 15.4477 14 16 14ZM8 12C8.55228 12 9 12.4477 9 13C9 13.5523 8.55228 14 8 14C7.44772 14 7 13.5523 7 13C7 12.4477 7.44772 12 8 12ZM12 12C12.5523 12 13 12.4477 13 13C13 13.5523 12.5523 14 12 14C11.4477 14 11 13.5523 11 13C11 12.4477 11.4477 12 12 12ZM16 12C16.5523 12 17 12.4477 17 13C17 13.5523 16.5523 14 16 14C15.4477 14 15 13.5523 15 13C15 12.4477 15.4477 12 16 12Z">
                                                </path>
                                            </svg>
                                            <p class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                                {{ $payment_method->nombre }}
                                            </p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-12 bg-white dark:bg-gray-900">
        <div class="max-w-screen-xl mx-auto px-4 lg:px-6">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-8 text-center">
                Productos que te podrían interesar
            </h2>
            <div class="grid gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach ($recommendedProducts as $p)
                    <a href="{{ route('view.product', ['id' => $p->id]) }}"
                        class="group block bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden transform transition-transform duration-300 hover:scale-105 hover:shadow-xl">
                        <div class="relative">
                            <img class="w-full h-64 object-cover group-hover:opacity-90 transition-opacity duration-300"
                                src="{{ asset($p->image_url) }}" alt="{{ $p->nombre }}" />
                            <div
                                class="absolute inset-0 flex items-end p-4 bg-gradient-to-t from-black via-transparent to-transparent group-hover:bg-gradient-to-t group-hover:from-black group-hover:via-black group-hover:to-transparent transition-colors duration-300">
                                <h3 class="text-lg font-semibold text-white">{{ $p->nombre }}</h3>
                            </div>
                        </div>
                        <div class="p-4">
                            <p class="text-gray-600 dark:text-gray-400 mb-2">Precio: S/ {{ $p->precio_venta }}</p>
                            <div class="flex items-center space-x-2 mt-2">
                                <span class="text-blue-500 dark:text-blue-400 font-semibold">Ver producto</span>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-5 h-5 text-blue-500 dark:text-blue-400 group-hover:translate-x-1 transition-transform duration-300"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection



@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const decrementButton = document.getElementById('decrement-button');
            const incrementButton = document.getElementById('increment-button');
            const quantityInput = document.getElementById('quantity-input');


            const min = 1;
            const max = {{ $product->stock }};

            let intervalId;

            function updateQuantity(value) {
                let currentValue = parseInt(quantityInput.value);
                if (!isNaN(currentValue)) {
                    quantityInput.value = Math.max(min, Math.min(max, currentValue + value));
                }
            }

            // Incrementar
            incrementButton.addEventListener('mousedown', function() {
                intervalId = setInterval(function() {
                    updateQuantity(1);
                }, 100);
            });

            incrementButton.addEventListener('mouseup', function() {
                clearInterval(intervalId);
            });

            incrementButton.addEventListener('mouseleave', function() {
                clearInterval(intervalId);
            });

            // Decrementar
            decrementButton.addEventListener('mousedown', function() {
                intervalId = setInterval(function() {
                    updateQuantity(-1);
                }, 100);
            });

            decrementButton.addEventListener('mouseup', function() {
                clearInterval(intervalId);
            });

            decrementButton.addEventListener('mouseleave', function() {
                clearInterval(intervalId);
            });

            // Actualizar el valor cuando se hace clic en el botón de decremento
            decrementButton.addEventListener('click', function() {
                let currentValue = parseInt(quantityInput.value);
                if (!isNaN(currentValue) && currentValue > min) {
                    quantityInput.value = Math.max(currentValue - 1, min);
                }
            });

            // Actualizar el valor cuando se hace clic en el botón de incremento
            incrementButton.addEventListener('click', function() {
                let currentValue = parseInt(quantityInput.value);
                if (!isNaN(currentValue) && currentValue < max) {
                    quantityInput.value = Math.min(currentValue + 1, max);
                }
            });

            // Asegurarse de que el valor ingresado esté dentro del rango
            quantityInput.addEventListener('input', function() {
                let currentValue = parseInt(quantityInput.value);
                if (!isNaN(currentValue)) {
                    if (currentValue < min) {
                        quantityInput.value = min;
                    } else if (currentValue > max) {
                        quantityInput.value = max;
                    }
                }
            });

            // Manejar el campo de entrada cuando pierde el foco
            quantityInput.addEventListener('blur', function() {
                let currentValue = parseInt(quantityInput.value);
                if (isNaN(currentValue) || currentValue < min) {
                    quantityInput.value = min;
                } else if (currentValue > max) {
                    quantityInput.value = max;
                }
            });
        });
    </script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>
        $(document).ready(function() {

            // Manejar el clic en el botón "Añadir al carrito"
            $('#add-to-cart-button').click(function(e) {
                e.preventDefault();

                // Obtener el ID del producto y la cantidad
                var productId = $(this).data('product-id');
                var quantity = $('#quantity-input').val();

                // Enviar los datos al servidor usando AJAX
                $.ajax({
                    url: '/cart/add', // La ruta a tu endpoint para añadir al carrito
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}', // Token CSRF
                        product_id: productId,
                        quantity: quantity
                    },
                    success: function(response) {
                        // Actualizar el contenido del modal con los nuevos datos del carrito
                        console.log('Correcto')
                        alert('Producto agregado exitosamente');
                        location.reload();
                        // $('#cartModal').removeClass('hidden');
                    },
                    error: function(xhr) {
                        var errorMessage = xhr.responseJSON?.message ||
                            'Error al añadir al carrito';
                        alert(errorMessage);
                    }
                });
            });







        });
    </script>
@endsection
