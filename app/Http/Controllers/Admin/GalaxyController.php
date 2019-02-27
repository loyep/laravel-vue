<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class GalaxyController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('galaxy.index');
    }
}
