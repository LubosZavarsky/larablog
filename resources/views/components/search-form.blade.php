{{-- kustóm searchform --}}

<form action="{{ route('posts.index') }}" method="GET" class="flex items-start my-5 border-t py-3" >
    <input type="text" name="search" placeholder="Search posts" required/>
    <div class="flex ml-3 relative top-2">
        <button type="submit" class="text-slate-100">🔎</button>
        <a href="/posts" class="ml-2 text-slate-1002">✖️</a>
    </div>       
</form>