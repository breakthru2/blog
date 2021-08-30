<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Post;

class AdminController extends Controller
{
    function login(){
        return view('backend.login');
    }

    // Submit Login
    function submit_login(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);

        $userCheck=Admin::where(['username'=>$request->username, 'password'=>$request->password])->count();
        if($userCheck>0){
            $adminData=Admin::where(['username'=>$request->username, 'password'=>$request->password])->first();
            session(['adminData'=>$adminData]);
            return redirect('admin/dashboard');
        }else{
            return redirect('admin/login')->with('error','Invalid username/password!!');
        }
    }
    // Dashboard
    function dashboard(){
        $cats=Category::all()->count();
        $posts=Post::all()->count();
        return view('backend.dashboard',[
            'cats'=>$cats,
            'posts'=>$posts
        ]);
    }

    // Logout
    function logout(){
        session()->forget(['adminData']);
        return redirect('admin/login');
    }
}
