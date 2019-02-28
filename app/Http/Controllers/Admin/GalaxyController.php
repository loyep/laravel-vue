<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class GraceController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('grace.index');
    }
}
