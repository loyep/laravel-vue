<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Response;

class LinkController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Link $link
     *
     * @return Response
     */
    public function show(Link $link)
    {
        //
    }

    /**
     * Short link.
     *
     * @param string $slug
     */
    public function short(string $slug)
    {
    }
}
