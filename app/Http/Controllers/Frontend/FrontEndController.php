<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    private $v;

    public function __construct()
    {
        $this->v = [];
    }

    public function index(){
        $banners = Banner::all();
        $prorduct = new Product();
        $prorducts = $prorduct->loadListWithPage('',15);
        $categories = new Category();
        $this->v['categories'] = $categories->getData();
        $this->v['products'] = $prorducts;
        $this->v['banners'] = $banners;
        $this->v['title'] = 'Fintech';
        return view('frontend.layouts.main', $this->v);
    }

    public function shopPage(){
        $this->v['title'] = 'Cửa hàng';
        $prorduct = new Product();
        $prorducts = $prorduct->loadListWithPage('', 12);
        $this->v['products'] = $prorducts;
        return view('frontend.shoppage', $this->v);
    }

    public function detail($id){
        $product = new Product();
        $categories = new Category();
        $this->v['categories'] = $categories->getData();
        $this->v['product'] = $product->loadOne($id);
        $this->v['title'] = 'product';
        return view('frontend.product_detail', $this->v);
    }
}
