@extends('index')
@section('title', 'Agregar Trabajador')
@section('main_content')
    <a href="/admin/crear"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
        Nuevo Administrador
    </a>


    @if (empty('administradores'))
        <h2>no hay elementos a mostrar</h2>
    @else
        {{ $adminTipo }}
        {{-- aqui va el contenido --}}
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Nombre</th>
                        <th scope="col" class="px-6 py-3">Apellido</th>
                        <th scope="col" class="px-6 py-3">Usuario</th>
                        <th scope="col" class="px-6 py-3">Contraseña</th>
                        <th scope="col" class="px-6 py-3">Imagen</th>
                        <th scope="col" class="px-6 py-3">Rol</th>
                        <th scope="col" class="px-6 py-3">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($administradores as $item)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                            <td class="px-6 py-4">
                                {{ $item->nombre }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->apellido }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->usuario }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->contraseña }}
                            </td>
                            <td class="px-6 py-4">
                                <img src="{{ $item->imagen }}" alt="{{ $item->imagen }}" width="80">

                            </td>
                            <td class="px-6 py-4">
                                {{ $item->rol }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->estado }}
                            </td>
                            @if ($adminTipo == 'superadmin')
                                <td class="px-6 py-4 text-right">
                                    <a href="/admin/editar/ {{ $item->id }}"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="/admin/mostrar/{{ $item->id }}"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Eliminar</a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    <!-- Más filas aquí -->
                </tbody>
            </table>
        </div>
    @endif
@endsection
