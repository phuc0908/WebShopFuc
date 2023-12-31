<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cartegory;
use App\Models\Product;
use App\Helpers\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getCate()
    {
        $cart = new Cartegory();
        $parents = $cart->getParent(0);

        $datas = null;
        // Create array name parent and child (SORT)
        foreach ($parents as $keyParent => $parent) {
            $datas[$keyParent] = $parent;
            // Child of this parent
            $childs = $cart->getParent($parent['id']);

            foreach ($childs as $key => $child) {
                $datas[$keyParent][$key] = $child;
            }
        }
        return $datas;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Cart $cart)
    {
        $list = $cart->list();
        $total_quantity = $cart->getTotalQuantity();
        $total_type = $cart->getTotalTypeProduct();
        $total_price = $cart->getTotalPrice();
        $datas = $this->getCate();
        return view('client.cart', compact('datas', 'list', 'total_quantity', 'total_price', 'total_type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // Add cart
    public function store(Request $request, Cart $cart, $id)
    {
        $quantity = $request->quantity;
        $product_id = $request->id;
        $color_id = $request->color_id;
        $size_id = $request->size_id;
        $path = $request->img_id;
        // dd($path);

        $addCart = $cart->add($product_id, $quantity, $color_id, $size_id, $path);
        // dd(session('cart'));
        if ($addCart) {
            return redirect()->route("client.cart");
        } else {
            return redirect()->route("client.product", [$id])->with("alertErr", "Bạn chưa chọn size hoặc màu sản phẩm");
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart, $product_id, $color_id, $size_id)
    {
        // Refresh session
        $list = $cart->list();
        unset($list[$product_id][$color_id][$size_id]);
        $cart->setList($list);

        if ($this->listIsNULL($cart)) {
            $cart->setList(null);
        }
        return redirect()->back();
    }

    public function listIsNULL(Cart $cart)
    {
        $count = 0;
        $list = $cart->list();

        foreach ($list as $aproduct) {
            foreach ($aproduct as $acolor) {
                if ($acolor != null) {
                    $count++;
                }
            }
        }
        if ($count == 0) {
            return true;
        }
        return false;
    }
}
