<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TaskController extends Controller
{
   function taskinsert(Request $request)
   {

    $taskname = $request->input('taskname');
    $description = $request->input('description');
    $priority = $request->input('priority');
    $status = $request->input('status');
    //dd( $taskname);
   
            $result = DB::insert('insert into tasks (taskname,description,priority,status) values (?, ?,?,?)',
              [$taskname, $description, $priority,$status]);
             // dd($result);
             if($result=true)
             {
             $data = ['status' => 200, 'message' => 'successfully login'];
      return response()->json($data);
    } 
    else {
      $data = ['status' => 400, 'message' => 'Invalid email'];
      return response()->json($data);
    }
   }
}
   

