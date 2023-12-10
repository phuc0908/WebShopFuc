<?php

namespace App\Helpers;

use App\Models\Product;
use App\Models\Color;
use App\Models\Size;

class Cart
{
    private $items = [];
    private $total_quatity = 0;
    private $total_price = 0;

    public function __construct()
    {
        $this->items = session('cart') ? session('cart') : [];
    }
    public function setList($list)
    {
        $this->items = $list;
        session(['cart' => $this->items]);
    }

    public function list()
    {
        return $this->items;
    }
    public function getTotalQuantity()
    {
        $total_quantity = 0;
        foreach ($this->list() as $product) {
            foreach ($product as $color) {
                foreach ($color as $size) {
                    $total_quantity++;
                }
            }
        }
        return $total_quantity;
    }
    public function getTotalPrice()
    {
        $total_price = 0;
        foreach ($this->list() as $product) {
            foreach ($product as $color) {
                foreach ($color as $size) {
                    $total_price += $size['sum_price'];
                }
            }
        }
        return $total_price;
    }

    // Add cart
    public function add($product_id, $quantity = 1, $color_id, $size_id, $path)
    {
        $product = (new Product)->get($product_id);
        $color = (new Color)->get($color_id);
        $size = (new Size)->get($size_id);

        if ($color == null || $size == null) {
            return false;
        } else {
            $item = [
                'product_id' => $product_id,
                'product_name' => $product[0]->name,
                'quantity' => $quantity,
                'image' => $path,
                'price' => $product[0]->price_final,
                'color_id' => $color_id,
                'size_id' => $size_id,
                'color_name' => $color[0]->name != null ? $color[0]->name : "",
                'size_name' => $size[0]->name != null ? $size[0]->name : "",
                'sum_price' => $product[0]->price_final * $quantity
            ];

            $this->items[$product_id][$color_id][$size_id] = $item;


            session(['cart' => $this->items]);

            return true;
        }
    }

    // Delete 1 product cart
    public function delete($product_id, $color_id, $size_id)
    {
    }
}
