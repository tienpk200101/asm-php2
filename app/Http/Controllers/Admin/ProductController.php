<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $products = $product->loadListWithPage(12);
        $pape = $products->currentPage();

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
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $params['cols']['image'] = $this->uploadFile($request->file('image'));
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $method_route = 'route_BackEnd_Product_Detail';
        $params = [];
        $params['cols'] = $request->post();
        unset($params['cols']['_token']);
        $product = new Product();
        $objItem = $product->loadOne($id);
        $params['cols']['id'] = $id;

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $params['cols']['image'] = $this->uploadFile($request->file('image'));
        }

        $res = $product->saveUpdate($params);

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
        $method_route = 'admin_product';
        $product = Product::find($id);

        if(isset($product)) {
            $res = $product->delete();

            if($res == 1){
                Session::flash('success', 'Xóa bản ghi thành công');
                return redirect()->route($method_route);
            } else {
                Session::flash('error', 'Xóa bản ghi thất bại');
                return redirect()->route($method_route);
            }
        } else {
            Session::flash('error', 'Bản ghi không tồn tại');
            return redirect()->route($method_route);
        }
    }

    public function uploadFile($file){
        $fileName = time().'_'.$file->getClientOriginalName();
        return $file->storeAs('product', $fileName, 'public');
    }
}
