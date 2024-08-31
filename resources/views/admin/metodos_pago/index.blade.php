@extends('admin.index-datatable')


@section('header-new')
<div class="bg-teal-500 p-4 text-center rounded-lg shadow-lg">
    <h1 class="text-2xl font-semibold text-white uppercase">Medios de Pago</h1>
  </div>
  
@endsection
@section('css-new')

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<style>
    /* Asegura que las listas se muestren correctamente */
ul {
    list-style-type: disc; /* Puntos para las listas no ordenadas */  
}

ol {
    list-style-type: decimal; /* Números para las listas ordenadas */    
}
</style>
@endsection
@section('container-new')

<div>
    {{-- <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="productId"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="flex flex-col items-center pb-10" id="detalles"></div>
                    <dl>
                        <dt class="mb-2 font-bold leading-none text-gray-900 dark:text-white">Precio de compra</dt>
                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400" id="compra"></dd>
                        <dt class="mb-2 font-bold leading-none text-gray-900 dark:text-white">Precio de venta</dt>
                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400" id="venta"></dd>
                        <dt class="mb-2 font-bold leading-none text-gray-900 dark:text-white">Categoría</dt>
                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400" id="productCategory"></dd>
                    </dl>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="inline-flex items-center text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">                    
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div> --}}


    <div  >
  
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="padding: 1px">

    <div class="container w-full md:w-4/5 xl:w-3/5  mx-auto px-2">

        <!--Card-->
        <div  class="p-8 mt-6 lg:mt-0 rounded-lg shadow-lg bg-white">
            <div class="overflow-x-auto">
    <table class="stripe hover " style="width:100%; padding-top: 1em;  padding-bottom: 1em;" id="table">
        <thead class="text-xs text-dark-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
             
                <th data-priority="1" scope="col" class="px-6 py-3 text-center">
                    #
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Nombre
                </th>
                
                <th scope="col" class="px-6 py-3 text-center">
                    Tipo
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Comision
                </th>      
                <th scope="col" class="px-6 py-3 text-center">
                    Instrucciones
                </th>     
              <th scope="col" class="px-6 py-3 text-center">
                Estado
            </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
            @foreach ($metodos_pago as $m)
              
            <tr class=" border-b border-gray-200  hover:bg-gray-50" >
    
               
                <th scope="row" class="px-6 text-center py-4  font-medium  whitespace-nowrap dark:text-white">
                    {{$m->id}}
               </th>                
                
                <th scope="row" class="flex items-center justify-center px-6 py-4 text-center text-gray-900 whitespace-nowrap dark:text-white">
                        
                  <div class="mr-2">
                    <img class="w-10 h-10 rounded-pill zoom" src="{{asset($m->imagen)}}" 
                    />
                </div>
                    <div class="pl-3">
                        <div class="text-base font-semibold">{{$m->nombre}} </div>
                        
                    </div> 
                    
                </th>
                
                <td class="px-6 py-4 text-center">
                {{ $m->tipo }}            
                </td>
                
                <td class="px-6 py-4 text-center">
                    {{$m->tasa_transaccion}} %
                </td>    
                <td class="px-6 py-4 text-center">
                    <span class="text-gray-600 font-semibold">{!! $m->instrucciones !!}  </span>
                       
                    
                </td>     
                <td class="px-6 py-4 text-center">
                    @if ($m->estado==="A")
                        <span class="text-green-600 font-semibold">Activo</span>
                    @else
                        <span class="text-red-600 font-semibold">Inactivo</span>
                    @endif
                </td>

                <td class="py-3 px-6 text-center">
                  <div class="flex item-center justify-center">
                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                        @if ($m->estado==='A')
                        <button class="inline-flex items-center desactivar" 
                        data-medio-id="{{ $m->id }}"
                    id="deactivateProductButton" title="Desactivar medio de pago">
                        <svg class="w-3 h-3 text-red-500 dark:text-white" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                          </svg>
                    </button>  
    @else
    <button class="inline-flex items-center activar" 
                        data-medio-id="{{ $m->id }}"
                    id="activateProductButton" title="Activar medio de pago">
                        <svg class="w-3 h-3 text-green-500 dark:text-white" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                          </svg>
                    </button>  
    @endif
                        
                    </div>

                    
                      <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                          <a href="{{ route('admin.payment_methods.edit', ['payment_method'=>$m->id]) }}" > 
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                          </svg>
                      </a>
                      </div>
                      <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                          <form class="form-delete" method="POST" action="{{ route('admin.payment_methods.destroy', ['payment_method'=>$m->id]) }}" x-data>
                              @csrf
                              {{ method_field("DELETE")}}
                              <input type="hidden" name="medio_name" value="{{ $m->nombre }}">
                              <button type="submit" class="inline-flex items-center">
                                       <svg class="w-5 h-4 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
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
        var table = $('#table').DataTable({
        responsive:true,
        stateSave:true,
        language: {
        url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
        decimal: ',',
        thousands: '.'
    },
    
    dom: 'Bfrtip',
    
    lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, "Mostrar Todo"] ],
    buttons: [
        {
            text: '{{ __('Nuevo medio de pago') }}',
            className: 'inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-lg addProduct',
            action: function () {
                window.location.href = '{{ route('admin.payment_methods.create') }}';
            }
        },
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel-o"></i>',
                title:'Listado de Productos',
                titleAttr: 'Excel',
                exportOptions: {
                columns: [0,1,2,3,4,5,6,7]
            }
            },
            
            {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf-o"></i>',
                title:'Listado de Productos',
                titleAttr: 'PDF',
                exportOptions: {
                columns: [0,1,2,3,4,5,6,7]
            }
            },
            {
                extend:    'print',
                text:      '<i class="fa fa-print"></i>',
                title:'Listado de Productos',
                titleAttr: 'Imprimir',
                exportOptions: {
                    columns: ':visible'
                },
                exportOptions: {
                columns: [0,1,2,3,4,5,6,7]
            }
            },
            'pageLength',
            'colvis'
        ],
        
    });
  
                
           
    const closeButton = document.querySelector('[data-dismiss-target="#alert-1"]');
    if (closeButton) {
        closeButton.addEventListener('click', function() {
            const alert = document.getElementById('alert-1');
            if (alert) {
                alert.style.display = 'none';
            }
        });
    };
    $('.form-delete').submit(function (e) {
        e.preventDefault();
        const medioName = e.target.querySelector("input[name='medio_name']").value;
        Swal.fire({
  title: `¿Estás seguro de que deseas eliminar el medio de pago "${medioName}"?`,
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


    $('#table tbody').on('click', '.desactivar', function() {
            const medioId = $(this).data('medio-id');

    $.ajax({
        url: 'admin/payment_methods/' + medioId + '/status',
        type: 'PUT',
        data: {
                _token: '{{ csrf_token() }}',
                _method: 'PUT',
                estado: 'I'
        },
        success: function(response) {
           
            console.log('Desactivar el producto:', response);
            
        },
        error: function(xhr) {
            // Manejar errores si es necesario
            console.error('Error al desactivar el producto:', xhr);
        }
    });
    location.reload();
});

$('#table tbody').on('click', '.activar', function() {
            const medioId = $(this).data('medio-id');

    $.ajax({
        url: 'admin/payment_methods/' + medioId + '/status',
        type: 'PUT',
        data: {
                _token: '{{ csrf_token() }}',
                _method: 'PUT',
                estado: 'A'
        },
        success: function(response) {
            console.log('Activar el producto:', response);
            location.reload();
          
        },
        error: function(xhr) {
            // Manejar errores si es necesario
            console.error('Error al activar el producto:', xhr);
        }
    });
});
}); 
</script>


@endsection
