<?php

namespace App\Http\Controllers\Admin;

use App\Param;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ParamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $params = Param::get();
        return $params;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'key' => 'required|unique:params|max:255',
            'value' => 'required',
            'description'=>''
        ]);
        $param = new Param;
        $param->fill($request->all());
        $param->save();

        return response()->json($param);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        $param = Param::findOrFail($id);
        $request->validate([
            'value' => 'required',
            'description'=>''
        ]);
        $param->fill($request->except(['key']));
        $param->save();
        return response()->json($param);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $param = Param::find($id);
        $param->delete();
        return response()->json('ok');
    }
}
