@props([
    'href' => null,
    'type' => 'submit',
    'tag' => 'button'
])

@if($href)
    <a href="{{ html_entity_decode($href) }}" {{ $attributes->merge(['class' => 'btn']) }}>
        {{ $slot }}
    </a>
@else
    <{{ $tag }} type="{{ $type ?? 'button' }}" {{ $attributes->merge(['class' => 'btn']) }}>
    {{ $slot }}

    </{{ $tag }}>
@endif
