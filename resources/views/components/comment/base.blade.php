<li class="list-group-item">
    <div class="container row align-items-center">
        <div class="col-md-1">
            <a id="uploader" href="{{ route('user.show', $comment->user) }}" class="btn btn-link">
                {{ $comment->user->name }}
            </a>
        </div>
        <pre class="col-md m-0">{{ $comment->comment }}</pre>
    </div>
</li>
