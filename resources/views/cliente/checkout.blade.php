@extends('layouts.page')
@section('css')
    <style>
        #map {
            height: 300px;
            width: 100%;
        }

        .active-tab {
            color: blue;

        }

        #payment-instructions ul {
            list-style-type: disc;
            /* Puntos para las listas no ordenadas */

        }

        #payment-instructions ol {
            list-style-type: decimal;
            /* Números para las listas ordenadas */

        }

        .swal2-confirm {
            background-color: #3085d6 !important;
            /* Forzar el color de fondo */
            color: white !important;
            /* Forzar el color del texto */
        }

        .swal2-confirm:hover {
            background-color: #2874a6 !important;
            /* Color de fondo al hacer hover */
        }
    </style>
@endsection
@section('content')

    <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <div class="flex flex-col lg:flex-row lg:justify-between lg:gap-6 items-start">
                <!-- Encabezado -->
                <div class="lg:w-3/5">
                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">
                        Orden de pago <span class="text-primary-700 dark:text-primary-500">{{ $orderNumber }}</span>
                    </h2>
                    <ul
                        class="items-center flex w-full max-w-2xl text-center text-sm font-medium text-gray-500 dark:text-gray-400 sm:text-base">
                        <li
                            class="after:border-1 flex items-center text-primary-700 after:mx-6 after:hidden after:h-1 after:w-full after:border-b after:border-gray-200 dark:text-primary-500 dark:after:border-gray-700 sm:after:inline-block sm:after:content-[''] md:w-full xl:after:mx-10">
                            <a style="cursor: pointer;" id="btnDatos" class="tab-link ">
                                <span
                                    class="flex items-center after:mx-2 after:text-gray-200 after:content-['/'] dark:after:text-gray-500 sm:after:hidden">
                                    <svg class="me-2 h-4 w-4 sm:h-5 sm:w-5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    Datos
                                </span>
                            </a>
                        </li>
                        <li
                            class="after:border-1 flex items-center text-primary-700 after:mx-6 after:hidden after:h-1 after:w-full after:border-b after:border-gray-200 dark:text-primary-500 dark:after:border-gray-700 sm:after:inline-block sm:after:content-[''] md:w-full xl:after:mx-10">
                            <a style="cursor: pointer;" id="btnEntrega" class="tab-link ">
                                <span
                                    class="flex items-center after:mx-2 after:text-gray-200 after:content-['/'] dark:after:text-gray-500 sm:after:hidden">
                                    <svg class="me-2 h-4 w-4 sm:h-5 sm:w-5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    Entrega
                                </span>
                            </a>
                        </li>
                        <li class="flex shrink-0 items-center">
                            <a style="cursor: pointer;" id="btnPago" class="tab-link ">
                                <span
                                    class="flex items-center after:mx-2 after:text-gray-200 after:content-['/'] dark:after:text-gray-500 sm:after:hidden">
                                    <svg class="me-2 h-4 w-4 sm:h-5 sm:w-5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    Pago
                                </span>
                            </a>
                        </li>
                    </ul>
                    <form action="{{ route('admin.orders.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="order_number" id="order_number" value="{{ $orderNumber }}">
                        <input type="hidden" name="user_id" id="user_id" value="{{ Auth::id() }}">
                        <input type="hidden" name="detalles" id="detalles">
                        <input type="hidden" name="total" id="total"
                            @if (!empty($cart)) value="{{ $cart['total'] }}"
                        @else
                         value="" @endif>
                        <!-- Formulario de Datos -->
                        <div id="formDatos" class="mt-8 form-container1">
                            <div class="mt-4 sm:mt-4 lg:flex lg:items-start lg:gap-12 xl:gap-16">
                                <div class="min-w-0 flex-1 space-y-8">
                                    <div class="space-y-4">
                                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white uppercase">Datos de
                                            quien recibe</h2>
                                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                            <div>
                                                <label for="your_name"
                                                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                                    Nombres*</label>
                                                <input type="text" id="first_name" name="first_name"
                                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                    placeholder="Lionel" required />
                                            </div>
                                            <div>
                                                <label for="your_name"
                                                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                                    Apellidos*</label>
                                                <input type="text" id="last_name" name="last_name"
                                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                    placeholder="Messi" required />
                                            </div>
                                            <div>
                                                <label for="your_email"
                                                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                                    Correo*</label>
                                                <input type="email" id="email" name="email"
                                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                    placeholder="name@gmail.com" required />
                                            </div>
                                            <div>
                                                <label for="phone"
                                                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                                    Telefono</label>
                                                <input type="text" id="phone" name="phone"
                                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                    placeholder="987654321" required />
                                            </div>
                                            <div>
                                                <div class="mb-2 flex items-center gap-2">
                                                    <label for="document_type"
                                                        class="block text-sm font-medium text-gray-900 dark:text-white">
                                                        Documento*</label>
                                                </div>
                                                <select id="document_type" name="document_type"
                                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">
                                                    <option selected value="DNI">DNI</option>
                                                    <option value="Carnet de Extranjería">Carnet de Extranjería</option>
                                                    <option value="Pasaporte">Pasaporte</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label for="document_number"
                                                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                                    N°
                                                    Documento*</label>
                                                <input type="text" id="document_number" name="document_number"
                                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                    placeholder="104234524" required />
                                            </div>
                                        </div>
                                        <div class="flex justify-end">
                                            <button id="btnNextDatos" type="button"
                                                class="mt-4 w-1/5 rounded-lg bg-blue-600 text-white py-2.5 text-sm">Siguiente</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div id="formEntrega" class="mt-8 form-container1 hidden">
                            <!-- Form Entrega -->
                            <div class="mt-4 sm:mt-4  lg:items-start lg:gap-12 xl:gap-16">
                                <div class="min-w-0  space-y-8">
                                    <div class="w-full space-y-4">
                                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white uppercase">Entrega
                                        </h2>

                                        <div class=" space-y-4 ">
                                            <div class="container">
                                                <label for="address"
                                                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                                    Dirección* <br>
                                                    <span class="text-xs text-gray-500 dark:text-gray-400">
                                                        Seleccione su dirección de la lista desplegable para que se complete
                                                        automáticamente con el departamento, provincia, y otros detalles. Si
                                                        no aparece en la lista, intente incluir el distrito o ciudad.
                                                    </span>
                                                </label>
                                                <input type="text" id="address" name="address"
                                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                    placeholder="Avenida Balta 123, Chiclayo" required />
                                            </div>

                                            <div class="grid grid-cols-2 gap-4 sm:grid-cols-2">
                                                <div>
                                                    <label for="department"
                                                        class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                                        Departamento*
                                                    </label>
                                                    <input type="text" id="department" name="department"
                                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                        placeholder="" required disabled />
                                                </div>
                                                <div>
                                                    <label for="province"
                                                        class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                                        Provincia*
                                                    </label>
                                                    <input type="text" id="province" name="province"
                                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                        placeholder="" required disabled />
                                                </div>
                                                <div>
                                                    <label for="district"
                                                        class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                                        Distrito*

                                                    </label>
                                                    <input type="text" id="district" name="district"
                                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                        placeholder="" required disabled />
                                                </div>
                                                <div>
                                                    <label for="zone"
                                                        class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                                        Zona

                                                    </label>
                                                    <input type="text" id="zone" name="zone"
                                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                        placeholder="" disabled />
                                                </div>
                                            </div>
                                            <div>
                                                <label for="reference"
                                                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                                    Referencia (opcional)
                                                </label>
                                                <input type="text" id="reference" name="reference"
                                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                    placeholder="En una esquina, puerta azul,...." />
                                            </div>
                                            <div class="flex justify-between mt-4">
                                                <button id="btnBackEntrega" type="button"
                                                    class="w-1/5 rounded-lg bg-gray-600 text-white py-2.5 text-sm">Atrás</button>
                                                <button id="btnNextEntrega" type="button"
                                                    class="w-1/5 rounded-lg bg-blue-600 text-white py-2.5 text-sm">Siguiente</button>
                                            </div>
                                            <div id="map" class="hidden"></div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div id="formPago" class="mt-8 form-container1 hidden ">
                            <!-- Form Pago -->
                            <div class="mt-4 sm:mt-4 lg:flex lg:items-start lg:gap-12 xl:gap-16">
                                <div class="min-w-0 flex-1 space-y-8">
                                    <div class="space-y-4">
                                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white uppercase">Método de
                                            Pago

                                        </h2>
                                        <span class="text-sm text-gray-600 dark:text-gray-400">(Seleccione un método para
                                            ver las instrucciones de pago)</span>
                                        <div class="flex flex-wrap space-x-2">
                                            @foreach ($payment_methods as $method)
                                                <a href="#"
                                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                    onclick="handlePaymentMethod('{{ $method->id }}', '{{ $method->nombre }}', '{{ $method->imagen }}', '{{ $method->instrucciones }}'); return false;">
                                                    {{ $method->nombre }}
                                                </a>
                                            @endforeach
                                        </div>

                                        <!-- Contenedor para mostrar la imagen y las instrucciones -->
                                        <div id="payment-details"
                                            class="hidden mt-4 w-full max-w-xs mx-auto h-96 bg-gray-100 rounded-lg overflow-hidden relative">
                                            <!-- Contenedor del nombre del método de pago -->
                                            <div
                                                class="absolute top-0 left-0 right-0 bg-gray-800 text-white text-center py-2">
                                                <span id="payment-name" class="text-lg font-semibold"></span>
                                            </div>

                                            <!-- Imagen del método de pago -->
                                            <img id="pago-imagen" src="" alt=""
                                                class="object-cover w-full h-full" />

                                            <!-- Instrucciones del método de pago -->
                                            {{-- <div id="payment-instructions" class="mt-4 text-gray-700 dark:text-gray-300 px-4 ">
                                    Pepe
                                    </div> --}}
                                        </div>
                                        <div id="payment-instructions"
                                            class="mt-4 text-gray-700 dark:text-gray-300 px-4 ">
                                        </div>
                                        <div class="flex items-center space-x-4 mt-4">
                                            <!-- Input para elegir la imagen -->
                                            <div class="flex-1">
                                                <label for="payment_image"
                                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Imagen
                                                    de
                                                    Pago*</label>
                                                <input id="payment_image" name="payment_image" type="file" required
                                                    accept="image/*"
                                                    class="mt-4 block w-full text-sm text-gray-900 border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 dark:bg-gray-800 dark:border-gray-600 dark:text-white dark:focus:border-indigo-500">
                                            </div>

                                            <!-- Input para elegir la fecha del pago -->
                                            <div class="flex-1">
                                                <label for="payment_date"
                                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fecha
                                                    del
                                                    Pago*</label>
                                                <input id="payment_date" name="payment_date" type="date"
                                                    class="mt-4 block w-full text-sm text-gray-900 border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 dark:bg-gray-800 dark:border-gray-600 dark:text-white dark:focus:border-indigo-500">
                                            </div>

                                        </div>
                                        <div class="flex items-center space-x-4 mt-4">
                                            <div class="flex-1">
                                                <label for="payment_method_id"
                                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Seleccionar
                                                    Medio de Pago*</label>
                                                <select id="payment_method_id" name="payment_method_id"
                                                    class="block mt-4 w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">
                                                    <option value="" disabled selected>Seleccione un método de pago
                                                    </option>
                                                    <!-- Agrega opciones dinámicamente aquí -->
                                                    @foreach ($payment_methods as $method)
                                                        <option value="{{ $method->id }}">{{ $method->nombre }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="flex-1">
                                                <label for="operation_code"
                                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Número
                                                    o Código de Operación*</label>
                                                <input type="text" id="operation_code" name="operation_code"
                                                    class="block w-full mt-4 rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                    placeholder="05123456" required />
                                            </div>
                                        </div>

                                    </div>
                                    <div class="flex justify-between mt-4">
                                        <button id="btnBackPago" type="button"
                                            class="w-1/5 rounded-lg bg-gray-600 text-white py-2.5 text-sm">Atrás</button>
                                        <button id="btnFin" type="button" onclick="validarFormulario()"
                                            class="w-1/5 rounded-lg bg-blue-600 text-white py-2.5 text-sm">Finalizar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button id="submitButton" type="submit" style="display: none;"></button>
                    </form>
                </div>

                <!-- Resumen -->
                <div id="resumen" class="lg:w-2/5  lg:ml-auto mt-8 lg:mt-0 flex flex-col">
                    <div class="  rounded-lg dark:border-gray-700 bg-white dark:bg-gray-800">

                        <section class="w-full  lg:mt-0 lg:max-w-xs xl:max-w-md">
                            <div class="mx-auto w-full flex-none lg:max-w-2xl xl:max-w-4xl">
                                <div class="">
                                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white uppercase">Resumen de mi
                                        Pedido</h2>
                                    <div class="relative overflow-hidden max-h-80 h-full  dark:border-gray-700 rounded-lg">
                                        <!-- Resumen de productos con scroll -->
                                        <div class="overflow-y-auto max-h-80 p-4">
                                            @if (!empty($cart))
                                                @foreach ($cart['items'] as $item)
                                                    <div
                                                        class="flex items-center border-b border-gray-900 dark:border-gray-700 py-4">
                                                        <!-- Imagen del producto -->
                                                        <div class="flex-shrink-0 w-20 h-20">
                                                            <img class="w-full h-full object-contain rounded-lg"
                                                                src="{{ $item['imagen'] }}" alt="{{ $item['name'] }}">
                                                        </div>

                                                        <!-- Detalles del producto y precio -->
                                                        <div class="flex-1 ml-4">
                                                            <div class="flex flex-col">
                                                                <!-- Nombre del producto -->
                                                                <div
                                                                    class="text-base font-semibold text-gray-900 dark:text-white">
                                                                    {{ $item['name'] }}
                                                                </div>
                                                                <!-- Código y cantidad -->
                                                                <div class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                                                    Cantidad: {{ $item['quantity'] }}
                                                                </div>
                                                                <!-- Precio -->
                                                                <div
                                                                    class="text-sm font-medium text-gray-900 dark:text-white mt-2">
                                                                    Precio: S/{{ number_format($item['price'], 2) }}
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Subtotal -->
                                                        <div class="flex-shrink-0 w-20 text-center">
                                                            <span
                                                                class="block text-lg font-bold text-gray-900 dark:text-white">
                                                                S/{{ number_format($item['quantity'] * $item['price'], 2) }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="text-center font-bold text-gray-500 dark:text-gray-400 py-4">
                                                    El carrito está vacío
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Totales -->
                            <div class="flow-root">
                                <div class="mt-5 divide-y divide-gray-200 dark:divide-gray-800">
                                    <dl class="flex items-center justify-between gap-4 py-3">
                                        <dt class="text-base font-semibold text-gray-900 dark:text-gray-400">Subtotal</dt>
                                        <dd class="text-base font-medium text-gray-900 dark:text-white">S/
                                            @if (!empty($cart))
                                                {{ number_format($cart['total'], 2) }}
                                            @else
                                                0.00
                                            @endif
                                        </dd>
                                    </dl>

                                    <dl class="flex items-center justify-between gap-4 py-3">
                                        <dt class="text-base font-semibold text-gray-900 dark:text-gray-400">Delivery</dt>
                                        <dd class="text-base font-medium text-gray-900 dark:text-white">S/ 0.00</dd>
                                    </dl>

                                    <dl class="flex items-center justify-between gap-4 py-3">
                                        <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                                        <dd class="text-base font-bold text-gray-900 dark:text-white">
                                            @if (!empty($cart))
                                                {{ number_format($cart['total'], 2) }}
                                            @else
                                                0.00
                                            @endif
                                        </dd>
                                    </dl>
                                </div>
                            </div>

                            <!-- Botón para finalizar compra -->
                            <button id="btnFin" type="button" onclick="validarFormulario()"
                                class="mt-4 w-full rounded-lg bg-blue-600 text-white py-2.5 text-sm">
                                Finalizar Compra
                            </button>
                        </section>
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
        function validarFormulario() {
            const orderNumber = document.getElementById('order_number').value.trim();
            const firstName = document.getElementById('first_name').value.trim();
            const lastName = document.getElementById('last_name').value.trim();
            const email = document.getElementById('email').value.trim();
            const phone = document.getElementById('phone').value.trim();
            const documentType = document.getElementById('document_type').value;
            const documentNumber = document.getElementById('document_number').value.trim();
            const address = document.getElementById('address').value.trim();
            const department = document.getElementById('department').value.trim();
            const province = document.getElementById('province').value.trim();
            const district = document.getElementById('district').value.trim();
            const zone = document.getElementById('zone').value.trim();
            const reference = document.getElementById('reference').value.trim();
            const paymentMethod = document.getElementById('payment_method_id').value;
            const paymentDate = document.getElementById('payment_date').value.trim();
            const operationCode = document.getElementById('operation_code').value.trim();
            const total = document.getElementById('total').value.trim();
            const userId = document.getElementById('user_id').value.trim();
            const detalles = document.getElementById('detalles').value.trim();
            const input = document.getElementById('payment_image');
            let paymentImage = null;

            if (input.files && input.files.length > 0) {
                paymentImage = input.files[0];
            }

            // Verificar si algún campo está vacío o tiene valor 0
            if (
                orderNumber === '' ||
                firstName === '' ||
                lastName === '' ||
                email === '' ||
                phone === '' ||
                documentType === '' ||
                documentNumber === '' ||
                address === '' ||
                department === '' ||
                province === '' ||
                district === '' ||
                paymentMethod === '' ||
                paymentDate === '' ||
                operationCode === '' ||
                total === '' ||
                userId === '' ||
                detalles === '' ||
                paymentImage === null || // Verifica si el archivo es nulo
                isNaN(total) || // Asegúrate de que el total sea un número
                isNaN(userId) // Asegúrate de que el userId sea un número
            ) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Por favor, completa todos los campos antes de continuar.',
                });
                return; // Detener la ejecución si hay errores
            }
            var csrf = document.querySelector('meta[name="csrf-token"]').content;
            const formData = new FormData();
            formData.append('order_number', orderNumber);
            formData.append('first_name', firstName);
            formData.append('last_name', lastName);
            formData.append('email', email);
            formData.append('phone', phone);
            formData.append('document_type', documentType);
            formData.append('document_number', documentNumber);
            formData.append('address', address);
            formData.append('department', department);
            formData.append('province', province);
            formData.append('district', district);
            formData.append('zone', zone);
            formData.append('reference', reference);
            formData.append('payment_method_id', paymentMethod);
            formData.append('payment_date', paymentDate);
            formData.append('operation_code', operationCode);
            formData.append('total', total);
            formData.append('user_id', userId);
            formData.append('detalles', detalles);
            formData.append('_token', csrf);
            if (paymentImage) {
                formData.append('payment_image', paymentImage);
            }

            $.ajax({
                type: 'POST',
                url: '/admin/orders', // Reemplaza esto con la URL de tu controlador y método
                data: formData,
                processData: false, // No procesar datos
                contentType: false, // No establecer tipo de contenido
                success: function(response) {
                    // Verificar si la respuesta contiene el ID de la orden
                    if (response.order_id) {
                        // Redirigir a la página de confirmación de la orden con el ID de la orden
                        window.location.href = `/order/confirmation/${response.order_id}`;
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'No se pudo procesar la orden. Inténtalo de nuevo.',
                        });
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        const response = xhr.responseJSON;
                        if (response && response.errors) {
                            let errorMessage = '';

                            if (Array.isArray(response.errors)) {
                                errorMessage = response.errors.join('\n');
                            } else if (typeof response.errors === 'object') {
                                errorMessage = Object.values(response.errors).join('\n');
                            } else {
                                errorMessage = response.errors.toString();
                            }

                            // Manejar los errores de validación
                            Swal.fire({
                                icon: 'error',
                                title: 'Error de validación',
                                text: errorMessage,
                            });
                        } else {
                            console.error('Respuesta inválida:', response);
                        }
                    } else {
                        console.error('Error en la petición AJAX:', xhr);
                    }
                }
            });
        }
    </script>
    <script>
        $(document).ready(function() {
            const detalles = @json($cart);

            // Convertir el objeto detalles a un string JSON
            const detallesJSON = JSON.stringify(detalles);

            // Asignar el JSON string al valor de un input hidden (ejemplo)
            $('#detalles').val(detallesJSON);
            const tabs = $('.tab-link');
            const forms = $('.form-container1');

            // Función para mostrar un formulario y actualizar la pestaña activa
            function showForm(formId, tabId) {
                forms.addClass('hidden'); // Oculta todos los formularios
                $(`#${formId}`).removeClass('hidden'); // Muestra el formulario seleccionado

                tabs.removeClass('active-tab'); // Quita la clase activa de todas las pestañas
                $(`#${tabId}`).addClass('active-tab'); // Añade la clase activa a la pestaña seleccionada
            }

            // Maneja el clic en una pestaña
            tabs.on('click', function() {
                const targetId = $(this).attr('id').replace('btn', 'form');
                showForm(targetId, $(this).attr('id'));
            });

            // Maneja el clic del botón "Siguiente" en el formulario de Datos
            $('#btnNextDatos').on('click', function() {
                showForm('formEntrega', 'btnEntrega');
            });

            // Maneja el clic del botón "Atrás" en el formulario de Entrega
            $('#btnBackEntrega').on('click', function() {
                showForm('formDatos', 'btnDatos');
            });
            $('#btnBackPago').on('click', function() {
                showForm('formEntrega', 'btnEntrega');
            });

            // Maneja el clic del botón "Siguiente" en el formulario de Entrega
            $('#btnNextEntrega').on('click', function() {
                showForm('formPago', 'btnPago');
            });

            // Inicializa el primer formulario como visible
            showForm('formDatos', 'btnDatos');

            // Maneja el evento de input en el campo de dirección
            $('#addressInput').on('input', function() {
                const value = $(this).val();
                if (value.trim() === '') {
                    $('#map').addClass('hidden');
                } else {
                    $('#map').removeClass('hidden');
                }
            });
        });
    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCF417Ec9Q2I8whl9osMlpPXNJV4HU0rqg&libraries=places&callback=initAutocomplete"
        async defer></script>
    <script>
        let map;
        let marker;

        function initAutocomplete() {
            const input = document.getElementById('address');
            const autocomplete = new google.maps.places.Autocomplete(input, {
                types: ['geocode'],
                componentRestrictions: {
                    country: 'PE'
                } // Limitar la búsqueda a Perú
            });

            autocomplete.addListener('place_changed', function() {
                const place = autocomplete.getPlace();
                if (!place.geometry) {
                    console.error("La dirección no tiene detalles de geolocalización");
                    return;
                }

                const addressComponents = place.address_components;
                updateAddressFields(addressComponents);

                showMap(place.geometry.location);

            });
            // Forzamos al desplegable a estar siempre visible
            input.addEventListener('focus', function() {
                setTimeout(() => {
                    const dropdown = document.querySelector('.pac-container');
                    if (dropdown) {
                        dropdown.style.top = input.getBoundingClientRect().bottom + window.scrollY + 'px';
                        dropdown.style.left = input.getBoundingClientRect().left + 'px';
                    }
                }, 100);
            });
        }

        function updateAddressFields(components) {
            const department = components.find(component => component.types.includes('administrative_area_level_1'))
                ?.long_name || '';
            const province = components.find(component => component.types.includes('administrative_area_level_2'))
                ?.long_name || '';
            const district = components.find(component => component.types.includes('locality'))?.long_name || '';
            const zone = components.find(component => component.types.includes('sublocality'))?.long_name || '';

            document.getElementById('department').value = department;
            document.getElementById('province').value = province;
            document.getElementById('district').value = district;
            document.getElementById('zone').value = zone;
        }

        function showMap(location) {
            const mapDiv = document.getElementById('map');

            // Mostrar el div del mapa si está oculto
            if (mapDiv.classList.contains('hidden')) {
                mapDiv.classList.remove('hidden');
            }
            if (!map) {
                map = new google.maps.Map(document.getElementById('map'), {
                    center: location,
                    zoom: 15
                });
            } else {
                map.setCenter(location);
            }

            if (!marker) {
                marker = new google.maps.Marker({
                    position: location,
                    map: map
                });
            } else {
                marker.setPosition(location);
            }
        }

        window.onload = function() {
            const addressInput = document.getElementById('address');
            addressInput.addEventListener('input', function() {
                const address = this.value.trim();
                if (address === '') {
                    document.getElementById('department').value = '';
                    document.getElementById('province').value = '';
                    document.getElementById('district').value = '';
                    document.getElementById('zone').value = '';
                    document.getElementById('map').innerHTML = ''; // Limpiar el mapa
                    document.getElementById('map').classList.add('hidden');
                    map = null;
                    marker = null;
                }
            });
        };
    </script>
    <script>
        function handlePaymentMethod(id, name, image, instructions) {
            console.log(`Método de pago seleccionado: ${name} (ID: ${id})`);

            // Actualiza el nombre del método de pago
            document.getElementById('payment-name').textContent = name;

            // Actualiza la imagen del método de pago
            const imageElement = document.getElementById('pago-imagen');
            imageElement.src = image;
            imageElement.alt = `Imagen del método de pago ${name}`;

            // Actualiza las instrucciones del método de pago
            // document.getElementById('payment-instructions').textContent = instructions;
            const instructionsElement = document.getElementById('payment-instructions');
            instructionsElement.innerHTML = instructions;

            // Muestra el contenedor de detalles del método de pago
            document.getElementById('payment-details').classList.remove('hidden');
        }
    </script>
@endsection
