@extends('admin.index-datatable')


@section('header-new')
    <div class="bg-lime-500 p-4 text-center rounded-lg shadow-lg">
        <h1 class="text-2xl font-semibold text-white uppercase">Medidas</h1>
    </div>
@endsection
@section('css-new')

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
@endsection
@section('container-new')
    <div class="py-120">
        <!-- component -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <button data-toggle="modal" data-target="#addModal"
                class="inline-flex items-center px-4 py-2 
    bg-gray-800 border border-transparent rounded-md font-semibold text-xs 
    text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 
    active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 
    focus:ring-offset-2 transition ease-in-out duration-150 ml-4">{{ __('Agregar nueva medida') }}</button>

        </div>

        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Nueva Medida</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form class="p-4 md:p-5" method="POST" id="formAdd" action="{{ route('admin.measures.store') }}">
                        @csrf
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    <i class="fas fa-layer-group mr-1 my-text-color"></i> Nombre</label>
                                <input type="text" name="nombre" id="nombre"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Nombre de categoria" required="">
                            </div>
                           
                        </div>
                        <button id="submitButton" type="submit" style="display: none;"></button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="inline-flex items-center text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">                    
                        Cancelar
                    </button>
                  <label for="btnSubmit" class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800" style="cursor: pointer;">
                    <input id="btnSubmit" type="button" onclick="validarFormulario()" class="hidden">
                    Añadir
                    <i class="fas fa-plus-circle ml-2 mr-1 my-text-color"></i>
                </label>
                
                </div>
              </div>
            </div>
        </div>

        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Editar Medida</h5>
                  <button type="button" id="close-edit" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form class="p-4 md:p-5" method="POST" id="editForm">
                        {{ method_field('PUT') }}
                        @csrf
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    <i class="fas fa-layer-group mr-1 my-text-color"></i> Nombre</label>
                                <input type="text" name="nombre" id="nombreEdit"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Nombre de categoria" required="">
                            </div>
                           
                        </div>
                        <button id="submitButtonEdit" type="submit" style="display: none;"></button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="inline-flex items-center text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">                    
                        Cancelar
                    </button>
                  <label for="btnSubmitEdit" class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800" style="cursor: pointer;">
                    <input id="btnSubmitEdit" type="button" onclick="validarFormularioEdit()" class="hidden">
                    Actualizar
                            <i class="fas fa-edit ml-2"></i>
                </label>
                
                </div>
              </div>
            </div>
        </div>

        <div id="edit-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Editar Nueva Medida
                        </h3>
                        <button type="button" id="close-edit"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="edit-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form class="p-4 md:p-5" method="POST" id="editForm">
                        {{ method_field('PUT') }}
                        @csrf
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    <i class="fas fa-layer-group mr-1 my-text-color"></i> Nombre</label>
                                <input type="text" name="nombre" id="nombreEdit"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Nombre de categoria" required="">
                            </div>


                        </div>
                        <div class="text-right">
                            <input id="guardarCompra" value=" Actualizar Medida" type="button"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-4"
                                onclick="validarFormularioEdit()">
                            <button id="submitButtonEdit" type="submit" style="display: none;"></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- component -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            
            <div class="container w-full md:w-4/5 xl:w-3/5  mx-auto px-2">




                <!--Card-->
                <div class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                    <table id="example" class="stripe hover "
                        style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                        <thead class="text-xs text-white uppercase bg-blue-500 dark:text-white">
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Id</th>
                                <th class="py-3 px-6 text-left">Nombre</th>

                                <th class="py-3 px-6 text-center">Creacion</th>
                                <th class="py-3 px-6 text-center">Estado</th>
                                <th class="py-3 px-6 text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach ($measures as $item)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-6 text-left whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="mr-2">
                                                {{-- Imagen --}}
                                            </div>
                                            <span class="font-medium">{{ $item->id }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <div class="mr-2">

                                            </div>
                                            <span>{{ $item->nombre }}</span>
                                        </div>
                                    </td>

                                    <td class="py-3 px-6 text-center">
                                        <span
                                            class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">{{ $item->created_at }}</span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span
                            class="relative inline-block px-3 py-1 font-semibold text-gray-900 leading-tight">
                            <span aria-hidden
                                class="absolute inset-0 
                                @if ($item->estado==='A')
                                bg-green-200
                            @else
                            bg-red-200
                            @endif
                             opacity-50 rounded-full"></span>
                        <span class="relative">
                            @if ($item->estado==='A')
                            Activo  
                            @else
                            Inactivo
                            @endif
                            
                        </span>
                        </span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex item-center justify-center">
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                @if ($item->estado==='A')
                                                <button class="inline-flex items-center desactivar" 
                                                data-medida-id="{{ $item->id }}"
                                            id="deactivateCategoryButton" title="Desactivar medida">
                                                <svg class="w-3 h-3 text-red-500 dark:text-white" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                  </svg>
                                            </button>  
                            @else
                            <button class="inline-flex items-center activar" 
                                                data-medida-id="{{ $item->id }}"
                                            id="activateCategoryButton" title="Activar medida">
                                                <svg class="w-3 h-3 text-green-500 dark:text-white" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                                  </svg>
                                            </button>  
                            @endif
                                                
                                            </div>
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                {{-- <a
                                                                href="{{ route('admin.measures.edit', ['measure' => $item->id]) }}"> --}}
                                                <button class="inline-flex items-center editar-medida"
                                                    id="readProductButton" data-medida-id="{{ $item->id }}"
                                                    data-medida-nombre="{{ $item->nombre }}"
                                                    data-toggle="modal" data-target="#editModal">
                                                    <svg class="w-5 h-4" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">

                                                <form class="form-delete"
                                                    action="{{ route('admin.measures.destroy', ['measure' => $item->id]) }}"
                                                    method="post" x-data>
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <input type="hidden" name="measure_name"
                                                        value="{{ $item->nombre }}">
                                                    <button type="submit" class="inline-flex items-center">
                                                        <svg class="w-5 h-4" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                </form>


                                            </div>

                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>



                </div>
            </div>
        </div>
    @endsection

    @section('js-new')
    
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
                var table = $('#example').DataTable({
                    responsive: true,
                    stateSave: true,
                    language: {
                        url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
                        decimal: ',',
                        thousands: '.'
                    },
                    dom: 'Bfrtip',
                    lengthMenu: [
                        [10, 25, 50, -1],
                        [10, 25, 50, "Mostrar Todo"]
                    ],
                    buttons: [

                        {
                            extend: 'excelHtml5',
                            text: '<i class="fa fa-file-excel-o"></i>',
                            title: 'Listado de Medidas',
                            titleAttr: 'Excel',
                            exportOptions: {
                                columns: [0, 1, 2, ]
                            }
                        },

                        {
                            extend: 'pdfHtml5',
                            text: '<i class="fa fa-file-pdf-o"></i>',
                            title: 'Listado de Medidas',
                            titleAttr: 'PDF',
                            exportOptions: {
                                columns: [0, 1, 2, ]
                            }
                        },
                        {
                            extend: 'print',
                            text: '<i class="fa fa-print"></i>',
                            title: 'Listado de Medidas',
                            titleAttr: 'Imprimir',

                            exportOptions: {
                                columns: [0, 1, 2, ]
                            }
                        },
                        'pageLength'
                    ],
                });
                
                $('#example tbody').on('click', '.editar-medida', function() {
                   
                    
                        // Obtener datos de la categoría seleccionada
                        const medidaId = $(this).data('medida-id');
                        const medidaNombre = $(this).data('medida-nombre');


                        // Rellenar el formulario en el modal con los datos obtenidos
                        $('#nombreEdit').val(medidaNombre);


                        // Establecer la acción del formulario para editar la categoría
                        const editForm = $('#editForm');
                        const actionUrl =
                            "{{ route('admin.measures.update', ['measure' => ':measure']) }}";
                        const updatedActionUrl = actionUrl.replace(':measure', medidaId);
                        editForm.attr('action', updatedActionUrl);


                        // Mostrar el modal
                        $('#editModal').removeClass('hidden');
                    });
                


                $('.form-delete').submit(function(e) {
                    e.preventDefault();
                    const measureName = e.target.querySelector("input[name='measure_name']").value;
                    Swal.fire({
                        title: `¿Estás seguro de que deseas eliminar la categoria "${measureName}"?`,
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

                $('#example tbody').on('click', '.desactivar', function() {
            const medidaId = $(this).data('medida-id');

    $.ajax({
        url: 'admin/measures/' + medidaId + '/status',
        type: 'PUT',
        data: {
                _token: '{{ csrf_token() }}',
                _method: 'PUT',
                estado: 'I'
        },
        success: function(response) {
           
            console.log('Desactivar la medida:', response);
            location.reload();
        },
        error: function(xhr) {
            // Manejar errores si es necesario
            console.error('Error al desactivar la medida:', xhr);
        }
    });
});

$('#example tbody').on('click', '.activar', function() {
            const medidaId = $(this).data('medida-id');

    $.ajax({
        url: 'admin/measures/' + medidaId + '/status',
        type: 'PUT',
        data: {
                _token: '{{ csrf_token() }}',
                _method: 'PUT',
                estado: 'A'
        },
        success: function(response) {
            console.log('Activar la medida:', response);
            location.reload();
          
        },
        error: function(xhr) {
            // Manejar errores si es necesario
            console.error('Error al activar la medida:', xhr);
        }
    });
});
            });
        </script>
        <script>
            // document.getElementById('closeAlert').addEventListener('click', function() {
            //     document.getElementById('alert').style.display = 'none';
            // });
            const closeButton = document.querySelector('[data-dismiss-target="#alert-1"]');
            if (closeButton) {
                closeButton.addEventListener('click', function() {
                    const alert = document.getElementById('alert-1');
                    if (alert) {
                        alert.style.display = 'none';
                    }
                });
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
       
        <script>
            function validarFormulario() {
                // Obtener los valores de los campos
                const nombre = document.getElementById('nombre').value.trim();



                // Verificar si algún campo está vacío o tiene valor 0
                if (nombre === '') {
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

            function validarFormularioEdit() {
                // Obtener los valores de los campos
                const nombre = document.getElementById('nombreEdit').value.trim();



                // Verificar si algún campo está vacío o tiene valor 0
                if (nombre === '') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Por favor, completa todos los campos antes de continuar.',
                    });
                } else {
                    // Validar el formato JSON del campo "detalles"

                    const submitButton = document.getElementById('submitButtonEdit');
                    if (submitButton) {
                        submitButton.click();
                    }

                }
            }
        </script>
    @endsection
