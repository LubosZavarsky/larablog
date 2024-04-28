@extends('layouts.master')  

@section('content')   

    @auth
        @include('posts.create')
    @endauth      
    
    <div>

        @foreach($posts as $post)

            @include('posts.article')

        @endforeach
    </div>    

    {{ $posts->links() }}

    <x-search-form />    
    
@endsection

