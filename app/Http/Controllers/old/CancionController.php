<?php

namespace App\Http\Controllers;

use App\Models\Cancion;
use Illuminate\Http\Request;
use App\Http\Requests\CancionCreateRequest;
use App\Http\Requests\CancionEditRequest;

class CancionController extends Controller
{
    public function index()
    {
        $canciones = Cancion::all();
        return view('cancion.index', ['activeCancion' => 'active', 
                                      'canciones'      => $canciones,
                                      'subTitle'      => 'Canciones - Index',
                                      'table'         => 'cancion']);
    }

    public function create()
    {
        return view('cancion.create', [ 'activeCancion' => 'active',
                                        //'cancion' => $cancion,
                                        'subTitle' => 'Canciones - Create']);
    }
    
    public function store(CancionCreateRequest $request)
    { 
        try{
            $cancion = new Cancion($request->all());
            $cancion->save();
            return redirect('cancion');
        }catch(Exceptio $e){
            return back()->withInput()->withErrors(['default' => 'Mensaje generico que demuestre que controlamos la situacion,
                                                                  pero que no tenemos ni idea de que cojones ha pasado']);
        }
    }

    public function show(Cancion $cancion)
    {
        return view('cancion.show', [ 'activeCancion' => 'active',
                                      'cancion' => $cancion,
                                      'subTitle' => 'Canciones - Show']);
    }
    
    public function edit(Cancion $cancion)//$id)
    {
        //$cancion = Cancion::find($id);
        return view('cancion.edit', [ 'activeCancion' => 'active', 
                                      'cancion' => $cancion,
                                      'subTitle' => 'Canciones - Edit']);
    }

     public function update(CancionEditRequest $request)
    {
        try{
            $cancion = new Cancion($request->all());
            $cancion->update();
            return redirect('cancion');
        }catch(Exceptio $e){
            return back()->withInput()->withErrors(['default' => 'Mensaje generico que demuestre que controlamos la situacion,
                                                                  pero que no tenemos ni idea de que cojones ha pasado']);
        }
    }
    
    public function destroy(Cancion $cancion)
    {
        try{
            $cancion->delete();
            return redirect('/cancion');
        }catch(Exceptio $e){
            return back()->withErrors(['default' => 'Mensaje generico que demuestre que controlamos la situacion,
                                                                  pero que no tenemos ni idea de que cojones ha pasado']);
        }
    }
}








        //update.
        //Validar las reglas.
        //si todas las reglas funcionan, sigue el flujo normal.
        //si no, redirect hacia atras, envia los datos en old() y envia el mensaje de error.
        
        /*public function update(Request $request, Cancion $cancion)
        {
            $cancion->update($request->all());
            return redirect('/cancion');
        }*/
        
        
        //show
        //$cancion = Cancion::find($id); //Request $request, cancion $cancion sustituye esto, si falla, se deja request y $id y se descomenta esto.


        //store
        //Validar las reglas.
        //si todas las reglas funcionan, sigue el flujo normal.
        //si no, redirect hacia atras, envia los datos en old() y envia el mensaje de error.
        
        //return 'store';
        //return back()->withInput->withErrors(['autor' => 'El nombre del autor no es válido',
        //                                      'genero'=> 'Mensaje para el genero, etc.']);