@extends('layouts.page')
@section('content')
<div class="categorias" id="products-section">
    <section class="bg-blue-200 py-8 antialiased dark:bg-gray-900 md:py-16">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <div class="mb-4 flex items-center justify-between gap-4 md:mb-8">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Nuestras marcas</h2>
                <p class="mt-3 text-sm font-normal text-gray-900 dark:text-white sm:text-lg">Mostrando {{$brands2->count()}} marcas</p>
                
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 justify-items-center">
                @foreach ($brands2 as $b)
                    <div
                        class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 hover:border-blue-500 transition-colors duration-300">
                        <a href="{{ route('brand.products', ['id' => $b->id]) }}">
                            <img class="w-full h-48 object-contain rounded-t-lg" src="{{ asset($b->imagen) }}"
                                alt="" />
                        </a>
                        <hr class="border-gray-300 dark:border-gray-700">
                        <div class="p-5">
                            <a href="{{ route('brand.products', ['id' => $b->id]) }}">
                                <h5
                                    class="uppercase mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $b->nombre }}</h5>
                            </a>
                            <a href="{{ route('brand.products', ['id' => $b->id]) }}"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Ver más
                                <svg class="w-3.5 h-3.5 ml-2 relative top-0.5" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>


        </div>

    </section>

</div>

@endsection

@section('js')
<script>
    window.cartData = @json($cart);
</script>

<!-- Incluir el archivo compilado `cart.js` -->
<script type="text/javascript" src="js/cart.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
@endsection