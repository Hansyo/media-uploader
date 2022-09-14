@extends('base')

@section('content')
    <div class="container-fluid">
        <div class="row gap-2">
            <nav id="sidebar" class="col-12 col-sm-auto row gy-2 m-0 p-0">
                <div>
                    <div class="pb-3">
                        @guest
                            @include('auth.login-form')
                        @endguest
                        @auth
                            @include('user.menu')
                        @endauth
                    </div>
                    <div>
                        @include('user.user-list')
                    </div>
                </div>
            </nav>
            <div id="main-contents" class="col-sm container-fluid p-0 pt-2 pe-3">
                @hasSection('main-contents')
                    @yield('main-contents')
                @else
                    @include('user.upload-list')
                @endif
            </div>
        </div>
    </div>
@endsection
