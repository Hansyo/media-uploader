<div class="col">
    <x-card.base :href="route('video.show', $video)" :headerTxt="$video->title" :img="__('https://img.youtube.com/vi/') . $video->youtube_id . __('/hqdefault.jpg')" class="vh-25" />
</div>
