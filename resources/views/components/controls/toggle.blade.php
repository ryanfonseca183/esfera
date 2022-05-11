@props(['name' => '', 'id' => '', 'label', 'type' => 'checkbox', 'checked' => false, 'icon' => ''])

@php $id = $id !== '' ? $id : $name @endphp

<div class="form-check @if($type == "switch") form-switch @endif">
    <input name="{{$name}}" id="{{ $id }}" type="{{ $type == "switch" ? 'checkbox' : $type }}" @if(in_array(old($name), ['1', 'on', 'true']) || $checked) checked @endif {{$attributes->merge(['class' => 'form-check-input '. ($errors->has($name) ? 'is-invalid' : '')])}} >
    <label class="form-check-label" for="{{ $id }}">
        @if($icon) <i class="{{ $icon }} me-2"></i> @endif
        {!! $label !!}
    </label>
</div>
