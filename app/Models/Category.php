<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";
    protected $fillable = ['name', 'status', 'created_at', 'updated_at'];

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
}
