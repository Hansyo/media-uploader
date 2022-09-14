@extends('home')

@section('main-contents')
    <div id="upload-list">
        <x-card.base title="All Videos">
            <div class="row justify-content-md-center">
                @foreach ($contents as $content)
                    <x-video.list-card :video="$content" />
                @endforeach
            </div>

            {{ $contents->links() }}
        </x-card.base>
    </div>
@endsection
