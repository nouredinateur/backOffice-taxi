<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Route;
use App\Models\Client;
use App\Models\Driver;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $routes = Route::all();
        return response()->json($routes);
    }

    public function store(Request $request){

        $validator = validator($request->all(), [
            'starting_point' => 'required',
            'ending_point' => 'required',
            'distance' => 'required',
            'price' => 'required'
        ]);
        if($validator->fails()){  
            return $validator->errors();
        }else{
            $user = auth()->user();
            $client = $user->client()->get();
            $idDriver = $request->id;
            $driver = Driver::findOrFail($idDriver);
            $route = new Route();
            $route->client()->associate($client);
            $route->driver()->associate($driver);
            $route->starting_point = $request->starting_point;
            $route->ending_point = $request->ending_point;
            $route->distance = $request->distance;
            $route->price = $request->price;
            $route->save();
            return response()->json($route);
        }
    }
    
    public function show($id){
        $route = Route::findOrFail($id);
        return response()->json($route);    
    }
    public function destroy($id)
    {
        $route = Route::findOrFail($id);
        $route->delete();
        return response()->json($route::all());
    }
}
