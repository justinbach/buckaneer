@extends('layout')

@section('content')

<form method="POST" action="{{ URL::to('/users/forgot') }}" accept-charset="UTF-8" class="form-account">
    <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">

    <div class="form-group">
        <label for="email">{{{ Lang::get('confide::confide.e_mail') }}}</label>
        <div class="input-append input-group">
            <input class="form-control" placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
        </div>
    </div>
    <div class="form-group">
        <input class="btn btn-default" type="submit" value="{{{ Lang::get('confide::confide.forgot.submit') }}}">
    </div>

    @if (Session::get('error'))
    <div class="alert alert-error alert-danger">{{{ Session::get('error') }}}</div>
    @endif

    @if (Session::get('notice'))
    <div class="alert">{{{ Session::get('notice') }}}</div>
    @endif
</form>

@stop