@if ($paginator->hasPages())
    <div class="flex items-center justify-between border-t border-gray-200 px-4 py-3">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="px-3 py-1 border rounded text-gray-400 cursor-not-allowed">Previous</span>
        @else
            <a href="#" 
               data-page="{{ $paginator->currentPage() - 1 }}" 
               class="ajax-pagination px-3 py-1 border rounded text-gray-700 hover:bg-gray-100">Previous</a>
        @endif

        {{-- Pagination Elements --}}
        <div class="flex space-x-1">
            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="px-3 py-1">{{ $element }}</span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="ajax-pagination px-3 py-1 border rounded bg-primary text-white">{{ $page }}</span>
                        @else
                            <a href="#" 
                               data-page="{{ $page }}" 
                               class="ajax-pagination px-3 py-1 border rounded text-gray-700 hover:bg-gray-100">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="#" 
               data-page="{{ $paginator->currentPage() + 1 }}" 
               class="ajax-pagination px-3 py-1 border rounded text-gray-700 hover:bg-gray-100">Next</a>
        @else
            <span class="px-3 py-1 border rounded text-gray-400 cursor-not-allowed">Next</span>
        @endif
    </div>
@endif