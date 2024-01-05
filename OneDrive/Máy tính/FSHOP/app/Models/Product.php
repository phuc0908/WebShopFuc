<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    protected $table = 'products';

    public function __construct()
    {
    }
    public static function get($id)
    {
        $sql = 'SELECT * FROM products WHERE id = ?';
        return DB::select($sql, [$id]);
    }
    public static function getWithSlug($slug)
    {
        $sql = 'SELECT c.name as cartegory_name, c.id as cartegory_id, p.name,p.price_final, p.img,p.id
                FROM        products p
                INNER JOIN  cartegories c ON p.cartegory_id = c .id
                WHERE      c.slug = ?';
        return DB::select($sql, [$slug]);
    }
    // in view list
    public function showAll()
    {
        return DB::select('SELECT * FROM products');
    }
    // in view list
    public function searchNameProduct($name)
    {
        $sql = "SELECT * FROM products
        WHERE name LIKE '%$name%'";
        return DB::select($sql);
    }
    // in view list HOME
    public function showRandom()
    {
        return DB::select('SELECT * FROM products
                            ORDER BY RAND()
                            LIMIT 10');
    }
    // in view add and edit
    public function showNameAllCart()
    {
        $sql = 'SELECT name,id FROM cartegories';
        return DB::select($sql);
    }
    // INSERT
    public function insert($name, $price, $price_final, $img, $amount, $cartegory_id, $description, $slug, $created_at)
    {
        $sql = 'INSERT INTO products (name,price,price_final,img,amount,cartegory_id,description,slug,created_at)
                VALUES (?,?,?,?,?,?,?,?,?)';
        $arr = [$name, $price, $price_final, $img, $amount, $cartegory_id, $description, $slug, $created_at];
        return DB::insert($sql, $arr);
    }
    // UPDATE
    public function upd($id, $name, $price, $price_final, $img, $amount, $cartegory_id, $description, $slug, $updated_at)
    {
        if ($img == null) {
            $sql = 'UPDATE products
                SET     name = ?, 
                        price = ?, 
                        price_final = ?, 
                        amount = ?, 
                        cartegory_id = ?, 
                        description = ?, 
                        slug = ?, 
                        updated_at = ?
                WHERE id = ?  ';
            $arr = [$name, $price, $price_final, $amount, $cartegory_id, $description, $slug, $updated_at, $id];
        } else {
            $sql = 'UPDATE products
            SET     name = ?, 
                    price = ?, 
                    price_final = ?, 
                    img = ?,
                    amount = ?, 
                    cartegory_id = ?, 
                    description = ?, 
                    slug = ?, 
                    updated_at = ?
            WHERE id = ?  ';
            $arr = [$name, $price, $price_final, $img, $amount, $cartegory_id, $description, $slug, $updated_at, $id];
        }

        return DB::update($sql, $arr);
    }
    // DELETE
    public function del($id)
    {
        $sql = 'DELETE   products,product_size,product_color,image
                FROM      products 
                LEFT JOIN product_size   ON products.id = product_size.product_id
                LEFT JOIN product_color  ON products.id = product_color.product_id
                LEFT JOIN image          ON products.id = image.product_id
                WHERE     
                        products.id = ?';

        return DB::delete($sql, [$id]);
    }

    public function insertProductSize($product_id, $size_id, $created_at)
    {
        $sql = "INSERT INTO product_size ( product_id, size_id, created_at )
                VALUES (?,?,?)";
        $arr = [$product_id, $size_id, $created_at];
        return DB::insert($sql, $arr);
    }
}
