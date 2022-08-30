<div class="container">
    <div class="row justify-content-center">
        <div class="col-xs-8">
            <div class="card">
                <h3 class="card-header">
                    {{ __('Sign Up') }}
                </h3>
                <div class="card-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">

                            <strong>Error!</strong>登録できませんでした。
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-horizontal">
                        <form method="POST" action="{{ route('register') }}" class="d-grid gap-3">
                            @csrf
                            <div class="form-group row">
                                <label for="name"
                                    class="col col-form-label text-md-right">{{ __('Username') }}</label>

                                <div class="col-sm-8">
                                    <input id="name" type="text"
                                        class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                        name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                    class="col col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-sm-8">
                                    <input id="email" type="email"
                                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-sm-8">
                                    <input id="password" type="password"
                                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-sm-8">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <div class="col text-center">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
