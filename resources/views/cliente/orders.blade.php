@extends('layouts.page')
@section('css')
{{-- 

<!-- CSS de DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.tailwindcss.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.tailwindcss.min.css"> --}}

@endsection
@section('content')
<section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-10">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        <div class="mx-0 ">
            <div class="gap-4 sm:flex sm:items-center sm:justify-between">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Mis órdenes</h2>

                {{-- <div class="mt-6 gap-4 space-y-4 sm:mt-0 sm:flex sm:items-center sm:justify-end sm:space-y-0">
                    <div>
                        <label for="order-type" class="sr-only mb-2 block text-sm font-medium text-gray-900 dark:text-white">Seleccionar tipo de orden</label>
                        <select id="order-type" name="order-type"
                            class="block w-full min-w-[8rem] rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">
                            <option value="all" {{ request('order-type') == 'all' ? 'selected' : '' }}>Todas las órdenes</option>
                            <option value="Pendiente" {{ request('order-type') == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                            <option value="Enviado" {{ request('order-type') == 'Enviado' ? 'selected' : '' }}>Enviado</option>
                            <option value="Aprobado" {{ request('order-type') == 'Aprobado' ? 'selected' : '' }}>Aprobado</option>
                            <option value="Cancelado" {{ request('order-type') == 'Cancelado' ? 'selected' : '' }}>Cancelada</option>
                        </select>
                    </div>

                    <span class="inline-block text-gray-500 dark:text-gray-400">desde</span>

                    <div>
                        <label for="duration" class="sr-only mb-2 block text-sm font-medium text-gray-900 dark:text-white">Seleccionar duración</label>
                        <select id="duration" name="duration"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">
                            <option value="this week" {{ request('duration') == 'this week' ? 'selected' : '' }}>esta semana</option>
                            <option value="this month" {{ request('duration') == 'this month' ? 'selected' : '' }}>este mes</option>
                            <option value="last 3 months" {{ request('duration') == 'last 3 months' ? 'selected' : '' }}>los últimos 3 meses</option>
                            <option value="last 6 months" {{ request('duration') == 'last 6 months' ? 'selected' : '' }}>los últimos 6 meses</option>
                            <option value="this year" {{ request('duration') == 'this year' ? 'selected' : '' }}>este año</option>
                        </select>
                    </div>
                </div> --}}
            </div>

            <div class="mt-6 flow-root sm:mt-8">
                <div class="overflow-x-auto" id="orders-table">
                    <table id="example" class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 px-6 text-center">ID de orden</th>
                                <th scope="col" class="py-3 px-6 text-center">Fecha de orden</th>
                                <th scope="col" class="py-3 px-6 text-center">Precio</th>
                                <th scope="col" class="py-3 px-6 text-center">Estado</th>
                                <th scope="col" class="py-3 px-6 text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <td class="py-4 px-6 text-center font-medium text-gray-900 dark:text-white">
                                    <a href="#" class="hover:underline">{{ $order->order_number }}</a>
                                </td>
                                <td class="py-4 px-6 text-center">
                                    {{ $order->created_at->format('d/m/Y') }}
                                </td>
                                <td class="py-4 px-6 text-center">
                                    S/ {{ number_format($order->total, 2) }}
                                </td>
                                <td class="py-4 px-6 text-center">
                                    @php
                                    // Determina la clase de fondo y el ícono según el estado de la orden
                                    $bgColorClass = match ($order->status) {
                                        'Aprobado' => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300',
                                        'Cancelado' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300',
                                        'Pendiente' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300',
                                        'Enviado' => 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300',
                                        default => 'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-300',
                                    };
                                    
                                    $iconSvg = match ($order->status) {
                                        'Aprobado' => '<svg class="me-1 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5" /></svg>',
                                        'Cancelado' => '<svg class="me-1 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" /></svg>',
                                        'Pendiente' => '<svg class="me-1 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.5 4h-13m13 16h-13M8 20v-3.333a2 2 0 0 1 .4-1.2L10 12.6a1 1 0 0 0 0-1.2L8.4 8.533a2 2 0 0 1-.4-1.2V4h8v3.333a2 2 0 0 1-.4 1.2L13.957 11.4a1 1 0 0 0 0 1.2l1.643 2.867a2 2 0 0 1 .4 1.2V20H8Z" /></svg>',
                                        'Enviado' => '<svg class="me-1 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h6l2 4m-8-4v8m0-8V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v9h2m8 0H9m4 0h2m4 0h2v-4m0 0h-5m3.5 5.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm-10 0a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" /></svg>',
                                        default => '',
                                    };
                                    
                                    $buttonText = match ($order->status) {
                                        'Aprobado' => 'Detalles',
                                        'Cancelado' => 'Reintentar',
                                        'Pendiente' => 'Detalles',
                                        'Enviado' => 'Rastrear',
                                        default => '',
                                    };
                                
                                    $buttonLink = match ($order->status) {
                                        // 'Aprobado' => route('orders.show', $order->id),
                                        // 'Cancelado' => route('orders.retry', $order->id),
                                        // 'Pendiente' => route('orders.review', $order->id),
                                        // 'Enviado' => route('orders.track', $order->id),
                                        default => '#',
                                    };
                                
                                    $buttonClass = match ($order->status) {
                                        'Aprobado' => 'bg-green-500 hover:bg-green-600 text-white',
                                        'Cancelado' => 'bg-red-500 hover:bg-red-600 text-white',
                                        'Pendiente' => 'bg-yellow-500 hover:bg-yellow-600 text-white',
                                        'Enviado' => 'bg-blue-500 hover:bg-blue-600 text-white',
                                        default => 'bg-gray-500 hover:bg-gray-600 text-white',
                                    };
                                    @endphp
                                
                                    <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-medium {{ $bgColorClass }}" role="status" aria-label="{{ $order->status }}">
                                        {!! $iconSvg !!}
                                        {{ $order->status }}
                                    </span>
                                
                                    
                                </td>
                                <td>
                                    
                                    <a href="{{ $buttonLink }}" class="w-full rounded-lg  px-3 py-2 text-sm font-medium  {{ $buttonClass }}   focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 lg:w-auto">
                                        {{ $buttonText }}
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $orders->links() }}
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
  
<!-- jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

{{-- <!-- DataTables -->
<script src="https://cdn.datatables.net/2.1.4/js/dataTables.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.1.4/js/dataTables.dataTables.min.mjs"></script>
<script src="https://cdn.datatables.net/2.1.4/js/dataTables.foundation.mjs"></script>

    <script src="https://cdn.datatables.net/2.1.4/js/dataTables.js"></script> --}}
    
<!-- Incluir el archivo compilado `cart.js` -->
    <script type="text/javascript" src="js/cart.js"></script>
    {{-- <script>
         $(document).ready(function() {
        //     var table = $('#example').DataTable( {
        //     "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        // } );
        //     });
        new DataTable('#example',{
            responsive: true,
            language: {
                        url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
                        decimal: ',',
                        thousands: '.'
                    },
                   
                    lengthMenu: [
                        [10, 25, 50, -1],
                        [10, 25, 50, "Mostrar Todo"]
                    ],
                    

        });
    });
    </script> --}}
@endsection
