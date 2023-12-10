<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductSize extends Model
{
    public function __construct()
    {
    }
    public static function getSize($product_id)
    {
        $sql = 'SELECT      a.size_id, b.name ,b.height, b.weight, a.created_at, a.updated_at,a.product_id
                FROM        product_size a
                INNER JOIN  sizes b        
                ON          a.size_id = b.id
                WHERE       product_id = ?';

        return DB::select($sql, [$product_id]);
    }
    public static function getProduct($size_id)
    {
        $sql = 'SELECT      b.id, b.name 
                FROM        product_size a
                INNER JOIN  product b        
                ON          a.product_id = b.id
                WHERE       size_id = ?';
        return DB::select($sql, [$size_id]);
    }
    // Get all column 
    public static function showAll()
    {
        $sql = 'SELECT * FROM product_size
        ';
        return DB::select($sql);
    }

    // INSERT
    public function insert($product_id, $size_id, $dataCreate)
    {
        $sql = 'INSERT INTO product_size (product_id, size_id, created_at) VALUES (?,?,?) ';
        $arr = [$product_id, $size_id, $dataCreate];
        return DB::insert($sql, $arr);
    }
    // DELETE
    public function del($product_id, $size_id)
    {
        $sql = 'DELETE FROM product_size WHERE product_id = ? AND size_id = ?';
        return DB::delete($sql, [$product_id, $size_id]);
    }
}
