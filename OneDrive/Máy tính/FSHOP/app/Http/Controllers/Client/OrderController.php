<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cartegory;
use App\Models\Order;
use App\Models\DetailOrder;
use App\Models\User;
use App\Helpers\Cart;
use Carbon\Carbon;

class OrderController extends Controller
{
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
    public function getMyOrder()
    {
        $orderObj = new Order();
        $detailorderObj = new DetailOrder();

        $listOrder = $orderObj->get(session('idUser'));
        $datas = null;

        foreach ($listOrder as $order) {
            // Thêm thông tin đơn đặt hàng vào mảng $datas
            $datas[$order->id]['order'] = $order;

            // Lấy chi tiết đơn đặt hàng
            $listDetail = $detailorderObj->get($order->id);

            // Thêm chi tiết đơn đặt hàng vào mảng $datas
            foreach ($listDetail as  $detail) {
                $datas[$order->id]['details'][$detail->id] = $detail;
            }
        }
        // dd($datas);
        return $datas;
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $datas = $this->getCate();
        $datasOrder = $this->getMyOrder();
        // dd($datasOrder);
        return view('client.order', compact('datas', 'datasOrder'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Cart $cart, $address)
    {
        // dd(session()->all());
        $order = new Order();
        $detailOrder = new DetailOrder();
        $dateCreate = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s | d/m/Y');

        // item in session
        $list = $cart->list();

        if ($list !== null) {
            // add new Order
            $isAdded = $order->insert(session('idUser'), $address, $dateCreate, 0, 0);
            // id order just created
            $order_id = $order->getLastedOrder()[0]->id;
            // var 
            $totalPrice = 0;

            foreach ($list as $aproduct) {
                foreach ($aproduct as $acolor) {
                    foreach ($acolor as $asize) {
                        // value Item
                        $product_id = $asize['product_id'];
                        $color_id = $asize['color_id'];
                        $size_id = $asize['size_id'];
                        $amount = $asize['quantity'];
                        $price = $asize['price'];

                        $totalPrice += $amount * $price;

                        // add new DetailOrder
                        $isAdded = $detailOrder->insert($order_id, $product_id, $amount, $price, $dateCreate, $color_id, $size_id);
                    }
                }
            }
            $isUpdatedPrice = $order->updateTotalPrice($order_id, $totalPrice);
        } else {
            echo "Error";
        }
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
