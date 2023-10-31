<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Nueva Vacante') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-3">
                <h1 class=" mt-4 mb-10 text-2xl font-bold text-center text-gray-800 dark:text-gray-200">Publicar Vacante</h1>
                @livewire('vacants.create-vacant')
            </div>
        </div>
    </div>
</x-app-layout>
