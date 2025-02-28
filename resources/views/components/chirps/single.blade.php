@props(['chirp', 'withCreateForm' => false])

@if($withCreateForm)
    <x-chirps.create></x-chirps.create>
@endif

<div class="p-6 flex space-x-2 chirp">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
    </svg>
    <div class="flex-1">
        <div class="flex justify-between items-center">
            <div>
                <span class="text-gray-800">{{ $chirp->user->name }}</span>
                <small class="ml-2 text-sm text-gray-600">{{ $chirp->created_at->format('j M Y, g:i a') }}</small>
                @unless ($chirp->created_at->eq($chirp->updated_at))
                    <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                @endunless
            </div>
            @if ($chirp->user->is(auth()->user()))
                <x-dropdown>
                    <x-slot name="trigger">
                    <button type="button" class="button button--alt"p-2 rounded-full bg-gray-200 hover:bg-gray-300 focus:outline-none>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 6a1.5 1.5 0 110-3 1.5 1.5 0 010 3zm0 5a1.5 1.5 0 110-3 1.5 1.5 0 010 3zm0 5a1.5 1.5 0 110-3 1.5 1.5 0 010 3z" />
                            </svg>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link
                            :href="route('chirps.edit', $chirp)"
                            hx-get="{{ route('chirps.edit', $chirp) }}"
                            hx-target="closest .chirp"
                            hx-swap="outerHTML"
                        >
                            📝 {{ __('EDIT') }}
                        </x-dropdown-link>
                        <form method="POST"
                              action="{{ route('chirps.destroy', $chirp) }}"
                              hx-delete="{{route('chirps.destroy', $chirp)}}"
                              hx-target="closest .chirp"
                              hx-swap="delete"
                        >
                            @csrf
                            @method('delete')
                            <x-dropdown-link
                                :component="'button'"
                                type="submit"
                                hx-get="{{ route('chirps.confirm-destroy', $chirp) }}"
                                hx-swap="beforeend"
                                hx-target="closest .chirp"
                            >
                                ❌ {{ __('DELETE') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            @endif
        </div>
        <p class="mt-4 text-lg text-gray-900">{{ $chirp->message }}</p>
    </div>
</div>
