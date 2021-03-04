<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin(){
        return User::all();
    }
    public function edit (Request $request){
        dd($request);
       $user = User::where('email',$request->email)->first();
        return Response($user,200);
    }
}
