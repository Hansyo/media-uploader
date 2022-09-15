<div id="{{ $id }}">
    <x-card.base :attributes="$attributes">
        @if (isset($slotOuterBody))
            <x-slot:slot-outer-body>
                {{ $slotOuterBody }}
            </x-slot>
        @endif

        <div class="d-grid gap-2">
            <div id="uploader" class="col-12">
                <h4><label for="uploader">{{ __('Uploader:') }}</label></h4>
                <a id="uploader" href="{{ route('user.show', $content->user) }}">
                    <label class="col text-md-right btn btn-link">{{ $content->user->name }}</label>
                </a>
            </div>

            <div id="created_at" class="col-12">
                <h4><label for="created_at">{{ __('Created at:') }}</label></h4>
                <p id="created_at">{{ $content->created_at }}</p>
            </div>

            <div id="description" class="col-12">
                <h4><label for="description">{{ __('Description:') }}</label></h4>
                <pre id="description">{{ $content->description }}</pre>
            </div>
        </div>

        @can('editable', $content)
            <a class="col text-center btn btn-primary" href="{{ route($category->tag() . '.edit', $content) }}">
                {{ __('Edit') }}
            </a>
        @endcan
    </x-card.base>
</div>
