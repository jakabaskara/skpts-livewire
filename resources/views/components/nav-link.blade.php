@props(['active' => false])

@php
    $currentSegment = Request::segment(1);
    $isActive = $active || $currentSegment == 'calendar';
    $classes = $isActive
        ? 'nav-link active text-gray-100 bg-[linear-gradient(135deg,var(--tw-gradient-stops))] from-violet-500/[0.24] to-violet-500/[0.04]'
        : 'nav-link text-gray-500 hover:text-white';
    $iconClasses = $isActive ? 'shrink-0 fill-current text-violet-500' : 'shrink-0 fill-current text-gray-500';
@endphp

<li
    class="nav-item pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 {{ $isActive ? 'bg-[linear-gradient(135deg,var(--tw-gradient-stops))] from-violet-500/[0.24] to-violet-500/[0.04]' : '' }}">
    <a wire:navigate {{ $attributes->merge(['class' => $classes]) }}>
        <div class="flex items-center">
            <svg class="{{ $iconClasses }}" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                viewBox="0 0 16 16">
                <path d="M5 4a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2H5Z" />
                <path
                    d="M4 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0 0-4-4H4ZM2 4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4Z" />
            </svg>
            <span
                class="text-sm font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">{{ $slot }}</span>
        </div>
    </a>
</li>
