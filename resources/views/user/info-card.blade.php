{{-- <x-user.show> --}}
<div id="user-info" class="d-grid gap-2">
    <div class="card">
        <h3 class="card-header">
            {{ __('User Info') }}
        </h3>
        <div class="card-body d-grid gap-2">
            <div class="row">
                <label for="name" class="col text-md-right">{{ __('Username') }}</label>

                <div class="col-sm-8 border border-primary">
                    <p id="name">{{ $user->name }}</p>
                </div>
            </div>

            <div class="row">
                <label for="self_info" class="col text-md-right">{{ __('User Information') }}</label>

                <div class="col-sm-8 border border-primary">
                    <p id="self_info">{{ $user->self_info }}</p>
                </div>
            </div>
        </div>
    </div>
    <div>
        @include('user.upload-list')
    </div>
</div>
{{-- </x-user.show> --}}
