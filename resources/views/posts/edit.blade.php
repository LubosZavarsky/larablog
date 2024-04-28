@extends('layouts.master')

@section('content')   

    <form action="/posts/{{ $post->id }}" method="POST" class="edit-form w-9/12 m-auto">
        @csrf
        @method('PATCH')


            <h1 class="text-2xl font-bold text-gray-200 mb-2">Edit, bitch!</h1>

            <textarea name="title" rows="1" class="edit-area w-full p-4 text-gray-600 bg-slate-100 rounded-md focus:ring-orange-300">{{ $post->title }}</textarea>
            <textarea name="text" rows="3" class="edit-area w-full p-4 text-gray-600 bg-slate-100 rounded-md focus:ring-orange-300">{{ $post->text }}</textarea>

            <x-form-validation-errors />

            <button class="bg-orange-300 p-3 mt-3 border border-slate-500 rounded-md font-bold hover:brightness-110" type="submit">Update</button>   
            <a href="{{ URL::previous() }}" class="ml-3 text-gray-200 hover:underline hover:decoration-dotted underline-offset-2">or go back</a>
            
    </form>   


@endsection