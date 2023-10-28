<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    @yield('css')
    <title>@yield('Login')</title>
</head>
<body>
    <header class="fixed top-0 left-0 right-0 z-50 bg-white shadow-md py-2 px-16">
        <div class="flex justify-between items-center">
            @if (auth()->check())
                <div class="flex items-center">
                    {{-- <a href="{{ url('/') }}" class="text-gray-800 font-bold text-xl">UMG</a> --}}
                    <nav class="mx-6">
                        @if (auth()->user()->id_rol == 1)
                        <div class="flex items-center">
                            <div>
                                <a href="{{ route('inscripcion.index') }}" class="text-gray-800 font-bold text-xl"><img src="https://umg.edu.gt/assets/umg.png" width="55" alt=""></a>
                            </div>
                            <div class="ml-10">
                                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800" type="button">Estudiante<svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                </svg>
                                </button>
                                <div id="dropdown" class="z-10 hidden bg divide-y divide-gray-100 rounded-lg shadow w-60 bg-gray-50">
                                    <ul class="py-2 text-sm text-gray-700 text-gray-200" aria-labelledby="dropdownDefaultButton">
                                        <li style="margin-bottom: 5px">
                                            <a href="{{ route('inscripcion.index') }}" class="text-gray-800 hover:text-blue-500 ml-6"><i class="fa-solid fa-user-plus fa-lg"></i> Inscripción</a>
                                        </li>
                                        <li style="margin-bottom: 5px">
                                            <a href="{{ route('asignacion-estudiante.index') }}" class="text-gray-800 hover:text-blue-500 ml-6"><i class="fa-solid fa-file-signature fa-lg"></i> Asignación de Cursos</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="ml-10">
                                <a href="{{ route('asignacion-catedratico.index') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-blue-800">Catedratico</a>
                            </div>
                        </div>
                        @endif

                        @if (auth()->user()->id_rol == 2)
                            <a href="{{ route('nota.index') }}" class="text-gray-800 font-bold text-xl"><img src="https://umg.edu.gt/assets/umg.png" width="55" alt=""></a>
                        @endif

                        @if (auth()->user()->id_rol == 3)
                        <div class="flex items-center">
                            <div>
                                <a href="{{ route('tesoreria.index') }}" class="text-gray-800 font-bold text-xl"><img src="https://umg.edu.gt/assets/umg.png" width="55" alt=""></a>
                            </div>
                            <div class="ml-10">
                                <a href="{{ route('tesoreria.pago') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><i class="fa-solid fa-hand-holding-dollar" style="color: #ffffff;"></i> Registrar pago</a>
                            </div>

                        </div>
                        @endif
                    </nav>
                </div>
                <div class="flex items-center">
                    <p class="text-xl mr-4">Hola! <b>{{ auth()->user()->username }}</b>, bienvenido</p>
                    <a href="{{ route('login.destroy') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" style="margin-left: 20px">Log Out <i class="fa-solid fa-right-from-bracket fa-lg" style="color: #ffffff;"></i></a>
                </div>
            @else
            <div class="flex items-center">
                <a href="{{ url('/') }}" class="text-gray-800 font-bold text-xl"><img src="https://umg.edu.gt/assets/umg.png" width="55" alt=""></a>
            </div>
            <div class="flex items-center">
                <a class="bg-blue-500 text-white hover:bg-blue-700 py-2 px-4 rounded mr-4" href="{{ route('login.index') }}">{{ __('Login') }}</a>
                {{-- <a class="bg-blue-500 text-white hover:bg-blue-700 py-2 px-4 rounded" href="{{ route('register.index') }}">{{ __('Registro') }}</a> --}}
            </div>
            @endif
        </div>
    </header>
    @yield('body')

    @yield('js')
</body>
</html>