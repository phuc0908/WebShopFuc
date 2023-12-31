<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    public function getLastedOrder()
    {
        $sql = "SELECT * FROM orders ORDER BY id DESC LIMIT 1";
        return DB::select($sql);
    }
    // Get all column 
    public static function showAll()
    {
        $sql = 'SELECT o.id, u.name, o.address, o.created_at, o.total, o.state 
        FROM orders o
        INNER JOIN users u ON o.user_id = u.id
        ';
        return DB::select($sql);
    }
    public static function get($idUser)
    {
        $sql = 'SELECT * FROM orders WHERE user_id = ?';
        return DB::select($sql, [$idUser]);
    }


    // INSERT
    public function insert($user_id, $address, $created_at, $state, $total)
    {

        $sql = 'INSERT INTO orders (user_id,address,created_at,state,total) VALUES (?,?,?,?,?) ';
        $arr = [$user_id, $address, $created_at, $state, $total];
        return DB::insert($sql, $arr);
    }
    // UPDATE
    public function upd($id, $user_id, $address, $created_at, $state, $total)
    {
        $sql = 'UPDATE orders 
                SET     user_id = ?,
                        address = ?, 
                        created_at = ?,
                        state = ?,
                        total = ?
                WHERE id = ?  ';
        $arr = [$user_id, $address, $created_at, $state, $total, $id];
        return DB::update($sql, $arr);
    }
    public function updateTotalPrice($id, $total)
    {
        $sql = 'UPDATE orders 
                SET total = ?
                WHERE id = ?  ';
        $arr = [$total, $id];
        return DB::update($sql, $arr);
    }
    // DELETE
    public function del($id)
    {
        $sql = 'DELETE FROM orders WHERE id = ?';
        return DB::delete($sql, [$id]);
    }
}
