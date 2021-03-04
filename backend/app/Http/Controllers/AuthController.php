<?php namespace App\Http\Controllers;

use App\Models\User;
use App\Models\personal_access_tokens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    function signin(Request $request){
        $credentialss = $request->only('email','password');

        if(Auth::attempt($credentialss)){
            $user       = $request->user()->tokenable;
            $data_token = $user->abilities;
            $token      = $request->user()->createToken('api-access');
            $reponse    = [
                'user'  => Auth::user(),
                'accessToken' => $token->plainTextToken,
                'roles' => $data_token,
            ];
            return response($reponse, 200);
        }
        return response('Usuario o contraseña incorrecta', 401);
    }
    function signup(Request $request){
        if(User::where('email',$request->email)->first()) 
        {
            return Response('User exits!',401);
        }
        else{
            DB::table('users')->insert([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            return Response('User created!',200);
        }
    }
    function logout(Request $request){
        $request->user()->currentToken()->delete();
        Auth::logout();
        return response(null, 200);

    }
}
