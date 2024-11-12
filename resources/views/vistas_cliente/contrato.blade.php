@extends('index')
@section('title', 'Contrato')
@section('main_content')


    <div class="max-w-xl mx-auto text-center p-4">
        <h1 class="text-2xl font-bold mb-4">Contrato</h1>
        <!-- Contenido centrado -->
        <div class="relative max-w-auto">
            <ul class="space-y-4">
                <label for="user-id" class="block mb-2 text-sm font-medium text-gray-700 mt-4">Trabajadores</label>
                @if (!$trabajadoresCount)
                    <h1>Aun no hay trabajadores</h1>
                @else
                @endif
                @foreach ($trabajadoresCarrito as $trabajador)
                    <li
                        class="flex justify-between items-center bg-white border border-gray-300 rounded-lg p-4 shadow-sm">
                        <div class="flex justify-center items-center p-4">
                            <img src="{{ $trabajador->imagen }}" alt="{{ $trabajador->nombre }}"
                                class="w-24 h-24 object-cover rounded" />
                        </div>
                        <div>
                            <p class="text-lg font-semibold text-gray-800">{{ $trabajador->nombre }}</p>
                            <p class="text-sm text-gray-600">Categoría: {{ $trabajador->especialidad }}</p>
                        </div>
                        <form action="{{ route('clientes.eliminar_trabajador', $trabajador->id) }}" method="POST">
                            <input @csrf @method('DELETE') <button type="submit"
                                class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2">Eliminar</button>
                        </form>
                    </li>
                @endforeach
            </ul>
            <form method="POST" action="{{ route('clientes.crear_contrato') }}">
                @csrf
                <label for="user-id" class="block mb-2 text-sm font-medium text-gray-700 mt-4">ID de Usuario</label>
                <input type="text" id="user-id" name="cliente_id" value="{{ $user->id }}" readonly
                    class="bg-gray-100 border border-gray-300 text-gray-700 text-sm rounded-lg 
            focus:ring-0 focus:border-gray-300 block w-full p-2.5 cursor-not-allowed" />
                <label for="user-id" class="block mb-2 text-sm font-medium text-gray-700 mt-4">A pagar $MXN</label>
                <input type="number" id="costo" name="costo" value="{{ $costo }}" readonly
                    class="bg-gray-100 border border-gray-300 text-gray-700 text-sm rounded-lg 
                focus:ring-0 focus:border-gray-300 block w-full p-2.5 cursor-not-allowed" />
                <label for="user-id" class="block mb-2 text-sm font-medium text-gray-700 mt-4">Fecha
                    @error('fecha')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                    <div class="relative inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                </label>

                <input datepicker id="default-datepicker" type="text" name="fecha_cita"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Selecciona la fecha">

                    @error('fecha_cita')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                <label for="user-id" class="block mb-2 text-sm font-medium text-gray-700 mt-4">Especificaciones del
                    trabajo</label>
                <textarea id="descripcion"
                name="descripcion" placeholder="Escribe aquí lo que te interesa solucionar"
                    class="bg-gray-100 border border-gray-300 text-gray-700 text-sm rounded-lg 
                    focus:ring-0 focus:border-gray-300 block w-full p-2.5 cursor-not-allowed"
                    rows="5"></textarea>
                    @error('descripcion')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
                <input type="hidden" name="estado" value="pendiente">
                <button type="submit"
                    class="mt-4 w-full focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Generar
                    contrato y pagar</button>
            </form>
        </div>

    </div>



@endsection
