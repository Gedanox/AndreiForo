<?php

namespace App\Http\Controllers;

use App\Models\Bike;
use Illuminate\Http\Request;

class BikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bikes = Bike::all();
        //dd(['b', $bikes, 'a']);
        return view('bike.index', ['activeBike' => 'active', 
                                   'Bikes'      => $bikes,
                                   'subTitle'   => 'Bikes - Index']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bike.create', ['activeBike' => 'active', 'subTitle' => 'Bikes - Create']);
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
        $bike = new Bike($request->all());
        $bike->save();
        return redirect('bike');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bike  $bike
     * @return \Illuminate\Http\Response
     */
    public function show($id)//Request $request, bike $bike / $id) //Bike $bike)
    {
        $bike = Bike::find($id); //Request $request, bike $bike sustituye esto, si falla, se deja request y $id y se descomenta esto.
        return view('bike.show', ['activeBike' => 'active',
                                  'bike' => $bike,
                                  'subTitle' => 'Bikes - Show - ' . $bike->name]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bike  $bike
     * @return \Illuminate\Http\Response
     */
    public function edit(Bike $bike) //Bike $bike)
    {
        return view('bike.edit', ['activeBike' => 'active', 
                                  'bike' => $bike,
                                  'subTitle' => 'Bikes - Edit']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bike  $bike
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bike $bike) //Bike $bike)
    {
        $bike->update($request->all());
        return view('bike.update', ['activeBike' => 'active', 'id' => $id, 'name' => $request->input('name'), 'subTitle' => 'Bikes - Update']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bike  $bike
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) //Bike $bike)
    {
        //try, devolver un 'mensaje' del resultado de la app.
        $bike->delete();
        return redirect('/bike');
    }
}