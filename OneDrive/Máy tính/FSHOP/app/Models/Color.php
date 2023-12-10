<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Color extends Model
{
    public function __construct()
    {
    }
    public static function get($id)
    {
        $sql = 'SELECT * FROM colors WHERE id = ?';
        return DB::select($sql, [$id]);
    }
    // Get all column 
    public static function showAll()
    {
        $sql = 'SELECT * FROM colors
        ';
        return DB::select($sql);
    }


    // INSERT
    public function insert($name, $code_color, $dataCreate)
    {
        $sql = 'INSERT INTO colors (name,code_color,created_at) VALUES (?,?,?) ';
        $arr = [$name, $code_color,  $dataCreate];
        return DB::insert($sql, $arr);
    }
    // UPDATE
    public function upd($id, $name, $code_color, $updated_at)
    {
        $sql = 'UPDATE colors 
                SET     name = ?,
                        code_color =?,
                        updated_at = ?
                WHERE id = ?  ';
        $arr = [$name, $code_color, $updated_at, $id];
        return DB::update($sql, $arr);
    }
    // DELETE

    public function del($id)
    {
        $sql = 'DELETE FROM colors WHERE id = ?';
        return DB::delete($sql, [$id]);
    }
}
