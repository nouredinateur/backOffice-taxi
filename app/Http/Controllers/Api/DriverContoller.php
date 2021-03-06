<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Driver;
use Illuminate\Support\Arr;
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
        foreach($drivers as $driver){
            $rating = $driver['user']->averageRating();
            $array =  Arr::add($driver['user'], 'rate', $rating);
            $res[] = $driver;
        };  
        return response()->json($res);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = validator($request->all(), [
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

        if($validator->fails()){

            return $validator->errors();

        }else{

            $user = new User([
                'name' => $request->get('name'), 
                'avatar' => $request->get('avatar'),
                'email' => $request->get('email'),
                'cin' => $request->get('cin'),
                'phoneNumber' => $request->get('phoneNumber'),
                'password' => bcrypt( $request->get('password'))
            ]);

            $driver = new Driver([
                'num_permis' => $request->get('num_permis'),
                'num_permis_de_confiance' => $request->get('num_permis_de_confiance'),
                'date_de_permis' => $request->get('date_de_permis'),
                'date_de_permis_confiance' => $request->get('date_de_permis_confiance'),
                'car_model' => $request->get('car_model'),
            ]);

            $user->save();
            $user->driver()->save($driver);
            return response()->json(['user'=>$user,'driver'=>$driver]);
        }
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
        $user = $driver['user'];
        $rating = $user->averageRating();
        $array =  Arr::add($user, 'rate', $rating);
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
        $driver = Driver::with('user')->where('id', $id)->first();

        $validator = validator($request->all(), [

            'name' => 'required',
            'avatar' => 'required',
            'email' => 'required',
            'cin' => 'required',
            'phoneNumber' => 'required',
            'num_permis' => 'required',
            'num_permis_de_confiance' => 'required',
            'date_de_permis' => 'required',
            'date_de_permis_confiance' => 'required',
            'car_model' => 'required'

            ]);

        if($validator->fails()){    
            return $validator->errors();
        }else{

            $driver['user']->name = $request->get('name');
            $driver['user']->avatar = $request->get('avatar');
            $driver['user']->email = $request->get('email');
            $driver['user']->cin = $request->get('cin');
            $driver['user']->phoneNumber = $request->get('phoneNumber');
            $driver->num_permis = $request->get('num_permis');
            $driver->num_permis_de_confiance = $request->get('num_permis_de_confiance');
            $driver->date_de_permis = $request->get('date_de_permis');
            $driver->date_de_permis_confiance = $request->get('date_de_permis_confiance');
            $driver->car_model = $request->get('car_model');
            $driver->save();
            return response()->json($driver);
        }
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