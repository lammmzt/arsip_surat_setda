<?php

namespace App\Controllers;

class Home extends BaseController
{  
    public function index(): string // menampilkan halaman dashboard
    { 
        $data['title'] = 'Dashboard'; // set judul halaman
        $data['active'] = 'dashboard'; // set active menu
        return view('Dashboard/index', $data); // tampilkan view dashboard
    }
}