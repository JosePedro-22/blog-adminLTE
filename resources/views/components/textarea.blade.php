@props([
    'label',
    'value' => '',
])

<div class="form-group">
    <label for="{{ $attributes->get('id') }}">{{ $label }}</label>

    <textarea id="{{ $attributes->get('id') }}" cols="{{ $attributes->get('cols') }}" rows="{{ $attributes->get('rows') }}"
        {{ $attributes->merge(['class' => 'form-control', 'name' => $attributes->get('name')]) }}>{{ $value }}</textarea>

    @error($attributes->get('name'))
        <span class="text-danger"> {{ $message }}</span>
    @enderror
</div>
