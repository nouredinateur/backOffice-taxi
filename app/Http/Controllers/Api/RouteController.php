<?php

namespace App\Http\Controllers\Api;

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

        $client = Client::findOrFail(1);
        $driver = Driver::findOrFail(8);
        $route = new Route();
        $route->client()->associate($client);
        $route->driver()->associate($driver);
        $route->starting_point = "Atlas";
        $route->ending_point = "chefchaouni";
        $route->distance = "3";
        $route->price = "5";
        $route->save();

        return response()->json($route);
    }

    public function update(Request $request, $id){

        $route = Route::findOrFail($id);
        $route->starting_point = $request->get('starting_point');
        $route->ending_point = $request->get('ending_point');
        $route->distance = $request->get('distace');
        $route->price = $request->get('price');
        $route->save();
        return response()->json($route);
        
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
