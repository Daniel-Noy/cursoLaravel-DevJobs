<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mis Notificaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <h3 class="font-semibold leading-loose text-lg text-gray-800 dark:text-gray-200">Notificaciones nuevas</h3> --}}
            @forelse ($notifications as $notification)
            <a href="" class="cursor-pointer">
                <div class="flex flex-col md:flex-row justify-between gap-3 md:items-center p-6 dark:text-gray-200 dark:hover:text-white bg-white dark:bg-gray-800 border dark:border-0 border-gray-50 overflow-hidden shadow-sm sm:rounded-lg">
                    <p>Nuevo candidato en: <span class="font-bold">{{ $notification->data['vacantName']}}</span></p>
                    <p class="text-sm">Hace <span class="font-bold">{{ $notification->created_at->diffForHumans() }}</span></p>
                </div>
            </a>
            
            @empty
                <p class="text-center dark:text-gray-200 text-gray-600">No hay Notificaciones Nuevas</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
