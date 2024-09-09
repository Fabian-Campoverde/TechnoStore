@extends('layouts.page')
@section('css')

@endsection
@section('content')
<section class="bg-white py-12">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold mb-6">Novedades</h2>
        <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
            @foreach($novedades as $p)
            <a href="{{ route('view.product', ['id' => $p->id]) }}" 
                class="block rounded-lg border border-gray-200 bg-white p-0 shadow-sm dark:border-gray-700 dark:bg-gray-800 hover:border-blue-500 transition-colors duration-300">
                 <div class="h-48 w-full overflow-hidden">
                     <img class="w-full h-full object-fit rounded-t-lg" src="{{ asset($p->image_url) }}" alt="" />
                 </div>
                 <div class="pt-6 p-6">
                     <div class="flex justify-center items-center">
                         <p class="text-lg uppercase font-bold leading-tight text-gray-900 dark:text-white">
                             {{ $p->nombre }}
                         </p>
                     </div>
                     <p class="text-md font-semibold leading-tight text-gray-900 dark:text-white py-2">
                         Código interno: {{ $p->codigoId }}
                     </p>
                     <div class="mt-0 flex items-center justify-between gap-4">
                         <p class="text-md font-semibold leading-tight text-gray-900 dark:text-white py-2">
                             Precio: S/ {{ $p->precio_venta }}
                         </p>
                     </div>
                     <p class="text-md font-semibold leading-tight text-gray-900 dark:text-white py-2">
                         @if ($p->stock > 10)
                             <span class="text-green-500">Stock disponible >10 unidades</span>
                         @else
                             <span class="text-red-500">Stock limitado :
                                 @if ($p->stock == 1)
                                     1 unidad
                                 @else
                                     {{ $p->stock }} unidades
                                 @endif
                             </span>
                         @endif
                     </p>
                 </div>
             </a>
            @endforeach
        </div>
    </div>
</section>
@endsection

@section('js')
<script>
    window.cartData = @json($cart);
</script>

<!-- Incluir el archivo compilado `cart.js` -->
<script type="text/javascript" src="{{ asset('js/cart.js') }}"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
@endsection