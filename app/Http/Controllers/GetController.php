<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GetController extends Controller
{
    public function index($user){//get param

      $array = ["user"=>"$user"]; //send to page form
      return view('form',$array);

    }

    public function repos($user){
      $array = ['user'=>"$user"];
      return view('repos',$array);
    }
}
