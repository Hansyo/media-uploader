<div class="col-md-5 col-lg-4 col-xl-3 p-2">
    <x-card.base href="{{ route('video.show', $video) }}" title="{{ $video->title }}"
        img="https://img.youtube.com/vi/{{ $video->youtube_id }}/hqdefault.jpg" />
</div>
