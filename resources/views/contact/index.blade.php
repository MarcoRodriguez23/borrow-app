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
                <h1>{{$solicitud->user->name}} {{$solicitud->user->lastname}} te envio solicitud</h1>
                <a href="{{route('profile.index',['user'=>$solicitud->user])}}">Visitar Perfil</a>
                
              <div id="rechazando solicitud">
                <form action="{{route('user.uncontact',['contact'=>$solicitud])}}"  method="POST">
                  @method('DELETE')
                  @csrf
                  <input type="submit" class="bg-red-600 text-white uppercase rounded-lg px-3 py-1 text-xs font-bold cursor-pointer" value="Rechazar">
                </form>
              </div>

              <div id="rechazando solicitud">
                <form action="{{route('user.accept',['contact'=>$solicitud])}}"  method="POST">
                  @method('PUT')
                  @csrf
                  <input type="submit" class="bg-blue-600 text-white uppercase rounded-lg px-3 py-1 text-xs font-bold cursor-pointer" value="Aceptar">
                </form>
              </div>


            </div>
        @endforeach
    </div>


</x-app-layout>