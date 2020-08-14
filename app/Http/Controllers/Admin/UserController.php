<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function index()
    {
        $user = User::all();
        $data = array(
            "users" => $user
        );
    
        return view('admin.user.index',$data);
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $path  = null;
        $this->validate($request,[
            "name" => 'required',
            "phone" => 'required',
            "role" => 'required',
            "password" => 'required',
            "confirm_password" => 'required|same:password',
        ]);

        if($request->file('profile') != null)
        {
            $path = $request->file('profile')->store('public/profile');
            $path = str_replace('public','/storage',$path);
        }


        $user = new User;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->profile = $path;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('system/users');
    }

  
}
