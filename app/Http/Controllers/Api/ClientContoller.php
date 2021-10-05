<?php

namespace App\Http\Controllers\Api;

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
        $clients = Client::all();
        return response()->json($clients);
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

        $newClient = new Client([
            'name' => $request->get('name'),
            'avatar' => $request->get('avatar'),
            'email' => $request->get('email'),
            'cin' => $request->get('cin'),
            'phoneNumber' => $request->get('phoneNumber'),
            'password' => $request->get('password')
        ]);

        $newClient->save();
        return response()->json($newClient);
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
        $client = Client::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'avatar' => 'required',
            'email' => 'required',
            'cin' => 'required',
            'phoneNumber' => 'required',
            'password' => 'required'
        ]);

        $client->name = $request->get('name');
        $client->avatar = $request->get('avatar');
        $client->email = $request->get('email');
        $client->cin = $request->get('cin');
        $client->phoneNumber = $request->get('phoneNumber');
        $client->password = $request->get('password');
        $client->save();

        return response()->json($client);
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
