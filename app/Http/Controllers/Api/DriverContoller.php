<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Driver;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DriverContoller extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = Driver::with('user')->get();
        $drivers->makeHidden(['created_at','updated_at']);
        return response()->json($drivers);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'avatar' => 'required',
            'email' => 'required',
            'cin' => 'required',
            'phoneNumber' => 'required',
            'password' => 'required',
            'num_permis' => 'required',
            'num_permis_de_confiance' => 'required',
            'date_de_permis' => 'required',
            'date_de_permis_confiance' => 'required',
            'car_model' => 'required'
        ]);

        $user = new User([
            'name' => $request->get('name'), 
            'avatar' => $request->get('avatar'),
            'email' => $request->get('email'),
            'cin' => $request->get('cin'),
            'phoneNumber' => $request->get('phoneNumber'),
            'password' => $request->get('password'),
        ]);

        $user->save();

        $driver = new Driver([
            'num_permis' => $request->get('num_permis'),
            'num_permis_de_confiance' => $request->get('num_permis_de_confiance'),
            'date_de_permis' => $request->get('date_de_permis'),
            'date_de_permis_confiance' => $request->get('date_de_permis_confiance'),
            'car_model' => $request->get('car_model'),
        ]);

        $user->driver()->save($driver);
        return response()->json($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $driver = Driver::findOrFail($id);
        return response()->json($driver);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $driver = Driver::findOrFail($id);
        $request->validate([

            'name' => 'required',
            'avatar' => 'required',
            'email' => 'required',
            'cin' => 'required',
            'phoneNumber' => 'required',
            'password' => 'required'
        ]);

        $driver->name = $request->get('name');
        $driver->avatar = $request->get('avatar');
        $driver->email = $request->get('email');
        $driver->cin = $request->get('cin');
        $driver->phoneNumber = $request->get('phoneNumber');
        $driver->password = $request->get('password');
        $driver->save();

        return response()->json($driver);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $driver = Driver::findOrFail($id);
        $driver->delete();
        return response()->json($driver::all());
    }
}
