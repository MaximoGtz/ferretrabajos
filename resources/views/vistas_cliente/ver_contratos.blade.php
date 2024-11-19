@extends('index')
@section('title', 'Ver contratos')
@section('main_content')
<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold text-center mb-6">Lista de Contratos</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($contratos as $contrato)
        <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200">
            <h2 class="text-xl font-semibold text-gray-800 mb-2">
                Contrato #{{ $contrato->id }}
            </h2>
            <p class="text-gray-600 mb-4">
                Cliente: <span class="font-medium">{{ $contrato->cliente->nombre ?? 'N/A' }}</span>
            </p>
            <p class="text-gray-600 mb-4">
                Fecha de contratacion: <span class="font-medium">{{ $contrato->created_at ?? 'N/A' }}</span>
            </p>
            <p class="text-gray-600 mb-4">
                Fecha de cita: <span class="font-medium">{{ $contrato->fecha_cita ?? 'N/A' }}</span>
            </p>
            <p class="text-gray-600 mb-4">
                Descripcion: <span class="font-medium">{{ $contrato->descripcion ?? 'Sin descripción' }}</span>
            </p>
            <a 
            {{-- href="{{ route('contratos.show', $contrato->id) }}" --}}
            href="/laravel"
                 class="text-blue-500 hover:underline">
                Ver detalles
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
