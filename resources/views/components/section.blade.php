@props(['title', 'description' => ''])

<div class="row g-4" {{ $attributes }}>
    <div class="col-12 col-md-4 col-xxl-3">
        <h3>{{$title}}</h3>
        <div>{!! $description ?? ""!!}</div>
    </div>
    <div class="col-12 col-md-8 col-xxl-6">
        <div class="card card-body border-0 shadow-sm p-4">
            {{ $slot }}
        </div>
    </div>
</div>
