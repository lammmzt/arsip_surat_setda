<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data['title'] = 'Dashboard';
        $data['active'] = 'dashboard';
        return view('Dashboard/index', $data);
    }
}