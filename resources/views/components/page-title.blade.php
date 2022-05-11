@props(['title', 'route' => ''])

<div class="row align-items-center justify-content-between">
    <div class="col-auto">
        @if($route) <a href="{{ route($route) }}" class="me-2 fs-3"><i class="bi bi-arrow-left"></i></a> @endif
        <h1 {{$attributes->merge(['class' => 'h2 fw-bold mb-0 d-inline-block']) }}>{{ $title }}</h1>
    </div>
    <div class="col-auto">
        {{$slot}}
    </div>
</div>
