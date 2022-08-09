<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $item;
    public function __construct()
    {
        $this->item = [];
    }

    public function index(){
        $product = new Product();
        $products = $product->loadListWithPage();
        $pape = $products->currentPage();
        return view('frontend.home.index', compact('products'));
    }
}
