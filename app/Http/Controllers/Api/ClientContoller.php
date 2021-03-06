<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Client;
use Illuminate\Support\Arr;
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
        $clients = Client::with('user')->get();
        foreach($clients as $client){
            $rating = $client['user']->averageRating();
            $array =  Arr::add($client['user'], 'rate', $rating);
            $res[] = $client;
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
            'password' => 'required'

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
                'password' => bcrypt($request->get('password'))
            ]);

            $user->save();
            $client = new Client();
            $user->client()->save($client);
            return response()->json($user);
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
        $client = Client::findOrFail($id);
        $user = $client['user'];
        $rating = $user->averageRating();
        $array =  Arr::add($user, 'rate', $rating);
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
        $user = User::with('client')->where('id', $id)->first();
        $validator = validator($request->all(), [
            'name' => 'required',
            'avatar' => 'required',
            'email' => 'required',
            'cin' => 'required',
            'phoneNumber' => 'required',
        ]);
        if($validator->fails()){
            return $validator->errors();
        }else{
            $user->name = $request->get('name');
            $user->avatar = $request->get('avatar');
            $user->email = $request->get('email');
            $user->cin = $request->get('cin');
            $user->phoneNumber = $request->get('phoneNumber');
            $user->save();
            return response()->json($user);
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
        $client = Client::where('id', $id)->first();
        $client->delete();
        $users = Client::with('user')->get();
        return response()->json($users);
    }
}