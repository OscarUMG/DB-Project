@extends('layouts.app')

@section('title', 'Notas')
    
@section('body')
<div class="py-8 px-16 mx-auto lg:py-20">
    <h1 class="text-3xl font-bold">
        Notas
    </h1>

    <div class="container mx-auto mt-5">
        <a href="{{ url('/estudiante') }}" class="bg-green-700 text-white py-2 px-4 rounded dark:bg-green-700 dark:hover:bg-green-800">
            Regresar
        </a>
        <br>
        <br>
        <div class="grid gap-4 sm:grid-cols-1 sm:gap-1">
            <div class="mb-6">
                <span class="block text-xl font-bold mb-2">Curso:</span>
                <span class="block">
                    @if (!empty($notas))
                        {{ $notas[0]->curso }}
                    @endif
                </span>
            </div>

            <div class="mb-6">
                <span class="block text-xl font-bold mb-2">Estudiante:</span>
                <span class="block">
                    @if (!empty($notas))
                        {{ $notas[0]->estudiante }}
                    @endif
                </span>
            </div>
        </div>

        <div class="relative overflow-x-auto rounded-lg shadow-lg">
            <table class="w-full text-sm text-left text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Tipo de nota
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Calificación
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($notas as $detail)
                        <tr class="bg-white">
                            <td class="px-6 py-4">
                                {{ $detail->tipo_de_nota }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $detail->puntos }}
                            </td>
                        </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>
            {{-- {{ $proveedor->links('') }} --}}
        </div>
    </div>
</div>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
@endsection