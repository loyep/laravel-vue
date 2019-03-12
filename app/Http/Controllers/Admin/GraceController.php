<?php

namespace App\Http\Controllers\Admin;

use App\Facades\GraceAdmin;
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
            'base' => GraceAdmin::path(),
            'name' => GraceAdmin::title(),
            'description' => '美好源于热爱',
            'setting_drawer' => true 
        ];
        return view('admin.index', compact('config'));
    }
}
