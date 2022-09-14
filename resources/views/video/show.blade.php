@extends('home')

@section('main-contents')
    <x-card.show id="show-video" title="{{ $video->title }}" img="{{ Storage::url($video->file_path) }}" :content="$video"
        :category="\App\Enums\Category::Video" />
@endsection
