<?php

use Zizaco\Confide\ConfideUser;
use Zizaco\Confide\ConfideUserInterface;
use Zizaco\Entrust\HasRole;

class User extends Eloquent implements ConfideUserInterface {

	use ConfideUser;
    use HasRole;

    public function account()
    {
        return $this->belongsTo('Account');
    }

    public function transactions()
    {
        return $this->hasMany('Transaction');
    }

}
