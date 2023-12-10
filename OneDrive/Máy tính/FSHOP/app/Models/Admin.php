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
        $sql = 'SELECT * FROM admin';
        return DB::select($sql);
    }
    // Get 1 column where id
    public static function get($id)
    {
        $sql = 'SELECT * FROM admin WHERE id = ?';
        return DB::select($sql, [$id]);
    }
}
