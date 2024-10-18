@extends('index')
@section('title', 'Perfil')
@section('main_content')
    <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg p-6 my-5">
        <div class="flex items-center justify-center ">
            <!-- Imagen del perfil -->
            <img class="w-24 h-24 rounded-full" src="{{ $cliente->profile_photo_url }}" alt="Foto de perfil del cliente">
        </div>

        <div class="mt-4">
            <!-- Nombre del cliente -->
            <h1 class="text-xl font-bold text-center">{{ $cliente->nombre }}</h1>
            <h1 class="text-xl font-bold text-center">{{ $cliente->apellido }}</h1>

            <!-- Correo -->
            <p class="text-gray-600 text-center">{{ $cliente->correo }}</p>
            <p class="text-gray-600 text-center">{{ $cliente->telefono }}</p>

            <!-- Dirección -->
            <p class="text-gray-600 text-center">{{ $cliente->direccion }}</p>

            <div class="mt-6 flex justify-center">
                <!-- Botón para borrar cuenta -->
                <form action="{{ route('cliente.destroy2', $cliente->id) }}" method="POST"
                    onsubmit="return confirm('¿Estás seguro de que deseas eliminar tu cuenta?');">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="bg-red-600 text-white font-bold py-2 px-4 rounded hover:bg-red-700">
                        Borrar cuenta
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
