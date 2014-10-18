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
    }

    /**
     * Display a listing of the resource.
     * GET /accounts/{id}/transactions
     *
     * @param Account $account
     * @return \Illuminate\View\View
     */
    public function index(Account $account)
	{
        return View::make('transactions.index', [
            'transactions'  => $this->transaction->byAccount($account->id)->get(),
            'account'       => $account
        ]);
	}

    /**
     * Show the form for creating a new resource.
     * GET /account/{id}/transactions/create
     *
     * @param Account $account
     * @return \Illuminate\View\View
     */
    public function create(Account $account)
	{
        return View::make('transactions.create', [
            'transaction' => $this->transaction,
            'account' => $account
        ]);
	}

    /**
     * Store a newly created resource in storage.
     * POST /account/{id}/transactions
     *
     * @param Account $account
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(Account $account)
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
            return $this->getIndexRedirect($account);
        }
	}

    /**
     * Display the specified resource.
     * GET /account/{id}/transactions/{id}
     * @param Account $account
     * @param Transaction $transaction
     */
    public function show(Account $account, Transaction $transaction)
	{
		//
	}

    /**
     * Show the form for editing the specified resource.
     * GET /account/{id}/transactions/{id}
     *
     * @param Account $account
     * @param Transaction $transaction
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit(Account $account, Transaction $transaction)
	{
        $this->transaction = $transaction;
        if ($this->transaction === NULL)
        {
            return Redirect::action('TransactionsController@index', [
                'account'       => $account,
                'transaction'   => $this->transaction
            ]);
        }
        else
        {
            return View::make('transactions.edit', [
                'account'       => $account,
                'transaction'   => $this->transaction
            ]);
        }
	}

    /**
     * Update the specified resource in storage.
     * PUT /account/{id}/transactions/{id}
     *
     * @param Account $account
     * @param Transaction $transaction
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update(Account $account, Transaction $transaction)
	{
        $this->transaction = $transaction;
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
            return $this->getIndexRedirect($account);
        }
	}

    /**
     * Remove the specified resource from storage.
     * DELETE /account/{id}/transactions/{id}
     *
     * @param Account $account
     * @param Transaction $transaction
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Account $account, Transaction $transaction)
	{
        $this->transaction = $transaction;
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
            return $this->getIndexRedirect($account);
        }
	}

    protected function getIndexRedirect(Account $account)
    {
        return Redirect::action('TransactionsController@index', ['account' => $account->id]);
    }

}