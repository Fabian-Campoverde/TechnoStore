@extends('admin.index')


@section('header')
<div class="bg-blue-500 p-4 text-center rounded-lg shadow-lg">
    <h1 class="text-2xl font-semibold text-white uppercase">Usuarios</h1>
  </div>
    
@endsection
@section('container')

<div class="py-120">
    <!-- component -->
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{route('admin.users.index')}}" class="inline-flex items-center px-4 py-2 
        bg-gray-800 border border-transparent rounded-md font-semibold text-xs 
        text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 
        active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 
        focus:ring-offset-2 transition ease-in-out duration-150 ml-4">
            {{ __('Lista de Usuarios') }}
            </a>
            
    </div>
<br>

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

        <div class="w-full  md:max-w-full mx-auto">
            <div class="p-6 border border-gray-300 sm:rounded-md">
                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white text-center">Creación de un usuario </h2>
        <form method="post" 
        @if ($user->id)
        action="{{route('admin.users.update',['user'=>$user->id])}}"
        @else
        action="{{route('admin.users.store')}}"  
        @endif
          
        
        enctype="multipart/form-data">
        @if ($user->id)
        {{method_field("PUT")}}
        @endif
            @csrf
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="sm:col-span-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombres completos</label>
                    <input type="text" value="{{old('name',$user->name)}}"
                     name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" >
                    @error('name')
                    <span class=" text-sm text-red-600" role="alert">
                        <strong>{{$message}}</strong>
                    @enderror
                </div>
                <div class="sm:col-span-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo Electronico <span class="text-red-600"> (Debe ser unico) </span></label>
                    
                    <input type="email" value="{{old('email',$user->email)}}"
                     name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="abc@gmail.com" >
                    @error('email')
                    <span class=" text-sm text-red-600" role="alert">
                        <strong>{{$message}}</strong>
                    @enderror
                </div>
                <div class="w-full">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nickname <span class="text-red-600"> (Debe ser unico)</label>
                    <input type="text" value="{{old('nickname',$user->nickname)}}"
                     name="nickname" id="nickname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  >
                    @error('nickname')
                    <span class=" text-sm text-red-600" role="alert">
                        <strong>{{$message}}</strong>
                    @enderror
                </div>
                <div class="w-full">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña</label>
                    <div class="flex items-center space-x-2">
                        <input
                            type="text"
                            value="{{ old('password', $user->password) }}"
                            @if ($user->id)
                                disabled
                            @endif
                            name="password"
                            id="password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        >
                        @if ($user->id)
                            
                        
                        <div class="flex items-center"> 
                            <input type="checkbox" id="togglePassword" class="appearance-none w-5 h-5 rounded-md border-gray-300 checked:bg-blue-600 checked:border-transparent focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 dark:checked:bg-blue-600 dark:checked:border-transparent" onclick="toggleInput()">
                            
                        </div>
                        @endif
                    </div>
                    @error('password')
                        <span class="text-sm text-red-600" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                {{-- <div class="w-full ">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Imagen</label>
                    <input type="file" name="image_url" id="image_url" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                </div> --}}
                <div class="w-full">
                <label class="block mb-6">
                    {{-- @if ($products->id)
                    <img class="w-10 h-10 rounded-full" src="{{asset($products->image_url)}}"/>
                    @endif --}}
                    @if ($user->id)
                                <img class="w-10 h-10 rounded-full" src="{{asset($user->image_url)}}"/>
                                @endif
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Imagen</label>
                    <input name="image_url" type="file" 
                        class="
                  block
                  w-full
                  mt-1
                  focus:border-indigo-300
                  focus:ring
                  focus:ring-indigo-200
                  focus:ring-opacity-50
                " />
                @error('image_url')
                <span class=" text-sm text-red-600" role="alert">
                    <strong>{{$message}}</strong>
                @enderror
                </label>
                </div>

                <div class="w-full">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Roles</label>
                    <ul class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        @foreach ($roles as $role) 
                        <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                            <div class="flex items-center ps-3">
                                <input name="roles[]" type="checkbox" value="{{ $role->id }}" {{ in_array($role->id, old('roles', $user->roles->pluck('id')->toArray())) ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="vue-checkbox" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $role->name }}</label>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    {{-- <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Roles</label>
                      
                        <div class="flex items-center mb-4">
                            <input name="roles[]" type="checkbox" value="{{ $role->id }}" class="h-5 w-5 text-primary-500 border-gray-300 rounded focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                            <label for="checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $role->name }}</label>
                        </div>
                    @endforeach --}}
                
                    @error('roles')
                        <span class="text-sm text-red-600" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                
                
            </div>
            <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                Guardar
            </button>
        </form>
    </div>
        </div>
        
    </div>
    
</div>

</div>
<br>
</div>
@endsection

@section('js')
<script>
    function toggleInput() {
        const input = document.getElementById('password');
        const checkbox = document.getElementById('togglePassword');

        if (checkbox.checked) {
            input.removeAttribute('disabled');
        } else {
            input.setAttribute('disabled', 'disabled');
        }
    }
</script>
@endsection