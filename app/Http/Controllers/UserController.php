<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index', ['activeUser' => 'active', 
                                      'users'      => $users,
                                      'subTitle'      => 'Users - Index',
                                      'table'         => 'user']);
    }

    public function create()
    {
        return view('user.create', [ 'activeUser' => 'active',
                                        //'user' => $user,
                                        'subTitle' => 'Users - Create']);
    }
    
    public function store(UserCreateRequest $request)
    { 
        try{
            $user = new User($request->all());
            $user->save();
            return redirect('user');
        }catch(Exceptio $e){
            return back()->withInput()->withErrors(['default' => 'Mensaje generico que demuestre que controlamos la situacion,
                                                                  pero que no tenemos ni idea de que cojones ha pasado']);
        }
    }

    public function show(User $user)
    {
        return view('user.show', [ 'activeUser' => 'active',
                                      'user' => $user,
                                      'subTitle' => 'Users - Show']);
    }
    
    public function edit(User $user)//$id)
    {
        //$user = User::find($id);
        return view('user.edit', [ 'activeUser' => 'active', 
                                      'user' => $user,
                                      'subTitle' => 'Users - Edit']);
    }

     public function update(UserEditRequest $request)
    {
        try{
            $user = new User($request->all());
            $user->update();
            return redirect('user');
        }catch(Exceptio $e){
            return back()->withInput()->withErrors(['default' => 'Mensaje generico que demuestre que controlamos la situacion,
                                                                  pero que no tenemos ni idea de que cojones ha pasado']);
        }
    }
    
    public function destroy(User $user)
    {
        try{
            $user->delete();
            return redirect('/user');
        }catch(Exceptio $e){
            return back()->withErrors(['default' => 'Mensaje generico que demuestre que controlamos la situacion,
                                                                  pero que no tenemos ni idea de que cojones ha pasado']);
        }
    }
}
