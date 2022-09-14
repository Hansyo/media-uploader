<div id="{{ $id }}">
    <x-card.base :attributes="$attributes">
        <div class="d-grid gap-4">
            {{ $slot }}

            <form method="post" action="{{ route($category->tag() . '.destroy', $content) }}" class="d-grid gap-3">
                @method('DELETE')
                @csrf

                <div class="form-group row">
                    <label>
                        <input id="isAcceptDelete" type="checkbox" class="form-check-input" name="isAcceptDelete" required>
                        画像を削除しますか？
                    </label>
                    <div class="col text-center">
                        <button type="submit" class="btn btn-danger">
                            {{ __('Delete Image') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </x-card.base>
</div>
