@extends('layout')

@section('content')
<h1>Account Transactions</h1>
@if (count($transactions) === 0)
<p>There are currently no transactions associated with your account.</p>
@else
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Amount</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($transactions as $transaction)
        <tr>
            <td>{{{ $transaction->amount }}}</td>
            <td>{{{ $transaction->name }}}</td>
            <td>
                {{ link_to_action('TransactionsController@edit', 'Edit', [$account->id, $transaction->id], ['class' => 'btn btn-success btn-inline']) }}
                {{ Form::open(['route' => ['account.transactions.update', $account->id, $transaction->id], 'method' => 'delete', 'class' => 'form-inline']) }}
                {{ Form::submit('Delete', array('class' => 'btn btn-danger form-control')) }}
                {{ Form::close() }}
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endif
<a href="{{ URL::action('TransactionsController@create', ['account' => Auth::getUser()->account->id]) }}" class="btn btn-primary btn-lg active" role="button">Add A Transaction</a>
@stop