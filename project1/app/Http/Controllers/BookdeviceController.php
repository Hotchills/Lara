<?php

namespace DCSXB\Http\Controllers;

use DCSXB\Bookdevice;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class BookdeviceController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
      
        if ($devices = Bookdevice::orderBy('type', 'asc')->get()) {
            return view('/Devices', compact('devices'));
        }
        abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createpage() {


        if ($devices = Bookdevice::orderBy('type', 'asc')->get()) {

            return view('CreateDevice', compact('devices'));
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
/**
        $validatedData = $request->validate([
            'name' => 'required|unique:bookdevices|max:50|min:3',
            'type' => 'required|unique:bookdevices|max:50|min:3',
        ]);
*/
        $device = new Bookdevice();
        $device->name = $request->name;
        $device->type = $request->type;

        $device->adress = 0;
        $device->location = 0;
        $device->servername = 0;
        $device->info1 = 0;
        $device->info2 = 0;
        $device->info3 = 0;

        $device->save();

        return redirect()->back()->with('message', 'Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \DCSXB\Bookdevice  $bookdevice
     * @return \Illuminate\Http\Response
     */
    public function show(Bookdevice $bookdevice) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \DCSXB\Bookdevice  $bookdevice
     * @return \Illuminate\Http\Response
     */
    public function edit(Bookdevice $bookdevice) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \DCSXB\Bookdevice  $bookdevice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        //
        if ($request->ajax()) {

            $device = Bookdevice::find($request->deviceID);

            $device->adress = $request->adress;
            $device->location = $request->location;
            $device->servername = $request->name;
            if ($request->name == '0')
                $device->time = $device->created_at;
            else {

                $device->time = Carbon::now()->toDateTimeString();
            }
            $device->save();

            return response()->json(['message' => 'update done']);
        }
        return redirect()->back()->with('message', 'Error');
        /**
          }else{

          return redirect()->action('PageController@indexpage', ['main' => $request->main, 'page' => $request->page])->with('message', 'New post saved');
          }
         * */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \DCSXB\Bookdevice  $bookdevice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {
        //
        Bookdevice::destroy($request->deviceID);

        return redirect()->back()->with('message', 'Device removed');
    }

}
