<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home',

        ];



        return view('pages/home', $data);
    }
}
