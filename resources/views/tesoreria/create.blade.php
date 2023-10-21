@extends('layouts.app')

@section('title', 'Ingresar pago')
    
@section('body')
<div class="py-8 px-4 mx-auto max-w-2xl lg:py-20">
    <form action="{{ route('tesoreria.store') }}" method="POST" class="bg-white rounded-lg shadow-lg p-6">
        @csrf
        <h2 class="mb-4 text-xl font-medium text-slate-700">Ingresar pago</h2>

        <input type="text" name="id_user" id="id_user" value="{{ auth()->user()->id }}" hidden>

        <div class="mb-6">
            <span class="block text-sm font-medium text-slate-700">Número de carné</span>
            <input name="id_estudiante" id="id_estudiante" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
            focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
            disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
          " required>
        </div>
        
        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
            <div class="mb-6">
                <span class="block text-sm font-medium text-slate-700">Tipo de pago</span>
                <select name="id_tipo_pago" id="id_tipo_pago" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
              " required/>
                    @foreach ($tipo_de_pago as $detail)
                        <option value="{{ $detail->id }}">{{ $detail->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-6">
                <span class="block text-sm font-medium text-slate-700">Método de pago</span>
                <select name="id_metodo_pago" id="id_metodo_pago" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
              " required/>
                    @foreach ($metodo_de_pago as $detail)
                        <option value="{{ $detail->id }}">{{ $detail->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
            <div class="mb-6">
                <span class="block text-sm font-medium text-slate-700">Semestre</span>
                <select name="id_semestre" id="id_semestre" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
              " required/>
                    @foreach ($semestre as $detail)
                        <option value="{{ $detail->id }}">{{ $detail->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-6">
                <span class="block text-sm font-medium text-slate-700">Mes</span>
                <select name="mes" id="mes" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
              " required/>
                    @for($i = 1; $i<=12; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
        </div>

        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
            <div class="mb-6">
                <span class="block text-sm font-medium text-slate-700">Año</span>
                <select name="anio" id="anio" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
              " required/>
                    @for($i = 23; $i<=25; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>

            <div class="mb-6">
                <span class="block text-sm font-medium text-slate-700">Monto</span>
                <input type="number" name="monto" id="monto" step="0.01" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                  focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                  disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                " required/>
            </div> 
        </div>

        <button type="submit" class="bg-green-700 text-white py-2 px-4 rounded dark:bg-green-700 dark:hover:bg-green-800">
            Ingresar pago
        </button>
        <a href="{{ url('/tesoreria') }}" class="bg-red-700 text-white py-2 px-4 rounded dark:bg-red-700 dark:hover:bg-red-800">
            Regresar
        </a>
    </form>
</div>
@endsection