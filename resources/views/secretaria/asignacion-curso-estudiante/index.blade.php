@extends('layouts.app')

@section('title', 'Asignación')
    
@section('body')
<div class="py-8 px-16 mx-auto lg:py-20">
    <h1 class="text-3xl font-bold">
        Asignaciones estudiantes
    </h1>

    @if (Session::has('mensaje'))
        <div class="container mx-auto mt-5">
            <div id="alert-border-3" class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50" role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <div class="ml-3 text-sm font-medium">
                    {{Session::get('mensaje')}}
                </div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8"  data-dismiss-target="#alert-border-3" aria-label="Close">
                <span class="sr-only">Dismiss</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                </button>
            </div>
        </div>
    @endif
    
    <div class="container mx-auto mt-5">
        <div class="relative overflow-x-auto rounded-lg shadow-lg">
            <div class="py-8 text-right">
                <a href="{{ route('asignacion-estudiante.create') }}" class="bg-blue-700 text-white py-2 px-4 rounded dark:bg-blue-700 dark:hover:bg-blue-800">
                    Asignar curso
                </a>
            </div>
            <table class="w-full text-sm text-left text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-3 rounded-l-lg">
                            Carné
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Estudiante
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Carrera
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Curso
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Semestre
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($asignaciones as $detail)
                        <tr class="bg-white">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $detail->carne }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $detail->estudiante }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $detail->carrera }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $detail->curso }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $detail->semestre }}
                            </td>
                        </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
@endsection