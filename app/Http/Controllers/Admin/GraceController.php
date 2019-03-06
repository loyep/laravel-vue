<?php

namespace App\Http\Controllers\Admin;

use App\Facades\Grace;
use Illuminate\Http\Request;

class GraceController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $config = [
            'base' => Grace::path(),
            'name' => Grace::title(),
            'description' => '美好源于热爱'
        ];
        return view('grace.index', compact('config'));
    }
}
