<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
//        dd($products[0]);
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
    public function store(Request $request)
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
        //
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
