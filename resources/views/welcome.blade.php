@extends('layouts.page')
@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
@endsection
@section('content')
    <div class="sliders bg-blue-200">
        <div class="max-w-8xl mx-auto py-4 px-0">

            <div class="overflow-hidden  sm:rounded-lg">

                <div class="w-full  md:max-w-full mx-auto">
                    <div class=" sm:rounded-md">
                        <div class=" grid-cols-4 sm:grid-cols-2 gap-4">
                            <div id="default-carousel" class="relative w-full h-full" data-carousel="slide">
                                <!-- Carousel wrapper -->
                                <div class="relative h-24 overflow-hidden rounded-lg md:h-96">
                                    <!-- Items -->
                                    @foreach ($sliders as $slider)
                                        <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                                            <img src="{{ $slider->id ? asset($slider->imagen) : 'https://flowbite.com/docs/images/carousel/carousel-2.svg' }}"
                                                class="carousel-img absolute h-full block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                                alt="{{ $slider->titulo }}">
                                        </div>
                                    @endforeach

                                </div>
                                <!-- Slider indicators -->
                                <div
                                    class="absolute z-30 flex -translate-x-1/2 bottom-2 sm:bottom-2 md:bottom-2 lg:bottom-4   left-1/2 space-x-5 rtl:space-x-reverse ">
                                    @foreach ($sliders as $index => $slider)
                                        <button type="button" class="w-3 h-3 rounded-full bg-black" aria-current="true"
                                            aria-label="Slide {{ $index + 1 }}"
                                            data-carousel-slide-to="{{ $index }}"></button>
                                    @endforeach
                                </div>
                                <!-- Slider controls -->
                                <button type="button"
                                    class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                    data-carousel-prev>
                                    <span
                                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M5 1 1 5l4 4" />
                                        </svg>
                                        <span class="sr-only">Previous</span>
                                    </span>
                                </button>
                                <button type="button"
                                    class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                    data-carousel-next>
                                    <span
                                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 9 4-4-4-4" />
                                        </svg>
                                        <span class="sr-only">Next</span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Input de búsqueda -->
    <div class="bg-blue-200 py-6">
        <div class="max-w-4xl mx-auto px-4">
            <form class="relative flex items-center max-w-3xl mx-auto" action="" method="GET"
                onsubmit="handleSearch(event)">
                <!-- Icono de búsqueda -->
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-4.35-4.35m1.7-2.66A7.5 7.5 0 1113.5 5a7.5 7.5 0 014.85 8.5z" />
                    </svg>
                </div>
                <!-- Input de búsqueda -->
                <input type="search" id="search" name="search" placeholder="Buscar productos..."
                    class="block w-full pl-10 pr-4 py-3 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white placeholder-gray-500 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required />
                <!-- Botón de búsqueda -->
                <button type="submit"
                    class="absolute right-0 top-0 mt-2 mr-2 bg-blue-700 text-white hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">
                    <svg class="w-4 h-4 text-white dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </button>
            </form>
        </div>
    </div>

    <div class="categorias" id="products-section">
        <section class="bg-blue-200 py-8 antialiased dark:bg-gray-900 md:py-16">
            <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
                <div class="mb-4 flex items-center justify-between gap-4 md:mb-8">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Encuentre su producto ideal
                    </h2>

                    <a href="{{ route('categories') }}" title=""
                        class="flex items-center text-base font-medium text-primary-700 hover:underline dark:text-primary-500">
                        Ver más categorias
                        <svg class="ms-1 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 12H5m14 0-4 4m4-4-4-4" />
                        </svg>
                    </a>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 justify-items-center">
                    @foreach ($categories as $c)
                        <a href="{{ route('category.products', ['id' => $c->id]) }}"
                            class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 hover:border-blue-500 transition-colors duration-300 block overflow-hidden">
                            <div class="w-full h-64 bg-center bg-no-repeat relative flex flex-col justify-end"
                                style="background-image: url('{{ asset($c->imagen) }}'); background-size: contain;">
                                <div class="bg-gradient-to-t from-gray-900 to-transparent absolute inset-0"></div>
                                <div class="p-5 relative z-10">
                                    <h5 class="uppercase mb-2 text-2xl font-bold tracking-tight text-white">
                                        {{ $c->nombre }}
                                    </h5>
                                    <span
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Ver productos
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


            </div>

        </section>

    </div>

    <div class="marcas">
        <section class="bg-blue-200 py-8 antialiased dark:bg-gray-900 md:py-16">
            <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
                <div class="mb-4 flex items-center justify-between gap-4 md:mb-8">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Nuestras marcas</h2>

                    <a href="{{ route('brands') }}" title=""
                        class="flex items-center text-base font-medium text-primary-700 hover:underline dark:text-primary-500">
                        Ver más marcas
                        <svg class="ms-1 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 12H5m14 0-4 4m4-4-4-4" />
                        </svg>
                    </a>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 justify-items-center">
                    @foreach ($brands as $b)
                        <a href="{{ route('brand.products', ['id' => $b->id]) }}"
                            class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 hover:border-blue-500 transition-colors duration-300 block">
                            <div class="w-full h-full">
                                <img class="w-full h-48 object-contain rounded-t-lg" src="{{ asset($b->imagen) }}"
                                    alt="" />
                                <hr class="border-gray-300 dark:border-gray-700">
                                <div class="p-5">
                                    <h5
                                        class="uppercase mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        {{ $b->nombre }}
                                    </h5>
                                    <span
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Ver productos
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


            </div>

        </section>

    </div>
    <div class="videos">
        <section class="bg-blue-200 py-8 antialiased dark:bg-gray-900 md:py-16">
            <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
                <div class="mb-4 flex items-center justify-between gap-4 md:mb-4">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Explora Nuestros Videos
                    </h2>
                </div>
                <p class="text-left text-gray-600 mb-12">Conoce más sobre nuestros productos y sus funciones a través de
                    estos videos informativos.</p>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 justify-items-center">
                    @foreach ($videos as $video)
                        <div
                            class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 hover:border-blue-500 transition-colors duration-300 block">
                            <div class="w-full h-64 relative">
                                <iframe class="absolute inset-0 w-full h-full rounded-t-lg"
                                    src="https://www.youtube.com/embed/{{ $video->video_id }}" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            </div>
                            <hr class="border-gray-300 dark:border-gray-700">
                            <div class="p-6">
                                <h5 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white mb-4">
                                    {{ $video->titulo }}</h5>

                                <a href="{{ $video->url }}"
                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Ver video
                                    <svg class="w-4 h-4 ml-2 relative top-0.5" aria-hidden="true"
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



    <section class=" bg-blue-200 dark: bg-blue-200">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-md sm:text-center">
                <h2 class="mb-4 text-3xl tracking-tight font-extrabold text-gray-900 sm:text-4xl dark:text-white">
                    Suscríbete a nuestro boletín</h2>
                <p class="mx-auto mb-8 max-w-2xl font-light text-gray-500 md:mb-12 sm:text-xl dark:text-gray-400">Mantente
                    al día con la actualización de nuevos productos, anuncios y descuentos exclusivos, no dudes en
                    registrarte con tu correo electrónico.</p>
                <form action="#">
                    <div class="items-center mx-auto mb-3 space-y-4 max-w-screen-sm sm:flex sm:space-y-0">
                        <div class="relative w-full">
                            <label for="email"
                                class="hidden mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email
                                address</label>
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                </svg>
                            </div>
                            <input
                                class="block p-3 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:rounded-none sm:rounded-l-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-primary-500"
                                placeholder="Ingresa tu correo electrónico" type="email" id="email"
                                required="">
                        </div>
                        <div>
                            <button type="submit"
                                class="py-3 px-5 w-full text-sm font-medium text-center text-white rounded-lg border cursor-pointer bg-blue-700 border-blue-600 sm:rounded-none sm:rounded-r-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Suscribirse</button>
                        </div>
                    </div>
                    <div
                        class="mx-auto max-w-screen-sm text-sm text-center text-gray-500 newsletter-form-footer dark:text-gray-300">
                        Nos preocupamos por la protección de sus datos. <a href="{{ route('politica') }}"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lea nuestra Política de
                            Privacidad.</a></div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    @if (session('status'))
        <script>
            Toastify({
                text: '{{ session('message') }}', // Mensaje del toast desde la sesión
                duration: 1500, // Duración del toast en milisegundos (en este caso, 1.5 segundos)
                close: false, // Mostrar botón de cierre
                gravity: 'top', // Posición del toast 
                position: 'right', // Alineación del toast 
                offset: {
                    x: 10, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
                    y: 50 // vertical axis - can be a number or a string indicating unity. eg: '2em'
                },
                backgroundColor: '#{{ session('color') }}', // Color de fondo del toast
            }).showToast();
        </script>
    @endif
    <script>
        window.cartData = @json($cart);
    </script>

    <script>
        function handleSearch(event) {
            event.preventDefault();
            const query = document.getElementById('search').value;
            if (query) {
                window.location.href = `{{ url('/search/results') }}/${encodeURIComponent(query)}`;
            }
        }
    </script>
    <!-- Incluir el archivo compilado `cart.js` -->
    <script type="text/javascript" src="js/cart.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
@endsection
