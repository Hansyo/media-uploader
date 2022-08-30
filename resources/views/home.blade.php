@extends('auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>HOME</h1>
        </div>
        @guest
            {{-- @include('auth.login-form') --}}
            {{-- <x-auth.login-form/> --}}
        @endguest
        @auth
            @include('user.menu')
        @endauth
    </div>
@endsection
