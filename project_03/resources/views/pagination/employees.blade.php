@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination" class="flex justify-between items-center my-4">
        <div>
            @if ($paginator->onFirstPage())
                <span class="disabled text-gray-400">
                    <i class="fa-solid fa-chevron-left"></i>
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="text-blue-600 hover:text-blue-800">
                    <i class="fa-solid fa-chevron-left"></i>
                </a>
            @endif
        </div>
        <div class="flex items-center">
            <span class="mx-2 text-sm text-gray-600">
                Page {{ $paginator->currentPage() }} of {{ $paginator->lastPage() }}
            </span>
        </div>
        <div>
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="text-blue-600 hover:text-blue-800 mx-2">
                    <i class="fa-solid fa-chevron-right"></i>
                </a>
            @else
                <span class="disabled text-gray-400">
                    <i class="fa-solid fa-chevron-right"></i>
                </span>
            @endif
        </div>
    </nav>
@endif
