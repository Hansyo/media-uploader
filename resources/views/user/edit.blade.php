@extends('home')

@section('main-contents')
    <x-card.base title="Edit Info">
        {{-- 成功時のメッセージ --}}
        @if (session('flash_message'))
            <div class="p-4 mb-4 text-md text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                role="alert">
                {{ session('flash_message') }}
            </div>
        @endif
        {{-- 重複時のメッセージ --}}
        @if (session('error_message'))
            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                {{ session('error_message') }}
            </div>
        @endif
        <div class="form-horizontal">
            <form method="post" action="{{ route('user.update') }}" class="d-grid gap-3">
                @method('PATCH')
                @csrf

                <div class="form-group row">
                    <label for="name" class="col col-form-label text-md-right">{{ __('Username') }}</label>

                    <div class="col-md-8">
                        <input id="name" type="text"
                            class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                            value="{{ old('name', $user) }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-8">
                        <input id="email" type="email"
                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                            value="{{ old('email', $user) }}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="self_info" class="col col-form-label text-md-right">{{ __('User Information') }}</label>

                    <div class="col-md-8">
                        <textarea id="self_info" class="form-control{{ $errors->has('self_info') ? ' is-invalid' : '' }}" name="self_info">{{ old('self_info', $user) }}</textarea>
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <div class="col text-center">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Update') }}
                        </button>
                    </div>
                </div>
            </form>
            <form method="post" action="{{ route('user.destroy') }}" class="d-grid gap-3">
                @method('DELETE')
                @csrf

                <div class="form-group row mb-4">
                    <label>
                        <input id="isAcceptDelete" type="checkbox" class="form-check-input" name="isAcceptDelete" required>
                        アカウントを削除しますか？
                    </label>
                    <div class="col text-center">
                        <button type="submit" class="btn btn-danger">
                            {{ __('Delete Account') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </x-card.base>
@endsection
