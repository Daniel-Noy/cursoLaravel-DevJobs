<div class="p-2 md:px-8 text-gray-800 dark:text-gray-200">
    <div class="mb-5">
        <h3 class="my-3 font-bold text-3xl">
            {{ $vacant->title }}
        </h3>

        {{--? Datos de la vacante  --}}
        <div class="md:grid md:grid-cols-2 p-3 bg-slate-50 dark:bg-gray-900 rounded">
            <p class="font-bold text-sm my-3">
                Empresa:
                <span class="font-normal">{{ $vacant->company }}</span>
            </p>

            <p class="font-bold text-sm my-3">
                Ultimo día para postularse:
                <span class="font-normal">{{ $vacant->deadline->toFormattedDateString() }}</span>
            </p>

            <p class="font-bold text-sm my-3">
                Categoria:
                <span class="font-normal">{{ $vacant->category->name }}</span>
            </p>

            <p class="font-bold text-sm my-3">
                Salario:
                <span class="font-normal">{{ $vacant->salary->salary }}</span>
            </p>
        </div>
    </div>

    {{--? Contenido Vacante --}}
    <div class="grid grid-cols-1 md:grid-cols-6 gap-4">
        <div class="md:col-span-4">
            {{--? Mensaje para iniciar sesión --}}
            @guest
            <div class="mb-5 p-5 text-center border border-dashed bg-gray-50 dark:bg-gray-900">
                <p>
                    Para Aplicar a esta u otras Vacantes debes 
                    <a href="{{ route('login') }}"
                    class="font-bold text-indigo-600"
                    >
                    Iniciar sesión 
                    </a>
                    con tu cuenta de DevJobs.
                </p>
            </div>
            @endguest
            
            {{--? Descripción vacante --}}
            <div>
                <h2 class="mb-5 text-2xl font-bold">
                    Descripción del puesto
                </h2>
                <p>{{ $vacant->description }}</p>
            </div>
        </div>

        <div class="md:col-span-2">
            <img src="{{ asset('storage/img/vacants/'.$vacant->image) }}" alt="Imagen vacante">
        </div>
    </div>

    @can('apply', App\Models\Vacant::class)
        @livewire('vacants.apply-vacant', ['vacantId' => $vacant->id])
    @endcan
</div>
