<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $v;

    public function __construct()
    {
        $this->v = [];
    }

    public function index(Request $request, $search = null)
    {
        $users = new Users();
        $search = $request->input('search');

        $users = $users->loadListWithPage(2, 8, $search);
        $this->v['users'] = $users;
        $this->v['title'] = 'Danh sách khách hàng';
        return view('admin.users.list', $this->v);
    }

    public function changeStatus(Request $request){
        $user = User::find($request->user_id);
        dd($user);
        $user->status = $request->status;
        $user->save();

        return response()->json(['success'=>'Status change successfully.']);
    }

    public function info(){
        $user = \Illuminate\Support\Facades\Auth::user();
        // dd($user);
        $this->v['title'] = 'Thông tin khách hàng';
        $this->v['user'] = $user;
        return view('admin.users.user_info', $this->v);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = new Users();
        $user = $user->loadOne($id);
        $this->v['user'] = $user;
        $this->v['title'] = 'Chi tiết khách hàng';
        return view('admin.users.detail', $this->v);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
