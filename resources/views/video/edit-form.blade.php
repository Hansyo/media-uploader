<div id="video-edit">
    <div class="card">
        <h3 class="card-header">
            {{ __('Update Video') }}
        </h3>
        <div class="card-body">
            <form method="POST" action="{{ route('video.update', $video) }}" class="d-grid gap-2"
                enctype="multipart/form-data">
                @method('PATCH')
                @csrf

                <div class="form-group-row">
                    <label for="Title" class="col col-form-label text-md-right">{{ __('Title') }}</label>
                    <div class="com-md-8">
                        <input id="title" type="text"
                            class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title"
                            value="{{ old('title', $video) }}" required autofocus>

                        @if ($errors->has('title'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group-row">
                    <label for="description" class="col col-form-label text-md-right">{{ __('Description') }}</label>
                    <div class="com-md-8">
                        <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                            name="description">{{ old('description', $video) }}</textarea>

                        @if ($errors->has('description'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group-row">
                    <label for="url" class="col col-form-label text-md-right">{{ __('Video Link') }}</label>
                    <div class="com-md-8">
                        <input id="url" type="url"
                            class="form-control{{ $errors->has('url') ? ' is-invalid' : '' }}" name="url"
                            accept="video/*"
                            value="{{ old('url', 'https://www.youtube.com/watch?v=' . $video->youtube_id) }}" required>

                        @if ($errors->has('url'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('url') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col text-center">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Update') }}
                        </button>
                    </div>
                </div>
            </form>
            <form method="post" action="{{ route('video.destroy', $video) }}" class="d-grid gap-3">
                @method('DELETE')
                @csrf

                <div class="form-group row mb-4">
                    <label>
                        <input id="isAcceptDelete" type="checkbox" class="form-check-input" name="isAcceptDelete"
                            required>
                        動画を削除しますか？
                    </label>
                    <div class="col text-center">
                        <button type="submit" class="btn btn-danger">
                            {{ __('Delete Video') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
