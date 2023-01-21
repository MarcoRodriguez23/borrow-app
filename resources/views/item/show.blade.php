<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
                {{ __('Artículo') }}
            </h2>
        </div>
    </x-slot>
    <div class="bg-stone-900 m-10 rounded-3xl">
      <div class="py-12 w-4/5 mx-auto grid grid-cols-2">
          <div class="flex flex-col justify-center items-center">
              <img src="{{asset('profiles/'.$user->photo)}}" alt="photo-profile" class="h-52 rounded-full">
              <h2 class="text-white font-bold text-xl text-center my-4">{{$user->name}} {{$user->lastname}} esta ofreciendo:<br> {{$item->title}} </h2>
              @if ($item->user->id != auth()->user()->id)
                  <p class="bg-slate-500 py-1 px-2 rounded-md text-cyan-50">Reservar artículo</p>
              @else
                  <a href="{{route('item.edit',['item'=>$item])}}" class="bg-slate-500 py-1 px-2 rounded-md text-cyan-50" >Editar articulo</a>
              @endif
          </div>
          <div>
              <h2 class="text-white font-bold text-xl text-center my-4">Información sobre el artículo</h2>
              <div class="flex justify-between gap-3 mb-5 text-center text-xl text-white bg-black p-3 rounded-2xl">
                  <p>
                      Precio
                      <br class="font-light">
                      ${{$item->price}}
                  </p>
                  <p>
                      Condición
                      <br class="font-light">
                      {{$item->condition}}
                  </p>
                  <p>
                      Fecha de inicio
                      <br class="font-light">
                      {{$item->init_date}}
                  </p>
                  <p>
                      Fecha de fin
                      <br class="font-light">
                      {{$item->last_date}}
                  </p>
              </div>
              <div class="mb-5">
                  <h3 class="text-white font-bold text-xl text-center my-4">Descripción del artículo</h3>
                  <p class="text-white text-center bg-black p-3 rounded-2xl">
                      {{$item->description}}
                  </p>
              </div>
              <div class="w-full">
                  <img src="{{asset('articulos/'.$item->photo->photo)}}" alt="photo-item" class="w-10/12 mx-auto rounded-3xl">
              </div>
          </div>
      </div>
    </div>
</x-app-layout>