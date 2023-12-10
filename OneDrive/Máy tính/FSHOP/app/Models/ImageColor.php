<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ImageColor extends Model
{
    public function __construct()
    {
    }
    public static function getColor($product_id)
    {
        $sql = 'SELECT      a.color_id, b.name ,b.code_color, a.created_at, a.updated_at,a.image_id
                FROM        image_color a
                INNER JOIN  colors b        
                ON          a.color_id = b.id
                WHERE       image_id = ?';

        return DB::select($sql, [$product_id]);
    }
    public static function getImage($color_id)
    {
        $sql = 'SELECT      b.id, b.name 
                FROM        product_color a
                INNER JOIN  image b        
                ON          a.image_id = b.id
                WHERE       color_id = ?';
        return DB::select($sql, [$color_id]);
    }
    // Get all column 
    public static function showAll()
    {
        $sql = 'SELECT * FROM image_color
        ';
        return DB::select($sql);
    }

    // INSERT
    public function insert($image_id, $color_id, $dataCreate)
    {
        $sql = 'INSERT INTO image_color (image_id, color_id, created_at) VALUES (?,?,?) ';
        $arr = [$image_id, $color_id, $dataCreate];
        return DB::insert($sql, $arr);
    }
    // DELETE
    public function del($image_id, $color_id)
    {
        $sql = 'DELETE FROM image_color WHERE image_id = ? AND color_id = ?';
        return DB::delete($sql, [$image_id, $color_id]);
    }
    public function delWithImage($image_id)
    {
        $sql = 'DELETE FROM image_color WHERE image_id = ? ';
        return DB::delete($sql, [$image_id]);
    }
}
