<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Mi perfil') }}
        </h2>
    </x-slot>

  <!--Inicia Header-->
  <header>
  <!-- Background image -->
    <div 
      class="mx-16 relative overflow-hidden bg-no-repeat bg-cover" 
      style="background-position: 50%;
      background-image: url({{$user->imagen ? asset('fondos/'.$user->imagen) : asset('img/fondo.webp')}});
      height: 350px;"
    >
      <div 
        class="absolute top-0 right-0 bottom-0 left-0 w-full h-full overflow-hidden bg-fixed"
        style="background-color: rgba(0, 0, 0, 0.75)"
      >
        <div class="flex justify-center items-center h-60 p-4">
          <img src="{{$user->photo ? asset('profiles/'.$user->photo) : asset('img/usuario.svg')}}" class="w-40 rounded-full h-auto" alt="foto de perfil">
        </div>
        <div class="text-center text-white px-6 md:px-12">
          <h2 class="text-3xl font-bold mt-0 mb-6">{{$user->name}} {{$user->lastname}}</h2>
          <h3 class="text-1xl font-bold mb-8">
            {{count($ids)}} @choice('Contacto agregado|Contactos agregados',count($ids))
          </h3>
        </div>
      </div>
    </div>

    <div class="flex justify-center p-4">
      @auth
        @if ($user->id !== auth()->user()->id)
          @if (auth()->user()->contactado($user))
            <p class="bg-black text-white font-bold py-2 px-4 border-b-1 border-gray-700 rounded">Solicitud de contacto enviada</p>
          @else
            <form action="{{route('user.contact',$user)}}" method="POST">
              @csrf
              <input type="submit" 
              class="bg-black hover:bg-gray-400 text-white hover:text-black font-bold py-2 px-4 border-b-1 border-gray-700 hover:border-gray-500 rounded" value="Enviar solicitud de contacto">
            </form>
          @endif
        @else
          <a href="{{route('profile.edit')}}" class="bg-black hover:bg-gray-400 text-white hover:text-black font-bold py-2 px-4 border-b-1 border-gray-700 hover:border-gray-500 rounded">Editar perfil</a>
        @endif
      @endauth
    </div>
  <!-- Background image -->
  </header>
<!--Termina Header-->

<!--Inicia Contenido-->
  <div class="flex-grow">
    <div class=" mx-16 h-full">
      <div class="grid grid-cols-2 h-full w-full gap-5">
        <div class="p-1">
          <h1 class="text-3xl font-bold mt-0 mb-2">Datos</h1>
          <h3 class="text-2xl mt-2 text-slate-600">Conoce sobre mi</h3>
          <div class="bg-gray-700 p-3 h-80 mx-auto rounded-3xl flex flex-col justify-center items-center">
            <p class="text-white text-center text-lg">
            @if ($user->description)
              Edad: {{$user->age}} años.
              <br>
              Dirección: {{$user->address}}.
              <br>
              {{$user->description}}
            @else
              <p class="text-white text-center text-lg">Edita tu perfil para agregar más información sobre ti.</p>  
            @endif
            </p>
          </div>
        </div>
        <div>
          <h1 class="text-3xl font-bold mt-0 mb-2">Contactos</h1>
          <h3 class="text-2xl mt-2 text-slate-600">Agregado Recientemente</h3>
          <div class="grid grid-cols-3 justify-center items-center gap-3 mt-2">
            @foreach ($user->contactings as $amigo)
              <a href="{{route('profile.index',['user'=> $amigo])}}">
                <img src="{{$amigo->photo ? asset('profiles/'.$amigo->photo) : asset('img/usuario.svg')}}" alt="amigo photo">
                <p class="text-center text-bold">{{$amigo->name}} {{$amigo->lastname}}</p>
              </a>
            @endforeach
                
            @foreach ($user->contacts as $amigo)
              <a href="{{route('profile.index',['user'=> $amigo])}}">
                <img src="{{$amigo->photo ? asset('profiles/'.$amigo->photo) : asset('img/usuario.svg')}}" alt="amigo photo">
                <p class="text-center text-bold">{{$amigo->name}} {{$amigo->lastname}}</p>
              </a>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
<!--Termina Contenido-->
</x-app-layout>