@extends('index')
@section('title', 'Editar cliente')
@section('main_content')
    <h1 class="mb-4 text-4xl font-bold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
        Crear nuevo Cliente</h1>

    <form class="max-w-sm mx-auto" action="/cliente/actualizar/{{ $cliente->id }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-5">
            <label for="nombre-cliente"
                class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Nombre</label>
            <input type="text" id="nombre-cliente" name="nombre"
                class="bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500"
                placeholder="Nombre" value="{{ $cliente->nombre }}">
        </div>

        <div class="mb-5">
            <label for="apellido-cliente"
                class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Apellido</label>
            <input type="text" id="apellido-cliente" name="apellido"
                class="bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500"
                placeholder="Apellido" value="{{ $cliente->apellido }}">
        </div>

        <div class="mb-5">
            <label for="correo-cliente"
                class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Correo</label>
            <input type="email" id="correo-cliente" name="correo"
                class="bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500"
                placeholder="ejemplo@dominio.com" value="{{ $cliente->correo }}">
        </div>

        <div class="mb-5">
            <label for="contraseña-cliente"
                class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Contraseña</label>
            <input type="password" id="contraseña-cliente" name="contraseña"
                class="bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500"
                placeholder="Contraseña" value="{{ $cliente->contraseña }}">
        </div>

        <div class="mb-5">
            <label for="imagen" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Imagen</label>
            <img width="100px" src="{{ $cliente->imagen }}" alt="{{ $cliente->imagen }}">
            <input type="file" id="imagen" name="imagen"
                class="bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500">
        </div>

        <div class="mb-5">
            <label for="estado-cliente"
                class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Estado</label>
            <select id="estado-cliente" name="estado"
                class="bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:bg-gray-700">
                <option value="activo" {{ $cliente->type == 'activo' ? 'selected' : '' }}>Activo</option>
                <option value="inactivo" {{ $cliente->type == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>


        <div class="mb-5">
            <label for="red-social" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Red
                Social</label>
            <input type="text" id="red-social" name="red_social"
                class="bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500"
                placeholder="Ingrese su red social (Facebook, Twitter, Instagram, etc.)" value="{{ $cliente->red_social }}">
        </div>


        <div class="mb-5">
            <label for="verificacion-cliente"
                class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Verificación</label>
            <select id="verificacion-cliente" name="verificacion"
                class="bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700">
                <option value="1" {{ $cliente->type == '1' ? 'selected' : '' }}>Sí</option>
                <option value="0" {{ $cliente->type == '0' ? 'selected' : '' }}>No</option>
            </select>
        </div>



        <div class="mb-5">
            <label for="direccion-cliente"
                class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Dirección</label>
            <input type="text" id="direccion-cliente" name="direccion"
                class="bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500"
                placeholder="Ingrese su dirección completa" value="{{ $cliente->direccion }}">
        </div>


        <div class="mb-5">
            <label for="telefono-cliente"
                class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Teléfono</label>
            <input type="tel" id="telefono-cliente" name="telefono"
                class="bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500"
                placeholder="1234567890" value="{{ $cliente->telefono }}" title="Debe contener 10 dígitos numéricos">
        </div>

        <button type="submit"
            class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full w-full">Enviar</button>
    </form>


@endsection
