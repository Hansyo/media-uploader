<div id="upload-list">
    <div class="card">
        <h3 class="card-header">
            {{ __('Uploads') }}
        </h3>
        <div class="card-body">
            <div class="row justify-content-md-center">
                @foreach ($contents as $content)
                    @switch($content->category_id)
                        @case (\App\Enums\Category::Image)
                            @include('image.list-card', ['image' => $content->content])
                        @break

                        @case (\App\Enums\Category::Video)
                            @include('video.list-info-card', ['video' => $content->content])
                        @break
                    @endswitch
                @endforeach
            </div>
        </div>
        {{ $contents->links() }}
    </div>
</div>
