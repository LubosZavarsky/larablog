{{-- kustóm form valid. error messages --}}
@if ($errors->any())
        <ul class="mt-3 list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>        
@endif