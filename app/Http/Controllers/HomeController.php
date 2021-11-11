<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Session;

class HomeController extends Controller
{
    //Admin login role through
    public function index()
    {
        
        // $user = Auth::user()->first_name;
        // $userName = Session::put('user',$user);
        $role = Auth::user()->role;
        if($role === '1')
        {
            $usersDetails = user::all();
            // return $users;
            return view('admin.dashboard', ['users' => $usersDetails]);
        }
        else
        {
            return view('dashboard');
        }
    }

    //Admin login role through End


    //User Status Active/Inactive 

    public function userStatus(Request $request, $id)
    {
        $userData = User::find($id);

        if($userData->status == 0)
        {
            $userData->status = 1;
            
        }
        else
        {
            $userData->status = 0;
        }
        $userData->save();

        return redirect('/home')->with(['message'=>'You are Active !'.$userData->first_name]);
    }

    //User Status Active/Inactive End

    //Admin Home Dashboard Access

    public function adminHome()
    {
        $role = Auth::user()->role;
        if($role === '1')
        {
            return view('admin.home');
        }
        else
        {
            return redirect('dashboard');
        }
    }

    //Admin Home Dashboard Access End

    public function TaskStatus(Request $request, $id)
    {
        //return "Hello";
        $userData = User::find($id);

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
