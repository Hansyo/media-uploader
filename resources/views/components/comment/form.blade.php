<div id="comment-form conteanier">
    <div class="col-lg-8 col-sm justify-content-center">
        <form method="POST" action="{{ route('comment.store') }}" class="d-grid gap-2">
            @method('POST')
            @csrf
            <input id="content_id" type="hidden" name="content_id" value="{{ $content->id }}">
            <input id="category_id" type="hidden" name="category_id" value="{{ $category->value }}">

            <div class="form-group row">
                <label for="comment" class="col-lg-auto col-sm col-form-label text-md-right">{{ __('Comment') }}</label>
                <div class="col-lg-8 col-sm">
                    <textarea id="comment" class="form-control{{ $errors->has('comment') ? ' is-invalid' : '' }}"
                                           name="comment" required>{{ old('comment') }}</textarea>

                    @if ($errors->has('comment'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('comment') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-md-auto d-grid gap-2 d-md-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Comment') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

