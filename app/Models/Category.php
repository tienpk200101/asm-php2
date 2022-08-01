<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";
    protected $fillable = ['id','name', 'status', 'created_at', 'updated_at'];

    public function getData(){
        return DB::table($this->table)->get();
    }

    public function loadListWithPage(){
        $categories = DB::table($this->table)
            ->where('status', '=', 0)
            ->select($this->fillable)
            ->paginate(5);
        return $categories;
    }

    public function create($params){
        $data = array_merge($params['cols'], [
            'name' => $params['cols']['name'],
            'created_at' => date('Y-m-d H:i:s')
        ]);
//        dd($data);
        $res = DB::table($this->table)->insertGetId($data);
        return $res;

    }

    public function loadOne($id, $params = null){
        $cate = DB::table($this->table)
            ->where('id', '=', $id)
            ->first();
        return $cate;
    }

    public function saveUpdate($params){
        if(empty($params['cols']['id'])){
            Session::flash('error', 'Bản ghi không tồn tại');
            return null;
        }

        $updateData = [];

        foreach ($params['cols'] as $colName => $val){
            if($colName == 'id') continue;

            if(in_array($colName, $this->fillable)) {
                $updateData[$colName] = (strlen($val) == 0) ? null : $val;
            }
        }
        $updateData['updated_at'] = date('Y-m-d H:i:s');

        $res = DB::table($this->table)
            ->where('id', $params['cols']['id'])
            ->update($updateData);
        return $res;
    }

}
