@if($new)
{{ Form::open(['route' => ['account.transactions.store', $account->id], 'role' => 'form', 'class' => 'form-horizontal']) }}
@else
{{ Form::open(['route' => ['account.transactions.update', $account->id, $transaction->id], 'method' => 'put', 'role' => 'form', 'class' => 'form-horizontal']) }}
@endif
<div class="row">
    <div class="col-md-6 col-centered">
        <h2>
            @if($new)
            New Transaction
            @else
            Edit Transaction
            @endif
        </h2>
        @if(Session::has('flash_error'))
        <p>{{ Session::get('flash_error') }}</p>
        @endif
        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', $transaction->name, ['class' => 'form-control', 'required']) }}
            @if ($errors->first('name'))
            <p>{{ $errors->first('name') }}</p>
            @endif
        </div>
        <div class="form-group">
            {{ Form::label('amount', 'Amount') }}
            {{ Form::text('amount', $transaction->amount, ['class' => 'form-control', 'required']) }}
            @if ($errors->first('amount'))
            <p>{{ $errors->first('amount') }}</p>
            @endif
        </div>
        <div class="form-group">
            {{ Form::label('notes', 'Notes') }}
            {{ Form::textarea('notes', $transaction->notes, ['class' => 'form-control']) }}
            @if ($errors->first('notes'))
            <p>{{ $errors->first('notes') }}</p>
            @endif
        </div>
        <button class="btn btn-primary" type="submit">
            @if($new)
            Record Transaction
            @else
            Submit Changes
            @endif
        </button>
        {{ Form::close() }}
    </div>
</div>