@extends('index')
@section('title', 'Crear cliente')
@section('main_content')
    <h1 class="mb-4 text-4xl font-bold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
        Registro de cliente</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="max-w-sm mx-auto" action="/registro/cliente/guardar" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-5">
            <label for="nombre-cliente"
                class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Nombre</label>
            <input type="text" id="nombre-cliente" name="nombre"
                class="bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500"
                placeholder="Nombre" @if (old('nombre')) value="{{ old('nombre') }}" @endif>
        </div>

        <div class="mb-5">
            <label for="apellido-cliente"
                class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Apellido</label>
            <input type="text" id="apellido-cliente" name="apellido"
                class="bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500"
                placeholder="Apellido" @if (old('apellido')) value="{{ old('apellido') }}" @endif>
        </div>

        <div class="mb-5">
            <label for="correo-cliente"
                class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Correo</label>
            <input type="email" id="correo-cliente" name="correo"
                class="bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500"
                placeholder="ejemplo@dominio.com" @if (old('correo')) value="{{ old('correo') }}" @endif>
        </div>

        <div class="mb-5">
            <label for="contraseña-cliente"
                class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Contraseña</label>
            <input type="password" id="contraseña-cliente" name="contrasena"
                class="bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500"
                placeholder="Contraseña" @if (old('contrasena')) value="{{ old('contrasena') }}" @endif>
        </div>

        <div class="mb-5">
            <label for="imagen" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Imagen</label>
            <input type="file" id="imagen" name="imagen"
                class="bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500"
                required>
        </div>

        <div class="mb-5">
            <label for="estado-cliente"
                class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Estado</label>
            <select id="estado-cliente" name="estado"
                class="bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500"
                required>
                <option value="activo">Activo</option>
                <option value="inactivo">Inactivo</option>
            </select>
        </div>

        <div class="mb-5">
            <label for="red-social" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Red
                Social</label>
            <input type="text" id="red-social" name="red_social"
                class="bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500"
                placeholder="Ingrese su red social (Facebook, Twitter, Instagram, etc.)"
                @if (old('red_social')) value="{{ old('red_social') }}" @endif>
        </div>


        <div class="mb-5">
            <label for="verificacion-cliente"
                class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Verificación</label>
            <select id="verificacion-cliente" name="verificacion"
                class="bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500"
                required>
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>
        </div>


        <div class="mb-5">
            <label for="direccion-cliente"
                class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Dirección</label>
            <input type="text" id="direccion-cliente" name="direccion"
                class="bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500"
                placeholder="Ingrese su dirección completa" maxlength="255"
                @if (old('direccion')) value="{{ old('direccion') }}" @endif>
        </div>


        <div class="mb-5">
            <label for="telefono-cliente"
                class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Teléfono</label>
            <input type="tel" id="telefono-cliente" name="telefono"
                class="bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500"
                placeholder="1234567890" @if (old('contrasena')) value="{{ old('contrasena') }}" @endif>
        </div>

        <button type="submit"
            class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full w-full">Enviar</button>
    </form>



@endsection
