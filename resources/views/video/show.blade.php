@extends('home')

@section('main-contents')
    <x-card.show id="show-video" :headerTxt="$video->title" :content="$video" :category="\App\Enums\Category::Video"/>
@endsection
