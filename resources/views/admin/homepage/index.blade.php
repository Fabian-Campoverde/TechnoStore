@extends('admin.index')


@section('header')

<div class="bg-rose-500 p-4 text-center rounded-lg shadow-lg">
    <h1 class="text-2xl font-semibold text-white uppercase">Dashboard</h1>
  </div>
@endsection

@section('container')
<br>

<div class="row">
    
    <div class="col-md-4">
        
        <x-adminlte-small-box title="{{$users}}" text="Usuarios registrados" icon="fas fa-user-plus text-teal"
        theme="primary" url="{{ route('admin.users.index') }}" url-text="Ir allá"/>
    </div>
    <div class="col-md-4">
        <x-adminlte-small-box title="{{$providers}}" text="Proveedores registrados" icon="fas fa-truck text-green"
        theme="primary" url="{{ route('admin.providers.index') }}" url-text="Ir allá"/>
    </div>
    <div class="col-md-4">
        <x-adminlte-small-box title="{{$products}}" text="Productos registrados" icon="fas fa-box-open text-black"
        theme="primary" url="{{ route('admin.products.index') }}" url-text="Ir allá"/>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <x-adminlte-small-box title="{{$categories}}" text="Categorias registrados" icon="fas fa-folder-open text-purple"
        theme="primary" url="{{ route('admin.categories.index') }}" url-text="Ir allá"/>
    </div>
    <div class="col-md-4">
        <x-adminlte-small-box title="{{$measures}}" text="Medidas registrados" icon="fas fa-ruler text-yellow"
        theme="primary" url="{{ route('admin.measures.index') }}" url-text="Ir allá"/>
    </div>
    <div class="col-md-4">
        <x-adminlte-small-box title="{{$brands}}" text="Marcas registradas" icon="fas fa-warehouse text-red"
        theme="primary" url="{{ route('admin.brands.index') }}" url-text="Ir allá"/>
    </div>
</div>
{{-- <div class="row">
    <div class="col-md-4">
        <x-adminlte-small-box title="{{$buyers}}" text="Clientes registrados" icon="fas fa-id-badge text-lime"
        theme="primary" url="{{ route('admin.buyers.index') }}" url-text="Ir allá"/>
    </div>
    <div class="col-md-4">
        <x-adminlte-small-box title="{{$invoices}}" text="Comprobantes registrados" icon="fas fa-file-invoice-dollar text-black"
        theme="primary" url="{{ route('admin.invoices.index') }}" url-text="Ir allá"/>
    </div>
    <div class="col-md-4">
        <x-adminlte-small-box title="{{$inputs}}" text="Compras registrados" icon="fas fa-shopping-cart text-indigo"
        theme="primary" url="{{ route('admin.inputs.index') }}" url-text="Ir allá"/>
    </div>
</div> --}}
{{-- <div class="flex space-x-4 " >
    <a href="{{ route('admin.categories.index') }}" class=" hover:underline">
        <div class="bg-white flex items-center border border-gray-200 rounded-t-lg shadow-md max-w-md">
            <div class="relative h-40">
                <img class="object-cover w-full h-full rounded-t-lg" src="https://www.ecommercenews.pe/wp-content/uploads/2017/07/tienda-online-810x405.png" alt="">
            </div>
            <div class="p-4">
                <h5 class="text-2xl font-bold text-gray-900 dark:text-white uppercase">Categorias</h5>
            </div>
        </div>
    </a>

    <a href="{{ route('admin.providers.index') }}" class=" hover:underline">
        <div class="bg-white flex items-center border border-gray-200 rounded-t-lg shadow-md max-w-md">
            <div class="relative h-40">
                <img class="object-cover w-full h-full rounded-t-lg" src="https://baloriza.com/wp-content/uploads/QUE-ES-UN-PROVEEDOR.jpg" alt="">
            </div>
            <div class="p-4">
                <h5 class="text-2xl font-bold text-gray-900 dark:text-white uppercase">Proveedores</h5>
            </div>
        </div>
    </a>

    <a href="{{ route('admin.measures.index') }}" class=" hover:underline">
        <div class="bg-white flex items-center border border-gray-200 rounded-t-lg shadow-md max-w-md">
            <div class="relative h-40">
                <img class="object-cover w-full h-full rounded-t-lg" src="https://http2.mlstatic.com/D_NQ_NP_783586-MLA31092780948_062019-O.webp" alt="">
            </div>
            <div class="p-4 items-center">
                <h5 class="text-2xl text-center font-bold text-gray-900 dark:text-white uppercase">Medidas</h5>
                 <p class="mb-3 text-center font-normal text-gray-700 dark:text-gray-400">X medidas registradas</p> 
            </div>
        </div>
    </a>

    
</div> --}}

@endsection

