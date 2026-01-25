@extends('layout.app')


@section('content')
<div class="container mx-auto px-4 py-8">

    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Tableau de bord Admin</h1>
            <p class="text-gray-600">Bienvenue, <span class="font-semibold text-indigo-600">{{ auth('client')->user()->name }}</span></p>
        </div>

        <div class="mt-4 md:mt-0">
            <a href="{{ route('admin.clients.create') }}"
               class="inline-flex items-center px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg shadow-sm transition duration-150 ease-in-out">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                Ajouter un nouveau client
            </a>
        </div>
    </div>

    <div class="bg-white shadow-md rounded-xl overflow-hidden border border-gray-200">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Nom</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Rôle</th>
                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($clients as $client)
                <tr class="hover:bg-gray-50 transition duration-100">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">#{{ $client->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $client->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $client->email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($client->role === 'admin')
                            <span class="px-3 py-1 text-xs font-bold leading-wide uppercase bg-purple-100 text-purple-700 rounded-full">Admin</span>
                        @else
                            <span class="px-3 py-1 text-xs font-bold leading-wide uppercase bg-green-100 text-green-700 rounded-full">Client</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium space-x-3">
                        <a href="#" class="text-indigo-600 hover:text-indigo-900 bg-indigo-50 px-3 py-1 rounded hover:bg-indigo-100 transition">Modifier</a>

                        <form action="#" method="POST" class="inline-block" onsubmit="return confirm('Voulez-vous vraiment supprimer ce client ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900 bg-red-50 px-3 py-1 rounded hover:bg-red-100 transition">
                                Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
