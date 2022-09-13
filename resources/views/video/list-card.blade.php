<div id="show-video">
    <div class="card">
        <h3 class="card-header">
            {{ __('All Video') }}
        </h3>
        <div class="card-body">
            <div class="row justify-content-md-center">
                @foreach ($videos as $video)
                    @include('video.list-info-card', compact('videos'))
                @endforeach
            </div>
        </div>
    </div>
</div>
