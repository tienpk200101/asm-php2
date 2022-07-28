<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    private $v;

    public function __construct()
    {
        $this->v = [];
    }

    public function getLoginAdmin(){
        return view('admin.auth.login');
    }

    public function postLoginAdmin(Request $request){

        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required|min:6'
        ], [
            'email.required' => ':attribute bắt buộc phải nhập',
            'email.email' => ':attribute không đúng định dạng',
            'password.required' => ':attribute bắt buộc phải nhập',
            'password.min' => ':attribute ít nhất phải có :min ký tự'
        ], [
            'email' => 'Email',
            'password' => 'Mật khẩu'
        ]);


        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'level' => 1]))
        {
            return redirect('/admin/dashboard');
        } else {
            Session::flash('error', 'Email hoặc mật khẩu không đúng.');
            return back();
//            return back()->with('msg', 'Email hoặc mật khẩu không đúng.');
        }
    }

    public function getLogout(){
        Auth::logout();
        return redirect('/admin/login');
    }
}
