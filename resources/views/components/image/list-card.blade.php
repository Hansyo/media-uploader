<div class="col-md-5 col-lg-4 col-xl-3 p-2">
    <x-card.base href="{{ route('image.show', $image) }}" title="{{ $image->title }}"
        img="{{ Storage::url($image->file_path) }}" />
</div>
