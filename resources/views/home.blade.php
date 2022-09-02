@extends('base')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-12 col-sm-auto row gy-2 m-0 p-0">
                <div>
                    @guest
                        @include('auth.login-form')
                    @endguest
                    @auth
                        @include('user.menu')
                    @endauth
                    @include('user.user-list')
                </div>
            </nav>
            <div id="main-contents" class="col-sm container-fluid">
                @hasSection('main-contents')
                    @yield('main-contents')
                @else
                    @include('image.list-card')
                @endif
            </div>
        </div>
    </div>
@endsection
