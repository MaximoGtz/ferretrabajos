@extends('admins.formulario_trabajadores')
@section('form_name')
    Editar a <b>{{$trabajadore->nombre}}</b>
@endsection
@section('action')
    action= "{{route('trabajadore.update', $trabajadore)}}"
@endsection
@section('method')
    @method('PUT')
@endsection