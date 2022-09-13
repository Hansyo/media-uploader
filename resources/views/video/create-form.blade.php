<div id="video-upload">
    <div class="card">
        <h3 class="card-header">
            {{ __('Video Upload from URL') }}
        </h3>
        <div class="card-body">
            <form method="POST" action="{{ route('video.store') }}" class="d-grid gap-2" enctype="multipart/form-data">
                @method('POST')
                @csrf

                <div class="form-group-row">
                    <label for="Title" class="col col-form-label text-md-right">{{ __('Title') }}</label>
                    <div class="com-md-8">
                        <input id="title" type="text"
                            class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title"
                            value="{{ old('title') }}" required autofocus>

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
                            name="description">{{ old('description') }}</textarea>

                        @if ($errors->has('description'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group-row">
                    <label for="url" class="col col-form-label text-md-right">{{ __('Video Link (Youtube Only)') }}</label>
                    <div class="com-md-8">
                        <input id="url" type="url"
                            class="form-control{{ $errors->has('url') ? ' is-invalid' : '' }}" name="url"
                            accept="video/*" value="{{ old('url') }}" required>

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
                            {{ __('Upload') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
