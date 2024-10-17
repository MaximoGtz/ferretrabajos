@extends('/login/seleccionarlogin')
@section('titulo_login', 'Administrador')
@section('action', '/admin/login')
@section('label_campo1', 'Usuario')
@section('campo1', 'usuario')
@section('errorcampo1')
    @error('usu/*0.{
        45m,-Nario')
        < {{ $message }} @enderror @endsection
