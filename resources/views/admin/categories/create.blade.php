@extends('admin.index')


@section('header')
<div class="bg-rose-500 p-4 text-center rounded-lg shadow-lg">
  <h1 class="text-2xl font-semibold text-white uppercase">Categorias</h1>
</div>
    
@endsection
@section('container')

<div class="py-120">
    <!-- component -->
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{route('admin.categories.index')}}" class="inline-flex items-center px-4 py-2 
        bg-gray-800 border border-transparent rounded-md font-semibold text-xs 
        text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 
        active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 
        focus:ring-offset-2 transition ease-in-out duration-150 ml-4">
            {{ __('Lista de Categorias') }}
            </a>
            
    </div>
<br>

    
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

            <div class="w-full  md:max-w-full mx-auto">
                <div class="p-6 border border-gray-300 sm:rounded-md">
                  <form method="POST" 
                  @if ($categories->id)
                  action="{{route('admin.categories.update', ['category'=>$categories->id])}}"
                  @else
                  action="{{route('admin.categories.store')}}"
                  @endif
                 >

                 @if ($categories->id)
                 {{method_field("PUT")}}
                 @endif
                    @csrf
                    <label class="block mb-6">
                      <span class="text-gray-700">Nombre</span>
                      <input
                        name="nombre"
                        type="text"
                        class="
                          block
                          w-full
                          mt-1
                          border-gray-300
                          rounded-md
                          shadow-sm
                          focus:border-indigo-300
                          focus:ring
                          focus:ring-indigo-200
                          focus:ring-opacity-50
                        "
                        value="{{old('nombre', $categories->nombre)}}"
                        
                      />
                      @error('nombre')
                      <span class=" text-sm text-red-600" role="alert">
                        <strong>{{ $message }}</strong>
                      @enderror
                    </label>
                    
                    <label class="block mb-6">
                      <span class="text-gray-700">Descripcion</span>
                      <textarea
                        name="descripcion"
                        class="
                          block
                          w-full
                          mt-1
                          border-gray-300
                          rounded-md
                          shadow-sm
                          focus:border-indigo-300
                          focus:ring
                          focus:ring-indigo-200
                          focus:ring-opacity-50
                        "
                        rows="3"
                        placeholder="Detalles de categoria"
                    
                      >{{old('descripcion', $categories->descripcion)}}</textarea>
                      @error('descripcion')
                      <span class=" text-sm text-red-600" role="alert">
                        <strong>{{ $message }}</strong>
                      @enderror
                    </label>
                    <div class=" px-4 py-3  text-right sm:px-6 justify-center items-center ">
                        <div class="mb-6 ">
                            <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border 
        border-transparent shadow-sm text-sm font-medium rounded-md 
        text-white bg-indigo-600 hover:bg-indigo-700 
        focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Guardar
                            </button>
                        </div>
                    </div>
                    
                  </form>
                </div>
              </div>

        </div>
    </div>


</div>
@endsection