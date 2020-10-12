<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Task;

class TaskviewController extends Controller
{
    function taskview()
    {

        $task = DB::select('select * from tasks');
        return view('dashboard', ['tasks' => $task]);
    }
    ////////////////////////////////////// delete data ////////////////////////////////////////// 
    function destroy($id)
    {
        $dltid = DB::delete('delete from tasks where id = ?', [$id]);
        return redirect('dashboard');
    }

    function show($id)
    {
        $task = DB::select('select * from tasks where id = ?', [$id]);
        return view('update', ['task' => $task]);
    }

    public function edit(Request $request, $id)
    {
        $taskname = $request->input('taskname');
        $description = $request->input('description');
        $priority = $request->input('priority');
        $status = $request->input('status');
        $updateQuery = DB::update('update tasks set taskname = ?,description= ?, priority= ? , status= ? where id = ?',
         [$taskname, $description, $priority, $status, $id]);
        return redirect('dashboard');
    }
}
