<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function __construct()
    {
    }
    // Get all column 
    public static function showAll()
    {
        $sql = 'SELECT * FROM users
        ';
        return DB::select($sql);
    }
    public static function showAllExcept($id)
    {
        $sql = 'SELECT * FROM users EXCEPT SELECT * FROM users WHERE id = ?;
        ';
        return DB::select($sql, [$id]);
    }
    // Get 1 column where id
    public static function get($id)
    {
        $sql = 'SELECT * FROM users WHERE id = ?
        ';
        return DB::select($sql, [$id]);
    }
    public static function getWithAddress($id)
    {
        $sql = 'SELECT u.id, u.name, u.address, u.phone, u.username, u.password, u.email, p.name as nameProvince, d.name as nameDistrict, w.name as nameWard 
        FROM        users u
        INNER JOIN  provinces p ON u.province_id = p.code
        INNER JOIN  districts d ON u.district_id = d.code
        INNER JOIN  wards w     ON u.ward_id     = w.code
        WHERE       u.id = ?
        ';
        return DB::select($sql, [$id]);
    }

    // INSERT
    public function insert($name, $username, $email, $password, $address, $phone, $created_at, $status, $token, $province_id, $district_id, $ward_id)
    {
        $sql = 'INSERT INTO users (name,username,email,password,address,phone,created_at,status,token,province_id,district_id,ward_id) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?) ';
        $arr = [$name, $username, $email, $password, $address, $phone, $created_at, $status, $token, $province_id, $district_id, $ward_id];
        return DB::insert($sql, $arr);
    }
    // UPDATE
    public function upd($name, $username, $email, $password, $address, $phone, $status, $token, $updated_at, $province_id, $district_id, $ward_id, $id)
    {
        $sql = 'UPDATE users 
                SET     name = ?,
                        username = ?,
                        email = ?,
                        password = ?,
                        address = ?,
                        phone = ?,
                        status = ?,
                        token = ?,
                        updated_at = ?,
                        province_id = ?,
                        district_id = ?,
                        ward_id = ?
                WHERE id = ?  ';
        $arr = [$name, $username, $email, $password, $address, $phone, $status, $token, $updated_at, $province_id, $district_id, $ward_id, $id];
        return DB::update($sql, $arr);
    }
    public function updateInfor($name, $email, $address, $phone, $updated_at, $province_id, $district_id, $ward_id, $id)
    {
        $sql = 'UPDATE users 
                SET     name = ?,
                        email = ?,
                        address = ?,
                        phone = ?,
                        updated_at = ?,
                        province_id = ?,
                        district_id = ?,
                        ward_id = ?
                WHERE id = ?  ';
        $arr = [$name, $email, $address, $phone, $updated_at, $province_id, $district_id, $ward_id, $id];
        return DB::update($sql, $arr);
    }
    // DELETE
    public function del($id)
    {
        $sql = 'DELETE FROM users WHERE id = ?';
        return DB::delete($sql, [$id]);
    }
}
