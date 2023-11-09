<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('forms.forgot-pass-steps') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-forms.input-label for="email" :value="__('Email')" />
            <x-forms.text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-forms.input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex justify-between my-4">
            @if (Route::has('password.request'))
                <x-links.link :href="route('login')">
                    Iniciar Sesión
                </x-links.link>
                
                <x-links.link :href="route('register')">
                        Crear Cuenta
                </x-links.link>
            @endif
        </div>

        <div class="flex items-center mt-4">
            <x-forms.submit-button>
                {{ __('forms.forgot-pass-btn') }}
            </x-forms.submit-button>
        </div>
    </form>
</x-guest-layout>
