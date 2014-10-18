<?php

class Account extends \Eloquent {
	protected $fillable = [];

    public function transactions()
    {
        return $this->hasMany('Transaction');
    }

    public function users()
    {
        return $this->hasMany('User');
    }

}