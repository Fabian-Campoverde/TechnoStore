@extends('admin.index-datatable')


@section('header-new')
    <div class="bg-sky-500 p-4 text-center rounded-lg shadow-lg">
        <h1 class="text-2xl font-semibold text-white uppercase">Ordenes</h1>
    </div>
@endsection
@section('css-new')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <style>
        .hidden {
            display: none;
        }

        #lightbox {
            z-index: 50;
            /* Asegúrate de que esté por encima de otros elementos */
        }

        #lightbox img {
            border: 5px solid white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            cursor: pointer;
        }

        #lightboxImage {
            max-width: 60%;
            /* Ajustar el ancho máximo de la imagen */
            max-height: 60%;
            /* Ajustar la altura máxima de la imagen */
        }
    </style>
@endsection
@section('container-new')
    <div class="py-120">

        <div class="modal fade" id="readModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
            style="margin-left: 40px; ">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white">
                            Orden # <span id="inputID"></span>
                        </h3>
                        <button type="button" class="close" id="close-read" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="flex justify-center items-center text-center mt-4">
                            <div class="grid grid-cols-4 md:grid-cols-1 sm:grid-cols-1 gap-4">
                                <div>
                                    <label for="cliente" class="font-semibold">Cliente</label>
                                    <p id="inputCliente" class="text-gray-700"></p>
                                </div>
                                <div>
                                    <label for="tipo" class="font-semibold">Medio de Pago </label>
                                    <p id="inputMetodo" class="text-gray-700"></p>
                                </div>
                                <div>
                                    <label for="folio" class="font-semibold">Fecha de Pago</label>
                                    <p id="inputFecha" class="text-gray-700"></p>
                                </div>
                                <div>
                                    <label for="folio" class="font-semibold">Numero de operacion</label>
                                    <p id="inputOperacion" class="text-gray-700"></p>
                                </div>
                            </div>

                        </div>
                        <div class="text-center mt-4">
                            <button type="button"
                                class="inline-flex items-center text-white bg-primary hover:bg-primary focus:ring-4 focus:outline-none focus:ring-primary font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-primary dark:hover:bg-primary dark:focus:ring-primary"
                                id="viewImageButton">
                                Ver Imagen de Pago
                            </button>
                        </div>
                        <!-- Imagen ampliada (lightbox) -->
                        <div id="lightbox"
                            class="hidden fixed inset-0 bg-black bg-opacity-75 flex justify-center items-center">
                            <img id="lightboxImage" src="" alt="Imagen ampliada" class="max-w-full max-h-full">
                        </div>
                        <div class="p-4 mt-6 lg:mt-0 overflow-x-auto">
                            <table style="width:100%; padding-top: 1em; padding-bottom: 1em;" id="modal"
                                class="stripe hover w-full table-auto p-2">
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
                        <button type="button" id="rejectButton" data-id=""
                            class="inline-flex items-center text-white bg-warning hover:bg-warning focus:ring-4 focus:outline-none focus:ring-warning font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-warning dark:hover:bg-warning dark:focus:ring-warning">
                            Rechazar
                        </button>
                        <button type="button" id="approveButton" data-id=""
                            class="inline-flex items-center text-white bg-success hover:bg-success focus:ring-4 focus:outline-none focus:ring-success font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-success dark:hover:bg-success dark:focus:ring-success">
                            Aprobar y Enviar
                        </button>
                        <button type="button" data-dismiss="modal"
                            class="inline-flex items-center text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
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
                <div class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">


                    <table id="example" class="stripe hover " style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                        <thead class="text-xs text-white uppercase bg-blue-500 dark:text-white">
                            <tr>
                                <th data-priority="1" scope="col" class="px-6 py-3 text-center">#</th>
                                <th data-priority="2" scope="col" class="px-6 py-3 text-center">Número de Orden</th>
                                <th data-priority="3" scope="col" class="px-6 py-3 text-center">Cliente</th>
                                <th data-priority="4" scope="col" class="px-6 py-3 text-center">Fecha de Pago</th>
                                <th data-priority="5" scope="col" class="px-6 py-3 text-center">Estado</th>
                                <th data-priority="6" scope="col" class="px-6 py-3 text-center">Medio de Pago</th>
                                <th data-priority="7" scope="col" class="px-6 py-3 text-center">Total</th>
                                {{-- <th data-priority="5" scope="col" class="px-6 py-3 text-center">Correo</th> --}}
                                {{-- <th data-priority="5" scope="col" class="px-6 py-3 text-center">Fecha de Creación</th> --}}
                                <th data-priority="8" scope="col" class="px-6 py-3 text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $input)
                                <tr>
                                    <td scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">
                                        {{ $input->id }}</td>
                                    <td scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">
                                        {{ $input->order_number }}</td>
                                    <td scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">
                                        {{ $input->document_type }}: {{ $input->document_number }} </td>
                                    <td scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">
                                        {{ $input->payment_date }}</td>
                                    <td scope="row"
                                        class="px-6 py-4 font-medium whitespace-nowrap text-center
                                        @switch($input->status)
                                            @case('Pendiente')
                                          text-yellow-700
                                                @break
                                            @case('Aprobado')
                                          text-green-700
                                                @break
                                            @case('Enviado')
                                          text-blue-700
                                                @break
                                            @case('Cancelado')
                                          text-red-700
                                                @break
                                            @default
                                          text-gray-900
                                        @endswitch">
                                        {{ ucfirst($input->status) }}
                                    </td>

                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">
                                        {{ $input->paymentMethod->nombre }}</td>


                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">S/.
                                        {{ $input->total }}</td>
                                    {{-- <td scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">
                                        {{ $input->email }}</td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center"> {{ $input->created_at }}</td> --}}

                                    <td class="px-6 py-4">
                                        <div class="flex item-center justify-center">
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <button class="inline-flex items-center readOrderButton"
                                                    id="readOrderButton" data-input-id="{{ $input->id }}"
                                                    data-toggle="modal" data-target="#readModal">
                                                    <svg class="w-5 h-4" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                </button>
                                            </div>
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

    <script></script>
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
            document.getElementById('viewImageButton').addEventListener('click', function() {
                document.getElementById('lightbox').classList.remove('hidden');
            });

            document.getElementById('lightbox').addEventListener('click', function() {
                this.classList.add('hidden');
            });

            $('.close').on('click', function() {
                $('#readModal').addClass('hidden');
                $('#lightboxImage').attr('src', ''); // Borra el src de la imagen al cerrar el modal
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
                dom: 'Bfrtip',
                stateSave: true,
                searchPanes: {
                    layout: 'columns-2',
                    initCollapsed: true
                },

                columnDefs: [{
                    searchPanes: {
                        show: true
                    },
                    targets: [2, 3]
                }],
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "Mostrar Todo"]
                ],
                buttons: [


                    {
                        extend: 'excelHtml5',
                        text: '<i class="fa fa-file-excel-o"></i>',
                        title: 'Listado de Compras',
                        titleAttr: 'Excel',
                        exportOptions: {
                            columns: [1, 2, 3, 4]
                        }
                    },

                    {
                        extend: 'pdfHtml5',
                        text: '<i class="fa fa-file-pdf-o"></i>',
                        title: 'Listado de Compras',
                        titleAttr: 'PDF',
                        exportOptions: {
                            columns: [1, 2, 3, 4]
                        }
                    },
                    {
                        extend: 'print',
                        text: '<i class="fa fa-print"></i>',
                        title: 'Listado de Compras',
                        titleAttr: 'Imprimir',
                        exportOptions: {
                            columns: ':visible'
                        },
                        exportOptions: {
                            columns: [1, 2, 3, 4]
                        }
                    },

                    'colvis',
                    'pageLength'
                ],


            })


            $('#example tbody').on('click', '.readOrderButton', function() {
                const rowIndex = $('#example').DataTable().row($(this).closest('tr')).index();

                var table2;
                const startIndex = 10;
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
                    url: '/admin/orders/' + inputId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        // Mostrar los detalles del input en el modal
                        const input = response.order;

                        const inputDetails = response.orderDetails;

                        // Asignar el ID del pedido a los botones
                        $('#rejectButton').attr('data-id', input.id);
                        $('#approveButton').attr('data-id', input.id);
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
						<td class="px-6 py-4 text-center"> ${detail.quantity}</td>
						<td class="px-6 py-4 text-center">S/. ${detail.price}</td>
						<td class="px-6 py-4 text-center">S/. ${detail.subtotal}</td>
                        </tr>
                
            `;
                            });

                            // Insertar los detalles de inputDetail en el modal
                            $('#inputDetails').html(detailsHTML);
                        }

                        const paymentImageUrl = `{{ asset('orders') }}/${input.payment_image}`;
                        $('#inputID').text(input.order_number);
                        $('#inputMetodo').text(input.payment_method.nombre);
                        $('#inputFecha').text(input.payment_date);
                        $('#inputTotal').text('S/. ' + input.total);
                        $('#inputOperacion').text(input.operation_code);
                        $('#lightboxImage').attr('src', paymentImageUrl);
                        $('#inputCliente').text(input.first_name + ' ' + input.last_name);


                        // Inicializar la tabla de DataTables después de haber agregado las filas
                        $('#modal').DataTable({
                                responsive: true,
                                language: {
                                    url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
                                    decimal: ',',
                                    thousands: '.'
                                },
                                dom: 'Bfrtip',
                                lengthMenu: [
                                    [5, 10, 25, -1],
                                    [5, 10, 25, "Mostrar Todo"]
                                ],
                                buttons: [

                                    {
                                        extend: 'print',
                                        text: '<i class="fa fa-print"></i>',
                                        title: 'Listado de Orden  ' +
                                            input.order_number +
                                            '<br>' +
                                            'Cliente: ' + input.first_name + ' ' + input
                                            .last_name +
                                            '<br>' +
                                            'Medio de Pago: ' + input.payment_method
                                            .nombre +
                                            '<br>' +
                                            'Total de Compra: S/. ' + input.total,
                                        titleAttr: 'Imprimir',

                                        exportOptions: {
                                            columns: [0, 1, 2, 3]
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

            $('.form-delete').submit(function(e) {
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
                    cancelButtonText: 'Cancelar'
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

            $('#rejectButton').on('click', function() {
                const orderId = $(this).data('id');
                $.ajax({
                    url: `/admin/admin/orders/${orderId}/status`,
                    type: 'PUT',
                    data: {
                        _token: '{{ csrf_token() }}',
                        _method: 'PUT',
                        estado: 'Cancelado'
                    },
                    success: function(response) {
                        // Manejar la respuesta y actualizar la vista si es necesario
                        console.log(response.message);
                        $('#readModal').addClass('hidden');
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });

            $('#approveButton').on('click', function() {
                const orderId = $(this).data('id');
                $.ajax({
                    url: `/admin/admin/orders/${orderId}/status`,
                    type: 'PUT',
                    data: {
                        _token: '{{ csrf_token() }}',
                        _method: 'PUT',
                        estado: 'Aprobado'
                    },
                    success: function(response) {
                        // Manejar la respuesta y actualizar la vista si es necesario
                        console.log(response.message);
                        $('#readModal').addClass('hidden');
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
@endsection
