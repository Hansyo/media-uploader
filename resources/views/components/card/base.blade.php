<div class="{{ $attributes->class(['card', 'p-0'])->get('class') }}">
    @if (isset($href))
        <a href="{{ $href }}" @class(isset($hrefClass) ? $hrefClass->toArray() : ['stretched-link']))>

            <h3 class="card-header">{{ $headerTxt }}</h3>
        </a>
    @else
        <h3 class="card-header">{{ $headerTxt }}</h3>
    @endif

    @if (isset($img))
        <img class="card-img-top" src="{{ $img }}">
    @endif

    @if (isset($slotOuterBody))
        {{ $slotOuterBody }}
    @endif

    @if ($slot->isNotEmpty())
        <div class="card-body container-fluid">
            {{ $slot }}
        </div>
    @endif

</div>
