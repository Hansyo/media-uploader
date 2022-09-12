<div class="col-md-5 col-lg-4 col-xl-3 p-2">
    <div class="card p-0">
        <a href="{{ route('image.show', $image) }}" class="stretched-link">
            <h3 class="card-header">
                {{ $image->title }}
            </h3>
        </a>
        <img class="card-img-top" src="{{ Storage::url($image->file_path) }}">
    </div>
</div>
