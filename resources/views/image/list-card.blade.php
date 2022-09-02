<div id="show-image">
    <div class="card">
        <h3 class="card-header">
            {{ __('All Image') }}
        </h3>
        <div class="card-body">
            <div class="row justify-content-md-center">
                @foreach ($images as $image)
                    <a href="{{ route('image.show', $image) }}" class="col-md-5 col-lg-4 col-xl-3 p-2">
                        <div class="card p-0">
                            <h3 class="card-header">
                                {{ $image->title }}
                            </h3>
                            <img class="card-img-top" src="{{ Storage::url($image->file_path) }}">
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
