@if ($errors->any())
    <div {{ $attributes }}>
        <div class="font-medium text-red-600">{{ __('Upps! Sucedió un error.') }}</div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            {{-- @if ($error === 'The password must be at least 8 characters.')
            <li>La contraseña debe tener al menos 8 caracteres.</li>
            @else
            <li>{{ $error }}</li>
            @endif --}}
                
            @endforeach
        </ul>
    </div>
@endif
