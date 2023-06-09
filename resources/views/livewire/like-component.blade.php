{{-- Close your eyes. Count to one. That is how long forever feels. --}}
<div>
    <div class="flex gap-2 items-center">
        @auth
            <button {{-- De esta forma accedemos a los eventos --}} wire:click="like" {{-- Cuando demos click va a buscar la funcion llamada like --}}>
                <svg xmlns="http://www.w3.org/2000/svg" fill="{{ $is_liked ? 'red' : 'white' }}" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                </svg>
            </button>
        @endauth

        @guest
            <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
            </svg>
        @endguest


        <p class="font-bold">{{ $likes }}
            <span class="font-normal"> {{ Str::pluralStudly('Like', $likes) }} </span>
        </p>
    </div>
</div>
