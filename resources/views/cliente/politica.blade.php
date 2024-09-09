@extends('layouts.page')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection
@section('content')
<section class="bg-gray-100 dark:bg-gray-900 py-12">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="">
            <div class="px-6 py-8">
                <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-6">Política de Privacidad</h2>
                <p class="text-lg text-gray-700 dark:text-gray-300 mb-8">
                    En TechnoStore Nexus, nos comprometemos a proteger tu privacidad y a manejar tus datos personales de manera segura y responsable. A continuación, detallamos cómo recopilamos, usamos y protegemos tu información.
                </p>

                <div class="space-y-8">
                    <!-- Sección 1 -->
                    <div>
                        <h3 class="text-2xl font-semibold text-purple-600 dark:text-purple-400 mb-4">1. Información que Recopilamos</h3>
                        <p class="text-base text-gray-700 dark:text-gray-300">
                            Recopilamos información personal cuando realizas un pedido, te registras en nuestro sitio, o te suscribes a nuestro boletín. Esta información puede incluir tu nombre, dirección de correo electrónico, número de teléfono y dirección de envío.
                        </p>
                    </div>

                    <!-- Sección 2 -->
                    <div>
                        <h3 class="text-2xl font-semibold text-purple-600 dark:text-purple-400 mb-4">2. Uso de la Información</h3>
                        <p class="text-base text-gray-700 dark:text-gray-300">
                            Utilizamos la información recopilada para procesar tus pedidos, mejorar tu experiencia de compra y mantenerte informado sobre nuestros productos y ofertas. No compartiremos tu información personal con terceros sin tu consentimiento, excepto en los casos necesarios para cumplir con nuestros servicios (como la entrega de productos).
                        </p>
                    </div>

                    <!-- Sección 3 -->
                    <div>
                        <h3 class="text-2xl font-semibold text-purple-600 dark:text-purple-400 mb-4">3. Seguridad de los Datos</h3>
                        <p class="text-base text-gray-700 dark:text-gray-300">
                            Implementamos medidas de seguridad avanzadas para proteger tus datos personales contra el acceso no autorizado, la alteración, divulgación o destrucción. Esto incluye el uso de tecnología SSL para cifrar la información que se transmite en nuestro sitio.
                        </p>
                    </div>

                    <!-- Sección 4 -->
                    <div>
                        <h3 class="text-2xl font-semibold text-purple-600 dark:text-purple-400 mb-4">4. Cookies y Tecnologías Similares</h3>
                        <p class="text-base text-gray-700 dark:text-gray-300">
                            Utilizamos cookies para mejorar tu experiencia de navegación, personalizar contenido y analizar el tráfico de nuestro sitio. Puedes ajustar la configuración de tu navegador para rechazar cookies, pero esto puede afectar tu capacidad para utilizar algunas funciones de nuestro sitio.
                        </p>
                    </div>

                    <!-- Sección 5 -->
                    <div>
                        <h3 class="text-2xl font-semibold text-purple-600 dark:text-purple-400 mb-4">5. Derechos del Usuario</h3>
                        <p class="text-base text-gray-700 dark:text-gray-300">
                            Tienes derecho a acceder, corregir o eliminar tu información personal en cualquier momento. Si deseas ejercer estos derechos o tienes alguna pregunta sobre nuestra política de privacidad, no dudes en contactarnos.
                        </p>
                    </div>

                    <!-- Sección 6 -->
                    <div>
                        <h3 class="text-2xl font-semibold text-purple-600 dark:text-purple-400 mb-4">6. Cambios en la Política de Privacidad</h3>
                        <p class="text-base text-gray-700 dark:text-gray-300">
                            Nos reservamos el derecho de actualizar esta política de privacidad en cualquier momento. Cualquier cambio será publicado en esta página y, si es significativo, te notificaremos a través de correo electrónico o mediante un aviso en nuestro sitio.
                        </p>
                    </div>

                    <!-- Sección 7 -->
                    <div>
                        <h3 class="text-2xl font-semibold text-purple-600 dark:text-purple-400 mb-4">7. Contacto</h3>
                        <p class="text-base text-gray-700 dark:text-gray-300">
                            Si tienes alguna pregunta o inquietud sobre nuestra política de privacidad, puedes contactarnos en cualquier momento a través de nuestro formulario de contacto o enviándonos un correo electrónico a privacidad@technostorenexus.com.
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