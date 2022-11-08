<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class MainController extends Controller
{
    function index() {
        $post = Post::all();
        return view('forum.index', ['activePosts' => 'active',
                                    'posts' => $post]);
    }

    function login(Request $request) {
        $request->session()->put('user', true);
        return redirect('/')/*->with('message', 'You are logged in.')*/;
    }

    function logout(Request $request) {
        $request->session()->forget('user');
        /*$request->session()->flash('message', 'You are logged out.')*/;
        return redirect('/');
    }
}
