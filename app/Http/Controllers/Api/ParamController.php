<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Param;
use Illuminate\Http\Request;

class ParamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $params = Param::get();
       $msg = ["Ok"];
       return response()->json($params, 200, $msg);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         $validator = validator($request->only('key', 'value'), [
         'key' => array(
                  'required',
                  'regex:/(^[a-z]*[a-z_-]$)/u'
                  )
         ]);
         if($validator->fails()){

            return$validator->errors();

         }else{
            $param = new Param();
            $msg = ["Ok"];
            $param->key = $request->key;
            $param->value = $request->value;
            $param->save();
            return response()->json($param, 200, $msg);
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
        $param = Param::findOrFail($id);
        $msg = ["Ok"];
        return response()->json($param, 200, $msg);
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
      $validator = validator($request->only('key', 'value'), [
         'key' => array(
                  'required',
                  'regex:/(^[a-z]*[a-z_-]$)/u'
                  )
         ]);
         if($validator->fails()){
            
            return $validator->errors();

         }else{
            $param = Param::findOrFail($id);
            $msg = ["Ok"];
            $param->key = $request->get('key');
            $param->value = $request->get('value');
            $param->save();
            return response()->json($param, 200, $msg);
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
       $param = Param::findOrfail($id);
       $msg = ["Ok"];
       $param->delete();
       return response()->json(Param::get(), 200, $msg);
    }
}
