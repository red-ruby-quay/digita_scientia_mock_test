<?php

namespace App\Controllers;

class Setting extends BaseController
{
    public function index()
    {
        $nama = \auth()->user()->username;
        $data = array();
        $data['nama'] = $nama;
        $header['title']='Setting';
        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('setting', $data);
        echo view('partial/footer');
    }
}
