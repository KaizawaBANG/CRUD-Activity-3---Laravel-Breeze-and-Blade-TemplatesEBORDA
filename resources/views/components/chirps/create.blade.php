@props(['oob' => true])

<form
    id="chirps-create"
    @if($oob)
        hx-swap-oob="true"
    @endif
    method="POST"
    action="{{ route('chirps.store') }}"
    hx-post="{{ route('chirps.store') }}"
    hx-target="#chirps"
    hx-swap="afterbegin"
>
    @csrf
    <textarea
        aria-label="message"
        name="message"
        placeholder="{{ __('What\'s on your mind?') }}"
        class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
    >{{ old('message') }}</textarea>
    <x-input-error :messages="$errors->get('message')" class="mt-2" />
    <x-primary-button class="mt-4 flex items-center space-x-2">
        <span>{{ __('Chirp') }}</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
            <path fill-rule="evenodd" d="M3.75 12a.75.75 0 0 1 .75-.75h12.69l-3.22-3.22a.75.75 0 0 1 1.06-1.06l4.5 4.5a.75.75 0 0 1 0 1.06l-4.5 4.5a.75.75 0 0 1-1.06-1.06l3.22-3.22H4.5a.75.75 0 0 1-.75-.75z" clip-rule="evenodd"/>
        </svg>
    </x-primary-button>
</form>
