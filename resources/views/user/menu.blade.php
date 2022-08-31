<div id="user-menu" class="col-md-4">
    <div class="card">
        <h3 class="card-header">
            {{ Auth::user()->name }}
        </h3>
        <div class="card-body">
            <div class="d-grid gap-2">
                <a class="btn btn-outline-secondary">
                    画像をアップロード{{-- (Place Holder) --}}
                </a>
                <a class="btn btn-outline-secondary">
                    画像を投稿{{-- (Place Holder) --}}
                </a>
                <a class="btn btn-outline-secondary">
                    動画を投稿{{-- (Place Holder) --}}
                </a>
                <a class="btn btn-outline-secondary" href="{{ route('user.edit') }}">
                    ユーザー情報の編集
                </a>
                <a class="btn btn-outline-secondary" href="{{ route('logout') }}">
                    ログアウト
                </a>
            </div>
        </div>
    </div>
</div>
