<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterFormRequest;
use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;

class AuthController extends Controller
{
    //
    public function register(RegisterFormRequest $request)
    {
//        return 'success';
        $user = new User();
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->save();
        return response([
                            'status' => 'success',
                            'data'   => $user
                        ], 200
        );
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
//        $JWT=new JWTAuth();
        if (!$token = JWTAuth::attempt($credentials)) {
//        if (!$token = $JWT->attempt($credentials)) {
            return response([
                                'status' => 'error',
                                'error'  => 'invalid.credentials',
                                'msg'    => 'Invalid Credentials.'
                            ], 400
            );
        }
        return response(['status' => 'success'])
            ->header('Authorization', $token);
    }

    public function user(Request $request)
    {
        $user = User::find(Auth::user()->id);
        return response([
                            'status' => 'success',
                            'data'   => $user
                        ]
        );
    }

    public function refresh()
    {
        return response([
                            'status' => 'success'
                        ]
        );
    }
}
