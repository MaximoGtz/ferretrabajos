@extends('/login/seleccionarlogin')
@section('titulo_login', 'Cliente')
@section('action', '/cliente/login')
@section('label_campo1', 'Correo')
@section('campo1', 'email')
@section('errorcampo1')
    @error('email')
        {{ $message }}
    @enderror
@endsection
