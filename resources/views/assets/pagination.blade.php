<div class="pagination">

	@if ($paginator->nextPageUrl())
		<a href="{{ $paginator->nextPageUrl() }}">« Older</a>
	@else
		<div>&nbsp;</div>
	@endif


	@if ($paginator->currentPage() == 1)
		{{-- <a href="{{ $paginator->previousPageUrl() }}">Newer --}}
	@else
		<a href="{{ $paginator->previousPageUrl() }}">Newer »</a>
	@endif
</div>
