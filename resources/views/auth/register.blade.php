@extends('layouts.app')

@section('title', 'Register')

@section('body')
<div class="py-8 px-4 mx-auto max-w-2xl lg:py-20">
    <form action="" method="POST" class="bg-white rounded-lg shadow-lg p-6 ">
        @csrf
        <h2 class="mb-4 text-xl font-medium text-slate-700 text-center">Registrar usuario</h2>
        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
            <div class="mb-6">
                <span class="block text-sm font-medium text-slate-700">Username</span>

                <input type="text" name="username" id="username" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                    focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                    disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                "/>
                @error('username')
                    <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-6">
                <span class="block text-sm font-medium text-slate-700">Email</span>

                <input type="email" name="email" id="email" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                    focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                    disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                "/>
                @error('email')
                    <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </div>
        <div class="mb-6">
            <span class="block text-sm font-medium text-slate-700">Rol</span>

            <select name="id_rol" id="id_rol" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
            ">
                @foreach ($rol as $roles)
                    <option value="{{ $roles->id }}">{{ $roles->nombre_rol }}</option>
                @endforeach
            </select>
        </div>
        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
            <div class="mb-6">
                <span class="block text-sm font-medium text-slate-700">Password</span>

                <input type="password" name="password" id="password" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                    focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                    disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                " />
            </div>

            <div class="mb-6">
                <span class="block text-sm font-medium text-slate-700">Password confirmation</span>

                <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                    focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                    disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                " />
            </div>
        </div>
        @error('password')
            <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">
                {{ $message }}
            </p>
        @enderror
        <button type="submit" class="bg-blue-700 text-white py-2 px-4 rounded dark:bg-blue-700 dark:hover:bg-blue-800">
            Registrar
        </button>
    </form>
</div>
@endsection