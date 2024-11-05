<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <style>
        body {
            min-height: 100vh;
            margin: 0;
        }

        header {
            min-height: 50px;
            background: lightcyan;
        }

        footer {
            min-height: 50px;
            background: PapayaWhip;
        }


        /* The article fills all the space between header & footer */

        body {
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
        }

        .fondo1 {
            background-color: #6cbdcd;
        }

        .fondo2 {
            background-color: #cfcfcf;
        }
    </style>
    <title> @yield('title') </title>
</head>

<body>


    <nav class="bg-grey border-gray-200 dark:bg-gray-400 fondo1">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="/imgs/others/icon_box.png" class="h-8" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white ">FerreTrabajos</span>
            </a>
            {{-- AQUI EMPIEZA EL DROPDOWN --}}
            <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">


                @guest

                    <a href="/login/cliente">

                        <button type="button"
                            class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Iniciar
                            sesión</button>
                    </a>
                @endguest




                @auth


                    <button type="button"
                        class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                        id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                        data-dropdown-placement="bottom">
                        <span class="sr-only">Open user menu</span>
                        {{-- <img class="w-8 h-8 rounded-full" src="{{auth()->user()->imagen}}" alt="user photo"> --}}


                        <img class="w-8 h-8 rounded-full" src="/ejemplo" alt="user photo">
                    </button>
                @endauth
                <!-- Dropdown menu -->

                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                    id="user-dropdown">
                    <div class="px-4 py-3 ">
                        <span class="block text-sm text-gray-900 dark:text-white">Administrador</span>
                        <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">Maximo Gutierrez</span>
                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        <li>
                            <a href="/cliente/listadoc"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Clientes</a>
                        </li>
                        <li>
                            <a href="/trabajadore"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Trabajadores</a>
                        </li>
                        <li>
                            <a href="/admin/listado"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Administradores</a>
                        </li>
                        <li>
                            <form action="/admin/logout" method="POST">
                                @csrf
                                <button type="submit"
                                    class="text-sm text-blue-600 dark:text-blue-500 hover:underline">Cerrar sesion
                            </form>
                        </li>
                    </ul>
                </div>
                <button data-collapse-toggle="navbar-user" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-user" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            {{-- AQUI TERMINA EL DROPDOWN --}}

            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                <ul
                    class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700 fondo1">
                    <li>
                        <a href="/"
                            class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500"
                            aria-current="page">Inicio</a>
                    </li>
                    <li>
                        <a href="/trabajadores/ver"
                            class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500"
                            aria-current="page">Trabajadores</a>
                    </li>
                    <li>
                        <a href="/nosotros"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Nosotros</a>
                    </li>
                    <li>
                        <a href="/contacto"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contacto</a>
                    </li>
                    <li>
                        <a href="/servicios"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Servicios</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Aqui va el contenido principal -->
    <main>
        @yield('main_content')
    </main>
    <!-- Se acaba el contenido principal -->

    <!-- Empieza el footer -->


    <footer class="bg-white rounded-lg shadow dark:bg-gray-900 m-4 fondo2">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <a href="https://flowbite.com/" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                    <img src="/imgs/others/icon_box.png" class="h-8" alt="Flowbite Logo" />
                    <span
                        class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">FerreTrabajos</span>
                </a>
                <ul
                    class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                    <li>
                        <a href="/nosotros" class="hover:underline me-4 md:me-6">Nosotros</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">Políticas de privacidad</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">Licencia</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline">Contacto</a>
                    </li>
                </ul>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="/"
                    class="hover:underline">FerreTrabajos</a>. Todos los derechos reservados.</span>
        </div>
    </footer>


    <!-- Termina el footer -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</body>

</html>
