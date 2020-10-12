<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Userdata;


class LoginController extends Controller
{
  function userlogin(Request $request)
  {
    $email = $request->input('username');
    $pass = $request->input('password');

    $user = DB::table('userdatas')
      ->where('email', $request->input('email'))
      ->where('password', md5($request->input('password')))
      ->first();
    //dd($user);

    if ($user == true) {
      $request->session()->put('session_data', $user);
      $data = ['status' => 200, 'message' => 'successfully login'];
      return response()->json($data);
    } else {
      $data = ['status' => 400, 'message' => 'Invalid email'];
      return response()->json($data);
    }
  }
}
