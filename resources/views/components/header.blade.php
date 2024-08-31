<div>
    <header class="fixed top-0 left-0 w-full bg-blue-300 border-gray-900 px-4 lg:px-6 py-2.5 dark:bg-blue-800 z-50">
        <nav class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
            <a href="" class="flex items-center">
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
                                class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                                data-dropdown-placement="bottom"><span class="sr-only">Open user menu</span><img
                                    class="w-10 h-10 rounded-full" src="{{ Auth::user()->image_url }}"
                                    alt="{{ Auth::user()->name }}"></button>
                            <div class="z-60 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                                id="user-dropdown">
                                <div class="px-4 py-3"><span
                                        class="block text-sm text-gray-900 dark:text-white">{{ Auth::user()->name }}</span><span
                                        class="block text-sm text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</span>
                                </div>
                                <ul class="py-2" aria-labelledby="user-menu-button">
                                    <li><a href="{{ route('profile.show') }}"
                                            class="block px-4 py-2 text-sm text-center text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Profile</a>
                                    </li>
                                    <li><a href="#"
                                            class="block px-4 py-2 text-sm text-center text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
                                    </li>
                                    <li><a href="#"
                                            class="block px-4 py-2 text-sm text-center text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Earnings</a>
                                    </li>
                                </ul>
                                <div class="py-1">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit"
                                            class="block w-full px-4 py-2 text-sm text-center text-left
                                        text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200
                                        dark:hover:text-white">Sign
                                            out</button>
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
                        <a href="#"
                            class="menu-link block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Inicio</a>
                    </li>
                    <li >
                        <a href="#"
                            class="menu-link block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Nosotros
                            </a>
                    </li>
                    <li >
                        <a href="#"
                            class="menu-link block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Medios
                            de Pago</a>
                    </li>
                    <li>
                        <a href="#"
                            class="menu-link block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Libros
                            de Reclamaciones</a>
                    </li>
                    <li class="hidden xl:block">
                        <a href="#"
                            class="menu-link block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Ayuda</a>
                    </li>
                    <li class="hidden xl:block">
                        <a href="#"
                            class="menu-link block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Contacto</a>
                    </li>

                    @if (Route::has('login'))
                        @auth
                            <div class="block xl:hidden flex items-center space-x-3">
                                <li class="block xl:hidden">
                                    <a
                                        href="{{ route('admin.home') }}"class="menu-link block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">
                                        Dashboard
                                    </a>
                                </li>
                                <button type="button"
                                    class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                    id="user-menu-button-bottom2" aria-expanded="false"
                                    data-dropdown-toggle="user-dropdown-bottom2" data-dropdown-placement="top">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="w-8 h-8 rounded-full" src="{{ Auth::user()->image_url }}"
                                        alt="{{ Auth::user()->name }}">
                                </button>
                                <!-- Dropdown menu -->
                                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                                    id="user-dropdown-bottom2">
                                    <div class="px-4 py-3">
                                        <span
                                            class="block text-sm text-gray-900 dark:text-white">{{ Auth::user()->name }}</span>
                                        <span
                                            class="block text-sm text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</span>
                                    </div>
                                    <ul class="py-2 flex justify-around w-full flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0"
                                        aria-labelledby="user-menu-button-bottom2 ">
                                        <li>
                                            <a href="{{ route('profile.show') }}"
                                                class="menu-link block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Profile</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="menu-link block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="menu-link block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Earnings</a>
                                        </li>

                                    </ul>
                                    <div class="py-1">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit"
                                                class="menu-link block w-full px-4 py-2 text-sm  text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                                                out</button>
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
                    <a href="#" data-popover-target="popover-bottom" data-popover-placement="bottom"
                        class="menu-link">Productos</a>
                    <!-- Dropdown content -->
                    <div style="width: 900px; height: auto; " data-popover id="popover-bottom" role="tooltip"
                        class="absolute z-10  invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                        <div
                            class="px-3 py-2  bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                            <h3 class="font-bold text-gray-900 dark:text-white">Categorías</h3>
                        </div>
                        <div class="grid grid-cols-3 gap-4 px-3 py-2">
                            @foreach ($categories as $c)
                                <div>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        {{ $c->nombre }}
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div data-popper-arrow></div>
                    </div>
                </li>
                <li class="relative group">
                    <a href="#" data-popover-target="popover-bottom1" data-popover-placement="bottom"
                        class="menu-link">Marcas</a>
                    <!-- Dropdown content -->
                    <div style="width: 1000px; height: auto;" data-popover id="popover-bottom1" role="tooltip"
                        class="absolute z-10  invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                        <div
                            class="px-3 py-2  bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                            <h3 class="font-bold text-gray-900 dark:text-white">Marcas</h3>
                        </div>
                        <div class="grid grid-cols-3 gap-4 px-3 py-2">
                            @foreach ($brands as $b)
                                <div>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        {{ $b->nombre }}
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div data-popper-arrow></div>
                    </div>

                </li>
                <li class="relative group">
                    <a href="#" class="menu-link">Novedades</a>

                </li>
                <li class="relative group">
                    <a href="#" data-popover-target="popover-bottom2" data-popover-placement="bottom"
                        class="menu-link">Laptops</a>
                    <!-- Dropdown content -->
                    <div style="width: 1000px; height: auto;" data-popover id="popover-bottom2" role="tooltip"
                        class="absolute z-10  invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                        <div
                            class="px-3 py-2  bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                            <h3 class="font-bold text-gray-900 dark:text-white">Laptops</h3>
                        </div>
                        <div class="grid grid-cols-3 gap-4 px-3 py-2">
                            @foreach ($brands as $b)
                                <div>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        {{ $b->nombre }}
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div data-popper-arrow></div>
                    </div>

                </li>
                <li class="relative group">
                    <a href="#" data-popover-target="popover-bottom2" data-popover-placement="bottom"
                        class="menu-link">Pc's de Marca</a>
                    <!-- Dropdown content -->
                    <div style="width: 1000px; height: auto;" data-popover id="popover-bottom2" role="tooltip"
                        class="absolute z-10  invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                        <div
                            class="px-3 py-2  bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                            <h3 class="font-bold text-gray-900 dark:text-white">Pc's de Marca</h3>
                        </div>
                        <div class="grid grid-cols-3 gap-4 px-3 py-2">
                            @foreach ($brands as $b)
                                <div>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        {{ $b->nombre }}
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div data-popper-arrow></div>
                    </div>

                </li>
                <li class="relative group">
                    <a href="#" data-popover-target="popover-bottom2" data-popover-placement="bottom"
                        class="menu-link">Monitores</a>
                    <!-- Dropdown content -->
                    <div style="width: 1000px; height: auto;" data-popover id="popover-bottom2" role="tooltip"
                        class="absolute z-10  invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                        <div
                            class="px-3 py-2  bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                            <h3 class="font-bold text-gray-900 dark:text-white">Monitores</h3>
                        </div>
                        <div class="grid grid-cols-3 gap-4 px-3 py-2">
                            @foreach ($brands as $b)
                                <div>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        {{ $b->nombre }}
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div data-popper-arrow></div>
                    </div>

                </li>

                <li class="relative group">
                    <a href="#" class="menu-link flex items-center ">
                        <svg class="w-5 h-5 lg:mr-1 inline-block" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312" />
                        </svg>
                        <span>Carrito</span>
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
                    <h2 id="accordion-flush-heading-1">
                        <button type="button"
                            class="flex items-center menu-link justify-between w-full py-5 font-medium rtl:text-right text-gray-500 gap-3 focus:outline-none focus-visible:outline-none"
                            data-accordion-target="#accordion-flush-body-1" aria-expanded="false"
                            aria-controls="accordion-flush-body-1">
                            <a href="">Productos</a>
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
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
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
                            <a href="">Marcas</a>
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
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
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
            @if (Route::has('login'))
                @auth
                    <div class="flex items-center space-x-3">
                        <a href="{{ route('admin.home') }}"
                            class="text-white  hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 focus:outline-none focus:ring-blue-800">Dashboard</a>
                        <button type="button"
                            class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                            id="user-menu-button-bottom" aria-expanded="false"
                            data-dropdown-toggle="user-dropdown-bottom" data-dropdown-placement="top">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full" src="{{ Auth::user()->image_url }}"
                                alt="{{ Auth::user()->name }}">
                        </button>
                        <!-- Dropdown menu -->
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                            id="user-dropdown-bottom">
                            <div class="px-4 py-3">
                                <span class="block text-sm text-gray-900 dark:text-white">{{ Auth::user()->name }}</span>
                                <span
                                    class="block text-sm text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</span>
                            </div>
                            <ul class="py-2 flex justify-around w-full flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0"
                                aria-labelledby="user-menu-button-bottom ">
                                <li>
                                    <a href="{{ route('profile.show') }}"
                                        class="menu-link block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Profile</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="menu-link block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="menu-link block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Earnings</a>
                                </li>

                            </ul>
                            <div class="py-1">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="menu-link block w-full px-4 py-2 text-sm  text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                                        out</button>
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
                                class="text-white  hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 focus:outline-none focus:ring-blue-800">Regístrate</a>
                        @endif
                    </div>
                @endauth
            @endif
        </nav>
    </header>
</div>