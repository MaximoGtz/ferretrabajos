@extends('index')
@section('title', 'Formulario Trabajador')
@section('main_content')

    <h1 class="text-center py-5">
        @yield('form_name')
    </h1>




    @if ($errors->any())
        <div class="max-w-lg mx-auto p-4" >

            <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 "
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Información</span>
                <div>
                    <span class="font-medium text-center">Error!</span>
                    <br/>
                    @error('correo')
                        {{ $message }}
                        <br/>
                    @enderror()
                    @error('contrasena')
                    {{ $message }}
                    <br/>
                    @enderror()
                    @error('confirmar_contrasena')
                    {{ $message }}
                    <br/>
                    @enderror()
                    @error('nombre')
                    {{ $message }}
                    <br/>
                    @enderror()
                    @error('apellido')
                    {{ $message }}
                    <br/>
                    @enderror()
                    @error('rfc')
                    {{ $message }}
                    <br/>
                    @enderror()
                    @error('especialidad')
                    {{ $message }}
                    <br/>
                    @enderror()
                    @error('imagen')
                    {{ $message }}
                    <br/>
                    @enderror()
                </div>
            </div>
        </div>
    @endif
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">

        <form @yield('action') class="max-w-md mx-auto" method="post" enctype="multipart/form-data">
            @yield('method')
            @csrf
            <div class="relative z-0 w-full mb-5 group">
                <input  name="correo" id="floating_email"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    @if (old('correo'))

                            value="{{ old('correo') }}"
                        @endif
                    @isset($trabajadore)
                        value={{ $trabajadore->correo }}
                    @endisset />
                <label for="floating_email"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Correo
                    electrónico</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="password" name="contrasena" id="floating_password"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    
                    @if (old('contrasena'))

                            value="{{ old('contrasena') }}"
                        @endif
                    @isset($trabajadore)
                        value={{ $trabajadore->contrasena }}
                    @endisset />
                <label for="floating_password"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Contraseña</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="password" name="confirmar_contrasena" id="floating_repeat_password"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" "
                    @if (old('confirmar_contrasena'))

                            value="{{ old('confirmar_contrasena') }}"
                        @endif />
                <label for="floating_repeat_password"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirmar
                    contraseña</label>
            </div>
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="nombre" id="floating_first_name"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " 
                        @if (old('nombre'))

                            value="{{ old('nombre') }}"
                        @endif
                        @isset($trabajadore)
                        value={{ $trabajadore->nombre }}
                    @endisset />
                    <label for="floating_first_name"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nombre
                        (s)</label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="apellido" id="floating_last_name"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " 
                        @if (old('apellido'))

                            value="{{ old('apellido') }}"
                        @endif
                        @isset($trabajadore)
                        value={{ $trabajadore->apellido }}
                    @endisset />
                    <label for="floating_last_name"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Apellidos</label>
                </div>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="rfc" id="rfc"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " 
                    @if (old('rfc'))

                            value="{{ old('rfc') }}"
                        @endif
                    @isset($trabajadore)
                        value={{ $trabajadore->rfc }}
                    @endisset />
                <label for="rfc"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">RFC</label>
            </div>
            <div>
                <label for="countries"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Especialidad</label>
                <select id="countries" name="especialidad"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                    <option value="electricista">Electrico</option>
                    <option value="carpintero">Carpintero</option>
                    <option value="albanil">Albañil</option>
                </select>
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Sube tu
                    fotografía</label>
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    aria-describedby="user_avatar_help" id="user_avatar" name="imagen" type="file" accept="image/*">
                <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">Es obligatorio subir la
                    foto del trabajador</div>

            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>

    </div>
@endsection
