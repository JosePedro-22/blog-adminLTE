@props([
    'label',
    'checked' => false,
])

<div class="custom-control custom-checkbox mb-2">
    <input {{ $attributes->class([
        "custom-control-input",
        "is-invalid" => $errors->has($attributes->get('name')),
    ])->merge(['type' => 'checkbox']) }} @checked($checked)>
    <label for="{{ $attributes->get('id') }}" class="custom-control-label">{{ $label }}</label>
    @error($attributes->get('name'))
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

