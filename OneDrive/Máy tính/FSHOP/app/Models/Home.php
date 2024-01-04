<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Home extends Model
{
    public function __construct()
    {
    }
    // ORDER
    public static function numberOfVerifiedOrder()
    {
        $sql = 'SELECT count(state) AS numberOfVerifiedOrder
                FROM orders 
                WHERE state=1
        ';
        return DB::select($sql)[0]->numberOfVerifiedOrder;
    }
    public static function numberOfUnverifiedOrder()
    {
        $sql = 'SELECT count(state) AS numberOfUnverifiedOrder
                FROM orders 
                WHERE state=0
        ';
        return DB::select($sql)[0]->numberOfUnverifiedOrder;
    }
    public static function numberOfOrderedUser()
    {
        $sql = 'SELECT  count(DISTINCT u.id) AS numberOfUnverifiedOrder
                FROM orders o
                INNER JOIN users u ON o.user_id = u.id 
                WHERE state=1
        ';
        return DB::select($sql)[0]->numberOfUnverifiedOrder;
    }


    // INCOME
    public static function sumIncome()
    {
        $sql = 'SELECT  sum(total) AS income 
                FROM orders 
                WHERE state=1
        ';
        return DB::select($sql)[0]->income;
    }
    public static function totalOfCurrentMonth()
    {
        $sql = 'SELECT  count(DISTINCT u.id) AS numberOfUserOrder
                FROM orders o
                INNER JOIN users u ON o.user_id = u.id 
                WHERE state=1
        ';
        return DB::select($sql)[0];
    }

    // PRODUCT
    public static function numberOfProduct()
    {
        $sql = 'SELECT  count(id) AS numberOfProduct
                FROM products 
        ';
        return DB::select($sql)[0]->numberOfProduct;
    }
    public static function amountOfOrderedProduct()
    {
        $sql = 'SELECT  sum(do.amount) AS amountOfOrderedProduct
                FROM details_order do
                INNER JOIN orders o ON o.id = do.order_id
                WHERE o.state =1
                
        ';
        return DB::select($sql)[0]->amountOfOrderedProduct;
    }

    // USER
    public static function numberOfRegister()
    {
        $sql = 'SELECT  count(id) AS numberOfRegister
                FROM users 
        ';
        return DB::select($sql)[0]->numberOfRegister;
    }
}
