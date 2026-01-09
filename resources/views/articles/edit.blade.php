@extends('layout.app')

@section('body')
    <a href="{{ route('articles.index')  }}">Retour a la liste</a>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
        <div class="w-full max-w-xl bg-white rounded-xl shadow-lg p-8">
            <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">
                Modifier l'article {{$article->titre}}
            </h1>

            <form action="{{route('articles.update', $article)}}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Titre
                    </label>
                    <input
                        type="text"
                        name="titre"
                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition"
                        placeholder="Titre de l'article"
                        value="{{ $article->titre  }}"
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


                    >{{ $article->contenu }}</textarea>
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
                        value="{{ $article->autheur  }}"

                    >
                    @error('autheur')
                    <p class="text-xs text-red-600">{{ $message  }}</p>
                    @enderror
                </div>

                <button
                    type="submit"
                    class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-200"
                >
                    Modifier l'article
                </button>
            </form>
        </div>
    </div>
@endsection
