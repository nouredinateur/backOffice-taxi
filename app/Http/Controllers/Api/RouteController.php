<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Route;
use Illuminate\Http\Request;

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

    public function show($id){

        $route = Route::findOrFail($id);
        return response()->json($route);
    }

    //  public function store(Request $request){
    //         $client = Client::where('')
    //  }

}
