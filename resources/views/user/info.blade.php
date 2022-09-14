@extends('home')

@section('main-contents')
    <div class="d-grid gap-2">
        <x-card.base :headerTxt="__('User Info')">
            <div class="row">
                <label for="name" class="col text-md-right">{{ __('Username') }}</label>

                <div class="col-sm-8 border border-primary">
                    <p id="name">{{ $user->name }}</p>
                </div>
            </div>

            <div class="row">
                <label for="self_info" class="col text-md-right">{{ __('User Information') }}</label>

                <div class="col-sm-8 border border-primary">
                    <p id="self_info">{{ $user->self_info }}</p>
                </div>
            </div>
        </x-card.base>
        <div>
            <x-uploads :contents="$contents" :images="$images" :videos="$videos"/>
        </div>
    </div>
@endsection
