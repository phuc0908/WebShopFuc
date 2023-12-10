<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductColor extends Model
{
    public function __construct()
    {
    }
    public static function getColor($product_id)
    {
        $sql = 'SELECT      a.product_id, a.color_id, b.name ,b.code_color, a.created_at, a.updated_at
                FROM        product_color a
                INNER JOIN  colors b        
                ON          a.color_id = b.id
                WHERE       a.product_id = ?';

        return DB::select($sql, [$product_id]);
    }

    public static function getColorAndImage($product_id)
    {
        $sql = 'SELECT     p.id, a.color_id, b.name ,b.code_color, a.created_at, a.updated_at, i.value
                FROM        products p               
                INNER JOIN   image i           ON   i.product_id = p.id
                LEFT JOIN   image_color a  ON i.id = a.image_id 
                LEFT JOIN colors b  ON b.id=a.color_id

                    
                WHERE       p.id = ? AND a.color_id IS NOT NULL
                GROUP BY  a.color_id';

        return DB::select($sql, [$product_id]);
    }
    public static function getProduct($color_id)
    {
        $sql = 'SELECT      b.id, b.name 
                FROM        product_color a
                INNER JOIN  product b        
                ON          a.product_id = b.id
                WHERE       color_id = ?';
        return DB::select($sql, [$color_id]);
    }
    // Get all column 
    public static function showAll()
    {
        $sql = 'SELECT * FROM product_color
        ';
        return DB::select($sql);
    }

    // INSERT
    public function insert($product_id, $color_id, $dataCreate)
    {
        $sql = 'INSERT INTO product_color (product_id, color_id, created_at) VALUES (?,?,?) ';
        $arr = [$product_id, $color_id, $dataCreate];
        return DB::insert($sql, $arr);
    }
    // DELETE
    public function del($product_id, $color_id)
    {
        $sql = 'DELETE FROM product_color WHERE product_id = ? AND color_id = ?';
        return DB::delete($sql, [$product_id, $color_id]);
    }
}
