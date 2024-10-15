@extends('index')
@section('title', 'Agregar Trabajador')
@section('main_content')

<a href="/trabajadore/create" class="mt-5 mb-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
Crear trabajador
</a>
@if ($msj = Session::get('success'))
<div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
    <span class="font-medium">Éxito!</span> {{$msj}}.
  </div>
@endif
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nombre(s)
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Apellidos
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Correo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        RFC
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Especialidad
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Imagen
                    </th>
                    <th scope="col" class="px-6 py-3">

                    </th>
                    <th scope="col" class="px-6 py-3">

                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trabajadores as $i => $trabajador)
                    <tr>
                        <td class="px-6 py-4">
                            {{$i+1}}
                        </td>
                        <td class="px-6 py-4">
                            {{ $trabajador->nombre }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $trabajador->apellido }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $trabajador->correo }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $trabajador->rfc }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $trabajador->especialidad }}
                        </td>
                        <td class="px-6 py-4">
                            <img src="{{ $trabajador->imagen }}" width="120" alt="{{ $trabajador->nombre }}">
                        </td>
                        <td class="px-0 py-0">
                            <a href="{{ route('trabajadore.edit', $trabajador->id) }}">
                                <button type="button" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Editar</button>
                            </a>
                        </td>
                        <td class="px-0 py-0">
                            <form id="frm_{{ $trabajador->id }}" method="POST"
                                action="{{ route('trabajadore.destroy', $trabajador->id) }}">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
