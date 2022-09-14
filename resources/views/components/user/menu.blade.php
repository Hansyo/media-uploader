<div id="user-menu">
    <x-card.base :href="route('user.show', Auth::user())" :href_class="collect(['text-decoration-none', 'link-dark'])"
        :headerTxt="Auth::user()->name">
        <div class="d-grid gap-2">
            <a class="btn btn-outline-secondary" href="{{ route('image.upload') }}">
                画像をアップロード
            </a>
            <a class="btn btn-outline-secondary" href="{{ route('image.create') }}">
                画像を投稿
            </a>
            <a class="btn btn-outline-secondary" href="{{ route('video.create') }}">
                動画を投稿
            </a>
            <a class="btn btn-outline-secondary" href="{{ route('user.edit') }}">
                ユーザー情報の編集
            </a>
            <a class="btn btn-outline-secondary" href="{{ route('logout') }}">
                ログアウト
            </a>
        </div>
    </x-card.base>
</div>
