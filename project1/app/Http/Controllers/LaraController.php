<?php

namespace App\Http\Controllers;

use App\Lara;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class LaraController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //



        if ($laras = Lara::orderBy('name', 'asc')->get()) {

            return view('Lara', compact('laras'));
        }
        abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createpage() {

        
                if ($laras = Lara::orderBy('name', 'asc')->get()) {
                $laras = $laras->slice(2);
            return view('/CreateLara', compact('laras'));
        }
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $validatedData = $request->validate([
            'name' => 'required|unique:laras|max:50|min:3',
            'link' => 'required|unique:laras|max:50|min:3',
            'room' => 'max:20',
        ]);

        $lara = new Lara();
        $lara->name = $request->name;
        $lara->link = $request->link;
        $lara->room = $request->room;

        $lara->adress = 0;
        $lara->location = 0;
        $lara->duration = 0;
        $lara->servername = 0;
        $lara->info1 = 0;
        $lara->info2 = 0;
        $lara->info3 = 0;
        // $lara->time = 0;

        $lara->save();

        return redirect()->action('LaraController@createpage')->with('message', 'Success');
    }

    public function update(Request $request) {
        //
        if ($request->ajax()) {

                $lara = Lara::find($request->laraID);

                $lara->adress = $request->adress;
                $lara->location = $request->location;
                $lara->duration = $request->duration;
                $lara->servername = $request->name;

                if ($request->duration == '0') {
                    $lara->time = $lara->created_at;
                } else {
                    $lara->time = Carbon::now()->toDateTimeString();
                }
                $lara->save();

                return response()->json(['message' => 'update done']);
            
        }
        return redirect()->back()->with('message', 'New post saved');
        /**
          }else{

          return redirect()->action('PageController@indexpage', ['main' => $request->main, 'page' => $request->page])->with('message', 'New post saved');
          }
         * */
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lara  $lara
     * @return \Illuminate\Http\Response
     */
    public function show(Lara $lara) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lara  $lara
     * @return \Illuminate\Http\Response
     */
    public function edit(Lara $lara) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lara  $lara
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lara  $lara
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {
        //
        Lara::destroy($request->laraID);
        
        return redirect()->back()->with('message', 'Lara removed');
    }

}
