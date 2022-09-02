@extends('base')

@section('content')
    <div class="container-fluid d-grid gap-2">
        <div class="row justify-content-left">
            <h1>HOME</h1>
        </div>
        @guest
            @include('auth.login-form')
            {{-- <x-auth.login-form/> --}}
        @endguest
        @auth
            @include('user.menu')
        @endauth
        @include('user.user-list')
    </div>
@endsection
