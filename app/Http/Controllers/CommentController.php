<?php

namespace App\Http\Controllers;

use App\Models\comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return view('comment.index', ['activeComment' => 'active', 
                                      'comments'      => $comments,
                                      'subTitle'      => 'Comments - Index',
                                      'table'         => 'comment']);
    }

    public function create()
    {
        return view('comment.create', [ 'activeComment' => 'active',
                                        //'comment' => $comment,
                                        'subTitle' => 'Comments - Create']);
    }
    
    public function store(CommentCreateRequest $request)
    { 
        try{
            $comment = new Comment($request->all());
            $comment->save();
            return redirect('comment');
        }catch(Exceptio $e){
            return back()->withInput()->withErrors(['default' => 'Mensaje generico que demuestre que controlamos la situacion,
                                                                  pero que no tenemos ni idea de que cojones ha pasado']);
        }
    }

    public function show(Comment $comment)
    {
        return view('comment.show', [ 'activeComment' => 'active',
                                      'comment' => $comment,
                                      'subTitle' => 'Comments - Show']);
    }
    
    public function edit(Comment $comment)//$id)
    {
        //$comment = Comment::find($id);
        return view('comment.edit', [ 'activeComment' => 'active', 
                                      'comment' => $comment,
                                      'subTitle' => 'Comments - Edit']);
    }

     public function update(CommentEditRequest $request)
    {
        try{
            $comment = new Comment($request->all());
            $comment->update();
            return redirect('comment');
        }catch(Exceptio $e){
            return back()->withInput()->withErrors(['default' => 'Mensaje generico que demuestre que controlamos la situacion,
                                                                  pero que no tenemos ni idea de que cojones ha pasado']);
        }
    }
    
    public function destroy(Comment $comment)
    {
        try{
            $comment->delete();
            return redirect('/comment');
        }catch(Exceptio $e){
            return back()->withErrors(['default' => 'Mensaje generico que demuestre que controlamos la situacion,
                                                                  pero que no tenemos ni idea de que cojones ha pasado']);
        }
    }
}