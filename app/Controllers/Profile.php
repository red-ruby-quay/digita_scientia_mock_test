<?php

namespace App\Controllers;

class Profile extends BaseController
{
    public function index()
    {
        $nama = \auth()->user()->username;
        $data = array();
        $data['nama'] = $nama;
        $header['title']='Profile';
        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('profile', $data);
        echo view('partial/footer');
    }
}
