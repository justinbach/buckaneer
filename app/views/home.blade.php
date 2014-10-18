@extends('layout')

@section('content')
<h1>Welcome, {{ Auth::user()->username }}!</h1>
<p>Your current account balance is ${{ Auth::user()->account->cached_balance }}.</p>
@stop