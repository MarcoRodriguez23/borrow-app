<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Home') }}
            </h2>
            <a href="{{route('item.create')}}" class="bg-green-600 rounded-xl text-white py-2 px-4 hover:bg-green-800">
              Crear nuevo articulo
            </a>
        </div>
    </x-slot>

    <div class="py-12 w-4/5 mx-auto">
      @if (count(auth()->user()->items) === 0 && count($items) === 0)
        <div class="flex flex-col justify-center items-center">
          <h1 class="text-center font-bold text-4xl">
            Vaya !! 
            <br> 
            No tienes contactos para ver sus ofertas ni artículos registrados para ofertar.
          </h1>
          <img class="mt-10" src="{{asset('img/oops.png')}}" alt="image-oops">
        </div>
      @else
      <h1 class="text-center font-bold text-4xl">
        Hola nuevamente {{auth()->user()->name}} {{auth()->user()->lastname}}
      </h1>
      <div class="md:grid md:grid-cols-3 text-center mt-16">
        <div>
            <h3 class="font-bold text-lg">
                Articulos de mis contactos
            </h3>
            <div>
              @if (!count($items))
                <p>Tus contactos aún no publican artículos en oferta.</p>
              @else
                @foreach ($items as $item)
                  <div class="bg-stone-900 mb-1 rounded-2xl p-3">
                      <div class="flex flex-row justify-between items-center">
                          <img src="{{asset('profiles/'.$item->user->photo)}}" alt="photo profile" class="w-1/3 rounded-full h-auto">
                          <div class="w-2/3">
                            <p class="text-white border-b-2 border-white font-bold w-3/4 mx-auto text-xl">{{$item->title}}</p>
                            <p class="text-white">Ofrecid@ por {{$item->user->name}} {{$item->user->lastname}}</p>
                          </div>
                      </div>
                      <div id="parteinferior" class="grid grid-cols-2 mt-10">
                          <img src="{{asset('articulos/'.$item->photo->photo)}}" alt="image-item" class="w-auto">
                          <div class="p-4 pt-0 text-left text-sm text-white flex flex-col justify-evenly">
                              <p>Precio: ${{$item->price}}</p>
                              <p>Condición 
                                <br>
                                {{$item->condition}}
                              </p>
                              <p>Disponible
                                <br> 
                                {{$item->init_date}} al {{$item->last_date}} 
                              </p>
                              <a 
                                class="bg-slate-300 py-1 px-2 rounded-md text-slate-900 font-bold text-center hover:bg-slate-400" 
                                href="{{route('item.show',['item'=>$item])}}"
                              >
                                Ver artículo
                              </a>
                          </div>
                      </div>
                  </div>
                @endforeach
              @endif
            </div>
        </div>
        <div>
            <h3 class="font-bold text-lg">
                Artículos solicitados
            </h3>
            <div>
              <p>Aún no ofertas por ningún artículo.</p>
            </div>
        </div>
        <div>
            <h3 class="font-bold text-lg">
                Mis artículos
            </h3>
            <div>
              @if (!count($myitems))
                <p>Aún no tienes artículos para ofertar.</p>
              @else
                @foreach ($myitems as $item)
                  <div class="bg-stone-900 mb-1 rounded-2xl p-3">
                    <div class="flex flex-row justify-between items-center">
                        <img src="{{asset('profiles/'.$item->user->photo)}}" alt="photo profile" class="w-1/3 rounded-full h-auto">
                        <div class="w-2/3">
                          <p class="text-white border-b-2 border-white font-bold w-3/4 mx-auto text-xl">{{$item->title}}</p>
                          <p class="text-white">Ofrecid@ por {{$item->user->name}} {{$item->user->lastname}}</p>
                        </div>
                    </div>
                    <div id="parteinferior" class="grid grid-cols-2 mt-10">
                        <img src="{{asset('articulos/'.$item->photo->photo)}}" alt="image-item" class="w-auto">
                        <div class="p-4 pt-0 text-left text-sm text-white flex flex-col justify-evenly">
                            <p>Precio: ${{$item->price}}</p>
                            <p>Condición 
                              <br>
                              {{$item->condition}}
                            </p>
                            <p>Disponible
                              <br> 
                              {{$item->init_date}} al {{$item->last_date}} 
                            </p>
                            <a 
                              class="bg-slate-300 py-1 px-2 rounded-md text-slate-900 font-bold text-center hover:bg-slate-400" 
                              href="{{route('item.show',['item'=>$item])}}"
                            >
                              Ver artículo
                            </a>
                        </div>
                    </div>
                  </div>
                @endforeach
              @endif
            </div>
        </div>
      </div>
      @endif
        
    </div>
</x-app-layout>
