@extends('admin.index-datatable')


@section('header-new')
<div class="bg-sky-500 p-4 text-center rounded-lg shadow-lg">
    <h1 class="text-2xl font-semibold text-white uppercase">Ventas de Productos</h1>
  </div>
@endsection
@section('css-new')

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
@endsection
@section('container-new')
<div class="py-120">
   
        <!-- component -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('admin.sales.create') }}"
                class="inline-flex items-center px-4 py-2 
    bg-green-800 border border-transparent rounded-md font-semibold text-xs 
    text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 
    active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 
    focus:ring-offset-2 transition ease-in-out duration-150 ml-4">
                {{ __('Agregar Venta') }}
            </a>

        </div>

        <div class="modal fade " id="readModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        style="margin-left: 40px; ">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">
                        ENTRADA DE PRODUCTOS - # <span id="inputID"></span>
                    </h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="flex justify-center items-center mt-4">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label for="cliente" class="font-semibold">Proveedor</label>
                                <p id="inputProv" class="text-gray-700"></p>
                            </div>
                            <div>
                                <label for="tipo" class="font-semibold">Fecha de Compra   </label>
                                <p id="inputFecha" class="text-center items-center text-gray-700"></p>
                            </div>
                            <div>
                                <label for="folio" class="font-semibold">Comprobante</label>
                                <p id="inputComprobante" class="text-gray-700"></p>
                            </div>
                            
                        </div>
                    </div>
                    <div class="p-4 mt-6 lg:mt-0 overflow-x-auto">
                        <table style="width:100%; padding-top: 1em; padding-bottom: 1em;" id="modal" class="stripe hover w-full table-auto p-2">
                            <thead>
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-center">Codigo Producto</th>
                                    <th scope="col" class="px-6 py-3 text-center">Producto</th>
                                    <th scope="col" class="px-6 py-3 text-center">Cantidad</th>
                                    <th scope="col" class="px-6 py-3 text-center">Precio</th>
                                    <th scope="col" class="px-6 py-3 text-center">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody id="inputDetails">                   
                               
                            </tbody>
                            <tfoot>
                                <tr class="font-semibold text-gray-900 dark:text-white">
                                    <th scope="row" class="px-6 py-3 text-center">Total</th>
                                    <td></td>
                                    <td></td>
                                    <td class="px-6 py-3"></td>
                                    <td id="inputTotal" class="px-6 py-3"></td>
                                </tr>
                                </tfoot>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="inline-flex items-center text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">                    
                        Cancelar
                    </button>
                  
                
                </div>
              </div>
            </div>
        </div>







        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
           
        
        
	<!--Container-->
	<div class="container w-full md:w-4/5 xl:w-3/5  mx-auto px-2">

		


		<!--Card-->
		<div  class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">


			<table id="example" class="stripe hover " style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
				<thead class="text-xs text-white uppercase bg-blue-500 dark:text-white">
					<tr>
						<th data-priority="1" scope="col" class="px-6 py-3 text-center">ID</th>
                        <th data-priority="2" scope="col" class="px-6 py-3 text-center">Comprobante</th>
						<th data-priority="3" scope="col" class="px-6 py-3 text-center">Fecha de Emision de Compra</th>
						<th data-priority="4" scope="col" class="px-6 py-3 text-center">Proveedor</th>
						<th data-priority="5" scope="col" class="px-6 py-3 text-center">Total</th>
						{{-- <th data-priority="5" scope="col" class="px-6 py-3 text-center">Fecha de Entrada</th> --}}
						<th data-priority="6" scope="col" class="px-6 py-3 text-center">Acciones</th>
					</tr>
				</thead>
				<tbody>
                    @foreach ($sales as $sale)
                        
                    
					<tr>
						<td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">{{$sale->id}}</td>
						<td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">{{$sale->comprobante}}</td>
						<td class="px-6 py-4 text-center"> {{$sale->fechaEmision}}</td>
						<td class="px-6 py-4 text-center">{{$sale->buyer->nombre}}</td>
						<td class="px-6 py-4 text-center">S/. {{$sale->totalVenta}}</td>
                        {{-- <td class="px-6 py-4 text-center">{{$input->created_at}}</td> --}}
						<td class="px-6 py-4">
                            <div class="flex item-center justify-center">
                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                <button class="inline-flex items-center readProductButton" id="readProductButton" data-input-id="{{ $sale->id }}" data-toggle="modal" data-target="#readModal">
                          <svg class="w-5 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                            </div>
                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                <a href="{{ route('admin.sales.edit', ['sale'=>$sale->id]) }}" > 
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                            </a>
                            </div>
                            
                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                
                                <form class="form-delete" method="POST" action="{{ route('admin.sales.destroy', ['sale'=>$sale->id]) }}" x-data>
                                   @csrf
                                   {{ method_field("DELETE")}}
                                    <input type="hidden" name="input_name" value="{{ $sale->id }}">
                                    <button type="submit" class="inline-flex items-center" >
                                        <svg class="w-5 h-4"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                    </form>
                                
                                
                            </div>
                        </td>
					</tr>
                    @endforeach
					
            
                    
				</tbody>

			</table>


		</div>
		<!--/Card-->


	</div>
	<!--/container-->
        </div>


       
</div>

@endsection

@section('js-new')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
@if (session('status'))
            <script>
                
                Toastify({
            text: '{{ session('message') }}', // Mensaje del toast desde la sesión
            duration: 1500, // Duración del toast en milisegundos (en este caso, 1.5 segundos)
            close: false, // Mostrar botón de cierre
            gravity: 'top', // Posición del toast 
            position: 'right', // Alineación del toast 
            offset: {
    x: 10, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
    y: 50 // vertical axis - can be a number or a string indicating unity. eg: '2em'
  },
            backgroundColor: '#{{ session('color') }}', // Color de fondo del toast
        }).showToast();
            </script>
        @endif
<script>
   $(document).ready(function() {
    var table;
        $('.readProductButton').on('click', function() {
            
            
        });

        $('.close').on('click', function() {
            $('#readProductModal').addClass('hidden');
        });
    });
</script>

<script>
    $(document).ready(function() {
        var table = $('#example').DataTable({
					responsive: true,
                    language: {
        url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
        decimal: ',',
        thousands: '.'
    },
    dom: 'PBfrtip',
    searchPanes: {
            layout: 'columns-2',
            initCollapsed: true
        },
        
        columnDefs: [
            {
                searchPanes: {
                    show: true
                },
                targets: [ 2, 3]
            }
        ],
    lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, "Mostrar Todo"] ],
        buttons: [
            
       
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel-o"></i>',
                title:'Listado de Compras',
                titleAttr: 'Excel',
                exportOptions: {
                columns: [1,2,3,4]
            }
            },
            
            {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf-o"></i>',
                title:'Listado de Compras',
                titleAttr: 'PDF',
                exportOptions: {
                columns: [1,2,3,4]
            }
            },
            {
                extend:    'print',
                text:      '<i class="fa fa-print"></i>',
                title:'Listado de Compras',
                titleAttr: 'Imprimir',
                exportOptions: {
                    columns: ':visible'
                },
                exportOptions: {
                columns: [1,2,3,4]
            }
            },
            
            'colvis',
            'pageLength'
        ],
       
    
				})
				.columns.adjust()
				.responsive.recalc();
                var table2;
                const startIndex = 10;
        $('#example tbody').on('click', '.readProductButton', function() {
            const rowIndex = $('#example').DataTable().row($(this).closest('tr')).index();

        // Verificar si la fila está por encima o igual al índice de inicio
        if (rowIndex >= startIndex) {
            // Ejecutar el código para cerrar el modal
            document.querySelector("#close-read").click();
        }
        const inputId = $(this).data('input-id');
            // Destruir la tabla DataTable existente antes de volver a inicializarla
    if ($.fn.DataTable.isDataTable('#modal')) {
        $('#modal').DataTable().destroy();
    }
            $.ajax({
                url: '/admin/inputs/' + inputId,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    // Mostrar los detalles del input en el modal
                    const input = response.input;
                    const inputDetails = response.inputDetails;
                    if (inputDetails.length > 0) {
        let detailsHTML = '';

        inputDetails.forEach(detail => {
            // Construir el HTML con los detalles de inputDetail
            detailsHTML += `
            <tr>
						<td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">
                            ${detail.product.codigoId}
                            </td>
						<td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">
                            ${detail.product.nombre}</td>
						<td class="px-6 py-4 text-center"> ${detail.cantidad}</td>
						<td class="px-6 py-4 text-center">S/. ${detail.precio}</td>
						<td class="px-6 py-4 text-center">S/. ${detail.total_producto}</td>
                        </tr>
                
            `;
        });

        // Insertar los detalles de inputDetail en el modal
        $('#inputDetails').html(detailsHTML);
    }
                    $('#inputID').text(input.id); 
                    $('#inputFecha').text(input.fechaCompra);
                    $('#inputComprobante').text(input.comprobante);
                    $('#inputTotal').text('S/. '+input.totalCompra); 
                    $('#inputProv').text(input.provider.nombre); 
                    

                // Inicializar la tabla de DataTables después de haber agregado las filas
            $('#modal').DataTable({
                responsive: true,
                    language: {
        url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
        decimal: ',',
        thousands: '.'
    },
    dom: 'Bfrtip',
    lengthMenu: [ [5, 10, 25, -1], [5, 10, 25, "Mostrar Todo"] ],
    buttons: [
      
            {
                extend:    'print',
                text:      '<i class="fa fa-print"></i>',
                title: 'Listado de Detalle de Compras # '+input.id+ '<br>'
                + 'Proveedor: ' +input.provider.nombre + '<br>' 
                + 'Comprobante: ' +input.comprobante + '<br>'
               + 'Fecha de Compra: '+input.fechaCompra+ '<br>'
               + 'Total de Compra: S/. '+input.totalCompra,
                titleAttr: 'Imprimir',
                
                exportOptions: {
                columns: [0,1,2,3]
            }
            },
            'pageLength'
        ],
            })
            .columns.adjust()
            .responsive.recalc();
                table.draw();
               
                    $('#readModal').removeClass('hidden');
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
    });

                $('.form-delete').submit(function (e) {
        e.preventDefault();
        const productName = e.target.querySelector("input[name='input_name']").value;
        Swal.fire({
  title: `¿Estás seguro de que deseas eliminar la entrada # ${productName}?`,
  text: "No hay vuelta atrás!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, hazlo!',
  cancelButtonText:'Cancelar'
}).then((result) => {
  if (result.isConfirmed) {
    // Swal.fire(
    //   'Deleted!',
    //   'Your file has been deleted.',
    //   'success'
    // )
    this.submit();
  }
});
    });
            });             
</script>

@endsection
