<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Image extends Model
{
    protected $id;
    public function __construct()
    {
        $this->id = 1;
    }
    // Get all column Product ID
    public function get($product_id)
    {
        $sql = 'SELECT * FROM image WHERE product_id = ?
        ';
        return DB::select($sql, [$product_id]);
    }
    // Get all column Product ID
    public function getOne($id)
    {
        $sql = 'SELECT * FROM image WHERE id = ?
        ';
        return DB::select($sql, [$id]);
    }

    // INSERT
    public function insert($value, $product_id, $created_at)
    {
        $sql = 'INSERT INTO image (value,product_id,created_at) 
        VALUES (?,?,?) ';
        $arr = [$value, $product_id, $created_at];
        return DB::insert($sql, $arr);
    }
    // UPDATE
    public function upd($id, $value, $product_id, $updated_at)
    {
        $sql = 'UPDATE users 
                SET     value = ?,
                        product_id = ?, 
                        updated_at = ?
                WHERE id = ?  ';
        $arr = [$value, $product_id, $updated_at, $id];
        return DB::update($sql, $arr);
    }
    // DELETE
    public function del($id)
    {
        $sql = 'DELETE FROM image WHERE id = ?';
        return DB::delete($sql, [$id]);
    }
    
    public function delAll($product_id)
    {
        $sql = 'DELETE FROM image WHERE product_id = ?';
        return DB::delete($sql, [$product_id]);
    }
}
