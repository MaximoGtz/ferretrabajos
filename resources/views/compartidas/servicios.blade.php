@extends('index')
@section('title', 'Servicios')
@section('main_content')

<link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet">

<div class="flex flex-col items-center py-12 bg-gray-100">
    <h1 class="text-4xl font-bold text-gray-800 mb-4">Algunos de Nuestros Servicios</h1>
    <p class="text-lg text-gray-600 mb-8">Encuentra profesionales en diversas áreas para tus necesidades</p>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Card para cada tipo de trabajador -->
        <div class="max-w-sm bg-white rounded-lg border border-gray-200 shadow-md">
            <img class="rounded-t-lg" src="https://aprende.com/wp-content/uploads/2022/09/electricista-trabajando.jpg" alt="Electricista">
            <div class="p-5">
                <h5 class="mb-2 text-2xl font-bold text-gray-900">Electricista</h5>
                <p class="mb-3 font-normal text-gray-700">Instalación, mantenimiento y reparación de sistemas eléctricos.</p>
                <p class="text-yellow-500">★★★★☆ (4.5)</p>
                <a href="/trabajadores/ver" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    Ver Servicios
                </a>
                
                
                
                
                
            </div>
        </div>

        <!-- Repite el bloque anterior para otros tipos de trabajadores -->
        <div class="max-w-sm bg-white rounded-lg border border-gray-200 shadow-md">
            <img class="rounded-t-lg" src="https://coderslink.com/wp-content/uploads/2022/12/Trabjo-Remoto-Programador.jpg" alt="Programador">
            <div class="p-5">
                <h5 class="mb-2 text-2xl font-bold text-gray-900">Programador</h5>
                <p class="mb-3 font-normal text-gray-700">Desarrollo de aplicaciones web y software personalizado.</p>
                <p class="text-yellow-500">★★★★★ (5.0)</p>
                <a href="/trabajadores/ver" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    Ver Servicios
                </a>
                
            </div>
        </div>

        <div class="max-w-sm bg-white rounded-lg border border-gray-200 shadow-md">
            <img class="rounded-t-lg" src="https://usil-blog.s3.amazonaws.com/PROD/blog/image/analista-de-datos.jpg" alt="Analista">
            <div class="p-5">
                <h5 class="mb-2 text-2xl font-bold text-gray-900">Analista</h5>
                <p class="mb-3 font-normal text-gray-700">Análisis de datos y estrategias para la toma de decisiones.</p>
                <p class="text-yellow-500">★★★★☆ (4.2)</p>
                <a href="/trabajadores/ver" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    Ver Servicios
                </a>
                
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
@endsection

