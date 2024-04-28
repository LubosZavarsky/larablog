@php
    use Illuminate\Support\Str;
    
    //dd(  $post );
@endphp


<article class=" p-2 mb-3 border-2 border-black  rounded-md bg-slate-100">

    <header>
        <h1> 
            <a href="/posts/{{ $post->id }}" class="hover:underline hover:decoration-dotted underline-offset-2 font-bold">
                {{ $post->title }} 
            </a>   
        </h1> 
    </header>     
    
    <div>
        <p class="whitespace-pre-wrap"> {{ $post->text }} </p>
    </div>

    <footer class="mt-2">
        <div class="flex">
            <a href="/user/{{ $post->user->id }}" class="hover:underline hover:decoration-dotted underline-offset-2 font-bold">
                <small class="text-red-500"> {{ $post->user->name }} </small> 
            </a>
    
            <a href="/posts/{{ $post->id }}#comments" class="hover:underline hover:decoration-dotted underline-offset-2 font-bold ml-2">
                <small>
                    {{ $post->comments->count() }}
                    {{ Str::plural('comment', $post->comments->count() ) }}
                </small>           
            </a>
            {{-- edit + delete links --}}
            @can('update', $post)
                <div class="flex text-sm ml-auto">
                    
                    <a href="/posts/{{ $post->id }}/edit" class="hover:underline hover:decoration-dotted underline-offset-2 ml-2">edit</a>
                            
                    
                    <form action="/posts/{{ $post->id }}" method="POST" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button class="hover:underline hover:decoration-dotted underline-offset-2 ml-2" type="submit">delete</button>
                    </form>
                
                </div>  
            @endcan  

        </div>
        
        <time datetime="{{ $post->created_at->toW3cString() }}" class="text-xs">
            {{ $post->created_at->diffForHumans() }}
        </time>

    </footer>         
   

    {{-- @foreach($post->comments as $comment)
        <p>
            <i> {{ $comment->text }} </i>
        </p>                
    @endforeach --}}

</article>