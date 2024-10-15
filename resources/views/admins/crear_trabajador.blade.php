@extends('admins.formulario_trabajadores')
@section('form_name')
    Crear
@endsection
@section('action')
    action= "{{route('trabajadore.store')}}"
@endsection