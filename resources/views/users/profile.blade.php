@extends('layouts.master')

@section('content')
    <h1 class="font-bold text-gray-300 text-center text-4xl">{{ $user->name}} has {{ $posts->count()}} posts</h1>
     
    {{-- {{ $user->posts}} --}}

    <ul class="text-gray-300 text-center text-2xl mt-3">    
        @foreach ($user->posts as $post)
            
            <li>
                <a href="/posts/{{ $post->id }}" class="hover:text-red-500 hover:underline hover:decoration-dotted underline-offset-2">
                    {{ $post->title }}
                </a>            
            </li>
            
        @endforeach
    </ul>  

@endsection



