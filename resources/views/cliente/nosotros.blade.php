@extends('layouts.page')
@section('content')
<section class="bg-gray-100 py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="text-center">
            <h1 class="text-4xl font-extrabold text-gray-900 mb-4">Sobre TechnoStore Nexus</h1>
            <p class="text-lg text-gray-600 mb-8">Tu destino de confianza para los productos tecnológicos más innovadores y de alta calidad.</p>
        </div>

        <div class="flex flex-col lg:flex-row lg:justify-between">
            <!-- Misión -->
            <div class="lg:w-1/2 lg:pr-8 mb-8 lg:mb-0">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Nuestra Misión</h2>
                <p class="text-base text-gray-700 leading-relaxed">En TechnoStore Nexus, nuestra misión es ofrecerte la mejor experiencia en la compra de productos tecnológicos. Nos dedicamos a brindarte una selección de gadgets y accesorios de vanguardia, combinando calidad, innovación y un servicio al cliente excepcional. Desde laptops y smartphones hasta accesorios y componentes, cada producto ha sido cuidadosamente seleccionado para cumplir con los más altos estándares.</p>
            </div>

            <!-- Visión -->
            <div class="lg:w-1/2 lg:pl-8">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Nuestra Visión</h2>
                <p class="text-base text-gray-700 leading-relaxed">Aspiramos a ser el líder en el mercado de comercio electrónico tecnológico, ofreciendo productos que definan el futuro de la tecnología. Nuestra visión es ser el primer destino en línea para entusiastas de la tecnología y profesionales que buscan lo último en innovación. Estamos comprometidos con la sostenibilidad y la mejora continua, trabajando cada día para superar tus expectativas y brindarte lo mejor del mundo tecnológico.</p>
            </div>
        </div>

        <!-- Valores -->
        <div class="mt-16">
            <h2 class="text-3xl font-semibold text-gray-800 text-center mb-8">Nuestros Valores</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Valor 1 -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h3 class="text-xl text-center font-semibold text-gray-800 mb-4">Innovación</h3>
                    <p class="text-base text-gray-700">Nos comprometemos a ofrecer productos innovadores que estén a la vanguardia de la tecnología, asegurando que nuestros clientes siempre tengan acceso a las últimas novedades.</p>
                </div>

                <!-- Valor 2 -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h3 class="text-xl text-center font-semibold text-gray-800 mb-4">Calidad</h3>
                    <p class="text-base text-gray-700">La calidad es nuestra prioridad. Cada producto en nuestra tienda es seleccionado cuidadosamente para garantizar su durabilidad y rendimiento excepcional.</p>
                </div>

                <!-- Valor 3 -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h3 class="text-xl text-center font-semibold text-gray-800 mb-4">Servicio al Cliente</h3>
                    <p class="text-base text-gray-700">Estamos dedicados a proporcionar un servicio al cliente excepcional. Nuestro equipo está siempre dispuesto a ayudarte con cualquier consulta o problema para asegurar tu satisfacción.</p>
                </div>

               
            </div>
        </div>

        <!-- Equipo -->
        <div class="mt-16">
            <h2 class="text-3xl font-semibold text-gray-800 text-center mb-8">Conoce a Nuestro Equipo</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Miembro del equipo 1 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="{{ asset('equipo/jair.jpg') }}" alt="Jair Bautista" class="w-full h-48 object-fit">
                    <div class="p-6">
                        <h3 class="text-xl text-center font-semibold text-gray-800 mb-2">Jair Bautista</h3>
                        <p class="text-base text-gray-600">CEO y Fundador</p>
                        <p class="mt-2 text-gray-700">Con una visión clara de liderazgo, Jair ha fundado TechnoStore Nexus para revolucionar la manera en que compras tecnología. Su pasión y experiencia en el sector son el corazón de nuestra empresa.</p>
                    </div>
                </div>
    
                <!-- Miembro del equipo 2 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="{{ asset('equipo/fabian.jpg') }}" alt="Fabian Campoverde" class="w-full h-48 object-fit">
                    <div class="p-6">
                        <h3 class="text-xl text-center font-semibold text-gray-800 mb-2">Fabian Campoverde</h3>
                        <p class="text-base text-gray-600">Gerente de TI</p>
                        <p class="mt-2 text-gray-700">Fabian supervisa la infraestructura tecnológica de TechnoStore Nexus, asegurando que todos nuestros sistemas funcionen sin problemas y que estemos a la vanguardia de la tecnología.</p>
                    </div>
                </div>
    
                <!-- Miembro del equipo 3 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="{{ asset('equipo/inostroza.jpg') }}" alt="Jhonatan Inostroza" class="w-full h-48 object-fit">
                    <div class="p-6">
                        <h3 class="text-xl text-center font-semibold text-gray-800 mb-2">Jhonatan Inostroza</h3>
                        <p class="text-base text-gray-600">Gerente de Ventas</p>
                        <p class="mt-2 text-gray-700">Jhonatan es el encargado de las estrategias de ventas y la gestión de relaciones con clientes. Su enfoque en ofrecer una experiencia de compra excepcional ayuda a impulsar nuestra misión.</p>
                    </div>
                </div>
    
                <!-- Miembro del equipo 4 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="{{ asset('equipo/hector.jpg') }}" alt="Hector Ramos" class="w-full h-48 object-fit">
                    <div class="p-6">
                        <h3 class="text-xl text-center font-semibold text-gray-800 mb-2">Hector Ramos</h3>
                        <p class="text-base text-gray-600">Gestor de Contenido | Soporte al Cliente</p>
                        <p class="mt-2 text-gray-700">Hector se encarga de la creación de contenido y de ofrecer soporte al cliente. Su rol es crucial para mantener a nuestros clientes informados y satisfechos, garantizando que obtengan la mejor experiencia posible.</p>
                    </div>
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

<!-- Incluir el archivo compilado `cart.js` -->
<script type="text/javascript" src="{{ asset('js/cart.js') }}"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
@endsection