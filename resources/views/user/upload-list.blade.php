<div id="upload-list">
    <div class="card">
        <h3 class="card-header">
            {{ __('Uploads') }}
        </h3>
        <div class="card-body">
            <div class="row justify-content-md-center">
                @foreach ($items as $item)
                    @if ($item->youtube_id !== null)
                        @include('video.list-info-card', ['video' => $item])
                    @else
                        @include('image.list-card', ['image' => $item])
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>

