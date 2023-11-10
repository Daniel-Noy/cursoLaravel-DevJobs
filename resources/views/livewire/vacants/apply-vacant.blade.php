<div class="flex flex-col justify-center items-center mt-10 p-5 bg-gray-100 dark:bg-gray-900">
    @if (!$isApplied)
        <h3 class="my-4 text-center text-2xl font-bold"> Postularse a la vacante</h3>
        
        <form 
            class="mt-5 w-96"
            wire:submit='save'
        >
        <div class="mb-8">
            <x-forms.input-label class="mb-2" for="cv" value="Tu CV / Hoja de Vida*"/>
            <x-forms.text-input
                class="block w-full"
                type="file"
                id="cv"
                wire:model="cv"
                accept=".pdf"/>
            <x-forms.input-error :messages="$errors->get('cv')" class="mt-2"/>
        </div>

        <x-forms.submit-button>
            Postularme
        </x-forms.submit-button>
        </form>
    @else
        <h3 class="my-4 text-center text-2xl font-bold">Ya te has postulado a la vacante</h3>
        <p class="text-center">Puedes revisarla en tu perfil o buscar otras vacantes</p>
    @endif
</div>
