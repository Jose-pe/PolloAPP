<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Response;

class UserController extends Controller
{
    //
    public function store(Request $request){

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $usuario = User::create($input);
    
        return redirect()->route('home');
    }
    public function listarmeserosjson()
    {
        $meseros = User::where('rol','Mesero')->get();
        return Response::json(
            array('success'=> true,
                    'users'=>$meseros
        ),200);
    }
}
