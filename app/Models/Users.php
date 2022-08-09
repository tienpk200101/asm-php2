<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Users extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable = ['id', 'name', 'email', 'avatar', 'created_at', 'updated_at', 'status'];

    public function loadListWithPage(){
        $users = DB::table($this->table)
            ->where('level', 2)
            ->select($this->fillable)
            ->paginate(5);
        return $users;
    }

    public function loadOne($id){
        $user = DB::table($this->table)
            ->where('id', $id)
            ->first();

        return $user;
    }

    public function create($params){
        $data = array_merge($params['cols'],[
            'name' => $params['cols']['name'],
            'email' => $params['cols']['email'],
            'password' => Hash::make($params['cols']['password']),
            'role_id' => 2,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        $res = DB::table($this->table)->insertGetId($data);

        return $res;
    }
}
