<div id="user-list">
    <div class="card">
        <h3 class="card-header">
            {{ __('User List') }}
        </h3>
        <ul class="list-group list-group-flush">
            @foreach ($users as $user)
                <li class="list-group-item list-group-item-action">
                    <a href="{{ route('user.show', $user) }}">
                        <label for="name" class="col text-md-right btn btn-link">{{ $user->name }}</label>
                    </a>
                </li>
            @endforeach
        </ul>
        {{ $users->links() }}
    </div>
</div>
