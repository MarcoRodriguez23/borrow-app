<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Home') }}
            </h2>
            <a href="{{route('item.create')}}">Crear nuevo articulo</a>
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
                <div>
                    @foreach ($myitems as $item)
                        <div class="bg-orange-400 mb-1 rounded-2xl">
                            <div id="partesuperior">
                                <img src="{{asset('profiles/'.auth()->user()->photo)}}" alt="photo profile" class="rounded-full h-16">
                                <p>{{auth()->user()->name}} {{auth()->user()->lastname}}</p>
                                <p>Esta ofreciendo {{$item->title}}</p>
                            </div>
                            <div id="parteinferior" class="grid grid-cols-2 mt-10">
                                <img src="{{asset('articulos/'.$item->photo->photo)}}" alt="image-item" class="w-auto">
                                <div class="p-4 pt-0">
                                    <p>Precio: ${{$item->price}}</p>
                                    <p>Condición: {{$item->condition}}</p>
                                    <p>Disponible el {{$item->init_date}}</p>
                                    <a 
                                        class="bg-slate-500 py-1 px-2 rounded-md text-cyan-50" 
                                        href="{{route('item.show',['item'=>$item])}}"
                                    >
                                        Ver articulo
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
