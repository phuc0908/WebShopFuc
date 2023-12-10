<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Size extends Model
{
    public function __construct()
    {
    }
    public static function get($id)
    {
        $sql = 'SELECT * FROM sizes WHERE id = ?';
        return DB::select($sql, [$id]);
    }
    // Get all column 
    public static function showAll()
    {
        $sql = 'SELECT * FROM sizes
        ';
        return DB::select($sql);
    }

    // INSERT
    public function insert($name, $weight, $height, $dataCreate)
    {
        $sql = 'INSERT INTO sizes (name,weight,height,created_at) VALUES (?,?,?,?) ';
        $arr = [$name, $weight, $height, $dataCreate];
        return DB::insert($sql, $arr);
    }
    // UPDATE
    public function upd($id, $name, $weight, $height, $updated_at)
    {
        $sql = 'UPDATE sizes 
                SET     name = ?,
                        weight = ?,
                        height = ?,
                        updated_at = ?
                WHERE id = ?  ';
        $arr = [$name, $weight, $height, $updated_at, $id];
        return DB::update($sql, $arr);
    }
    // DELETE
    public function del($id)
    {
        $sql = 'DELETE FROM sizes WHERE id = ?';
        return DB::delete($sql, [$id]);
    }
    // CLIENT CLIENT CLIENT CLIENT CLIENT CLIENT CLIENT CLIENT CLIENT CLIENT

}
