<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $v;

    public function __construct()
    {
        $this->v = [];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = new Product();
        $products = $product->laodListWithPage();
//        dd($products[0]);
        $this->v['title'] = 'Sản phẩm';

        return view('admin.products.list', compact('products'), $this->v);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->v['title'] = 'Thêm sản phẩm';
        $categories = new Category();
        $this->v['categories'] = $categories->getData();

        return view('admin.products.add', $this->v);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {

        $method_route = 'add_product';

        $params = [];
        $params['cols'] = $request->post();
        unset($params['cols']['_token']);


        $modelProduct = new Product();
        if($request->hasFile('image')){
            $files = $request->file('image')->store('public/profile');
            $params['cols']['image'] = substr($files, strlen('public/'));
        }
        $res = $modelProduct->create($params);

        if($res == null) {
            return redirect()->route($method_route);
        } elseif ($res > 0) {
            Session::flash('success', 'Thêm sản phẩm thành công');
            return redirect('/admin/product');
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
        $categories = new Category();
        $product = new Product();
        $products = $product->loadOne($id);
        $this->v['categories'] = $categories->getData();
        $this->v['product'] = $products;
        $this->v['title'] = 'Chi tiết sản phẩm';
        return view('admin.products.update', $this->v);
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
