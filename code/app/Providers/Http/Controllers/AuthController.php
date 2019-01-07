<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\User;

class AuthController extends Controller
{

  //Retun view login
  public function index(){
    $password=User::get();
    foreach ($password as $key => $value) {
      $setPass=User::find($value->id);
      $setPass->password=encrypt('admin');
      $setPass->save();
    }
    return view('admin-page.login');
  }


  //Proses Login
  public function login(Request $request){
    $user = User::where('username','=',$request->input('username'))->first();
    if(!empty($user)){
      if($request->password == decrypt($user->password)){
        Session::put('useractive',$user);
        return redirect('admin')
          ->with('message','Login Success')
          ->with('message_type','success');
      }else{
        return redirect('admin/login')
          ->with('message','Password Salah')
          ->with('message_type','error');
      }
    }else{
      return redirect('admin/login')
        ->with('message','Username tidak ditemukan')
        ->with('message_type','error');
    }
  }

  //Logout
  public function logout(){
    Session::flush();
    return redirect('admin/login');
  }
}
