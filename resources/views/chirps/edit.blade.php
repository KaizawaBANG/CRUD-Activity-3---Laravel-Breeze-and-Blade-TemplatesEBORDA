<x-app-layout>
    <div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">{{ __('Edit Chirp') }}</h2>
        <form method="POST" action="{{ route('chirps.update', $chirp) }}" class="space-y-4">
            @csrf
            @method('patch')
            
            <textarea
                name="message"
                class="w-full h-32 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400"
                placeholder="Update your chirp..."
            >{{ old('message', $chirp->message) }}</textarea>
            
            <x-input-error :messages="$errors->get('message')" class="text-red-500 text-sm" />
            
            <div class="flex justify-end space-x-3">
                <a href="{{ route('chirps.index') }}" class="px-4 py-2 text-gray-600 bg-gray-200 rounded-lg hover:bg-gray-300">
                    {{ __('Cancel') }}
                </a>
                <x-primary-button class="px-5 py-2 flex items-center space-x-2">
                    <x-heroicon-o-pencil class="w-5 h-5" />
                    <span>{{ __('Save') }}</span>
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
