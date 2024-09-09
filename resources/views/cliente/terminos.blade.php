@extends('layouts.page')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection
@section('content')
<section class="bg-gray-100 dark:bg-gray-900 py-12">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class=" ">
            <div class="px-6 py-8">
                <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-6">Términos y Condiciones</h2>
                <p class="text-lg text-gray-700 dark:text-gray-300 mb-8">
                    Bienvenido a TechnoStore Nexus. Al acceder y utilizar nuestro sitio web, aceptas estar sujeto a los términos y condiciones que se describen a continuación. Por favor, tómate un momento para leerlos cuidadosamente.
                </p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Sección 1 -->
                    <div>
                        <h3 class="text-2xl font-semibold text-blue-600 dark:text-blue-400 mb-4">1. Introducción</h3>
                        <p class="text-base text-gray-700 dark:text-gray-300">
                            Al utilizar nuestro sitio web y realizar compras a través de nuestra plataforma, aceptas cumplir con estos términos. Si no estás de acuerdo con alguno de ellos, por favor no utilices nuestros servicios.
                        </p>
                    </div>

                    <!-- Sección 2 -->
                    <div>
                        <h3 class="text-2xl font-semibold text-blue-600 dark:text-blue-400 mb-4">2. Elegibilidad</h3>
                        <p class="text-base text-gray-700 dark:text-gray-300">
                            Para utilizar este sitio web y realizar compras, debes tener al menos 18 años o estar bajo la supervisión de un adulto. Al utilizar nuestros servicios, confirmas que cumples con esta condición.
                        </p>
                    </div>

                    <!-- Sección 3 -->
                    <div>
                        <h3 class="text-2xl font-semibold text-blue-600 dark:text-blue-400 mb-4">3. Registro de Cuenta</h3>
                        <p class="text-base text-gray-700 dark:text-gray-300">
                            Para realizar compras, es posible que debas registrar una cuenta. Asegúrate de proporcionar información veraz y precisa durante el registro y de actualizarla cuando sea necesario. Eres responsable de mantener la confidencialidad de tu cuenta y contraseña.
                        </p>
                    </div>

                    <!-- Sección 4 -->
                    <div>
                        <h3 class="text-2xl font-semibold text-blue-600 dark:text-blue-400 mb-4">4. Propiedad Intelectual</h3>
                        <p class="text-base text-gray-700 dark:text-gray-300">
                            Todo el contenido en TechnoStore Nexus, incluyendo texto, gráficos, logotipos, imágenes y software, es propiedad de TechnoStore Nexus o de sus proveedores. Está protegido por las leyes de derechos de autor y no puede ser utilizado sin autorización.
                        </p>
                    </div>

                    <!-- Sección 5 -->
                    <div>
                        <h3 class="text-2xl font-semibold text-blue-600 dark:text-blue-400 mb-4">5. Limitación de Responsabilidad</h3>
                        <p class="text-base text-gray-700 dark:text-gray-300">
                            No seremos responsables de daños indirectos, especiales, incidentales o consecuentes que resulten del uso de nuestros productos o servicios. Nuestro máximo compromiso será reembolsar el importe pagado por los productos en cuestión.
                        </p>
                    </div>

                    <!-- Sección 6 -->
                    <div>
                        <h3 class="text-2xl font-semibold text-blue-600 dark:text-blue-400 mb-4">6. Cambios en los Términos</h3>
                        <p class="text-base text-gray-700 dark:text-gray-300">
                            Nos reservamos el derecho de modificar estos términos en cualquier momento. Las modificaciones serán efectivas inmediatamente después de ser publicadas en nuestro sitio. Recomendamos revisar estos términos regularmente.
                        </p>
                    </div>

                    <!-- Sección 7 -->
                    <div>
                        <h3 class="text-2xl font-semibold text-blue-600 dark:text-blue-400 mb-4">7. Contacto</h3>
                        <p class="text-base text-gray-700 dark:text-gray-300">
                            Si tienes alguna pregunta sobre estos términos, no dudes en contactarnos a través de nuestro formulario de contacto o envíanos un correo a technostorenexus@gmail.com
                        </p>
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