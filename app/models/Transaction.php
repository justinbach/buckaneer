<?php

class Transaction extends \Eloquent {
	protected $fillable = [];

    public function account()
    {
        return $this->belongsTo('Account');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }

}