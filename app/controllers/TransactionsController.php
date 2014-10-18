<?php

class TransactionsController extends \BaseController {

    protected $transaction;
    protected $account;

    /**
     * Constructor with automatic dependency injection.
     * @TODO inject repository instead of model
     *
     * @param Transaction $transaction
     */
    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
        $this->account = Auth::getUser()->account;
    }

    /**
	 * Display a listing of the resource.
	 * GET /transactions
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('transactions.index', [
            'transactions'  => $this->transaction->byAccount($this->account->id)->get(),
            'account'       => $this->account
        ]);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /transactions/create
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('transactions.create', [
            'transaction' => $this->transaction,
            'account' => $this->account
        ]);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /transactions
	 *
	 * @return Response
	 */
	public function store()
	{
        if (!$this->transaction->save())
        {
            return Redirect::back()
                ->withErrors($this->transaction->errors())
                ->withinput();
        }
        else
        {
            Session::flash('message', 'Your transaction has been recorded.');
            Session::flash('alert-class', 'alert-success');
            return $this->getIndexRedirect();
        }
	}

	/**
	 * Display the specified resource.
	 * GET /transactions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /transactions/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($accountId, $transactionId)
	{
        $this->transaction = Transaction::find($transactionId);
        if ($this->transaction === NULL)
        {
            return Redirect::action('TransactionsController@index', [
                'account'       => $this->account->id,
                'transaction'   => $this->transaction
            ]);
        }
        else
        {
            return View::make('transactions.edit', [
                'transaction'   => $this->transaction,
                'account'       => $this->account
            ]);
        }
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /transactions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($accountId, $transactionId)
	{
        $this->transaction = Transaction::find($transactionId);
        if (!$this->transaction->updateUniques())
        {
            return Redirect::back()
                ->withErrors($this->transaction->errors())
                ->withinput();
        }
        else
        {
            Session::flash('message', 'Your transaction has been updated.');
            Session::flash('alert-class', 'alert-success');
            return $this->getIndexRedirect();
        }
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /transactions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $this->transaction = Transaction::find($id);
        if (!$this->transaction->delete())
        {
            Session::flash('message', 'Error deleting transaction.');
            Session::flash('alert-class', 'alert-danger');
            return Redirect::back();
        }
        else
        {
            Session::flash('message', 'Transaction deleted successfully.');
            Session::flash('alert-class', 'alert-success');
            return $this->getIndexRedirect();
        }
	}

    protected function getIndexRedirect()
    {
        return Redirect::action('TransactionsController@index', ['account' => $this->account->id]);
    }

}