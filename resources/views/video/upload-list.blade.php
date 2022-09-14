<div id="show-video">
    <div class="card">
        <h3 class="card-header">
            {{ __('All Videos') }}
        </h3>
        <div class="card-body">
            <div class="row justify-content-md-center">
                @foreach ($contents as $content)
                    @include('video.list-info-card', ['video' => $content])
                @endforeach
            </div>
        </div>
        {{ $contents->links() }}
    </div>
</div>
