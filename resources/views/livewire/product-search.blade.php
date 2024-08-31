{{-- <div>
    
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
            <div class="bg-white shadow-xl sm:rounded-lg p-6 border border-gray-300">
                <h2 class="mb-4 text-xl font-bold text-center text-gray-900">Registro de entradas</h2>
<form action="{{ route('admin.inputs.store') }}" method="POST"> 
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        
                        <div class="sm:col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Comprobante</label>
                            <input type="text" name="comprobante" id="comprobante"
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
                                <input name="fechaCompra" id="fechaCompra" datepicker datepicker-format="dd/mm/yyyy" type="text"
                                    class="flex-grow bg-white-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pl-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Selecciona fecha">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                @error('fechaCompra')
                                <span class=" text-sm text-red-600" role="alert">
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full"  wire:ignore>
                            <label for="provider" class="block mb-2 text-sm font-medium text-gray-900">Proveedor</label>
                            
                            <select name="provider_id"  id="select2" class=" w-full js-example-responsive"
                            >
                                <option value="" data-name="">Elige un proveedor</option>
                                @foreach ($providers as $provider)
                                    <option data-name="{{ $provider->nombre }}" value="{{ $provider->id }}">{{ $provider->nombre }} - {{ $provider->ruc }}</option>
                                @endforeach
                            </select>
                            @error('provider_id')
                                <span class=" text-sm text-red-600" role="alert">
                                    <strong>{{ $message }}</strong>
                                @enderror
                        </div>
                        
                    </div>
                    <br>
                    <div class="text-right">
                        <input id="guardarCompra" value=" Guardar Compra" type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-4">
                           
                        <input type="hidden" name="detalles" id="detalles_hidden">
                    </div>
                        
</form>
                   

               

                

            </div>
        </div>
        <br>
        <div class="my-1"></div>

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


    
        
    
 
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
   
     $(document).ready(function () {
            $('#select2').select2({
                
                
            });
        //     $('#select2').on('change', function (e) {
        //         var selectedOption = $(this).find(':selected');
        // var selectedProviderName = selectedOption.data('name'); 

        
        // @this.set('selected', selectedProviderName);
        //     });
        });

        
        
</script>

    <script>
             $(document).ready(function () {
            $('#selectProduct').select2({
                
                
            });
            
        });
    </script>

    <script>
        $(document).ready(function() {
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
            const subtotal = parseFloat($(this).find('td:eq(4)').text().replace('S/. ', ''));

            detalles.push({
                product_id: productoId,
                cantidad: cantidad,
                precio: precio,
                total_producto: subtotal
            });
        });

        // Convertir el array de detalles a formato JSON
        const detallesJSON = JSON.stringify(detalles);

        // Asignar el valor del campo oculto 'detalles_hidden' con el JSON de detalles
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
                                <td class="px-6 py-4">${subtotal.toFixed(2)}</td>
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
                    const subtotal = parseFloat($(this).find('td:eq(4)').text().replace('S/. ', ''));
                    
                    totalCantidad += cantidad;
                    totalCompra += subtotal;
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
    

    <script>
//         $(document).ready(function() {
//     $('#guardarCompra').on('click', function(e) {
//         e.preventDefault();
//         $('#crear').click();
//     });
// });
         
       
        // const formData = {
        //     comprobante: $('#comprobante').val(),
        //     fechaCompra: $('#fechaCompra').val(),
        //     provider_id: $('#select2').val(),
        //     detalles: []
        // };

        // $('tbody#tablaDatos tr').each(function() {
        //     const productoId = $(this).find('td:eq(1)').data('id');
        //     const cantidad = parseFloat($(this).find('td:eq(2)').text());
        //     const precio = parseFloat($(this).find('td:eq(3)').text());
        //     const subtotal = parseFloat($(this).find('td:eq(4)').text().replace('S/. ', ''));

        //     formData.detalles.push({
        //         product_id: productoId,
        //         cantidad: cantidad,
        //         precio: precio,
        //         total_producto: subtotal
        //     });
        // });

        // // Llenar los campos del formulario oculto
        // $('#comprobante_hidden').val(formData.comprobante);
        // $('#fechaCompra_hidden').val(formData.fechaCompra);
        // $('#provider_id_hidden').val(formData.provider_id);
        // $('#detalles_hidden').val(JSON.stringify(formData.detalles));

        // Enviar el formulario oculto
        
   
    </script>
@endpush --}}
