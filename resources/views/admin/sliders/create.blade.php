@extends('admin.index')


@section('header')
    <div class="bg-blue-500 p-4 text-center rounded-lg shadow-lg">
        <h1 class="text-2xl font-semibold text-white uppercase">Sliders</h1>
    </div>
@endsection

@section('css-2')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        span.selection,
        span.select2-selection,
        span.select2-selection__rendered,
        span.select2-selection__arrow {
            height: 40px !important;
            line-height: 27px !important;
        }

        .input-group {
            display: flex;
            align-items: center;
        }

        .input-group-text {
            background-color: #e9ecef;
            border: 1px solid #ced4da;
            padding: 0.375rem 0.75rem;
            border-radius: 0.25rem 0 0 0.25rem;
        }

        input[type="text"] {
            border-radius: 0 0.25rem 0.25rem 0;
            border-left: none;
        }
    </style>
@endsection

@section('container')
    <div class="py-120">
        <!-- component -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('admin.sliders.index') }}"
                class="inline-flex items-center px-4 py-2 
        bg-gray-800 border border-transparent rounded-md font-semibold text-xs 
        text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 
        active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 
        focus:ring-offset-2 transition ease-in-out duration-150 ml-4">
                {{ __('Lista de Sliders') }}
            </a>

        </div>
        <br>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="w-full  md:max-w-full mx-auto">
                    <div class="p-6 border border-gray-300 sm:rounded-md">
                        @if ($slider->id)
                            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white text-center">Actualizacion de
                                slider: {{ $slider->nombre }}</h2>
                        @else
                            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white text-center">Creación de un
                                nuevo slider</h2>
                        @endif

                        <form method="post"
                            @if ($slider->id) action="{{ route('admin.sliders.update', ['slider' => $slider->id]) }}"
        @else
        action="{{ route('admin.sliders.store') }}" @endif
                            enctype="multipart/form-data">
                            @if ($slider->id)
                                {{ method_field('PUT') }}
                            @endif
                            @csrf
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">


                                <div class="w-full">
                                    <label for="titulo"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titulo del
                                        Slider</label>
                                    <input type="text" value="{{ old('titulo', $slider->titulo) }}" name="titulo"
                                        id="titulo"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Ejemplo: Abcdefg">
                                    @error('titulo')
                                        <span class=" text-sm text-red-600" role="alert">
                                            <strong>{{ $message }}</strong>
                                        @enderror
                                </div>
                                <div class="w-full">
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Url del
                                        Slider</label>
                                    <input type="text" value="{{ old('url', $slider->url) }}" name="url"
                                        id="url"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Ejemplo: sliders.index">
                                    @error('url')
                                        <span class=" text-sm text-red-600" role="alert">
                                            <strong>{{ $message }}</strong>
                                        @enderror
                                </div>
                                <div class="sm:col-span-2">
                                    <div class="row">
                                        <div class="col ">
                                            <div class="form-group">
                                                <label class="block mb-6">

                                                    {{-- @if ($product->id)
                                                <img class="w-10 h-10 rounded-full" src="{{asset($product->image_url)}}"/>
                                                @endif --}}
                                                    <label for="name"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Imagen</label>
                                                    <input name="imagen" id="imagen" type="file" accept="image/*"
                                                        onchange="previewImage(event, '#imgPreview')"
                                                        class="
                                  block
                                  w-full
                                  mt-1
                                  focus:border-indigo-300
                                  focus:ring
                                  focus:ring-indigo-200
                                  focus:ring-opacity-50
                                " />

                                                    @error('imagen')
                                                        <span class=" text-sm text-red-600" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        @enderror
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col text-center ">
                                            <div class="form-group" style="margin-top:8px;">
                                                <figure class="figure">
                                                    <div class="text-center" id="updimagepreview">
                                                        <img id="imgPreview" src="//placehold.it/100?text=IMAGEN"
                                                            class="" id="updpreview" width="90px" height="80px">
                                                    </div>
                                                    <figcaption class="figure-caption">Imagen nueva</figcaption>
                                                </figure>
                                            </div>
                                        </div>
                                        @if ($slider->id)
                                            <div class="col text-center ">
                                                <div class="form-group" style="margin-top:8px;">
                                                    <figure class="figure">
                                                        <img src="{{ asset($slider->imagen) }}" height="80px"
                                                            width="90px" class="">
                                                        <figcaption class="figure-caption">Imagen actual</figcaption>
                                                    </figure>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div id="default-carousel" class="relative w-full" data-carousel="slide">
                                <!-- Carousel wrapper -->
                                <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                                    <!-- Item 1 -->
                                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                        <img src="{{ $slider->id ? asset($slider->imagen) :'https://flowbite.com/docs/images/carousel/carousel-1.svg'}}"
                                            class="carousel-img absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                            alt="...">
                                    </div>
                                    <!-- Item 2 -->
                                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                        <img src="{{ $slider->id ? asset($slider->imagen) :'https://flowbite.com/docs/images/carousel/carousel-2.svg'}}"
                                            class="carousel-img absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                            alt="...">
                                    </div>
                                    <!-- Item 3 -->
                                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                        <img src="{{ $slider->id ? asset($slider->imagen) :'https://flowbite.com/docs/images/carousel/carousel-3.svg'}}"
                                            class="carousel-img absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                            alt="...">
                                    </div>
                                </div>
                                <!-- Slider indicators -->
                                <div
                                    class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                                    <button type="button" class="w-3 h-3 rounded-full" aria-current="true"
                                        aria-label="Slide 1" data-carousel-slide-to="0"></button>
                                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false"
                                        aria-label="Slide 2" data-carousel-slide-to="1"></button>
                                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false"
                                        aria-label="Slide 3" data-carousel-slide-to="2"></button>
                                </div>
                                <!-- Slider controls -->
                                <button type="button"
                                    class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                    data-carousel-prev>
                                    <span
                                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M5 1 1 5l4 4" />
                                        </svg>
                                        <span class="sr-only">Previous</span>
                                    </span>
                                </button>
                                <button type="button"
                                    class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                    data-carousel-next>
                                    <span
                                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 9 4-4-4-4" />
                                        </svg>
                                        <span class="sr-only">Next</span>
                                    </span>
                                </button>
                            </div>
                            <br>
                            <div class="text-right">
                                @if ($slider->id)
                                    <label for="btnSubmit"
                                        class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                                        style="cursor: pointer;">
                                        <input id="btnSubmit" type="button"
                                            onclick="validarFormEdit({{ $slider->id }})" class="hidden">
                                        Actualizar
                                        <i class="fas fa-edit ml-2"></i>
                                    </label>
                                @else
                                    <label for="btnSubmit"
                                        class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                                        style="cursor: pointer;">
                                        <input id="btnSubmit" type="button" onclick="validarForm()" class="hidden">
                                        Añadir
                                        <i class="fas fa-plus-circle ml-2"></i>
                                    </label>
                                @endif
                                <button id="submitButton" type="submit" style="display: none;"></button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>

    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
    <script>
        function validarForm() {
            // Obtener los valores de los campos
            const titulo = document.getElementById('titulo').value.trim();
            const url = document.getElementById('url').value.trim();
            const input = document.getElementById('imagen');
            let imagen = ''; // Declarar image_url fuera del if

            if (input.files && input.files.length > 0) {
                imagen = input.files[0];
            }
            // Verificar si algún campo está vacío o tiene valor 0
            if (imagen === '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Por favor, completa todos los campos antes de continuar.',
                    
                });
                // } else {
                //     const submitButton = document.getElementById('submitButton');
                //                 if (submitButton) {
                //                     submitButton.click();
                //                 }

                // }
            } else {
                $.ajax({
                    type: 'POST',
                    url: '/admin/sliders', // Reemplaza esto con la URL de tu controlador y método
                    data: {
                        _token: '{{ csrf_token() }}', // Agrega el token CSRF de Laravel si es necesario
                        titulo: titulo,
                        url: url,


                    },
                    success: function(response) {

                        const submitButton = document.getElementById('submitButton');
                        if (submitButton) {
                            submitButton.click();
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
        }

        function validarFormEdit(id) {
            // Obtener los valores de los campos
            const titulo = document.getElementById('titulo').value.trim();
            const url = document.getElementById('url').value.trim();
            const input = document.getElementById('imagen');
            let imagen = ''; // Declarar image_url fuera del if

            if (input.files && input.files.length > 0) {
                imagen = input.files[0];
            }


            $.ajax({
                type: 'GET',
                url: '/admin/sliders/' + id + '/edit', // Reemplaza esto con la URL de tu controlador y método
                data: {
                    _token: '{{ csrf_token() }}', // Agrega el token CSRF de Laravel si es necesario
                    titulo: titulo,
                    url: url,
                },
                success: function(response) {

                    const submitButton = document.getElementById('submitButton');
                    if (submitButton) {
                        submitButton.click();
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
        function previewImage(event, querySelector) {
        // Recuperamos el input que desencadenó la acción
        const input = event.target;

        // Recuperamos la etiqueta img donde cargaremos la imagen
        const $imgPreview = document.querySelector(querySelector);

        // Verificamos si existe una imagen seleccionada
        if (!input.files.length) return;

        // Recuperamos el archivo subido
        const file = input.files[0];

        // Creamos la URL de la imagen
        const objectURL = URL.createObjectURL(file);

        // Modificamos el atributo src de la etiqueta img para la previsualización
        $imgPreview.src = objectURL;

        // Cambiamos las imágenes del carrusel
        const carouselImages = document.querySelectorAll('.carousel-img');
        carouselImages.forEach(img => {
            img.src = objectURL;
        });
    }
    </script>
    
@endsection
