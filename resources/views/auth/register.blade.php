<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-forms.input-label for="name" value='Nombre' />
            <x-forms.text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-forms.input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-forms.input-label for="email" value='Email' />
            <x-forms.text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-forms.input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Rol -->
        <div class="mt-4">
            <x-forms.input-label for="rol" value='¿Que tipo de cuenta buscas crear?' />
            <x-forms.select id="rol" class="block mt-1 w-full"
                name="rol"
                :value="old('rol')"
                :options="[
                    '1' => 'Reclutador - Publicar Empleo',
                    '2' => 'Desarrollador - Obtener Empleo',
                    ]" />
            <x-forms.input-error :messages="$errors->get('rol')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-forms.input-label for="password" :value="__('forms.Password')" />

            <x-forms.text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-forms.input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-forms.input-label for="password_confirmation" value='Confirmar Contraseña' />

            <x-forms.text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-forms.input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex justify-between my-4">
            @if (Route::has('password.request'))
                <x-links.link :href="route('login')">
                        ¿Ya tienes Cuenta? Inicia Sesión
                </x-links.link>

                <x-links.link :href="route('password.request')">
                    {{ __('forms.forgot-pass-txt') }}
                </x-links.link>    
            @endif
        </div>
        
        <x-buttons.primary-button>
            Registrate
        </x-buttons.primary-button>
    </form>
</x-guest-layout>
