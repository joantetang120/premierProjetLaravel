@extends('layout.app')

@section('title', 'Liste des articles')

@section('body')
    <div class="min-h-screen bg-gray-100 px-4 py-8">
        <div class="max-w-6xl mx-auto bg-white rounded-xl shadow-lg p-6">

            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-bold text-gray-800">
                    Articles du blog
                </h1>

                <a
                    href="{{ route('articles.create') }}"
                    class="inline-flex items-center bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition"
                >
                    + Nouvel article
                </a>
            </div>

            @if ($articles->isEmpty())
                <p class="text-center text-gray-500 py-10">
                    Aucun article pour le moment !
                </p>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
                        <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Titre</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Contenu</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Auteur</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Date de création</th>
                            <th class="px-4 py-3 text-center text-sm font-semibold text-gray-700">Actions</th>
                        </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200">
                        @foreach ($articles as $article)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-4 py-3 font-medium text-gray-800">
                                    {{ $article->titre }}
                                </td>

                                <td class="px-4 py-3 text-gray-600 truncate max-w-xs">
                                    {{ Str::limit($article->contenu, 80) }}
                                </td>

                                <td class="px-4 py-3 text-gray-700">
                                    {{ $article->autheur }}
                                </td>

                                <td class="px-4 py-3 text-gray-500">
                                    {{ $article->created_at->format('d/m/Y') }}
                                </td>

                                <td>
                                    <div class="flex justify-between">
                                        <a href="{{route('articles.edit', $article)}}" class="text-xs text-blue-400 underline">Edit</a>

                                        <form action="{{route('articles.destroy', $article)}}" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="px-5 py-2 bg-red-300 rounded-md">Supprimer</button>

                                        </form>
                                    </div>
                                </td>


                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

        </div>
    </div>
@endsection
