<div id="user-list" class="col-md-4">
    <div class="card">
        <h3 class="card-header">
            {{ __('User List') }}
        </h3>
        <div class="card-body">
            <ul>
                @foreach (\App\Models\User::all() as $user)
                    <li>
                        <a href="{{ route('user.show', $user) }}">
                            <label for="name" class="col text-md-right btn btn-link">{{ $user->name }}</label>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
