<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Session;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['products.id','products.name', 'products.image', 'products.price',
        'products.description_short', 'products.description', 'products.status',
        'products.created_at', 'products.updated_at', 'categories.name as cate_name'];

    public function loadListWithPage($amount){
        $products = DB::table($this->table)
            ->leftJoin('categories', 'products.cate_id', '=', 'categories.id')
            ->where('products.status', '=', 0)
            ->select($this->fillable)
            ->paginate($amount);
        return $products;
    }

    // public function loadListWithSearch($search){
        
    //     if($search == '') {
    //         $products = DB::table($this->table)
    //             ->leftJoin('categories', 'products.cate_id', '=', 'categories.id')
    //             ->where('name', 'LIKE', '%'.$search.'%');
    //             ->select($this->fillable)
    //     }
    // }

    public function create($params){
        $data = array_merge($params['cols'],[
            'name' => $params['cols']['name'],
            'cate_id' => $params['cols']['cate_id'],
            'image' => $params['cols']['image'],
            'price' => $params['cols']['price'],
            'description_short' => $params['cols']['description_short'],
            'description' => $params['cols']['description'],
            'created_at' => date('Y-m-d H:i:s')
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

    public function saveUpdate($params){
        if(empty($params['cols']['id'])){
            Session::flash('error', 'Không xác định bản ghi cập nhật');
            return null;
        }

        $dataUpdate = [];
        foreach ($params['cols'] as $colName => $val){
            if($colName == 'id') continue;

//            if(in_array($colName, $this->fillable)){
                $dataUpdate[$colName] = (strlen($val)==0) ? null : $val;
//            }
        }
        $dataUpdate['updated_at'] = date('Y-m-d H:i:s');

        $res = DB::table($this->table)
            ->where('id', $params['cols']['id'])
            ->update($dataUpdate);
        return $res;
    }


}
