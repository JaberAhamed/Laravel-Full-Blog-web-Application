<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use DB;

class UserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function userinfo($id){

      $user = User::where('id',$id)->get();
       
      

         return view('userinfo_view',compact('user'));      
    }
    
}
