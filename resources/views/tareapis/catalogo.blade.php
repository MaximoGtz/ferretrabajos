@extends('index')
@section('title', 'Productos Tarea')
@section('main_content')
    <section class="py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h2 class="font-manrope font-bold text-4xl text-black mb-8 max-lg:text-center">
                Lista de personajes
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach ($personajes as $personaje)
                    <a href="/catalogo/detalle{{$personaje->id}}"
                        class="mx-auto sm:mr-0 group cursor-pointer lg:mx-auto bg-white transition-all duration-500">
                        <div class="">
                            <img src="{{ $personaje->image }}" alt="face cream image"
                                class="w-full aspect-square rounded-2xl object-cover">
                        </div>
                        <div class="mt-5">
                            <div class="flex items-center justify-between">
                                <h6
                                    class="font-semibold text-xl leading-8 text-black transition-all duration-500 group-hover:text-indigo-600">
                                    {{ $personaje->name }}</h6>
                                <h6 class="font-semibold text-xl leading-8 text-blue-600">{{ $personaje->species }}</h6>
                            </div>
                            @if ($personaje->status == 'Alive')
                                <p class="mt-2 font-normal text-sm leading-6 text-green-500">Vivo</p>
                            @elseif ($personaje->status == 'Dead')
                            <p class="mt-2 font-normal text-sm leading-6 text-red-500">Muerto</p>
                            @elseif ($personaje->status == 'unknown')
                            <p class="mt-2 font-normal text-sm leading-6 text-yellow-500">Desconocido</p>
                            @endif
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection
