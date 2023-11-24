<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function register(): string
    {
        return view('auth/register');
    }

    public function login(): string
    {
        return view('auth/login');
    }
}
