<div id="user-list">
    <x-card.base :headerTxt="__('User List')">
        <x-slot:slot-outer-body>
            <ul class="list-group list-group-flush">
                @foreach ($users as $user)
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('user.show', $user) }}" class="stretched-link">
                            <label for="name" class="col text-md-right btn btn-link">{{ $user->name }}</label>
                        </a>
                    </li>
                @endforeach
                @if ($users->hasPages())
                    <li class="list-group-item">
                        {{ $users->links() }}
                    </li>
                @endif
            </ul>
        </x-slot>
    </x-card.base>
</div>
