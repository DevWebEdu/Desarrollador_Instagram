@extends('layouts.app')

@section('titulo')
    Inicia Sesion en Devstagram
@endsection


@section('contenido')
    <div class="md:flex  md:justify-center md:gap-10 md:items-center ">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset('img/login.jpg') }}" alt="Imagen  Inicio de sesion de usuario" srcset="">
        </div>
        <div class="md:w-5/12 bg-white   p-6 rounded-lg shadow-lg">
            <form method="POST" action="{{route('login')}}" novalidate>
                {{-- AGREGA UN TOKE FICTICIO PARA PRUEBAS *POSIBLE CAMBIO* --}}
                @csrf
                {{-- AGREGAMOS ERROR AL MOMENTO DE QUE INGRESAN SUS CREDENCIALES --}}
                @if (session('message'))
                    <p class="bg-red-500  text-white my-2 rounded-lg text-sm p-2 text-center ">{{ session('message') }}</p>
                @endif

                {{-- BLOQUE DE EMAIL --}}
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold"> email </label>
                    <input id="email" type="email" name="email" placeholder="Email de registro"
                        class="border p-3 w-full rounded-lg @error('email')
                        border-red-700
                    @enderror"
                        value="{{ old('email') }}">

                    @error('email')
                        <p class="bg-red-500  text-white my-2 rounded-lg text-sm p-2 text-center ">{{ $message }}</p>
                    @enderror
                </div>

                {{-- BLOQUE DE CONTRASEÑA --}}
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold"> password </label>
                    <input id="password" type="password" name="password" placeholder="Password de registro"
                        class="border p-3 w-full rounded-lg @error('password')
                        border-red-700
                    @enderror">
                    @error('password')
                        <p class="bg-red-500  text-white my-2 rounded-lg text-sm p-2 text-center ">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input type="checkbox" name="remember" id="">  <label for="" class=" text-gray-500 text-sm" >Mantener mi sesion abierta</label> 
                </div>

                <input type="submit" value="Iniciar Sesión"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">


            </form>
        </div>
    </div>
@endsection
