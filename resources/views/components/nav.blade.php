{{-- kustóm navbar ---> reg+login --}}
@if (Route::has('login'))
<nav class="relative top-0 right-0 px-6 py-4 bg-orange-300 w-full z-10 flex">
    @auth

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <a href="{{ route('logout') }}"  onclick="event.preventDefault();
            this.closest('form').submit();" class="text-sm text-gray-700 dark:text-gray-500 no-underline hover:underline">Logout</a>
          
        </form>

        <a href="/user/{{ auth()->user()->id }}" class="ml-auto hover:underline hover:decoration-dotted underline-offset-2">
            
            <strong>{{ Auth()->user()->name }}</strong>

        </a>       
        
    @else
        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 no-underline hover:underline">Log in</a>

        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 no-underline hover:underline">Register</a>
        @endif
    @endauth
</nav>
@endif