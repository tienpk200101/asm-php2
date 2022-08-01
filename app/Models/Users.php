<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

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
}
