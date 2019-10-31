<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
