<?php

namespace App\Http\Controllers\Prism;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrismController extends Controller
{

    public function index(Request $request)
    {
        return view('prism::dashboard', [
            'user' => $request->user(),
        ]);
    }

}
