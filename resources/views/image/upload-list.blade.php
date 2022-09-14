<div id="upload-list">
    <div class="card">
        <h3 class="card-header">
            {{ __('All Images') }}
        </h3>
        <div class="card-body">
            <div class="row justify-content-md-center">
                @foreach ($contents as $content)
                    @include('image.list-card', ['image' => $content])
                @endforeach
            </div>
        </div>
        {{ $contents->links() }}
    </div>
</div>

