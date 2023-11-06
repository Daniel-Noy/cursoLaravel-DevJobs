<div>
    @forelse ($vacants as $vacant)
    <div class=" flex flex-col md:flex-row justify-between gap-5 md:items-center m-2 p-6 dark:text-gray-200 dark:hover:text-white bg-white dark:bg-gray-800 border dark:border-0 border-gray-50 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="leading-8">
            <a 
            class="text-xl font-semibold"
            href="{{ route('vacants.show', $vacant) }}">
                {{$vacant->title}}
            </a>
            <p class="text-sm font-bold text-gray-600">
                {{$vacant->company}}
            </p>
            <p class="text-sm text-gray-500"
            >Último día {{ $vacant->deadline->format('d/m/Y') }}
            </p>
        </div>

        <div class="flex flex-col md:flex-row gap-3 items-stretch md:items-center text-center">
            <a href=""
            class="py-4 md:py-2 px-4 bg-slate-700 dark:bg-slate-900 hover:bg-slate-600 rounded-lg text-white text-xs font-bold uppercase"
            >
                Postulaciones
            </a>
            <a href="{{ route('vacants.edit', $vacant) }}"
            class="py-4 md:py-2 px-4 bg-blue-700 dark:bg-slate-700 hover:bg-blue-800 rounded-lg text-white text-xs font-bold uppercase"
            >
                Editar
            </a>
            <a href=""
            class="py-4 md:py-2 px-4 bg-red-600 dark:bg-red-900 hover:bg-red-700 rounded-lg text-white text-xs font-bold uppercase"
            >
                Eliminar
            </a>
        </div>
    </div>

    @empty
        <p class="p-3 text-center text-sm text-gray-600">
            Aún no tienes vacantes, puedes
            <a 
            href="{{ route('vacants.create') }}"
            class="hover:underline text-indigo-600"
            >crear una ahora.</a>
        </p>
    @endforelse

    <div class="mt-10 w-full">
        {{ $vacants->links() }}
    </div>
</div>

