<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    public function __construct()
    {
    }
    // Get all column 
    public static function showAll()
    {
        $sql = 'SELECT * FROM orders';
        return DB::select($sql);
    }
    // Get all column 
    public static function showDetail($order_id)
    {
        $sql = 'SELECT * FROM detail_order WHERE order_id = ?';
        return DB::select($sql, [$order_id]);
    }

    // INSERT
    public function insert()
    {

        $sql = 'INSERT INTO cartegories (user_id,address,created_at,state,total) VALUES (?,?,?,?,?) ';
        $arr = [];
        return DB::insert($sql, $arr);
    }
    // UPDATE
    public function edit($id, $name, $slug, $parent_id)
    {
        // $sql = 'UPDATE categories 
        //         SET     name = ?,
        //                 slug = ?,
        //                 parent_id = ?,
        //         WHERE id = ?  ';
        // $arr = [$name, $slug, $parent_id, $id];
        // return DB::select($sql);
    }
    // DELETE
    public function del($id)
    {
        $sql = 'DELETE FROM orders WHERE id = ?';
        return DB::delete($sql, [$id]);
    }
}
