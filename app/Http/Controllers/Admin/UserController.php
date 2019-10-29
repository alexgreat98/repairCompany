<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|max:255',
            'password'=> 'required',
        ]);
        $param = new User;
        $data = $request->except(['created_at', 'updated_at']);
        $data['password'] = Hash::make($data['password']);
        $data['api_token'] = Str::random();
        $param->fill($data);
        $param->save();

        return response()->json($param);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'email' => 'required|max:255',
            'password'=> '',
        ]);
        $data = $request->except(['created_at', 'updated_at']);
        if(!isset($data['password'])){
            $data['password'] = '';
        }
        $data['password'] = $data['password'] ? Hash::make($data['password']) : $user->password;
        $user->fill($data);
        $user->save();
        return response()->json($user);
    }

    /**
     * @param $id
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user ->delete();
        return response()->json('ok');
    }
}
