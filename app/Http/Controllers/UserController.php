<?php

namespace App\Http\Controllers;

use App\Facades\Prism;
use App\Models\Post;
use App\Models\User;

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
     * @param $name
     *
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $user = User::withCount('posts')->where('name', $name)->firstOrFail();
        $posts = Post::where('user_id', $user->id)->paginate();
        Prism::setTitle($user->display_name);

        return view('user.show', compact('user', 'posts'));
    }
}
