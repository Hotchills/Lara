<?php

namespace App\Http\Controllers;

use App\Lara;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class LaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("/Lara");
        
        
       if ($lara = Lara::all()) {

            return view('Lara', compact('lara'));
        }
        abort(404);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createpage()
    {
        return view("/CreateLara");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $validatedData = $request->validate([
            'name' => 'required|unique:lara|max:100|min:3',
            'link' => 'required|unique:lara|max:50|min:3',
            'room' => 'max:20',
        ]);
        
        $lara = new Lara();
        $lara->$name = $request->name;
        $lara->$link = $request->link;
        $lara->$room = $request->room;

        $mainpage->save();
  
        return redirect()->action('LaraController@createpage')->with('message', 'Success');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lara  $lara
     * @return \Illuminate\Http\Response
     */
    public function show(Lara $lara)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lara  $lara
     * @return \Illuminate\Http\Response
     */
    public function edit(Lara $lara)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lara  $lara
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lara $lara)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lara  $lara
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lara $lara)
    {
        //
    }
}
