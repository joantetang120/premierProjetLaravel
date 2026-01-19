


@if ($paginator->hasPages())
    <div class="flex justify-center mt-6">
        <nav class="inline-flex items-center space-x-1">

            {{-- Previous --}}
            @if ($paginator->onFirstPage())
                <span class="px-3 py-2 text-sm text-gray-400 bg-gray-100 rounded">
                    Précédent
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                   class="px-3 py-2 text-sm text-gray-700 bg-white border rounded hover:bg-gray-100">
                    Précédent
                </a>
            @endif

            {{-- Pages --}}
            @foreach ($elements as $element)
<x></x>
                {{-- Dots --}}
                @if (is_string($element))
                    <span class="px-3 py-2 text-sm text-gray-500">
                        {{ $element }}
                    </span>
                @endif

                {{-- Page Numbers --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="px-3 py-2 text-sm font-semibold text-white bg-blue-600 rounded">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}" class="px-3 py-2 text-sm text-gray-700 bg-white border rounded hover:bg-gray-100">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif

            @endforeach

            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                   class="px-3 py-2 text-sm text-gray-700 bg-white border rounded hover:bg-gray-100">
                    Suivant
                </a>
            @else
                <span class="px-3 py-2 text-sm text-gray-400 bg-gray-100 rounded">
                    Suivant
                </span>
            @endif

        </nav>
    </div>
@endif
