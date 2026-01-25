@extends('layout.app')


@section('content')
<div class="min-h-screen bg-gray-100 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full bg-white p-8 rounded-xl shadow-lg">

        <div class="text-center mb-8">
            <h1 class="text-3xl font-extrabold text-gray-900">
                ➕ Ajouter un client
            </h1>
            <p class="mt-2 text-sm text-gray-600">
                Enregistrez un nouvel utilisateur ou administrateur
            </p>
        </div>

        {{-- Section Erreurs --}}
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-50 border-l-4 border-red-500 text-red-700">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.clients.store') }}" method="POST" class="space-y-6">
            @csrf

            {{-- Nom --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Nom complet</label>
                <input type="text" name="name" value="{{ old('name') }}" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Jean Dupont">
            </div>

            {{-- Email --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Adresse Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="admin@exemple.com">
            </div>

            {{-- Password --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Mot de passe</label>
                <input type="password" name="password" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="••••••••">
            </div>

            {{-- Rôle --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Rôle du compte</label>
                <select name="role" required
                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option value="client" {{ old('role') == 'client' ? 'selected' : '' }}>Client simple</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Administrateur</option>
                </select>
            </div>

            {{-- Actions --}}
            <div class="flex items-center justify-between pt-4">
                <a href="{{ route('admin.dashboard') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900 underline">
                    Annuler
                </a>
                <button type="submit"
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Enregistrer le client
                </button>
            </div>
        </form>
    </div>
</div>

