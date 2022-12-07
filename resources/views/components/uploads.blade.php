<div id="upload-list">
    <x-card.base :headerTxt="$headerTxt ?? __('Uploads')">
        <div class="row justify-content-md-center row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-1 g-3">
            @foreach ($contents as $content)
                    @switch($content->category_id)
                        @case (\App\Enums\Category::Image)
                            <x-image.list-card :image="$images->firstWhere('id', $content->content_id)" />
                        @break

                        @case (\App\Enums\Category::Video)
                            <x-video.list-card :video="$videos->firstWhere('id', $content->content_id)" />
                        @break
                    @endswitch
            @endforeach
        </div>
        {{ $contents->links() }}
    </x-card.base>
</div>
