
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="bg-sky-500 p-4 text-center rounded-lg shadow-lg">
    <h1 class="text-2xl font-semibold text-white uppercase">Registro de Entrada de Productos</h1>
</div>
@stop

@section('content')
    @livewire('product-search')
@stop

@section('css')
@livewireStyles
@vite(['resources/css/app.css','resources/js/app.js'])
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<!--Regular Datatables CSS-->
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
<!--Responsive Extension Datatables CSS-->
<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.css"  rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.0/tailwind.min.css" integrity="sha512-wOgO+8E/LgrYRSPtvpNg8fY7vjzlqdsVZ34wYdGtpj/OyVdiw5ustbFnMuCb75X9YdHHsV5vY3eQq3wCE4s5+g==" crossorigin="anonymous" />
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<style>
   span.selection,
span.select2-selection,
span.select2-selection__rendered,
span.select2-selection__arrow {
    height: 40px !important;
    line-height: 27px !important;
    
    
    
}
</style>


    <link rel="stylesheet" href="/css/admin_custom.css">
    
@stop

@section('js')
@livewireScripts
<wireui:scripts />
<script src="../path/to/flowbite/dist/datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/datepicker.min.js"></script>
<script src="../path/to/flowbite/dist/flowbite.min.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<!--Datatables -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('#cantidad, #precio').on('input', function() {
            var cantidad = parseFloat($('#cantidad').val()) || 0;
            var precio = parseFloat($('#precio').val()) || 0;
            var subtotal = cantidad * precio;
    
            $('#subtotal').val(subtotal.toFixed(2));
        });
    });
    </script>
    <script>
        const datepickerEl = document.getElementById('datepickerId');
        new Datepicker(datepickerEl, {
            // options
        });
        


    </script>
    
    @stack('scripts')
    
@stop