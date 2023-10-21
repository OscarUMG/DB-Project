@extends('layouts.app')

@section('title', 'Login')
    
@section('body')
<div class="py-8 px-4 mx-auto max-w-2xl lg:py-20">
    <form action="" method="POST" class="bg-white rounded-lg shadow-lg p-6 ">
        @csrf
        <h2 class="mb-4 text-xl font-medium text-slate-700">Log In</h2>
        <div class="mb-6">
            <span class="block text-sm font-medium text-slate-700">Username</span>
            <input type="text" name="username" id="username" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
              focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
              disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
            " required/>
        </div>
        <div class="mb-6">
            <span class="block text-sm font-medium text-slate-700">Password</span>
            <input type="password" name="password" id="password" step="0.01" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
            " required/>
        </div>
        @error('message')
            <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">
                {{ $message }}
            </p>
        @enderror
        <button type="submit" class="bg-blue-700 text-white py-2 px-4 rounded dark:bg-blue-700 dark:hover:bg-blue-800">
            Iniciar sesión
        </button>
    </form>
</div>
@endsection