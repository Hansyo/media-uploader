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
                <a href="{{ route('user.show', $content->user) }}">
                    <label class="col text-md-right btn btn-link">{{ $content->user->name }}</label>
                </a>
            </div>

            <div id="created_at" class="col-12">
                <h4><label for="created_at">{{ __('Created at:') }}</label></h4>
                <p>{{ $content->created_at }}</p>
            </div>

            <div id="description" class="col-12">
                <h4><label for="description">{{ __('Description:') }}</label></h4>
                <pre>{{ $content->description }}</pre>
            </div>

            @can('editable', $content)
                <div class="w-auto">
                    <a class="text-left btn btn-primary" href="{{ route($category->tag() . '.edit', $content) }}">
                        {{ __('Edit') }}
                    </a>
                </div>
            @endcan

            <x-card.base :headerTxt="__('Comments')">
                <x-slot:slot-outer-body>
                    <ul class="list-group list-group-flush">
                    @foreach ($comments as $comment)
                        <x-comment.base :comment="$comment" />
                    @endforeach
                    </ul>
                </x-slot>
                @auth
                    <x-comment.form :content="$content" :category="$category" />
                @endauth
            </x-card.base>
        </div>
    </x-card.base>
</div>
