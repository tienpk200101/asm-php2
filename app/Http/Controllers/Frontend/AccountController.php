<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    private $item;
    public function __construct()
    {
        $this->v = [];
    }

    public function login()
    {
        return view('frontend.auth.login');
    }

    public function saveLogin(Request $request)
    {
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

        $email = $request->input('email');
        $password = $request->input('password');


        if (Auth::attempt([
            'email' => $email,
            'password' => $password,
            'role_id' => 2
        ])) {
            $user = User::where('email', '=', $email)->first();
            Auth::login($user);
            Session::flash('success', 'Đăng nhập thành công');
            return redirect('/');
        } else {
            Session::flash('error', 'Email hoặc mật khẩu không đúng.');
            return back();
        }
    }

    public function register()
    {
        return view('frontend.auth.register');
    }

    public function saveRegister(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email:filter|unique:users',
            'password' => 'required|min:6',
            'retype_password' => 'same:password'
        ], [
            'name.required' => ':attribute bắt buộc phải nhập',
            'email.required' => ':attribute bắt buộc phải nhập',
            'email.email' => ':attribute không đúng định dạng',
            'email.unique' => ':attribute đã được sử dụng',
            'password.required' => ':attribute bắt buộc phải nhập',
            'password.min' => ':attribute ít nhất phải có :min ký tự',
            'retype_password.same' => ':attribute không trùng khớp'
        ], [
            'name' => 'Tên',
            'email' => 'Email',
            'password' => 'Mật khẩu',
            'retype_password' => 'Nhắc lại mật khẩu'
        ]);

        $params = [];
        $params['cols'] = $request->post();
        unset($params['cols']['_token']);
        unset($params['cols']['retype_password']);
        $modelUsers = new Users();
        $res = $modelUsers->create($params);

        if ($res == null) {
            return redirect('/register');
        } elseif ($res > 0) {
            Session::flash('success', 'Đăng kí thành công');
            return redirect('/login');
        } else {
            Session::flash('error', "Lỗi Đăng Kí Không Thành Công !");
            return redirect('/register');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
