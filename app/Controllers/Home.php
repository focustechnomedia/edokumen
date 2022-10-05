<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $load = [
            'title' => 'Dashboard'
        ];
        return view('content/dashboard_view', $load);
    }
}
