<?php

namespace App\Http\Controllers;

use App\Facades\Prism;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param string  $name
     *
     * @return Response
     */
    public function show(Request $request, $name)
    {
        $user = User::withCount('articles')->where('name', $name)->firstOrFail();
        $articles = Article::where('user_id', $user->id)->paginate();

        if ($request->ajax()) {
            return view('components.card.article-list', compact('articles'));
        }

        Prism::setTitle($user->display_name);

        return view('user.show', compact('user', 'articles'));
    }
}
