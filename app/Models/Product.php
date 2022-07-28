<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['*', 'products.id','products.name', 'categories.name as cate_name'];

    public function laodListWithPage(){
        $products = DB::table($this->table)
            ->leftJoin('categories', 'products.cate_id', '=', 'categories.id')
            ->select($this->fillable)
            ->paginate(5);
        return $products;
    }

    public function create($params){
        $data = array_merge($params['cols'],[
            'name' => $params['cols']['name'],
            'cate_id' => $params['cols']['cate_id'],
            'image' => $params['cols']['image'],
            'price' => $params['cols']['price'],
            'description_short' => $params['cols']['description_short'],
            'description' => $params['cols']['description']
        ]);

        $res = DB::table($this->table)->insertGetId($data);

        return $res;
    }

    public function loadOne($id, $param = null){
        $product = DB::table($this->table)
            ->where('id', '=', $id)
            ->first();
        return $product;
    }


}
