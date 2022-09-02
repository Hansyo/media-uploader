{{-- <x-login-form> --}}
{{-- <div id="login" class="col-md-4"> --}}
<div id="login" class="">
    <div class="card">
        <h3 class="card-header">
            Sign In
        </h3>
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}" class="d-grid gap-3">
                @csrf

                <div class="form-group row">
                    <label for="email" class="col col-form-label text-sm-right">{{ __('User name') }}</label>

                    <div class="col-xs-8">
                        <input id="email" type="text"
                            class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="email"
                            value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col col-form-label text-sm-right">{{ __('Password') }}</label>

                    <div class="col-xs-8">
                        <input id="password" type="password"
                            class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                            required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <div class="col text-end">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>

                        {{-- <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('auth.forgot') }}
                                    </a> --}}
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col text-center">
                    <a class="btn btn-outline-primary" href="{{ route('register') }}">Sign up</a>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- </x-login-form> --}}
