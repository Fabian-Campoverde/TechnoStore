@extends('admin.index')


@section('header')
<div class="bg-emerald-500 p-4 text-center rounded-lg shadow-lg">
  <h1 class="text-2xl font-semibold text-white uppercase">Proveedores</h1>
</div>
    
@endsection
@section('container')

<div class="py-120">
    <!-- component -->
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{route('admin.providers.index')}}" class="inline-flex items-center px-4 py-2 
        bg-gray-800 border border-transparent rounded-md font-semibold text-xs 
        text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 
        active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 
        focus:ring-offset-2 transition ease-in-out duration-150 ml-4">
            {{ __('Lista de Proveedores') }}
            </a>
            
    </div>
<br>

    
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

            <div class="w-full  md:max-w-full mx-auto">
                <div class="p-6 border border-gray-300 sm:rounded-md">
                  <form method="POST" 
                  @if ($providers->id)
                  action="{{route('admin.providers.update', ['provider'=>$providers->id])}}"
                  @else
                  action="{{route('admin.providers.store')}}"
                  @endif
                  > 
                  @if ($providers->id)
                  {{method_field("PUT")}}
                  @endif
                    @csrf
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                      <div class="sm:col-span-2">
                          <label for="razon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Razon Social</label>
                          <input type="text" name="razon_social"  value="{{old('razon_social', $providers->razon_social)}}"
                          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Pepsico Iberia Servicios Centrales, S.L." >
                          @error('razon_social')
                          <span class=" text-sm text-red-600" role="alert">
                            <strong>{{ $message }}</strong>
                          @enderror
                        </div>
                      <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre Comercial</label>
                        <input type="text" name="nombre"  value="{{old('nombre', $providers->nombre)}}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Pepsi" >
                        @error('nombre')
                        <span class=" text-sm text-red-600" role="alert">
                          <strong>{{ $message }}</strong>
                        @enderror
                      </div>
                      <div class="w-full">
                          <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">RUC</label>
                          <input type="text" name="ruc"  value="{{old('ruc', $providers->ruc)}}"
                          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="10734677071 " >
                          @error('ruc')
                          <span class=" text-sm text-red-600" role="alert">
                            <strong>{{ $message }}</strong>
                          @enderror
                        </div>
                      <div class="w-full">
                          <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefono</label>
                          <input type="text" name="telefono"  value="{{old('telefono', $providers->telefono)}}"
                          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="950915951" >
                          @error('telefono')
                          <span class=" text-sm text-red-600" role="alert">
                            <strong>{{ $message }}</strong>
                          @enderror
                        </div>
                      <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Direccion</label>
                        <input type="text" name="direccion"  value="{{old('direccion', $providers->direccion)}}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Av. Balta 123" >
                        @error('direccion')
                        <span class=" text-sm text-red-600" role="alert">
                          <strong>{{ $message }}</strong>
                        @enderror
                      </div>
                      
                  </div>

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