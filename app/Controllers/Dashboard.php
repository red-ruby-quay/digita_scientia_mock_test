<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $nama = \auth()->user()->username;
        $data = array();
        $data['nama'] = $nama;
        $header['title']='Dashboard';
        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('dashboard', $data);
        echo view('partial/footer');
    }
}
