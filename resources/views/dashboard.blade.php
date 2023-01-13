<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Home') }}
            </h2>
            <a href="{{route('item.index')}}">Crear nuevo articulo</a>
        </div>
    </x-slot>

    <div class="py-12 w-4/5 mx-auto">
        <div class="md:grid md:grid-cols-3 text-center">
            <div>
                <h3>
                    Articulos de mis contactos
                </h3>
                <div class="bg-orange-400">
                    aqui van los articulos
                </div>
            </div>
            <div>
                <h3>
                    Articulos solicitados
                </h3>
                <div class="bg-orange-400">
                    aqui van los articulos
                </div>
            </div>
            <div>
                <h3>
                    Mis articulos
                </h3>
                <div class="bg-orange-400">
                    aqui van los articulos
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
