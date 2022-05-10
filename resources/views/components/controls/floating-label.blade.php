@props(['name' => '', 'id' => $id ?? $name, 'label', 'validation' => 'Digite um valor válido para o campo ' . $label])

<div class="form-group form-floating">
    <input name="{{ $name }}" id="{{ $id }}" {{ $attributes->merge(['class' => "form-control " . ($errors->has($name) ? 'is-invalid' : ''), 'value' => old($name)]) }}  placeholder=" ">
    <label for="{{ $id }}">{{$label}}</label>
    <span class="invalid-feedback"> @error($name) {{$message}} @else {{$validation}} @enderror </span>
</div>
