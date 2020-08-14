<?php

namespace App\Http\Controllers\Admin;

use validation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login.index');
    }

    public function login(Request $request)
    {
    // dd($request);
        
   $validator = $request->validate([
        'email' => 'required',
        'password' => 'required',
    ]);
    
    if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
    
        return redirect()->intended('system/dashboard');
    }
    
    return redirect()->back()->with('mgs','username or password incorrect');
}

    public function logout()
    {
        Auth::logout();
        
        return redirect('/system');

    }

}
