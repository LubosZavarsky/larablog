
<article class="w-2/3 mx-auto mb-4 p-3 border rounded-md border-slate-500 bg-slate-100 ">
    <p class="comment-text mb-2">
        {{ $comment->text }}
    </p>    

    <footer class="flex">
        <a href="/user/{{ $comment->user->id }}" class="text-sm text-red-500 hover:underline hover:decoration-dotted underline-offset-2">
            {{ $comment->user->name }}
        </a>
        <time datetime="{{ $comment->created_at->toW3cString() }}" class="text-xs ml-1 relative top-0.5">
            {{ $comment->created_at->diffForHumans() }}
        </time>

        @can('update', $comment)
            <div class="flex text-sm ml-auto">
                
                <a href="/comments/{{ $comment->id }}/edit" class="hover:underline hover:decoration-dotted underline-offset-2 ml-2">edit</a>
                        
                
                <form action="/comments/{{ $comment->id }}" method="POST" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <button class="hover:underline hover:decoration-dotted underline-offset-2 ml-2" type="submit">delete</button>
                </form>
            
            </div>            
        @endcan
        
        
    </footer>
</article>