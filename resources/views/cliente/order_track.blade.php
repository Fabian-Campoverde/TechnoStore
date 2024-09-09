@extends('layouts.page')
@section('css')
    
    
@endsection
@section('content')
    <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Seguimiento de pedido de #
                {{ $order->order_number }}</h2>

            <div class="mt-6 sm:mt-8 lg:flex lg:gap-8">
                <div
                    class="w-full divide-y divide-gray-200 overflow-hidden rounded-lg border border-gray-200 dark:divide-gray-700 dark:border-gray-700 lg:max-w-xl xl:max-w-2xl">
                    @foreach ($detalles as $item)
                        <div class="space-y-4 p-6">
                            <div class="flex items-center gap-6">
                                <a href="#" class="h-14 w-14 shrink-0">
                                    <img class="h-full w-full dark:hidden"
                                        src="{{ asset($item->product->image_url) }}"
                                        alt="imac image" />

                                </a>

                                <a href="{{ route('view.product', ['id' => $item->product->id]) }}" 
                                    class="min-w-0 flex-1 font-medium text-gray-900 hover:underline dark:text-white">
                                    {{ $item->product->nombre }} </a>
                            </div>

                            <div class="flex items-center justify-between gap-4">
                                <p class="text-sm font-normal text-gray-500 dark:text-gray-400"><span
                                        class="font-medium text-gray-900 dark:text-white">Product ID:</span>
                                    {{ $item->product->codigoId }}</p>

                                <div class="flex items-center justify-end gap-4">
                                    <p class="text-base font-normal text-gray-900 dark:text-white">x{{ $item->quantity }}
                                    </p>

                                    <p class="text-xl font-bold leading-tight text-gray-900 dark:text-white">S/
                                        {{ number_format($item->price, 2) }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach




                    <div class="space-y-4 bg-gray-50 p-6 dark:bg-gray-800">


                        <dl
                            class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                            <dt class="text-lg font-bold text-gray-900 dark:text-white">Total</dt>
                            <dd class="text-lg font-bold text-gray-900 dark:text-white">
                                {{ number_format($order->total, 2) }}</dd>
                        </dl>
                    </div>
                </div>
                <div class="mt-6 grow sm:mt-8 lg:mt-0">
                    <div class="space-y-6 rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                      <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Historial de pedidos</h3>
                  
                      <ol class="relative ms-3 border-s border-gray-200 dark:border-gray-700">
                        <!-- Pedido Enviado -->
                        @if ($order->shipped_at)
                          <li class="mb-10 ms-6 text-blue-700 dark:text-blue-500">
                            <span class="absolute -start-3 flex h-6 w-6 items-center justify-center rounded-full bg-blue-100 ring-8 ring-white dark:bg-blue-900 dark:ring-gray-800">
                              <svg class="h-4 w-4 text-blue-700 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 12l8-8 8 8M6 10.5V19a1 1 0 0 0 1 1h3v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h3a1 1 0 0 0 1-1v-8.5"/>
                              </svg>
                            </span>
                            <h4 class="mb-0.5 text-base font-semibold text-gray-900 dark:text-white">Pedido enviado</h4>
                            <p class="text-sm font-normal text-gray-500 dark:text-gray-400">En camino hacia el destino</p>
                            <p class="text-sm text-gray-400 dark:text-gray-500">Fecha: {{ \Carbon\Carbon::parse($order->shipped_at)->setTimezone('America/Lima')->format('d M Y, H:i') }}</p>
                          </li>
                        @endif
                  
                        <!-- Pedido Aprobado -->
                        @if ($order->approved_at)
                          <li class="mb-10 ms-6 text-green-600 dark:text-green-400">
                            <span class="absolute -start-3 flex h-6 w-6 items-center justify-center rounded-full bg-green-100 ring-8 ring-white dark:bg-green-800 dark:ring-gray-800">
                              <svg class="h-4 w-4 text-green-600 dark:text-green-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917L9.724 16.5 19 7.5"/>
                              </svg>
                            </span>
                            <h4 class="mb-0.5 text-base font-semibold text-gray-900 dark:text-white">Pedido aprobado</h4>
                            
                            <p class="text-sm text-gray-400 dark:text-gray-500">Fecha: {{ \Carbon\Carbon::parse($order->approved_at)->setTimezone('America/Lima')->format('d M Y, H:i') }}</p>
                          </li>
                        @endif
                  
                        <!-- Pedido Pendiente -->
                        @if ($order->created_at)
                          <li class="mb-10 ms-6 text-yellow-600 dark:text-yellow-400">
                            <span class="absolute -start-3 flex h-6 w-6 items-center justify-center rounded-full bg-yellow-100 ring-8 ring-white dark:bg-yellow-800 dark:ring-gray-800">
                              <svg class="h-4 w-4 text-yellow-600 dark:text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 12l8-8 8 8M6 10.5V19a1 1 0 0 0 1 1h3v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h3a1 1 0 0 0 1-1v-8.5"/>
                              </svg>
                            </span>
                            <h4 class="mb-0.5 text-base font-semibold text-gray-900 dark:text-white">Pedido creado</h4>
                            
                            @if ($order->created_at)
                              <p class="text-sm text-gray-400 dark:text-gray-500">Fecha: {{ \Carbon\Carbon::parse($order->created_at)->format('d M Y, H:i') }}</p>
                            @else
                              <p class="text-sm text-gray-400 dark:text-gray-500">Fecha: No disponible</p>
                            @endif
                          </li>
                        @endif
                  
                        <!-- Pedido Cancelado -->
                        @if ($order->canceled_at)
                          <li class="mb-10 ms-6 text-red-600 dark:text-red-400">
                            <span class="absolute -start-3 flex h-6 w-6 items-center justify-center rounded-full bg-red-100 ring-8 ring-white dark:bg-red-800 dark:ring-gray-800">
                              <svg class="h-4 w-4 text-red-600 dark:text-red-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 12l8-8 8 8M6 10.5V19a1 1 0 0 0 1 1h3v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h3a1 1 0 0 0 1-1v-8.5"/>
                              </svg>
                            </span>
                            <h4 class="mb-0.5 text-base font-semibold text-gray-900 dark:text-white">Pedido cancelado</h4>
                            <p class="text-sm font-normal text-gray-500 dark:text-gray-400">La orden ha sido cancelada</p>
                            <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Motivo: {{$order->cancellation_reason}}</p>
                            @if ($order->canceled_at)
                              <p class="text-sm text-gray-400 dark:text-gray-500">Fecha: {{ \Carbon\Carbon::parse($order->canceled_at)->setTimezone('America/Lima')->format('d M Y, H:i') }}</p>
                            @else
                              <p class="text-sm text-gray-400 dark:text-gray-500">Fecha: No disponible</p>
                            @endif
                          </li>
                        @endif
                      </ol>
                  
                      <div class="gap-4 sm:flex sm:items-center">
                        
                  
                        <a href="{{ route('user.orders') }}" class="mt-4 flex w-full items-center justify-center rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:mt-0">
                            Ver mis pedidos
                        </a>
                      </div>
                    </div>
                  </div>
                  




            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <script>
        window.cartData = @json($cart);
    </script>

    <!-- Incluir el archivo compilado `cart.js` -->
    <script type="text/javascript" src="{{ asset('js/cart.js') }}"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
@endsection
