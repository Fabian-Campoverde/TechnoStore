@extends('layouts.page')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection
@section('content')
<div class="bg-gray-100 py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <!-- Título -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-extrabold text-gray-900 mb-4">Libros de Reclamaciones</h1>
            <p class="text-lg text-gray-600">Aquí puedes presentar tus reclamos o consultas. Nuestro equipo se encargará de revisarlas y responderte lo antes posible.</p>
        </div>

        <!-- Formulario de Reclamaciones -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden p-6 mb-12">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Presenta tu Reclamo</h2>
            <form action="" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label for="name" class="block text-gray-700 font-medium mb-2">Nombre</label>
                        <input type="text" id="name" name="name" class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" required>
                    </div>
                    <div>
                        <label for="email" class="block text-gray-700 font-medium mb-2">Correo Electrónico</label>
                        <input type="email" id="email" name="email" class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" required>
                    </div>
                    <div>
                        <label for="subject" class="block text-gray-700 font-medium mb-2">Asunto</label>
                        <input type="text" id="subject" name="subject" class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" required>
                    </div>
                    <div>
                        <label for="message" class="block text-gray-700 font-medium mb-2">Mensaje</label>
                        <textarea id="message" name="message" rows="4" class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" required></textarea>
                    </div>
                    <div>
                        <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                            Enviar Reclamo
                        </button>
                    </div>
                </div>
            </form>
        </div>

        
    </div>
</div>
@endsection

@section('js')
<script>
    window.cartData = @json($cart);
</script>

<!-- Incluir el archivo compilado `cart.js` -->
<script type="text/javascript" src="{{ asset('js/cart.js') }}"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
@endsection