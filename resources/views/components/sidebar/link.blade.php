@props([
    'icon',
    'isActive',
])
@php
    if(!$isActive){
        $isActive = request()->routeIs($isActive);
    }
@endphp

<li class="nav-item">
    <a {{ $attributes->class([
        'nav-link',
        'active' => $isActive
    ]) }}>
        @if ($icon)
            <i class="{{ $icon }}"></i>
        @endif
        <p>
            {{ $slot }}
            @isset($submenu)
                <i class="fas fa-angle-left right"></i>
            @endisset
        </p>
    </a>
    {{$submenu ?? null}}
</li>

