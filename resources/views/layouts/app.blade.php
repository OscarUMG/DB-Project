<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>@yield('title')</title>
</head>
<body>
    <header class="fixed top-0 left-0 right-0 z-50 bg-white shadow-md py-4 px-16">
        <div class="flex justify-between items-center">
            @if (auth()->check())
                <div class="flex items-center">
                    {{-- <a href="{{ url('/') }}" class="text-gray-800 font-bold text-xl">UMG</a> --}}
                    <nav class="mx-6">
                        @if (auth()->user()->id_rol == 1)
                            <a href="{{ url('/') }}" class="text-gray-800 font-bold text-xl">UMG</a>
                            <a href="#" class="text-gray-800 hover:text-blue-500">inscripción de Estudiantes</a>
                            <a href="#" class="text-gray-800 hover:text-blue-500 ml-6"> Asignación de Cursos</a>
                            <a href="#" class="text-gray-800 hover:text-blue-500 ml-6">Asignación de catedráticos al curso</a>
                        @endif
                        
                        @if (auth()->user()->id_rol == 2)
                            <a href="{{ route('catedratico.index') }}" class="text-gray-800 font-bold text-xl">UMG</a>
                            {{-- <a href="{{ route('catedratico.ingresar_notas') }}" class="text-gray-800 hover:text-blue-500 ml-6">Ingreso de notas</a> --}}
                        @endif

                        @if (auth()->user()->id_rol == 3)
                            <a href="{{ url('/') }}" class="text-gray-800 font-bold text-xl">UMG</a>
                            <a href="{{ route('tesoreria.pago') }}" class="text-gray-800 hover:text-blue-500 ml-6">Registrar pago del estudiante</a>
                        @endif
                    </nav>
                </div>
                <div class="flex items-center">
                    <p class="text-xl mr-4">Welcome <b>{{ auth()->user()->username }}</b></p>
                    <a href="{{ route('login.destroy') }}" class="bg-blue-500 text-white hover:bg-blue-700 py-2 px-4 rounded">Log Out</a>
                </div>
            @else
            <div class="flex items-center">
                <a href="{{ url('/') }}" class="text-gray-800 font-bold text-xl">UMG</a>
            </div>
            <div class="flex items-center">
                <a class="bg-blue-500 text-white hover:bg-blue-700 py-2 px-4 rounded mr-4" href="{{ route('login.index') }}">{{ __('Login') }}</a>
                <a class="bg-blue-500 text-white hover:bg-blue-700 py-2 px-4 rounded" href="{{ route('register.index') }}">{{ __('Registro') }}</a>
            </div>
            @endif
        </div>
    </header>
    @yield('body')

    @yield('js')
</body>
</html>