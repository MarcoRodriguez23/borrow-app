<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
                {{ __('Artículo') }}
            </h2>
        </div>
    </x-slot>
    <div class="py-12 w-4/5 mx-auto grid grid-cols-2">
        <div id="info del perfil">
            <img src="{{asset('profiles/'.$user->photo)}}" alt="photo-profile" class="h-52">
            <h2>{{$user->name}} {{$user->lastname}} esta ofreciendo:<br> {{$item->title}} </h2>
            @if ($item->user->id != auth()->user()->id)
                
            @else
                <a href="{{route('item.edit',['item'=>$item])}}" class="bg-slate-500 py-1 px-2 rounded-md text-cyan-50" >Editar articulo</a>
            @endif
        </div>
        <div>
            <h2>Información sobre el artículo</h2>
            <div class="flex justify-between gap-3 mb-5">
                <p>
                    Precio
                    <br>
                    ${{$item->price}}
                </p>
                <p>
                    Condición
                    <br>
                    {{$item->condition}}
                </p>
                <p>
                    Fecha de inicio
                    <br>
                    {{$item->init_date}}
                </p>
                <p>
                    Fecha de fin
                    <br>
                    {{$item->last_date}}
                </p>
            </div>
            <div class="mb-5">
                <h3>Descripción del artículo</h3>
                <p>
                    {{$item->description}}
                </p>
            </div>
            <div class="grid grid-cols-4">
                {{-- @foreach ($fotos as $foto)
                    <img src="{{asset('articulos/'.$foto->photo)}}" alt="photo-item" class="w-full">
                @endforeach --}}
                <img src="{{asset('articulos/'.$item->photo->photo)}}" alt="photo-item" class="w-10/12 mx-auto">
                <img src="{{asset('articulos/'.$item->photo->photo)}}" alt="photo-item" class="w-10/12 mx-auto">
                <img src="{{asset('articulos/'.$item->photo->photo)}}" alt="photo-item" class="w-10/12 mx-auto">
                <img src="{{asset('articulos/'.$item->photo->photo)}}" alt="photo-item" class="w-10/12 mx-auto">
            </div>
        </div>
    </div>
</x-app-layout>