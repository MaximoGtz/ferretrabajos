@extends('index')
@section('title', 'Perfil')
@section('main_content')


    <div class="max-w-xl mx-auto text-center p-4">
        <h1 class="text-2xl font-bold mb-4">Contrato</h1>
        <!-- Contenido centrado -->
        <div class="relative max-w-auto">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                </svg>
            </div>
            <input datepicker id="default-datepicker" type="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Selecciona la fecha">
            <label for="user-id" class="block mb-2 text-sm font-medium text-gray-700 mt-4">ID de Usuario</label>
            <input type="text" id="user-id" name="user-id" value="{{ $user->id }}" readonly
                class="bg-gray-100 border border-gray-300 text-gray-700 text-sm rounded-lg 
                              focus:ring-0 focus:border-gray-300 block w-full p-2.5 cursor-not-allowed" />
            <ul class="space-y-4">
                {{-- @foreach ($trabajadores as $trabajador) --}}
                <li class="flex justify-between items-center bg-white border border-gray-300 rounded-lg p-4 shadow-sm">
                    <div>
                        <p class="text-lg font-semibold text-gray-800">Maximo</p>
                        <p class="text-sm text-gray-600">Categoría: Electrico</p>
                    </div>
                    <form action="/hello" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2">Eliminar</button>
                    </form>
                </li>
                {{-- @endforeach --}}
            </ul>
        </div>

    </div>



@endsection
