<div id="show-video">
    <div class="card">
        <h3 class="card-header">
            {{ $video->title }}
        </h3>
        <div class="card-body container">
            <div class="d-grid gap-2">
                <div class="ratio ratio-16x9">
                    <iframe id="youtube-window" src="https://www.youtube.com/embed/{{ $video->youtube_id }}"
                        title="YouTube video player" allowfullscreen>
                    </iframe>
                </div>
                <div id="uploader" class="col-12">
                    <h4><label for="uploader">{{ __('Uploader:') }}</label></h4>
                    <a id="uploader" href="{{ route('user.show', $video->user) }}">
                        <label class="col text-md-right btn btn-link">{{ $video->user->name }}</label>
                    </a>
                </div>
                <div id="created_at" class="col-12">
                    <h4><label for="created_at">{{ __('Created at:') }}</label></h4>
                    <p id="created_at">{{ $video->created_at }}</p>
                </div>

                <div id="description" class="col-12">
                    <h4><label for="description">{{ __('Description:') }}</label></h4>
                    <pre id="description">{{ $video->description }}</pre>
                </div>
            </div>
            @can('editable', $video)
                <a class="col text-center btn btn-primary" href="{{ route('video.edit', $video) }}">{{ __('Edit') }}</a>
            @endcan
        </div>
    </div>
</div>
