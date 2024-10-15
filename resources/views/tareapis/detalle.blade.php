@extends('index')
@section('title', 'Agregar Trabajador')
@section('main_content')
    <style>
        img.ajustar {
            margin: 0 auto;
            padding: 10px;
            border-radius: 25px;
        }
    </style>
    <div class="flex justify-center lg:h-screen items-center mt-5">
        <div class="max-w-md bg-white border border-gray-200 rounded-lg shadow-md">
            <a href="#">
                <img class="rounded-t-lg ajustar" src="{{ $personaje->image }}" alt="Imagen de la carta" />
            </a>
            @if ($personaje->status == 'Alive')
                <p class="text-green-600 font-semibold text-center text-gray-900">Vivo</p>
            @elseif($personaje->status == 'Dead')
                <p class="text-red-600 font-semibold text-center text-gray-900">Muerto</p>
            @else
                <p class="text-gray-500 font-semibold text-center text-gray-900">Desconocido</p>
            @endif
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $personaje->name }}</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700">Origen: {{$personaje->origin->name;}}</p>
                <p class="mb-3 font-normal text-green-700">Habita en: {{$personaje->location->name;}}</p>
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md p-5">
                    @if ($personaje->gender === 'Male')
                        <div class="flex items-center space-x-4">
                            {{-- <img class="w-10 h-10 rounded-full" src="https://via.placeholder.com/100x100?text=♂️" alt="Icono masculino"> --}}
                            <div class="font-medium text-lg">
                                <p class="text-blue-600">Género: <span class="font-bold">Masculino</span></p>
                            </div>
                        </div>
                    @elseif ($personaje->gender === 'Female')
                        <div class="flex items-center space-x-4">
                            {{-- <img class="w-10 h-10 rounded-full" src="https://via.placeholder.com/100x100?text=♀️" alt="Icono femenino"> --}}
                            <div class="font-medium text-lg">
                                <p class="text-pink-600">Género: <span class="font-bold">Femenino</span></p>
                            </div>
                        </div>
                    @else
                        <div class="flex items-center space-x-4 mb-5">
                            {{-- <img class="w-10 h-10 rounded-full" src="https://via.placeholder.com/100x100?text=?️" alt="Icono no especificado"> --}}
                            <div class="font-medium text-lg">
                                <p class="text-gray-600">Género: <span class="font-bold">No especificado</span></p>
                            </div>
                        </div>
                    @endif
                </div>
                <a href="/catalogo"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 mt-5">
                    Volver
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3">
                        </path>
                    </svg>
                </a>
            </div>
        </div>
    </div>

@endsection
