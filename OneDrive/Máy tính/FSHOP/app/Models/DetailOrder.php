<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DetailOrder extends Model
{
    // Get all column 
    public static function showDetail($order_id)
    {
        $sql = 'SELECT * FROM detail_order WHERE order_id = ?';
        return DB::select($sql, [$order_id]);
    }
    public static function get($idOrder)
    {
        $sql = 'SELECT d.id, p.name as nameProduct, d.price, d.amount, d.created_at, c.name as nameColor, s.name as nameSize
        FROM details_order d
        INNER JOIN products p ON d.product_id = p.id 
        INNER JOIN colors c ON d.color_id = c.id 
        INNER JOIN sizes s ON d.size_id = s.id 
        WHERE order_id = ?';
        return DB::select($sql, [$idOrder]);
    }
    // INSERT
    public function insert($order_id, $product_id, $amount, $price, $created_at, $color_id, $size_id)
    {

        $sql = 'INSERT INTO details_order (order_id,product_id,amount,price,created_at,color_id,size_id) VALUES (?,?,?,?,?,?,?) ';
        $arr = [$order_id, $product_id, $amount, $price, $created_at, $color_id, $size_id];
        return DB::insert($sql, $arr);
    }
    // UPDATE
    public function upd($id, $order_id, $product_id, $amount, $price, $created_at, $color_id, $size_id)
    {
        $sql = 'UPDATE details_order 
                SET     order_id = ?,
                        product_id = ?, 
                        amount = ?,
                        price = ?,
                        created_at = ?,
                        color_id = ?,
                        size_id= ?
                WHERE id = ?  ';
        $arr = [$order_id, $product_id, $amount, $price, $created_at, $color_id, $size_id, $id];
        return DB::update($sql, $arr);
    }
    // DELETE
    public function del($id)
    {
        $sql = 'DELETE FROM details_order WHERE id = ?';
        return DB::delete($sql, [$id]);
    }
}
