<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('admin.index');
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('users.home');
    }
}
