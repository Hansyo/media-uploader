<div class="col">
    <x-card.base :href="route('image.show', $image)" :headerTxt="$image->title" :img="Storage::url($image->file_path)" class="vh-25" />
</div>
