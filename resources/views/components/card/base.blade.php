<div class="card p-0">
    @if ($attributes->has('href'))
        <a href="{{ $attributes->get('href') }}"
            @if ($attributes->has('href_class')) class="{{ $attributes->get('href_class') }}"
            @else class="stretched-link" @endif>

            <h3 class="card-header">{{ $attributes->get('title') }}</h3>
        </a>
    @else
        <h3 class="card-header">{{ $attributes->get('title') }}</h3>
    @endif

    @if ($attributes->has('img'))
        <img class="card-img-top" src="{{ $attributes->get('img') }}">
    @endif

    @if ($slot->isNotEmpty())
        <div class="card-body container">
            {{ $slot }}
        </div>
    @endif
    @if (isset($slot_ul))
        {{ $slot_ul }}
    @endif

</div>
