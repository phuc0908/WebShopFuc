<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cartegory;
use App\Models\User;
use App\Helpers\Cart;
use Carbon\Carbon;

class PayController extends Controller
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
            // dd($datas[$parent['id']]);
            $childs = $cart->getParent($parent['id']);

            foreach ($childs as $key => $child) {
                $datas[$keyParent][$key] = $child;
            }
        }
        return $datas;
    }
    public function getMySelf()
    {
        $user = new User();
        $id = session('idUser');

        $inforMySelf = [];
        if (!empty($id)) {
            $inforMySelf = $user->getWithAddress($id)[0];
        }
        return $inforMySelf;
    }
    /**
     * Display a listing of the resource.
     */
    public function pay()
    {
        return view('client.pay');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Cart $cart)
    {
        $total_quantity = $cart->getTotalQuantity();
        $total_price = $cart->getTotalPrice();

        $datas = $this->getCate();
        $inforMySelf = $this->getMySelf();
        $datenow =  Carbon::now('Asia/Ho_Chi_Minh')->addDay(7)->format(' d/m/Y');

        return view('client.pagePurched', compact('datas', 'inforMySelf', 'datenow', 'total_quantity', 'total_price'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
