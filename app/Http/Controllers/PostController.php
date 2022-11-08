<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function index() {
        $post = Post::all();
        return view('forum.index', ['activePosts' => 'active',
                                    'posts' => $post]);
    }

    public function create()
    {
        return view('post.create', [ 'activePost' => 'active',
                                        //'post' => $post,
                                        'subTitle' => 'Posts - Create']);
    }
    
    public function store(PostCreateRequest $request)
    { 
        try{
            $post = new Post($request->all());
            $post->save();
            return redirect('post');
        }catch(Exceptio $e){
            return back()->withInput()->withErrors(['default' => 'Mensaje generico que demuestre que controlamos la situacion,
                                                                  pero que no tenemos ni idea de que cojones ha pasado']);
        }
    }

    public function show(Post $post)
    {
        //$post = new Post($request->all());
        return view('post.show', [ 'activePost' => 'active',
                                      'post' => $post,
                                      'subTitle' => 'Posts - Show']);
    }
    
    public function edit(Post $post)//$id)
    {
        //$post = Post::find($id);
        return view('post.edit', [ 'activePost' => 'active', 
                                      'post' => $post,
                                      'subTitle' => 'Posts - Edit']);
    }

     public function update(PostEditRequest $request)
    {
        try{
            $post = new Post($request->all());
            $post->update();
            return redirect('post');
        }catch(Exceptio $e){
            return back()->withInput()->withErrors(['default' => 'Mensaje generico que demuestre que controlamos la situacion,
                                                                  pero que no tenemos ni idea de que cojones ha pasado']);
        }
    }
    
    public function destroy(Post $post)
    {
        try{
            $post->delete();
            return redirect('/post');
        }catch(Exceptio $e){
            return back()->withErrors(['default' => 'Mensaje generico que demuestre que controlamos la situacion,
                                                                  pero que no tenemos ni idea de que cojones ha pasado']);
        }
    }
}
