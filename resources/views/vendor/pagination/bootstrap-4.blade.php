@if ($paginator->hasPages())
<div class="pull-right">
    <ul class="pagination">
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <button class="btn btn-info" onclick="next({{ $paginator->nextPageUrl() }})" rel="next">Enroll</button>
        @else
            <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
        @endif
    </ul>
</div>
@endif
