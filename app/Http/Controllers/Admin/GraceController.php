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
            'description' => 'Ant Design 是西湖区最具影响力的 Web 设计规范'
        ];
        return view('grace.index', compact('config'));
    }
}
