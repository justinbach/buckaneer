@extends('layout')

@section('content')
<h1>Welcome, {{ Auth::user()->username }}!</h1>
<p>Get started by doing some stuff.</p>
@stop