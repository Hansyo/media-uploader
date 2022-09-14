<div id="show-image">
    <div class="card">
        <h3 class="card-header">
            {{ $image->title }}
        </h3>
        <img class="card-img-top" src="{{ Storage::url($image->file_path) }}">
        <div class="card-body container">
            <div class="d-grid gap-2">
                <div id="uploader" class="col-12">
                    <h4><label for="uploader">{{ __('Uploader:') }}</label></h4>
                    <a id="uploader" href="{{ route('user.show', $image->user) }}">
                        <label class="col text-md-right btn btn-link">{{ $image->user->name }}</label>
                    </a>
                </div>

                <div id="created_at" class="col-12">
                    <h4><label for="created_at">{{ __('Created at:') }}</label></h4>
                    <p id="created_at">{{ $image->created_at }}</p>
                </div>

                <div id="description" class="col-12">
                    <h4><label for="description">{{ __('Description:') }}</label></h4>
                    <p id="description">{{ $image->description }}</p>
                </div>
            </div>
            @can('editable', $image)
                <a class="col text-center btn btn-primary" href="{{ route('image.edit', $image) }}">{{ __('Edit') }}</a>
            @endcan
        </div>
    </div>
</div>
