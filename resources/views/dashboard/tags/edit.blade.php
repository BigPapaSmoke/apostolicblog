<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('tags') }}
        </h2>
    </x-slot>

    <x-slot name="nav">
        <div class="space-x-4">
            {{-- Index --}}
            <x-nav-link href="{{ route('tags.index') }}" :active="request()->routeIs('tags.index')">
                {{ __('Index') }}
            </x-nav-link>

            {{-- Create --}}
            <x-nav-link href="{{ route('tags.create') }}" :active="request()->routeIs('tags.create')">
                {{ __('Create') }}
            </x-nav-link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">

                <div class="p-6">
                    <form action="{{ route('tags.update', $tag) }}" method="POST">
                        @csrf

                        @method('PUT')

                        <div>
                            <x-label for="name" value="{{ __('Name') }}" />
                            <x-input id="name" class="block w-full mt-1" type="text" name="name" :value="$tag->name" required autofocus autocomplete="name" />
                            <span class="mt-2 text-xs text-gray-500">Maximum 200 characters</span>
                            <x-input-error for="name" class="mt-2" />
                        </div>

                        <x-button class="mt-12">
                            {{ __('Update') }}
                        </x-button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
