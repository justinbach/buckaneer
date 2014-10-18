<?php

use \LaravelBook\Ardent\Ardent;

class Transaction extends Ardent {

    /** @var bool */
    public $autoHydrateEntityFromInput = true;

    /** @var bool */
    public $forceEntityHydrationFromInput = true;

    /** @var array */
    protected $fillable = ['name', 'notes', 'amount'];

    public static $rules = [
        'name'      => 'required',
        'amount'    => 'required|numeric'
    ];

    public function scopeByAccount($query, $id)
    {
        return $query->where('account_id', '=', $id);
    }

    public function account()
    {
        return $this->belongsTo('Account');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function beforeSave()
    {
        $user = Auth::getUser();
        $this->user()->associate($user);
        $this->account()->associate($user->account);
    }

}