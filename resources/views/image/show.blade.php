@extends('home')

@section('main-contents')
    <x-card.show id="show-image" :headerTxt="$image->title" :img="{{ Storage::url($image->file_path) }}" :content="$image"
        :category="\App\Enums\Category::Image" />
@endsection
