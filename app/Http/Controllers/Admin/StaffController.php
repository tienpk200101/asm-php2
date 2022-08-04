<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Http\Requests\StaffRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class StaffController extends Controller
{
    private $v;

    public function __construct(){
        $this->v = [];
    }

    public function index(){
        $staff = new Users();
        $this->v['title'] = 'Danh sách nhân viên';
        $this->v['staffs'] = $staff->loadListWithPage(1);
        return view('admin.staffs.list', $this->v);
    }

    public function create() {
        $this->v['title'] = 'Thêm nhân viên';
        return view('admin.staffs.add', $this->v);
    }

    public function store(StaffRequest $request) {
        $method_route = 'Route_BackEnd_Staff_List';

        $params = [];
        $params['cols']= $request->post();
        
        unset($params['cols']['_token'],$params['cols']['confirm-password']);
        
        $params['cols']['password'] = Hash::make($request->input('password'));

    
        $staff = new Users();

        if($request->hasFile('avatar') && $request->file('avatar')->isValid()){
            $params['cols']['avatar'] = $this->uploadFile($request->file('avatar'));
        }
        
        $res = $staff->saveStaff($params);
        if($res == null) {
            return redirect()->route($method_route);
        } elseif($res == 1) {
            Session::flash('success', 'Thêm nhân viên thành công');
            return redirect()->route($method_route);
        } else {
            Session::flash('error', 'Thêm nhân viên không thành công');
            return redirect()->route($method_route);
        }

    }

    public function uploadFile($file) {
        $fileName = time().'_'.$file->getClientOriginalName();
        return $file->storeAs('staff', $fileName, 'public');
    }
}

