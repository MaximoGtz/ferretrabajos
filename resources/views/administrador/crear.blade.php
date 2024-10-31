@extends('index')
@section('title', 'Agregar Trabajador')
@section('main_content')
    <h1
        class="mb-4 text-1xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-5xl dark:text-white">
        Crear Nuevo Administrador</h1>

    <form action="/admin/guardar" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Campo para nombre -->
        <div class="form-group">
            <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
            <input type="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                id="nombre" name="nombre" required maxlength="100" minlength="5"
                placeholder="Introduce el nombre del cliente">
        </div>

        <!-- Campo para apellido -->
        <div class="form-group">
            <label for="apellido" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido</label>
            <input type="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                id="apellido" name="apellido" required maxlength="100" placeholder="Introduce el apellido del cliente">
        </div>
        <!-- campo para correo -->
        <div class="form-group">
            <label for="correo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo</label>
            <input type="email"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                id="correo" name="correo" required maxlength="150" placeholder="Introduce el correo del cliente">
        </div>
        <!-- Campo para usuario -->
        <div class="form-group">
            <label for="usuario" class= "block mb-2 text-sm font-medium text-gray-900 dark:text-white">Usuario</label>
            <input type="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                id="usuario" name="usuario" required maxlength="100" placeholder="Introduce el nombre de usuario">
        </div>
        <!-- Campo para contraseña -->
        <div class="form-group">
            <label for="contrasena" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña</label>
            <input type="password"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                id="contrasena" name="contrasena" required maxlength="256" placeholder="•••••••••" required />
        </div>
        <div class="mb-6">
            <label for="confirm_password" class=>Confirm password</label>
            <input type="password" id="confirm_password"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="•••••••••" required />
        </div>
        <!-- Campo para imagen -->
        <div class="form-group">
            <label for="imagen">Imagen</label>
            <input type="file"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                id="imagen" name="imagen" placeholder="Introduce la URL de la imagen del cliente">
        </div>

        <!-- Campo para estado -->
        <div class="form-group">
            <label for="estado">Estado</label>
            <input type="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                id="estado" name="estado" required maxlength="100" placeholder="Introduce el estado">
        </div>
        <!-- Campo para rol -->
        <div class="form-group">
            <label for="rol">Rol</label>
            <select
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                id="rol" name="rol" required>
                <option value="">Selecciona un rol</option>
                <option value="superadmin">Superadmin</option>
                <option value="admin">Admin</option>
                <option value="base">Base</option>
            </select>
        </div>

        <button type="submit" id="submit" value="Registrar"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Crear
            Administrador</button>
    </form>
@endsection
