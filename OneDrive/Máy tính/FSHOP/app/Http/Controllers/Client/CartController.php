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
        $total_price = $cart->getTotalPrice();
        $datas = $this->getCate();
        return view('client.cart', compact('datas', 'list', 'total_quantity', 'total_price'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // Add cart
    public function store(Request $request, Cart $cart)
    {
        $quantity = $request->quantity;
        $product_id = $request->id;
        $color_id = $request->color_id;
        $size_id = $request->size_id;

        $addCart = $cart->add($product_id, $quantity, $color_id, $size_id);
        // dd(session('cart'));
        if ($addCart) {
            return redirect()->route("client.cart");
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
        // dd($cart->list());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }
}
