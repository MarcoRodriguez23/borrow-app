<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Crear articulo para ofertar') }}
        </h2>
    </x-slot>
    

    <div class="py-12 w-4/5 mx-auto">
        <div class="px-10 bg-white rounded-lg shadow-xl p-10 mt-10 md:mt-0">
            <form action="{{route('item.store')}}" method="POST" class="w-3/5 mx-auto">
                @csrf
                
                <div class="mb-5">
                    <label for="title" class="mb-2 block uppercase text-gray-500 font-bold">Titulo</label>
                    <input
                        id="title"
                        name="title"
                        type="text"
                        placeholder="Titulo del articulo"
                        class="border p-3 w-full rounded-lg @error('title') border-red-500 @enderror"
                        value="{{old('title')}}"
                    >
                    @error('title')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="price" class="mb-2 block uppercase text-gray-500 font-bold">Precio</label>
                    <input
                        id="price"
                        name="price"
                        type="number"
                        placeholder="Cuota de renta"
                        class="border p-3 w-full rounded-lg @error('price') border-red-500 @enderror"
                        value="{{old('price')}}"
                    >
                    @error('price')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="init_date" class="mb-2 block uppercase text-gray-500 font-bold">Fecha para recoger</label>
                    <input
                        id="init_date"
                        name="init_date"
                        type="date"
                        class="border p-3 w-full rounded-lg @error('init_date') border-red-500 @enderror"
                        value="{{old('init_date')}}"
                    >
                    @error('init_date')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="last_date" class="mb-2 block uppercase text-gray-500 font-bold">Fecha para devolver</label>
                    <input
                        id="last_date"
                        name="last_date"
                        type="date"
                        class="border p-3 w-full rounded-lg @error('last_date') border-red-500 @enderror"
                        value="{{old('last_date')}}"
                    >
                    @error('last_date')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="condition" class="mb-2 block uppercase text-gray-500 font-bold">Condición</label>
                    <input
                        id="condition"
                        name="condition"
                        type="text"
                        placeholder="Estado del articulo"
                        class="border p-3 w-full rounded-lg @error('condition') border-red-500 @enderror"
                        value="{{old('condition')}}"
                    >
                    @error('condition')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="description" class="mb-2 block uppercase text-gray-500 font-bold">
                        Descrpción
                    </label>
                    <textarea
                        id="description"
                        name="description"
                        placeholder="Descripción de la publicación"
                        class="border p-3 w-full rounded-lg @error('description') border-red-500 @enderror"
                        >{{old('description')}}</textarea>
                    @error('description')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <input
                    type="submit"
                    value="Crear publicación"
                    class="bg-sky-600 hover:bg-sky-700 text-center transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white"
                >
            </form>
        </div>

    </div>

</x-app-layout>