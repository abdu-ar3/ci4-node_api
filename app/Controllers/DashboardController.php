<?php

namespace App\Controllers;

class DashboardController extends BaseController
{
    public function index()
    {
        $session = session();
        if(!$session->get('logged_in')){
            return redirect()->to('/login');
        }
        return view('dashboard');
    }
}
