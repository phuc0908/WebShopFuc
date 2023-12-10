<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cartegory extends Model
{
    public function __construct()
    {
    }
    // Get all column 
    public static function showAll()
    {
        $sql = 'SELECT * FROM cartegories
        ';
        return DB::select($sql);
    }
    // Get all column 
    public static function showProductOfOne(string $id)
    {
        $sql = 'SELECT * FROM products WHERE cartegory_id = ? ';
        $arr = [$id];
        return DB::select($sql, $arr);
    }
    // Get 1 column where id
    public static function get($id)
    {
        $sql = 'SELECT * FROM cartegories WHERE id = ?
        ';
        return DB::select($sql, [$id]);
    }
    public static function getWithSlug($slug)
    {
        $sql = 'SELECT * FROM cartegories WHERE slug = ?
        ';
        return DB::select($sql, [$slug]);
    }
    // Get name column
    public function showNameAll()
    {
        $sql = 'SELECT name,id FROM cartegories';
        return DB::select($sql);
    }
    // INSERT
    public function insert($name, $slug, $parent_id, $dateCreate)
    {
        if ($parent_id == null) {
            $parent_id = 0;
        }
        $sql = 'INSERT INTO cartegories (name,slug,parent_id,created_at) VALUES (?,?,?,?) ';
        $arr = [$name, $slug, $parent_id, $dateCreate];
        return DB::insert($sql, $arr);
    }
    // UPDATE
    public function upd($id, $name, $slug, $parent_id, $updated_at)
    {
        if ($parent_id == null) {
            $parent_id = 0;
        }
        $sql = 'UPDATE cartegories 
                SET     name = ?,
                        slug = ?,
                        parent_id = ?,
                        updated_at = ?
                WHERE id = ?  ';
        $arr = [$name, $slug, $parent_id, $updated_at, $id];
        return DB::update($sql, $arr);
    }
    // DELETE
    public function del($id)
    {
        $sql = 'DELETE FROM cartegories WHERE id = ?';
        return DB::delete($sql, [$id]);
    }
    // CLIENT CLIENT CLIENT CLIENT CLIENT CLIENT CLIENT CLIENT CLIENT CLIENT

    public function getParent($id)
    {
        $sql = 'SELECT  *
                FROM cartegories
                WHERE parent_id = ?;';
        $result = DB::select($sql, [$id]);
        return json_decode(json_encode($result), true);
    }
}
