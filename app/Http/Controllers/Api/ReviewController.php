<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Client;
use App\Models\Driver;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Review;
use Codebyray\ReviewRateable\Contracts\ReviewRateable;

class ReviewController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get the current authenticated user reviews
       
        // $user = auth()->user();
        // $reviews = $user->getAllRatings($user->id, 'desc');
        $reviews = Review::all();
        return response()->json($reviews);
    }


    public function allreviews(){
        $reviews = Review::all(); 
        return response()->json($reviews);
    }

    /**
     * Store a newly created resource in storage.
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reviewer = auth()->user() ? auth()->user() : User::findOrFail($request->get('id_of_reviewer'));
        $ReviewedId = $request->get('id_of_the_reviewed');
        $reviewed = User::findOrFail($ReviewedId);

        $validator = validator($request->all(), [

            'title' => 'required',
            'body' => 'required',
            'customer_service_rating' => 'required',
            'quality_rating' => 'required',
            'friendly_rating' => 'required',
            'pricing_rating' => 'required',
            'rating' => 'required',
            'recommend' => 'required',
        ]);
        if($validator->fails()){
            return $validator->errors();
        }else{
            $rating = $reviewed->rating([ //user being rated
                'title' => $request->title,
                'body' => $request->body,
                'customer_service_rating' => $request->customer_service_rating, //max 5
                'quality_rating' => $request->quality_rating, //max 5
                'friendly_rating' => $request->friendly_rating, //max 5
                'pricing_rating' => $request->pricing_rating, //max 5
                'rating' => $request->rating, //max 5
                'recommend' => $request->recommend, //Yes or NO
                'approved' => true, // This is optional and defaults to false
            ], $reviewer); //user doing the rating
            return response()->json($rating);
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
        $review = Review::findOrFail($id);
        return response()->json($review);
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
        $user = User::findOrFail($id);
        $rating = $user->updateRating(1, [
            'title' => $request->title,
            'body' => $request->body,
            'customer_service_rating' => $request->customer_service_rating,
            'quality_rating' => $request->quality_rating,
            'friendly_rating' => $request->friendly_rating,
            'pricing_rating' => $request->pricing_rating,
            'rating' => $request->rating,
            'recommend' => $request->recommend,
            'approved' => true, // This is optional and defaults to false
        ]);
        return response()->json($rating);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $review = Review::findOrFail($id);
      $review->delete();
      return response()->json($review);
    }
}
