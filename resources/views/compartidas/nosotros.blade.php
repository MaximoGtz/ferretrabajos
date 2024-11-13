@extends('index')
@section('title', 'Nosotros')
@section('main_content')

<div class="bg-gray-100 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-4xl font-extrabold text-gray-900 sm:text-5xl">Sobre Nosotros</h2>
            <p class="mt-4 text-lg text-gray-600">
                En FERRETRABAJOS, nos dedicamos a conectar a clientes con profesionales altamente capacitados en diversas áreas. Nuestro objetivo es facilitar la contratación de trabajadores para cualquier proyecto, asegurando calidad y confianza en cada servicio.
            </p>
        </div>

        <div class="mt-12 grid grid-cols-1 lg:grid-cols-2 gap-12">
            <div class="flex items-center justify-center">
                <img src="/imgs/fer.jpeg" alt="Imagen de la empresa" class="rounded-xl shadow-2xl w-full max-w-md">
            </div>

            <div class="space-y-8">
                <div>
                    <h3 class="text-3xl font-semibold text-gray-800">¿Quiénes somos?</h3>
                    <p class="mt-4 text-gray-600 text-lg">
                        Somos un equipo apasionado por ofrecer soluciones efectivas a empresas y particulares que necesitan contratar trabajadores especializados en diversas áreas como electricidad, programación, diseño, analistas, entre otros. Contamos con un catálogo de profesionales seleccionados cuidadosamente para asegurar que cada cliente reciba un servicio de calidad y acorde a sus necesidades.
                    </p>
                </div>

                <div>
                    <h3 class="text-3xl font-semibold text-gray-800">Nuestro compromiso</h3>
                    <p class="mt-4 text-gray-600 text-lg">
                        Nuestro compromiso es ofrecer a nuestros clientes un proceso de contratación fácil, rápido y seguro. Trabajamos para que cada transacción se realice con confianza, garantizando la satisfacción tanto del cliente como de nuestros trabajadores.
                    </p>
                </div>
            </div>
        </div>

        <div class="mt-16 text-center">
            <h3 class="text-3xl font-semibold text-gray-800">Únete a nosotros</h3>
            <p class="mt-4 text-lg text-gray-600">
                Si eres un profesional en busca de nuevas oportunidades o si necesitas contratar a un experto, estamos aquí para ayudarte. ¡Contáctanos hoy mismo y haz que tu proyecto avance con los mejores trabajadores!
            </p>
            <a href="{{ route('contacto') }}" class="mt-8 inline-block px-8 py-4 bg-blue-600 text-white text-lg font-semibold rounded-lg hover:bg-blue-700 transition">Contáctanos</a>
        </div>
    </div>
</div>

@endsection


