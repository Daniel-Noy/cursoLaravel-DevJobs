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
            >Último día {{ $vacant->deadline->format('Y-m-d') }}
            </p>
        </div>

        {{--? ---- Acciones ---- --}}
        <div class="flex flex-col md:flex-row gap-3 items-stretch md:items-center text-center">
            <a href="{{ route('applicants.index', $vacant) }}"
            class="py-4 md:py-2 px-4 bg-slate-700 dark:bg-slate-900 hover:bg-slate-700 rounded-lg text-white text-xs font-bold uppercase transition-colors duration-75"
            >
                {{ $vacant->applicants->count()}}
                Postulaciones
            </a>
            <a href="{{ route('vacants.edit', $vacant) }}"
            class="py-4 md:py-2 px-4 bg-blue-700 dark:bg-slate-700 hover:bg-blue-800 rounded-lg text-white text-xs font-bold uppercase transition-colors duration-75"
            >
                Editar
            </a>
            <button
            wire:click="$dispatch('confirm-delete', {id: {{ $vacant->id }}})"
            class="py-4 md:py-2 px-4 bg-red-600 dark:bg-red-900 hover:bg-red-700 rounded-lg text-white text-xs font-bold uppercase transition-colors duration-75"
            >
                Eliminar
            </button>
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

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const confirmAlert = Swal.mixin({
        titleText: 'Estas Seguro?',
        text: 'No podrás revertir esta acción',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar',
        cancelButtonText: 'Cancelar'
    })
    
    const deletedAlert = Swal.mixin({
        title: 'Eliminada',
        text: 'Has eliminado la vacante.',
        icon: 'success'
    })

    document.addEventListener('livewire:initialized', ()=> {
        @this.on('confirm-delete', ({id})=> {
            confirmAlert.fire().then((result) => {
                if (result.isConfirmed) {
                    @this.dispatch('delete-vacant', {id})
                    deletedAlert.fire()
                }
            })
        })
    })
</script>
@endpush