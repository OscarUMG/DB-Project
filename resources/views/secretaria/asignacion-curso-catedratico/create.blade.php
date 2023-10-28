@extends('layouts.app')

@section('title', 'Inscripción')
    
@section('body')
<div class="py-8 px-4 mx-auto max-w-2xl lg:py-20">
    @if (Session::has('mensaje'))
        <div class="container mx-auto mt-5">
            <div id="alert-border-3" class="flex items-center p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50" role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <div class="ml-3 text-sm font-medium">
                    {{Session::get('mensaje')}}
                </div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8"  data-dismiss-target="#alert-border-3" aria-label="Close">
                <span class="sr-only">Dismiss</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                </button>
            </div>
        </div>
    @endif

    <form action="{{ route('catedratico.store') }}" method="POST" class="bg-white rounded-lg shadow-lg p-6">
        @csrf
        <h2 class="mb-4 text-xl font-medium text-slate-700">Catedrático</h2>

        <input type="text" name="id_user" id="id_user" value="{{ $user->id + 1 }}" hidden>

        <div class="mb-6">
            <span class="block text-sm font-medium text-slate-700">Nombre del catedrático</span>
            <input name="nombre" id="nombre" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
            focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
            disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
          " required>
        </div>

        <div class="mb-6">
            <span class="block text-sm font-medium text-slate-700">Dirección</span>
            <input name="direccion" id="direccion" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
            focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
            disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
          " required>
        </div>

        <h2 class="mb-4 text-xl font-medium text-slate-700">Usuario</h2>

        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
            <div class="mb-6">
                <span class="block text-sm font-medium text-slate-700">Username</span>
                <input name="username" id="username" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
              " required/>
            </div>

            <div class="mb-6">
                <span class="block text-sm font-medium text-slate-700">Email</span>
                <input type="email" name="email" id="email" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
              " required/>
            </div>
        </div>

        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
            <div class="mb-6">
                <span class="block text-sm font-medium text-slate-700">Contraseña</span>
                <input name="password" id="password" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
              " value="Cat1234+" readonly required/>
            </div>

            <div class="mb-6">
                <span class="block text-sm font-medium text-slate-700">Rol</span>
                <select name="id_rol" id="id_rol" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
              " required/>
                    @foreach ($rol as $detail)
                        <option value="{{ $detail->id }}">{{ $detail->rol }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <button type="submit" class="bg-green-700 text-white py-2 px-4 rounded dark:bg-green-700 dark:hover:bg-green-800">
            Registrar catedratico
        </button>
        <a href="{{ url('/asignar-curso-catedratico') }}" class="bg-red-700 text-white py-2 px-4 rounded dark:bg-red-700 dark:hover:bg-red-800">
            Regresar
        </a>
    </form>
</div>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
@endsection