@extends('layout')

@section('content')
@include('transactions._form', ['new' => true])
@stop
