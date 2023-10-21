@extends('layouts.app')

@section('title', 'Ingresar')
    
@section('body')
<div class="py-8 px-4 mx-auto max-w-2xl lg:py-20">
    <form action="{{ route('catedratico.store') }}" method="POST" class="bg-white rounded-lg shadow-lg p-6">
        @csrf
        <h2 class="mb-4 text-xl font-medium text-slate-700">Nota</h2>

        <input type="text" name="id_user" id="id_user" value="{{ auth()->user()->id }}" hidden>
        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
            <div class="mb-6">
                <span class="block text-xl font-bold mb-2">Curso</span>
                <span class="block">{{ $curso->nombre }}</span>
            </div>

            <div class="mb-6">
                <span class="block text-xl font-bold mb-2">Código del curso</span>
                <span class="block">{{ $curso->id_curso }}</span>
                <input type="text" name="id_curso" id="id_curso" value="{{ $curso->id_curso }}" hidden>
            </div>
        </div>

        <div class="mb-6">
            <span class="block text-sm font-medium text-slate-700">Estudiante</span>
            <select name="id_estudiante" id="id_estudiante" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
            focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
            disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
          " required>
                @foreach ($estudiante as $estudiante)
                    <option value="{{ $estudiante->id_estudiante }}">{{ $estudiante->estudiante }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
            <div class="mb-6">
                <span class="block text-sm font-medium text-slate-700">Tipo de nota</span>
                <select name="id_tipo_nota" id="id_tipo_nota" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
              " required/>
                    @foreach ($tipo_de_nota as $tipo_de_nota)
                        <option value="{{ $tipo_de_nota->id }}">{{ $tipo_de_nota->nombre }}</option>
                    @endforeach
                </select>
            </div>
    
            <div class="mb-6">
                <span class="block text-sm font-medium text-slate-700">Calificación</span>
                <input type="number" name="puntos" id="puntos" step="0.01" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                  focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                  disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                " required/>
            </div> 
        </div>
        <button type="submit" class="bg-green-700 text-white py-2 px-4 rounded dark:bg-green-700 dark:hover:bg-green-800">
            Ingresar nota
        </button>
        <a href="{{ url('/catedratico') }}" class="bg-red-700 text-white py-2 px-4 rounded dark:bg-red-700 dark:hover:bg-red-800">
            Regresar
        </a>
    </form>
</div>
@endsection