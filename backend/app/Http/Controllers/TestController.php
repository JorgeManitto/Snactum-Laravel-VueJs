<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TestModel;
use App\Models\User;
class TestController extends Controller
{
    public function all(){
       return TestModel::all();
    }

    public function user(){
        return User::all();
    }

    public function mod(){

    }


}
