<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Session;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = new Category();
        $categories = $category->loadListWithPage();
        $this->v['title'] = 'Danh mục';

        return view('admin.categories.list', compact('categories'), $this->v);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $method_route = 'route_BackEnd_Category_List';

        $params = [];
        $params['cols'] = $request->post();
//        dd($params['cols']);
        unset($params['cols']['_token']);

        $modelCategory = new Category();

        $res = $modelCategory->create($params);

        if($res == null) {
            return redirect()->route($method_route);
        } elseif ($res > 0) {
            Session::flash('success', 'Thêm danh mục thành công');
            return redirect()->route($method_route);
        } else {
            Session::flash('error', "Lỗi Thêm Mới Không Thành Công !");
            return redirect()->route($method_route);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cate = new Category();
        $category = $cate->loadOne($id);
//        dd($category);
        $this->v['title'] = 'Sửa danh mục';
        $this->v['category'] = $category;
        return view('admin.categories.edit', $this->v);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $method_route = 'route_BackEnd_Category_Detail';
        $params = [];
        $params['cols'] = $request->post();
        unset($params['cols']['_token']);
        $cate = new Category();
        $params['cols']['id'] = $id;

        $res = $cate->saveUpdate($params);
        if($res == null) {
            return redirect()->route($method_route, ['id' => $id]);
        } elseif($res == 1){
            Session::flash('success', 'Bản ghi đã được cập nhật');
            return redirect()->route($method_route, ['id' => $id]);
        } else {
            Session::flash('error', 'Lỗi cập nhật bản ghi');
            return redirect()->route($method_route, ['id' => $id]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $method_route = 'route_BackEnd_Category_List';
        $category = Category::find($id);
        if(isset($category)) {
            $res = $category->delete();
            if($res == 1) {
                Session::flash('successs', 'Xóa bản ghi thành công');
                return redirect()->route($method_route);
            } else {
                Session::flash('error', 'Xóa bản ghi không thành công');
                return redirect()->route($method_route);
            }
        } else {
            Session::flash('error', 'Bản ghi không tồn tại');
            return redirect()->route($method_route);
        }
    }
}
