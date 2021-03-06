@props(['label', 'name' => '', 'src' => '', 'size' => 'medium'])

<label class="img-container">
    <span class="fw-bold d-block mb-2">{{ $label }}</span>
    <div class="img-wrapper {{$size}}">
        <img @isset($src) src="{{ $src }}" @endif class="img-fluid img-preview">
    </div>
    <input type="file" name="{{$name}}" id="{{$name}}" class="d-none img-upload @error($name) is-invalid @enderror" accept="image/jpeg,.jpg,image/png,.png,.jpeg,image/webp,.webp" {{$attributes}}>
    <span class="invalid-feedback" style="max-width: 150px;">@error($name)  {{ $message }} @else Selecione uma imagem válida @enderror</span>
</label>