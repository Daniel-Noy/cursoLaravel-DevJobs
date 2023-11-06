<div class="sm:flex sm:justify-center p-5">
    <form class=" sm:w-10/12 md:w-2/3 lg:w-1/2 space-y-4"
    wire:submit='save'
    >
    <div>
        <x-forms.input-label
        for="title"
        :value="__('Titulo')" />

        <x-forms.text-input 
        id="title"
        class="block mt-1 w-full"
        type="text"
        wire:model="form.title"
        :value="old('title')"
        placeholder="Titulo de la vacante"
        />

        <x-forms.input-error :messages="$errors->get('form.title')" class="mt-2" />
    </div>

    <div>
        <x-forms.input-label
        for="salary"
        :value="__('Salario Mensual')" />

        <x-forms.select id="salary" class="block mt-1 w-full"
        wire:model="form.salary_id"
        :value="old('salary')"
        :options="$salaries"
        />

        <x-forms.input-error :messages="$errors->get('form.salary')" class="mt-2" />
    </div>

    <div>
        <x-forms.input-label
        for="category"
        :value="__('Categoria')" />

        <x-forms.select id="category" 
        class="block mt-1 w-full"
        wire:model="form.category_id"
        :value="old('category')"
        :options="$categories"
        />

        <x-forms.input-error :messages="$errors->get('form.category')" class="mt-2" />
    </div>

    <div>
        <x-forms.input-label
        for="company"
        :value="__('Empresa')" />

        <x-forms.text-input 
        id="company"
        class="block mt-1 w-full"
        type="text"
        wire:model="form.company"
        :value="old('company')"
        placeholder="Empresa ej. Netflix, Uber, Shopify"
        />

        <x-forms.input-error :messages="$errors->get('form.company')" class="mt-2" />
    </div>

    <div>
        <x-forms.input-label
        for="deadline"
        :value="__('Fecha limite de postulación')" />

        <x-forms.text-input 
        id="deadline"
        class="block mt-1 w-full"
        type="date"
        wire:model="form.deadline"
        :value="old('deadline')"
        />

        <x-forms.input-error :messages="$errors->get('form.deadline')" class="mt-2" />
    </div>

    <div>
        <x-forms.input-label
        for="description"
        :value="__('Descripción del Puesto')" />

        <x-forms.text-area
        id="description"
        class="block mt-1 w-full"
        wire:model="form.description"
        rows="10"
        placeholder="Descripción del trabajo, Requisitos, Habilidades, etc."
        >
        {{ old('description') }}
        </x-forms.text-area>

        <x-forms.input-error :messages="$errors->get('form.description')" class="mt-2" />
    </div>

    <div>
        <x-forms.input-label
        for="image"
        class="cursor-pointer mb-1"
        :value="__('Imagen de la vacante')" />

        <label
        for="image"
        class="cursor-pointer inline-block mb-3 w-48 text-center p-2 border-gray-300 bg-gray-300 hover:bg-gray-400 dark:border-gray-700 dark:bg-gray-900 dark:hover:bg-gray-950 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm uppercase"
        >Seleccionar</label>

        <x-forms.text-input 
        id="image"
        class="hidden"
        type="file"
        accept='image/*'
        wire:model="image"
        />
        <x-forms.input-error :messages="$errors->get('image')" class="mt-2" />
    </div>

    @if ($image)
        <div class="w-max max-w-md mx-auto">
            <img src="{{ $image->temporaryUrl() }}">
        </div>
    @endif

    <x-buttons.primary-button>
        Crear Vacante
    </x-buttons.primary-button>
    </form>
</div>
