@extends('admin.index')


@section('header')
<div class="bg-stone-500 p-4 text-center rounded-lg shadow-lg">
    <h1 class="text-2xl font-semibold text-white uppercase">Roles</h1>
  </div>
@endsection
@section('css-2')
<style>
    #permissionsContent {
        max-height: 300px; /* Establece la altura máxima */
        overflow-y: auto; /* Agrega scroll vertical si el contenido excede la altura máxima */
    }
</style>
@endsection
@section('container')
    <div class="py-120">
        <!-- component -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('admin.roles.create') }}"
                class="inline-flex items-center px-4 py-2 
    bg-gray-800 border border-transparent rounded-md font-semibold text-xs 
    text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 
    active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 
    focus:ring-offset-2 transition ease-in-out duration-150 ml-4">
                {{ __('Agregar nuevo rol') }}
            </a>

        </div>

        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal header -->
                    <div class="modal-header text-lg text-gray-900 md:text-xl dark:text-white">
                        
                        <p class="font-bold" id="roleName"> </p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <dl>
                            <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Permisos</dt>
                            <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400" id="permissionsContent"></dd>
                            
                        </dl>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="inline-flex items-center text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                            
                            Cancelar
                        </button>
                    </div>
                </div>
            </div>
        </div>


        <!-- component -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('status'))
                <br>
                <div id="alert-1"
                    class="flex items-center p-4 mb-4 text-{{ session('color') }}-800 rounded-lg bg-{{ session('color') }}-50 dark:bg-gray-800 dark:text-blue-400"
                    role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="ml-3 text-sm font-medium">
                        {{ session('message') }}
                    </div>
                    <button type="button"
                        class="ml-auto -mx-1.5 -my-1.5 bg-dark-50 text-dark-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700"
                        data-dismiss-target="#alert-1" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>

            @endif
            <div class="bg-white overflow-hidden sm:rounded-lg">



                <div class="overflow-x-auto">
                    <div class=" bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
                        <div class="w-full lg:w-5/6">
                            <div class="bg-white shadow-md rounded my-6">
                                <table class="min-w-max w-full table-auto" id="example">
                                    <thead>
                                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                            <th class="py-3 px-6 text-left">Id</th>
                                            <th class="py-3 px-6 text-left">Nombre</th>
                                            
                                            <th class="py-3 px-6 text-center">Creacion</th>
                                            <th class="py-3 px-6 text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-600 text-sm font-light">
                                        @foreach ($role as $item)
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
                                                        <span>{{ $item->name }}</span>
                                                    </div>
                                                </td>
                                                
                                                <td class="py-3 px-6 text-center">
                                                    <span
                                                        class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">{{ $item->created_at }}</span>
                                                </td>
                                                <td class="py-3 px-6 text-center">
                                                    <div class="flex item-center justify-center">
                                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer" >
                                                            <button class="inline-flex items-center readProductButton" id="readProductButton" data-toggle="modal" data-target="#addModal" data-role-name="{{$item->name}}" data-role-permisos="{{ json_encode($item->permissions) }}">
                                                            <svg class="w-5 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                            </svg>
                                                        </button>
                                                        </div>
                                                        <div
                                                            class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                            <a
                                                                href="{{ route('admin.roles.edit', ['role' => $item->id]) }}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                                </svg>
                                                            </a>
                                                        </div>
                                                        <div
                                                            class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">

                                                            <form class="form-delete"
                                                                action="{{ route('admin.roles.destroy', ['role' => $item->id]) }}"
                                                                method="post" x-data>
                                                                @csrf
                                                                {{ method_field('DELETE') }}
                                                                <input type="hidden" name="category_name"
                                                                    value="{{ $item->name }}">
                                                                <button type="submit" class="inline-flex items-center">
                                                                    <svg class="w-5 h-4" xmlns="http://www.w3.org/2000/svg"
                                                                        fill="none" viewBox="0 0 24 24"
                                                                        stroke="currentColor">
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
                                {{ $role->links() }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('js')

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

        $(document).ready(function() {
            
        $('#example tbody').on('click', '.readProductButton', function() {
            const roleName = $(this).data('role-name');
            const permissionsData = $(this).data('role-permisos');
        const permissionsContent = permissionsData.map(permission => `<p>${permission.description}</p>`).join('');
            $('#roleName').text("Rol: " + roleName);
            $('#permissionsContent').empty();
            $('#permissionsContent').html(permissionsContent);
            

            $('#addModal').removeClass('hidden');
        });

        

        $('.form-delete').submit(function(e) {
            e.preventDefault();
            const categoryName = e.target.querySelector("input[name='category_name']").value;
            Swal.fire({
                title: `¿Estás seguro de que deseas eliminar el rol "${categoryName}"?`,
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


    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
@endsection
