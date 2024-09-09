@extends('layouts.page')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection
@section('content')
<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
        <h2 class="mb-8 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Preguntas Frecuentes</h2>
        @foreach ($faqs as $f)
        <div id="faq-accordion" data-accordion="collapse">
            <!-- Pregunta 1 -->
            <h2 id="faq-heading-{{$f->id}}">
                <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 bg-gray-100 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700" data-accordion-target="#faq-body-{{$f->id}}" aria-expanded="false" aria-controls="faq-body-{{$f->id}}">
                    <h3 class="flex items-center mb-4 text-lg font-medium text-gray-900 dark:text-white">
                        <svg class="flex-shrink-0 mr-2 w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg>
                        {{$f->pregunta}}
                    </h3>
                    <i class="fas fa-chevron-down w-6 h-6 shrink-0"></i>
                </button>
            </h2>
            <div id="faq-body-{{$f->id}}" class="hidden" aria-labelledby="faq-heading-{{$f->id}}">
                <div class="p-5 font-light border border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                    {{$f->respuesta}}
                </div>
            </div>
        </div>

        
        @endforeach
        
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