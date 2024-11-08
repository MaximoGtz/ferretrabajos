@extends('index')
@section('title', 'Agregar Trabajador')
@section('main_content')
    <style>
        .imagenTarjeta {
            width: 100%;

        }
    </style>
    <div class="max-w-full mx-auto p-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
            @foreach ($trabajadores as $trabajador)
                <div class="bg-white border rounded-lg shadow-md">
                    <div class="imagenTarjeta">

                        <img src="{{ asset($trabajador->imagen) }}" alt="Producto 1"
                            class="w-full h-48 object-cover rounded-t-lg">
                    </div>
                    <div class="p-4">
                        <h2 class="text-lg font-semibold">{{ $trabajador->nombre }}</h2>
                        <p class="text-gray-500">Categoría: {{ $trabajador->especialidad }}</p>
                        <p class="text-gray-600 mb-4">Descripción breve del producto 1. Este producto es excelente.</p>


                        @if (auth('administradore')->check())
                            <button type="submit"
                                class="w-full bg-green-500 text-white font-bold py-2 rounded hover:bg-green-600 transition duration-300">
                                Modificar trabajador
                            </button>
                        @elseif(auth('cliente')->check())
                            <form action="{{ route('clientes.contratar_trabajador', $trabajador->id) }}" method="POST">
                                @csrf <!-- Token CSRF para seguridad -->
                                <input type="hidden" name="trabajador_id" value="{{ $trabajador->id }}">
                                <button type="submit"
                                    class="w-full bg-green-500 text-white font-bold py-2 rounded hover:bg-green-600 transition duration-300">
                                    Contratar como cliente
                                </button>
                            </form>
                            {{-- @elseif(auth('trabajadore')->check())
                                    Trabajador
                             --}}
                        @else
                            <a href="/cliente/login" class="text-blue-500 hover:underline">
                                <button
                                    class="w-full bg-green-500 text-white font-bold py-2 rounded hover:bg-green-600 transition duration-300">
                                    Contratar
                                </button>
                            </a>
                        @endif


                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
