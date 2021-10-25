<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ClientContoller extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = Client::with('user')->get();
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
            'password' => 'required'
        ]);

        $user = new User([
            'name' => $request->get('name'),
            'avatar' => $request->get('avatar'),
            'email' => $request->get('email'),
            'cin' => $request->get('cin'),
            'phoneNumber' => $request->get('phoneNumber'),
            'password' => bcrypt($request->get('password'))
        ]);

        $user->save();
        $client = new Client();
        $user->client()->save($client);
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
        $client = Client::findOrFail($id);
        // $user = $client->user;
        $user = $client['user'];
        $rating = $user->averageRating();

        // dd($user->averageRating());
        return response()->json($rating);
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
        $user = User::with('client')->where('id', $id)->first();
        $request->validate([
            'name' => 'required',
            'avatar' => 'required',
            'email' => 'required',
            'cin' => 'required',
            'phoneNumber' => 'required',
        ]);

        $user->name = $request->get('name');
        $user->avatar = $request->get('avatar');
        $user->email = $request->get('email');
        $user->cin = $request->get('cin');
        $user->phoneNumber = $request->get('phoneNumber');
        $user->save();
        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::where('id', $id)->first();
        $client->delete();
        $users = Client::with('user')->get();
        return response()->json($users);
    }
}