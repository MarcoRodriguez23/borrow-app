<x-app-layout>
    <x-slot name="header">
        <div id="parte superior">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{$user->name}} {{$user->lastname}}
            </h2>
            <img src="#" alt="foto de perfil">
            <img src="#" alt="fondo de perfil">
            @auth
            @if (auth()->user()->id == $user->id)
                <a href="{{route('profile.edit')}}">Editar perfil</a>  
            @else
                <p>Enviar solicitud de amistad</p>  
            @endif
            @endauth
            
        </div>
        <div id="parte inferior">
            <div id="parte izquierda">
                <h3>Datos</h3>
                <p>Conoce sobre mi</p>
                <div id="contenedor">
                    <p>texto sobre mi</p>
                </div>
            </div>
            <div id="parte derecha">
                <h3>Contactos</h3>
                <p>Agregados recientemente</p>
                <div id="contenedor-amigos">
                    <a href="">
                        <img src="#" alt="amigo">
                        nombre apellido
                    </a>
                </div>
            </div>
        </div>
    </x-slot>

    @auth
        <a href="{{route('profile.edit',auth()->user()->id)}}"></a>
    @endauth

   
</x-app-layout>