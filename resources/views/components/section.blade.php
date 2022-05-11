@props(['title', 'description' => '', 'icon' => ''])

<div class="row g-4 controls-section" {{ $attributes }}>
    <div class="col-12 col-md-4 col-xxl-3">
        @if($icon)
            <div class="row g-3">
                <div class="col-auto">
                    <div class="custom-icon-holder icon-large">
                        <i class="{{$icon}} bi"></i>
                    </div>
                </div>
                <div class="col">
                    <h3 class="section-title">{{$title}}</h3>
                    <div class="section-intro">
                        {!! $description ?? ""!!}
                    </div>
                </div>
            </div>
        @else
            <h3 class="section-title">{{$title}}</h3>
            <div class="section-intro">
                {!! $description ?? ""!!}
            </div>
        @endif
    </div>
    <div class="col-12 col-md-8 col-xxl-6">
        <div class="card card-body border-0 shadow-sm p-4">
            {{ $slot }}
        </div>
    </div>
</div>
