@extends('layouts.page')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection
@section('content')
<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-md sm:py-16 lg:px-6">
        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">Contactenos</h2>
        <p class="mb-8 lg:mb-16 font-light text-center text-gray-500 dark:text-gray-400 sm:text-xl">
            Si tienes alguna pregunta, sugerencia o necesitas asistencia, no dudes en ponerte en contacto con nosotros. Nuestro equipo está aquí para ayudarte con cualquier consulta relacionada con nuestros productos .
        </p>
        
        <form action="" method="POST" class="space-y-8">
            @csrf

         
            <div>
                <label for="contact_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tipo de Contacto</label>
                <select id="contact_type" name="contact_type" class="block w-full p-3 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="contact">Contactarse</option>
                    <option value="customer_support">Atención al Cliente</option>
                    <option value="suggestions">Sugerencias</option>
                    <option value="complaints">Quejas</option>
                </select>
            </div>

            <!-- Nombres -->
            <div>
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nombres</label>
                <input type="text" id="first_name" name="first_name" class="block w-full p-3 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>

            <!-- Apellidos -->
            <div>
                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Apellidos</label>
                <input type="text" id="last_name" name="last_name" class="block w-full p-3 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>

            <!-- Correo Electrónico -->
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Correo Electrónico</label>
                <input type="email" id="email" name="email" class="block w-full p-3 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>

            <!-- Teléfono -->
            <div>
                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Teléfono</label>
                <input type="text" id="phone" name="phone" class="block w-full p-3 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>

            <!-- Mensaje -->
            <div>
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Mensaje</label>
                <textarea id="message" name="message" rows="6" class="block w-full p-3 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required></textarea>
            </div>

            <!-- Botón de Enviar -->
            <button type="submit" class="w-full px-5 py-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Enviar Mensaje
            </button>
        </form>
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