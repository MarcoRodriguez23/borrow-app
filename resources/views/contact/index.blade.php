<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Solicitudes de contacto') }}
        </h2>
    </x-slot>

    <div class="py-12 w-4/5 mx-auto">
      @if (count($solicitudes) === 0)
          <h1 class="text-center font-bold text-4xl">Parece que no tienes nuevas solicitudes de contacto.</h1>
      @else
        @foreach ($solicitudes as $solicitud)
            <div class="bg-stone-900 px-4 py-2 flex justify-evenly items-center rounded-3xl">

              <img src="{{asset('profiles/'.$solicitud->user->photo)}}" alt="photo perfil" class="rounded-full h-20">
              <h1 class="text-white">{{$solicitud->user->name}} {{$solicitud->user->lastname}} te envio solicitud</h1>
              <a href="{{route('profile.index',['user'=>$solicitud->user])}}" class="bg-green-600 text-white uppercase rounded-lg px-3 py-1 text-xs font-bold cursor-pointer">Visitar Perfil</a>
                
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
      @endif
    </div>


</x-app-layout>