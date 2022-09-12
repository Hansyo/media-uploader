<div class="col-md-5 col-lg-4 col-xl-3 p-2">
    <div class="card p-0">
        <a href="{{ route('video.show', $video) }}" class="stretched-link">
            <h3 class="card-header">
                {{ $video->title }}
            </h3>
        </a>
        <img class="card-img-top" src="https://img.youtube.com/vi/{{ $video->youtube_id }}/hqdefault.jpg">
    </div>
</div>

