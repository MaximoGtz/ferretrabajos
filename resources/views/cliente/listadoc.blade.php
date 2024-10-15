@extends('index')
@section('title', 'Agregar Trabajador')
@section('main_content')
    <a href="/cliente/crearc" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">NUEVO
        CLIENTE</a>
        
    @if (empty($clientes))
        <h2>NO HAY ELEMENTOS A MOSTRAR</h2>
    @else
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Id</th>
                        <th scope="col" class="px-6 py-3">Nombre</th>
                        <th scope="col" class="px-6 py-3">Apellido</th>
                        <th scope="col" class="px-6 py-3">Correo</th>
                        <th scope="col" class="px-6 py-3">Contraseña</th>
                        <th scope="col" class="px-6 py-3">Imagen</th>
                        <th scope="col" class="px-6 py-3">Estado</th>
                        <th scope="col" class="px-6 py-3">Red Social</th>
                        <th scope="col" class="px-6 py-3">Verificación</th>
                        <th scope="col" class="px-6 py-3">Dirección</th>
                        <th scope="col" class="px-6 py-3">Teléfono</th>
                        <th scope="col" class="px-6 py-3 text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($clientes as $item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">{{$item->id}}</td>
                        <td class="px-6 py-4">{{$item->nombre}}</td>
                        <td class="px-6 py-4">{{$item->apellido}}</td> 
                        <td class="px-6 py-4">{{$item->correo}}</td>
                        <td class="px-6 py-4">{{$item->contraseña}}</td>
                        <td class="px-6 py-4"><img width="100px" src="{{$item->imagen}}" alt="{{$item->imagen}}"></td>
                        <td class="px-6 py-4">{{$item->estado}}</td>
                        <td class="px-6 py-4">{{$item->red_social}}</td>
                        <td class="px-6 py-4">{{$item->verificacion}}</td>
                        <td class="px-6 py-4">{{$item->direccion}}</td>
                        <td class="px-6 py-4">{{$item->telefono}}</td>
                        <td class="px-6 py-4 text-right">
                            <a href="/cliente/editar/{{$item->id}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                            <a href="/cliente/mostrar/{{$item->id}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Borrar</a>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
