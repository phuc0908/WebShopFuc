<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Address extends Model
{
    public function __construct()
    {
    }
    public function getOneProvince($code)
    {
        $sql = 'SELECT code,name,full_name FROM provinces  WHERE code = ?';
        return DB::select($sql, [$code]);
    }
    public function getOneDistrict($code)
    {
        $sql = 'SELECT code,name,full_name FROM dsitricts  WHERE code = ?';
        return DB::select($sql, [$code]);
    }
    public function getOneWard($code)
    {
        $sql = 'SELECT code,name,full_name FROM wards  WHERE code = ?';
        return DB::select($sql, [$code]);
    }
    // eg: Quảng Bình,...
    public function getProvinces()
    {
        $sql = 'SELECT code,name,full_name FROM provinces  ORDER BY name';
        return DB::select($sql);
    }

    public function getAllDistricts()
    {
        $sql = 'SELECT code,name,full_name FROM districts  ORDER BY name';
        return DB::select($sql);
    }
    public function getAllWards()
    {
        $sql = 'SELECT code,name,full_name FROM wards  ORDER BY name';
        return DB::select($sql);
    }
    // eg: Bố Trach,...
    public function getDistricts($id)
    {
        $sql = 'SELECT code,name FROM districts WHERE province_code = ?  ORDER BY name';
        return DB::select($sql, [$id]);
    }
    // eg: Thanh Trạch,...
    public function getWards($id)
    {
        $sql = 'SELECT code,name FROM wards WHERE district_code = ?  ORDER BY name';
        return DB::select($sql, [$id]);
    }
}
