<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = array(
            'name' => 'Kevin Nathanael Halim',
            'nrp' => '5025211140',
            'class' => 'PBKK B',
            'period' => '2023/2024',
        );
        return view('welcome_message', $data);
    }
}
