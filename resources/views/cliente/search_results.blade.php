@extends('layouts.page')
@section('content')
<section class=" bg-blue-200 py-8 antialiased dark:bg-gray-900 md:py-8">
<div class="">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        <h1 class="text-2xl font-bold mb-4">Resultados de búsqueda para: "{{ $name }}"</h1>
        @if($results->isEmpty())
            <p>No se encontraron productos.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($results as $product)
                <a href="{{ route('view.product', ['id' => $product->id]) }}"
                    class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 hover:border-blue-500 transition-colors duration-300 block">
                    <div class="w-full h-full">
                        <img class="w-full h-48 object-contain rounded-t-lg" src="{{ asset($product->image_url) }}"
                            alt="" />
                        <hr class="border-gray-300 dark:border-gray-700">
                        <div class="p-5">
                            <h5
                                class="uppercase mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $product->nombre }}
                            </h5>
                            <span
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Ver más
                                <svg class="w-3.5 h-3.5 ml-2 relative top-0.5" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </span>
                        </div>
                    </div>
                </a>
                    
                @endforeach
            </div>
        @endif
    </div>
</div>
</section>
@endsection

@section('js')
    <script>
        window.cartData = @json($cart);
    </script>

    <!-- Incluir el archivo compilado `cart.js` -->
    <script type="text/javascript" src="js/cart.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
@endsection