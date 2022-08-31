{{-- <x-user.menu> --}}
<div id="user-menu" class="container-fluid">
    <div id="login" class="container-fluid">
        <div class="row justify-content-right">
            <div class="col-xs-4">
                {{-- @component('component.card-frame', ['title' => 'Login']) --}}
                <div class="card">
                    {{-- <h3 class="text-white text-center bg-dark rounded-top m-0"> --}}
                    <h3 class="card-header">
                        {{ Auth::user()->name }}
                    </h3>
                    {{-- <div class="border border-dark rounded-bottom p-2"> --}}
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            {{-- <a class="btn btn-link" href="{{ route('password.request') }}"> --}}
                            <a class="btn btn-outline-secondary">
                                画像をアップロード(Place Holder)
                            </a>
                            <a class="btn btn-outline-secondary">
                                画像を投稿(Place Holder)
                            </a>
                            <a class="btn btn-outline-secondary">
                                動画を投稿(Place Holder)
                            </a>
                            <a class="btn btn-outline-secondary" href="{{ route('user.edit') }}">
                                ユーザー情報の編集
                            </a>
                            <a class="btn btn-outline-secondary" href="{{ route('logout') }}">
                                ログアウト
                            </a>
                        </div>
                    </div>
                    {{-- </div> <!-- borderを付ける --> --}}
                </div>
                {{-- @endcomponent --}}
            </div>
        </div>
    </div>
</div>
{{-- </x-user.menu> --}}
