<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;

class Banner extends Model
{
    use HasFactory;
    protected $table = 'banners';
    protected $fillable = ['id', 'name','image', 'url','created_at', 'updated_at'];

    public function loadListWithPage(){
        $banners = DB::table($this->table)
            ->select($this->fillable)
            ->paginate(5);
        return $banners;
    }

    public function loadOne($id) {
        $banner = DB::table($this->table)
            ->where('id', $id)
            ->first();
        return $banner;
    }

    public function saveNew($params) {
        $data = array_merge($params['cols'], [
            'name' => $params['cols']['name'],
            'image' => $params['cols']['image'],
            'url' => $params['cols']['url'],
            'created_at' => date('Y-m-d H:i:s')
        ]);

        $res = DB::table($this->table)->insertGetId($data);
        return $res;
    }
}
