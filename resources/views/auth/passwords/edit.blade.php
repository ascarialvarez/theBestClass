@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3"><i class="bi bi-journal-medical"></i> {{ __('Change Password') }}</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">{{ __('Home') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Change Password') }}</li>
                        </ol>
                    </nav>
                    @include('session-messages')
                    <div class="col-6 border p-3 shadow-sm">
                        <form action="{{route('password.update')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="old-password" class="form-label">{{ __('Old Password') }}</label>
                                <input class="form-control" id="old-password" name="old_password" type="password" placeholder="{{ __('Old Password') }}">
                            </div>
                            <div class="mb-3">
                                <label for="new-password" class="form-label">{{ __('New Password') }}</label>
                                <input class="form-control" id="new-password" name="new_password" type="password" placeholder="{{ __('New Password') }}">
                            </div>
                            <div class="mb-3">
                                <label for="new-password" class="form-label">{{ __('Confirm new Password') }}</label>
                                <input class="form-control" id="new-password" name="new_password_confirmation" type="password" placeholder="{{ __('Confirm new Password') }}">
                            </div>
                            <button type="submit" class="btn btn-outline-primary"><i class="bi bi-check2"></i> {{ __('Save') }}</button>
                        </form>
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
</div>
@endsection