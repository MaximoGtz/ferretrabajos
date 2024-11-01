@extends('index')
@section('title', 'Agregar Trabajador')
@section('main_content')
<div class="max-w-xl mx-auto p-4">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        <div class="bg-white border rounded-lg shadow-md">
            <img src="https://via.placeholder.com/200" alt="Producto 1" class="w-full h-48 object-cover rounded-t-lg">
            <div class="p-4">
                <h2 class="text-lg font-semibold">Nombre del Producto 1</h2>
                <p class="text-gray-500">Categoría: Electrónica</p>
                <p class="text-gray-600 mb-4">Descripción breve del producto 1. Este producto es excelente por varias razones.</p>
                <button class="w-full bg-green-500 text-white font-bold py-2 rounded hover:bg-green-600 transition duration-300">
                    Comprar
                </button>
            </div>
        </div>

        <div class="bg-white border rounded-lg shadow-md">
            <img src="https://via.placeholder.com/200" alt="Producto 2" class="w-full h-48 object-cover rounded-t-lg">
            <div class="p-4">
                <h2 class="text-lg font-semibold">Nombre del Producto 2</h2>
                <p class="text-gray-500">Categoría: Hogar</p>
                <p class="text-gray-600 mb-4">Descripción breve del producto 2. Este producto es muy popular entre los clientes.</p>
                <button class="w-full bg-green-500 text-white font-bold py-2 rounded hover:bg-green-600 transition duration-300">
                    Comprar
                </button>
            </div>
        </div>

        <div class="bg-white border rounded-lg shadow-md">
            <img src="https://via.placeholder.com/200" alt="Producto 3" class="w-full h-48 object-cover rounded-t-lg">
            <div class="p-4">
                <h2 class="text-lg font-semibold">Nombre del Producto 3</h2>
                <p class="text-gray-500">Categoría: Moda</p>
                <p class="text-gray-600 mb-4">Descripción breve del producto 3. Este producto es ideal para quienes buscan estilo.</p>
                <button class="w-full bg-green-500 text-white font-bold py-2 rounded hover:bg-green-600 transition duration-300">
                    Comprar
                </button>
            </div>
        </div>

        <div class="bg-white border rounded-lg shadow-md">
            <img src="https://via.placeholder.com/200" alt="Producto 4" class="w-full h-48 object-cover rounded-t-lg">
            <div class="p-4">
                <h2 class="text-lg font-semibold">Nombre del Producto 4</h2>
                <p class="text-gray-500">Categoría: Deportes</p>
                <p class="text-gray-600 mb-4">Descripción breve del producto 4. Perfecto para los amantes de la actividad física.</p>
                <button class="w-full bg-green-500 text-white font-bold py-2 rounded hover:bg-green-600 transition duration-300">
                    Comprar
                </button>
            </div>
        </div>

        <!-- Repite los elementos del producto según sea necesario -->
    </div>
</div>
@endsection