@extends('home')

@section('main-contents')
    <x-card.show id="show-video" :headerTxt="$video->title" :content="$video" :category="\App\Enums\Category::Video" :comments="$comments" >
        <x-slot:slot-outer-body>
            <div class="ratio ratio-16x9 card-img-top">
                <iframe id="youtube-window" src="https://www.youtube.com/embed/{{ $video->youtube_id }}"
                    :headerTxt="__('YouTube video player')" allowfullscreen>
                </iframe>
            </div>
        </x-slot>
    </x-card.show>
@endsection
