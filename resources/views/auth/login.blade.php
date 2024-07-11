<!-- resources/views/auth/login.blade.php -->
<x-guest-layout>
    <!-- Estilos personalizados -->
    <style>
        .content {
            position: relative;
            z-index: 1;
            /* Asegura que el contenido esté encima del fondo */
        }

        .custom-form {
            background: linear-gradient(to bottom left, rgba(255, 255, 255, 0.9), rgba(200, 200, 200, 0.253));
            /* Degradado */
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>

    <div class="full-page-background"></div>


    <div class="content d-flex align-items-center justify-content-center min-vh-100">
        <div class="custom-form bg-yellow-300">

            <div class="custom-form content d-flex align-items-center justify-content-center min-vh-100 mb-5">
                <h1 class="text-center font-weight-bold">FINANCE</h1>
            </div>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Correo')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                        :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Contraseña')" />

                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                            name="remember">
                        <span class="ms-2 text-sm text-white-900">{{ __('Recuerdame') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-white-600 hover:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('register') }}">
                        {{ __('No tienes cuenta?') }}
                    </a>

                    <x-primary-button class="ms-3">
                        {{ __('Ingresar') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
