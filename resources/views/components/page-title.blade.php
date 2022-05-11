@props(['title', 'route' => ''])

<div>
    <div class="row align-items-center justify-content-between mb-0">
        <div class="col-auto">
            @if($route) <a href="{{ route($route) }}" class="me-2 fs-3"><i class="bi bi-arrow-left"></i></a> @endif
            <h1 class="h4 d-inline-block mb-0">{{ $title }}</h1>
        </div>
        <div class="col-auto">
            {{$slot}}
        </div>
    </div>
    <hr class="mt-3 mb-5">
</div>
