@extends('home')

@section('main-contents')
    <x-card.base :headerTxt="__('Image Upload from URL')">
        <form method="POST" action="{{ route('image.store') }}" class="d-grid gap-2" enctype="multipart/form-data">
            @method('POST')
            @csrf

            <div class="form-group-row">
                <label for="Title" class="col col-form-label text-md-right">{{ __('Title') }}</label>
                <div class="com-md-8">
                    <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                        name="title" value="{{ old('title') }}" required autofocus>

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
                <label for="image_url" class="col col-form-label text-md-right">{{ __('Image Link') }}</label>
                <div class="com-md-8">
                    <input id="image_url" type="url"
                        class="form-control{{ $errors->has('image_url') ? ' is-invalid' : '' }}" name="image_url"
                        accept="image/*" value="{{ old('image_url') }}" required>

                    @if ($errors->has('image_url'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('image_url') }}</strong>
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
    </x-card.base>
@endsection
