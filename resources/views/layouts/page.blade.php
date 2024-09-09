<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <title>TechnoStore Nexus</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.0/tailwind.min.css"
        integrity="sha512-wOgO+8E/LgrYRSPtvpNg8fY7vjzlqdsVZ34wYdGtpj/OyVdiw5ustbFnMuCb75X9YdHHsV5vY3eQq3wCE4s5+g=="
        crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        /* Estilos globales aplicados en todas las pantallas */
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        /* Estilos específicos para pantallas móviles */
        @media only screen and (max-width: 767px) {

            html,
            body {
                overflow-x: hidden;
                /* Evita el scroll horizontal solo en pantallas móviles */
            }
        }

        body {
            padding-top: 130px;
        }

        #scrollToTopBtn {
            display: none;
            /* Ocultar el botón al inicio */
            transition: opacity 0.3s ease;
            /* Transición suave para la visibilidad */
        }

        #scrollToTopBtn.show {
            display: block;
            /* Mostrar el botón cuando sea necesario */
        }



        .menu-link {
            text-decoration: none;
            position: relative;
            padding-bottom: 2px;
        }

        .menu-link::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 0;
            height: 2px;
            background-color: #007bff;
            /* Color del subrayado */
            transition: width 0.1s ease-in-out;
            /* Transición suave */
        }

        .menu-link:hover::after {
            width: 100%;
            /* Ancho del subrayado al hacer hover */
        }



        .footer-nav ul {
            display: flex;
            justify-content: space-around;
            /* Distribuye los elementos uniformemente */
            width: 100%;
            padding: 0;
            margin: 0;
        }

        .footer-nav li {
            list-style: none;
            /* Quita los puntos de la lista */
        }

        .footer-nav a {
            display: block;
            text-align: center;
            padding: 1rem;
            /* Espacio alrededor del texto */
            color: #344357;
            /* Color del texto */
            text-decoration: none;
            font-size: 1rem;
        }

        .footer-nav a:hover {
            /* background-color: #e5e7eb; */
            /* Color de fondo al hacer hover */
            color: #2b66b8;
            /* Color del texto al hacer hover */
        }

        /* Opcional: estilos para pantallas pequeñas */


        /* Padding para pantallas medianas */
    </style>

    @yield('css')
    <!-- Styles -->
    {{-- <style>
            /* ! tailwinjdcss v3.2.4 | MIT License | https://tailwindcss.com */*,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}::after,::before{--tw-content:''}html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:Figtree, sans-serif;font-feature-settings:normal}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,pre,samp{font-family:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-size:100%;font-weight:inherit;line-height:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}[type=button],[type=reset],[type=submit],button{-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}menu,ol,ul{list-style:none;margin:0;padding:0}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}[role=button],button{cursor:pointer}:disabled{cursor:default}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]{display:none}*, ::before, ::after{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::-webkit-backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }.relative{position:relative}.mx-auto{margin-left:auto;margin-right:auto}.mx-6{margin-left:1.5rem;margin-right:1.5rem}.ml-4{margin-left:1rem}.mt-16{margin-top:4rem}.mt-6{margin-top:1.5rem}.mt-4{margin-top:1rem}.-mt-px{margin-top:-1px}.mr-1{margin-right:0.25rem}.flex{display:flex}.inline-flex{display:inline-flex}.grid{display:grid}.h-16{height:4rem}.h-7{height:1.75rem}.h-6{height:1.5rem}.h-5{height:1.25rem}.min-h-screen{min-height:100vh}.w-auto{width:auto}.w-16{width:4rem}.w-7{width:1.75rem}.w-6{width:1.5rem}.w-5{width:1.25rem}.max-w-7xl{max-width:80rem}.shrink-0{flex-shrink:0}.scale-100{--tw-scale-x:1;--tw-scale-y:1;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.grid-cols-1{grid-template-columns:repeat(1, minmax(0, 1fr))}.items-center{align-items:center}.justify-center{justify-content:center}.gap-6{gap:1.5rem}.gap-4{gap:1rem}.self-center{align-self:center}.rounded-lg{border-radius:0.5rem}.rounded-full{border-radius:9999px}.bg-gray-100{--tw-bg-opacity:1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.bg-white{--tw-bg-opacity:1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-red-50{--tw-bg-opacity:1;background-color:rgb(254 242 242 / var(--tw-bg-opacity))}.bg-dots-darker{background-image:url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E")}.from-gray-700\/50{--tw-gradient-from:rgb(55 65 81 / 0.5);--tw-gradient-to:rgb(55 65 81 / 0);--tw-gradient-stops:var(--tw-gradient-from), var(--tw-gradient-to)}.via-transparent{--tw-gradient-to:rgb(0 0 0 / 0);--tw-gradient-stops:var(--tw-gradient-from), transparent, var(--tw-gradient-to)}.bg-center{background-position:center}.stroke-red-500{stroke:#ef4444}.stroke-gray-400{stroke:#9ca3af}.p-6{padding:1.5rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.text-center{text-align:center}.text-right{text-align:right}.text-xl{font-size:1.25rem;line-height:1.75rem}.text-sm{font-size:0.875rem;line-height:1.25rem}.font-semibold{font-weight:600}.leading-relaxed{line-height:1.625}.text-gray-600{--tw-text-opacity:1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity:1;color:rgb(17 24 39 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity:1;color:rgb(107 114 128 / var(--tw-text-opacity))}.underline{-webkit-text-decoration-line:underline;text-decoration-line:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.shadow-2xl{--tw-shadow:0 25px 50px -12px rgb(0 0 0 / 0.25);--tw-shadow-colored:0 25px 50px -12px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.shadow-gray-500\/20{--tw-shadow-color:rgb(107 114 128 / 0.2);--tw-shadow:var(--tw-shadow-colored)}.transition-all{transition-property:all;transition-timing-function:cubic-bezier(0.4, 0, 0.2, 1);transition-duration:150ms}.selection\:bg-red-500 *::selection{--tw-bg-opacity:1;background-color:rgb(239 68 68 / var(--tw-bg-opacity))}.selection\:text-white *::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.selection\:bg-red-500::selection{--tw-bg-opacity:1;background-color:rgb(239 68 68 / var(--tw-bg-opacity))}.selection\:text-white::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.hover\:text-gray-900:hover{--tw-text-opacity:1;color:rgb(17 24 39 / var(--tw-text-opacity))}.hover\:text-gray-700:hover{--tw-text-opacity:1;color:rgb(55 65 81 / var(--tw-text-opacity))}.focus\:rounded-sm:focus{border-radius:0.125rem}.focus\:outline:focus{outline-style:solid}.focus\:outline-2:focus{outline-width:2px}.focus\:outline-red-500:focus{outline-color:#ef4444}.group:hover .group-hover\:stroke-gray-600{stroke:#4b5563}.z-10{z-index: 10}@media (prefers-reduced-motion: no-preference){.motion-safe\:hover\:scale-\[1\.01\]:hover{--tw-scale-x:1.01;--tw-scale-y:1.01;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}}@media (prefers-color-scheme: dark){.dark\:bg-gray-900{--tw-bg-opacity:1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:bg-gray-800\/50{background-color:rgb(31 41 55 / 0.5)}.dark\:bg-red-800\/20{background-color:rgb(153 27 27 / 0.2)}.dark\:bg-dots-lighter{background-image:url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E")}.dark\:bg-gradient-to-bl{background-image:linear-gradient(to bottom left, var(--tw-gradient-stops))}.dark\:stroke-gray-600{stroke:#4b5563}.dark\:text-gray-400{--tw-text-opacity:1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:shadow-none{--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.dark\:ring-1{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.dark\:ring-inset{--tw-ring-inset:inset}.dark\:ring-white\/5{--tw-ring-color:rgb(255 255 255 / 0.05)}.dark\:hover\:text-white:hover{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.group:hover .dark\:group-hover\:stroke-gray-400{stroke:#9ca3af}}@media (min-width: 640px){.sm\:fixed{position:fixed}.sm\:top-0{top:0px}.sm\:right-0{right:0px}.sm\:ml-0{margin-left:0px}.sm\:flex{display:flex}.sm\:items-center{align-items:center}.sm\:justify-center{justify-content:center}.sm\:justify-between{justify-content:space-between}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width: 768px){.md\:grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}}@media (min-width: 1024px){.lg\:gap-8{gap:2rem}.lg\:p-8{padding:2rem}}
        </style> --}}

</head>

<body class="antialiased min-h-screen flex flex-col">

    <header class="fixed top-0 left-0 w-full bg-blue-300 border-gray-900 px-4 lg:px-6 py-2.5 dark:bg-blue-800 z-50">
        <nav class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
            <a href="{{ url('/') }}" class="flex items-center">
                <img src="{{ asset('logo.png') }}" class="mr-3 h-10 sm:h-9" alt="Logo" />
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">TechnoStore
                    Nexus</span>
            </a>
            <div class="flex items-center lg:order-2">
                @if (Route::has('login'))
                    @auth
                        @can('admin.home')
                            <a
                                href="{{ route('admin.home') }}"class="hidden xl:inline-block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 focus:outline-none focus:ring-blue-800">
                                Dashboard
                            </a>
                        @endcan
                        <div class="hidden xl:flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                            <button type="button"
                                class="flex text-sm  rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                                data-dropdown-placement="bottom"><span class="sr-only">Open user menu</span>
                                <img class="w-10 h-10 rounded-full" src="{{ asset('user.png') }}"
                                    alt="{{ Auth::user()->name }}">
                            </button>
                            <div class="z-60 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                                id="user-dropdown">
                                <div class="px-4 py-3 items-center justify-center text-center"><span
                                        class="block text-sm text-gray-900 dark:text-white">{{ Auth::user()->name }}</span><span
                                        class="block text-sm text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</span>
                                </div>
                                <hr>
                                <ul class="py-0" aria-labelledby="user-menu-button">
                                    <li><a href="{{ route('user.orders') }}"
                                            class="block px-4 py-2 text-sm text-center text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                                class="fas fa-box"></i> Mis Órdenes</a>
                                    </li>
                                    <hr>
                                    <li><a href="#"
                                            class="block px-4 py-2 text-sm text-center text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                            <i class="fas fa-truck"></i> Seguimiento de pedido</a>
                                    </li>
                                    <hr>
                                    <li><a href="#"
                                            class="block px-4 py-2 text-sm text-center text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                            <i class="fas fa-thumbs-up"></i> Recomendaciones para ti</a>
                                    </li>

                                </ul>
                                <div class="py-0">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <hr>
                                        <button type="submit"
                                            class="block w-full px-4 py-2 text-sm text-center text-left
                                        text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200
                                        dark:hover:text-white"><i
                                                class="fas fa-sign-out-alt"></i> Salir</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}"
                            class="hidden xl:inline-block text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:hover:bg-gray-700 focus:ring-gray-800">Ingresa</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="hidden xl:inline-block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 focus:outline-none focus:ring-blue-800">Regístrate</a>
                        @endif
                    @endauth
                @endif
                <button data-collapse-toggle="mobile-menu-2" type="button"
                    class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"aria-controls="mobile-menu-2"
                    aria-expanded="false"><span class="sr-only">Open main menu</span><svg class="w-6 h-6"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg><svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg></button>
            </div>
            <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1 ">
                <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                    <li>
                        <a href="{{ url('/') }}"
                            class="menu-link block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Inicio</a>
                    </li>
                    <li>
                        <a href="{{ route('nosotros') }}"
                            class="menu-link block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">
                            Nosotros
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('envio') }}"
                            class="menu-link block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">
                            Método de Envio</a>
                    </li>
                    <li>
                        <a href="{{ route('reclamos') }}"
                            class="menu-link block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">
                            Libros de Reclamaciones</a>
                    </li>
                    <li class="hidden xl:block">
                        <a href="{{ route('faqs') }}"
                            class="menu-link block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">
                            Ayuda</a>
                    </li>
                    <li class="hidden xl:block">
                        <a href="{{ route('contacto') }}"
                            class="menu-link block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">
                            Contacto</a>
                    </li>

                    @if (Route::has('login'))
                        @auth
                            <div class="block xl:hidden flex items-center space-x-3">
                                @can('admin.home')
                                    <li class="block xl:hidden">

                                        <a href="{{ route('admin.home') }}"
                                            class=" xl:inline-block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 focus:outline-none focus:ring-blue-800">
                                            Dashboard
                                        </a>

                                    </li>
                                @endcan
                                <button type="button"
                                    class="flex text-sm  rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                    id="user-menu-button-bottom2" aria-expanded="false"
                                    data-dropdown-toggle="user-dropdown-bottom2" data-dropdown-placement="top">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="w-8 h-8 rounded-full" src="{{ asset('user.png') }}"
                                        alt="{{ Auth::user()->name }}">
                                </button>
                                <!-- Dropdown menu -->
                                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                                    id="user-dropdown-bottom2">
                                    <div class="px-4 py-3 items-center justify-center text-center">
                                        <span
                                            class="block text-sm text-gray-900 dark:text-white">{{ Auth::user()->name }}</span>
                                        <span
                                            class="block text-sm text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</span>
                                    </div>
                                    <ul class="py-0 flex justify-around w-full flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0"
                                        aria-labelledby="user-menu-button-bottom2 ">
                                        <li><a href="{{ route('user.orders') }}"
                                                class="block px-4 py-2 text-sm text-center text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                                    class="fas fa-box"></i> Mis Órdenes</a>
                                        </li>
                                        <hr>
                                        <li><a href="#"
                                                class="block px-4 py-2 text-sm text-center text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                                <i class="fas fa-truck"></i> Seguimiento de pedido</a>
                                        </li>
                                        <hr>
                                        <li><a href="#"
                                                class="block px-4 py-2 text-sm text-center text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                                <i class="fas fa-thumbs-up"></i> Recomendaciones para ti</a>
                                        </li>

                                    </ul>
                                    <div class="py-0">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit"
                                                class="block w-full px-4 py-2 text-sm text-center text-left
                                        text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200
                                        dark:hover:text-white"><i
                                                    class="fas fa-sign-out-alt"></i> Salir</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="xl:hidden flex items-center space-x-3">
                                <a href="{{ route('login') }}"
                                    class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 focus:outline-none dark:hover:bg-gray-700 focus:ring-gray-800">Ingresa</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="text-white  hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 focus:outline-none focus:ring-blue-800">Regístrate</a>
                                @endif
                            </div>
                        @endauth
                    @endif
                    <button data-collapse-toggle="mobile-menu-2" type="button"
                        class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"aria-controls="mobile-menu-2"
                        aria-expanded="false"><span class="sr-only">Open main menu</span><svg class="w-6 h-6"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                        </svg><svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg></button>
            </div>

            </ul>

            </div>
        </nav>
    </header>


    <header
        class="fixed footer-nav top-14 left-0 w-full bg-blue-300 border-t border-gray-200 px-4 py-2.5 dark:bg-blue-800 z-40">
        <nav
            class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl hidden lg:flex lg:w-auto lg:order-1">
            <ul class="flex justify-around w-full flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                <li class="relative group">
                    <a href="{{ url('/') }}" class="menu-link"><i class="fas fa-home"></i> Inicio</a>

                </li>
                <li class="relative group ">
                    <a style="cursor: pointer;" data-popover-target="popover-bottom" data-popover-placement="bottom"
                        class="menu-link"><i class="fas fa-box"></i> Productos</a>
                    <!-- Dropdown content -->
                    <div style="width: 700px; height: auto; " data-popover id="popover-bottom" role="tooltip"
                        class="absolute z-10 responsive-box invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                        <div
                            class="px-3 py-2  bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                            <h3 class="font-bold text-gray-900 dark:text-white">Categorías</h3>
                        </div>
                        <div class="grid grid-cols-3 gap-4 px-3 py-2">
                            @foreach ($categories as $c)
                                <div>
                                    <a href="{{ route('category.products', ['id' => $c->id]) }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        {{ $c->nombre }}
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div data-popper-arrow></div>
                    </div>
                </li>
                <li class="relative group">
                    <a style="cursor: pointer;" data-popover-target="popover-bottom1" data-popover-placement="bottom"
                        class="menu-link"><i class="fas fa-tags"></i> Marcas</a>
                    <!-- Dropdown content -->
                    <div style="width: 700px; height: auto;" data-popover id="popover-bottom1" role="tooltip"
                        class="absolute z-10  invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                        <div
                            class="px-3 py-2  bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                            <h3 class="font-bold text-gray-900 dark:text-white">Marcas</h3>
                        </div>
                        <div class="grid grid-cols-3 gap-4 px-3 py-2">
                            @foreach ($brands as $b)
                                <div>
                                    <a href="{{ route('brand.products', ['id' => $b->id]) }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        {{ $b->nombre }}
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div data-popper-arrow></div>
                    </div>

                </li>
                <li class="relative group">
                    <a href="{{ route('novedades') }}" class="menu-link"><i class="fas fa-star"></i> Novedades</a>

                </li>
                <li class="relative group">
                    <a style="cursor: pointer;" data-popover-target="popover-bottom2" data-popover-placement="bottom"
                        class="menu-link"><i class="fas fa-laptop"></i> Laptops</a>
                    <!-- Dropdown content -->
                    <div style="width: 700px; height: auto;" data-popover id="popover-bottom2" role="tooltip"
                        class="absolute z-10  invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                        <div
                            class="px-3 py-2  bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                            <h3 class="font-bold text-gray-900 dark:text-white">Laptops</h3>
                        </div>
                        <div class="grid grid-cols-3 gap-4 px-3 py-2">
                            @foreach ($laptops as $l)
                                <div>
                                    <a href="{{ route('view.product', ['id' => $l->id]) }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Laptop | {{ $l->nombre }}
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div data-popper-arrow></div>
                    </div>

                </li>
                <li class="relative group">
                    <a style="cursor: pointer;" data-popover-target="popover-bottom3" data-popover-placement="bottom"
                        class="menu-link"><i class="fas fa-desktop"></i> Pc's de Marca</a>
                    <!-- Dropdown content -->
                    <div style="width: 700px; height: auto;" data-popover id="popover-bottom3" role="tooltip"
                        class="absolute z-10  invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                        <div
                            class="px-3 py-2  bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                            <h3 class="font-bold text-gray-900 dark:text-white">Pc's de Marca</h3>
                        </div>
                        <div class="grid grid-cols-3 gap-4 px-3 py-2">
                            @foreach ($pcs as $pc)
                                <div>
                                    <a href="{{ route('view.product', ['id' => $pc->id]) }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        PC | {{ $pc->nombre }}
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div data-popper-arrow></div>
                    </div>

                </li>
                <li class="relative group">
                    <a style="cursor: pointer;" class="menu-link flex items-center " data-modal-target="cartModal"
                        data-modal-toggle="cartModal">

                        <span><i class="fa-solid fa-basket-shopping"></i> Carrito (<span
                                id="cantidad">0</span>)</span>
                    </a>

                </li>


            </ul>
        </nav>
    </header>

    <!-- Menu para pantallas pequeñas y medianas -->
    <header
        class="lg:hidden fixed footer-nav top-14 left-0 w-full bg-blue-300 border-t border-gray-200 px-4 dark:bg-blue-800 z-50">
        <nav id="mobile-menu-2"
            class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1">
            <ul class="flex justify-around w-full flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">

                <div id="accordion-flush" data-accordion="collapse"
                    data-active-classes="dark:bg-gray-900 text-gray-900 dark:text-white"
                    data-inactive-classes="text-gray-500 dark:text-gray-400">
                    <h2>
                        <button type="button"
                            class="flex items-center menu-link justify-between w-full py-5 font-medium rtl:text-right text-gray-500 gap-3 focus:outline-none focus-visible:outline-none">
                            <a href="{{ url('/') }}">Inicio</a>

                        </button>
                    </h2>
                    <hr class="border-blue-300 dark:border-blue-700">
                    <h2 id="accordion-flush-heading-1">
                        <button type="button"
                            class="flex items-center menu-link justify-between w-full py-5 font-medium rtl:text-right text-gray-500 gap-3 focus:outline-none focus-visible:outline-none"
                            data-accordion-target="#accordion-flush-body-1" aria-expanded="false"
                            aria-controls="accordion-flush-body-1">
                            <a style="cursor: pointer;">Productos</a>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <hr class="border-blue-300 dark:border-blue-700">
                    <div id="accordion-flush-body-1"
                        class="hidden max-h-60 overflow-y-auto scrollbar-thin scrollbar-thumb-gray-400 scrollbar-track-gray-200"
                        aria-labelledby="accordion-flush-heading-1">
                        <div class="py-5">
                            @foreach ($categories as $c)
                                <div>
                                    <a href="{{ route('category.products', ['id' => $c->id]) }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        {{ $c->nombre }}
                                    </a>
                                </div>
                                <hr class="border-black-300 dark:border-black-700">
                            @endforeach
                        </div>
                    </div>
                    <h2 id="accordion-flush-heading-2">
                        <button type="button"
                            class="flex items-center menu-link justify-between w-full py-5 font-medium rtl:text-right text-gray-500 gap-3 focus:outline-none focus-visible:outline-none"
                            data-accordion-target="#accordion-flush-body-2" aria-expanded="false"
                            aria-controls="accordion-flush-body-2">
                            <a style="cursor: pointer;">Marcas</a>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <hr class="border-gray-300 dark:border-gray-700">
                    <div id="accordion-flush-body-2"
                        class="hidden max-h-60 overflow-y-auto scrollbar-thin scrollbar-thumb-gray-400 scrollbar-track-gray-200"
                        aria-labelledby="accordion-flush-heading-2">
                        <div class="py-5">
                            @foreach ($brands as $b)
                                <div>
                                    <a href="{{ route('brand.products', ['id' => $b->id]) }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        {{ $b->nombre }}
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </ul>
        </nav>
    </header>



    <!-- New Footer Header for small screens -->
    <header
        class="lg:hidden footer-nav fixed top-14 left-0 w-full bg-blue-300 border-t border-gray-200 px-4 py-2.5 dark:bg-blue-800 z-40">
        <nav
            class="flex flex-wrap justify-end items-center mx-auto max-w-screen-xl  w-full lg:flex lg:w-auto lg:order-1">
            <li class="relative group">
                <a style="cursor: pointer;" class="menu-link flex items-center " data-modal-target="cartModal"
                    data-modal-toggle="cartModal">
                    <svg class="w-5 h-5 lg:mr-1 inline-block" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312" />
                    </svg>
                    <span>Carrito (<span id="cantidad2">0</span>)</span>
                </a>

            </li>
            @if (Route::has('login'))
                @auth
                    <div class="flex items-center space-x-3">
                        @can('admin.home')
                            <a href="{{ route('admin.home') }}"
                                class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 focus:outline-none dark:hover:bg-gray-700 focus:ring-gray-800">
                                Dashboard
                            </a>
                        @endcan
                        <button type="button"
                            class="flex text-sm rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                            id="user-menu-button-bottom" aria-expanded="false"
                            data-dropdown-toggle="user-dropdown-bottom" data-dropdown-placement="top">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full" src="{{ asset('user.png') }}"
                                alt="{{ Auth::user()->name }}">
                        </button>
                        <!-- Dropdown menu -->
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                            id="user-dropdown-bottom">
                            <div class="px-4 py-3 items-center justify-center text-center">
                                <span class="block text-sm text-gray-900 dark:text-white">{{ Auth::user()->name }}</span>
                                <span
                                    class="block text-sm text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</span>
                            </div>
                            <ul class="py-0 flex justify-around w-full flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0"
                                aria-labelledby="user-menu-button-bottom ">
                                <li><a href="{{ route('user.orders') }}"
                                        class="block px-4 py-2 text-sm text-center text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                            class="fas fa-box"></i> Mis Órdenes</a>
                                </li>
                                <hr>
                                <li><a href="#"
                                        class="block px-4 py-2 text-sm text-center text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                        <i class="fas fa-truck"></i> Seguimiento de pedido</a>
                                </li>
                                <hr>
                                <li><a href="#"
                                        class="block px-4 py-2 text-sm text-center text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                        <i class="fas fa-thumbs-up"></i> Recomendaciones para ti</a>
                                </li>

                            </ul>
                            <div class="py-0">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="block w-full px-4 py-2 text-sm text-center text-left font-medium
                                        text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200
                                        dark:hover:text-white"><i
                                            class="fas fa-sign-out-alt"></i> Salir</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <div class=" flex items-center space-x-3">
                        <a href="{{ route('login') }}"
                            class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 focus:outline-none dark:hover:bg-gray-700 focus:ring-gray-800">Ingresa</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 focus:outline-none dark:hover:bg-gray-700 focus:ring-gray-800">Regístrate</a>
                        @endif
                    </div>
                @endauth
            @endif

        </nav>
    </header>

    <!-- Top Right Modal -->
    <div id="modal">
        <div id="cartModal" data-modal-placement="top-right" tabindex="-1" aria-hidden="true"
            class="fixed right-0 top-0 z-50 w-full h-full flex items-start bg-black bg-opacity-50 hidden">
            <div class="relative w-3/4 sm:w-1/2 lg:w-1/3 h-full bg-white rounded-l-lg shadow-lg overflow-y-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl uppercase font-medium text-gray-900 dark:text-white">
                            <i class="fas fa-shopping-cart"></i> Carrito de Compras
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="cartModal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <div class="products space-y-4">

                            <p class="text-center text-gray-500 dark:text-gray-400">El carrito de compras está vacío
                            </p>
                        </div>
                        <div class="mt-6 flex justify-between items-center">

                            <span class="text-lg font-bold">Total:</span>
                            <span class="total text-lg font-bold">S/0.00</span>
                        </div>
                        <div class="mt-2">
                            <a href="{{ route('cart.show') }}"
                                class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600 text-center block">
                                Ver carrito
                            </a>


                        </div>
                        <div class="eliminar mt-2 hidden">
                            <button class="w-full bg-red-500 text-white py-2 rounded hover:bg-red-600">Eliminar
                                todos</button>
                        </div>
                    </div>
                    {{-- <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 space-x-3 rtl:space-x-reverse border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="cartModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                <button data-modal-hide="cartModal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
            </div> --}}
                </div>
            </div>
        </div>
    </div>

    <!-- Botón de volver arriba -->
    <button id="scrollToTopBtn"
        class="fixed bottom-4 right-4 p-3 bg-blue-600 text-white rounded-full shadow-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7-7-7 7" />
        </svg>
    </button>

    <button id="whatsappBtn"
        class="fixed bottom-4 left-4 p-3 bg-green-500 text-white rounded-full shadow-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400">
        <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/WhatsApp_icon.png" alt="WhatsApp"
            class="w-8 h-8">
    </button>
    <main>
        @yield('content')

    </main>

    <hr class="border-black dark:border-gray-700">
    <footer class="p-4 bg-blue-200 sm:p-6 dark:bg-gray-800">
        <div class="mx-auto max-w-screen-xl">
            <div class="flex justify-between items-start flex-wrap">
                <div class="mb-6 md:mb-0">
                    <a href="{{ url('/') }}" class="flex items-center">
                        <img src="{{ asset('logo.png') }}" class="mr-3 h-10 sm:h-9" alt="Logo" />

                        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">
                            TechnoStore Nexus</span>
                    </a>
                </div>
                <br>
                <div
                    class="mt-6 flex-grow grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-4">
                    <div class="w-full ">
                        <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Nosotros</h2>
                        <p class=" text-sm font-normal text-gray-600 dark:text-gray-300 text-justify">
                            Somos una empresa destacada en
                        </p>
                        <p class="text-sm font-normal text-gray-600 dark:text-gray-300 text-justify">
                            tecnología que ofrece productos
                        </p>
                        <p class="text-sm font-normal text-gray-600 dark:text-gray-300 text-justify">
                            innovadores y de alta calidad.
                        </p>
                        <p class="text-sm font-normal text-gray-600 dark:text-gray-300 text-justify">
                            Trabajamos para brindar
                        </p>
                        <p class="text-sm font-normal text-gray-600 dark:text-gray-300 text-justify">
                            mejor experiencia a nuestros
                        </p>
                        <p class="text-sm font-normal text-gray-600 dark:text-gray-300 text-justify">
                            clientes y mejorar continuamente
                        </p>
                        <p class="text-sm font-normal text-gray-600 dark:text-gray-300 text-justify">
                            nuestros productos.
                        </p>
                    </div>
                    <div class="w-full ">
                        <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Productos</h2>
                        <ul class="text-gray-600 dark:text-gray-400">
                            <li class="mb-4">
                                <a href="{{ route('category.products', ['id' => '9']) }}"
                                    class="hover:underline">Laptops</a>
                            </li>
                            <li class="mb-4">
                                <a href="{{ route('category.products', ['id' => '7']) }}"
                                    class="hover:underline">Smartphones</a>
                            </li>
                            <li class="mb-4">
                                <a href="{{ route('category.products', ['id' => '3']) }}"
                                    class="hover:underline">Auriculares</a>
                            </li>
                            <li class="mb-4">
                                <a href="{{ route('category.products', ['id' => '6']) }}"
                                    class="hover:underline">Cámaras</a>
                            </li>
                            <li class="mb-4">
                                <a href="{{ route('category.products', ['id' => '20']) }}"
                                    class="hover:underline">Smartwatches</a>
                            </li>
                            <li class="mb-4">
                                <a href="{{ route('category.products', ['id' => '17']) }}"
                                    class="hover:underline">Tablets</a>
                            </li>
                        </ul>
                    </div>
                    <div class="w-full ">
                        <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Información</h2>
                        <ul class="text-gray-600 dark:text-gray-400">
                            <li class="mb-4">
                                <a href="{{ route('nosotros') }}" class="hover:underline ">Sobre Nosotros</a>
                            </li>
                            <li class="mb-4">
                                <a href="{{ route('reclamos') }}" class="hover:underline">Libro de Reclamaciones</a>
                            </li>
                            <li class="mb-4">
                                <a href="{{ route('envio') }}" class="hover:underline ">Proceso de Envio</a>
                            </li>
                            <li class="mb-4">
                                <a href="{{ route('faqs') }}" class="hover:underline ">Preguntas Frecuentes</a>
                            </li>
                            <li class="mb-4">
                                <a href="{{ route('terminos') }}" class="hover:underline">Términos y Condiciones</a>
                            </li>
                            <li class="mb-4">
                                <a href="{{ route('politica') }}" class="hover:underline">Política de Privacidad</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white"><a
                                href="{{ route('contacto') }}">
                                Contacto </a></h2>
                        <ul class="text-gray-600 dark:text-gray-400">
                            <li class="mb-4">
                                <p>Teléfono: (+51) 950915951</p>
                            </li>
                            <li class="mb-4">
                                <p>Email: technostorenexus@gmail.com</p>
                            </li>


                        </ul>
                        <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Medios de Pago
                        </h2>
                        <ul class="text-gray-600 dark:text-gray-400">
                            @foreach ($payment_methods as $p)
                                <li class="mb-4">
                                    <p>{{ $p->nombre }}</p>
                                </li>
                            @endforeach



                        </ul>
                    </div>

                </div>
            </div>
            <hr class="my-6 border-gray-800 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <div class="sm:flex sm:items-center sm:justify-between">
                <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a href=""
                        class="hover:underline">TechnoStore Nexus</a>. Todos los derechos reservados.
                </span>
                <div class="flex mt-4 space-x-6 sm:justify-center sm:mt-0">
                    <a href="https://www.facebook.com/hectormiguel.ramostocto1" target="_blank"
                        class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white"
                        target="_blank">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white"
                        target="_blank">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path
                                d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                        </svg>
                    </a>
                    <a href="https://github.com/Fabian-Campoverde"
                        class="text-gray-500 hover:text-gray-900 dark:hover:text-white" target="_blank">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white"
                        target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" x="0px" y="0px" width="100"
                            height="100" viewBox="0 0 50 50">
                            <path
                                d="M41,4H9C6.243,4,4,6.243,4,9v32c0,2.757,2.243,5,5,5h32c2.757,0,5-2.243,5-5V9C46,6.243,43.757,4,41,4z M37.006,22.323 c-0.227,0.021-0.457,0.035-0.69,0.035c-2.623,0-4.928-1.349-6.269-3.388c0,5.349,0,11.435,0,11.537c0,4.709-3.818,8.527-8.527,8.527 s-8.527-3.818-8.527-8.527s3.818-8.527,8.527-8.527c0.178,0,0.352,0.016,0.527,0.027v4.202c-0.175-0.021-0.347-0.053-0.527-0.053 c-2.404,0-4.352,1.948-4.352,4.352s1.948,4.352,4.352,4.352s4.527-1.894,4.527-4.298c0-0.095,0.042-19.594,0.042-19.594h4.016 c0.378,3.591,3.277,6.425,6.901,6.685V22.323z">
                            </path>
                        </svg>
                    </a>

                </div>
            </div>
        </div>
    </footer>
    @yield('js')

    <script>
        document.getElementById('whatsappBtn').addEventListener('click', function() {
            window.open('https://wa.me/51957810155', '_blank');
        });
        document.addEventListener('DOMContentLoaded', function() {
            const scrollToTopBtn = document.getElementById('scrollToTopBtn');

            // Mostrar el botón al hacer scroll hacia abajo
            window.addEventListener('scroll', function() {
                if (window.scrollY >
                    300) { // Cambia el valor si deseas que el botón aparezca antes o después
                    scrollToTopBtn.classList.add('show');
                } else {
                    scrollToTopBtn.classList.remove('show');
                }
            });

            // Desplazar hacia arriba al hacer clic en el botón
            scrollToTopBtn.addEventListener('click', function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });
    </script>
    <script>
        window.cartData = @json($cart);
    </script>

    <!-- Incluir el archivo compilado `cart.js` -->
    <script type="text/javascript" src="{{ asset('js/cart.js') }}"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>

</body>

</html>
