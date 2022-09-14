@extends('home')

@section('main-contents')
    <div id="upload-list">
        <x-card.base title="All Images">
            <div class="row justify-content-md-center">
                @foreach ($contents as $content)
                    <x-image.list-card :image="$content" />
                @endforeach
            </div>

            {{ $contents->links() }}
        </x-card.base>
    </div>
@endsection
