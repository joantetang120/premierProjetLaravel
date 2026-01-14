@extends('layout.app')

@section('body')
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-8">

            <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">
                Formulaire de connexion
            </h1>

            @error('password')
            <span class="text-xs text-red-500 italic">{{ $message }}</span>
            <br>
            @enderror
            @error('email')
            <span class="text-xs text-red-500 ital  ic">{{ $message }}</span>
            @enderror

            <form action="{{route('login')}}" method="POST" class="space-y-5">
                @csrf

                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Email
                    </label>
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >

                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Mot de passe
                    </label>
                    <input
                        type="password"
                        name="password"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >

                </div>

                <a href="{{route('showregister')}}"> Creer un compte</a>

                <!-- Submit -->
                <button
                    type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-lg font-semibold hover:bg-blue-700 transition duration-200"
                >
                    Se connecter
                </button>
            </form>

        </div>
    </div>
@endsection
