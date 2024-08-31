<div>
    


    <div class="py-120">

{{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <a href="{{route('admin.products.create')}}" class="inline-flex items-center px-4 py-2 
    bg-gray-800 border border-transparent rounded-md font-semibold text-xs 
    text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 
    active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 
    focus:ring-offset-2 transition ease-in-out duration-150 ml-4">
        {{ __('Agregar nuevo producto') }}
        </a>
        
</div> --}}


   
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        @if (session('status'))
        <br>
        <div id="alert-1" class="flex items-center p-4 mb-4 text-{{session('color')}}-800 rounded-lg bg-{{session('color')}}-50"  role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div class="ml-3 text-sm font-medium">
                {{ session('message') }}
            </div>
              <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-dark-50 text-dark-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8" data-dismiss-target='#alert-1' aria-label='Close' >
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
    </div>
    @endif 
    <br>

    
    <div class="bg-white overflow-hidden sm:rounded-lg " >
        <div class="overflow-x-auto ">
            
                
                  <!-- Start coding here -->
                  <div class=" bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                    <div class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                      <div class="w-full md:w-1/2">
                        <form class="flex items-center">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                              <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                              </div>
                              <input wire:model="searchTerm" wire:keydown.debounce.500ms="search" type="search"  class="block w-full p-200 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search">
                            </div>
                          </form>
                      </div>
                      <div class="flex flex-col items-stretch justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
                        <a type="button" href="{{route('admin.products.create')}}" class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                              
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                              <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Agregar Producto
                          </a>
                        <div class="flex items-center w-full space-x-3 md:w-auto">
                          <button type="button" class="flex items-center justify-center flex-shrink-0 px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg focus:outline-none hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                            </svg>
                            Export
                        </button>
                          
                          <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown" class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg md:w-auto focus:outline-none hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="w-4 h-4 mr-2 text-gray-400" viewbox="0 0 20 20" fill="currentColor">
                              <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" />
                            </svg>
                            Filter
                            <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                              <path clip-rule="evenodd" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                            </svg>
                          </button>
                          
                          <!-- Dropdown menu -->
                          
                          <div id="filterDropdown" class="z-10 hidden w-48 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                            <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">
                                Categorias
                            </h6>
                            <form wire:submit.prevent="filterCategories">
                              <ul class="space-y-2 text-sm" aria-labelledby="dropdownDefault">
                                  @foreach ($categoriesWithCount as $item)
                                      <li class="flex items-center">
                                          <input wire:model.defer="selectedCategories" wire:change="filterCategories" id="{{$item->nombre}}" type="checkbox" value="{{$item->id}}"
                                                 class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                                          <label for="{{$item->nombre}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                              {{$item->nombre}} ({{$item->productCount}})
                                          </label>
                                      </li>
                                  @endforeach
                              </ul>
                          </form>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                  </div>
        </div>
    </div>
        
                
            
<div class=" bg-white relative overflow-x-auto shadow-md sm:rounded-lg">
    @if ($products->count())
    <table class="min-w-max w-full table-auto dark:text-gray-400" id="product-table">
        <thead class="text-xs text-dark-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="p-4">
                    <div class="flex items-center">
                        <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                    </div>
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Codigo
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Categoria
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Medida
                </th>
                
                <th scope="col" class="px-6 py-3 text-center">
                    Stock
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                  Stock de Alerta
              </th>
              <th scope="col" class="px-6 py-3 text-center">
                Precio de Compra
            </th>
            <th scope="col" class="px-6 py-3 text-center">
                Precio de Venta
            </th>
              <th scope="col" class="px-6 py-3 text-center">
                Estado
            </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody class="text-blue-900 text-sm font-dark">
            <tr class="bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
              @foreach ($products as $product)
              <td class="w-4 p-4">
                    <div class="flex items-center">
                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                    </div>
                </td>
               
                                   
                <th scope="row" class="px-6 text-center py-4  font-medium  whitespace-nowrap dark:text-white">
                     {{$product->codigoId}}
                </th>
                <th scope="row" class=" flex items-center px-6 py-4  text-left text-gray-900 whitespace-nowrap dark:text-white">
                        
                  <div class="mr-2">
                    <img class="w-10 h-10 rounded-pill zoom" src="{{asset($product->image_url)}}" 
                    />
                </div>
                    <div class="pl-3">
                        <div class="text-base font-semibold">{{$product->nombre}}</div>
                        
                    </div> 
                    
                </th>
                <td class="px-6 py-4 text-center">
                    <span class="bg-primary-100 text-primary-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">
                        {{$product->category->nombre}}    </span>
                    
                </td>
                <td class="px-6 py-4 text-center">
                    {{$product->measure->nombre}}
                </td>
                @php
                    if ($product->stock>$product->stock_minimo ) {
                        $color= "green";
                    }
                    else{
                        $color= "red";
                    }
                @endphp
                <td class="px-6 py-4 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <div class="flex items-center">
                        <div class="inline-block w-4 h-4 mr-2 bg-{{$color}}-700 rounded-full"></div>
                        {{$product->stock}}
                    </div>
                </td>
                {{-- <td class="px-6 py-4 text-center">
                  {{$product->stock}}
              </td> --}}
                <td class="px-6 py-4 text-center">
                    {{$product->stock_minimo}}
                </td>
                <td class="px-6 py-4 text-center">
                    S/. {{$product->precio_compra}}
                </td>
                <td class="px-6 py-4 text-center">
                    S/. {{$product->precio_venta}}
                </td>
                <td class="px-6 py-4 text-center">
                    @if ($product->estado==="A")
                    <span
                    class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600"
                  >
                    <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
                    Activo
                  </span>
                    @else

                    <span
                      class="inline-flex items-center gap-1 rounded-full bg-red-50 px-2 py-1 text-xs font-semibold text-red-600"
                    >
                      <span class="h-1.5 w-1.5 rounded-full bg-red-600"></span>
                      Inactivo
                    </span>
                    @endif
                  </td>
                {{-- <td class="flex items-center px-6 py-4 space-x-3">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline">Remove</a>
                </td> --}}
                <td class="py-3 px-6 text-center">
                  <div class="flex item-center justify-center">
                      <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                          </svg>
                      </div>
                      <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                          <a href="{{ route('admin.products.edit', ['product'=>$product->id]) }}" > 
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                          </svg>
                      </a>
                      </div>
                      <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                          <form class="form-delete" method="POST" action="{{ route('admin.products.destroy', ['product'=>$product->id]) }}" x-data>
                              @csrf
                              {{ method_field("DELETE")}}
                              <input type="hidden" name="product_name" value="{{ $product->nombre }}">
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
    <div class="px-6 py-4">
        {{ $products->links() }}
    </div>
    @else     
    <span class=" text-sm text-red-600" role="alert">
      <strong>No hay registros </strong>
    
  @endif
</div>

       
    </div>
    
    <br>
</div>
    
   

    
