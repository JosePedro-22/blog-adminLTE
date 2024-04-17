@props([
    'label'
])
<div class="form-group">
    <label for="{{ $attributes->get('id') }}">{{ $label }}</label>
    <select {{ $attributes->class([
        'form-control',
        'is-invalid' => $errors->has($attributes->get('name'))
    ]) }}>
        {{ $slot }}
    </select>
@error($attributes->get('name'))
    <span class="text-danger">{{ $message }}</span>
@enderror

</div>
