@extends('layout.app')

@section('title', 'Nouvel article')

@section('body')
    <a href="{{ route('articles.index')  }}">Retour a la liste</a>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
        <div class="w-full max-w-xl bg-white rounded-xl shadow-lg p-8">
            <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">
                Créer un nouvel article
            </h1>

                <form action="{{route('articles.store')}}" method="post" class="space-y-5" enctype="multipart/form-data">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Titre
                    </label>
                    <input
                        type="text"
                        name="titre"
                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition"
                        placeholder="Titre de l'article"
                    >
                    @error('titre')
                        <p class="text-xs text-red-600">{{ $message  }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Contenu
                    </label>
                    <textarea
                        name="contenu"
                        rows="6"
                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition"
                        placeholder="Contenu de l'article"
                    ></textarea>
                    @error('contenu')
                    <p class="text-xs text-red-600">{{ $message  }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Auteur
                    </label>
                    <input
                        type="text"
                        name="autheur"
                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition"
                        placeholder="Nom de l'auteur"
                    >
                    @error('autheur')
                    <p class="text-xs text-red-600">{{ $message  }}</p>
                    @enderror
                </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Ajouter une image:
                        </label>
                        <input
                            type="file"
                            name="image"
                            class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition"
                        >
                        @error('image')
                        <p class="text-xs text-red-600">{{ $message  }}</p>
                        @enderror
                    </div>

                <button
                    type="submit"
                    class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-200"
                >
                    Créer l'article
                </button>
            </form>
        </div>
    </div>
@endsection
