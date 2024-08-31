@extends('admin.index-datatable')
@section('header-new')
<div class="bg-sky-500 p-4 text-center rounded-lg shadow-lg">
    <h1 class="text-2xl font-semibold text-white uppercase">Registro de Entrada de Productos</h1>
</div>
@endsection

@section('css-new')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    span.selection,
 span.select2-selection,
 span.select2-selection__rendered,
 span.select2-selection__arrow {
     height: 40px !important;
     line-height: 27px !important;
     
     
     
 }
 </style>

@endsection

@section('container-new')
<div class="py-120">

    <!-- component -->
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('admin.inputs.index') }}"
            class="inline-flex items-center px-4 py-2 
bg-gray-800 border border-transparent rounded-md font-semibold text-xs 
text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 
active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 
focus:ring-offset-2 transition ease-in-out duration-150 ml-4">
            {{ __('Entrada de productos') }}
        </a>

    </div>
    <br>




    {{-- Formulario de Input  --}}

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
    
            <div class="w-full  md:max-w-full mx-auto">
                <div class="p-6 border border-gray-300 sm:rounded-md">
            
            <h2 class="mb-4 text-xl font-bold text-center text-gray-900">Registro de entradas</h2>
<form @if ($input->id)
    action="{{route('admin.inputs.update',['input'=>$input->id])}}"
    @else
    action="{{route('admin.inputs.store')}}"  
    @endif method="POST"> 
    @if ($input->id)
        {{method_field("PUT")}}
        @endif
                @csrf
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Datos de Entrada de Productos</h3>
                      <div class="card-tools">
                        <!-- Collapse Button -->
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                      </div>
                      <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Comprobante</label>
                        <input type="text" name="comprobante" id="comprobante" value="{{old('comprobante',$input->comprobante)}}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            placeholder="Ingrese comprobante de pago">
                            @error('comprobante')
                            <span class=" text-sm text-red-600" role="alert">
                                <strong>{{ $message }}</strong>
                            @enderror
                    </div>

                    <div class="w-full">
                        <label for="date" class="block mb-2 text-sm font-medium text-gray-900">Fecha de
                            Compra</label>
                        <div class="relative ">
                            <input autocomplete="off" name="fechaCompra" id="fechaCompra" datepicker datepicker-format="yyyy/mm/dd" type="text"
                                class="flex-grow bg-white-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pl-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Selecciona fecha" value="{{old('fechaCompra',$input->fechaCompra)}}">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            
                        </div>
                        @error('fechaCompra')
                            <span class=" text-sm text-red-600" role="alert">
                                <strong>{{ $message }}</strong>
                            @enderror
                    </div>
                    <div class="w-full">
                        <label for="provider" class="block mb-2 text-sm font-medium text-gray-900">Proveedor</label>
                        <select name="provider_id" id="select2" class="js-example-responsive js-example-responsive bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 w-full max-w-md sm:max-w-lg md:max-w-xl">
                            <option value="" data-name="">Elige un proveedor</option>
                            @foreach ($providers as $provider)
                                <option @if (old('provider_id',$input->provider_id) == $provider->id) selected @endif
                                data-name="{{ $provider->nombre }}" value="{{ $provider->id }}">{{ $provider->nombre }} - {{ $provider->ruc }}</option>
                            @endforeach
                        </select>
                        @error('provider_id')
                            <span class="text-sm text-red-600" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                </div>
                <br>
                <div class="text-right">
                    <input id="guardarCompra" value=" Guardar Compra" type="button"
            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-4"
            onclick="validarFormulario()">
                       
                    <input type="hidden" name="detalles" id="detalles_hidden">
                    <button id="submitButton" type="submit" style="display: none;"></button>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->          
</form>
               

           

            

        </div>
    </div>
        </div>
    </div>
    <br>
    <div class="my-1">@error('detalles')
        <span class=" text-sm text-red-600" role="alert">
            <strong>{{ $message }}</strong>
        @enderror</div>

{{-- Formulario de Detalle --}}
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-xl sm:rounded-lg p-6 border border-gray-300">
           

<div class="flex">
           
    
    <div class="w-full" wire:ignore>
        <select id="selectProduct" class="w-full js-example-responsive">
          
                <option value="" data-name="">Elige un producto</option>
        
            @foreach ($products as $product)
                <option value="{{ $product->id }}">{{ $product->nombre }} - {{ $product->codigoId }}</option>
            @endforeach
        </select>
    </div>
    

</div>
<br>
<div class="grid gap-6 mb-6 md:grid-cols-3">
    <div>
        
        <label for="number-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cantidad</label>
    <input type="number" min="0" id="cantidad" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" >
    </div>
    <div>
        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio de Compra</label>
        <input type="number" min="0" id="precio" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="00.00" >
    </div>
    <div>
        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sub total</label>
        <input disabled type="number" min="0" id="subtotal" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="00.00" >
    </div>
    </div>
<div class="flex justify-end">
    <button id="añadir" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2 inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 me-1">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
         Añadir
    </button>
</div>
    

<br>
<div class="relative overflow-x-auto">
<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            
            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                #
            </th>
            <th scope="col" class="px-6 py-3 rounded-s-lg">
                Producto
            </th>
            <th scope="col" class="px-6 py-3">
                Cantidad
            </th>
            <th scope="col" class="px-6 py-3 rounded-e-lg">
                Precio
            </th>
            <th scope="col" class="px-6 py-3 rounded-e-lg">
                Subtotal
            </th>
            <th scope="col" class="px-6 py-3 rounded-e-lg">
                Accion
            </th>
        </tr>
    </thead>
    <tbody id="tablaDatos">
  
    </tbody>
    <tfoot class="border-t-2 border-gray-300 dark:border-gray-700">
        <tr class="font-semibold text-gray-900 dark:text-white">
            <th class="px-6 py-4 text-center">Proveedor: </th>
            <td  id="proveedorSeleccionado" class="px-6 py-4 text-left"><strong></strong></td>
            <th scope="row" class="px-6 py-3 text-base">Total</th>
            {{-- <td  id="totalCantidad" class="px-6 py-3">0</td> --}}
            <td id="totalCompra" class="px-6 py-3">S/. 0.00</td>
        </tr>
    </tfoot>
</table>
</div>


</div>
        </div>
    </div>




</div>

@endsection


@section('js-new')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    function validarFormulario() {
        // Obtener los valores de los campos
        const comprobante = document.getElementById('comprobante').value.trim();
        const fechaCompra = document.getElementById('fechaCompra').value.trim();
        const providerId = document.getElementById('select2').value;
        const detalles = document.getElementById('detalles_hidden').value.trim();

        // Verificar si algún campo está vacío o tiene valor 0
        if (comprobante === '' || fechaCompra === '' || providerId === '' || providerId === '0' || detalles === ''|| detalles === '[]') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Por favor, completa todos los campos antes de continuar.',
            });
        } else {
            // Validar el formato JSON del campo "detalles"
           
            const submitButton = document.getElementById('submitButton');
                    if (submitButton) {
                        submitButton.click();
                    }
            
        }
    }
</script>
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
   
     $(document).ready(function () {
            $('#select2').select2({
                width: '100%',
                
            });
      
        });

        
        
</script>

    <script>
             $(document).ready(function () {
            $('#selectProduct').select2({
                width: '100%',
                
            });
            
        });
    </script>

<script>
        $(document).ready(function() {

            const inputDetails = {!! $inputDetails->toJson() !!};

if (inputDetails.length > 0) {
    inputDetails.forEach(function(detail) {
        const nuevaFila = `
            <tr class="bg-white dark:bg-gray-800">
                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">${$('tbody#tablaDatos').children().length + 1}</td>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" data-id="${detail.product.id}">${detail.product.nombre}</td>
                <td class="px-6 py-4">${detail.cantidad}</td>
                <td class="px-6 py-4">${detail.precio}</td>
                <td class="px-6 py-4">S/. ${detail.total_producto.toFixed(2)}</td>
                <td class="px-6 py-4 flex items-center">
                    <div class="flex item-center justify-center">
                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                            <a href="#" class="modificar-fila ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                            </a>
                        </div>
                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                            <a href="#" class="eliminar-fila">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </td>
            </tr>
        `;
        $('tbody#tablaDatos').append(nuevaFila);
        
    });
    recalculaTotales();
        actualizarDetallesEnCampoOculto();
}








            $('#select2').change(function() {
                const selectedProvider = $(this).find('option:selected').text();
                const tdProveedor = $('#proveedorSeleccionado strong');
                
                if (selectedProvider === 'Elige un proveedor') {
                    tdProveedor.empty(); // Vaciar el contenido del strong si se elige "Elige un proveedor"
                } else {
                    tdProveedor.text(selectedProvider); // Actualizar el contenido del proveedor seleccionado
                }
            });


            function actualizarDetallesEnCampoOculto() {
    const detalles = [];

    $('tbody#tablaDatos tr').each(function() {
        const productoId = $(this).find('td:eq(1)').data('id');
        const cantidad = parseFloat($(this).find('td:eq(2)').text());
        const precio = parseFloat($(this).find('td:eq(3)').text());
        let subtotal = parseFloat($(this).find('td:eq(4)').text().replace('S/. ', ''));

        let productoEncontrado = false;

        for (let i = 0; i < detalles.length; i++) {
            if (detalles[i].product_id === productoId) {
                detalles[i].cantidad += cantidad;
                detalles[i].precio = precio;
                detalles[i].total_producto = detalles[i].cantidad * precio;
                productoEncontrado = true;
                break;
            }
        }

        if (!productoEncontrado) {
            subtotal = cantidad * precio;
            detalles.push({
                product_id: productoId,
                cantidad: cantidad,
                precio: precio,
                total_producto: subtotal
            });
        }
    });

    const detallesJSON = JSON.stringify(detalles);
    $('#detalles_hidden').val(detallesJSON);
    }


            $('#añadir').on('click', function() {
                const productoSeleccionado = $('#selectProduct').val();
                const cantidad = parseFloat($('#cantidad').val());
                const precio = parseFloat($('#precio').val());
                
                if (productoSeleccionado > 0 && !isNaN(cantidad) && !isNaN(precio) && cantidad > 0 && precio > 0) {
                    const subtotal = cantidad * precio;
                    
                    let productoEncontrado = false;
                    
                    $('tbody#tablaDatos tr').each(function() {
                        const idProducto = $(this).find('td:eq(1)').data('id');
                        if (parseInt(idProducto) === parseInt(productoSeleccionado)) {
                            const cantidadActual = parseFloat($(this).find('td:eq(2)').text());
                            const precioActual = parseFloat($(this).find('td:eq(3)').text());
                            const subtotalActual = parseFloat($(this).find('td:eq(4)').text());
                            
                            const nuevaCantidad = cantidadActual + cantidad;
                            const nuevoSubtotal = (cantidadActual + cantidad) * precioActual;
                            
                            $(this).find('td:eq(2)').text(nuevaCantidad);
                            $(this).find('td:eq(4)').text("S/." + nuevoSubtotal.toFixed(2));
                            
                            productoEncontrado = true;
                            return false;
                        }
                    });
                    
                    if (!productoEncontrado) {
                        const nombreProducto = $('#selectProduct option:selected').text();
                        
                        const nuevaFila = `
                            <tr class="bg-white dark:bg-gray-800">
                                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">${$('tbody#tablaDatos').children().length + 1}</td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" data-id="${productoSeleccionado}">${nombreProducto}</td>
                                <td class="px-6 py-4">${cantidad}</td>
                                <td class="px-6 py-4">${precio}</td>
                                <td class="px-6 py-4">S/. ${subtotal.toFixed(2)}</td>
                                <td class="px-6 py-4 flex items-center">
                                    <div class="flex item-center justify-center">
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <a href="#" class="modificar-fila ">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <a href="#" class="eliminar-fila">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                        $('tbody#tablaDatos').append(nuevaFila);
                    }
                    
                    $('#cantidad').val('');
                    $('#precio').val('');
                    $('#subtotal').val('');
                    recalculaTotales();
                    actualizarDetallesEnCampoOculto();
                } else {
                    // Mostrar SweetAlert para indicar que los campos deben completarse correctamente
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Por favor, complete todos los campos correctamente.'
                    });
                }
            });
            
            $('body').on('click', '.eliminar-fila', function(e) {
                e.preventDefault();
                $(this).closest('tr').remove();
                recalculaTotales();
        actualizarDetallesEnCampoOculto();
            });
            
            // Función para recalcular los totales
            function recalculaTotales() {
    let totalCantidad = 0;
    let totalCompra = 0;

    $('tbody#tablaDatos tr').each(function() {
        const cantidad = parseFloat($(this).find('td:eq(2)').text());
        const precio = parseFloat($(this).find('td:eq(3)').text());
        let subtotal = cantidad * precio;

        $(this).find('td:eq(4)').text("S/. " + subtotal.toFixed(2)); // Actualiza el subtotal en la tabla

        if (!isNaN(cantidad)) {
            totalCantidad += cantidad;
        }
        if (!isNaN(subtotal)) {
            totalCompra += subtotal;
        }
    });

    $('#totalCantidad').text(totalCantidad.toFixed(2));
    $('#totalCompra').text("S/. " + totalCompra.toFixed(2));
    actualizarDetallesEnCampoOculto();
    }
            
            // Botón de Modificar en la tabla
            $('body').on('click', '.modificar-fila', function(e) {
                e.preventDefault();
                const fila = $(this).closest('tr');
                let cantidad = parseFloat(fila.find('td:eq(2)').text());
                let precio = parseFloat(fila.find('td:eq(3)').text());
                
                Swal.fire({
                    title: 'Modificar Producto',
                    html:
                    '<label for="swal-input-cantidad">Cantidad:</label>' +
                    '<input id="swal-input-cantidad" class="swal2-input" value="' + cantidad + '">' +
                    '<label for="swal-input-precio">Precio:</label>' +
                    '<input id="swal-input-precio" class="swal2-input" value="' + precio + '">',
                showCancelButton: true,
                    confirmButtonText: 'Guardar',
                    cancelButtonText: 'Cancelar',
                    focusConfirm: false,
                    preConfirm: () => {
                        return [
                            $('#swal-input-cantidad').val(),
                            $('#swal-input-precio').val()
                        ];
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        const nuevaCantidad = parseFloat(result.value[0]);
                        const nuevoPrecio = parseFloat(result.value[1]);
                        
                        const nuevoSubtotal = nuevaCantidad * nuevoPrecio;
                        fila.find('td:eq(2)').text(nuevaCantidad);
                        fila.find('td:eq(3)').text(nuevoPrecio);
                        fila.find('td:eq(4)').text("S/. " + nuevoSubtotal.toFixed(2));
                        recalculaTotales();
                        actualizarDetallesEnCampoOculto();
                    }
                });
            });
        });
</script>

@endsection