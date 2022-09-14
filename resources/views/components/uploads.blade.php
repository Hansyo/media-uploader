<div id="upload-list">
    <x-card.base title="Uploads">
        <div class="row justify-content-md-center">
            @foreach ($contents as $content)
                @switch($content->category_id)
                    @case (\App\Enums\Category::Image)
                        <x-image.list-card :image="$content->content" />
                    @break

                    @case (\App\Enums\Category::Video)
                        <x-video.list-card :video="$content->content" />
                    @break
                @endswitch
            @endforeach
        </div>
        {{ $contents->links() }}
    </x-card.base>
</div>
