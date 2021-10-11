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
        $users = User::with('client')->get();
        // foreach ($users as $user) {
        //     $test = $user->client;
        // }
        // dd($users);

        $users->makeHidden(['password','created_at','updated_at']);
     return response()->json($users);
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
            'password' => $request->get('password')
        ]);

        $client = new Client();
        $user->save();
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
        $client = User::with('client')->where('id', $id)->get();
        return response()->json($client);
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
        $request->validate([
            'name' => 'required',
            'avatar' => 'required',
            'email' => 'required',
            'cin' => 'required',
            'phoneNumber' => 'required',
            'password' => 'required'
        ]);

        $user->name = $request->get('name');
        $user->avatar = $request->get('avatar');
        $user->email = $request->get('email');
        $user->cin = $request->get('cin');
        $user->phoneNumber = $request->get('phoneNumber');
        $user->password = $request->get('password');
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
        $client = Client::findOrFail($id);
        $client->delete();
        return response()->json($client::all());
    }
}