<?php

use \Zizaco\Confide\UserValidator;

class BuckaneerUserValidator extends UserValidator {

    /**
     * Custom validation rules.
     *
     * @var array
     */
    public $rules = [
        'create' => [
            'username'      => 'required|alpha_dash|unique:users',
            'email'         => 'required|email|unique:users',
            'password'      => 'required|min:4',
        ],
        'update' => [
            'username' => 'required|alpha_dash',
            'email'    => 'required|email',
            'password' => 'required|min:4',
        ]
    ];

}