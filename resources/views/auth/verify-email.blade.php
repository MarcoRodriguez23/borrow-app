<x-guest-layout>
    <h4 class="text-center my-3">Validar Email</h4>
    <div class="mb-4 text-sm text-gray-600 text-center">
        {{ __('Gracias por registrarte !!. Para tener acceso a la plataforma por favor verifica tu Email. Se te ha enviado un mensaje a la bandeja de tu Email para continuar con este paso.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('Un nuevo link de verificación a sido enviado a la bandeja de su Email.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Reenviar mensaje de confirmación') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>
