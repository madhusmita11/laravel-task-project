<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Userdata;
use Exception;

class RegisterController extends Controller
{
        function insert(Request $request)
        {
                // try {
                $name = $request->input('name');
                $email = $request->input('email');
                $pass = $request->input('password');
                $password = md5($pass);
                $cpassword = $request->input('cpassword');
                try {
                        $result = DB::insert('insert into userdatas (username,email,password) values (?, ?,?)', [$name, $email, $password]);
                        $data = ['status' => 200, 'message' => 'success!'];
                        return response()->json($data);
                } catch (Exception $e) {
                        $data = ['status' => 400, 'message' => 'Error in inserting data!', 'data' => $e];
                        return response()->json($data);
                }
        }
}
