<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Solicitudes de contacto') }}
        </h2>
    </x-slot>

    <div class="py-12 w-4/5 mx-auto">
        <h1>Aqui van las solicitudes que me han mandado</h1>
    
        @foreach ($solicitudes as $solicitud)
            <div>
                <h1>{{$solicitud->name}} {{$solicitud->lastname}} te envio solicitud</h1>
                {{-- <a href="{{route('/profile.index',['user'=>$solicitud])}}">Visitar Perfil</a> --}}
                <p>Rechazar</p>
            </div>
        @endforeach
    </div>


</x-app-layout>