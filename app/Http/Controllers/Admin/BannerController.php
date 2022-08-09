<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    private $v;

    public function __construct()
    {
        $this->v = [];
    }

    public function index(){
        $banner = new Banner();
        $banners = $banner->loadListWithPage();
        $this->v['banners'] = $banners;
        $this->v['title'] = 'Danh sách banner';
        return view('admin.banners.list', $this->v);
    }

    public function create(){
        $this->v['title'] = 'Thêm banner';
        return view('admin.banners.add', $this->v);
    }

    public function store(Request $request) {
        $method_route = 'Route_BackEnd_Banner_List';

        $params = [];
        $params['cols'] = $request->post();

        unset($params['cols']['_token']);

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $params['cols']['image'] = $this->uploadFile($request->file('image'));
        }

        $banner = new Banner();

        $result = $banner->saveNew($params);

        if($result == null) {
            return redirect()->route($method_route);
        } elseif($result > 0) {
            Session::flash('success', 'Thêm Banner thành công');
            return redirect()->route($method_route);
        } else {
            Session::flash('error', 'Thêm Banner không thành công');
            return redirect()->route($method_route);
        }

    }

    public function edit($id) {
        $banners = new Banner();
        $banner = $banners->loadOne($id);
        $this->v['banner'] = $banner;
        $this->v['title'] = 'Chi tiết banner';
        return view('admin/banners/edit', $this->v);
    }

    public function update(Request $request, $id){
        $method_route = 'Route_BackEnd_Banner_Detail';

        $params = [];
        $params['cols'] = $request->post();
        unset($params['cols']['_token']);
        $params['cols']['id'] = $id;
        $banner = new Banner();

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $params['cols']['image'] = $this->uploadFile($request->file('image'));
        }

        $res = $banner->saveUpdate($params);

        if($res == null) {
            return redirect()->route($method_route, ['id' => $id]);
        } elseif ($res == 1) {
            Session::flash('success', 'Cập nhật thành công');
            return redirect()->route($method_route, ['id' => $id]);
        } else {
            Session::flash('error', 'Cập nhật không thành công');
            return redirect()->route($method_route, ['id' => $id]);
        }
    }

    public function destroy($id) {
        $method_route = 'Route_BackEnd_Banner_List';

        $banner = Banner::find($id);

        if(isset($banner)){
            $res = $banner->delete();

            if($res == 1){
                Session::flash('success', 'Xóa banner thành công');
                return redirect()->route($method_route);
            } else{
                Session::flash('error', 'Xóa banner không thành công');
                return redirect()->route($method_route);
            }
        } else {
            Session::flash('error', 'Bản không không tồn tại');
            return redirect()->route($method_route);
        }
    }

    public function uploadFile($file){
        $fileName = time().'_'.$file->getClientOriginalName();
        return $file->storeAs('banner', $fileName, 'public');
    }
}
