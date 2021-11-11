<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use Auth;
use DB;

class TaskController extends Controller
{
    //

    public function addTask(Request $request)
    {

        $user = Auth::user()->id;
        $this->validate($request, [
            'task' => 'required|max:255',
        ]);

         $task = new task;
         $task->name = $request->task;
         $task->user_id = $user;
         $task->save();

         return redirect('home')->with(['Message' => 'Please Waite For Approval']);

         //return redirect('task');

          
    }


    public function showTask(Request $request)
    {
        $user = Auth::user()->id;
        $userTask = DB::table('users')
                   ->join('tasks', 'users.id','=','tasks.user_id')
                   ->where('users.id',$user)
                   ->where('users.task_status',1)
                   ->select('tasks.name', 'tasks.id')->get();

            if($userTask)
                {

                    return view('show_task', ['task' => $userTask]);
                }
                    else
                {
                    return redirect('home')->with(['Message' => 'Please Waite For Approval']);
                }
            
    }

    public function userTask(Request $request, $id)
    {
        $userData = User::find($id);
        //return  $userData;
        if($userData->task_status == 0)
        {
            $userData->task_status = 1;
        }
        else
        {
            $userData->task_status = 0;
            
        }
        $userData->save();

        return redirect('/home')->with(['message'=> 'Customer Task Approved!']);
    }

}
