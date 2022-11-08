<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas = Persona::all();
        //dd(['b', $personas, 'a']);
        return view('persona.index', ['activePersona' => 'active', 
                                      'Personas'      => $personas,
                                      'subTitle'      => 'Personas - Index',
                                      'table'         => 'persona']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('persona.create', [ 'activePersona' => 'active',
                                        'persona' => $persona,
                                        'subTitle' => 'Personas - Create']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$request llegan todos los argumentos del formulario
        //try, devolver resultado
        $persona = new Persona($request->all());
        $persona->save();
        return redirect('persona');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show( persona $persona) // $id) //Persona $persona)
    {
        $persona = Persona::find($id); //Request $request, persona $persona sustituye esto, si falla, se deja request y $id y se descomenta esto.
        return view('persona.show', ['activePersona' => 'active',
                                  'persona' => $persona,
                                  'subTitle' => 'Personas - Show - ' . $persona->name]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona $persona) //Persona $persona)
    {
        return view('persona.edit', ['activePersona' => 'active', 
                                  'persona' => $persona,
                                  'subTitle' => 'Personas - Edit']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona) //Persona $persona)
    {
        $persona->update($request->all());
        return view('persona.update', ['activePersona' => 'active', 'id' => $id, 'name' => $request->input('name'), 'subTitle' => 'Personas - Update']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) //Persona $persona)
    {
        //try, devolver un 'mensaje' del resultado de la app.
        $persona->delete();
        return redirect('/persona');
    }
}