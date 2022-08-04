<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use PHPOpenSourceSaver\JWTAuth\Exceptions\JWTException;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
        ]);

        $user =User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),

        ]);

        $user->assignRole('atleta');

        try {
            $token = auth()->login($user);
        }
        catch (JWTException $e) {
            throw $e;
        }


        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
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



    public function update(Request $request, $id)
    {
        try {

            $role = User::find($id);


            if(is_null($role))
            {
                return response()->json(['message' => 'Id non trovato', 'status'=>'404']);
            }
            $role->assignRole('personaltrainer');

            return response()->json([
                'message' => 'Ruolo modificato',
                'status' => 200,

            ]);
        }
        catch (\exception $e){

            return response()->json([
                'message'=>'Ruolo non modificato',
                'status'=>201,
                '4'=>$e,

            ]);
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
        //
    }
}
