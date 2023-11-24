<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function register(): string
    {
        return view('auth/register');
    }

    public function login(): string
    {
        return view('auth/login');
    }

    public function checkout(): string
    {
        return view('transaction/checkout');
    }
}
