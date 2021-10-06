<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Client;
use App\Models\Driver;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    public function __construct() {
        
        $this->middleware('auth:api', ['except' => ['index', 'show']]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $driver = Driver::first();
        $client = Client::first();
        
        $rating = $driver->rating([ //driver being rated
            'title' => 'This is a test title',
            'body' => 'And we will add some shit here',
            'customer_service_rating' => 5,
            'quality_rating' => 5,
            'friendly_rating' => 5,
            'pricing_rating' => 5,
            'rating' => 5,
            'recommend' => 'Yes',
            'approved' => true, // This is optional and defaults to false
        ], $client); //client doing the rating
        
        dd($rating);
    }

 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $driver = Driver::findOrfail();
        $client = Client::findOrfail();
        
        $rating = $driver->rating([ //driver being rated
            'title' => $request->title,
            'body' => $request->body,
            'customer_service_rating' => $request->customer_service_rating, //max 5
            'quality_rating' => $request->quality_rating, //max 5
            'friendly_rating' => $request->friendly_rating, //max 5
            'pricing_rating' => $request->pricing_rating, //max 5
            'rating' => $request->rating, //max 5
            'recommend' => $request->recommend, //Yes or NO
            'approved' => true, // This is optional and defaults to false
        ], $client); //client doing the rating
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
       //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      //
    }
}
